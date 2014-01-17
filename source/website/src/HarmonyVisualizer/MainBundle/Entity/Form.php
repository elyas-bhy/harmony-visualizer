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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="formType", type="string", length=255, nullable=true)
     */
    private $formType;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="text", nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="text", nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="visualizationExperience", type="text", nullable=true)
     */
    private $visualizationExperience;

    /**
     * @var string
     *
     * @ORM\Column(name="deficiency", type="text", nullable=true)
     */
    private $deficiency;

    /**
     * @var string
     *
     * @ORM\Column(name="contributed", type="text", nullable=true)
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
     * @ORM\Column(name="q1Time", type="text", nullable=true)
     */ 
    private $q1Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q2", type="text")
     */
    private $q2;

    /**
     * @var string
     *
     * @ORM\Column(name="q2Time", type="text", nullable=true)
     */ 
    private $q2Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q3", type="text")
     */
    private $q3;

    /**
     * @var string
     *
     * @ORM\Column(name="q3Time", type="text", nullable=true)
     */ 
    private $q3Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q4", type="text")
     */
    private $q4;

    /**
     * @var string
     *
     * @ORM\Column(name="q4Time", type="text", nullable=true)
     */ 
    private $q4Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q5", type="text")
     */
    private $q5;

    /**
     * @var string
     *
     * @ORM\Column(name="q5Time", type="text", nullable=true)
     */ 
    private $q5Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q6", type="text")
     */
    private $q6;

    /**
     * @var string
     *
     * @ORM\Column(name="q6Time", type="text", nullable=true)
     */ 
    private $q6Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q7", type="text")
     */
    private $q7;

    /**
     * @var string
     *
     * @ORM\Column(name="q7Time", type="text", nullable=true)
     */ 
    private $q7Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q8", type="text")
     */
    private $q8;

    /**
     * @var string
     *
     * @ORM\Column(name="q8Time", type="text", nullable=true)
     */ 
    private $q8Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q9", type="text")
     */
    private $q9;

    /**
     * @var string
     *
     * @ORM\Column(name="q9Time", type="text", nullable=true)
     */ 
    private $q9Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q10", type="text")
     */
    private $q10;

    /**
     * @var string
     *
     * @ORM\Column(name="q10Time", type="text", nullable=true)
     */ 
    private $q10Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q11", type="text")
     */
    private $q11;

    /**
     * @var string
     *
     * @ORM\Column(name="q11Time", type="text", nullable=true)
     */ 
    private $q11Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q12", type="text")
     */
    private $q12;

    /**
     * @var string
     *
     * @ORM\Column(name="q12Time", type="text", nullable=true)
     */ 
    private $q12Time;

    /**
     * @var string
     *
     * @ORM\Column(name="q13", type="text")
     */
    private $q13;

    /**
     * @var string
     *
     * @ORM\Column(name="q13Time", type="text", nullable=true)
     */ 
    private $q13Time;


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
     * @param string $q8
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
     * @return string 
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

    /**
     * Set q13
     *
     * @param string $q13
     * @return Form
     */
    public function setQ13($q13)
    {
        $this->q13 = $q13;

        return $this;
    }

    /**
     * Get q13
     *
     * @return string 
     */
    public function getQ13()
    {
        return $this->q13;
    }  

    /**
     * Set q1Time
     *
     * @param string $q1Time
     * @return Form
     */
    public function setQ1Time($q1Time)
    {
        $this->q1Time = $q1Time;

        return $this;
    }

    /**
     * Get q1Time
     *
     * @return string 
     */
    public function getQ1Time()
    {
        return $this->q1Time;
    }  

    /**
     * Set q2Time
     *
     * @param string $q2Time
     * @return Form
     */
    public function setQ2Time($q2Time)
    {
        $this->q2Time = $q2Time;

        return $this;
    }

    /**
     * Get q2Time
     *
     * @return string 
     */
    public function getQ2Time()
    {
        return $this->q2Time;
    }  

    /**
     * Set q3Time
     *
     * @param string $q3Time
     * @return Form
     */
    public function setQ3Time($q3Time)
    {
        $this->q3Time = $q3Time;

        return $this;
    }

    /**
     * Get q3Time
     *
     * @return string 
     */
    public function getQ3Time()
    {
        return $this->q3Time;
    }  

    /**
     * Set q4Time
     *
     * @param string $q4Time
     * @return Form
     */
    public function setQ4Time($q4Time)
    {
        $this->q4Time = $q4Time;

        return $this;
    }

    /**
     * Get q4Time
     *
     * @return string 
     */
    public function getQ4Time()
    {
        return $this->q4Time;
    }  

    /**
     * Set q5Time
     *
     * @param string $q5Time
     * @return Form
     */
    public function setQ5Time($q5Time)
    {
        $this->q5Time = $q5Time;

        return $this;
    }

    /**
     * Get q5Time
     *
     * @return string 
     */
    public function getQ5Time()
    {
        return $this->q5Time;
    }  

    /**
     * Set q6Time
     *
     * @param string $q6Time
     * @return Form
     */
    public function setQ6Time($q6Time)
    {
        $this->q6Time = $q6Time;

        return $this;
    }

    /**
     * Get q6Time
     *
     * @return string 
     */
    public function getQ6Time()
    {
        return $this->q6Time;
    }  

    /**
     * Set q7Time
     *
     * @param string $q7Time
     * @return Form
     */
    public function setQ7Time($q7Time)
    {
        $this->q7Time = $q7Time;

        return $this;
    }

    /**
     * Get q7Time
     *
     * @return string 
     */
    public function getQ7Time()
    {
        return $this->q7Time;
    }    

    /**
     * Set q8Time
     *
     * @param string $q8Time
     * @return Form
     */
    public function setQ8Time($q8Time)
    {
        $this->q8Time = $q8Time;

        return $this;
    }

    /**
     * Get q8Time
     *
     * @return string 
     */
    public function getQ8Time()
    {
        return $this->q8Time;
    }  

    /**
     * Set q9Time
     *
     * @param string $q9Time
     * @return Form
     */
    public function setQ9Time($q9Time)
    {
        $this->q9Time = $q9Time;

        return $this;
    }

    /**
     * Get q9Time
     *
     * @return string 
     */
    public function getQ9Time()
    {
        return $this->q9Time;
    }  

    /**
     * Set q10Time
     *
     * @param string $q10Time
     * @return Form
     */
    public function setQ10Time($q10Time)
    {
        $this->q10Time = $q10Time;

        return $this;
    }

    /**
     * Get q10Time
     *
     * @return string 
     */
    public function getQ10Time()
    {
        return $this->q10Time;
    }  

    /**
     * Set q11Time
     *
     * @param string $q11Time
     * @return Form
     */
    public function setQ11Time($q11Time)
    {
        $this->q11Time = $q11Time;

        return $this;
    }

    /**
     * Get q11Time
     *
     * @return string 
     */
    public function getQ11Time()
    {
        return $this->q11Time;
    }  

    /**
     * Set q12Time
     *
     * @param string $q12Time
     * @return Form
     */
    public function setQ12Time($q12Time)
    {
        $this->q12Time = $q12Time;

        return $this;
    }

    /**
     * Get q12Time
     *
     * @return string 
     */
    public function getQ12Time()
    {
        return $this->q12Time;
    }  

    /**
     * Set q13Time
     *
     * @param string $q13Time
     * @return Form
     */
    public function setQ13Time($q13Time)
    {
        $this->q13Time = $q13Time;

        return $this;
    }

    /**
     * Get q13Time
     *
     * @return string 
     */
    public function getQ13Time()
    {
        return $this->q13Time;
    }  

    /**
     * Set formType
     *
     * @param string $formType
     * @return Form
     */
    public function setFormType($formType)
    {
        $this->formType = $formType;

        return $this;
    }

    /**
     * Get formType
     *
     * @return string 
     */
    public function getFormType()
    {
        return $this->formType;
    }
}
