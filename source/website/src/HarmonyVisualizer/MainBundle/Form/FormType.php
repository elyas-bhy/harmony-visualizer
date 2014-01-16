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
            ->add('email', 'email')
            ->add('experience')
            ->add('job')
            ->add('visualizationExperience')
            ->add('deficiency')
            ->add('contributed')
            ->add('q1')
            ->add('q1Time')
            ->add('q2')
            ->add('q2Time')
            ->add('q3')
            ->add('q3Time')
            ->add('q4')
            ->add('q4Time')
            ->add('q5')
            ->add('q5Time')
            ->add('q6')
            ->add('q6Time')
            ->add('q7')
            ->add('q7Time')
            ->add('q8')
            ->add('q8Time')
            ->add('q9')
            ->add('q9Time')
            ->add('q10')
            ->add('q10Time')
            ->add('q11')
            ->add('q11Time')
            ->add('q12')
            ->add('q12Time')
            ->add('q13')
            ->add('q13Time')
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
