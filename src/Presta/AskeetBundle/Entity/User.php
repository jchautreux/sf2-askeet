<?php
// src/Presta/AskeetBundle/Entity/User.php
namespace Presta\AskeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * 
 * 
 * @ORM\Entity(repositoryClass="Presta\AskeetBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity("username")
 * 
 * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 * @package package_name
 * @since	7 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 */
class User
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100), unique=true)
     *  
	 * @Assert\NotBlank()
	 */
	protected $username;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 * 
	 * @Assert\NotBlank()
	 */
	protected $password;
	
	/**
	 * @ORM\OneToMany(targetEntity="Question", mappedBy="user")
	 * @ORM\OrderBy({"createdDate" = "DESC"})
	 */
	protected $questions;
	
	
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add questions
     *
     * @param Presta\AskeetBundle\Entity\Question $questions
     */
    public function addQuestion(\Presta\AskeetBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;
    }

    /**
     * Get questions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}