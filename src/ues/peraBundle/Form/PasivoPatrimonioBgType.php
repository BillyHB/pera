<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PasivoPatrimonioBgType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proveedoresppbg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Proveedores:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'ppbg money')))
            ->add('prestamosinstppbg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Préstamos en Instituciones:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'ppbg money')))
            ->add('otrosprestppbg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'OTros Préstamos:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'ppbg money')))
            ->add('patrimonioppbg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Patrimonio:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'ppbg money')))
            ->add('totalppbg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total Pasivo y Patrimonio:',
                        'label_attr' => array('class' => 'largo'),
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
            'data_class' => 'ues\peraBundle\Entity\PasivoPatrimonioBg'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_pasivopatrimoniobg';
    }
}
