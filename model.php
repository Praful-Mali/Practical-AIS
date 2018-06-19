<?php

class Model
{
    private $arry;
    
    public function setData($name,$value){
        $this->arry[$name]=$value;
    }
    public function getData($value){
        return $this->arry[$value];
    }
}

