<?php 

// var_dump($_SERVER);

// $host = $_SERVER["HTTP_HOST"];
//http://user.qzone.qq.com/804345178


$width = 800;
$height = 1000;
 header ('Content-Type: image/png');
 $im = imagecreatetruecolor($width, $height);
 // 定义要用到的颜色
 $back_color = imagecolorallocate($im, 0, 0, 0);
 $text_color = imagecolorallocate($im, 255, 255,255);
 
 $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
 imagesetpixel($im, mt_rand(0,$width),mt_rand(0,$height),$font_color); 
 $i = 10;
 
 imagestring($im, 22,  5,10, $_SERVER["HTTP_REFERER"] . " ". time(), $text_color); 
 
 foreach ($_SERVER as $key=>$val){
 	
 	$i += 20;
 }


 imagepng($im);
 imagedestroy($im);
?>