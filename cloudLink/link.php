<?php

ini_set("display_errors",1);
ini_set("error_reporting",E_ALL);

//定义一些网盘的域名
define("HOST_BAIDUPAN", "pan.baidu.com");
define("HOST_WEIYUN", "share.weiyun.com");

//默认的文件类型
define("DEFAULT_FILE_TYPE", ".fuck");
//是否自动获取文件类型{1:自动获取, 0:不获取，返回默认类型}
define("AUTO_GET_FILE_TYPE", 1);

//错误代码
define("ERR_OK", 0);
define("ERR_UNKNOW", 99);
define("ERR_NO_URL_PARAMS", 100);
define("ERR_UNKNOW_HOST", 101);
define("ERR_CANNOT_GET_SRC", 102);
define("ERR_NO_FILE_TYPE", 103);

//如果没有url参数就退出
extract($_GET);
isset($url) or exit(ERRCODE(ERR_NO_URL_PARAMS));

//分解网址{host:域名, path:路径, query:请求}
$url = html_entity_decode($url);
$parse_url = parse_url($url);
$host = $parse_url["host"];
$path = $parse_url["path"];


//解析外链路径
switch($host) {
    case HOST_BAIDUPAN : {
        //百度网盘
        $uri = "/baidupan/";

        if (isset($parse_url["query"])) {
            parse_str($parse_url["query"]);
        } else {
        	
            $src = curl_get_contents($url);

            preg_match('|shareid="(\d+).+uk="(\d+)|', $src, $res);
            $res or exit(ERRCODE(ERR_UNKNOW));
            list($shareid, $uk) = array_slice($res, 1, 2);
        }
        
        $uri .= $uk."/".$shareid;
        break;
    } case HOST_WEIYUN : {
        //腾讯微云
        $uri = "/weiyun/";
        $uri .= end(explode("/", trim($path, "/")));
        break;
    } default : {
        //退出
        exit(ERRCODE(ERR_UNKNOW_HOST));
    }
}


//输出音乐外链
echo ERRCODE(ERR_OK, $uri.get_file_type());



//获取文件类型
function get_file_type() {

    //是否获取文件类型
    if (!AUTO_GET_FILE_TYPE) {
        return DEFAULT_FILE_TYPE;
    }

    //获取网页源码
    global $url, $host, $src;
    $src = $src ? $src : curl_get_contents($url);

    //匹配出文件类型
    switch($host) {
        case HOST_BAIDUPAN : {
            //百度网盘
            preg_match('|title.+(\.[a-z0-9]+).+\n|i', $src, $res);
            return $res ? $res[1] : exit(ERRCODE(ERR_NO_FILE_TYPE));
            break;
        } case HOST_WEIYUN : {
            //腾讯微云
            preg_match('|title.+(\.[a-z0-9]+).+\n|i', $src, $res);
            return $res ? $res[1] : exit(ERRCODE(ERR_NO_FILE_TYPE));
            break;
        }
    }
}

//用curl获取网页源码
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

//获取json格式的错误代码
function ERRCODE($code, $msg="") {
    if ($code == ERR_OK) {
        return '{"code":'.ERR_OK.', "link":"'.$msg.'"}';
    } else {
        return '{"code":'.$code.'}';
    }
}
?>
