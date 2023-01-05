<?php
// SUBSCRIBE TO MAILING LIST OPTION - ADD TO MAILCHIMP USING API

	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = 'c85596f0cd'; // Your MailChimp List ID
	if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
		$listId = $_GET['list'];
	}
	$message_success = 'You have <strong>successfully</strong> subscribe!';
	$email = $_POST['template-contactform-customer-email'];
	$fname = isset( $_POST['template-contactform-customer-fname'] ) ? $_POST['template-contactform-customer-fname'] : '';
	$lname = isset( $_POST['template-contactform-customer-lname'] ) ? $_POST['template-contactform-customer-lname'] : '';
	$cpnumber = isset( $_POST['template-contactform-customer-number'] ) ? $_POST['template-contactform-customer-number'] : '';
	$datacenter = explode( '-', $apiKey );
	$submit_url = "https://" . $datacenter[1] . ".api.mailchimp.com/3.0/lists/" . $listId . "/members/" ;

	if( isset( $email ) AND $email != '' ) {

		$merge_vars = array();
		if( $fname != '' ) { $merge_vars['FNAME'] = $fname; }
		if( $lname != '' ) { $merge_vars['LNAME'] = $lname; }
		if( $cpnumber != '' ) { $merge_vars['CPNUMBER'] = $cpnumber; }

		$data = array(
			'email_address' => $email,
			'status' => 'subscribed'
		);
		
		if( !empty( $merge_vars ) ) { $data['merge_fields'] = $merge_vars; }

		$payload = json_encode($data);

		$auth = base64_encode( 'user:' . $apiKey );

		$header   = array();
		$header[] = 'Content-type: application/json; charset=utf-8';
		$header[] = 'Authorization: Basic ' . $auth;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $submit_url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		$result = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($result);
		
		
	}
	
require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box'; //recaptcha error message

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    
    //your site secret key
    $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    
	/* Initialize variables */
	$fromEmail 	= "investment@vidalia.com.ph";
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
	$mail->From = $customerEmail;
	$mail->FromName = $customerName;
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
	$forapplicantmail->addAddress( "teaminvest@vidalia.com.ph", "Vidalia Lending Investment"); 
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