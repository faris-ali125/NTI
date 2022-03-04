<?php
namespace app\database\helpers\mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// require '../../../../vendor/autoload.php';

class mail{

private $mail_to;
private $body;
private $subject;
private $mail;

public function __construct($mail_to,$subject,$body){

    $this->mail_to = $mail_to;
	$this->subject = $subject;
	$this->body = $body;  
	$this->mail = new PHPMailer(true);

		//SERVER
	$this->mail->SMTPDebug = SMTP::DEBUG_OFF;									
	$this->mail->isSMTP();											
	$this->mail->Host	  = 'smtp.gmail.com;';					
	$this->mail->SMTPAuth = true;							
	$this->mail->Username = 'faris.ali.5382@gmail.com';				
	$this->mail->Password = 'f99f66b7ALI';						
	$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;							
	$this->mail->Port	 = 465;
}


public function send() 
{
	try {
		//RECIPER
	   $this->mail->setFrom('faris.ali.5382@gmail.com', 'Ecommerce');		
	   $this->mail->addAddress($this->mail_to);
	   // CONTENT
	   $this->mail->isHTML(true);								
	   $this->mail->Subject = $this->subject;
	   $this->mail->Body = $this->body;
	//    $this->mail->AltBody = 'Body in plain text for non-HTML mail clients';
	   $this->mail->send();
	//    echo "Mail has been sent successfully!";
	   return true;
   } catch (Exception $e) {
	   echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
	   return false;
   }


}

	
}

// $mail = new mail('farisali125@yahoo.com', 'test', 'Helo world');
// var_dump($mail->send());






?>
