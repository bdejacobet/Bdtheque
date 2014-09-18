<?php

namespace Beni\BdthequeBundle\Controller;

use Beni\BdthequeBundle\Document\ComicStrip;
use Beni\BdthequeBundle\Document\ComicStripSearch;
use Beni\BdthequeBundle\Form\ComicStripForm;
use Beni\BdthequeBundle\Form\ComicStripSearchForm;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class ComicStripManagerController
 *
 * @package Beni\BdthequeBundle\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStripManagerController extends Controller
{

    /**
     * List of comic strip
     *
     * @return Response
     */
    public function ListAction()
    {
        $em    = $this->get('doctrine_mongodb')->getManager();
        $query = $em->createQueryBuilder('BeniBdthequeBundle:ComicStrip');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BeniBdthequeBundle:ComicStrip:list.html.twig', array('pagination' => $pagination));
    }

    /**
     * My list of comic strip
     *
     * @return Response
     */
    public function MyListAction()
    {
        $user = $this->_getLoggedUser();

        $em    = $this->get('doctrine_mongodb')->getManager();
        $query = $em->createQueryBuilder('BeniBdthequeBundle:ComicStrip')
                    ->field('users')->references($user);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BeniBdthequeBundle:ComicStrip:list.html.twig', array('pagination' => $pagination));
    }

    /**
     * Creation of a comic strip
     *
     * @return Response
     */
    public function createAction()
    {

        $oComicStrip = new ComicStrip;

        $form = $this->createForm(new ComicStripform, $oComicStrip);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                try {
                    $em = $this->get('doctrine_mongodb')->getManager();
                    $em->persist($oComicStrip);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('success', 'BD bien créée');

                    return $this->redirect($this->generateUrl('beni_bdtheque_comicstrip_details', array('idComicStrip' => $oComicStrip->getId())));

                } catch (Exception $e) {

                    $this->get('session')->getFlashBag()->add('danger', 'BD n\'a pas pu être créée');

                    return $this->redirect($this->generateUrl('beni_bdtheque_comicstrip_list', array()));
                }
            }
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Edition of a comic strip
     *
     * @param $idComicStrip
     *
     * @return Response
     */
    public function EditAction($idComicStrip)
    {

        $oComicStrip = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:ComicStrip')
            ->find($idComicStrip);
        $form = $this->createForm(new ComicStripform, $oComicStrip);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                try {
                    $em = $this->get('doctrine_mongodb')->getManager();
                    $em->persist($oComicStrip);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('success', 'BD bien mise à jour');

                    return $this->redirect($this->generateUrl('beni_bdtheque_comicstrip_details', array('idComicStrip' => $oComicStrip->getId())));

                } catch (Exception $e) {

                    $this->get('session')->getFlashBag()->add('danger', 'BD n\a pas pu être créée');

                    return $this->redirect($this->generateUrl('beni_bdthequecomicstrip_list', array()));
                }
            }
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /** Delete a comic strip
     *
     * @param $idComicStrip
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @internal param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function deleteAction($idComicStrip)
    {
        $oComicStrip = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:ComicStrip')
            ->find($idComicStrip);

        if ($oComicStrip == null) {
            throw $this->createNotFoundException('ComicStrip [id=' . $idComicStrip . '] inexistant');
        } else {

            $em = $this->get('doctrine_mongodb')->getManager();
            $em->remove($oComicStrip);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'BD bien supprimée');

        }

        return $this->redirect($this->generateUrl('beni_bdtheque_comicstrip_list'));
    }

    /**
     * Details of a comic strip
     *
     * @param $idComicStrip
     *
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function detailsAction($idComicStrip)
    {
        $oComicStrip = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:ComicStrip')
            ->find($idComicStrip);

        if (!$oComicStrip) {
            throw $this->createNotFoundException('No ComicStrip found for id ' . $idComicStrip);
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:details.html.twig', array(
            'oComicStrip' => $oComicStrip
        ));
    }

    /**
     * Associate a comic strip to a user
     *
     * @param $idComicStrip
     *
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function associateToUserAction($idComicStrip)
    {

        $oUser = $this->_getLoggedUser();

        $oComicStrip = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:ComicStrip')
            ->find($idComicStrip);

        if (!$oComicStrip) {
            throw $this->createNotFoundException('No ComicStrip found for id ' . $idComicStrip);
        } else {

            $em = $this->get('doctrine_mongodb')->getManager();
            $oComicStrip->addUser($oUser);
            $em->persist($oComicStrip);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', '\'' . $oComicStrip->getTitle() . '\' a été ajouté à votre collection');
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:details.html.twig', array(
            'oComicStrip' => $oComicStrip
        ));
    }

    /**
     * Dissociate a comic strip to a user
     *
     * @param $idComicStrip
     *
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function dissociateToUserAction($idComicStrip)
    {

        $oUser = $this->_getLoggedUser();

        $oComicStrip = $this->get('doctrine_mongodb')
            ->getRepository('BeniBdthequeBundle:ComicStrip')
            ->find($idComicStrip);

        if (!$oComicStrip) {
            throw $this->createNotFoundException('No ComicStrip found for id ' . $idComicStrip);
        } else {

            $em = $this->get('doctrine_mongodb')->getManager();
            $oComicStrip->removeUser($oUser);
            $em->persist($oComicStrip);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', '\'' . $oComicStrip->getTitle() . '\' a été supprimé de votre collection');
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:details.html.twig', array(
            'oComicStrip' => $oComicStrip
        ));
    }

    /**
     * get user logged
     *
     * @return UserInterface $user
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    private function _getLoggedUser()
    {
        $oUser = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($oUser) || !$oUser instanceof UserInterface) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette section');
        }

        return $oUser;
    }

    /**
     * search comic strip
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(Request $request)
    {
        $oComicStripSearch = new ComicStripSearch();

        $form = $this->createForm(new ComicStripSearchForm, $oComicStripSearch);

        if ($request->request->get('comic_strip_search_type')) {
            $form->handleRequest($request);
            $oComicStripSearch = $form->getData();
            $elasticaManager = $this->container->get('fos_elastica.manager');
            $results = $elasticaManager->getRepository('BeniBdthequeBundle:ComicStrip')->search($oComicStripSearch);
            $bSearch = true;
        } else {
            $results = null;
            $bSearch = false;
        }

        return $this->render('BeniBdthequeBundle:ComicStrip:search.html.twig',array(
            'results' => $results,
            'bSearch' => $bSearch,
            'form' => $form->createView(),
        ));
    }
}
