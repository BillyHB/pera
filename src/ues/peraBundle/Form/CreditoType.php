<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreditoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomcredito',null,
                  array('label'      => 'Nombre:',
                        'label_attr' => array('class' => 'largo')))
                
            ->add('creditodestino', 'collection', array(
                  'label'       => "destinos",
                  'type'        => new CreditoDestinoType(),
                  'allow_add'   => true,
                  'allow_delete'=> true,
                  'by_reference'=> false
                  ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\Credito'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_credito';
    }
}
