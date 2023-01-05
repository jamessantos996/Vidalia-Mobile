<?php

require_once('phpmailer/PHPMailerAutoload.php');



$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';



$fname = $_POST['template-contactform-name'];
$lname = $_POST['template-contactform-last-name'];
$email = $_POST['template-contactform-email'];
$cellphone = $_POST['template-contactform-cellphone'];
$landline = $_POST['template-contactform-landline'];
$homeAddress = $_POST['template-contactform-home-address'];
$residence = $_POST['template-contactform-type-of-residence'];
$presentCompany = $_POST['template-contactform-company'];
$job = $_POST['template-contactform-job-position'];
$salary = $_POST['template-contactform-salary'];
$loanAmount = $_POST['template-contactform-loan-amount'];
$how = $_POST['template-contactform-how'];
$CompanyName = $_POST['template-contactform-company-name'];
$business = $_POST['template-contactform-business'];
$date = $_POST['template-contactform-date-started'];
$website = $_POST['template-contactform-website'];
$gross = $_POST['template-contactform-gross'];


$subject = "Vidalia Online Application from " . $fname . " " . $lname;

$mail = new PhpMailer;
$mail->From = 'sender@vidalia.com'; 
$mail->addReplyTo( $email, $name );
$mail->FromName = $fname . " " . $lname ; // Everest Online Marketing
// $mail->addAddress( "apply@vidalia.com.ph" , "Vidalia Lending Corporation" );  
$mail->addAddress( "kenneth@molavenet.com" , "Vidalia Lending Corporation" );  
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = "
                <div> 
                    <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Personal Details:</b></p>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                    <tr>
                        <td width='190' height='30px'>First Name : </td>
                        <td>".$fname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Last Name : </td>
                        <td>".$lname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Email : </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Cellphone : </td>
                        <td>".$cellphone."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Landline : </td>
                        <td>".$landline."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Home Address : </td>
                        <td>".$homeAddress."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Type of Residence : </td>
                        <td>".$residence."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Present Company : </td>
                        <td>".$presentCompany."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Job Position : </td>
                        <td>".$job."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Current Salary : </td>
                        <td>".$salary."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Loan Amount : </td>
                        <td>".$loanAmount."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>How did you hear about us? : </td>
                        <td>".$how."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Company Name : </td>
                        <td>".$CompanyName."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Nature of Business: </td>
                        <td>".$business."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Date Started : </td>
                        <td>".$date."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Company Name : </td>
                        <td>".$website."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Nature of Business: </td>
                        <td>".$gross."</td>
                    </tr>
                </table>";

                // for applicant

                $forapplicantsubject = "Your Vidalia Online Application has been submitted";
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'apply@vidalia.com.ph';
                $forapplicantmail->FromName = "Vidalia Lending Corp.";
                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true); // Set email format to HTML
                $forapplicantmail->Subject = $forapplicantsubject;
                $forapplicantmail->Body = "
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
                        <td width='190' height='30px'>First Name : </td>
                        <td>".$fname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Last Name : </td>
                        <td>".$lname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Email : </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Cellphone : </td>
                        <td>".$cellphone."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Landline : </td>
                        <td>".$landline."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Home Address : </td>
                        <td>".$homeAddress."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Type of Residence : </td>
                        <td>".$residence."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Present Company : </td>
                        <td>".$presentCompany."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Job Position : </td>
                        <td>".$job."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Current Salary : </td>
                        <td>".$salary."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Loan Amount : </td>
                        <td>".$loanAmount."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>How did you hear about us? : </td>
                        <td>".$how."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Company Name : </td>
                        <td>".$CompanyName."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Nature of Business: </td>
                        <td>".$business."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Date Started : </td>
                        <td>".$date."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Company Name : </td>
                        <td>".$website."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Nature of Business: </td>
                        <td>".$gross."</td>
                    </tr>
                </table>";


$sendEmail = $mail->Send();
$sendEmail2 = $forapplicantmail->Send();


if( $sendEmail == true ) {

    echo '{ "alert": "success", "message": "' . $message_success . '" }';

} else {

    echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';

}



?>