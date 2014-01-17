<?php
require_once('class.qqhttp.php');
$q = new QQHttp();
//$code = $q->getVFCode();
//var_dump($code);exit;
$html = $q->makeForm();
echo $html;
?>
