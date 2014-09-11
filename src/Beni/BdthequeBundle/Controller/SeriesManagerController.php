<?php

namespace Beni\BdthequeBundle\Controller;

use Beni\BdthequeBundle\Document\Series;
use Beni\BdthequeBundle\Form\SeriesForm;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
        $user = $this->_getLoggedUser();

        $aSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->findAllByUserOrderedByTitle($user);

        return $this->render('BeniBdthequeBundle:Series:list.html.twig', array(
            'aSeries' => $aSeries
        ));
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

        $user = $this->_getLoggedUser();
        $oSeries->setUser($user);

        $form = $this->createForm(new Seriesform, $oSeries);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                try {
                    $em = $this->get('doctrine_mongodb')->getManager();
                    $em->persist($oSeries);
                    $em->flush();

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
        $user = $this->_getLoggedUser();

        $oSeries = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:Series')
            ->findByIdAndUser($idSeries, $user);

        if ($oSeries == null) {
            throw $this->createNotFoundException('Series [id=' . $idSeries . '] inexistant');
        } else {
            $form = $this->createForm(new Seriesform, $oSeries);

            $request = $this->get('request');
            if ($request->getMethod() == 'POST') {
                $form->bind($request);

                if ($form->isValid()) {
                    try {
                        $em = $this->get('doctrine_mongodb')->getManager();
                        $em->persist($oSeries);
                        $em->flush();

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


        if ($oSeries == null) {
            throw $this->createNotFoundException('Series [id=' . $idSeries . '] inexistant');
        } else {

            If ($oSeries->getComicStrip()->isEmpty() !== true) {
                $this->get('session')->getFlashBag()->add('danger', 'Série ayant encore des BDs associées');

            } else {

                $em = $this->get('doctrine_mongodb')->getManager();
                $em->remove($oSeries);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', 'Série bien supprimée');
            }

        }

        return $this->redirect($this->generateUrl('beni_bdtheque_series_list'));
    }

    /**
     * get user logged
     *
     * @return UserInterface $user
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    private function _getLoggedUser()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette section');
        }

        return $user;
    }
}