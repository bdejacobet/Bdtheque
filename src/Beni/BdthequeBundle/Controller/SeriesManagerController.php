<?php

namespace Beni\BdthequeBundle\Controller;

use Beni\BdthequeBundle\Document\Series;
use Beni\BdthequeBundle\Form\SeriesForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SeriesManagerController
 *
 * @package Beni\BdthequeBundle\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class SeriesManagerController extends Controller
{

    /**
     * List of series
     *
     * @return Response
     */
    public function ListAction()
    {
        $aSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->findAllOrderedByTitle();

        return $this->render('BeniBdthequeBundle:Series:list.html.twig', array(
            'aSeries' => $aSeries
        ));
    }

    /**
     * Creation of a series
     *
     * @return Response
     */
    public function createAction()
    {
        $oSeries = new Series;
        $form = $this->createForm(new Seriesform, $oSeries);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->get('doctrine_mongodb')->getManager();
                $em->persist($oSeries);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Série bien créée');

                return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));
            }
        }

        return $this->render('BeniBdthequeBundle:Series:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Edition of a series
     *
     * @param $idSeries
     * @return Response
     */
    public function editAction($idSeries)
    {

        $oSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->find($idSeries);
        $form = $this->createForm(new Seriesform, $oSeries);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->get('doctrine_mongodb')->getManager();
                $em->persist($oSeries);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Série bien mise à jour');

                return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));
            }
        }

        return $this->render('BeniBdthequeBundle:Series:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /** Delete a series
     *
     * @param $idSeries
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @internal param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @TODO : test pas de comicStrop associé à cette série avant delete
     */
    public function deleteAction($idSeries)
    {
        $oSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->find($idSeries);

        if ($oSeries == null) {
            throw $this->createNotFoundException('Series [id='.$idSeries.'] inexistant');
        } else {

            $em = $this->get('doctrine_mongodb')->getManager();
            $em->remove($oSeries);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', 'Série bien supprimée');

        }

        return $this->redirect($this->generateUrl('beni_bdtheque_series_list'));
    }
}
