<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mail extends CI_Controller {

	 function __construct(){

        parent::__construct();


    }

    function send_email() {
        $this->load->view('mail_form');
        $this->load->library('phpmailer');
        $this->load->helper('url');
        if(isset($_POST['btnsend']))  {
           $mail = new PHPMailer(); // defaults to using php "mail()"
           $mail->CharSet="UTF-8";
           $path=base_url() . 'assets/mail.html';
           $body=file_get_contents($path);
           $mail->SetFrom('bla@bla.com','blabla.com');
           $address = $_POST['email'];
           $mail->AddAddress($address, "Guest");
           $mail->Subject = "bla";
           $mail->MsgHTML($body);
           $mail->AddEmbeddedImage('logo.jpg', 'logo', 'logo.jpg','base64','image/jpeg');
          if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
          } else {
              echo "A test email sent to your email address '".$_POST['email']."' Please Check Email  and Spam too.";     

          }
       }


   }
	

}
?>