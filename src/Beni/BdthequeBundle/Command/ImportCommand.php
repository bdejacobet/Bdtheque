<?php
namespace Beni\BdthequeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ddeboer\DataImport\Reader;
use Ddeboer\DataImport\Reader\CsvReader;
use Beni\BdthequeBundle\Document\ComicStrip;
use Beni\BdthequeBundle\Document\Series;
use Beni\UserBundle\Document\User;

class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bdtheque:import')
            ->addArgument('file_name', InputArgument::REQUIRED, 'Quel est le nom du fichier csv à importer?')
            ->addArgument('user_name', InputArgument::REQUIRED, 'Quel est l\'utilisateur auquel seront rattachés les comics strip importés?')
            ->setDescription('Import d\'un fichier csv contenant les comics strip');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // file csv
        $fileName = $this->getContainer()->getParameter('csv_path') . $input->getArgument('file_name');

        if (!is_file($fileName)) {
            $output->writeln('<error>Le fichier ' . $input->getArgument('file_name') . ' n\'existe pas</error>');
        } else {

            // user
            $username = $input->getArgument('user_name');
            $oUser = $this
                ->getContainer()->get('doctrine_mongodb')
                ->getRepository('BeniUserBundle:User')
                ->findOneByUsername($username);

            if (!$oUser instanceof User) {
                $output->writeln('<error>Le username ' . $input->getArgument('user_name') . ' n\'existe pas</error>');
            } else {

                // entity manager
                $comicStripManager = $this->getContainer()->get('beni_bdtheque.comic_strip_manager');
                $seriesManager = $this->getContainer()->get('beni_bdtheque.comic_strip_manager');

                // import data
                $file = new \SplFileObject($fileName);
                $reader = new CsvReader($file, ';');
                $nbSeries = 0;
                $nbComicStrip = 0;
                foreach ($reader as $row) {
                    // data from csv
                    $seriesTitle = $row[2];
                    $tome = $row[3];
                    $title = $row[5];
                    $editor = $row[6];
                    $legalDeposit = '01/' . $row[8]; // on force le jour pour avoir une date valide
                    $ISBN = $row[20];
                    $aNameFirstname = explode(',', $row[24]);
                    $scenarist = array_shift($aNameFirstname); // suppression du prénom
                    $aNameFirstname = explode(',', $row[25]);
                    $designer = array_shift($aNameFirstname); // suppression du prénom
                    $category = $row[22];

                    if ($row[14] == '0' && $row[15] == '0') { //pour ne pas importer les comics en whishlist ou à vendre

                        $oComicStrip = $this
                            ->getContainer()->get('doctrine_mongodb')
                            ->getRepository('BeniBdthequeBundle:ComicStrip')
                            ->findOneBy(array('ISBN' => $ISBN));

                        // new ComicStrip
                        if (!$oComicStrip instanceof ComicStrip) {

                            $oSeries = $this
                                ->getContainer()->get('doctrine_mongodb')
                                ->getRepository('BeniBdthequeBundle:Series')
                                ->findOneByTitle($seriesTitle);
                            // new Series
                            if (!$oSeries instanceof Series) {
                                $oSeries = new Series();
                                $oSeries->setTitle($seriesTitle);

                                $seriesManager->save($oSeries);

                                $output->writeln('création de la série "' . $seriesTitle . '"');
                                $nbSeries++;
                            }

                            $oComicStrip = new ComicStrip();
                            $oComicStrip->setTitle($title);
                            $oComicStrip->setISBN($ISBN);
                            $oComicStrip->setLegalDeposit($legalDeposit);
                            $oComicStrip->setScenarist($scenarist);
                            $oComicStrip->setDesigner($designer);
                            $oComicStrip->setEditor($editor);
                            $oComicStrip->setCategory($category);
                            $oComicStrip->setSeries($oSeries);
                            $oComicStrip->setTome($tome);
                            $oComicStrip->addUser($oUser);
                            $comicStripManager->save($oComicStrip);

                            $output->writeln('création de la BD "' . $title . '"');
                            $nbComicStrip++;

                        }
                    }
                }

                $output->writeln('<info>' . $nbSeries . ' séries crées en base de données</info>');
                $output->writeln('<info>' . $nbComicStrip . ' comics strip crées en base de données</info>');
            }
        }
    }
}
