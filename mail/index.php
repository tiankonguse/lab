<?php
header('Content-Type: text/html; charset=utf-8');
require("phpmailer/class.phpmailer.php"); 
error_reporting(E_ALL);

function smtp_mail ( $sendto_email, $subject, $body ,$att=array()) {
	$mail = new PHPMailer(); 
	$mail->IsMail();   
	echo __LINE__."<br/>";
	$mail->Host = "mail.qq.com";  
	$mail->Username = "804345178";   
	$mail->Password = "xiaoxue520";    

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
	echo __LINE__."<br/>";
	$mail->IsHTML(true); 
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AltBody ="text/html"; 
	echo __LINE__."<br/>";
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
		<a href="http://tiankonguse.com">http://tiankonguse.com</a> 
	</body>
	</html>
	';     
// 参数说明(发送地址, 邮件主题, 邮件内容,附件绝对路径)
smtp_mail('i@tiankonguse.com', '欢迎你的到来', $body,array());

?>
