<?php

namespace Beni\BdthequeBundle\Controller;

use Beni\BdthequeBundle\Document\Series;
use Beni\BdthequeBundle\Form\SeriesForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class SeriesManagerController
 *
 * @package Beni\BdthequeBundle\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class SeriesController extends Controller
{

    /**
     * List of series
     *
     * @return Response
     */
    public function listAction()
    {
        $em    = $this->get('doctrine_mongodb')->getManager();
        $query = $em->createQueryBuilder('BeniBdthequeBundle:Series');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BeniBdthequeBundle:Series:list.html.twig', array('pagination' => $pagination));
    }

    /**
     * Creation of a series
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    public function createAction()
    {
        $oSeries = new Series;

        $form = $this->createForm(new Seriesform, $oSeries);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                try {

                    $this->get('beni_bdtheque.series_manager')->save($oSeries);

                    $this->get('session')->getFlashBag()->add('success', 'Série bien créée');

                    return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));

                } catch (Exception $e) {

                    $this->get('session')->getFlashBag()->add('danger', 'Série n\a pas pu être créée');

                    return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));
                }
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
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return Response
     */
    public function editAction($idSeries)
    {

        $oSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->find($idSeries);

        if (!$oSeries) {
            throw $this->createNotFoundException('Series [id=' . $idSeries . '] inexistant');
        } else {
            $form = $this->createForm(new Seriesform, $oSeries);

            $request = $this->get('request');
            if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);

                if ($form->isValid()) {
                    try {
                        $this->get('beni_bdtheque.series_manager')->save($oSeries);

                        $this->get('session')->getFlashBag()->add('success', 'Série bien mise à jour');

                        return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));

                    } catch (Exception $e) {

                        $this->get('session')->getFlashBag()->add('danger', 'Série n\a pas pu être mise à jour');

                        return $this->redirect($this->generateUrl('beni_bdtheque_series_list', array()));
                    }
                }
            }
        }

        return $this->render('BeniBdthequeBundle:Series:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /** Delete a series
     *
     * @param $idSeries
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @internal param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function deleteAction($idSeries)
    {
        $oSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->find($idSeries);


        if (!$oSeries) {
            throw $this->createNotFoundException('Series [id=' . $idSeries . '] inexistant');
        } else {

            If ($oSeries->getComicStrip()->isEmpty() !== true) {
                $this->get('session')->getFlashBag()->add('danger', 'Série ayant encore des BDs associées');

            } else {
                $this->get('beni_bdtheque.series_manager')->remove($oSeries);

                $this->get('session')->getFlashBag()->add('success', 'Série bien supprimée');
            }

        }

        return $this->redirect($this->generateUrl('beni_bdtheque_series_list'));
    }
}
