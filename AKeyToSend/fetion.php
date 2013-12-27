<?php 

function post($url, $data = array()){
	$t = time() * 1000;
	$cookie = dirname(__FILE__).'/cookie.txt';

	$curl = curl_init("$url?t=$t");
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);    // 注意这里！
	curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); // 注意这里！保存Cookie
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 2.3.6; en-us; Nexus S Build/GRK39F) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_REFERER, "http://f.10086.cn/im5/login/login.action");
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}


function alllist(){
	return post("http://f.10086.cn/im5/box/alllist.action");
}

function login(){
	return post("http://f.10086.cn/im5/login/login.action");
}

function getReadiedSms(){
	return post("http://f.10086.cn/im5/chat/getReadiedSms.action");
}


function sendNewGroupShortMsg($msg){
	return post("http://f.10086.cn/im5/chat/sendNewGroupShortMsg.action", array(
			'msg' => $msg,
			'touserid' => ',811024540',
	));
}
//{
//"tip":"",
//"userinfo":{
//"idUser":374416318,
//"idFetion":767012250,
//"mobileNo":"13578775090",
//"nickname":"宛立建"},
//"type":0}

//{"tip":"不能加自己为好友","type":0}

//{"tip":"对方已经是你的好友，不能重复添加","userinfo":{"idUser":1515966541,"idFetion":699314653,"mobileNo":"18236847197","nickname":"无"},"type":0}
function searchFriendByPhone($phone){
	return post("http://f.10086.cn/im5/user/searchFriendByPhone.action", array(
			'number' => $phone,
	));
}

//{
//"total":1,
//"contacts":[
//	{
//		"idContact":374416318,
//		"localName":"宛立建",
//		"relationStatus":1,
//		"contactType":0,
//		"isBlocked":0,
//		"permission":"",
//		"idFetion":767012250,
//		"mobileNo":"13578775090",
//		"email":"",
//		"carrier":"CMCC",
//		"carrierStatus":0,
//		"basicServiceStatus":1,
//		"services":"99",
//		"smsOnlineStatus":"0.0:0:0",
//		"presenceBasic":"0",
//		"presenceDesc":"",
//		"deviceType":"",
//		"uri":"sip:767012250@fetion.com.cn;p\u003d1688",
//		"nickname":"宛立建",
//		"impresa":"Wish you were here…","impresaLength":0,
//		"newMsgNums":0,
//		"portraitCrc":"-1425082249"}]}

function searchFriendsByQueryKey($phone){
	return post("http://f.10086.cn/im5/index/searchFriendsByQueryKey.action", array(
			'queryKey' => $phone,
	));
}

//{
//	"tip":"",
//	"blocked":"N",
//	"isStranger":"N",
//	"isBlack":"N",
//	"fsid":"1307e5c438973d7980d0ee09971d3cb1e3218021febdfd2eea76a67315e26bb96f5e8068ab3ded4b6910e075fd885ba3",
//	"touri":"sip:767012250@fetion.com.cn;p=1688",
//  "sendFileUrl":"http://f.10086.cn/fs/service/upload",
//	"hdsUrl":"http://f.10086.cn/fs/service/hdsUpload",
//	"tsid":"767012250",
//	"offine":"1",
//	"toCarrier":"CMCC",
//	"userCarrier":"CMCC"}

function toChatMsg($touserid){
	return post("http://f.10086.cn/im5/chat/toChatMsg.action", array(
			'touserid' => $touserid,
	));
}

//{"tip":"请求已发送，请等待对方回应"}
//{"tip":"对方已经是你的好友，不能重复添加"}"
function addFriendSubmit($phone){
	login();
	return post("http://f.10086.cn/im5/user/addFriendSubmit.action", array(
			'number' => $phone,
			'type' => 0,
	));
}

//touserid=374416318&msg=.
//{"sendCode":"true","info":"消息发送成功"}
function sendNewMsg($touserid, $msg){
	return post("http://f.10086.cn/im5/chat/sendNewMsg.action", array(
			'touserid' => $touserid,
			'msg' => $msg,
	));
}

function loginHtml5(){
	return post("http://f.10086.cn/im5/login/loginHtml5.action", array(
			'm' => '13944097701',
			'pass' => 'shen1000',
			'captchaCode' => '',
			'checkCodeKey' => 'null',
	));
}




//echo "hello";
//echo loginHtml5();
//echo login();
//echo alllist();

//echo alllist();
function sendToMe(){
	login();
	if(isset($_POST['username']) && isset($_POST['context']) && isset($_SESSION['verifyCode'])){
		$username = $_POST['username'];
		$verifyCode = $_POST['verifyCode'];
		$context = $_POST['context'];

		$_verifyCode = $_SESSION['verifyCode'];

		$verifyCode = strtolower($verifyCode);
		$_verifyCode = strtolower($_verifyCode);

		if(strcmp($_verifyCode, $verifyCode) != 0){
			return output(1,"验证码不正确");
		}else{
			sendNewGroupShortMsg("【".$username ."】给你发送了：".$context);
			return output(0,"发送成功" );
		}
	}else{
		return output(1,"非法操作");
	}
}

function sendToPhone(){
	global  $json;
	login();
	if(isset($_POST['phone']) && isset($_POST['context']) && isset($_SESSION['verifyCode'])){
		$phone = $_POST['phone'];
		$verifyCode = $_POST['verifyCode'];
		$context = $_POST['context'];

		$_verifyCode = $_SESSION['verifyCode'];

		$verifyCode = strtolower($verifyCode);
		$_verifyCode = strtolower($_verifyCode);


		if(strcmp($_verifyCode, $verifyCode) != 0){
			return output(1,"验证码不正确");
		}else if(!preg_match ( '/^[0-9]{11,11}$/', $phone)){
			return output(1,"电话不错");
		}else{
			
			$ret = searchFriendByPhone($phone);
			
			if(strcmp($ret,"") == 0){
				return output(1,"这个电话不是tiankonguse的飞信好友，不能给他发送信息。" );
			}
			$ret = $json->decode($ret);
			$touserid = $ret->userinfo->idUser;
			$ret = sendNewMsg($touserid, "【tiankonguse信使】".$context);
			
			if(strcmp($ret,"{\"sendCode\":\"true\",\"info\":\"消息发送成功\"}") == 0){
				return output(0,"发送成功" );
			}else{
				$ret = $json->decode($ret);
				return output(1, $ret->info);
			}
		}
	}else{
		return output(1,"非法操作");
	}
}


?>