<?php

use App\Logo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendGeneralMail($data)
{
    $general = Logo::first();

    

    if($general->email_config == null){
        return redirect()->back();
    }


    if ($general->email_method == 'php') {
        $headers = "From: $general->sitename <$general->site_email> \r\n";
        $headers .= "Reply-To: $general->sitename <$general->site_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($data['email'], $data['subject'], $data['message'], $headers);
    } else {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $general->email_config->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->email_config->smtp_username;
            $mail->Password   = $general->email_config->smtp_password;
            if ($general->email_config->smtp_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $general->email_config->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->site_email, $general->sitename);
            $mail->addAddress($data['contact'], $data['invoiceto']);
            $mail->addReplyTo($general->site_email, $general->sitename);
            $mail->isHTML(true);
            $mail->Subject = "Invoice Send";
            $mail->Body    = "Hi ".$data['invoiceto'].",
            <br>

            I hope you’re well. Please see attached invoice. Don’t hesitate to reach out if you have any questions.

            <br>
            <a href='". route('invoice.download',$data['id']) ."'>Download Now</a></i>

            <br>
            Kind regards,<br>
            ".$general->sitename;
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

}



function uploadImage($location,$olds){


    if (is_array($olds) || is_object($olds) || is_iterable($olds))
    {

        foreach($olds as $old){
            @unlink(public_path($location).$old);
        }
    }

}


function menuActive($routeName)
{

    $class = 'show';

    if (is_array($routeName)) {
        foreach ($routeName as $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}
