<?php 
session_start();
require("../inc/common.php");

$json = new Services_JSON();
require("./fetion.php");

$ret = searchFriendsByQueryKey("15023025657");
if(strcmp($ret,"") == 0){
	var_dump("not Friend");
}else{
	$ret = $json->decode($ret);

	

	$touserid = $ret->contacts[0]->idContact;

	$ret = sendNewMsg($touserid, "老婆");
	
	$ret = $json->decode($ret);
	var_dump($ret->info);
	
}



?>