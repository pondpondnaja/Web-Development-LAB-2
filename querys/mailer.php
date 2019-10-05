<?php
    date_default_timezone_set('Asia/Bangkok');
    require ('../phpmailer/PHPMailerAutoload.php');

	if(isset($_POST['contact'])){
		$sender_name    = $_POST["fname"]; //sender name
		$lastname		= $_POST["lname"]; //sender last name
		$phonenumber	= $_POST["phone"]; //phone number
		$reply_to_email = $_POST["email"]; //sender email, it will be used in "reply-to" header
		$subject        = "Test email"; //subject for the email
		$message        = $_POST["message"]; //body of the email

		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = 'tls://smtp.live.com:587';
		$mail->SMTPAuth = true;
		$mail->Username = "nikepan4@hotmail.com";//Username to use for SMTP authentication
		$mail->Password = "nikepan5";//Password to use for SMTP authentication

		$mail->setFrom('nikepan4@hotmail.com');//Set who the message is to be sent from
		$mail->addAddress('futayo110@gmail.com');//Set who the message is to be sent to
		//Set the subject line
		$mail->Subject = 'Contact page';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
		$mail->Body ="
            Name: $sender_name<br> 
            Lastname: $lastname<br>
			Phonenumber: $phonenumber<br>
			Email: $reply_to_email<br><br><br>	
			$message";

		$mail->AltBody = $message;

		//send the message, check for errors
		if(!$mail->send()) {
			echo "<center>"."Mailer Error: " . $mail->ErrorInfo."</center>";

		}else{
            echo "<center>"."E-mail already sent!"."<br>"."We'll redirect you to home page in 10 secound"."<br><br>"."</center>";
            echo "<center>"."Name: ".$sender_name." ".$lastname."<br>"."Phonenumber: ".$phonenumber."Email: ".$reply_to_email."<br>"."Message: ".$message."</center>";
			header("refresh: 10; url = http://mungmee.ddns.net/");
		}

	}
?>
