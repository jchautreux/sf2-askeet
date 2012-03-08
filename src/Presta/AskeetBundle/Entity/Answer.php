<?php
// src/Presta/AskeetBundle/Entity/Answer.php
namespace Presta\AskeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 * 
 * @ORM\Entity(repositoryClass="Presta\AskeetBundle\Repository\AnswerRepository")
 * @ORM\Table(name="answer")
 * 
 * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 * @package package_name
 * @since	7 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
 */
class Answer
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="text")
	 * 
	 * @Assert\NotBlank()
	 */
	protected $content;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $authorName;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $createdDate;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
	 * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
	 */
	protected $question;

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
     * Set question
     *
     * @param Presta\AskeetBundle\Entity\Question $question
     */
    public function setQuestion(\Presta\AskeetBundle\Entity\Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return Presta\AskeetBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
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
}