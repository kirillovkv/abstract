<?php
namespace Validators;
class Email extends AbstractValidator{
    public function isValid($value)
    {
        if( preg_match('/([\w_\-\.]+@[\w\-]+\.[\w]+)/',$value) == 0){
            $this->setError("Неверный Email.");
            return false;
        }
        return true;
    }
} 