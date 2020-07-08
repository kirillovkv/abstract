<?php
namespace Forms;
class TestForm extends AbstractForm{
    public function submit()
    {
        parent::submit();
        $fields = $this->getFields();
        if( is_array($fields) ){
            foreach ($fields as $field) {
                echo $field->getName() ." -> ".$field->getValue() ."\n";
            }

        }
    }
} 