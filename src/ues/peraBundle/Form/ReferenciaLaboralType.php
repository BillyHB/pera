<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReferenciaLaboralType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreempresareflaboral',null,
                  array('label' => 'Empresa en que Labora:',
                        'label_attr' => array('class' => 'largo')))
            ->add('direccionreflaboral',null,
                  array('label' => 'Dirección:',
                        'label_attr' => array('class' => 'largo')))
            ->add('telefonoreflaboral',null,
                  array('label' => 'Telefono:',
                        'label_attr' => array('class' => 'largo')))
            ->add('cargoreflaboral',null,
                  array('label' => 'Cargo que Desempeña:',
                        'label_attr' => array('class' => 'largo')))
            ->add('salarioreflaboral', 'money',
                  array('currency' => null,
                        'grouping' => true,
                        'label' => 'Salario:',
                        'label_attr' => array('class' => 'largo'),
                        'attr' => array('class' => 'money')))
            ->add('nombrejefereflaboral',null,
                  array('label' => 'Nombre de jefe inmediato:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'nombre')))
            /*->add('idcliente')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ues\peraBundle\Entity\ReferenciaLaboral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_referencialaboral';
    }
}
