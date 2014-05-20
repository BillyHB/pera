<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReferenciaFamiliarType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombrereffamiliar',null,
                  array('label' => 'Nombre:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'nombre')))
            ->add('parentescoreffamiliar',null,
                  array('label' => 'Parentesco:',
                        'label_attr' => array('class' => 'largo')))
            ->add('direccionreffamiliar',null,
                  array('label' => 'Dirección:',
                        'label_attr' => array('class' => 'largo')))
            ->add('telefonoreffamiliar',null,
                  array('label' => 'Telefono:',
                        'label_attr' => array('class' => 'largo')))
            /*->add('idcliente')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\ReferenciaFamiliar'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_referenciafamiliar';
    }
}
