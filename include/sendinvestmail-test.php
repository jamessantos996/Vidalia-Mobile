<?php

// SUBSCRIBE TO MAILING LIST OPTION - ADD TO MAILCHIMP USING API
if ( $_POST['newsletter'] == 'Yes' )
{
	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = 'be6d48c76a'; // Your MailChimp List ID
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

if(!empty($_POST['template-contactform-hidden'])) die();

require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box'; //recaptcha error message

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    
    //your site secret key
    $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    

    $message_success = 'We have received your application and will contact you soon. Thanks for choosing Vidalia Lending!';

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
    $message = $_POST['inputmessage'];
    $agree = $_POST['agree'];
	$imageattachment = $_FILES['inputimageattachment']['name'];


    $subject = "Investment Application from " . $name;
    $mail = new PhpMailer;
	$mail->CharSet = 'UTF-8';
    $mail->From = 'invest@vidalia.com.ph';
    $mail->addReplyTo( $email, $name );
    $mail->FromName = "Vidalia Lending";
    $mail->addAddress( "lunaacosta399@gmail.com" , "Vidalia Investment" );
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
	$mail->AddAttachment($_FILES['inputimageattachment']['tmp_name'],$_FILES['inputimageattachment']['name']);
    $mail->Body = "
        <div> 
            <p>Here are the details you sent on the secure online form<br/>
                ------------------------------------------------------------
            </p>
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
                <td width='190' height='30px'>Cellphone No.: </td>
                <td>". $number ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Telephone No.: </td>
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
                <td width='190' height='30px'>Message: </td>
                <td>". $message ."</td>
            </tr>
        </table>
        <p>------------------------------------------------------------<br/>
            Expect an email reply or sms within 24 hours. Please contact us if you have Not received any response.
        </p>
        ";
		
		if($fname == '' || $lname == '' || $gender == '' || $age == '' || $status == '' || $nationality == '' || $number == '' || $landline == '' || $address == '' || $zipcode == '' || $country == '' || $mailing == '' || $mailingzipcode == '' || $sssgsisdriver == '' || $sssgsisdrivernumber == '' || $occupation == '' || $how == '')
		{
			 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
		}
		else if($imageattachment == ''){
			echo '{ "alert": "error", "message": " Please upload your ID " }';
		}
		else
		{
			$sendEmail = $mail->Send();
		}
		
		

        // investor
        $forapplicantsubject = "Vidalia Investment Application";
        $forapplicantmail = new PhpMailer;
		$forapplicantmail->CharSet = 'UTF-8';
        $forapplicantmail->From = 'investment@vidalia.com.ph';
        $forapplicantmail->addReplyTo( "teaminvest@vidalia.com.ph", "Vidalia Investment" );
        $forapplicantmail->FromName = "Vidalia Lending";
        $forapplicantmail->addAddress( $email , "Investment Applicant" );     // Add a recipient
        $forapplicantmail->isHTML(true); // Set email format to HTML
        $forapplicantmail->Subject = $forapplicantsubject;
		$forapplicantmail->AddAttachment($_FILES['inputimageattachment']['tmp_name'],$_FILES['inputimageattachment']['name']);
        $forapplicantmail->Body    = "
        <div> 
            <div>
                <p>Your application has been submitted, Thank you!</p>
                <p>If you have questions please contact us:</p>
                <p> +63 2 534 2556 | 718 0358 </p>
                <p> +63 998 566 2503 (Smart) </p>
                <p> +63 917 795 0793 (Globe) </p>
            </div>
            <p>Here are the details you sent on the secure online form<br/>
                ----------------------------------------------------------------------
            </p>
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
                <td width='190' height='30px'>Cellphone No.: </td>
                <td>". $number ."</td>
            </tr>
            <tr>
                <td width='190' height='30px'>Telephone No.: </td>
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
                <td width='190' height='30px'>Message: </td>
                <td>". $message ."</td>
            </tr>
        </table>
        <p>----------------------------------------------------------------------<br/>
            Expect an email reply or sms within 24 hours. Please contact us if you have Not received any response.
        </p>
        ";
		
		

			
        if($fname == '' || $lname == '' || $gender == '' || $age == '' || $status == '' || $nationality == '' || $number == '' || $landline == '' || $address == '' || $zipcode == '' || $country == '' || $mailing == '' || $mailingzipcode == '' || $sssgsisdriver == '' || $sssgsisdrivernumber == '' || $occupation == '' || $how == '')
		{
			 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
		}
		else if($imageattachment == ''){
			echo '{ "alert": "error", "message": " Please upload your ID " }';
		}
		else
		{
			$sendEmail2 = $forapplicantmail->Send();
		}
		
        if($sendEmail == true && $sendEmail2 == true ){
			echo '{ "alert": "success", "message": "' . $message_success . '" }';
		} else
		{
            echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
        }
    
} else {
   echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
}
?>