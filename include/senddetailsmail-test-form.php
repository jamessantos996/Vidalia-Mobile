<?php

if(!empty($_POST['template-contactform-hidden'])) { die(); }

if(!empty($_POST['user_name'])) { die(); }

if(!empty($_POST['user_contact'])) { die(); }

require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed='Please click on the reCAPTCHA box';

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	//your site secret key
	$secret = '6LcJuCkTAAAAAGSvfyYykjLRJwAtMpWmRRFfkmbD';
	//get verify response data
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);

    $message_success = 'We have <strong>successfully</strong> received your Investment! We will get back to you as soon as possible.';

    $firstname = filter_var($_POST['template-contactform-firstname'], FILTER_SANITIZE_STRING);
	$lastname = filter_var($_POST['template-contactform-lastname'], FILTER_SANITIZE_STRING);
	$name = $firstname ." ". $lastname;
   	// $address = $_POST['template-contactform-address'];
    $email = filter_var($_POST['template-contactform-email'], FILTER_SANITIZE_EMAIL);
    $contact = $_POST['template-contactform-contact'];
    $amount = $_POST['template-contactform-invest-amount'];
	$currency = $_POST['template-currency'];
    $terms = $_POST['template-placement-terms'];
	$payout_method = $_POST['template-payout-method'];
	$agree = $_POST['agree'];

	if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank")) {

			$accountname = filter_var($_POST['template-contactform-accountname'], FILTER_SANITIZE_STRING);
			$accountnumber = $_POST['template-contactform-accountnumber'];
			$bank = $_POST['template-contactform-bankname'];

			if ($bank == "Others"){
				$bankname = filter_var($_POST['template-contactform-whatbankname'], FILTER_SANITIZE_STRING);
			} else {
				$bankname = filter_var($_POST['template-contactform-bankname'], FILTER_SANITIZE_STRING);
			}

			$bankbranchaddress = filter_var($_POST['template-contactform-bankbranchaddress'], FILTER_SANITIZE_STRING);
			$accounttype = filter_var($_POST['template-contactform-accounttype'], FILTER_SANITIZE_STRING);
	}
	else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank")) {

			$intermediarybankname = filter_var($_POST['template-contactform-intermediarybankname'], FILTER_SANITIZE_STRING);
			$intermediarybankaddress = filter_var($_POST['template-contactform-intermediarybankaddress'], FILTER_SANITIZE_STRING);
			$intermediaryswiftcode = filter_var($_POST['template-contactform-intermediaryswiftcode'], FILTER_SANITIZE_STRING);
			$beneficiarybankname = filter_var($_POST['template-contactform-beneficiarybankname'], FILTER_SANITIZE_STRING);
			$beneficiarybankaddress = filter_var($_POST['template-contactform-beneficiarybankaddress'], FILTER_SANITIZE_STRING);
			$beneficiaryswiftcode = filter_var($_POST['template-contactform-beneficiaryswiftcode'], FILTER_SANITIZE_STRING);
			$bankaccountname = filter_var($_POST['template-contactform-bankaccountname'], FILTER_SANITIZE_STRING);
			$bankaccountnumber = $_POST['template-contactform-bankaccountnumber'];
			$bankaccounttype = $_POST['template-contactform-bankaccounttype'];
	}
	

	if( $agree != "agree" ) {
		echo '{ "alert": "error", "message": "Please indicate information stated is valid." }';
	} else {
	    $subject = "Loan Investment Placement from " . $firstname . " " . $lastname;
	    $mail = new PhpMailer;
		$mail->CharSet = 'UTF-8';
	    $mail->From = 'siteadmin@vidalia.com.ph';
	    $mail->addReplyTo( $email, $name );
	    $mail->FromName = "Vidalia Lending";
	    $mail->addAddress( "siteadmin@vidalia.com.ph" , "Vidalia Lending " ); // Add a recipient
	    $mail->isHTML(true); // Set email format to HTML
	    $mail->Subject = $subject;
		$first_half_message = "
			<p>Here are the details you sent on the secure online form<br/>
	            --------------------------------------------------------------------------------
	        </p>
			<table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
				<tr>
					<td width='190' height='30px'>Name: </td>
					<td>". $firstname ." ". $lastname ."</td>
				</tr>
				<tr>
					<td width='190' height='30px'>Email: </td>
					<td>". $email. "</td>
				</tr>
				<tr>
					<td width='190' height='30px'>Contact Number: </td>
					<td>". $contact ."</td>
				</tr>
				<tr>
					<td width='190' height='30px'>Amount to Invest: </td>
					<td>".$currency." ". $amount ."</td>
				</tr>
				<tr>
					<td width='190' height='30px'>Terms of Placement: </td>
					<td>". $terms ."</td>
				</tr>
				<tr>
					<td width='190' height='30px'>Settlement: </td>
					<td>". $payout_method ."</td>
				</tr>";
		
		if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank")) {

			if($payout_method == "Post Dated Check") {
				$second_half_message = "
					<tr>
						<td width='190' height='30px'>Bank Details: </td>
						<td>". $_POST['template-location-bank'] ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Account Name: </td>
						<td>". $accountname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Account Number: </td>
						<td>". $accountnumber ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Name: </td>
						<td>". $bankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Address: </td>
						<td>". $bankbranchaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Type: </td>
						<td>". $accounttype ."</td>
					</tr>
				</table>
				<p>--------------------------------------------------------------------------------<br/>
	            	Your placement will be deleted in our system if No funds are sent after 30 days.
	        	</p>
				";
			} else {
				$second_half_message = "
					<tr>
						<td width='190' height='30px'>Account Name: </td>
						<td>". $accountname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Account Number: </td>
						<td>". $accountnumber ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Name: </td>
						<td>". $bankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Address: </td>
						<td>". $bankbranchaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Type: </td>
						<td>". $accounttype ."</td>
					</tr>
				</table>
				<p>--------------------------------------------------------------------------------<br/>
	            	Your placement will be deleted in our system if No funds are sent after 30 days.
	        	</p>
				";
			}
			$mail->Body = $first_half_message."".$second_half_message;
		}

		else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank")) {

			if($payout_method == "Post Dated Check") {
				$second_half_message = "
					<tr>
						<td width='190' height='30px'>Location of Bank: </td>
						<td>". $_POST['template-location-bank'] ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Intermediary Bank Name: </td>
						<td>". $intermediarybankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Intermediary Bank Address: </td>
						<td>". $intermediarybankaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Intermediary Swift Code: </td>
						<td>". $intermediaryswiftcode ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Bank Name: </td>
						<td>". $beneficiarybankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Bank Address: </td>
						<td>". $beneficiarybankaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Swift Code: </td>
						<td>". $beneficiaryswiftcode ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Name: </td>
						<td>". $bankaccountname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Account Number: </td>
						<td>". $bankaccountnumber ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Type: </td>
						<td>". $bankaccounttype ."</td>
					</tr>
				</table>
				<p>--------------------------------------------------------------------------------<br/>
	            	Your placement will be deleted in our system if No funds are sent after 30 days.
	        	</p>
				";
			} else {
				$second_half_message = "
					<tr>
						<td width='190' height='30px'>Intermediary Bank Name: </td>
						<td>". $intermediarybankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Intermediary Bank Address: </td>
						<td>". $intermediarybankaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Intermediary Swift Code: </td>
						<td>". $intermediaryswiftcode ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Bank Name: </td>
						<td>". $beneficiarybankname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Bank Address: </td>
						<td>". $beneficiarybankaddress ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Beneficiary Swift Code: </td>
						<td>". $beneficiaryswiftcode ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Name: </td>
						<td>". $bankaccountname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Account Number: </td>
						<td>". $bankaccountnumber ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Bank Account Type: </td>
						<td>". $bankaccounttype ."</td>
					</tr>
				</table>
				<p>--------------------------------------------------------------------------------<br/>
	            	Your placement will be deleted in our system if No funds are sent after 30 days.
	        	</p>
				";
			}
			$mail->Body = $first_half_message."".$second_half_message;
		}
	        // applicant/
	        $forapplicantsubject ="Loan Investment Placement";
	        $forapplicantmail = new PhpMailer;
			$forapplicantmail->CharSet = 'UTF-8';
	        $forapplicantmail->From = 'investment@vidalia.com.ph';
	        $forapplicantmail->FromName = "Vidalia Lending";
	        $forapplicantmail->addAddress( $email , "Vidalia Investment Applicant" );     // Add a recipient
	        $forapplicantmail->isHTML(true); // Set email format to HTML
	        $forapplicantmail->Subject = $forapplicantsubject;
			
			$first_half_message = "
	            <div> 
	            <div><p>Your placement has been submitted, Thank you!</p>
	                    <p>If you have questions please contact us:</p>
	                    <p> (02) 534-2556 | 718-0358 </p>
	                    <p> 0998 566 2503 (Smart) </p>
	                    <p> 0917 795 0793 (Globe) </p>
	            </div>
	            <p>Here are the details you sent on the secure online form<br/>
	            	--------------------------------------------------------------------------------
	            </p>
				<table border='0' cellpadding='0' cellspacing='0' class='deviceWidth'>
					<tr>
						<td width='190' height='30px'>Name: </td>
						<td>". $firstname ." ". $lastname ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Email: </td>
						<td>". $email. "</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Contact Number: </td>
						<td>". $contact ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Amount to Invest: </td>
						<td>".$currency." ". $amount ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Terms of Placement: </td>
						<td>". $terms ."</td>
					</tr>
					<tr>
						<td width='190' height='30px'>Settlement: </td>
						<td>". $payout_method ."</td>
					</tr>
					";
					
			if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank")) {	
				if($payout_method == "Post Dated Check") {
					$second_half_message  = "
						<tr>
							<td width='190' height='30px'>Location of Bank: </td>
							<td>". $_POST['template-location-bank'] ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Account Name: </td>
							<td>". $accountname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Account Number: </td>
							<td>". $accountnumber ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Name: </td>
							<td>". $bankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Address: </td>
							<td>". $bankbranchaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Type: </td>
							<td>". $accounttype ."</td>
						</tr>
					</table>
					<p>--------------------------------------------------------------------------------<br/>
	            		Your placement will be deleted in our system if No funds are sent after 30 days.
	        		</p>
					";
				} else {
					$second_half_message  = "
						<tr>
							<td width='190' height='30px'>Account Name: </td>
							<td>". $accountname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Account Number: </td>
							<td>". $accountnumber ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Name: </td>
							<td>". $bankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Address: </td>
							<td>". $bankbranchaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Type: </td>
							<td>". $accounttype ."</td>
						</tr>
					</table>
					<p>--------------------------------------------------------------------------------<br/>
	            		Your placement will be deleted in our system if No funds are sent after 30 days.
	        		</p>
					";
				}
				$forapplicantmail->Body = $first_half_message."".$second_half_message;
			}
			else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank"))
			{
				if($payout_method == "Post Dated Check") {
						$second_half_message    = "
						<tr>
							<td width='190' height='30px'>Location of Bank: </td>
							<td>". $_POST['template-location-bank'] ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Intermediary Bank Name: </td>
							<td>". $intermediarybankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Intermediary Bank Address: </td>
							<td>". $intermediarybankaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Intermediary Swift Code: </td>
							<td>". $intermediaryswiftcode ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Bank Name: </td>
							<td>". $beneficiarybankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Bank Address: </td>
							<td>". $beneficiarybankaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Swift Code: </td>
							<td>". $beneficiaryswiftcode ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Name: </td>
							<td>". $bankaccountname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Account Number: </td>
							<td>". $bankaccountnumber ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Type: </td>
							<td>". $bankaccounttype ."</td>
						</tr>
					</table>
					<p>--------------------------------------------------------------------------------<br/>
	            		Your placement will be deleted in our system if No funds are sent after 30 days.
	        		</p>
					";
				} else {
					$second_half_message    = "
						<tr>
							<td width='190' height='30px'>Intermediary Bank Name: </td>
							<td>". $intermediarybankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Intermediary Bank Address: </td>
							<td>". $intermediarybankaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Intermediary Swift Code: </td>
							<td>". $intermediaryswiftcode ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Bank Name: </td>
							<td>". $beneficiarybankname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Bank Address: </td>
							<td>". $beneficiarybankaddress ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Beneficiary Swift Code: </td>
							<td>". $beneficiaryswiftcode ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Name: </td>
							<td>". $bankaccountname ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Account Number: </td>
							<td>". $bankaccountnumber ."</td>
						</tr>
						<tr>
							<td width='190' height='30px'>Bank Account Type: </td>
							<td>". $bankaccounttype ."</td>
						</tr>
					</table>
					<p>--------------------------------------------------------------------------------<br/>
	            		Your placement will be deleted in our system if No funds are sent after 30 days.
	        		</p>
					";
				}
				
				$forapplicantmail->Body = $first_half_message."".$second_half_message;
			}
			if($firstname == '' || $lastname == '' || $email == '' || $contact == '' || $currency == '' || $amount == '' || $terms == '' || $payout_method == '') {
				 echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>" }';
			} else {
				$sendEmail = $mail->Send();
				$sendEmail2 = $forapplicantmail->Send();
			}

		    if( $sendEmail == true ) {
		        echo '{ "alert": "success", "message": "' . $message_success . '" }';
		    } else {
		        echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
		    }
	}
	
		} else {
	    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
		}

?>