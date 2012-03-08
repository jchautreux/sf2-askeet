<?php
// src/Presta/AskeetBundle/Entity/Question.php
namespace Presta\AskeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 * 
 * @ORM\Entity(repositoryClass="Presta\AskeetBundle\Repository\QuestionRepository")
 * @ORM\Table(name="question")
 * @ORM\HasLifecycleCallbacks()
 * 
 * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 * @package package_name
 * @since	7 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 */
class Question
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 * 
	 * @Assert\NotBlank()
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="text")
	 * 
	 * @Assert\NotBlank()
	 */
	protected $content;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $createdDate;
	
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="questions")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
	 */
	protected $user;
	
	/**
	 * @ORM\OneToMany(targetEntity="Answer", mappedBy="question")
	 * @ORM\OrderBy({"createdDate" = "DESC"})
	 */
	protected $answers;
	
	
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set authorName
     *
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * Get authorName
     *
     * @return string 
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set user
     *
     * @param Presta\AskeetBundle\Entity\User $user
     */
    public function setUser(\Presta\AskeetBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Presta\AskeetBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add answers
     *
     * @param Presta\AskeetBundle\Entity\Answer $answers
     */
    public function addAnswer(\Presta\AskeetBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;
    }

    /**
     * Get answers
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
    
    /**
    * @ORM\prePersist
    */
    public function setCreatedDateValue()
    {
    	$this->createdDate = new \DateTime();
    }
}