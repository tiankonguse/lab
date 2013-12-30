<?php 
! defined ( "PHONE_TIANKONGUSE" ) &&  define('PHONE_TIANKONGUSE','13944097701');
! defined ( "PHONE_DEBUG" ) &&  define('PHONE_DEBUG', 0);
! defined ( "OUTPUT_SUCCESS" ) && define('OUTPUT_SUCCESS','0');
! defined ( "OUTPUT_ERROR" ) && define('OUTPUT_ERROR','1');

function post($url, $data = array()){
	$t = time() * 1000;
	$cookie = dirname(__FILE__).'/cookie.txt';

	$curl = curl_init("$url?t=$t&_=$t");
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

/**
 * @return mixed
 */
function alllist(){
	return post("http://f.10086.cn/im5/box/alllist.action");
}

function login(){
	return post("http://f.10086.cn/im5/login/login.action");
}

function getReadiedSms(){
	return post("http://f.10086.cn/im5/chat/getReadiedSms.action");
}

/**
 *
 * @param string $msg
 * @param string $touserid
 * @return mixed
 * 	{"sendCode":"200","info":"发送成功"}
 */
function sendNewGroupShortMsg($msg, $touserid = "811024540"){
	return post("http://f.10086.cn/im5/chat/sendNewGroupShortMsg.action", array(
			'msg' => $msg,
			'touserid' => "$touserid",
	));
}

/**
 *
 * @param  number $phone
 * @return mixed
 * 	{"tip":"不能加自己为好友","type":0}
 * 	{"tip":"","userinfo":{"idUser":1563590819,"idFetion":0,"mobileNo":"15526882877","nickname":"无"},"type":0}
 * 	{"tip":"对方已经是你的好友，不能重复添加","userinfo":{"idUser":1515966541,"idFetion":699314653,"mobileNo":"18236847197","nickname":"无"},"type":0}
 */
function searchFriendByPhone($phone){
	return post("http://f.10086.cn/im5/user/searchFriendByPhone.action", array(
			'number' => $phone,
	));
}

/**
 *
 * @param number $phone
 * @return mixed
 * 	{"total":1,"contacts":[{"idContact":1563590819,"localName":"","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"15526882877","email":"","carrier":"CUCC","carrierStatus":0,"basicServiceStatus":0,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:15526882877","nickname":"","impresaLength":0,"newMsgNums":0,"portraitCrc":""}]}
 *
 * 	移动：basicServiceStatus = 1; relationStatus = 1;
 * 	联通：basicServiceStatus = 0; relationStatus = 0;
 *
 *
 */
function searchFriendsByQueryKey($phone){
	return post("http://f.10086.cn/im5/index/searchFriendsByQueryKey.action", array(
			'queryKey' => $phone,
	));
}

/**
 * @return mixed
 * 	{"total":8,"contacts":[{"idContactList":0,"contactListName":"未分组","onlineContactTotal":1,"contactTotal":48},{"idContactList":1,"contactListName":"初中","onlineContactTotal":0,"contactTotal":6},{"idContactList":3,"contactListName":"曾经","onlineContactTotal":0,"contactTotal":10},{"idContactList":5,"contactListName":"大学","onlineContactTotal":1,"contactTotal":42},{"idContactList":7,"contactListName":"高中","onlineContactTotal":0,"contactTotal":9},{"idContactList":11,"contactListName":"以前","onlineContactTotal":0,"contactTotal":1},{"idContactList":9998,"contactListName":"陌生人","onlineContactTotal":0,"contactTotal":0},{"idContactList":9999,"contactListName":"黑名单","onlineContactTotal":0,"contactTotal":0}],"friendGroupIds":"0,1,3,5,7,11,9998,9999","isVIP":"false"}
 */
function loadGroupContactsAjax(){
	return post("http://f.10086.cn/im5/index/loadGroupContactsAjax.action");
}

/**
 *
 * @param number $idContactList
 * @return mixed
 * 	{"total":48,"contacts":[{"idContact":988997352,"localName":"10086","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":10086,"mobileNo":"","email":"","carrier":"ROBOT","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"365.0:0:0","presenceBasic":"499","presenceDesc":"","deviceType":"Robot","uri":"sip:10086@fetion.com.cn;p\u003d11901;t\u003drobot","nickname":"10086","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":202120500,"localName":"吴振","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":658732518,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:658732518@fetion.com.cn;p\u003d4005","nickname":"吴振","impresa":"···","impresaLength":0,"portraitCrc":"302845454","position":0},{"idContact":374416318,"localName":"宛立建","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":767012250,"mobileNo":"13578775090","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:767012250@fetion.com.cn;p\u003d1688","nickname":"宛立建","impresa":"Wish you were here…","impresaLength":0,"portraitCrc":"-1425082249","position":0},{"idContact":630782410,"localName":"晓鑫","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":872432292,"mobileNo":"15049149230","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:872432292@fetion.com.cn;p\u003d13573","nickname":"晓鑫","impresa":"心情不错~~！！","impresaLength":0,"portraitCrc":"-535558959","position":0},{"idContact":806533259,"localName":"卜军","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":405248350,"mobileNo":"18795374864","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:405248350@fetion.com.cn;p\u003d16054","nickname":"卜军","impresa":"","impresaLength":0,"portraitCrc":"1726480717","position":0},{"idContact":809116501,"localName":"刘畅","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":408019681,"mobileNo":"18744044573","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:408019681@fetion.com.cn;p\u003d15541","nickname":"刘畅","impresa":"我爱飞信","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":809130026,"localName":"青苹果","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":408034526,"mobileNo":"18744044758","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:408034526@fetion.com.cn;p\u003d13531","nickname":"青苹果","impresa":"上课！","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":979547887,"localName":"飞","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":125010135,"mobileNo":"18243002072","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:125010135@fetion.com.cn;p\u003d13531","nickname":"飞","impresa":"面朝大海，春暖花开。","impresaLength":0,"portraitCrc":"883076329","position":0},{"idContact":979611576,"localName":"zhouxj","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":125086555,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:125086555@fetion.com.cn;p\u003d13531","nickname":"zhouxj","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":985946723,"localName":"141399896","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":141399896,"mobileNo":"18704475761","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:141399896@fetion.com.cn;p\u003d15145","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1076495687,"localName":"18243003424","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":481952171,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:481952171@fetion.com.cn;p\u003d20531","nickname":"18243003424","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1443889218,"localName":"小雪","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":232874939,"mobileNo":"15023025657","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:232874939@fetion.com.cn;p\u003d9131","nickname":"小雪","impresa":"","impresaLength":0,"portraitCrc":"-1803634119","position":0},{"idContact":979527061,"localName":"124982585","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":124982585,"mobileNo":"18243001090","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:124982585@fetion.com.cn;p\u003d13531","nickname":"静净蓝笑笑晓乖乖","impresa":"新的一年，happy哟","impresaLength":0,"portraitCrc":"-1994893095","position":0},{"idContact":979541244,"localName":"125001642","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":125001642,"mobileNo":"18243000589","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:125001642@fetion.com.cn;p\u003d13531","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":979542812,"localName":"125003788","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":125003788,"mobileNo":"18243002085","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:125003788@fetion.com.cn;p\u003d13531","nickname":"刘云龙","impresa":"123456789","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":980995696,"localName":"150089037","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":150089037,"mobileNo":"18704478961","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:150089037@fetion.com.cn;p\u003d15145","nickname":"国士无双玮","impresa":"别人笑我太疯癫，我笑他人看不穿","impresaLength":0,"portraitCrc":"-1078492266","position":0},{"idContact":862672200,"localName":"335042845","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":335042845,"mobileNo":"13604324559","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:335042845@fetion.com.cn;p\u003d1944","nickname":"一了","impresa":"hi!大家好,我刚开始玩飞信空间,请多指教O(∩..","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":812410227,"localName":"411669841","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":411669841,"mobileNo":"18744047712","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:411669841@fetion.com.cn;p\u003d13531","nickname":"于茂升","impresa":"好幸福，我爱你。。。。。","impresaLength":0,"portraitCrc":"1604947006","position":0},{"idContact":815766124,"localName":"415157518","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":415157518,"mobileNo":"18744048439","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:415157518@fetion.com.cn;p\u003d13531","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":817467960,"localName":"416916087","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":416916087,"mobileNo":"18744047567","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:416916087@fetion.com.cn;p\u003d15541","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":811362412,"localName":"fly","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":410565286,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:410565286@fetion.com.cn;p\u003d13531","nickname":"fly","impresa":"我是猪！","impresaLength":0,"portraitCrc":"-239803326","position":0},{"idContact":982333928,"localName":"此生不换","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":127814480,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:127814480@fetion.com.cn;p\u003d13531","nickname":"此生不换","impresa":"失恋第三个三十三天！","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":815322942,"localName":"龙飞","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":414723691,"mobileNo":"18744047136","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:414723691@fetion.com.cn;p\u003d15541","nickname":"王振如","impresa":"","impresaLength":0,"portraitCrc":"1445703888","position":0},{"idContact":867449493,"localName":"梦远","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":220309246,"mobileNo":"18795104614","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:220309246@fetion.com.cn;p\u003d23445","nickname":"梦远","impresa":"ks;","impresaLength":0,"portraitCrc":"-79163317","position":0},{"idContact":490566668,"localName":"柠檬绿茶","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":385119539,"mobileNo":"13578966589","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:385119539@fetion.com.cn;p\u003d1690","nickname":"黄瑞","impresa":"选择最简单的方式诠释最美妙的人生！","impresaLength":0,"portraitCrc":"460505517","position":0},{"idContact":1194688984,"localName":"陶胜","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":859914601,"mobileNo":"18844105711","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:859914601@fetion.com.cn;p\u003d13542","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":800356136,"localName":"田增茂","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":468788200,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:468788200@fetion.com.cn;p\u003d20746","nickname":"田增茂","impresa":"倒下了，要记得站起来","impresaLength":0,"portraitCrc":"-2081460625","position":0},{"idContact":1349883325,"localName":"周颖","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":298526618,"mobileNo":"13756068438","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"0.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:298526618@fetion.com.cn;p\u003d3461","nickname":"","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":744600560,"localName":"杜二爽","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":497397283,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:497397283@fetion.com.cn;p\u003d5288","nickname":"杜二爽","impresa":"操蛋的老班","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":766768790,"localName":"郭志科","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":537853884,"mobileNo":"","email":"","carrier":"CUCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:537853884@fetion.com.cn;p\u003d10275","nickname":"郭志科","impresa":"If equal affection canno..","impresaLength":0,"portraitCrc":"-873455267","position":0},{"idContact":979565206,"localName":"125032264","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":125032264,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:125032264@fetion.com.cn;p\u003d13531","nickname":"","impresa":"信心 耐心 细心 恒心","impresaLength":0,"portraitCrc":"1239827536","position":0},{"idContact":1539302486,"localName":"东北师范大学","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":840992496,"mobileNo":"","email":"","carrier":"ROBOT","carrierStatus":0,"basicServiceStatus":1,"services":"99","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"sip:840992496@fetion.com.cn;p\u003d11906;t\u003drobot","nickname":"东北师范大学","impresa":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":985007332,"localName":"140503639","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":140503639,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:140503639@fetion.com.cn;p\u003d1912","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1124171690,"localName":"582207193","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":582207193,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:582207193@fetion.com.cn;p\u003d31777","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1173407257,"localName":"727341546","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":727341546,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:727341546@fetion.com.cn;p\u003d22869","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1182307090,"localName":"762940778","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":762940778,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:762940778@fetion.com.cn;p\u003d10338","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1182981770,"localName":"765908418","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":765908418,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:765908418@fetion.com.cn;p\u003d13541","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1192538065,"localName":"828859222","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"","idFetion":828859222,"mobileNo":"","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"sip:828859222@fetion.com.cn;p\u003d13542","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1563590819,"localName":"15526882877","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"15526882877","email":"","carrier":"CUCC","carrierStatus":0,"basicServiceStatus":0,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:15526882877","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":1201214445,"localName":"苗亚婷","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"15037683757","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:15037683757","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1307869193,"localName":"孙亚军","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"18749492759","email":"","carrier":"CMCC","carrierStatus":0,"basicServiceStatus":0,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:18749492759","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":1132960850,"localName":"王晓鑫","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"15648642349","email":"","carrier":"CUCC","carrierStatus":0,"basicServiceStatus":0,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:15648642349","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":1168141907,"localName":"未命名","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"13298881439","email":"","carrier":"CUCC","carrierStatus":0,"basicServiceStatus":1,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:13298881439","nickname":"","impresaLength":0,"portraitCrc":"0","position":0},{"idContact":1116036859,"localName":"13504475808","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"","idFetion":0,"mobileNo":"13504475808","email":"","carrier":"CMCC","carrierStatus":1,"basicServiceStatus":0,"services":"","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"tel:13504475808","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":979539795,"localName":"124999536","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"18243002125","email":"","carrier":"CMCC","carrierStatus":1,"basicServiceStatus":0,"services":"","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"tel:18243002125","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":503320890,"localName":"369477318","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"13689817206","email":"","carrier":"CMCC","carrierStatus":1,"basicServiceStatus":0,"services":"","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"tel:13689817206","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":908521392,"localName":"381607769","relationStatus":1,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"15843046371","email":"","carrier":"CMCC","carrierStatus":1,"basicServiceStatus":0,"services":"","smsOnlineStatus":"365.0:0:0","presenceBasic":"0","presenceDesc":"","deviceType":"","uri":"tel:15843046371","nickname":"","impresaLength":0,"portraitCrc":"","position":0},{"idContact":809354940,"localName":"王权","relationStatus":0,"contactType":0,"isBlocked":0,"permission":"identity\u003d1;","idFetion":0,"mobileNo":"18744045896","email":"","carrier":"CMCC","carrierStatus":1,"basicServiceStatus":0,"services":"","smsOnlineStatus":"","presenceBasic":"","presenceDesc":"","deviceType":"","uri":"tel:18744045896","nickname":"","impresaLength":0,"portraitCrc":"","position":0}],"isChange":"N"}
 */
function contactlistView($idContactList){
	return post("http://f.10086.cn/im5/chat/toChatMsg.action", array());
}

/**
 *
 * @param unknown $touserid
 * @return mixed
 * 	{"tip":"对方已经关闭飞信服务，你不能和其会话","blocked":"Y","isStranger":"N","isBlack":"N","fsid":"1307e5c438973d7980d0ee09971d3cb1e3218021febdfd2eea76a67315e26bb9c42132e3223cd4a4bd64328361a52cb1","touri":"tel:15526882877","sendFileUrl":"http://f.10086.cn/fs/service/upload","hdsUrl":"http://f.10086.cn/fs/service/hdsUpload","tsid":"15526882877","offine":"0","toCarrier":"CUCC","userCarrier":"CMCC"}
 * 	{"tip":"","blocked":"N","isStranger":"N","isBlack":"N","fsid":"1307e5c438973d7980d0ee09971d3cb1e3218021febdfd2eea76a67315e26bb96f5e8068ab3ded4b6910e075fd885ba3","touri":"sip:767012250@fetion.com.cn;p=1688","sendFileUrl":"http://f.10086.cn/fs/service/upload","hdsUrl":"http://f.10086.cn/fs/service/hdsUpload","tsid":"767012250","offine":"1","toCarrier":"CMCC","userCarrier":"CMCC"}
 */
function toChatMsg($touserid){
	return post("http://f.10086.cn/im5/chat/toChatMsg.action", array(
			'touserid' => $touserid,
	));
}



/**
 * @param number $phone
 * @return mixed
 *	{"tip":"请求已发送，请等待对方回应"}
 *	{"tip":"对方已经是你的好友，不能重复添加"}"
 *	{"tip":"加友失败，请稍候重试"}  此时可能没有开通飞信，或飞信开通后又关闭
 */
function addFriendSubmit($phone){
	login();
	return post("http://f.10086.cn/im5/user/addFriendSubmit.action", array(
			'number' => $phone,
			'type' => 0,
	));
}


/**
 * @param number $touserid
 * @param string $msg
 * @return mixed
 * 	{"sendCode":"true","info":"消息发送成功"}
 */
function sendNewMsg($msg, $touserid){
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

/**
 * get online users
 * @param number $gender
 * @return mixed
 * 	[{"idUser":1251814934,"idFetion":872029910,"mobileNo":"MTM2NjQzMTEyODQ\u003d","email":"","nickname":"王娅萍．女","impresa":"王娅萍你好吗","gender":2,"birthday":"1983-02-21 00:00:00","carrier":"CMCC","carrierStatus":0,"carrierRegion":"中国.吉林.长春.","userRegion":"","profile":"","bloodType":"3","scoreLevel":6,"scoreValue":289,"globalPermission":"identity\u003d0;phone\u003d0;email\u003d1;birthday\u003d1;business\u003d0;presence\u003d1;contact\u003d1;location\u003d3;buddy\u003d1;ivr\u003d2;buddy-ex\u003d0;show\u003d1;age\u003d0;","smsOnlineStatus":"6.23:40:26","uri":"sip:872029910@fetion.com.cn;p\u003d2544"}]
 */
function onlineUsers($gender = 2){
	return post("http://f.10086.cn/im5/index/onlineUsers.action", array(
			'gender' => $gender,
	));
}


//echo "hello";
//echo loginHtml5();
//echo login();
//echo alllist();

//echo alllist();
function sendToMe(){
	global  $json;
	login();
	if(isset($_POST['username']) && isset($_POST['context']) && isset($_SESSION['verifyCode'])){
		$username = $_POST['username'];
		$verifyCode = $_POST['verifyCode'];
		$context = $_POST['context'];

		$_verifyCode = $_SESSION['verifyCode'];

		$verifyCode = strtolower($verifyCode);
		$_verifyCode = strtolower($_verifyCode);

		if(strcmp($_verifyCode, $verifyCode) != 0){
			return output(OUTPUT_ERROR,"验证码不正确");
		}else{
			$ret = sendNewGroupShortMsg("【".$username."】给你发送了：".$context."");
			if(PHONE_DEBUG){
				var_dump($ret);
			}
			$ret = $json->decode($ret);
			if(strcmp($ret->info,"发送成功") == 0){
				return output(OUTPUT_SUCCESS,"发送成功" );
			}else{
				return output(OUTPUT_ERROR, $ret->info);
			}
		}
	}else{
		return output(OUTPUT_ERROR,"非法操作");
	}
}

/**
 * send a msg to a phone
 * this phone should be a friend of tiankonguse.
 * @return output
 */
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
			return output(OUTPUT_ERROR, "验证码不正确");
		}else if(!preg_match ( '/^[0-9]{11,11}$/', $phone)){
			return output(OUTPUT_ERROR, "电话不错");
		}else{

			if(strcmp(PHONE_TIANKONGUSE, $phone) == 0){
				$ret = sendNewGroupShortMsg("【tiankonguse信使】".$context);
				if(PHONE_DEBUG){
					var_dump($ret);
				}
			}else{
				$ret = searchFriendByPhone($phone);
				if(PHONE_DEBUG){
					var_dump($ret);
				}
				if(strcmp($ret,"") == 0){
					//不会执行，这一步仅仅是为了获得 id.
					return output(OUTPUT_ERROR, "这个电话不是tiankonguse的飞信好友，不能给他发送信息。" );
				}

				$ret = $json->decode($ret);
				if(strcmp($ret->tip,"") == 0 && false){
					return output(OUTPUT_ERROR, "这个电话不是tiankonguse的飞信好友，不能给他发送信息。" );
				}

				$touserid = $ret->userinfo->idUser;

				$ret = toChatMsg($touserid);
				if(PHONE_DEBUG){
					var_dump($ret);
				}
				$ret = $json->decode($ret);
				if(strcmp($ret->blocked,"Y") == 0){
					return output(OUTPUT_ERROR, $ret->tip);
				}

				$ret = sendNewMsg("【tiankonguse信使】".$context, $touserid);
				if(PHONE_DEBUG){
					var_dump($ret);
				}
			}

			$ret = $json->decode($ret);

			if(strcmp($ret->info,"发送成功") == 0 || strcmp($ret->info,"消息发送成功") == 0){
				return output(OUTPUT_SUCCESS,"发送成功" );
			}else{
				return output(OUTPUT_ERROR, $ret->info);
			}
		}
	}else{
		return output(OUTPUT_ERROR, "非法操作");
	}
}
?>