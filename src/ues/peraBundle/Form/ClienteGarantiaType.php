<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteGarantiaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idgarantia',null,
                  array('empty_value' => 'Seleccione...',
                        'label' => 'Tipo de Garantia:',
                        'label_attr' => array('class' => 'largo')))    
            ->add('docreferenciaclientegarantia',null,
                  array('label' => 'Doc. de Referencia:',
                        'label_attr' => array('class' => 'largo')))
            ->add('valorclientegarantia','money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Valorado en ($):',
                        'label_attr' => array('class' => 'largo'),
                        'attr' => array('class' => 'money')))
            ->add('ubicacionclientegarantia',null,
                  array('label' => 'Ubicación:',
                        'label_attr' => array('class' => 'largo')))
            ->add('observacionclientegarantia',null,
                  array('label' => 'Observaciones:',
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
            'data_class' => 'ues\peraBundle\Entity\ClienteGarantia',
            'label' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_clientegarantia';
    }
}
