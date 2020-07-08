<?php
namespace Validators;

interface ValidatorInterface {
    public function getError();
    public function isValid($value);
} 