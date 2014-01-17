<?php
//require_once('FirePHPCore/FirePHP.class.php');
//$firephp = FirePHP::getInstance(true);
require_once('./class.qqhttp.php');
$q = new QQHttp();
$type = $_REQUEST['type'];

if($type == 'vfcode') {
    $r = $q->getVFCode();
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
    header('Content-type: image/jpeg');
    setcookie("verifysession", $r['cookie']);
    echo $r['img'];
}

if($type == 'submit') {
   //  header("Content-type: text/html; charset=gb2312");
    $r = $q->login($_COOKIE['verifysession']);
    if ($r['login'] == false) {
        echo $r['msg'];
    } else {
       echo "<pre>login";
       $active = $r['active'];
       if ($active == false) {
          $r = $q->openEmail($r);
       } 
       $friend_list = $q->getFriends($r); 
       var_dump($friend_list);
    }
}
?>
