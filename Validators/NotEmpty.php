<?php
namespace Validators;


class NotEmpty extends AbstractValidator{
    public function isValid($value)
    {
        if( preg_match('/(\S)/',$value) == 0){
            $this->setError("Заполните данные!");
            return false;
        }
        return true;
    }
} 