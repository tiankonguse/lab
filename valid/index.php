<?php

include ('downloadImg.php');
include ('Valite.php');

$img = "http://tiankonguse.com/record/inc/verifyCode.php";
$ret = downloadImage($img, "tmp");
//var_dump($ret);
if($ret === false){
	die("error");
}else{
	$img = $ret['filename'];
}

echo "<img src='$img' /><br>";

 $valid = new Valite();
$valid->setImage($img);
$valid->getHec();
$valid->printHec();
//$validCode = $valid->run();
//echo $validCode; 
echo '<br/><img src="IMG_20131222_184829.jpg" style="width: 800px;"><br/>';
?>

