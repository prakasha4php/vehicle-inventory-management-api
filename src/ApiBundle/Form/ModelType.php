<?php

namespace ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('dateAdded', 'datetime', ['widget' => 'single_text'])
            ->add('dateUpdated', 'datetime', ['widget' => 'single_text'])
            ->add('isVerified')
            ->add('status')
            ->add('modelGroup')
            ->add('manufacturer')
            ->add('engines')
            ->add('equipment')
            ->add('variants')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMS\CommonBundle\Entity\Model',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'model';
    }
}
