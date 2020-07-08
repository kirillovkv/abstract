<?php
namespace Validators;


class Numeric extends AbstractValidator{
    public function isValid($value)
    {
        if (mb_strlen($value) != 11 &&  !preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $value) ){
            $this->setError("Не верный формат");
            return false;
        }
        return true;
    }
} 