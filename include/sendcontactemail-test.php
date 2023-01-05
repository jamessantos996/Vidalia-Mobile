<?php

require_once ('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box';

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
    $sendEmail = true;

    if ($sendEmail == true)
    {

        echo '{ "alert": "success", "message": "' . $message_success . '" }';

    }
    else
    {

        echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';

    }
}
else
{
    echo '{ "alert": "error", "mesassage": "' . $recaptcha_failed . '" }';
}

