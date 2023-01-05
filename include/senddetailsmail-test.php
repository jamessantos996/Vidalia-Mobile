<?php
if (!empty($_POST['template-contactform-hidden']))
{
    die();
}

if (!empty($_POST['user_name']))
{
    die();
}

if (!empty($_POST['user_contact']))
{
    die();
}

$recaptcha_failed = 'Please click on the reCAPTCHA box';

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
	$sendEmail = true;
            if ($sendEmail == true)
            {
                echo '{ "alert": "success", "message": "sdfsdfsdfsdfsdf" }';
            }
            else
            {
                echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
            }


}else
{
    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}

?>
