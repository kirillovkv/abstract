<?php
namespace Fields;
class FieldFactory {
    public static function build($fieldType){
        $field = "\\Fields\\" . ucfirst($fieldType);
        if(!class_exists($field)){
            throw new \Exception("Неверный тип поля ". $field);
        }
        return new $field;
    }
} 