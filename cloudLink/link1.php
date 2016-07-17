<?php

ini_set("display_errors",1);
ini_set("error_reporting",E_ALL);

define("HOST_BAIDUPAN", "pan.baidu.com");
define("HOST_WEIYUN", "share.weiyun.com");

define("DEFAULT_FILE_TYPE", ".fuck");
define("AUTO_GET_FILE_TYPE", 1);

define("ERR_OK", 0);
define("ERR_SHAREDID", 98);
define("ERR_UK", 97);
define("ERR_UNKNOW", 99);
define("ERR_NO_URL_PARAMS", 100);
define("ERR_UNKNOW_HOST", 101);
define("ERR_CANNOT_GET_SRC", 102);
define("ERR_NO_FILE_TYPE", 103);

extract($_GET);
isset($url) or exit(ERRCODE(ERR_NO_URL_PARAMS));

$url = html_entity_decode($url);
$parse_url = parse_url($url);
$host = $parse_url["host"];
$path = $parse_url["path"];


switch($host) {
    case HOST_BAIDUPAN : {
        $uri = "/baidupan.php?url=/";

        if (isset($parse_url["query"])) {
            parse_str($parse_url["query"]);
        } else {
            $src = curl_get_contents($url);

            $shareid = get_shareid($src);
            $uk = get_uk($src);
            
            $shareid or exit(ERRCODE(ERR_SHAREDID));
            $uk or exit(ERRCODE(ERR_UK));

            //preg_match('|shareid="(\d+).+uk="(\d+)|', $src, $res);
            //$res or exit(ERRCODE(ERR_UNKNOW));
            //list($shareid, $uk) = array_slice($res, 1, 2);
        }
        
        $uri .= $uk."/".$shareid;
        break;
    } case HOST_WEIYUN : {
        $uri = "/weiyun.php?url=/";
        $tmp_array = explode("/", trim($path, "/"));
        $uri .= end($tmp_array);
        break;
    } default : {
        exit(ERRCODE(ERR_UNKNOW_HOST));
    }
}


echo ERRCODE(ERR_OK, $uri.get_file_type());

function get_uk($src){
    $uk = 0;

    preg_match('/"uk".(\d+),/', $src, $res);
    $uk = $res[1];
    
    return $uk;
}

function get_shareid($src){
    $shareid = 0;
    
    preg_match('/"shareid".(\d+),/', $src, $res);
    $shareid = $res[1];
    return $shareid;
}

function get_file_type() {

    if (!AUTO_GET_FILE_TYPE) {
        return DEFAULT_FILE_TYPE;
    }

    global $url, $host, $src;
    $src = $src ? $src : curl_get_contents($url);

    switch($host) {
        case HOST_BAIDUPAN : {
            //preg_match('|title.+(\.[a-z0-9]+).+\n|i', $src, $res);
            preg_match('/"server_filename".".*(\.[a-zA-Z0-9]+)"/', $src, $res);
            return $res ? $res[1] : exit(ERRCODE(ERR_NO_FILE_TYPE));
            break;
        } case HOST_WEIYUN : {
            preg_match('|"file_suffix":"([a-z0-9]+)"|i', $src, $res);
            return $res ? ".".$res[1] : exit(ERRCODE(ERR_NO_FILE_TYPE));
            break;
        }
    }
}

function curl_get_contents($url) {
    global $src;
    try {
    	$curl = curl_init($url);
    } catch (Exception $e) {
    	var_dump($e->getMessage());
    }
    
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, "BlackBerry/3.6.0");
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $src = curl_exec($curl);
    curl_close($curl);
    $src or exit(ERRCODE(ERR_CANNOT_GET_SRC));
    return $src;
}

function ERRCODE($code, $msg="") {
    if ($code == ERR_OK) {
        return '{"code":'.ERR_OK.', "link":"'.$msg.'"}';
    } else {
        return '{"code":'.$code.'}';
    }
}
?>
