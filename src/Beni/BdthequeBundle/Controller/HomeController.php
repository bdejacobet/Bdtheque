<?php

namespace Beni\BdthequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 *
 * @package Beni\BdthequeBundle\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * Home
     *
     * @return Response
     */
    public function homeAction()
    {
        return $this->render('BeniBdthequeBundle:Home:home.html.twig', array());
    }
}
