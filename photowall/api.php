<?php
session_start ();
require "init.php";
require "JSON.php";

! defined ( "OUTPUT_SUCCESS" ) &&define('OUTPUT_SUCCESS','0');
! defined ( "OUTPUT_ERROR" ) &&define('OUTPUT_ERROR','1');
! defined ( "OUTPUT_LOGIN" ) &&define('OUTPUT_LOGIN','2');
! defined ( "OUTPUT_CREATE" ) &&define('OUTPUT_CREATE','3');

! defined ( "OP_LOGIN" ) &&define('OP_LOGIN','2');
! defined ( "OP_CREATE_PASSWORD" ) &&define('OP_CREATE_PASSWORD','3');
! defined ( "OP_GET_IMG" ) &&define('OP_GET_IMG','4');

function getimg(){
    global $conn;
    $id = $_GET["id"];


    
    $ret = checkCreate($id);
    if($ret["code"] != OUTPUT_SUCCESS){
        return $ret;
    }
        
    if(!isset($_SESSION['photowall_' . $id])){
        return output(OUTPUT_LOGIN,"请先登录,亲 ");
    }

    $id = mysql_real_escape_string($id);
    $sql = "SELECT c_img,c_desc FROM t_photowall_img where c_wall_id = '$id'";
    $result = mysql_query($sql ,$conn);
    $res = array();
    while($row= mysql_fetch_array($result)){
        $img = array();
        $img["url"] = $row["c_img"];
        $img["desc"] = $row["c_desc"];
        $res[] = $img;
    }
    $ret = output(OUTPUT_SUCCESS,"sucess");
    $ret["list"] = $res;
    return $ret;
}

function checkCreate($id){
    global $conn;
    $id = mysql_real_escape_string($id);
    $sql = "SELECT c_password,c_ex FROM t_photowall_base where c_wall_id = '$id'";
    $result = mysql_query($sql ,$conn);
    $num_rows = mysql_num_rows($result);
    if($num_rows != 1){
        //error id
        return output(OUTPUT_ERROR,"非法请求, 亲亲亲亲亲亲");
    }else{
        $row= mysql_fetch_array($result);
        $password = $row["c_password"];
        $ex = $row["c_ex"] ^ ("tiankonguse's代码世界是一个什么样子的世界呢");
        if(strlen($password) == 0){
            return output(OUTPUT_CREATE,"请先创建密码,亲");
        }else{
            return output(OUTPUT_SUCCESS," $ex");
        }
    }
}

function create(){
    global $conn;
    $id = $_GET["id"];
    if(!isset($_GET["pw"])){
        return output(OUTPUT_ERROR,"非法操作哦, 宝宝");
    }
    $pw = $_GET["pw"];
    if(strlen($pw) < 6){
        return output(OUTPUT_ERROR,"密码太弱了, 笨蛋");
    }
    $pw = sha1(SALT . $_GET['pw']);
    $ex = $_GET['pw'] ^ SALT;
    
    $id = mysql_real_escape_string($id);
    $pw = mysql_real_escape_string($pw);
    $ex = mysql_real_escape_string($ex);
    $sql = "update  t_photowall_base set c_password='$pw', c_ex='$ex' where c_wall_id = '$id'";
    $result = mysql_query($sql ,$conn);
    if($result){
        return output(OUTPUT_SUCCESS, "创建成功, 请尝试登录");
    }else{
        return output(OUTPUT_ERROR,"创建密码失败了,亲");
    }
}


function login(){
    global $conn;
    $id = $_GET["id"];
    if(!isset($_GET["pw"])){
        return output(OUTPUT_ERROR,"非法操作哦, 宝宝");
    }
    $pw = $_GET["pw"];
    if(strlen($pw) < 6){
        return output(OUTPUT_ERROR,"密码太弱了, 笨蛋");
    }
    $pw = sha1(SALT . $_GET['pw']);
    
    $id = mysql_real_escape_string($id);
    $pw = mysql_real_escape_string($pw);
    
    $sql = "SELECT c_id FROM t_photowall_base where c_wall_id = '$id' and c_password = '$pw' limit 1";
    $result = mysql_query($sql ,$conn);
    $num_rows = mysql_num_rows($result);
    if($num_rows == 0){
        return output(OUTPUT_ERROR,"登录失败");
    }else{
        $_SESSION['photowall_' . $id] = 1;
        return output(OUTPUT_SUCCESS,"登录成功, 亲亲亲亲亲");
    }
}

function callback($str){
    if(!isset($_GET["callback"])){
        echo "_($str)";
    }else{
        $callback = $_GET["callback"];
        echo "$callback($str)";
    }
}

$json = new Services_JSON();
if((!$conn || !$result) && $ret){
    //连接数据库失败
    callback( $json->encode($ret));
}else if(!isset($_GET["op"]) || !isset($_GET["id"])){
    callback( $json->encode(output(OUTPUT_ERROR,"非法请求, 亲亲亲亲")));
}else if(!ctype_alnum($_GET["id"]) || !ctype_digit($_GET["op"])){
    callback( $json->encode(output(OUTPUT_ERROR,"非法请求, 亲亲亲")));
}else{
    $op = intval($_GET["op"]);
    switch($op){
        case OP_LOGIN :callback($json->encode(login()));break;
        case OP_CREATE_PASSWORD :callback($json->encode(create()));break;
        case OP_GET_IMG :callback($json->encode(getimg()));break;
        default:callback($json->encode(output(OUTPUT_ERROR,"非法请求, 亲亲")));break;
    }
}


