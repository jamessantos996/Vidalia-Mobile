<?php

	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = 'f9f0fab811'; // Your MailChimp List ID
	if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
		$listId = $_GET['list'];
	}

	$email = $_POST['inputemail'];
	$fname = isset( $_POST['inputfname'] ) ? $_POST['inputfname'] : '';
	$lname = isset( $_POST['inputlname'] ) ? $_POST['inputlname'] : '';
	
	$datacenter = explode( '-', $apiKey );
	$submit_url = "https://" . $datacenter[1] . ".api.mailchimp.com/3.0/lists/" . $listId . "/members/" ;

	if( isset( $email ) AND $email != '' ) {

		$merge_vars = array();
		if( $fname != '' ) { $merge_vars['FNAME'] = $fname; }
		if( $lname != '' ) { $merge_vars['LNAME'] = $lname; }
		
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
	
// SUBSCRIBE TO MAILING LIST OPTION - ADD TO MAILCHIMP USING API
if ( $_POST['newsletter'] == 'Yes' )
{
	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = 'c85596f0cd'; // Your MailChimp List ID
	if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
		$listId = $_GET['list'];
	}

	$email = $_POST['inputemail'];
	$fname = isset( $_POST['inputfname'] ) ? $_POST['inputfname'] : '';
	$lname = isset( $_POST['inputlname'] ) ? $_POST['inputlname'] : '';
	$cpnumber = isset( $_POST['inputpnumber'] ) ? $_POST['inputpnumber'] : '';
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
}


require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box'; //recaptcha error message

//if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    /*
    //your site secret key
    $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    */

    $message_success = '<strong>Successfully</strong> sent your Investment Application! Our team will contact you within 24 hours.';

    $fname = $_POST['inputfname'];
    $lname = $_POST['inputlname'];
    $name = $fname . " " . $lname;
    $gender = $_POST['inputgender'];
    $age = $_POST['inputage'];
    $status = $_POST['inputstatus'];
    $nationality = $_POST['inputnationality'];
    $email = $_POST['inputemail'];
    $number = $_POST['inputpnumber'];
    $landline = $_POST['inputlandline'];
    $address = $_POST['inputhouseaddress'];
    $city = $_POST['inputcity'];
    $zipcode = $_POST['inputzipcode'];
	$country = $_POST['inputcountry'];
    $mailing = $_POST['inputmailing'];
	$mailingzipcode = $_POST['inputmailingzipcode'];
    $sssgsisdriver = $_POST['inputsssgsisdriver'];
    $sssgsisdrivernumber = $_POST['inputsssgsisdrivernumber'];
    $occupation = $_POST['inputoccupation'];
    $how = $_POST['inputhow'];
    $referredby = $_POST['inputreferredby'];
    $message = $_POST['inputmessage'];
    $agree = $_POST['agree'];

    if( $city == "Others" ) {
        echo '{ "alert": "error", "message": "We only accept loan applications within Metro Manila and Batanes Group of Island." }';
    }else{

    $subject = "Vidalia Investment Application from " . $name;
    $mail = new PhpMailer;
	$mail->CharSet = 'UTF-8';
    $mail->From = 'invest@vidalia.com.ph';
    $mail->addReplyTo( $email, $name );
    $mail->FromName = "Vidalia Lending Investment";
	// $mail->addAddress( "stephanie@vidalia.com.ph" , "Vidalia Lending Investment" );     // Add a recipient
	$mail->addAddress( "mario@vidalia.com.ph" , "Vidalia Lending Investment" );     // Add a recipient
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
	$mail->AddAttachment($_FILES['inputimageattachment']['tmp_name'],$_FILES['inputimageattachment']['name']);
    $mail->Body = "
        <div> 
            <b>". $name ."</b>
            <p style='padding:10px 0;'><b>Personal Details:</b></p>
        </div>
        <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
            <tr>
                <td width='190' height='30px'>First Name: </td>
                <td>". $fname ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Last Name: </td>
                <td>". $lname ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Gender: </td>
                <td>". $gender ."</td>
            </tr
            <tr>
                <td width='190' height='30px'>Date of Birth: </td>
                <td>". $age ."</td>
            </tr
            <tr>
                <td width='190' height='30px'>Civil Status: </td>
                <td>". $status ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Nationality: </td>
                <td>". $nationality ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Email: </td>
                <td>". $email. "</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Cellphone #: </td>
                <td>". $number ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Telephone #: </td>
                <td>". $landline ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>House Address: </td>
                <td>". $address ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Zip Code: </td>
                <td>". $zipcode ."</td>
            </tr>
			<tr>
                <td width='190' height='30px'>Country: </td>
                <td>". $country ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Mailing Address: </td>
                <td>". $mailing ."</td>
            </tr>
			<tr>
                <td width='190' height='30px'>Mailing Zip Code: </td>
                <td>". $mailingzipcode ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>". $sssgsisdriver ." </td>
                <td>". $sssgsisdrivernumber ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Occupation: </td>
                <td>". $occupation ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>How did you hear about us? </td>
                <td>". $how ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Referred By: </td>
                <td>". $referredby ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Message: </td>
                <td>". $message ."</td>
            </tr>
        </table>
        ";
		

        // applicant
        $forapplicantsubject = "Loan Investment Application";
        $forapplicantmail = new PhpMailer;
		$forapplicantmail->CharSet = 'UTF-8';
        $forapplicantmail->From = 'invest@vidalia.com.ph';
		$forapplicantmail->addReplyTo( "stephanie@vidalia.com.ph", "Vidalia Lending Investment" );
		$forapplicantmail->addReplyTo( "mario@vidalia.com.ph", "Vidalia Lending Investment" );
        $forapplicantmail->FromName = "Vidalia Lending Investment.";
        $forapplicantmail->addAddress( $email , "Vidalia Lending Corporation" );     // Add a recipient
        $forapplicantmail->isHTML(true); // Set email format to HTML
        $forapplicantmail->Subject = $forapplicantsubject;
		$forapplicantmail->AddAttachment($_FILES['inputimageattachment']['tmp_name'],$_FILES['inputimageattachment']['name']);
        $forapplicantmail->Body    = "
        <div> 
            <b>". $name ."</b>
            <div><p>Your Investment application has been submitted, THANK YOU!</p>
                    <p>One of our staff will contact you within 24 hours.</p><br>
                    <p>If you have further questions please contact us below:</p>
                    <p>Landline numbers (02) 534-2556 | 534-5482 | 718-0358 |</p>
                    <p>Send SMS or call us on this cell numbers 09985662503 (Smart) and 09177950793 (Globe)</p>
                </div>
            <p style='padding:10px 0;'><b>Below are the details you have submitted on the online form</b></p>
        </div>
        <table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
            <tr>
                <td width='190' height='30px'>First Name: </td>
                <td>". $fname ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Last Name: </td>
                <td>". $lname ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Gender: </td>
                <td>". $gender ."</td>
            </tr
            <tr>
                <td width='190' height='30px'>Date of Birth: </td>
                <td>". $age ."</td>
            </tr
            <tr>
                <td width='190' height='30px'>Civil Status: </td>
                <td>". $status ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Nationality: </td>
                <td>". $nationality ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Email: </td>
                <td>". $email. "</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Cellphone #: </td>
                <td>". $number ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Telephone #: </td>
                <td>". $landline ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>House Address: </td>
                <td>". $address ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Zip Code: </td>
                <td>". $zipcode ."</td>
            </tr>
			<tr>
                <td width='190' height='30px'>Country: </td>
                <td>". $country ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Mailing Address: </td>
                <td>". $mailing ."</td>
            </tr>
			<tr>
                <td width='190' height='30px'>Mailing Zip Code: </td>
                <td>". $mailingzipcode ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>". $sssgsisdriver ." </td>
                <td>". $sssgsisdrivernumber ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Occupation: </td>
                <td>". $occupation ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>How did you hear about us? </td>
                <td>". $how ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Referred By: </td>
                <td>". $referredby ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Message: </td>
                <td>". $message ."</td>
            </tr>
        </table>
        ";
		
		

			
        if($fname == '' || $lname == '' || $gender == '' || $age == '' || $status == '' || $nationality == '' || $number == '' || $landline == '' || $address == '' || $zipcode == '' || $country == '' || $mailing == '' || $mailingzipcode == '' || $sssgsisdriver == '' || $sssgsisdrivernumber == '' || $occupation == '' || $how == '' || $message == '')
		{
			 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
		}
		else
		{
			$sendEmail = $mail->Send();
			$sendEmail2 = $forapplicantmail->Send();
		}
		
        if($sendEmail == true && $sendEmail2 == true ){
			echo '{ "alert": "success", "message": "' . $message_success . '" }';
		} else
		{
            echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
        }
    }
// } else {
//    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
// }
?>