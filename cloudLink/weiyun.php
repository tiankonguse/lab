<?php


//构造微云分享地址
preg_match('|\/.+\/(\w+)\.|', $_SERVER['REQUEST_URI'], $res);
$key = $res ? $res[1] : exit("Url format error!");
$url = "http://share.weiyun.com/$key";


//获取源码，匹配出下载地址
$src = curl_get_contents($url);
preg_match('|http://.+sharekey[^"]+|', $src, $res);
$url = $res ? $res[0] : exit("Unable to get source code!");



//从响应信息头匹配出文件下载地址
$src = curl_get_contents($url);
preg_match('|Location: (.+)\r|', $src, $res);
$fileurl = $res ? $res[1] : exit("Can not get song url!");
header("Location: $fileurl");

//用curl获取网页源码
function curl_get_contents($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, "BlackBerry/3.6.0");
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $src = curl_exec($curl);
    curl_close($curl);
    return $src;
}
?>
