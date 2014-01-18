<?php

namespace HarmonyVisualizer\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserdataType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('experience', 'choice', array(
                'choices' => array(
                    '' => '',
                    'beginner' => 'beginner',
                    'novice' => 'novice',
                    'intermediate' => 'intermediate',
                    'expert' => 'expert'
                ),
            ))
            ->add('job')
            ->add('visualizationExperience', 'choice', array(
                'choices' => array(
                    '' => '',
                    'Yes' => 'Yes',
                    'No' => 'No'
                ),
            ))
            ->add('deficiency', 'choice', array(
                'choices' => array(
                    '' => '',
                    'Yes' => 'Yes',
                    'No' => 'No'
                ),
            ))
            ->add('contributed')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HarmonyVisualizer\MainBundle\Entity\Userdata'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'harmonyvisualizer_mainbundle_userdata';
    }
}
