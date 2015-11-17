<?php

namespace BalotajeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BalotajeBundle\Entity\Mesa;
use BalotajeBundle\Form\MesaType;

/**
 * Mesa controller.
 *
 */
class MesaController extends Controller {

	/**
	 * Lists all Mesa entities.
	 *
	 */
	public function indexAction( Request $request ) {
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository( 'BalotajeBundle:Mesa' )->findAll();

//        $paginator = $this->get('knp_paginator');
//        $entities = $paginator->paginate(
//        $entities, $this->get('request')->query->get('page', 1)/* page number */, 10/* limit per page */
//        );

		return $this->render( 'BalotajeBundle:Mesa:index.html.twig',
			array(
				'entities' => $entities,
			) );
	}

	/**
	 * Creates a new Mesa entity.
	 *
	 */
	public function createAction( Request $request ) {
		$entity = new Mesa();
		$form   = $this->createCreateForm( $entity );
		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em = $this->getDoctrine()->getManager();
			$em->persist( $entity );
			$em->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Mesa creado correctamente.'
			);


			$parameter = array();

			if ( $form->get( 'sumbitNew' )->isClicked() ) {
				$ruta = 'mesas_new';
			} else {
				$ruta      = 'mesas_show';
				$parameter = array( 'id' => $entity->getId() );

			}


			return $this->redirectToRoute( $ruta, $parameter );

//            return $this->redirect($this->generateUrl('mesas_show', array('id' => $entity->getId())));
		}

		return $this->render( 'BalotajeBundle:Mesa:new.html.twig',
			array(
				'entity' => $entity,
				'form'   => $form->createView(),
			) );
	}

	/**
	 * Creates a form to create a Mesa entity.
	 *
	 * @param Mesa $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm( Mesa $entity ) {
		$form = $this->createForm( new MesaType(),
			$entity,
			array(
				'action' => $this->generateUrl( 'mesas_create' ),
				'method' => 'POST',
				'attr'   => array( 'class' => 'box-body' )
			) );

		$form->add( 'submit',
			'submit',
			array(
				'label' => 'Crear',
				'attr'  => array( 'class' => 'btn btn-primary pull-right' )
			) );
		$form->add(
			'submitAndAdd',
			'submit',
			array(
				'label' => 'Crear y agregar',
				'attr'  => array( 'class' => 'btn btn-primary pull-right margin-left-2' ),
			)
		);

		return $form;
	}

	/**
	 * Displays a form to create a new Mesa entity.
	 *
	 */
	public function newAction() {
		$entity = new Mesa();
		$form   = $this->createCreateForm( $entity );

		return $this->render( 'BalotajeBundle:Mesa:new.html.twig',
			array(
				'entity' => $entity,
				'form'   => $form->createView(),
			) );
	}

	/**
	 * Finds and displays a Mesa entity.
	 *
	 */
	public function showAction( $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'BalotajeBundle:Mesa' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Mesa entity.' );
		}

		$deleteForm = $this->createDeleteForm( $id );

		return $this->render( 'BalotajeBundle:Mesa:show.html.twig',
			array(
				'entity'      => $entity,
				'delete_form' => $deleteForm->createView(),
			) );
	}

	/**
	 * Displays a form to edit an existing Mesa entity.
	 *
	 */
	public function editAction( $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'BalotajeBundle:Mesa' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Mesa entity.' );
		}

		$editForm   = $this->createEditForm( $entity );
		$deleteForm = $this->createDeleteForm( $id );

		return $this->render( 'BalotajeBundle:Mesa:edit.html.twig',
			array(
				'entity'      => $entity,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
			) );
	}

	/**
	 * Creates a form to edit a Mesa entity.
	 *
	 * @param Mesa $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm( Mesa $entity ) {
		$form = $this->createForm( new MesaType(),
			$entity,
			array(
				'action' => $this->generateUrl( 'mesas_update', array( 'id' => $entity->getId() ) ),
				'method' => 'PUT',
				'attr'   => array( 'class' => 'box-body' )
			) );

		$form->add(
			'submit',
			'submit',
			array(
				'label' => 'Actualizar',
				'attr'  => array( 'class' => 'btn btn-primary pull-right' ),
			)
		);

		return $form;
	}

	/**
	 * Edits an existing Mesa entity.
	 *
	 */
	public function updateAction( Request $request, $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'BalotajeBundle:Mesa' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Mesa entity.' );
		}

		$deleteForm = $this->createDeleteForm( $id );
		$editForm   = $this->createEditForm( $entity );
		$editForm->handleRequest( $request );

		if ( $editForm->isValid() ) {
			$em->flush();

			$this->get( 'session' )->getFlashBag()->add(
				'success',
				'Mesa actualizado correctamente.'
			);

			return $this->redirect( $this->generateUrl( 'mesas_edit', array( 'id' => $id ) ) );
		}

		return $this->render( 'BalotajeBundle:Mesa:edit.html.twig',
			array(
				'entity'      => $entity,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
			) );
	}

	/**
	 * Deletes a Mesa entity.
	 *
	 */
	public function deleteAction( Request $request, $id ) {
		$form = $this->createDeleteForm( $id );
		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em     = $this->getDoctrine()->getManager();
			$entity = $em->getRepository( 'BalotajeBundle:Mesa' )->find( $id );

			if ( ! $entity ) {
				throw $this->createNotFoundException( 'Unable to find Mesa entity.' );
			}

			$em->remove( $entity );
			$em->flush();
		}

		return $this->redirect( $this->generateUrl( 'mesas' ) );
	}

	/**
	 * Creates a form to delete a Mesa entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm( $id ) {
		return $this->createFormBuilder()
		            ->setAction( $this->generateUrl( 'mesas_delete', array( 'id' => $id ) ) )
		            ->setMethod( 'DELETE' )
		            ->add( 'submit', 'submit', array( 'label' => 'Delete' ) )
		            ->getForm();
	}
}
