<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubtipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('muestra')
            ->add('unidades')
            ->add('valorinferiorh')
            ->add('valorsuperiorh')
            ->add('valorinferiorm')
            ->add('valorsuperiorm')
            ->add('interpretacionvalorinferior')
            ->add('interpretacionvalorsuperior')
            ->add('indicacion')
            ->add('servicio')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Subtipo'
        ));
    }
}
