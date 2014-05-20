<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastosFamiliaresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alimentaciongasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Alimentación:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('educaciongasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Educación:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('alquilergasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Alquileres:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('serviciosgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Servicios:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('transportegasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Transporte:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('saludgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Salud:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('prestamospersgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Ptmos. Person.:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('otrosgastosgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Otros Gastos:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('imprevistosgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Imprevistos:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gasfamiliares money')))
            ->add('totalgasfamiliares', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total:',
                        'label_attr' => array('class' => 'largo'),
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
            'data_class' => 'ues\peraBundle\Entity\GastosFamiliares'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_gastosfamiliares';
    }
}
