<?php


namespace Beni\BdthequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package Beni\BdthequeBundle\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * Home
     *
     * @return Response
     */
    public function HomeAction()
    {
        return $this->render('BeniBdthequeBundle:Default:home.html.twig', array());
    }
}
