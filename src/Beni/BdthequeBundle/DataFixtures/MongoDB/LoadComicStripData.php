<?php

namespace Beni\BdthequeBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Beni\BdthequeBundle\Document\ComicStrip;

/**
 * Class LoadComicStripData
 *
 * @package Beni\BdthequeBundle\DataFixtures\ODM
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class LoadComicStripData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $oComicStrip_1 = new ComicStrip();
        $oComicStrip_1->setTitle('L\'ombre du Z');
        $oComicStrip_1->setISBN('2-105-206569-4');
        $oComicStrip_1->setLegalDeposit('01/01/1961');
        $oComicStrip_1->setDesigner('Franquin');
        $oComicStrip_1->setScenarist('Franquin');
        $oComicStrip_1->setEditor('Dupuis');
        $oComicStrip_1->setCategory('Aventure');
        $oComicStrip_1->setResume('Zorglub est vaincu. Spirou, Fantasio et le Comte de Champignac rentrent au château. Cependant, en survolant le village, ils réalisent que le policier Jérôme, qui n\'a pas été dézorglhommisé, a paralysé la quasi-totalité du village. Heureusement, ils parviennent rapidement à le capturer et à libérer le village…
                                    Quelque temps plus tard, Zorglub arrive au château de Champignac, prétendant être journaliste d\'une revue scientifique. Dans un premier temps, grâce à une de ses inventions, il n\'est pas reconnu, mais le Marsupilami l\'annihile, révélant son identité. Dehors, il y a des zorglumobiles, pilotées par des zorglhommes. Le savant n\'a donc pas tenu sa promesse mais s\'enfuit, protégé par ses hommes. Cependant, en panne d\'essence, il va faire le plein et a une altercation avec le pompiste qu\'il zorglhommise puisque celui-ci exigeait d\'être payé en francs. Partant, il veut tout de même payer et laisse des billets de Palombie. Cette erreur permet au comte et ses compagnons de décuvrir qu\'il s\'est installé en Palombie.
                                    Fantasio alerte l\'armée de l\'air mais Zorglub parvient encore à s\'échapper en utilisant des émetteurs de zorglonde pour faire oublier les ordres aux pilotes.
                                    Le comte de Champignac et ses amis se rendent donc à Chiquito en Palombie. Et sur place, ils constatent que Zorglub utilisent sa zorglonde pour forcer les habitants du pays à lui acheter le savon et le dentifrice qu\'il fabrique, afin de financer ses recherches. Peu après, des bandits arrivent pour braquer les magasins qui vendent la marchandise. Les bandits sont des zorglhommes. Le comte, Spirou et Fantasio se rendent donc à la base de Zorglub dont le comte a trouvé l\'emplacement, devinant que le vide laissé sur une des cartes est le fait de Zorglub, ayant détourné les photographes grâce à sa zorglonde. Sur place, Zorglub reconnaît sa méthode de vente mais pas les hold-ups. Spirou, en explorant la base, tombe sur le lieutenant de Zorglub, l\'auteur des hold-ups, qui n\'est autre que Zantafio. Les héros, accompagnés de Zorglub, essayent de l\'arrêter, mais il s\'empare d\'une dangereuse arme qui foudroie Zorglub avant de se désintégrer, assommant le bandit. Les héros livrent donc Zantafio à la police, dézorglhommisent les derniers zorglhommes et le comte jure de trouver un remède pour sauver son collègue.');
        $oComicStrip_1->setSeries($this->getReference('series_1'));
        $oComicStrip_1->setTome(12);
        $oComicStrip_1->addUser($this->getReference('user_1'));
        $manager->persist($oComicStrip_1);

        $oComicStrip_2 = new ComicStrip();
        $oComicStrip_2->setTitle('Z comme Zorglub');
        $oComicStrip_2->setISBN('2-105-359569-5');
        $oComicStrip_2->setLegalDeposit('01/01/1962');
        $oComicStrip_2->setDesigner('Franquin');
        $oComicStrip_2->setScenarist('Franquin');
        $oComicStrip_2->setEditor('Dupuis');
        $oComicStrip_2->setCategory('Aventure');
        $oComicStrip_2->setResume('Fantasio reçoit un sèche-cheveux d\'une "charmante admiratrice", en l\'essayant il est pris d\'un malaise… Quelques minutes plus tard, il sort de la maison sous les yeux ébahis de Spirou pour "prendre l\'air". Il est en fait hypnotisé et se réveille à l\'arrière d\'une voiture sans chauffeur, télécommandée par un individu qui prétend s\'appeler Zorglub. Cependant, il perd le contrôle du véhicule et la voiture s\'encastre dans une vitrine. Spirou, en sortant de l\'hôpital avec le pauvre Fantasio, est hypnotisé à son tour, et revient le soir à la maison, porteur d\'un message du "Z" pour le Comte de Champignac. Peu de temps après, Zorglub, ancien camarade de promotion du comte, débarque chez lui pour lui proposer de se joindre à lui, mais le comte refuse vigoureusement. En sortant, il emmène le policier de Champignac, Jérôme, qui lui a manqué de respect.
                                    Spirou et Fantasio rejoignent le comte à Champignac et apprennent la disparition du policier. Zorglub réitère sa proposition, arrivant à bord d\'un vaisseau futuriste, le Zorgléoptère, mais le comte refuse à nouveau. Le lendemain, il fait une démonstration de sa puissance, via les ondes radios, il lâche la population de Champignac en furie contre le château du comte, mais Spirou les neutralise. Fantasio va se moquer du savant qui le fait prisonnier pour le transformer en zorglhomme, un membre de son armée. Après quelques péripéties, Fantasio se fait passer pour un zorglhomme même s\'il a résisté au traitement grâce à une invention du comte, tandis que le comte et Spirou s\'emparent de la zorglumobile de Jérôme, le policier zorglhommisé venu leur apporter un message du "Z".
                                    Ils arrivent à la base de Zorglub, et là, le comte le drogue avec l\'aide de Spirou et Fantasio. Zorglub, sous l\'effet de la drogue oublie son orgueil, devient lucide et avoue ses torts, promet de détruire ses bases et de dézorglhommiser son armée, mais d\'abord il réalise avec l\'aval du comte un envoi massif de fusées sur la Lune, dans le cadre d\'une expérience publicitaire qui échoue mais qui reste néanmoins un exploit scientifique sans précédent. Zorglub prend mal ce semi-échec et rongé par la honte, préfère s\'éclipser.');
        $oComicStrip_2->setSeries($this->getReference('series_1'));
        $oComicStrip_2->setTome(13);
        $oComicStrip_2->addUser($this->getReference('user_1'));
        $manager->persist($oComicStrip_2);

        $oComicStrip_3 = new ComicStrip();
        $oComicStrip_3->setTitle('Gaffes a gogo');
        $oComicStrip_3->setISBN('2-105-985134-6');
        $oComicStrip_3->setDesigner('Franquin');
        $oComicStrip_3->setScenarist('Franquin');
        $oComicStrip_3->setEditor('Dupuis');
        $oComicStrip_3->setResume('plein de gags');
        $oComicStrip_3->setSeries($this->getReference('series_2'));
        $oComicStrip_3->setTome(6);
        $oComicStrip_3->addUser($this->getReference('user_1'));
        $oComicStrip_3->addUser($this->getReference('user_2'));
        $manager->persist($oComicStrip_3);

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // l'ordre dans lequel les fichiers sont chargés
    }
}
