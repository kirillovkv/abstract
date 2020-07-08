<?php
namespace Fields;

abstract class AbstractField {
    private $type;
    private $value;
    private $validateRules;
    private $name;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getType()
    {
        if(empty($this->type)){
            $this->type = 'text'; 
        }
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getValidateRules()
    {

        if( !is_array($this->validateRules) ){
            $this->validateRules = []; 
        }
        return $this->validateRules;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function addValidateRule($rule)
    {
        if( !is_array($rule) || !isset($rule['validator']) ){
            throw new \Exception("Неверный формат!");
        }
        $this->validateRules[] = $rule;
    }
} 
