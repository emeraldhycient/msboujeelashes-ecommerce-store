<?php
session_start();

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;





class Connection {
    
    protected static $connect = null;

    function __construct()
    {
        self::connector();
    }

    private static function connector()
    {
        try{
            self::$connect = new mysqli('localhost','root','','msboujeelashes');
            if(! self::$connect){
                throw new Exception("unable to connect to db :".self::$connect->connect_error, 1);
            }
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }

    protected static function filter($data){
        $data = trim($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = self::$connect->real_escape_string($data);
           return $data;
    }

    public static function sendmail($receiveremail,$receivername,$subject,$body){

        $mail = new PHPMailer(true);
    
        $data = [];
    
        try {
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'msboujeelashes.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'support@msboujeelashes.com';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom("support@msboujeelashes.com", "msboujeelashes.com");
            $mail->addAddress($receiveremail, $receivername);     // Add a recipient
    
            // Attachments
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    =$body;
            $mail->send();
    
            $data = array(
                'status' => "success",
                'message' => "mail sent"
            );
    
        } catch (Exception $e) {
            $data = array(
                'status' => "failed",
                'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            );
            
        }
    
        return json_encode($data);
    
    
        }
    
}