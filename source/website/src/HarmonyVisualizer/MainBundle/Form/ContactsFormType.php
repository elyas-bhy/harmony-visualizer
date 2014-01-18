<?php

namespace HarmonyVisualizer\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactsFormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $developers = array(
            '' => '',
            "Andrew Grieve" => "Andrew Grieve",
            "Anis Kadri" => "Anis Kadri",
            "Archana Naik" => "Archana Naik",
            "Benn Mapes" => "Benn Mapes",
            "Bryan Higgins" => "Bryan Higgins",
            "David Kemp" => "David Kemp",
            "Gao Chun" => "Gao Chun",
            "Hardeep Shoker" => "Hardeep Shoker",
            "Herm Wong" => "Herm Wong",
            "Ian Clelland" => "Ian Clelland",
            "James Jong" => "James Jong",
            "Jeffrey Heifetz" => "Jeffrey Heifetz",
            "Jesse MacFadyen" => "Jesse MacFadyen",
            "Joe Bowser" => "Joe Bowser",
            "Kristoffer Flores" => "Kristoffer Flores",
            "lmnbeyond" => "lmnbeyond",
            "lorinbeer" => "lorinbeer",
            "Max Woghiren" => "Max Woghiren",
            "Maxim Ermilov" => "Maxim Ermilov",
            "Piotr Zalewa" => "Piotr Zalewa",
            "purplecabbage" => "purplecabbage",
            "sgrebnov" => "sgrebnov",
            "Shazron Abdullah" => "Shazron Abdullah",
            "Steven Gill" => "Steven Gill",
            "Tim Kim" => "Tim Kim"
        );

        $modules = array(
            '' => '',
            "/" => "/",
            "doc" => "doc",
            "docs" => "docs",
            "docs/Contact" => "docs/Contact",
            "docs/ContactAddress" => "docs/ContactAddress",
            "docs/ContactError" => "docs/ContactError",
            "docs/ContactField" => "docs/ContactField",
            "docs/ContactFindOptions" => "docs/ContactFindOptions",
            "docs/ContactName" => "docs/ContactName",
            "docs/ContactOrganization" => "docs/ContactOrganization",
            "docs/parameters" => "docs/parameters",
            "src/android" => "src/android",
            "src/blackberry10" => "src/blackberry10",
            "src/firefoxos" => "src/firefoxos",
            "src/ios" => "src/ios",
            "src/ubuntu" => "src/ubuntu",
            "src/wp" => "src/wp",
            "src/wp7" => "src/wp7",
            "src/wp8" => "src/wp8",
            "test" => "test",
            "test/autotest" => "test/autotest",
            "test/autotest/html" => "test/autotest/html",
            "test/autotest/pages" => "test/autotest/pages",
            "test/autotest/tests" => "test/autotest/tests",
            "test/contacts" => "test/contacts",
            "www" => "www",
            "www/ios" => "www/ios"
        );

        $builder
            ->add('formType')
            ->add('userid')
            ->add('q1', 'choice', array(
                'choices' => $developers,
            ))
            ->add('q1Time')
            ->add('q2', 'choice', array(
                'choices' => $developers,
            ))
            ->add('q2Time')
            ->add('q3', 'choice', array(
                'choices' => $modules,
            ))
            ->add('q3Time')
            ->add('q4', 'choice', array(
                'choices' => $modules,
            ))
            ->add('q4Time')
            ->add('q5', 'choice', array(
                'choices' => $modules,
            ))
            ->add('q5Time')
            ->add('q6', 'choice', array(
                'choices' => $developers,
            ))
            ->add('q6Time')
            ->add('q7', 'choice', array(
                'choices' => $modules,
            ))
            ->add('q7Time')
            ->add('q8', 'integer', array(
                'attr' => array(
                    'min' => 0,
                    'max' => 100)
            ))
            ->add('q8Time')
            ->add('q9', 'integer', array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5)
            ))
            ->add('q9Time')
            ->add('q10', 'integer', array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5)
            ))
            ->add('q10Time')
            ->add('q11', 'integer', array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5)
            ))
            ->add('q11Time')
            ->add('q12', 'choice', array(
                'choices' => $developers,
            ))
            ->add('q12Time')
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
