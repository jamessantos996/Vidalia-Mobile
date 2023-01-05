<?php

require_once('phpmailer/PHPMailerAutoload.php');
$recaptcha_failed='Please click on the reCAPTCHA box';
 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

        //your site secret key
        $secret = '6LcJuCkTAAAAAGSvfyYykjLRJwAtMpWmRRFfkmbD';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        $message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';



$name = $_POST['template-contactform-name'];
$lname = $_POST['template-contactform-lname'];
$email = $_POST['template-contactform-email'];
$company = $_POST['template-contactform-cname'];
$number = $_POST['template-contactform-pnumber'];

$fname = $_POST['template-contactform-friendname'];
$flname = $_POST['template-contactform-friendlastname'];
$femail = $_POST['template-contactform-friendemail'];
$fcompany = $_POST['template-contactform-friendcompany'];
$fnumber = $_POST['template-contactform-friendnumber'];



$subject = 'Vidalia Lending Referral Program';
$mail = new PhpMailer;
$mail->From = 'sender@vidalia.com'; 
$mail->addReplyTo( $email, $name );
$mail->FromName = $name . " " . $lname; // Everest Online Marketing
// $mail->addAddress( "apply@vidalia.com.ph" , "Vidalia Lending Corporation" );     // Add a recipient
$mail->addAddress( "kenneth@molavenet.com" , "Vidalia Lending Corporation" );     // Add a recipient
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = "
               <div> 
                    <p style='padding:10px 0;'><b>Vidalia Lending Referral Program</b></p>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                <tr>
                    <td width='190' height='30px' style='vertical-align: top;'><h4>Client's Information</h4></td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Name: </td>
                        <td>". $name ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Last Name: </td>
                        <td>". $lname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Email : </td>
                        <td>". $email. "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Company : </td>
                        <td>". $company ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Phone Number: </td>
                        <td>". $number ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'><h4>Referred Friend's Information </h4></td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>First Name: </td>
                        <td>". $fname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Last Name: </td>
                        <td>". $flname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Email : </td>
                        <td>". $femail. "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Company : </td>
                        <td>". $fcompany ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Phone Number: </td>
                        <td>". $fnumber ."</td>
                    </tr>
                </table>";

                // For applicant

                $forapplicantsubject = "Your Referral Application has been submitted";
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'apply@vidalia.com.ph';
                $forapplicantmail->FromName = "Vidalia Lending Corp.";
                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true); // Set email format to HTML
                $forapplicantmail->Subject = $forapplicantsubject;
                $forapplicantmail->Body  = "
                    <div> 
                    <b>". $lname . "," . $fname ."</b>

                     <div><p>Your application has been submitted, THANK YOU!</p>
                            <p>One of our Marketing staff will contact you within 24 hours.</p>
                            <p>If you have further questions please contact with the methods listed below</p>
                            <p> &gt; Our landline numbers (02) 534-2556 | 534-5482 | 718-0358|</p>
                            <p> &gt; Send SMS or call us on this cell numbers</p>
                            <p>
                                0939 927 2375 (smart) <br>
                                0917 328 4072 (globe) <br>
                                0922 870 5130 (sun) <br>
                            </p>

                        </div>
                    <p style='padding:10px 0;'><b>Below are the details you have submitted on the online form</b></p>

                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                <tr>
                    <td width='190' height='30px' style='vertical-align: top;'><h4>Referrer's Information </h4></td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Name: </td>
                        <td>". $name ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Last Name: </td>
                        <td>". $lname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Email : </td>
                        <td>". $email. "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Company : </td>
                        <td>". $company ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Phone Number: </td>
                        <td>". $number ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'><h4>Your Friend's Information</h4></td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>First Name: </td>
                        <td>". $fname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Last Name: </td>
                        <td>". $flname ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Email : </td>
                        <td>". $femail. "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Company : </td>
                        <td>". $fcompany ."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='vertical-align: top;'>Phone Number: </td>
                        <td>". $fnumber ."</td>
                    </tr>
                </table>";

$sendEmail = $mail->Send();
$sendEmail2 = $forapplicantmail->Send();


if( $sendEmail == true ) {

    echo '{ "alert": "success", "message": "' . $message_success . '" }';

} else {

    echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';

}

}
else{
    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}

?>