<?php
namespace Forms;

interface FormInterface {
    public function validate();
    public function isValid();
    public function submit();
    public function addField($type, $name);
} 