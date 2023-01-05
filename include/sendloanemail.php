<?php

require_once('phpmailer/PHPMailerAutoload.php');



$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

$typeOfLoan = $_POST['loan-type'];
$fname = $_POST['loan-first-name'];
$mname = $_POST['loan-middle-name'];
$lname = $_POST['loan-last-name'];
$status = $_POST['loan-Civil-Status'];
$bmonth = $_POST['loan-birth-month'];
$bday = $_POST['loan-birth-day'];
$byear = $_POST['loan-birth-year'];
$bdate =  $bmonth. "-" . $bday . "-" . $byear;
$email = $_POST['loan-email'];
$cellphone = $_POST['loan-contact-number'];
$landline = $_POST['loan-landline-number'];
$homeAddress = $_POST['loan-home-address'];
$city = $_POST['loan-city'];
$provincialAddress = $_POST['loan-provincial-address'];
$Residence = $_POST['loan-type-of-residence'];
$usedfree = $_POST['template-contactform-use-free'];
$typeOfResidence = $Residence . " " . $usedfree;
$typeOfResidenceYear = $_POST['loan-residences-year'];
$typeOfResidenceMonth = $_POST['loan-residences-month'];
$presentCompany = $_POST['loan-present-company-address'];
$jobPosition = $_POST['loan-present-job-position'];
$employmentStatus = $_POST['loan-employment-status'];
$currentSalary = $_POST['loan-current-salary'];
$employmentYear = $_POST['loan-employment-year'];
$employmentMonth = $_POST['loan-employment-month'];
$LoanPurpose= $_POST['loan-purpose'];
$otherpurpose = $_POST['template-contactform-purpose-others'];
$appliedLoanAmount = $_POST['loan-applied-loan-amount'];
$agree = $_POST['agree'];

if( $agree != "agree" ) {
echo '{ "alert": "error", "message": "Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy" }';
}
else{

if( $city == "Others" ) {

    echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';

}
else{
$subject = $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;
                $mail = new PhpMailer;
                $mail->From = 'apply@vidalia.com.ph';  
                $mail->addReplyTo( $email, $name );
                $mail->FromName = $fname . " " . $mname . " " . $lname ;
                // $mail->addAddress( "apply@vidalia.com.ph" , "Vidalia Lending Corp." );     // Add a recipient
                $mail->addAddress( "kenneth@molavenet.com" , "Vidalia Lending Corp." );     // Add a recipient
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = "
                <div> 
                    <p style='padding:5px 0;color:#DFA128; font-weight: 700;'><b>Personal Details:</b></p>
                </div>
                <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>First Name: </td>
                        <td>".$fname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Middle Name: </td>
                        <td>".$mname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Last Name: </td>
                        <td>".$lname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Type of Loan: </td>
                        <td>".$typeOfLoan."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Civil Status: </td>
                        <td>".$status."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Birth Date: </td>
                        <td>".$bdate."</td>
                    </tr>
                    <tr>
                        <td width='190' height='40px'><p style='padding:5px 0;color:#DFA128; font-weight: 700;'><b>Contact Information:</b></p> </td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Email: </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Cellphone: </td>
                        <td>".$cellphone."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Landline: </td>
                        <td>".$landline."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Home Address: </td>
                        <td>".$homeAddress." </td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>City: </td>
                        <td>".$city."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Provincial Address: </td>
                        <td>".$provincialAddress."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Type Of Residence: </td>
                        <td>".$typeOfResidence."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Lengthn Residences: </td>
                        <td> Year - ".$typeOfResidenceYear."  Month - ".$typeOfResidenceMonth."</td>
                    </tr>
                    <tr>
                        <td width='190' height='40px'><p style='padding:5px 0;color:#DFA128; font-weight: 700;'><b>Work Information:</b></p> </td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Present Company: </td>
                        <td>".$presentCompany."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Job Position: </td>
                        <td>".$jobPosition."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Employment Status: </td>
                        <td>".$employmentStatus."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Current Salary: </td>
                        <td>".$currentSalary."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Employment Length: </td>
                        <td> Year - ".$employmentYear.", Month - ".$employmentMonth."</td>
                    </tr>
                    <tr>
                        <td width='190' height='40px'><p style='padding:5px 0;color:#DFA128; font-weight: 700;'><b>Loan Information:</b></p> </td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Loan Purpose: </td>
                        <td>".$LoanPurpose." ".$otherpurpose."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' style='padding-left:40px;'>Applied Loan Amount: </td>
                        <td>".$appliedLoanAmount." php</td>
                    </tr>
                </table>";

                $forapplicantsubject = "Your Onlineloan Application has been submitted";
                $forapplicantmail = new PhpMailer;
                $forapplicantmail->From = 'apply@vidalia.com.ph';
                $forapplicantmail->FromName = "Vidalia Lending Corp.";
                $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
                $forapplicantmail->isHTML(true); // Set email format to HTML
                $forapplicantmail->Subject = $forapplicantsubject;
                $forapplicantmail->Body = "
                <div> 
                    <b>". $fname . " " . $mname . " " . $lname ."</b>

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
                        <td width='190' height='30px'>First Name: </td>
                        <td>".$fname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Middle Name: </td>
                        <td>".$mname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Last Name: </td>
                        <td>".$lname."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px' >Type of Loan: </td>
                        <td>".$typeOfLoan."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Birth Date: </td>
                        <td>".$bdate."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Email: </td>
                        <td>".$email."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Cellphone: </td>
                        <td>".$cellphone."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Landline: </td>
                        <td>".$landline."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Home Address: </td>
                        <td>".$homeAddress." , ".$streetAddress." , s".$brgyAddress."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>City: </td>
                        <td>".$city."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Provincial Address: </td>
                        <td>".$provincialAddress."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Type Of Residence: </td>
                        <td>".$typeOfResidence."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Present Company: </td>
                        <td>".$presentCompany."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Job Position: </td>
                        <td>".$jobPosition."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Employment Status: </td>
                        <td>".$employmentStatus."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Current Salary: </td>
                        <td>".$currentSalary."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Employment Length: </td>
                        <td> Year - ".$employmentYear.", Month - ".$employmentMonth."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Loan Purpose: </td>
                        <td>".$LoanPurpose." ".$otherpurpose."</td>
                    </tr>
                    <tr>
                        <td width='190' height='30px'>Applied Loan Amount: </td>
                        <td>".$appliedLoanAmount."</td>
                    </tr>
                </table>";

$sendEmail = $mail->Send();
$sendEmail = $forapplicantmail->Send();


if( $sendEmail == true ) {

    echo '{ "alert": "success", "message": "' . $message_success . '" }';

} else {

    echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';

}
}
}
?>