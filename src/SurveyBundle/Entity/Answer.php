<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Model for a answer
 * @ORM\Entity
 * @ORM\Table(name="survey_question_answer")
 */
class Answer {

    /**
     * Answer identificator
     * @ORM\Id
     * @ORM\Column(type="string")
     * @var string
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SurveyBundle\Entity\QuestionAbstract")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * @var QuestionAbstract
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="IfroLdapBundle\Entity\FOSUser")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var \IfroLdapBundle\Entity\FOSUser
     */
    private $user;

    /**
     * @ORM\Column(type="array")
     * @var ArrayCollection
     */
    private $answers;

    public function __construct() {
        $this->id = uniqid();
        $this->answers = new ArrayCollection();
    }

    function getId() {
        return $this->id;
    }

    function getQuestion() {
        return $this->question;
    }

    function getUser() {
        return $this->user;
    }

    function getAnswers() {
        return $this->answers;
    }

    function setQuestion($question) {
        $this->question = $question;
        return $this;
    }

    function setUser($user) {
        $this->user = $user;
        return $this;
    }

    function setAnswers($answers) {
        $this->answers = $answers;
        return $this;
    }

}
