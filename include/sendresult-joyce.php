<?php
	
require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box'; //recaptcha error message

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    
    //your site secret key
    $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    
	/* Initialize variables */
	// $fromEmail 	= "investment@vidalia.com.ph";
	$fromEmail 	= "joyce@molavenet.com";
	$fromName 	= "Vidalia Lending";
	$subject 	= "Investment Calculator Result";

	$customerEmail			= $_POST['template-contactform-customer-email'];
	$customerFName			= $_POST['template-contactform-customer-fname'];
	$customerLName			= $_POST['template-contactform-customer-lname'];
	$customerNumber			= $_POST['template-contactform-customer-number'];
	$customerAmountInvested	= $_POST['template-contactform-current-invest'];
	$customerTerms			= $_POST['template-contactform-year'];
	$customerPlacementDate	= $_POST['template-contactform-current-placement-date'];
	$customerReturnDate		= $_POST['template-contactform-current-return-date'];
	$customerInterestRate	= $_POST['template-contactform-current-interest'];
	$customerTotalEarnings	= $_POST['template-contactform-current-earning'];
	$customerTotalReturn	= $_POST['template-contactform-current-total-earning'];
	$customerCurrency		= $_POST['template-contactform-currency'];
	$customerName = $customerFName." ".$customerLName;

	$message_success = 'Message sent successful please check your inbox. Thank you!';

	if (empty($customerEmail) || empty($customerName)) {
		echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later." }';
	}

	$mail = new PhpMailer;
	$mail->CharSet = 'UTF-8';
	$mail->From = $fromEmail;
	$mail->FromName = $fromName;
	$mail->addReplyTo( $fromEmail, $fromName );
	$mail->addAddress( $customerEmail, $customerName );     // Add a recipient
	$mail->isHTML(true); // Set email format to HTML
	$mail->Subject = $subject;

	if (isset($_POST['special_offer']) && $_POST['special_offer']) {
		
		$customerTermLabel = "years";
		$customerEarningsPerYear = $_POST['template-contactform-current-earning-year'];

		$body = "
		<p>Hello ".$customerFName." ".$customerLName.",</p>

		<table>		
			<tr><td><strong>Name: &nbsp;&nbsp;</strong></td> <td>".$customerFName." ".$customerLName."</td></tr>				
			<tr><td><strong>Email: &nbsp;&nbsp;</strong></td> <td>".$customerEmail."</td></tr>				
			<tr><td><strong>Contact Number: &nbsp;&nbsp;</strong></td> <td>".$customerNumber."</td></tr>				
			<tr><td><strong>Amount Invested:&nbsp;&nbsp;</strong></td> <td>".$customerCurrency." ".$customerAmountInvested."</td></tr>
			<tr><td><strong>Terms:&nbsp;&nbsp;</strong></td> <td>".$customerTerms." ".$customerTermLabel."</td></tr>
			<tr><td><strong>Placement Date:&nbsp;&nbsp;</strong></td> <td>".$customerPlacementDate."</td></tr>
			<tr><td><strong>Return Date:&nbsp;&nbsp;</strong></td> <td>".$customerReturnDate."</td></tr>
			<tr><td><strong>Interest Rate:&nbsp;&nbsp;</strong></td> <td>".$customerInterestRate."</td></tr>
			<tr><td><strong>Earnings per year:&nbsp;&nbsp;</strong></td> <td>".$customerEarningsPerYear."</td></tr>
			<tr><td><strong>Total Interest Earnings:&nbsp;&nbsp;</strong></td> <td>".$customerTotalEarnings."</td></tr>
			<tr><td><strong>How Much You'll Get Back:&nbsp;&nbsp;</strong></td> <td>".$customerTotalReturn."</td></tr>
		</table>";

	} else {

		$customerTermLabel = "months";

		$body = "
		<p>Hello ".$customerFName." ".$customerLName.",</p>

		<table>				
			<tr><td><strong>Name: &nbsp;&nbsp;</strong></td> <td>".$customerFName." ".$customerLName."</td></tr>				
			<tr><td><strong>Email: &nbsp;&nbsp;</strong></td> <td>".$customerEmail."</td></tr>		
			<tr><td><strong>Contact Number: &nbsp;&nbsp;</strong></td> <td>".$customerNumber."</td></tr>		
			<tr><td><strong>Amount Invested:&nbsp;&nbsp;</strong></td> <td>".$customerCurrency." ".$customerAmountInvested."</td></tr>
			<tr><td><strong>Terms:&nbsp;&nbsp;</strong></td> <td>".$customerTerms." ".$customerTermLabel."</td></tr>
			<tr><td><strong>Placement Date:&nbsp;&nbsp;</strong></td> <td>".$customerPlacementDate."</td></tr>
			<tr><td><strong>Return Date:&nbsp;&nbsp;</strong></td> <td>".$customerReturnDate."</td></tr>
			<tr><td><strong>Interest Rate:&nbsp;&nbsp;</strong></td> <td>".$customerInterestRate."</td></tr>
			<tr><td><strong>Total Interest Earnings:&nbsp;&nbsp;</strong></td> <td>".$customerTotalEarnings."</td></tr>
			<tr><td><strong>How Much You'll Get Back:&nbsp;&nbsp;</strong></td> <td>".$customerTotalReturn."</td></tr>
		</table>";
	}

	$mail->Body = $body;

	$forapplicantmail = new PhpMailer;
	$forapplicantmail->CharSet = 'UTF-8';
	$forapplicantmail->From = $fromEmail;
	$forapplicantmail->FromName = $fromName;
	$forapplicantmail->addReplyTo( $customerEmail, $customerName );
	// $forapplicantmail->addAddress( "teaminvest@vidalia.com.ph", "Vidalia Lending Investment"); 
	 $forapplicantmail->addAddress( "joyce@molavenet.com", "Vidalia Lending Investment"); 
	// $forapplicantmail->addAddress( "mario@vidalia.com.ph", "Vidalia Lending Corp.");     // Add a recipient
	// $forapplicantmail->addAddress( "stephanie@vidalia.com.ph", "Vidalia Lending Corp.");     // Add a recipient
	$forapplicantmail->isHTML(true); // Set email format to HTML
	$forapplicantmail->Subject = $subject;
	$forapplicantmail->Body = $body;


	if($customerFName == '' || $customerLName == '' || $customerEmail == '' || $customerNumber == '' || $customerCurrency == '' || $customerAmountInvested == '' || $customerTerms == '' || $customerTermLabel == '' || $customerPlacementDate == '' || $customerReturnDate == '' || $customerInterestRate == '' || $customerTotalEarnings == '' || $customerTotalReturn == '')
	{
		 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
	}
	else
	{
		
		$sendEmail = $mail->Send();
		$sendEmail2 = $forapplicantmail->Send();
		
	}

		

	if( $sendEmail == true ) {
		echo '{ "alert": "success", "message": "' . $message_success . '" }';
	} else {
		echo '{ "alert": "error", "message": "' . $mail->ErrorInfo . '" }';
	}

} else {
   echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}