<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscribe_btn'])){
		$email_from = $_POST['email_add'];
		$subject = "Subscribed by {$email_from} ";
		$message = "A Person with Email Address : {$email_from} has subscribed to AAT Newsletter\r\n";
		$email_to = "asianadventuretrips@gmail.com";
		$headers = "From: {$email_from} " . "\r\n" .
		"Reply-To: {$email_to} " . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		if(mail($email_to, $subject, $message, $headers)){
			header('Location: /subscribe/thankyou.html');
		}
	}else{
		header('Location: //asianadventuretrips.com');
	}
?>