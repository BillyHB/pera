<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegocioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombrenegocio',null,
                  array('label' => 'Nombre:',
                        'label_attr' => array('class' => 'normal')))
            ->add('deptonegocio',null,
                  array('label' => 'Departamento:',
                        'label_attr' => array('class' => 'normal')))
            ->add('municipionegocio',null,
                  array('label' => 'Municipio:',
                        'label_attr' => array('class' => 'normal')))
            ->add('direccionnegocio',null,
                  array('label' => 'Dirección:',
                        'label_attr' => array('class' => 'normal'),
                        'attr' => array('class' => 'nombre')))
            ->add('telefononegocio',null,
                  array('label' => 'Telefono:',
                        'label_attr' => array('class' => 'normal')))
            ->add('horarionegocio',null,
                  array('label' => 'Horario de Atención:',
                        'label_attr' => array('class' => 'normal')))
            /*->add('idcliente')*/
                
            ->add('gastosgrlnegocio', new GastosgrlNegocioType(),
                  array('label' => ">>>Gastos Generales")
                 )
            
            ->add('ingresoflujocaja', new IngresoFlujocajaType(),
                  array('label' => ">>>Ingresos")
                 )    
            
            ->add('gastosflujocaja', new GastosFlujocajaType(),
                  array('label' => ">>>Gastos")
                 )    
                
            ->add('activobg', new ActivoBgType(),
                  array('label' => ">>>Activos")
                 )    
                
            ->add('pasivopatrimoniobg', new PasivoPatrimonioBgType(),
                  array('label' => ">>>Pasivo y Patrimonio")
                 )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\Negocio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_negocio';
    }
}
