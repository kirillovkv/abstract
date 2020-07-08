<?php
namespace Fields;
class Numeric extends AbstractField{
    public function __construct(){
        $this->setType('numeric');
        $this->addValidateRule(['validator'=>'numeric']);
    }
} 