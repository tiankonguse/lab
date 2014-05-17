<?php

trait ClassTest_method{

    private $name;
    
    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
    }

    function test(){
        echo "hello";
    }
}

?>
