<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('precioServicio')
            ->add('nombrePersona')
            ->add('fechaNacimientoPersona', 'date')
            ->add('sexoPersona')
            ->add('correoPersona')
            ->add('telefonoPersona')
            ->add('nombreImagen')
            ->add('estadoCita')
            ->add('fechaReserva', 'datetime')
            ->add('fechaCreacion', 'datetime')
            ->add('servicio')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cita'
        ));
    }
}
