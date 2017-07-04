<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Model for a survey question
 * @ORM\Entity
 * @ORM\Table(name="survey_question")
 */
abstract class QuestionAbstract implements QuestionInterface {

    /**
     * Question identificator
     * @ORM\Id
     * @ORM\Column(type="string")
     * @var string
     */
    private $id;

    /**
     * Question enunciation
     * @ORM\Column(type="text")
     * @var string
     */
    private $enunciation;

    /**
     * Indicates if answering this question is mandatory
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $required;

    /**
     * Set of choices
     * @var ArrayCollection
     */
    protected $choices;

    public function __construct() {
        $this->id = uniqid();
        $this->choices = new ArrayCollection();
    }

    function getId() {
        return $this->id;
    }

    function getEnunciation() {
        return $this->enunciation;
    }

    function getRequired() {
        return $this->required;
    }

    function getChoices() {
        return $this->choices;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setEnunciation($enunciation) {
        $this->enunciation = $enunciation;
        return $this;
    }

    function setRequired($required) {
        $this->required = $required;
        return $this;
    }

}
