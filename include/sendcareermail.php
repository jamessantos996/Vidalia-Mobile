<?php

if(!empty($_POST['applicantname'])) die();

ini_set('display_errors', 0);
require_once('phpmailer/PHPMailerAutoload.php');
$recaptcha_failed='Please click on the reCAPTCHA box';

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
$secret = '6Le0S3QUAAAAAMFAwKvvhvOY8-rZRT68Ks1vh_C2';
        //get verify response data
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);

$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

$position = $_POST['template-jobform-position'];
$name = filter_var($_POST['template-jobform-name'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['template-jobform-phone'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['template-jobform-email'], FILTER_SANITIZE_EMAIL);
$referrer = filter_var($_POST['template-jobform-referrer'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['template-contactform-message'], FILTER_SANITIZE_STRING);

// $resume = $_POST['template-jobform-resume'];


$subject = "Vidalia Careers - Apply Now";
$isCorrectFormat = true;

$mail = new PhpMailer;
$mail->From = 'jobs@vidalia.com.ph';
$mail->addReplyTo( $email, $name );
$mail->FromName = $name;

// $mail->addAddress( "jobs@vidalia.com.ph" , "Vidalia Lending Corporation" );     // Add a recipient
//$mail->addAddress( "kenneth@molavenet.com" , "Vidalia Careers");     // Add a recipient
$mail->addAddress( "jobs@vidalia.com.ph" , "Vidalia Careers");
$mail->isHTML(true);
$mail->Subject = $subject;

$mail->Body    = "
                <div> 
                    <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Application Form</b></p>
                    <p style='padding:3px 0;'><b>Sender\'s Information:</b></p>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                    <tr>
                        <td width='190' height='30px' >Desired Position: </td>
                        <td>". $position ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Name: </td>
                        <td>". $name . "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Phone #: </td>

                        <td>". $phone ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Email: </td>

                        <td>". $email ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Referred By: </td>

                        <td>". $referrer ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Message: </td>
                        <td>". $message ."</td>
                    </tr>
                </table>";

                // for Applicant
                $forapplicantsubject = 'Application Received!';
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'jobs@vidalia.com.ph';
                $forapplicantmail->FromName = 'Vidalia Lending Corporation';
                //$forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true);
                $forapplicantmail->Subject = $subject;
                $forapplicantmail->Body    = "
                <div> 

                    <b style='padding:20px 0;'> Dear ". $name ."</b>
                    <div style='padding:10px 0;'><p>Good day!</p>
                    <p>We have received your application for the position of " .$position. " </p>
                    <p>Thank you for the interest shown in our company.</p>
                    <p>Please be informed that we are in the midst of processing the applications and shall get in touch with you again if you are shortlisted for</p>
                    <p>an interview. If your credential fit with the requirements of the position we will get in touch with you for an interview.</p>
                    <p>Yours sincerely,
                    Human Resources Department</p>
                    </div>
                </div>
                </table>";
        $sendEmail = $mail->Send();
        $sendEmail2 = $forapplicantmail->Send();
        if( $sendEmail == true ) {
            echo '{ "alert": "success", "message": "' . $message_success . '" }';
        } else {
            echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><br />' . $mail->ErrorInfo . '" }';
        }
} else{
    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}
?>