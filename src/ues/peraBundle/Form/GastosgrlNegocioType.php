<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastosgrlNegocioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sueldosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Sueldos:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('alquileresggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Alquileres:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('serviciosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Servicios:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('transporteggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Transporte:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('bodegaggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Bodega:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('impuestosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Impuestos:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('cuotaptmosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Cuotas Ptmos.:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('otrosgastosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Otros Gastos:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('imprevistosggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Imprevistos:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ggn money')))
            ->add('totalggn', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('placeholder' => '0')))
            /*->add('idnegocio')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\GastosgrlNegocio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_gastosgrlnegocio';
    }
}
