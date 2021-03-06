<?php
/**
 * Transmission FormType for Transmission operations
 *
 * @author Nik Spijkerman <nikspijkerman@gmail.com>
* @package api
* @category form type
* @since 2015.05.29
*/

namespace ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransmissionType extends AbstractType
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
            ->add('manufacturers')
        
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMS\CommonBundle\Entity\Transmission',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'transmission';
    }
}
