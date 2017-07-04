<?php

namespace SurveyBundle\Entity;

/**
 * Interface for a survey question
 */
interface QuestionInterface {

    /**
     * Any question has choice(s) that depends on what type of question you have
     */
    public function getChoices();

    /**
     * Returns the question class name
     */
    public function getQuestionType();

    /**
     * 
     */
    public function addChoice($label);
}
