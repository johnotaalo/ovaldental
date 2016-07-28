<?php

class Mailer
{
	public $mailer;
	function __construct(){
		$this->mailer = new PHPMailer;
		// $this->mailer->Username
	}

	function sendmail($sender, $recepient, $message)
	{
		$mail = $this->mailer;
		// $mail->SMTPDebug = 3;										// Enable verbose debug output

		$mail->isSMTP();											// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;										// Enable SMTP authentication
		$mail->Username = 'chrizota@gmail.com';						// SMTP username
		$mail->Password = 'Chrispine2015';							// SMTP password
		$mail->SMTPSecure = 'ssl';									// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;											// TCP port to connect to

		$mail->setFrom($sender['email'], $sender['name']);
		$mail->addAddress($recepient['email'], $recepient['name']);	// Add a recipient
		$mail->isHTML(true);										// Set email format to HTML

		$mail->Subject = $message['subject'];
		$mail->Body    = $message['body'];
		// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			return [
				"type"		=>	FALSE,
				"message"	=>	 $mail->ErrorInfo
			];
		} else {
			return [
				"type"		=>	TRUE,
				"message"	=>	"Email has been sent"
			];
		}
	}
}