<?php

require_once('phpmailer/PHPMailerAutoload.php');
require __DIR__ . '/vendor/autoload.php';

if (empty($_POST)) {
    header('Location: /');
    exit();
}

$message_success = 'We have received your application! Please check your email on the status of your loan.';

$typeOfLoan        = $_POST['template-contactform-type-of-loan'];
$documentName      = $_POST['lite-sssgsisdriver'];
$documentNumber    = $_POST['lite-sss-gsis-driver-number'];
$fname             = $_POST['template-contactform-name'];
$mname             = $_POST['template-contactform-middle-name'];
$lname             = $_POST['template-contactform-last-name'];
$bdate             = $_POST['template-contactform-date'];
$email             = filter_var($_POST['template-contactform-email'], FILTER_SANITIZE_EMAIL);
$cellphone         = $_POST['template-contactform-cellphone'];
$homeAddress       = filter_var($_POST['template-contactform-home-address'], FILTER_SANITIZE_STRING);
$city              = $_POST['template-contactform-city'];
$Residence         = $_POST['template-contactform-type-of-residence'];
$usedfree          = (!isset($_POST['template-contactform-use-free']) && !empty($_POST['template-contactform-use-free'])) ? "" : " " . $_POST['template-contactform-use-free'];
$renting           = (!isset($_POST['template-contactform-renting']) && !empty($_POST['template-contactform-renting'])) ? "" : " " . $_POST['template-contactform-renting'];

$typeOfResidence = $Residence . $usedfree . $renting;

$ResidenceYear     = $_POST['template-contactform-Residences-year'];
$ResidenceMonth    = $_POST['template-contactform-Residences-month'];
$presentCompany    = isset($_POST['template-contactform-present-company']) ? $_POST['template-contactform-present-company'] : "";
$jobPosition       = isset($_POST['template-contactform-job-position']) ? $_POST['template-contactform-job-position'] : "";
$employmentStatus  = isset($_POST['template-contactform-employment-status']) ? $_POST['template-contactform-employment-status'] : "";
$currentSalary     = isset($_POST['template-contactform-current-salary']) ? $_POST['template-contactform-current-salary'] : "";
$employmentYear    = isset($_POST['template-contactform-employment-year']) ? $_POST['template-contactform-employment-year'] : "";
$employmentMonth   = isset($_POST['template-contactform-employment-month']) ? $_POST['template-contactform-employment-month'] : "";
$purpose           = isset($_POST['template-contactform-purpose']) ? $_POST['template-contactform-purpose'] : "";
$otherpurpose      = isset($_POST['template-contactform-purpose-others']) ? $_POST['template-contactform-purpose-others'] : "";

$accountName = $_POST['AccountName'];
$accountNumber = $_POST['AccountNumber'];
$bankName = filter_var($_POST['BankName'], FILTER_SANITIZE_STRING);
$otherBankName = (!isset($_POST['template-contactform-otherbankname']) && !empty($_POST['template-contactform-otherbankname'])) ? "" : " " . $_POST['template-contactform-otherbankname'];
$NameofBank = $bankName . $otherBankName;

$appliedLoanAmount = $_POST['template-contactform-applied-loan-amount'];
$paymentTerm = $_POST['template-contactform-payment-term'];
$paymentDueDate = $_POST['template-contactform-payment-due-date'];
$totalRepayment = $_POST['template-contactform-total-repayment'];
$interest = $_POST['template-contactform-interest-fees'];
$installment = $_POST['template-contactform-installment'];

$date_today       = date("Y-m-d");
$status           = " ";

if ($typeOfLoan == "Lite") {

        $subject = $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;

        if ($city == "Others") {
            echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
        } else {

            $mail                = new PhpMailer;
            $mail->CharSet       = 'UTF-8';
            // $mail->From          = 'liteloan@vidalia.com.ph';
            $mail->From          = 'joyce@molavenet.com';
            $mail->addReplyTo($email, $fname . " " . $mname . " " . $lname);
            $mail->FromName      = $fname . " " . $mname . " " . $lname;
            // $mail->addAddress('liteloan@vidalia.com.ph', "Vidalia Lending Corp.");
            $mail->addAddress('joyce@molavenet.com', "Vidalia Lending Corp.");
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject       = $subject;
            $mail->Body          = "
            <div>
                <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Submitted Details:</b></p>
            </div>
            <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                <tr>
                    <td width='190' height='30px'>Type of ID to Submit: </td>
                    <td>" . $documentName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>ID number: </td>
                    <td>" . $documentNumber . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>First Name: </td>
                    <td>" . $fname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Middle Name: </td>
                    <td>" . $mname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Last Name: </td>
                    <td>" . $lname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px' >Type of Loan: </td>
                    <td>" . $typeOfLoan . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Birth Date: </td>
                    <td>" . $bdate . "</td>
                </tr>
                                <tr>
                    <td width='190' height='30px'>Email: </td>
                    <td>" . $email . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Cellphone: </td>
                    <td>" . $cellphone . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>City: </td>
                    <td>" . $city . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Type Of Residence: </td>
                    <td>" . $typeOfResidence . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Present Company: </td>
                    <td>" . $presentCompany . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Job Position: </td>
                    <td>" . $jobPosition . "</td>
                </tr>

                <tr>
                    <td width='190' height='30px'>Employment Status: </td>
                    <td>" . $employmentStatus . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Basic Salary: </td>
                    <td>" . $currentSalary . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Employment Length: </td>
                    <td> Year - " . $employmentYear . ", Month - " . $employmentMonth . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Account Name: </td>
                    <td>" . $accountName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Account Number: </td>
                    <td>" . $accountNumber . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Bank Name: </td>
                    <td>" . $NameofBank . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Payment Term: </td>
                    <td>" . $paymentTerm . " Month</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Loan Maturity: </td>
                    <td>" . $paymentDueDate  . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Total Repayment: </td>
                    <td>" . $totalRepayment . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Interest and Charges: </td>
                    <td>" . $interest   . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Installment: </td>
                    <td>" . $installment  . " PHP</td>
                </tr>
            </table>";

            $forapplicantsubject        = "Your Onlineloan Application has been submitted";
            $forapplicantmail           = new PhpMailer;
            $forapplicantmail->CharSet  = 'UTF-8';
            // $forapplicantmail->From     = 'liteloan@vidalia.com.ph';
            $forapplicantmail->From     = 'joyce@molavenet.com';
            $forapplicantmail->FromName = "Vidalia Lending Corp.";
            $forapplicantmail->addAddress($email, $fname . " " . $mname . " " . $lname); // Add a recipient
            $forapplicantmail->isHTML(true); // Set email format to HTML
            $forapplicantmail->Subject  = $forapplicantsubject;
            $forapplicantmail->Body     = "
             <div> 
                <b>" . $fname . " " . $mname . " " . $lname . "</b>

                <div>
                    <p>Your application has been submitted, THANK YOU!</p>
                    <p>One of our Marketing staff will contact you via e-mail within 24 working hours.</p>
                    <p>If you have further questions, please contact with the methods listed below</p>
                    <p> &gt; Our landline numbers (02) 534-2556 | 718-0358|</p>
                    <p> &gt; Send SMS (include your name &amp; type of loan) or call us on these cell numbers</p>
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
                    <td width='190' height='30px'>Type of ID to Submit: </td>
                    <td>" . $documentName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>ID number: </td>
                    <td>" . $documentNumber . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>First Name: </td>
                    <td>" . $fname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Middle Name: </td>
                    <td>" . $mname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Last Name: </td>
                    <td>" . $lname . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px' >Type of Loan: </td>
                    <td>" . $typeOfLoan . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Birth Date: </td>
                    <td>" . $bdate . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Email: </td>
                    <td>" . $email . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Cellphone: </td>
                    <td>" . $cellphone . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>City: </td>
                    <td>" . $city . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Type Of Residence: </td>
                    <td>" . $typeOfResidence . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Present Company: </td>
                    <td>" . $presentCompany . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Job Position: </td>
                    <td>" . $jobPosition . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Employment Status: </td>
                    <td>" . $employmentStatus . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Basic Salary: </td>
                    <td>" . $currentSalary . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Employment Length: </td>
                    <td> Year/s - " . $employmentYear . ", Month/s - " . $employmentMonth . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Account Name: </td>
                    <td>" . $accountName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Account Number: </td>
                    <td>" . $accountNumber . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Bank Name: </td>
                    <td>" . $NameofBank . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Payment Term: </td>
                    <td>" . $paymentTerm . " Month</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Loan Maturity: </td>
                    <td>" . $paymentDueDate  . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Total Repayment: </td>
                    <td>" . $totalRepayment . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Interest and Charges: </td>
                    <td>" . $interest   . " PHP</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Installment: </td>
                    <td>" . $installment  . " PHP</td>
                </tr>
                </table>

                <div style='padding:10px 0;'>
                    <p>As a Borrower, you fully understand and recognize that your loan application is considered as an offer ONLY. <br/>
                    The approval of your application shall be decided upon VLC’s close assessment and with accordance to VLC’s terms and policies. <br/>
                    You willfully agree with VLC’s decision and shall not resort to any complaints nor seek rectification against VLC regarding these matters. </p>
                </div>
                ";

                if ($documentName == '' || $documentNumber == '' || $fname == '' || $mname == '' || $lname == '' || $typeOfLoan == '' || $bdate == '' || $email == '' || $cellphone == '' || $homeAddress == '' || $city == '' || $typeOfResidence == '' || $presentCompany == '' || $jobPosition == '' || $employmentStatus == '' || $currentSalary == '' || $employmentYear == '' || $employmentMonth == '' || $appliedLoanAmount == '' || $paymentDueDate == '' || $totalRepayment == '' || $interest == '' || $installment == '') {
                    echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
                } else {
                    $sendEmail1 = $mail->Send();
                    if ($sendEmail1 == true) {

                        $status = "Yes";
                        $sendEmail2 = $forapplicantmail->Send();

                    } else {
                        echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
                        $status = "No";

                    }
                    echo '{ "alert": "success", "message": "' . $message_success . '" }';

                }

        }

}