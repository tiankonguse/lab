<?php

ini_set('date.timezone','Asia/Shanghai');
date_default_timezone_set('Asia/Shanghai');

define('DB_HOST','127.0.0.1');
define('DB_USER','tiankong_site');
define('DB_NAME','tiankonguse_site');
define('DB_PASS','4nMuNnZX');
define('SALT','tiankonguse');

! defined ( "OUTPUT_SUCCESS" ) &&define('OUTPUT_SUCCESS','0');
! defined ( "OUTPUT_ERROR" ) &&define('OUTPUT_ERROR','1');

$conn = false;
$result = false;

//showError();

function showError(){
    ini_set("display_errors","1");
    ini_set("error_reporting",E_ALL);
}

$ret = connectDB();

function connectDB(){
    global $conn;
    global $result;

    //连接mysql
    $conn = mysql_connect(DB_HOST,DB_USER,DB_PASS);
    if(!$conn)return (output(1,"连接mysql失败,请联系管理员."));

    //设置编码为utf8
    $result = mysql_query("set names utf8");
    if(!$result)return (output(2,"设置编码为utf8失败,请联系管理员."));

    //设置数据库
    $result = mysql_select_db(DB_NAME);
    if(!$result)return (output(3,"选择数据库失败,请联系管理员."));

    return false;
}

function output($id, $message){
    $ret = array(
        'code' => $id,
        'message' => $message
    );
    return $ret;
}
?>
