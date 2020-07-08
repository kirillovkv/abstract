<?php
namespace Forms;
use Fields\AbstractField;
use Fields\FieldFactory;
use Validators\ValidatorFactory;

class AbstractForm implements FormInterface{

    private $fields;

    public function __set($name, $value)
    {
        if( isset($this->fields[$name]) ){
            $this->fields[$name]->setValue($value);
        }else{
            throw new \Exception("Не известное поле {$name}.");
        }
    }

    public function __get($name)
    {
        if(isset($this->fields[$name])){
            return $this->fields[$name];
        }else{
            return "Не известное поле {$name}.";
        }
    }
    public function getFields()
    {
        return $this->fields;
    }
    private $errors;

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($fieldName, $error)
    {
        if( !is_array($this->errors) ){
            $this->errors = [];
        }
        if(!isset($this->errors[$fieldName])){
            $this->errors[$fieldName] = [];
        }
        $this->errors[$fieldName] = $error;
    }

    public function validate()
    {
        if( is_array($this->fields) ){
            foreach ($this->fields as $field) {
                if($field instanceof AbstractField){
                    $validateRules = $field->getValidateRules();
                    foreach ($validateRules as $rule) {
                        $validator = ValidatorFactory::build($rule);
                        if( !$validator->isValid($field->getValue()) ){
                            $this->addError($field->getName(), $validator->getError());
                        }
                    }
                }else{
                    throw new \Exception("Только обьект!");
                }
            }
        }
    }


    public function isValid()
    {
        $this->validate();
        if( !empty($this->errors) ){
            return false;
        }
        return true;
    }

    public function submit()
    {
        if( !$this->isValid() ){
            echo "Неверные данные:\n";
            foreach ($this->errors as $filedName=>$error) {
                echo $filedName . " -> " . $error ."\n";
            }
            echo "Выход";
            exit;
        }else{
            echo "Ok\n";
        }
    }

    public function addField($type, $name)
    {
        if(!is_array($this->fields)){
            $this->fields = [];
        }
        if( isset($this->fields[$name]) ){
            throw new \Exception("{$name} уже существует!");
        }
        if( is_string($type) && is_string($name) && !empty($type) && !empty($name) ){
            $field = FieldFactory::build($type);
            $field->setName($name);
            $this->fields[$name] = $field;
        }
    }

} 