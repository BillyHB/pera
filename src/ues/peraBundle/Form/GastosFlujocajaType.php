<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastosFlujocajaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('compramercaderiagfc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Compra de mercadería:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gfc money')))
            ->add('gastosnegociogfc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Gastos del Negocio:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gfc money')))
            ->add('gastosfamiliaresgfc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Gastos Familiares:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'gfc money')))
            ->add('totalgfc', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'read_only' => true,
                        'label' => 'Total:',
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
            'data_class' => 'ues\peraBundle\Entity\GastosFlujocaja'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_gastosflujocaja';
    }
}
