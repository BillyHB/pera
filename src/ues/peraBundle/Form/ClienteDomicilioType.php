<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteDomicilioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iddomicilio',null,
                  array('empty_value' => 'Seleccione...',
                        'label' => 'Tipo de Domicilio:',
                        'label_attr' => array('class' => 'largo')))
            ->add('deptoclientedomicilio',null,
                  array('label' => 'Departamento:',
                        'label_attr' => array('class' => 'largo')))
            ->add('municipioclientedomicilio',null,
                  array('label' => 'Municipio:',
                        'label_attr' => array('class' => 'largo')))
            ->add('direccionclientedomicilio',null,
                  array('label' => 'Dirección:',
                        'label_attr' => array('class' => 'largo')))
            ->add('telefonoclientedomicilio',null,
                  array('label' => 'Telefono:',
                        'label_attr' => array('class' => 'largo')))
            ->add('horarioclientedomicilio',null,
                  array('label' => 'Horario de permanencia:',
                        'label_attr' => array('class' => 'largo')))
            ->add('aniosresidenciaclientedomicilio',null,
                  array('label' => 'No. Años de residencia:',
                        'label_attr' => array('class' => 'largo')))
            ->add('alquilerclientedomicilio','choice',
                  array('label' => 'Pertenencia:',
                        'label_attr' => array('class' => 'largo'),
                        'choices'   => array('p' => 'Propio', 'a' => 'Alquilado', 'c' => 'Compartido')
                       ))
            ->add('institucionclientedomicilio',null,
                  array('label' => 'Institución:',
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
            'data_class' => 'ues\peraBundle\Entity\ClienteDomicilio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_clientedomicilio';
    }
}
