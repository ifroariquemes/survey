<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SurveyBundle\View\VisualControl;

/**
 * @ORM\Entity
 * @ORM\Table(name="survey_question_discursive")
 */
class QuestionDiscursive extends QuestionAbstract {

    public function __construct() {
        parent::__construct();
        $answer = new VisualControl(VisualControl::LARGE_TEXT, $this->getId(), $this->getEnunciation(), $this->getRequired());
        $this->choices->add($answer);
    }
    
    public function addChoice($label) {
        return;
    }
    
    public function setEnunciation($enunciation) {
        parent::setEnunciation($enunciation);
        $this->choices->get(0)->setLabel($enunciation);
    }

    public function getQuestionType() {
        return __CLASS__;
    }

}
