<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngresoFlujocajaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ventacontadoifc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Ventas al Contado:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ifc money')))
            ->add('recuentaxcobrarifc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Recup. ctas por Cobrar:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ifc money')))
            ->add('ventascreditoifc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Ventas al Credito:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ifc money')))
            ->add('otrosingresosifc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Otros Ingresos:',
                        'label_attr' => array('class' => 'normal'),
                        'attr'  => array('class' => 'ifc money')))
            ->add('totalifc', 'money',
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
            'data_class' => 'ues\peraBundle\Entity\IngresoFlujocaja'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_ingresoflujocaja';
    }
}
