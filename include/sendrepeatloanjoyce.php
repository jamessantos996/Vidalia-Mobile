<?php

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

$mail->From = 'joyce@molavenet.com'; 
$mail->addReplyTo( $email);
$mail->FromName = 'Vidalia Lending Corp'; 
$mail->addAddress( "joyce@molavenet.com" , "Vidalia Lending Corporation" );     // Add a recipient
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = " <div> 
                    <h3 style='padding:10px 0;'><b>Submitted Details:</b></h3>
                </div>
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
                </table>";

                // applicant/

                $forapplicantsubject = "Vidalia - Repeat Loan";
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'joyce@molavenet.com';
                $forapplicantmail->FromName = "Vidalia Lending Corp.";
                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true); // Set email format to HTML
                $forapplicantmail->Subject = $forapplicantsubject;
                $forapplicantmail->Body    = "
                    <div> 
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
                </table>";
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