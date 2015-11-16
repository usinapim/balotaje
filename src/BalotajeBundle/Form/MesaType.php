<?php

namespace BalotajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MesaType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'numero' )
			->add( 'escuelaTestigo' )
			->add( 'resultadoCambiemos' )
			->add( 'resultadoFpv' )
			->add( 'localidad',
				'entity',
				array(
					'class' => 'UbicacionBundle\Entity\Localidad',
					'attr'  => array( 'class' => 'select2' )
				) );
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'BalotajeBundle\Entity\Mesa'
		) );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'balotajebundle_mesa';
	}
}
