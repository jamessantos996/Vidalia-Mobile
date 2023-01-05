<?php
// SUBSCRIBE TO MAILING LIST OPTION - ADD TO MAILCHIMP USING API

	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = '26d05793cc'; // Your MailChimp List ID
	if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
		$listId = $_GET['list'];
	}
	$message_success = 'You have <strong>successfully</strong> subscribe!';
	$email = $_POST['email'];
	$fname = isset( $_POST['fname'] ) ? $_POST['fname'] : '';
	$lname = isset( $_POST['lname'] ) ? $_POST['lname'] : '';
	$cpnumber = isset( $_POST['cpnumber'] ) ? $_POST['cpnumber'] : '';
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
	
$recaptcha_failed = 'Please click on the reCAPTCHA box'; //recaptcha error message

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    
    //your site secret key
    $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    
	
	if($email == '' && $fname == '' && $lname == '' && $cpnumber == '')
	{
		echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>"}';
	}
	else
	{
		echo '{ "alert": "success", "message": "' . $message_success . '" }';
		
	}
	
} else {
   echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}
	
?>