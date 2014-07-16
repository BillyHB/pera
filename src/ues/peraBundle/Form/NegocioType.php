<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegocioType extends AbstractType
{
    private $municipios;
    
    public function __construct($municipios) {
        $this->municipios = $municipios;
    }
    
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
            ->add('deptonegocio','choice',
                  array('label' => 'Departamento:',
                        'label_attr' => array('class' => 'normal'),
                        'empty_value' => 'Seleccione...',
                        'choices'    => array('Ahuachapán'   => 'Ahuachapán', 
                                              'Santa Ana'    => 'Santa Ana',
                                              'Sonsonate'    => 'Sonsonate',
                                              'La Libertad'  => 'La Libertad',
                                              'Chalatenango' => 'Chalatenango',
                                              'Cuscatlán'    => 'Cuscatlán',
                                              'San Salvador' => 'San Salvador',
                                              'La Paz'       => 'La Paz',
                                              'Cabañas'      => 'Cabañas',
                                              'San Vicente'  => 'San Vicente',
                                              'Usulután'     => 'Usulután',
                                              'San Miguel'   => 'San Miguel',
                                              'Morazán'      => 'Morazán',
                                              'La Unión'     => 'La Unión'
                                             )))
            ->add('municipionegocio','choice',
                  array('label' => 'Municipio:',
                        'label_attr' => array('class' => 'normal'),
                        'empty_value' => 'Seleccione...',
                        'choices'     => $this->municipios))
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
