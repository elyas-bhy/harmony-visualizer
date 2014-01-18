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

        $array1to5 = array(
            '' => '',
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5
        );

        $array0to100 = array(
            '' => '',
            '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
            '10' => 10, '11' => 11, '12' => 12, '13' => 13, '14' => 14, '15' => 15, '16' => 16, '17' => 17, '18' => 18, '19' => 19,
            '20' => 20, '21' => 21, '22' => 22, '23' => 23, '24' => 24, '25' => 25, '26' => 26, '27' => 27, '28' => 28, '29' => 29,
            '30' => 30, '31' => 31, '32' => 32, '33' => 33, '34' => 34, '35' => 35, '36' => 36, '37' => 37, '38' => 38, '39' => 39,
            '40' => 40, '41' => 41, '42' => 42, '43' => 43, '44' => 44, '45' => 45, '46' => 46, '47' => 47, '48' => 48, '49' => 49,
            '50' => 50, '51' => 51, '52' => 52, '53' => 53, '54' => 54, '55' => 55, '56' => 56, '57' => 57, '58' => 58, '59' => 59,
            '60' => 60, '61' => 61, '62' => 62, '63' => 63, '64' => 64, '65' => 65, '66' => 66, '67' => 67, '68' => 68, '69' => 69,
            '70' => 70, '71' => 71, '72' => 72, '73' => 73, '74' => 74, '75' => 75, '76' => 76, '77' => 77, '78' => 78, '79' => 79,
            '80' => 80, '81' => 81, '82' => 82, '83' => 83, '84' => 84, '85' => 85, '86' => 86, '87' => 87, '88' => 88, '89' => 89,
            '90' => 90, '91' => 91, '92' => 92, '93' => 93, '94' => 94, '95' => 95, '96' => 96, '97' => 97, '98' => 98, '99' => 99,
            '100' => 100
        );

        $builder
            ->add('totalTime')
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
            ->add('q8', 'choice', array(
                'choices' => $array0to100,
            ))
            ->add('q8Time')
            ->add('q9', 'choice', array(
                'choices' => $array1to5,
            ))
            ->add('q9Time')
            ->add('q10', 'choice', array(
                'choices' => $array1to5,
            ))
            ->add('q10Time')
            ->add('q11', 'choice', array(
                'choices' => $array1to5,
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
