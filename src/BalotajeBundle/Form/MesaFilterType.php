<?php

namespace BalotajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MesaFilterType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'localidad',
				'entity',
				array(
					'empty_value'=>"Todas",
					'required' => false,
					'class' => 'UbicacionBundle\Entity\Localidad',
					'attr'  => array( 'class' => 'select2' )
				) );
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults(array(
			'csrf_protection' => false,
		));

	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'balotajebundle_mesa_filtertype';
	}
}
