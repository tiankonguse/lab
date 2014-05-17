<?php

include("classTest.php");

$test = new ClassTest();

$test->test();
$test->setName("test");
$name = $test->getName();
echo "<br>";
var_dump($name);

