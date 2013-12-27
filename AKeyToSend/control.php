<?php
session_start();
require("../inc/common.php");

$json = new Services_JSON();
require("./fetion.php");

if(!isset($_GET["state"])){
    echo $json->encode(output(OUTPUT_ERROR,"非法操作"));
}else{
    $code = $_GET["state"];
    switch($code){
        case 1 :echo $json->encode(sendToMe());break;
        case 2 :echo $json->encode(sendToPhone());break;
    }
    
}




