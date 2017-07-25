<?php

namespace SurveyBundle\View;

/**
 * Class to represent a visual control that will be rendered
 */
class VisualControl {

    const TEXT = 'text';
    const NUMBER = 'number';
    const RADIO = 'radio';
    const CHECKBOX = 'checkbox';
    const LARGE_TEXT = 'textarea';
    const TEXTAREA = 'textarea';
    const EMAIL = 'email';
    const DATE = 'date';
    const TIME = 'time';

    /**
     * Visual control type
     * @var string
     */
    private $type;

    /**
     * Visual control name
     * @var string
     */
    private $name;

    /**
     * Visual control initial or actual value
     * @var string
     */
    private $value;
    private $label;

    /**
     * Indicates if value is required or not
     * @var bool
     */
    private $required;

    /**
     * Allowed visual control types
     * @var type 
     */
    private $allowedTypes = ['text', 'number', 'radio', 'checkbox', 'textarea', 'email', 'date', 'time'];

    /**
     * Instantiates the object
     * @param string $type Visual control type 
     * @param string $name Visual control name
     * @param bool $required Indicates if value is required or not
     * @throws \Exception If value $type is not allowed or $name is empty
     */
    public function __construct($type, $name, $label, $required = false) {
        if (!in_array($type, $this->allowedTypes)) {
            throw new \Exception("Visual control type not allowed ($type).");
        }
        if (empty($name)) {
            throw new \Exception('Visual control name cannot be empty.');
        }
        $this->type = $type;
        $this->name = sprintf('%s_%s', $type, $name);
        $this->label = $label;
        $this->required = $required;
    }

    function getType() {
        return $this->type;
    }

    function getName() {
        return $this->name;
    }

    function getRequired() {
        return $this->required;
    }

    function getValue() {
        return $this->value;
    }

    function setType($type) {
        $this->type = $type;
        return $this;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function setRequired($required) {
        $this->required = $required;
        return $this;
    }

    function setValue($value) {
        $this->value = $value;
        return $this;
    }

    function getLabel() {
        return $this->label;
    }

    function getAllowedTypes(): type {
        return $this->allowedTypes;
    }

    function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    /**
     * Returns the HTML for this visual control
     * @return string
     */
    function getHTML() {
        $id = uniqid('vs_');
        $required = ($this->required) ? 'required="required"' : '';
        switch ($this->type) {
            case self::TEXTAREA:
                return <<<TXA
<label for="$id">$this->label</label>
<textarea class="form-control" name="$this->name" id="$id" $required>$this->value</textarea>
TXA;
            case self::CHECKBOX:
            case self::RADIO:
                return <<<INP
<input type="$this->type" name="$this->name" id="$id" $required value="$this->value">
<label for="$id">$this->label</label>
INP;
            default:
                return <<<INP
<input type="$this->type" class="form-control" name="$this->name" id="$id" $required value="$this->value">
<label for="$id">$this->label</label>
INP;
        }
    }

}
