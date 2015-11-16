<?php

namespace BalotajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BalotajeBundle:Default:index.html.twig', array('name' => $name));
    }
}
