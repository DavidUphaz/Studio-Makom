<?php

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$comments = $_POST['comments'];

//$to = 'studiomakom@gmail.com';
$to = 'studiomakom@gmail.com';
$subject = "subject: Contact Us -- Studio Makom";
$message = "Name: $name\n\r Tel: $tel \n\r Email: $email\n\r Message: $comments \n\r";
$headers = "From: Contact Us Form <admin@studiomakom.com>";

if (!mail($to, $subject, $message, $headers)){
	echo 'mailing ' . $headers . ' failed';
}
else{
	header('Location:' . $_GET['ResultURL']);
}
?>