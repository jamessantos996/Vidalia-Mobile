<?php



require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed='Please click on the reCAPTCHA box';

 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    if(!empty($_POST['template-contactform-hidden'])) die();
//your site secret key
$secret = '6Le0S3QUAAAAAMFAwKvvhvOY8-rZRT68Ks1vh_C2';
//get verify response data
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);

$message_success ='We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
$name = $_POST['template-contactform-name'];
$email = $_POST['template-contactform-email'];
$phone = $_POST['template-contactform-phone'];
$emailsubject = $_POST['template-contactform-subject']; 
$message = $_POST['template-contactform-message'];
$subject = "Vidalia - Contact Us";

$mail = new PhpMailer;

//$mail->From = 'info@vidalia.com.ph'; 
$mail->From = 'joyce@molavenet.com'; 
$mail->addReplyTo( $email, $name );
$mail->FromName = 'Vidalia Lending Corp'; 

//$mail->addAddress( "apply@vidalia.com.ph" , "Vidalia Lending Corporation" );     // Add a recipient
 $mail->addAddress( "joyce@molavenet.com" , "Vidalia Lending Corporation" );     // Add a recipient
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = $subject;

$mail->Body    = " <div> 
                    <h3 style='padding:10px 0;'><b>Submitted Details:</b></h3>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>

                    <tr>
                        <td width='190' height='30px'>Name : </td>
                        <td>".$name."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Email : </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Contact Number : </td>
                        <td>".$phone."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Subject : </td>
                        <td>".$emailsubject."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Message : </td>
                        <td>".$message."</td>
                    </tr>
                </table>";

                // applicant/

                $forapplicantsubject = "Vidalia - Contact Us";



                $forapplicantmail = new PhpMailer;

                //$forapplicantmail->From = 'apply@vidalia.com.ph';
                $forapplicantmail->From = 'joyce@molavenet.com';

                $forapplicantmail->FromName = "Vidalia Lending Corp.";

                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient

                $forapplicantmail->isHTML(true); // Set email format to HTML

                $forapplicantmail->Subject = $forapplicantsubject;

                $forapplicantmail->Body    = "
                    <div> 
                    <b>". $name ."</b>

                     <div><p>Your inquiry has been submitted, THANK YOU!</p>
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

                        <td width='190' height='30px'>Name: </td>

                        <td>". $name ."</td>

                    </tr>

                    <tr>

                        <td width='190' height='30px'>Email: </td>

                        <td>". $email. "</td>

                    </tr>
					
					<tr>

                        <td width='190' height='30px'>Contact Number: </td>

                        <td>". $phone. "</td>

                    </tr>
					
                    <tr>

                        <td width='190' height='30px'>Subject: </td>

                        <td>". $emailsubject ."</td>

                    </tr>

                    <tr>

                        <td width='190' height='30px'>Message: </td>

                        <td>". $message ."</td>

                    </tr>

                </table>

                ";



if($name == '' || $email == '' || $phone == '' || $emailsubject == '' || $message == '')
{
	 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
}
else{
	$sendEmail = $mail->Send();
	$sendEmail2 = $forapplicantmail->Send();
}

if( $sendEmail == true ) {

    echo '{ "alert": "success", "message": "' . $message_success . '" }';


} else {

    echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';

}
} else{
   echo '{ "alert": "error", "mesassage": "' . $recaptcha_failed . '" }';
}
?>