<?php

namespace HarmonyVisualizer\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('age')
            ->add('email', 'email')
            ->add('experience')
            ->add('job')
            ->add('visualizationExperience')
            ->add('deficiency')
            ->add('contributed')
            ->add('q1')
            ->add('q2')
            ->add('q3')
            ->add('q4')
            ->add('q5')
            ->add('q6')
            ->add('q7')
            ->add('q8')
            ->add('q9')
            ->add('q10')
            ->add('q11')
            ->add('q12')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HarmonyVisualizer\MainBundle\Entity\Form'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'harmonyvisualizer_mainbundle_form';
    }
}
