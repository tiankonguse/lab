<?php

header('Content-Type: text/html; charset=utf-8');
require("phpmailer/class.phpmailer.php"); 
error_reporting(E_ERROR);

function smtp_mail ( $sendto_email, $subject, $body ,$att=array()) {
	$mail = new PHPMailer(); 
	$mail->IsSMTP();   
	
	$mail->Host = "asdfasdfasdf.com";  
	$mail->Username = "asdfasdfasdfsd@com.cn";   
	$mail->Password = "234234234234234";    

	$mail->FromName =  "管理员";   
	$mail->SMTPAuth = true;          
	$mail->From = $mail->Username;
	$mail->CharSet = "utf8";           
	$mail->Encoding = "base64"; 
	$mail->AddAddress($sendto_email);  
	foreach($att as $key=>$val){
		if(!empty($val)){
			$mail->AddAttachment($val);  //注意要给绝对路径
		}
	}

	$mail->IsHTML(true); 
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AltBody ="text/html"; 
	if(!$mail->Send()) { 
		echo "邮件错误信息: " . $mail->ErrorInfo; 
	}else{
		echo "邮件发送成功!"; 
	}
}

$body = '
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		欢迎来到<a href="http://www.sdfsdfsdf.com">http://www.sdfsadfsfsdf.com</a> <br /><br />
	感谢您注册为本站会员！<br /><br />
	</body>
	</html>
	';     
// 参数说明(发送地址, 邮件主题, 邮件内容,附件绝对路径)
smtp_mail('2342342342342@qq.com', '欢迎你的到来', $body,array('C:/xampp/htdocs/复件.txt'));

?>