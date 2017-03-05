<?php
$debug = 0;
if(isset($_GET["debug"])){
    $debug = 1;
}
// 构造百度网盘分享网址
$uri = $_SERVER ["REQUEST_URI"];

$match = true;


if(preg_match ( '|\/(\d+)\/(\d+)\.|', $uri, $res )){
    list ( $uk, $shareid ) = array_slice ( $res, 1, 2 );
    $url = "http://pan.baidu.com/share/link?shareid=$shareid&uk=$uk";
}else if(preg_match ( '|\/.+\/(\w+)\.|', $uri, $res )){
    $url = "http://pan.baidu.com/s/" . $res [1];

}else{
    $match = false;
}
if($match){
    // 匹配源码里面的音乐地址并跳转
    $src = curl_get_contents ( $url );
    preg_match ( '|http://.+file.+sign[^"]+|', $src, $res );
    if (count($res)) {
	    $songurl = html_entity_decode ( $res [0] );
        header ( "location:$songurl" );
    } else {
        preg_match ( '|url3[^h]+([^"]*)|', $src, $res );
        if(count($res) >= 2){
            $res [1] = str_replace ( "\\", "", $res [1] );
            $imgurl = html_entity_decode ( $res [1] );
            header ( "location:$imgurl" );
        }else{
           echo "error"; 
        }

        if($debug == 1){
        }else{
        }
    }
}else{

}


// 用curl获取网页源码
function curl_get_contents($url) {
    $curl = curl_init ( $url );
    curl_setopt ( $curl, CURLOPT_HEADER, 1 );
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $curl, CURLOPT_USERAGENT, "BlackBerry/3.6.1" );
    curl_setopt($curl, CURLOPT_COOKIEFILE, "./cookie.tmp");
    curl_setopt($curl, CURLOPT_COOKIEJAR, "./cookie.tmp");
    curl_setopt ( $curl, CURLOPT_TIMEOUT, 10 );
    $src = curl_exec ( $curl );
    curl_close ( $curl );
    return $src;
}
