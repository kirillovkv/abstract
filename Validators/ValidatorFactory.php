<?php
namespace Validators;
class ValidatorFactory {
    public static function build($validator){
        if( is_array($validator) ){
            $params = false;
            if( isset($validator[1]) ){
                $params = $validator[1];
            }
            $validator = $validator['validator'];
            $className = "\\Validators\\" . ucfirst($validator);
            if(!class_exists($className)){
                throw new \Exception("Неверный тип валидатора");
            }
            return new $className($params);
        }else{
            throw new \InvalidArgumentException();
        }
    }
} 