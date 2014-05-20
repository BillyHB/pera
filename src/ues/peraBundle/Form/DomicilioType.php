<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DomicilioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipodomicilio',null,
                  array('label'      => 'Tipo:',
                        'label_attr' => array('class' => 'largo')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\Domicilio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_domicilio';
    }
}
