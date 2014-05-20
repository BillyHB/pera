<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteCreditoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinocredito',null,
                  array('label' => 'Destino:',
                        'label_attr' => array('class' => 'normal')))
            ->add('idcredito',null,
                  array('empty_value' => 'seleccione...',
                        'label' => 'Tipo Credito:',
                        'label_attr' => array('class' => 'normal')))
            ->add('idcliente',null,
                  array('empty_value' => 'seleccione...',
                        'label' => 'Cliente:',
                        'label_attr' => array('class' => 'normal')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\ClienteCredito'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_clientecredito';
    }
}
