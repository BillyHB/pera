<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngresosFamiliaresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salariosingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Salarios:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('class' => 'ingfamiliares money')))
            ->add('alquileresingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Alquileres:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('class' => 'ingfamiliares money')))
            ->add('remesasingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Remesas:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('class' => 'ingfamiliares money')))
            ->add('pensionesingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Pensiones:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('class' => 'ingfamiliares money')))
            ->add('otrosingresosingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Otros Ingresos:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('class' => 'ingfamiliares money')))
            ->add('totalingfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total:',
                        'label_attr' => array('class' => 'corto'),
                        'attr'  => array('placeholder' => '0')))
            /*->add('idcliente')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\IngresosFamiliares'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_ingresosfamiliares';
    }
}
