<?php
namespace App\Libraries;
use CodeIgniter\Email\Email as BaseEmail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_lib extends BaseEmail {
	
    public function load(){
        require_once APPPATH.'ThirdParty/PHPMailer/Exception.php';
        require_once APPPATH.'ThirdParty/PHPMailer/PHPMailer.php';
        require_once APPPATH.'ThirdParty/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer;
        return $mail;
    }

}