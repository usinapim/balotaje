<?php

namespace BalotajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $votos = $this->getDoctrine()->getRepository("BalotajeBundle:Mesa")->contarVotos();

        return $this->render('BalotajeBundle:Default:index.html.twig', array('votos' => $votos[0]));
    }
}
