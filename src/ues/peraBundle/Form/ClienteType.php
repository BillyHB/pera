<?php

namespace ues\peraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    private $municipios;
    
    public function __construct($municipios) {
        $this->municipios = $municipios;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombrescliente',null,
                  array('label' => 'Nombres:',
                        'attr'  => array('class' => 'nombre'),
                        'label_attr' => array('class' => 'largo')))
            ->add('primapellidocliente',null,
                  array('label' => 'Primer Apellido:',
                        'label_attr' => array('class' => 'largo')))
            ->add('segapellidocliente',null,
                  array('label' => 'Segundo Apellido:',
                        'label_attr' => array('class' => 'largo')))
            ->add('lecturafirmacliente',null,
                  array('label' => 'Como se lee Firma:',
                        'label_attr' => array('class' => 'largo')))
            ->add('duicliente',null,
                  array('label' => 'D.U.I.:',
                        'label_attr' => array('class' => 'largo')))
            ->add('duifechaexpcliente',null,
                  array('label' => 'Fecha de Expedición:',
                        'label_attr' => array('class' => 'largo'),
                        'attr' => array('class' => 'date'),
                        'widget' => 'single_text',
                        'format' => 'dd-MM-yyyy'))
            ->add('duilugarexpcliente',null,
                  array('label' => 'Lugar de Expedición:',
                        'label_attr' => array('class' => 'largo')))
            ->add('issscliente',null,
                  array('label' => 'I.S.S.S.:',
                        'label_attr' => array('class' => 'largo')))
            ->add('nitcliente',null,
                  array('label' => 'N.I.T.:',
                        'label_attr' => array('class' => 'largo')))
            ->add('telefonocliente',null,
                  array('label' => 'Telefono:',
                        'label_attr' => array('class' => 'largo')))
            ->add('estadocivilcliente','choice',
                  array('label' => 'Estado Civil:',
                        'label_attr' => array('class' => 'largo'),
                        'choices'   => array('s' => 'Soltero/a', 'c' => 'Casado/a', 'v' => 'Viudo/a')
                       ))
            ->add('sexocliente','choice',
                  array('label'     => 'Sexo:',
                        'label_attr' => array('class' => 'largo'),
                        'choices'   => array('m' => 'Masculino', 'f' => 'Femenino')
                       ))
            ->add('profesioncliente',null,
                  array('label' => 'Profesión u Oficio:',
                        'label_attr' => array('class' => 'largo')))
            ->add('nomconyugcliente',null,
                  array('label' => 'Nombre del Conyuge:',
                        'label_attr' => array('class' => 'largo'),
                        'attr'  => array('class' => 'nombre')))
            ->add('numhijocliente',null,
                  array('label' => 'No. de Hijos:',
                        'label_attr' => array('class' => 'largo'),
                        'attr' => array('min' => 0, 'max'=> 15)                        
                       ))
            ->add('fechaingresocliente',null,
                  array('label' => 'Fecha de Ingreso:',
                        'label_attr' => array('class' => 'largo'),
                        'attr' => array('class' => 'date'),                        
                        'widget' => 'single_text',
                        'format' => 'dd-MM-yyyy'))
            
            ->add('ingresosfamiliares', new IngresosFamiliaresType(),
                  array('label' => "Ingresos Familiares")
                 )
                
            ->add('gastosfamiliares', new GastosFamiliaresType(),
                  array('label' => "Gastos Familiares")
                 )
            
            ->add('negocio', new NegocioType($this->municipios),
                  array('label'    => "Información del Negocio",
                        //'required' => false
                        )
                 )
                
            ->add('refslaboral', 'collection', array(
                  'label'       => "Referencias Laborales",
                  'type'        => new ReferenciaLaboralType(),
                  'allow_add'   => true,
                  'allow_delete'=> true,
                  'by_reference'=> false
                  ))
                
            ->add('refsfamiliar', 'collection', array(
                  'label'       => "Referencias Familiares",
                  'type'        => new ReferenciaFamiliarType(),
                  'allow_add'   => true,
                  'allow_delete'=> true,
                  'by_reference'=> false
                  ))
        
            ->add('clientegarantias', 'collection', array(
                  'label'       => "Garantias",
                  'type'        => new ClienteGarantiaType(),
                  'allow_add'   => true,
                  'allow_delete'=> true,
                  'by_reference'=> false
                  ))
            
            ->add('clientedomicilio', 'collection', array(
                  'label'       => "Domicilio",
                  'type'        => new ClienteDomicilioType($this->municipios),
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
            'data_class' => 'ues\peraBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ues_perabundle_cliente';
    }
}
