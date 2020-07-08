<?php
namespace Validators;

use Fields\AbstractField;

abstract class AbstractValidator implements ValidatorInterface{

    private $error;
    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

    public function isValid($value)
    {
        return true;
    }
}