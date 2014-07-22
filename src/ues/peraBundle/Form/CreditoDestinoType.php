<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreditoDestinoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iddestino',null,
                  array('empty_value' => 'Seleccione...',
                        'label'       => 'Destino:',
                        'label_attr'  => array('class' => 'largo')))
            //->add('idcredito')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\CreditoDestino',
            'label' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_creditodestino';
    }
}
