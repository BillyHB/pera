<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteCreditoType extends AbstractType
{
    private $destinos;
    
    public function __construct($destinos) {
        $this->destinos = $destinos;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinocredito','choice',
                  array('label' => 'Destino:',
                        'label_attr' => array('class' => 'normal'),
                        'empty_value' => 'Seleccione...',
                        'choices'     => $this->destinos))
            ->add('idcredito',null,
                  array('empty_value' => 'Seleccione...',
                        'label' => 'Tipo Credito:',
                        'label_attr' => array('class' => 'normal required')))
            ->add('idcliente',null,
                  array('empty_value' => 'Seleccione...',
                        'label' => 'Cliente:',
                        'label_attr' => array('class' => 'normal required')))
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
