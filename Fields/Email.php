<?php
namespace Fields;
class Email extends AbstractField{
    public function __construct(){
        $this->setType('text');
        $this->addValidateRule(['validator'=>'email']);
    }

} 