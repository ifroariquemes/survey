<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SurveyBundle\View\VisualControl;

class QuestionMultipleChoice extends QuestionAbstract {

    public function addChoice($label) {
        $choice = new VisualControl(VisualControl::CHECKBOX, $this->getId() . '[]', $label, $this->getRequired());
        $choice->setValue($label);
        $this->choices->add($choice);
    }

    public function getQuestionType() {
        return __CLASS__;
    }

    /* public function getChoicesHTML() {
      $required = $this->getRequired() ? 'required' : '';
      return sprintf('<div class="checkbox-group %s">%s</div>', $required, parent::getChoicesHTML());
      } */
}
