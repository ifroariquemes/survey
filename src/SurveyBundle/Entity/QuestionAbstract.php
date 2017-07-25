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
     * @ORM\Column(type="array")
     * @var ArrayCollection
     */
    protected $choices;

    /**
     * The question class name
     * @ORM\Column(type="string")
     * @var string
     */
    protected $questionType;
    
    /**
     * The main survey
     * @ORM\ManyToOne(targetEntity="SurveyBundle\Entity\Survey", inversedBy="questions")
     * @ORM\JoinColumn(name="survey_id", referencedColumnName="id")
     * @var Survey
     */
    protected $survey;
    

    public function __construct() {
        $this->id = uniqid();
        $this->choices = new ArrayCollection();
        $this->questionType = __CLASS__;
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

    function setEnunciation($enunciation) {
        $this->enunciation = $enunciation;
        return $this;
    }

    function setRequired($required) {
        $this->required = $required;
        return $this;
    }

    function getChoicesHTML() {
        $html = '';
        foreach ($this->getChoices() as $choice) {
            $html .= sprintf('<p>%s</p>', $choice->getHTML());
        }
        return $html;
    }

    function getQuestionType() {
        return $this->questionType;
    }

}
