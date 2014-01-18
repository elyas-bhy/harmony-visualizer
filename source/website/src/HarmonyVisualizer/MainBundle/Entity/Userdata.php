<?php

namespace HarmonyVisualizer\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userdata
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HarmonyVisualizer\MainBundle\Entity\UserdataRepository")
 */
class Userdata
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
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

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
     * @return Userdata
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
     * @return Userdata
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
     * @return Userdata
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
     * @return Userdata
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
     * @return Userdata
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
     * @return Userdata
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
}
