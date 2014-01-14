<?php

namespace HarmonyVisualizer\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Form
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HarmonyVisualizer\MainBundle\Entity\FormRepository")
 */
class Form
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="text")
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="text")
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="visualizationExperience", type="text")
     */
    private $visualizationExperience;

    /**
     * @var string
     *
     * @ORM\Column(name="deficiency", type="text")
     */
    private $deficiency;

    /**
     * @var string
     *
     * @ORM\Column(name="contributed", type="text")
     */
    private $contributed;

    /**
     * @var string
     *
     * @ORM\Column(name="q1", type="text")
     */
    private $q1;

    /**
     * @var string
     *
     * @ORM\Column(name="q2", type="text")
     */
    private $q2;

    /**
     * @var string
     *
     * @ORM\Column(name="q3", type="text")
     */
    private $q3;

    /**
     * @var string
     *
     * @ORM\Column(name="q4", type="text")
     */
    private $q4;

    /**
     * @var string
     *
     * @ORM\Column(name="q5", type="text")
     */
    private $q5;

    /**
     * @var string
     *
     * @ORM\Column(name="q6", type="text")
     */
    private $q6;

    /**
     * @var string
     *
     * @ORM\Column(name="q7", type="text")
     */
    private $q7;

    /**
     * @var float
     *
     * @ORM\Column(name="q8", type="float")
     */
    private $q8;

    /**
     * @var string
     *
     * @ORM\Column(name="q9", type="text")
     */
    private $q9;

    /**
     * @var string
     *
     * @ORM\Column(name="q10", type="text")
     */
    private $q10;

    /**
     * @var string
     *
     * @ORM\Column(name="q11", type="text")
     */
    private $q11;

    /**
     * @var string
     *
     * @ORM\Column(name="q12", type="text")
     */
    private $q12;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Form
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Form
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Form
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return Form
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return Form
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set visualizationExperience
     *
     * @param string $visualizationExperience
     * @return Form
     */
    public function setVisualizationExperience($visualizationExperience)
    {
        $this->visualizationExperience = $visualizationExperience;

        return $this;
    }

    /**
     * Get visualizationExperience
     *
     * @return string 
     */
    public function getVisualizationExperience()
    {
        return $this->visualizationExperience;
    }

    /**
     * Set deficiency
     *
     * @param string $deficiency
     * @return Form
     */
    public function setDeficiency($deficiency)
    {
        $this->deficiency = $deficiency;

        return $this;
    }

    /**
     * Get deficiency
     *
     * @return string 
     */
    public function getDeficiency()
    {
        return $this->deficiency;
    }

    /**
     * Set contributed
     *
     * @param string $contributed
     * @return Form
     */
    public function setContributed($contributed)
    {
        $this->contributed = $contributed;

        return $this;
    }

    /**
     * Get contributed
     *
     * @return string 
     */
    public function getContributed()
    {
        return $this->contributed;
    }

    /**
     * Set q1
     *
     * @param string $q1
     * @return Form
     */
    public function setQ1($q1)
    {
        $this->q1 = $q1;

        return $this;
    }

    /**
     * Get q1
     *
     * @return string 
     */
    public function getQ1()
    {
        return $this->q1;
    }

    /**
     * Set q2
     *
     * @param string $q2
     * @return Form
     */
    public function setQ2($q2)
    {
        $this->q2 = $q2;

        return $this;
    }

    /**
     * Get q2
     *
     * @return string 
     */
    public function getQ2()
    {
        return $this->q2;
    }

    /**
     * Set q3
     *
     * @param string $q3
     * @return Form
     */
    public function setQ3($q3)
    {
        $this->q3 = $q3;

        return $this;
    }

    /**
     * Get q3
     *
     * @return string 
     */
    public function getQ3()
    {
        return $this->q3;
    }

    /**
     * Set q4
     *
     * @param string $q4
     * @return Form
     */
    public function setQ4($q4)
    {
        $this->q4 = $q4;

        return $this;
    }

    /**
     * Get q4
     *
     * @return string 
     */
    public function getQ4()
    {
        return $this->q4;
    }

    /**
     * Set q5
     *
     * @param string $q5
     * @return Form
     */
    public function setQ5($q5)
    {
        $this->q5 = $q5;

        return $this;
    }

    /**
     * Get q5
     *
     * @return string 
     */
    public function getQ5()
    {
        return $this->q5;
    }

    /**
     * Set q6
     *
     * @param string $q6
     * @return Form
     */
    public function setQ6($q6)
    {
        $this->q6 = $q6;

        return $this;
    }

    /**
     * Get q6
     *
     * @return string 
     */
    public function getQ6()
    {
        return $this->q6;
    }

    /**
     * Set q7
     *
     * @param string $q7
     * @return Form
     */
    public function setQ7($q7)
    {
        $this->q7 = $q7;

        return $this;
    }

    /**
     * Get q7
     *
     * @return string 
     */
    public function getQ7()
    {
        return $this->q7;
    }

    /**
     * Set q8
     *
     * @param float $q8
     * @return Form
     */
    public function setQ8($q8)
    {
        $this->q8 = $q8;

        return $this;
    }

    /**
     * Get q8
     *
     * @return float 
     */
    public function getQ8()
    {
        return $this->q8;
    }

    /**
     * Set q9
     *
     * @param string $q9
     * @return Form
     */
    public function setQ9($q9)
    {
        $this->q9 = $q9;

        return $this;
    }

    /**
     * Get q9
     *
     * @return string 
     */
    public function getQ9()
    {
        return $this->q9;
    }

    /**
     * Set q10
     *
     * @param string $q10
     * @return Form
     */
    public function setQ10($q10)
    {
        $this->q10 = $q10;

        return $this;
    }

    /**
     * Get q10
     *
     * @return string 
     */
    public function getQ10()
    {
        return $this->q10;
    }

    /**
     * Set q11
     *
     * @param string $q11
     * @return Form
     */
    public function setQ11($q11)
    {
        $this->q11 = $q11;

        return $this;
    }

    /**
     * Get q11
     *
     * @return string 
     */
    public function getQ11()
    {
        return $this->q11;
    }

    /**
     * Set q12
     *
     * @param string $q12
     * @return Form
     */
    public function setQ12($q12)
    {
        $this->q12 = $q12;

        return $this;
    }

    /**
     * Get q12
     *
     * @return string 
     */
    public function getQ12()
    {
        return $this->q12;
    }
}
