<?php
require_once("PHPMailer-master/PHPMailerAutoload.php");

/* Cleaning Data */

foreach ($_POST as $key => $value) {
	$_POST[$key] = trim($_POST[$key]);
	$_POST[$key] = stripslashes($_POST[$key]);
	$_POST[$key] = htmlspecialchars($_POST[$key]);
}


/* Variables */
$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'host262.hostmonster.com';
$mail->Port = 465;
$mail->Username = 'automated@360futbolcamp.com';
$mail->Password = 'FormPass2015'; //old gmail pass: Z3RV7nRTcp
$mail->isHTML(true);
$mail->addAddress('info@360futbolcamp.com');

if($_POST['hidden']== "contact"){

	$mail->From = $_POST['email'];
	$mail->FromName = $_POST['name'];
	$mail->addReplyTo($_POST['email']);
	$mail->Subject = $_POST['subject'];
	$mail->Body = $_POST['message'];

} else if($_POST['hidden'] == "register"){
//    $captchaData = new stdClass();
//
//    $captchaData->secret = "6LctdQITAAAAAENnVVeKuX12oRSYF7RO73BDgr3R";
//    $captchaData->response = $_POST['g-recaptcha-response'];
//    $crl = curl_init("https://www.google.com/recaptcha/api/siteverify");
//
//    curl_setopt($crl, CURLOPT_POST,true);
//    curl_setopt($crl, CURLOPT_POSTFIELDS, $jsonData);
//    curl_setopt($crl,CURLOPT_RETURNTRANSFER, true);
//
//    $response = curl_exec($crl);
//    $code = curl_getinfo($crl,CURLINFO_HTTP_CODE);
//
//    curl_close($crl);

	$mail->Subject = "Registration";
	$mail->Name = $_POST['parent-name'];
	$mail->From = $_POST['parent-email'];
	$mail->FromName = $_POST['parent-name'];
	$mail->addReplyTo($_POST['parent-email']);
	$mail->Body .= "Parent Name: ".$_POST['parent-name']."<br>";
	$mail->Body .= "Email: ".$_POST['email']."<br>";
	$mail->Body .= "Phone #: ".$_POST['phone']."<br>";
	$mail->Body .= "Address: ".$_POST['address']."<br>";
	$mail->Body .= "City: ".$_POST['city']."<br>";
	$mail->Body .= "Postal Code: ".$_POST['postal-code']."<br>";
	$mail->Body .= "Emergency Contact: ".$_POST['emergency-contact']."<br>";
	$mail->Body .= "Emergency Phone Number: ".$_POST['emergency-phone']."<br>";
	$mail->Body .= "Relation to camper/s: ".$_POST['relation']."<br>";
	$mail->Body .= "Camper 1 Name: ".$_POST['camper-one-name']."<br>";
	$mail->Body .= "Birthday: ".$_POST['birth-month']." ".$_POST['birth-day']." ".$_POST['birth-year']."<br>";
	$mail->Body .= "Shirt size C1: ".$_POST['shirt-size']."<br>";
	$mail->Body .= "Allergies: ".$_POST['allergies']."<br>";
	$mail->Body .= "Meds Required: ".$_POST['meds-req']."<br>";
	if ($_POST['camper-2-name']!=""){

		$mail->Body .= "Camper 2 Name: ".$_POST['camper-one-name']."<br>";
		$mail->Body .= "Birthday: ".$_POST['birth-month-2']." ".$_POST['birth-day-2']." ".$_POST['birth-year-2']."<br>";
		$mail->Body .= "Shirt size C1 ".$_POST['shirt-size-2']."<br>";
		$mail->Body .= "Allergies: ".$_POST['allergies-2']."<br>";
		$mail->Body .= "Meds Required: ".$_POST['meds-req-2']."<br>";

	}
	$mail->Body .= "Weeks Selected: <br>";
	if($_POST['A1']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;July 20-24<br>";
	}
	if($_POST['A2']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;July 27-31<br>";
	}
	if($_POST['B1']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;August 3-7<br>";
	}
	if($_POST['B2']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;August 10-14<br>";
	}
	if($_POST['C1']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;August 17-21<br>";
	}
	if($_POST['C2']=="true"){
		$mail->Body .= "&nbsp;&nbsp;&nbsp;August 24-28<br>";
	}

	$mail->Body .="<br>";




} else{
	$mail->From = 'adrian@savagebanana.com';
	$mail->FromName = 'Adrian';
	$mail->addReplyTo('adrian@savagebanana.com');
	$mail->Subject = 'Failed';
	$mail->Body = 'Not working';
}

if(!$mail->send()){
	die();
}

?>