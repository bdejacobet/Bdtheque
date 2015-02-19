<?php


namespace Beni\BdthequeBundle\Controller\Api;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ComicStripController
 *
 * @package Beni\BdthequeBundle\Controller\Api
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStripController extends Controller
{
    public function getComicstripsAction()
    {

        $aComicStrips = $this->get('beni_bdtheque.comic_strip_manager')->getAll();

        return $aComicStrips;
    }

    public function getComicstripAction($id)
    {

        $oComicStrip = $this->get('beni_bdtheque.comic_strip_manager')->getById($id);

        if(!is_object($oComicStrip)){
            throw $this->createNotFoundException();
        }

        return $oComicStrip;
    }
}
