<?php

namespace BalotajeBundle\Controller;

use BalotajeBundle\Form\MesaFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request )
    {


        $form = $this->createForm(new MesaFilterType());

        if ($request->isMethod("POST")){
            $form->handleRequest($request);
            if ($form->isValid()){
                $filtros = $form->getData();
                $votos = $this->getDoctrine()->getRepository("BalotajeBundle:Mesa")->contarVotos($filtros);
            }
        }else{
            $votos = $this->getDoctrine()->getRepository("BalotajeBundle:Mesa")->contarVotos();
        }



        return $this->render('BalotajeBundle:Default:index.html.twig', array(
            'votos' => $votos[0],
            "form" => $form->createView()
            ));
    }
}
