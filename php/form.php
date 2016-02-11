<?php
require_once("PHPMailer-master/PHPMailerAutoload.php");
// $config = require("config.php");

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
$mail->Username = "automated@360futbolcamp.com";
$mail->Password = "z5YsVQNnsH";
$mail->isHTML(true);
$mail->addAddress('info@360futbolcamp.com');

if($_POST['hidden']== "contact"){

	$mail->From = $_POST['email'];
	$mail->FromName = $_POST['name'];
	$mail->addReplyTo($_POST['email']);
	$mail->Subject = $_POST['subject'];
	$mail->Body = $_POST['message'];
    // $mail->Body = json_encode($config);

    if(!$mail->send()){
        die();
    }

} else if($_POST['hidden'] == "register"){
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LctdQITAAAAAENnVVeKuX12oRSYF7RO73BDgr3R&response=".$_POST['g-recaptcha-response']);

    if(json_decode($response)->success == true) {
        $mail->Subject = "Registration";
        $mail->Name = $_POST['parent-name'];
        $mail->From = $_POST['parent-email'];
        $mail->FromName = $_POST['parent-name'];
        $mail->addReplyTo($_POST['parent-email']);
        $mail->Body .= "Parent Name: " . $_POST['parent-name'] . "<br>";
        $mail->Body .= "Email: " . $_POST['email'] . "<br>";
        $mail->Body .= "Phone #: " . $_POST['phone'] . "<br>";
        $mail->Body .= "Address: " . $_POST['address'] . "<br>";
        $mail->Body .= "City: " . $_POST['city'] . "<br>";
        $mail->Body .= "Postal Code: " . $_POST['postal-code'] . "<br>";
        $mail->Body .= "Emergency Contact: " . $_POST['emergency-contact'] . "<br>";
        $mail->Body .= "Emergency Phone Number: " . $_POST['emergency-phone'] . "<br>";
        $mail->Body .= "Relation to camper/s: " . $_POST['relation'] . "<br>";
        $mail->Body .= "Camper 1 Name: " . $_POST['camper-1-name'] . "<br>";
        $mail->Body .= "Birthday: " . $_POST['birth-month'] . " " . $_POST['birth-day'] . " " . $_POST['birth-year'] . "<br>";
        $mail->Body .= "Shirt size C1: " . $_POST['shirt-size'] . "<br>";
        $mail->Body .= "Allergies: " . $_POST['allergies'] . "<br>";
        $mail->Body .= "Meds Required: " . $_POST['meds-req'] . "<br>";
        if ($_POST['camper-2-name'] != "") {

            $mail->Body .= "Camper 2 Name: " . $_POST['camper-2-name'] . "<br>";
            $mail->Body .= "Birthday: " . $_POST['birth-month-2'] . " " . $_POST['birth-day-2'] . " " . $_POST['birth-year-2'] . "<br>";
            $mail->Body .= "Shirt size C2: " . $_POST['shirt-size-2'] . "<br>";
            $mail->Body .= "Allergies: " . $_POST['allergies-2'] . "<br>";
            $mail->Body .= "Meds Required: " . $_POST['meds-req-2'] . "<br>";

        }
        $mail->Body .= "Weeks Selected: <br>";
        if ($_POST['A1'] == "true") {
            $mail->Body .= "&nbsp;&nbsp;&nbsp;July 18-22<br>";
        }
        if ($_POST['A2'] == "true") {
            $mail->Body .= "&nbsp;&nbsp;&nbsp;July 25-29<br>";
        }
        if ($_POST['B1'] == "true") {
            $mail->Body .= "&nbsp;&nbsp;&nbsp;August 15-19<br>";
        }
        if ($_POST['B2'] == "true") {
            $mail->Body .= "&nbsp;&nbsp;&nbsp;August 22-26<br>";
        }
	  $mail->Body .= "Promo Code: " . $_POST['promo-code'] . "<br>";
        $mail->Body .= "<br>";
        if (!$mail->send()) {
            die();
        }
    }

} else{
	$mail->From = 'adrian@savagebanana.com';
	$mail->FromName = 'Adrian';
	$mail->addReplyTo('adrian@savagebanana.com');
	$mail->Subject = 'Failed';
	$mail->Body = 'Not working';

    if(!$mail->send()){
        die();
    }
}


?>
