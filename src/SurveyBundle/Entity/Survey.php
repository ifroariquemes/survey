<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Model for a survey
 * @ORM\Entity
 * @ORM\Table(name="survey")
 */
class Survey {

    /**
     * Survey identificator
     * @ORM\Id
     * @ORM\Column(type="string")
     * @var string
     */
    private $id;

    /**
     * Survey title
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;

    /**
     * Survey description
     * @ORM\Column(type="text")
     * @var string
     */
    private $description;

    /**
     * Survey's questions
     * @ORM\OneToMany(targetEntity="SurveyBundle\Entity\QuestionAbstract", mappedBy="survey")
     * @var ArrayCollection
     */
    private $questions;

    /**
     * Users that answered this survey
     * @ORM\ManyToMany(targetEntity="IfroLdapBundle\Entity\FOSUser", mappedBy="surveysAnswered")
     * @var ArrayCollection
     */
    private $usersAnswered;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $creation;

    public function __construct() {
        $this->id = uniqid();
        $this->questions = new ArrayCollection();
        $this->usersAnswered = new ArrayCollection();
        $this->creation = new \DateTime();
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getQuestions() {
        return $this->questions;
    }

    function getUsersAnswered() {
        return $this->usersAnswered;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    function setQuestions($questions) {
        $this->questions = $questions;
        return $this;
    }

    function setUsersAnswered($usersAnswered) {
        $this->usersAnswered = $usersAnswered;
        return $this;
    }

    function getCreation() {
        return $this->creation;
    }

}
