<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DestinoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomdestino',null,
                  array('label'      => 'Destino:',
                        'label_attr' => array('class' => 'largo')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\Destino'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_destino';
    }
}
