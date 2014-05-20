<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivoBgType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('disponibleabg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Disponible:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'abg money')))
            ->add('cuentasxcobrarabg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Cuentas por Cobrar:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'abg money')))
            ->add('inventariosabg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Inventarios:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'abg money')))    
            ->add('activofijoabg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Activo Fijo:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'abg money')))
            ->add('totalabg', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total Activos:',
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
            'data_class' => 'ues\peraBundle\Entity\ActivoBg'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_activobg';
    }
}
