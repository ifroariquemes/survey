<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SurveyBundle\View\VisualControl;

class QuestionObjective extends QuestionAbstract {

    public function addChoice($label) {
        $choice = new VisualControl(VisualControl::RADIO, $this->getId(), $label, $this->getRequired());
        $this->choices->add($choice);
    }

    public function getQuestionType() {
        return __CLASS__;
    }

}
