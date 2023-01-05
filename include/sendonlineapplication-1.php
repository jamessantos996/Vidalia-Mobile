<?php
require_once('phpmailer/PHPMailerAutoload.php');
require __DIR__ . '/vendor/autoload.php';

if (empty($_POST)) {
    header('Location: /');
    exit();
}

$message_success = 'We have received your application! Please check your email on the status of your loan.';

$typeOfLoan        = $_POST['template-contactform-type-of-loan'];
$fname             = $_POST['template-contactform-name'];
$mname             = $_POST['template-contactform-middle-name'];
$lname             = $_POST['template-contactform-last-name'];
$bmonth            = $_POST['template-contactform-birth-month'];
$bday              = $_POST['template-contactform-birth-day'];
$byear             = $_POST['template-contactform-birth-year'];
$bdate             = $bmonth . "-" . $bday . "-" . $byear;
$bdate1 = $_POST['template-contactform-date'];
//$bdate = date("m-d-Y", strtotime($bdate));
$email             = $_POST['template-contactform-email'];
$cellphone         = $_POST['template-contactform-cellphone'];
$landline          = $_POST['template-contactform-landline'];
$homeAddress       = $_POST['template-contactform-home-address'];
$zipcode           = $_POST['template-contactform-zipcode'];
$city              = $_POST['template-contactform-city'];
$provincialAddress = $_POST['template-contactform-provincial-address'];
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
$appliedLoanAmount = $_POST['template-contactform-applied-loan-amount'];
// $agree             = $_POST['agree'];
$valid             = isset($_POST['valid']) ? $_POST['valid'] : "";

// Additional Information for Small Business Loan personal and salary
$monthlyGross     = isset($_POST['monthlyGross']) ? $_POST['monthlyGross'] : "";
$hearAboutUs      = $_POST['template-contactform-how'];
$foodDining       = isset($_POST['foodDining']) ? $_POST['foodDining'] : "";
$referrer         = $_POST['referrer'];
$businessName     = isset($_POST['BusinessName']) ? $_POST['BusinessName'] : "";
$businessAddress  = isset($_POST['BusinessAddress']) ? $_POST['BusinessAddress'] : "";
$natureOfBusiness = isset($_POST['BusinessNature']) ? $_POST['BusinessNature'] : "";
$businessStarted  = isset($_POST['template-contactform-businessdate']) ? $_POST['template-contactform-businessdate'] : "";
$businessStarted  = date("m-d-Y", strtotime($businessStarted));
//$businessStarted        = $_POST['BusinessMonth']." ".$_POST['BusinessDay'].", ".$_POST['BusinessYear'];

$date_today       = date("Y-m-d");
$status           = " ";

    
    if ($typeOfLoan == "Personal") {
        
        $subject = $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;
        
        if ($city == "Others") {
            echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
        } else {
            $mail                = new PhpMailer;
            $mail->CharSet       = 'UTF-8';
            $mail->From          = 'hazel@molavenet.com';
            $mail->addReplyTo($email, $fname . " " . $mname . " " . $lname);
            $mail->FromName      = $fname . " " . $mname . " " . $lname;
            $mail->addAddress('hazel@molavenet.com', "Vidalia Lending Corp.");
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject       = $subject;
            $mail->Body          = "
            <div>
                <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Submitted Details:</b></p>
            </div>
            <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year - " . $ResidenceYear . " , Months - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
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
                    <td width='190' height='30px'>Loan Purpose: </td>
                    <td>" . $purpose . "    " . $otherpurpose . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                 <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "  " . $referrer . "</td>
                </tr>
            </table>";
            
            $forapplicantsubject        = "Your Onlineloan Application has been submitted";
            $forapplicantmail           = new PhpMailer;
            $forapplicantmail->CharSet  = 'UTF-8';
            $forapplicantmail->From     = 'hazel@molavenet.com';
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year/s - " . $ResidenceYear . " , Month/s - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
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
                    <td width='190' height='30px'>Loan Purpose: </td>
                    <td>" . $purpose . "    " . $otherpurpose . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                 <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "   " . $referrer . " </td>
                </tr>
            </table>";
            
            if ($fname == '' || $mname == '' || $lname == '' || $typeOfLoan == '' || $bdate == '' || $email == '' || $cellphone == '' || $landline == '' || $homeAddress == '' || $zipcode == '' || $city == '' || $typeOfResidence == '' || $ResidenceYear == '' || $ResidenceMonth == '' || $provincialAddress == '' || $presentCompany == '' || $jobPosition == '' || $employmentStatus == '' || $currentSalary == '' || $employmentYear == '' || $employmentMonth == '' || $purpose == '' || $appliedLoanAmount == '' || $hearAboutUs == '') {
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

                       //google API connections		
                        $client = new \Google_Client();
                        $client->setApplicationName('Vidalia-Integration');
                        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
                        $client->setAccessType('offline');
     
                        $client->setAuthConfig('vidalia-credits.json');
     
                        $sheets = new \Google_Service_Sheets($client);
     
                        $data = [];
     
                        $currentRow = 70;
     
                        $spreadsheetId = '1BTalgTFhLPA6oHIQd5OOeyP9TuxeYZwQZMBNWW26xUo';
                        $range = 'A2:H';
     
                        $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
     
                        if (isset($rows['values'])) {
                            $updateRange = 'A2:C';
                            $valueRange = new Google_Service_Sheets_ValueRange();
                            $valueRange->setValues([[$date_today, $status, $fname, $mname, $lname, $typeOfLoan, $bdate, $email, $cellphone, $landline, $homeAddress, $zipcode, $city, $typeOfResidence,
                                                     $ResidenceYear, $ResidenceMonth, $provincialAddress, $presentCompany, $jobPosition, $employmentStatus, $currentSalary, $employmentYear,
                                                     $employmentMonth, $purpose, $otherpurpose, $appliedLoanAmount, $hearAboutUs, $referrer]]);
                            $range = 'Sheet1!A1:A';
                            $updateBody = new \Google_Service_Sheets_ValueRange([
                            'range' => $updateRange,
                            'majorDimension' => 'ROWS',
                            'values' => ['values' => $date_today,      'values' => $status,         'values' => $fname,          
                                        'values' => $mname,            'values' => $lname, 
                                        'values' => $typeOfLoan,       'values' => $bdate,          'values' => $email,
                                        'values' => $cellphone,        'values' => $landline,       'values' => $homeAddress,
                                        'values' => $zipcode,          'values' => $city,           'values' =>$typeOfResidence,
                                        'values' => $ResidenceYear,    'values' => $ResidenceMonth, 'values' => $provincialAddress,
                                        'values' => $presentCompany,   'values' => $jobPosition,    'values' => $employmentStatus,
                                        'values' => $currentSalary,    'values' => $employmentYear, 'values' => $employmentMonth,
                                        'values' => $purpose,          'values' => $otherpurpose,   'values' => $appliedLoanAmount,
                                        'values' => $hearAboutUs,      'values' => $referrer, ],
                            ]);
                            $sheets->spreadsheets_values->append(
                            $spreadsheetId,
                            $range,
                            $valueRange,
                            ['valueInputOption' => 'USER_ENTERED']  
                            );
             
                                echo '{ "alert": "success", "message": "' . $message_success . '" }';
        
         
                            } else {
                                echo "error";
                            }

            }
        }
    } else if ($typeOfLoan == "Salary") {
        
        $subject = $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;
        
        if ($city == "Others") {
            echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
        } else {
            $mail            = new PhpMailer;
            $mail->CharSet   = 'UTF-8';
            $mail->From      = 'hazel@molavenet.com';
            $mail->addReplyTo($email, $fname . " " . $mname . " " . $lname);
            $mail->FromName  = $fname . " " . $mname . " " . $lname;
            $mail->addAddress('hazel@molavenet.com', "Vidalia Lending Corp.");
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject   = $subject;
            $mail->Body      = "
            <div>
                <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Submitted Details:</b></p>
            </div>
            <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year - " . $ResidenceYear . " , Months - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
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
                    <td width='190' height='30px'>Loan Purpose: </td>
                    <td>" . $purpose . "    " . $otherpurpose . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                 <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "   " . $referrer . "</td>
                </tr>
            </table>";
            
            $forapplicantsubject       = "Your Onlineloan Application has been submitted";
            $forapplicantmail          = new PhpMailer;
            $forapplicantmail->CharSet = 'UTF-8';
            $forapplicantmail->From = 'hazel@molavenet.com';
            $forapplicantmail->FromName = "Vidalia Lending Corp.";
            $forapplicantmail->addAddress($email, $fname . " " . $mname . " " . $lname); // Add a recipient
            $forapplicantmail->isHTML(true); // Set email format to HTML
            $forapplicantmail->Subject = $forapplicantsubject;
            $forapplicantmail->Body    = "
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year/s - " . $ResidenceYear . " , Month/s - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
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
                    <td width='190' height='30px'>Loan Purpose: </td>
                    <td>" . $purpose . "    " . $otherpurpose . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
                 <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "   " . $referrer . " </td>
                </tr>
            </table>";
            
            if ($fname == '' || $mname == '' || $lname == '' || $typeOfLoan == '' || $bdate == '' || $email == '' || $cellphone == '' || $landline == '' || $homeAddress == '' || $zipcode == '' || $city == '' || $typeOfResidence == '' || $ResidenceYear == '' || $ResidenceMonth == '' || $provincialAddress == '' || $presentCompany == '' || $jobPosition == '' || $employmentStatus == '' || $currentSalary == '' || $employmentYear == '' || $employmentMonth == '' || $purpose == '' || $appliedLoanAmount == '' || $hearAboutUs == '') {
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

                       //google API connections		
                        $client = new \Google_Client();
                        $client->setApplicationName('Vidalia-Integration');
                        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
                        $client->setAccessType('offline');
     
                        $client->setAuthConfig('vidalia-credits.json');
     
                        $sheets = new \Google_Service_Sheets($client);
     
                        $data = [];
     
                        $currentRow = 70;
     
                        $spreadsheetId = '1BTalgTFhLPA6oHIQd5OOeyP9TuxeYZwQZMBNWW26xUo';
                        $range = 'A2:H';
     
                        $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
     
                        if (isset($rows['values'])) {
                            $updateRange = 'A2:C';
                            $valueRange = new Google_Service_Sheets_ValueRange();
                            $valueRange->setValues([[$date_today, $status, $fname, $mname, $lname, $typeOfLoan, $bdate, $email, $cellphone, $landline, $homeAddress, $zipcode, $city, $typeOfResidence,
                                                     $ResidenceYear, $ResidenceMonth, $provincialAddress, $presentCompany, $jobPosition, $employmentStatus, $currentSalary, $employmentYear,
                                                     $employmentMonth, $purpose, $otherpurpose, $appliedLoanAmount, $hearAboutUs, $referrer]]);
                            $range = 'Sheet1!A1:A';
                            $updateBody = new \Google_Service_Sheets_ValueRange([
                            'range' => $updateRange,
                            'majorDimension' => 'ROWS',
                            'values' => ['values' => $date_today,      'values' => $status,         'values' => $fname,          
                                        'values' => $mname,            'values' => $lname, 
                                        'values' => $typeOfLoan,       'values' => $bdate,          'values' => $email,
                                        'values' => $cellphone,        'values' => $landline,       'values' => $homeAddress,
                                        'values' => $zipcode,          'values' => $city,           'values' =>$typeOfResidence,
                                        'values' => $ResidenceYear,    'values' => $ResidenceMonth, 'values' => $provincialAddress,
                                        'values' => $presentCompany,   'values' => $jobPosition,    'values' => $employmentStatus,
                                        'values' => $currentSalary,    'values' => $employmentYear, 'values' => $employmentMonth,
                                        'values' => $purpose,          'values' => $otherpurpose,   'values' => $appliedLoanAmount,
                                        'values' => $hearAboutUs,      'values' => $referrer, ],
                            ]);
                            $sheets->spreadsheets_values->append(
                            $spreadsheetId,
                            $range,
                            $valueRange,
                            ['valueInputOption' => 'USER_ENTERED']  
                            );
             
                                echo '{ "alert": "success", "message": "' . $message_success . '" }';
        
         
                            } else {
                                echo "error";
                            }
            }
            
        }

    } else if ($typeOfLoan == "Lite") {
        
        $subject = $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;
        
        if ($city == "Others") {
            echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
        } else {
            $mail            = new PhpMailer;
            $mail->CharSet   = 'UTF-8';
            $mail->From      = 'joyce@molavenet.com';
            $mail->addReplyTo($email, $fname . " " . $mname . " " . $lname);
            $mail->FromName  = $fname . " " . $mname . " " . $lname;
            $mail->addAddress('joyce@molavenet.com', "Vidalia Lending Corp.");
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject   = $subject;
            $mail->Body      = "
            <div>
                <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Submitted Details:</b></p>
            </div>
            <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
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
                    <td>" . $bdate1 . "</td>
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
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
            </table>";
            
            $forapplicantsubject       = "Your Onlineloan Application has been submitted";
            $forapplicantmail          = new PhpMailer;
            $forapplicantmail->CharSet = 'UTF-8';
            $forapplicantmail->From = 'joyce@molavenet.com';
            $forapplicantmail->FromName = "Vidalia Lending Corp.";
            $forapplicantmail->addAddress($email, $fname . " " . $mname . " " . $lname); // Add a recipient
            $forapplicantmail->isHTML(true); // Set email format to HTML
            $forapplicantmail->Subject = $forapplicantsubject;
            $forapplicantmail->Body    = "
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
                    <td>" . $bdate1 . "</td>
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
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
                </tr>
            </table>";
            
            if ($fname == '' || $mname == '' || $lname == '' || $typeOfLoan == '' || $bdate1 == '' || $email == '' || $cellphone == '' || $homeAddress == '' || $city == '' || $typeOfResidence == '' || $presentCompany == '' || $jobPosition == '' || $employmentStatus == '' || $currentSalary == '' || $employmentYear == '' || $employmentMonth == '' || $appliedLoanAmount == '') {
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

                       //google API connections     
                        $client = new \Google_Client();
                        $client->setApplicationName('Vidalia-Integration');
                        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
                        $client->setAccessType('offline');
     
                        $client->setAuthConfig('vidalia-credits.json');
     
                        $sheets = new \Google_Service_Sheets($client);
     
                        $data = [];
     
                        $currentRow = 70;
     
                        $spreadsheetId = '1BTalgTFhLPA6oHIQd5OOeyP9TuxeYZwQZMBNWW26xUo';
                        $range = 'A2:H';
     
                        $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
     
                        if (isset($rows['values'])) {
                            $updateRange = 'A2:C';
                            $valueRange = new Google_Service_Sheets_ValueRange();
                            $valueRange->setValues([[$date_today, $status, $fname, $mname, $lname, $typeOfLoan, $bdate, $email, $cellphone, $landline, $homeAddress, $zipcode, $city, $typeOfResidence,
                                                     $ResidenceYear, $ResidenceMonth, $provincialAddress, $presentCompany, $jobPosition, $employmentStatus, $currentSalary, $employmentYear,
                                                     $employmentMonth, $purpose, $otherpurpose, $appliedLoanAmount, $hearAboutUs, $referrer]]);
                            $range = 'Sheet1!A1:A';
                            $updateBody = new \Google_Service_Sheets_ValueRange([
                            'range' => $updateRange,
                            'majorDimension' => 'ROWS',
                            'values' => ['values' => $date_today,      'values' => $status,         'values' => $fname,          
                                        'values' => $mname,            'values' => $lname, 
                                        'values' => $typeOfLoan,       'values' => $bdate,          'values' => $email,
                                        'values' => $cellphone,        'values' => $landline,       'values' => $homeAddress,
                                        'values' => $zipcode,          'values' => $city,           'values' =>$typeOfResidence,
                                        'values' => $ResidenceYear,    'values' => $ResidenceMonth, 'values' => $provincialAddress,
                                        'values' => $presentCompany,   'values' => $jobPosition,    'values' => $employmentStatus,
                                        'values' => $currentSalary,    'values' => $employmentYear, 'values' => $employmentMonth,
                                        'values' => $purpose,          'values' => $otherpurpose,   'values' => $appliedLoanAmount,
                                        'values' => $hearAboutUs,      'values' => $referrer, ],
                            ]);
                            $sheets->spreadsheets_values->append(
                            $spreadsheetId,
                            $range,
                            $valueRange,
                            ['valueInputOption' => 'USER_ENTERED']  
                            );
             
                                echo '{ "alert": "success", "message": "' . $message_success . '" }';
        
         
                            } else {
                                echo "error";
                            }
            }
            
        }
        
    } else {
        
        // Send function for small business
        $subject = $typeOfLoan . " Loan Application from " . $fname . " " . $mname . " " . $lname;
        
        if ($city == "Others") {
            
            echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
            
        } else {
            
            $mail               = new PhpMailer;
            $mail->CharSet      = 'UTF-8';
            $mail->From         = 'hazel@molavenet.com';
            $mail->addReplyTo($email, $fname . " " . $mname . " " . $lname);
            $mail->FromName     = $fname . " " . $mname . " " . $lname;
            $mail->addAddress('hazel@molavenet.com', "Vidalia Lending Corp."); // Add a recipient
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject      = $subject;
            $first_half_message = "
            <div>
                <p style='padding:10px 0;color:#DFA128; font-weight: 700;'><b>Submitted Details:</b></p>
            </div>
            <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
                <tr>
                    <td width='190' height='30px' >Type of Loan: </td>
                    <td>" . $typeOfLoan . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year - " . $ResidenceYear . " , Months - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "   " . $referrer . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Company/Business Name: </td>
                    <td>" . $businessName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Business Address: </td>
                    <td>" . $businessAddress . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Nature of Business: </td>
                    <td>" . $natureOfBusiness . "</td>
                </tr>";
            
            $withfoodDining = "
                <tr>
                    <td width='190' height='30px'>Type of Business: </td>
                    <td>" . $foodDining . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Business Date Started: </td>
                    <td>" . $businessStarted . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Gross: </td>
                    <td>" . $monthlyGross . "</td>
                </tr>
            </table>";
            
            $withoutfoodDining = "
                <tr>
                    <td width='190' height='30px'>Business Date Started: </td>
                    <td>" . $businessStarted . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Gross: </td>
                    <td>" . $monthlyGross . "</td>
                </tr>
            </table>";
            
            if ($foodDining == '') {
                $mail->Body = $first_half_message . "" . $withoutfoodDining;
            } else {
                $mail->Body = $first_half_message . "" . $withfoodDining;
            }
            
            $subjectForApplicant = "Your Onlineloan Application has been submitted";
            
            $mailForApplicant           = new PhpMailer;
            $mailForApplicant->CharSet  = 'UTF-8';
            $mailForApplicant->From     = 'bl@vidalia.com.ph';
            $mailForApplicant->FromName = "Vidalia Lending Corp.";
            $mailForApplicant->addReplyTo('hazel@molavenet.com', "Vidalia Lending Corp.");
            $mailForApplicant->addAddress($email, $fname . " " . $mname . " " . $lname); // Add a recipient
            $mailForApplicant->isHTML(true); // Set email format to HTML
            $mailForApplicant->Subject = $subjectForApplicant;
            
            $first_half_message = "
            <div> 
                <b>" . $fname . " " . $mname . " " . $lname . "</b>

                <div><p>Your application has been submitted, THANK YOU!</p>
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
                    <td width='190' height='30px' >Type of Loan: </td>
                    <td>" . $typeOfLoan . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Applied Loan Amount: </td>
                    <td>" . $appliedLoanAmount . " PHP</td>
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
                    <td width='190' height='30px'>Landline: </td>
                    <td>" . $landline . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Current Address: </td>
                    <td>" . $homeAddress . " </td>
                </tr>
				<tr>
                    <td width='190' height='30px'>Zip Code: </td>
                    <td>" . $zipcode . " </td>
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
                    <td width='190' height='30px'>Length of Residence: </td>
                    <td>Year - " . $ResidenceYear . " , Months - " . $ResidenceMonth . " </td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Provincial Address: </td>
                    <td>" . $provincialAddress . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>How did you hear about us?: </td>
                    <td>" . $hearAboutUs . "   " . $referrer . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Company/Business Name: </td>
                    <td>" . $businessName . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Business Address: </td>
                    <td>" . $businessAddress . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Nature of Business: </td>
                    <td>" . $natureOfBusiness . "</td>
                </tr>";
            
            $withfoodDining = "
                <tr>
                    <td width='190' height='30px'>Type of Business: </td>
                    <td>" . $foodDining . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Business Date Started: </td>
                    <td>" . $businessStarted . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Gross: </td>
                    <td>" . $monthlyGross . "</td>
                </tr>
            </table>";
            
            $withoutfoodDining = "
                <tr>
                    <td width='190' height='30px'>Business Date Started: </td>
                    <td>" . $businessStarted . "</td>
                </tr>
                <tr>
                    <td width='190' height='30px'>Monthly Gross: </td>
                    <td>" . $monthlyGross . "</td>
                </tr>
            </table>";
            
            if ($foodDining == '') {
                $mailForApplicant->Body = $first_half_message . "" . $withoutfoodDining;
            } else {
                $mailForApplicant->Body = $first_half_message . "" . $withfoodDining;
            }
            
            
            if ($typeOfLoan == '' || $appliedLoanAmount == '' || $fname == '' || $mname == '' || $lname == '' || $bmonth == '' || $bday == '' || $byear == '' || $bdate == '' || $email == '' || $cellphone == '' || $landline == '' || $homeAddress == '' || $zipcode == '' || $city == '' || $city == '' || $typeOfResidence == '' || $ResidenceYear == '' || $ResidenceMonth == '' || $provincialAddress == '' || $hearAboutUs == '' || $businessName == '' || $businessAddress == '' || $natureOfBusiness == '' || $businessStarted == '' || $monthlyGross == '') {
                echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
            } else {

                $sendEmail1 = $mail->Send();
                if ($sendEmail1 == true) {

                    $status = "Yes";
                    $sendEmail2 = $mailForApplicant->Send();
                    

               } else {
                   echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
                   $status = "No";
                }

                    
                    //google API connections		
                    $client = new \Google_Client();
                    $client->setApplicationName('Vidalia-Integration');
                    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
                    $client->setAccessType('offline');
 
                    // $jsonAuth = getenv('JSON_AUTH');
                    // $client->setAuthConfig(json_decode($jsonAuth, true));
                    $client->setAuthConfig('vidalia-credits.json');
 
                    $sheets = new \Google_Service_Sheets($client);
 
                    $data = [];
 
                    $currentRow = 70;
 
                    $spreadsheetId = '1BTalgTFhLPA6oHIQd5OOeyP9TuxeYZwQZMBNWW26xUo';
                    $range = 'A2:H';
 
                    $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
 
                    if (isset($rows['values'])) {
                        $updateRange = 'A2:C';
                        $valueRange = new Google_Service_Sheets_ValueRange();
                        $valueRange->setValues([[$date_today, $status, $fname, $mname, $lname, $typeOfLoan, $bdate, $email, $cellphone, $landline, $homeAddress, $zipcode, $city, $typeOfResidence,
                                                 $ResidenceYear, $ResidenceMonth, $provincialAddress, $presentCompany, $jobPosition, $employmentStatus, $currentSalary, $employmentYear,
                                                 $employmentMonth, $purpose, $otherpurpose, $appliedLoanAmount, $hearAboutUs, $referrer, $businessName, $businessAddress,
                                                 $natureOfBusiness, $businessStarted, $monthlyGross ]]);
                        $range = 'Sheet1!A1:A';
                        $updateBody = new \Google_Service_Sheets_ValueRange([
                        'range' => $updateRange,
                        'majorDimension' => 'ROWS',
                        'values' => ['values' => $date_today,      'values' => $status,         'values' => $fname,          
                                    'values' => $mname,            'values' => $lname, 
                                    'values' => $typeOfLoan,       'values' => $bdate,          'values' => $email,
                                    'values' => $cellphone,        'values' => $landline,       'values' => $homeAddress,
                                    'values' => $zipcode,          'values' => $city,           'values' =>$typeOfResidence,
                                    'values' => $ResidenceYear,    'values' => $ResidenceMonth, 'values' => $provincialAddress,
                                    'values' => $presentCompany,   'values' => $jobPosition,    'values' => $employmentStatus,
                                    'values' => $currentSalary,    'values' => $employmentYear, 'values' => $employmentMonth,
                                    'values' => $purpose,          'values' => $otherpurpose,   'values' => $appliedLoanAmount,
                                    'values' => $hearAboutUs,      'values' => $referrer,       'values' => $businessName,
                                    'values' => $businessAddress,   'values' => $natureOfBusiness, 'values' => $businessStarted,
                                    'values' => $monthlyGross, ],
                        ]);
                        $sheets->spreadsheets_values->append(
                        $spreadsheetId,
                        $range,
                        $valueRange,
                        ['valueInputOption' => 'USER_ENTERED']  
                        );
                        
                            echo '{ "alert": "success", "message": "' . $message_success . '" }';

                        } else {
                            echo "error";
                        }
           }
           
        }
    }
}


?>