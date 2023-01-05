<?php

if(!empty($_POST['template-contactform-hidden'])) die();

require_once('phpmailer/PHPMailerAutoload.php');

$message_success ='We have <strong>successfully</strong> received your request to repeat loan and will get back to you as soon as possible.';
$email = filter_var($_POST['template-contactform-email'], FILTER_SANITIZE_EMAIL);
$mobile = $_POST['template-contactform-contact-number'];
$loan_amount = $_POST['template-contactform-amount-needed'];
$months_needed = $_POST['template-contactform-months-needed'] / 30;
$payment_due_date = $_POST['template-contactform-payment_due_date'];
$repayment = $_POST['template-contactform-total-repayment'];
$installment = $_POST['template-contactform-net-proceed'];
$interest_service = $_POST['template-contactform-interest-service'];

$subject = "Vidalia - Repeat Loan";

$mail = new PhpMailer;
$mail->CharSet = 'UTF-8';
$mail->From = 'apply@vidalia.com.ph'; 
$mail->addReplyTo( $email);
$mail->FromName = 'Vidalia Lending Corp'; 
$mail->addAddress( "liteloan@vidalia.com.ph" , "Vidalia Lending Corporation" );     // Add a recipient
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = " <p>Here are the details sent on the online form<br/>
                ----------------------------------------------------------------------
                </p>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                    <tr>
                        <td width='190' height='30px'>Email Address : </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Mobile Number : </td>
                        <td>".$mobile."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Loan Amount : </td>
                        <td>PHP ".$loan_amount."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Months Needed : </td>
                        <td>".$months_needed."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Payment Due Date : </td>
                        <td>".$payment_due_date."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Total Repayment : </td>
                        <td>".$repayment."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Installment : </td>
                        <td>".$installment."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Interest and Charges : </td>
                        <td>".$interest_service."</td>
                    </tr>
                </table>
                <p>----------------------------------------------------------------------<br/>
                    Expect an email reply or sms within 24 hours. Please contact us if you have Not received any response.
                </p>
                ";

                // applicant/

                $forapplicantsubject = "Vidalia - Repeat Loan";
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'liteloan@vidalia.com.ph';
                $forapplicantmail->FromName = "Vidalia Lending Corp.";
                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true); // Set email format to HTML
                $forapplicantmail->Subject = $forapplicantsubject;
                $forapplicantmail->Body    = "
                    <div> 
                    <div>
                        <p>Your application has been submitted, Thank you!</p>
                        <p>If you have further questions, please contact with the methods listed below</p>
                            <p> (02) 534-2556 | 718-0358 </p>
                        <p> &gt; Send SMS (include your name &amp; type of loan) or call us on these cell numbers</p>
                            <p> 0998 566 2503 (Smart) </p>
                            <p> 0917 795 0793 (Globe) </p>
                            <p> 0922 870 5130 (Sun) </p>
                    </div>
                    <p>Here are the details you sent on the secure online form<br/>
                        ----------------------------------------------------------------------
                    </p>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                    <tr>
                        <td width='190' height='30px'>Email: </td>
                        <td>". $email. "</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Mobile Number: </td>
                        <td>". $mobile. "</td>
                    </tr>
                     <tr>
                        <td width='190' height='30px'>Loan Amount : </td>
                        <td>PHP ".$loan_amount."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Months Needed : </td>
                        <td>".$months_needed."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Payment Due Date : </td>
                        <td>".$payment_due_date."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Total Repayment : </td>
                        <td>".$repayment."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Installment : </td>
                        <td>".$installment."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Interest amd Charges : </td>
                        <td>".$interest_service."</td>
                    </tr>
                </table>
                <p>----------------------------------------------------------------------<br/>
                    Expect an email reply or sms within 24 hours. Please contact us if you have Not received any response.
                </p>
                ";
    if($email == '' || $mobile == '' || $loan_amount == '' || $months_needed == '0' || $payment_due_date == '' || $repayment == '' || $installment == '' || $interest_service == '') {
    	 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent.<br/> Make sure you fill out all the fields.<br /><br /><strong>" }';
    } else{
    	$sendEmail = $mail->Send();
        if ( $sendEmail == true ) {
            $sendEmail2 = $forapplicantmail->Send();
        } else {
            echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
        }
    	echo '{ "alert": "success", "message": "' . $message_success . '" }';
    }


?>