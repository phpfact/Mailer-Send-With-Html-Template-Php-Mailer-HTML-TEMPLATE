<?php
date_default_timezone_set('Asia/Kolkata');
include('smtp/PHPMailerAutoload.php');


/* ======= EMAIL TEMPLATE ======= */
$html = "";
$html = file_get_contents("email_template.html");
$html = str_replace("__USERNAME__","Sachin Sharma", $html);
$html = str_replace("__PHONE__","Sachin Sharma", $html);
$html = str_replace("__EMAIL__","Sachin Sharma", $html);
$html = str_replace("__SUBJECT__","Sachin Sharma", $html);
$html = str_replace("__MESSAGE__","Sachin Sharma", $html);
$html = str_replace("__DATE__", date('m/d/Y h:i:s a', time()), $html);


/* ======= EMAIL CONFIG ======= */
function smtp_mailer($to, $subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "phpfact@gmail.com";
	$mail->Password = "--------------------------------------------";
	$mail->SetFrom('phpfact@gmail.com');
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));


	// if(!$mail->Send()){
	// 	echo $mail->ErrorInfo;
	// }else{
	// 	return 'Sent';
	// }
}


/* ======= SEND EMAIL ======= */
smtp_mailer('phpfact@gmail.com', 'Congratulations You Have Got Contact Enquiry', $html);



?>