<?php



	$apiKey = '6d846673b69f4ab979a61aa1f20455a0-us13'; // Your MailChimp API Key
	$listId = 'b95642d449'; // Your MailChimp List ID
	if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
		$listId = $_GET['list'];
	}
	$message_success = 'You have <strong>successfully</strong> subscribe!';
	$email = $_POST['template-contactform-email'];
	$fname = isset( $_POST['template-contactform-firstname'] ) ? $_POST['template-contactform-firstname'] : '';
	$lname = isset( $_POST['template-contactform-lastname'] ) ? $_POST['template-contactform-lastname'] : '';
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

require_once('phpmailer/PHPMailerAutoload.php');

$recaptcha_failed = 'Please click on the reCAPTCHA box';

//if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

    //your site secret key
   // $secret = '6LeWoy4UAAAAALuvFtnWY9Lop8XYew5lS2u-CFju';
    //get verify response data
   // $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
   // $responseData = json_decode($verifyResponse);

    $message_success = 'We have <strong>successfully</strong> received your Placement! We will get back to you as soon as possible.';


    $firstname = $_POST['template-contactform-firstname'];
	$lastname = $_POST['template-contactform-lastname'];
	$name = $firstname ." ". $lastname;
   // $address = $_POST['template-contactform-address'];
    $email = $_POST['template-contactform-email'];
    $contact = $_POST['template-contactform-contact'];
    $amount = $_POST['template-contactform-invest-amount'];
	$currency = $_POST['template-currency'];
    $terms = $_POST['template-placement-terms'];
	$payout_method = $_POST['template-payout-method'];
	if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank"))
	{	$accountname = $_POST['template-contactform-accountname'];
		$accountnumber = $_POST['template-contactform-accountnumber'];
		$bankname = $_POST['template-contactform-bankname'];
		$bankbranchaddress = $_POST['template-contactform-bankbranchaddress'];
		$accounttype = $_POST['template-contactform-accounttype'];
	}
	else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank"))
	{
		$intermediarybankname = $_POST['template-contactform-intermediarybankname'];
		$intermediarybankaddress = $_POST['template-contactform-intermediarybankaddress'];
		$intermediaryswiftcode = $_POST['template-contactform-intermediaryswiftcode'];
		$beneficiarybankname = $_POST['template-contactform-beneficiarybankname'];
		$beneficiarybankaddress = $_POST['template-contactform-beneficiarybankaddress'];
		$beneficiaryswiftcode = $_POST['template-contactform-beneficiaryswiftcode'];
		$bankaccountname = $_POST['template-contactform-bankaccountname'];
		$bankaccountnumber = $_POST['template-contactform-bankaccountnumber'];
		$bankaccounttype = $_POST['template-contactform-bankaccounttype'];
	}
	

    $subject = "Loan Investment Placement from " . $firstname . " " . $lastname;
    $mail = new PhpMailer;
	$mail->CharSet = 'UTF-8';
    $mail->From = 'invest@vidalia.com.ph'; 
    $mail->addReplyTo( $email, $name );
    $mail->FromName = "Vidalia Lending Investment";
    //$mail->addAddress( "invest@vidalia.com.ph" , "Vidalia Lending Investment " );     // Add a recipient
	$mail->addAddress( "invest@vidalia.com.ph" , "Vidalia Lending Investment " );     // Add a recipient
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
	$first_half_message = "
		<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#F8F8F8' style='background-color:#f8f8f8'>
		   <tbody>
			  <tr>
				 <td align='center' style='padding:15px'>
					<table width='600' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='background-color:#ffffff;width:600px'>
					   <tbody>
						  <tr>
							 <td style='border:1px solid #e8e8e8;font-family:Helvetica,Arial,sans-serif;color:#000000'>
								<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='border-collapse:collapse;background-color:#ffffff'>
								   <tbody>
									  <tr>
										 <td style='padding:0px;margin:0px;display:block;font-family:Helvetica,Arial,sans-serif'>
											   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
											   <div style='height:5px;background-color: rgb(249, 172, 24);width: 100%;'> </div>
												  <tbody>
													 <tr>
														<td style='padding:20px 20px 10px 20px'>
														   
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='left'><a href='vidalia.com.ph' target='_blank'><img src='https://vidalia.com.ph/images/mail-template/logo.png' width='150' alt='Vidalia Lending Corp.' border='0';></a></td>
																 </tr>
															  </tbody>
														   </table>
														</td>
													 </tr>
												  </tbody>
											   </table>
											
										 </td>
									  </tr>
									  <tr>
										 <td style='padding:10px 20px 20px 20px'>
											<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='background-color:#ffffff'>
											   <tbody>
												  <tr>
													 <td align='left' style='padding:0px;margin:0px;display:block;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;line-height:24px'>
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='center' style='padding:0px 0px 10px 0px'>
																	   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
																		  <tbody>
																			 <tr>
																				<td>
																				   <span style='color:#333333'></span>
																				   <table cellspacing='0' cellpadding='0' border='0' width='100%'>
																					  <tbody>
																						 <tr>
																							<td align='center'  valign='top' style='padding:0px 9px 9px;'>
																							   <img width='564' style='border:0px currentColor;height:auto;text-decoration:none;vertical-align:bottom;max-width:600px' alt='' src='https://vidalia.com.ph/images/mail-template/submitted.jpg' tabindex='0'>
																							</td>
																						 </tr>
																					  </tbody>
																				   </table>
																				</td>
																			 </tr>
																		  </tbody>
																	   </table>
																	</td>
																 </tr>
															  </tbody>
														   </table>
									  
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='center' style='padding:10px 0px 10px 0px'>
																	   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
																		  <tbody>
																			 <tr>  
																				<td align='left' valign='top' style='padding-bottom:10px;font-family:Helvetica,Arial,sans-serif;font-size:px;line-height:24px'><span style='color:#333333; align:center;'><strong style='font-size:24px;text-align:center;float: none !important;'>Below are the submitted details</strong></span><br></td>
																			 </tr>
																			 <tr>
																				<td>
																				   <span style='color:#333333'></span>
																				   <table cellpadding='0' cellspacing='0'>
																					  <tbody>
																						 <tr>
																							<td width='300' height='30px' style='font-weight: bold;'>Name: </td>
																							<td>". $firstname ." ". $lastname ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Email: </td>
																							<td style='color:rgb(192, 106, 4);text-decoration:underline'>". $email ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Contact #: </td>
																							<td>". $contact ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Amount to Invest: </td>
																							<td>". $currency ." ". $amount ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Terms of Placement: </td>
																							<td>". $terms ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Payment Crediting: </td>
																							<td>". $payout_method ."</td>
																						 </tr>";
	$footer_message = "<table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td style='padding:10px 0px 10px 0px;border-top:1px solid #e8e8e8'>
                                                               <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align='center' width='100%' style='font-size:9px;font-family:Helvetica,Arial,sans-serif;color:#999999;line-height:16px'>Vidalia Lending Corp. is authorised and regulated by Securities and Exchange Commission (SEC) with License No. CS200813771 issued October 2008. Vidalia Lending is incorporated with registered office at Unit 601 Summit One Tower #530 Shaw Boulevard Mandaluyong City, Metro Manila Philippines
                                                                           <br> © 2007 - 2018, <span class='il'>Vidalia Lending Corp.
                                                                           All rights reserved.
                                                                        
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>";
	
	if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank"))
	{
		if($payout_method == "Post Dated Check")
		{
			$second_half_message = "
								<tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Your Bank Details: </td>
									<td>". $_POST['template-location-bank'] ."</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Name: </td>
									<td>". $accountname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
									<td>". $accountnumber. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Name: </td>
									<td>". $bankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Branch Address: </td>
									<td>". $bankbranchaddress. "</td>
								 </tr>
								 <tr>
									<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
									<td>". $accounttype. "</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>
			</td>
		 </tr>
	  </tbody>
   </table>";
		}
		else
		{
			$second_half_message = "
								<tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Name: </td>
									<td>". $accountname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
									<td>". $accountnumber. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Name: </td>
									<td>". $bankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Branch Address: </td>
									<td>". $bankbranchaddress. "</td>
								 </tr>
								 <tr>
									<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
									<td>". $accounttype. "</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>
			</td>
		 </tr>
	  </tbody>
   </table>";
		}
		$mail->Body = $first_half_message."".$second_half_message."".$footer_message;

	}
	else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank"))
	{
		if($payout_method == "Post Dated Check")
		{
			$second_half_message = "
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Your Bank Details: </td>
									<td>". $_POST['template-location-bank'] ."</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Name: </td>
									<td>". $intermediarybankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Address: </td>
									<td>". $intermediarybankaddress. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Swift Code: </td>
									<td>". $intermediaryswiftcode. "</td>
								 </tr>
								  <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Name: </td>
									<td>". $beneficiarybankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Address: </td>
									<td>". $beneficiarybankaddress. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Swift Code: </td>
									<td>". $beneficiaryswiftcode. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Account Name: </td>
									<td>". $bankaccountname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
									<td>". $bankaccountnumber. "</td>
								 </tr>
								 <tr>
									<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
									<td>". $bankaccounttype. "</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>
			</td>
		 </tr>
	  </tbody>
   </table>";
		}
		else
		{
			$second_half_message = "
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Name: </td>
									<td>". $intermediarybankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Address: </td>
									<td>". $intermediarybankaddress. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Swift Code: </td>
									<td>". $intermediaryswiftcode. "</td>
								 </tr>
								  <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Name: </td>
									<td>". $beneficiarybankname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Address: </td>
									<td>". $beneficiarybankaddress. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Swift Code: </td>
									<td>". $beneficiaryswiftcode. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Bank Account Name: </td>
									<td>". $bankaccountname. "</td>
								 </tr>
								 <tr>
									<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
									<td>". $bankaccountnumber. "</td>
								 </tr>
								 <tr>
									<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
									<td>". $bankaccounttype. "</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>
			</td>
		 </tr>
	  </tbody>
   </table>";
		}
		$mail->Body = $first_half_message."".$second_half_message."".$footer_message;
	}
        // applicant/
        $forapplicantsubject ="Loan Investment Placement";
        $forapplicantmail = new PhpMailer;
		$forapplicantmail->CharSet = 'UTF-8';
        $forapplicantmail->From = 'invest@vidalia.com.ph';
        $forapplicantmail->FromName = "Vidalia Lending Investment ";
        $forapplicantmail->addAddress( $email , "Vidalia Investment Applicant" );     // Add a recipient
        $forapplicantmail->isHTML(true); // Set email format to HTML
        $forapplicantmail->Subject = $forapplicantsubject;
		
		$first_half_message = "
		<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#F8F8F8' style='background-color:#f8f8f8;'>
		   <tbody>
			  <tr>
				 <td align='center' style='padding:15px'>
					<table width='600' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='background-color:#ffffff;width:600px'>
					   <tbody>
						  <tr>
							 <td style='border:1px solid #e8e8e8;font-family:Helvetica,Arial,sans-serif;color:#000000'>
								<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='border-collapse:collapse;background-color:#ffffff'>
								   <tbody>
									  <tr>
										 <td style='padding:0px;margin:0px;display:block;font-family:Helvetica,Arial,sans-serif'>
										   <div style='height:5px;background-color: rgb(249, 172, 24);width: 100%;'> </div>
											   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tbody>
													 <tr>
														<td style='padding:20px 20px 10px 20px'>
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='left'><a href='vidalia.com.ph' target='_blank'><img src='https://vidalia.com.ph/images/mail-template/logo.png' width='150' alt='Vidalia Lending Corp.' border='0';></a></td>
																 </tr>
															  </tbody>
														   </table>
														</td>
													 </tr>
												  </tbody>
											   </table>
											<p style='text-align:center'><span style='color:#333333'><strong><span style='font-size:20px'>Your placement has been submitted, THANK YOU!</span></strong></span></p>  
										 </td>
									  </tr>
									  <tr>
										 <td style='padding:10px 20px 20px 20px'>
											<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' style='background-color:#ffffff'>
											   <tbody>
												  <tr>
													 <td align='left' style='padding:0px;margin:0px;display:block;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;line-height:24px'>
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='center' style='padding:10px 0px 10px 0px'>
																	   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
																		  <tbody>
																			 <tr>
																				<td align='left' valign='top' style='padding-bottom:10px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:24px'><span style='color:#333333'><strong>One of our Investment staff will contact you within 24 hours.</strong></span><br></td>
																			 </tr>
																			 <tr>
																				<td>
																				   <span style='color:#333333'></span>
																				   <table cellspacing='0' cellpadding='0' border='0' width='100%'>
																					  <tbody>
																						 <tr>
																							<td valign='top' align='center' style='padding:0px'>
																							   <table cellpadding='0' cellspacing='0' border='0' width='150' align='left'>
																								  <tbody>
																									 <tr>
																										<td align='center' style='padding:10px 0px 10px 0px'>
																										   <table cellpadding='0' cellspacing='0' border='0' width='96%'>
																											  <tbody>
																												 <tr>
																													<td align='center' valign='top'><img src='https://vidalia.com.ph/images/mail-template/call.png' alt='call.png' height='124' width='138'></td>
																												 </tr>
																											  </tbody>
																										   </table>
																										</td>
																									 </tr>
																								  </tbody>
																							   </table>
																							   <table cellpadding='0' cellspacing='0' border='0' width='400' align='right'>
																								  <tbody>
																									 <tr>
																										<td align='center' style='padding:10px 0px 10px 0px'>
																										   <table cellpadding='0' cellspacing='0' border='0' width='96%'>
																											  <tbody>
																												 <tr>
																													<td align='left' valign='top' style='padding-top: 24px;padding-bottom:10px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:24px;'><span style='font-size:14px'>If you have questions please contact us
																													   <br>Our <b>landline numbers</b> (02) 534-2556 | 718-0358
																													   <br><b>Cell numbers</b> 0998 566 2503 (smart) 0917 795 0793 (globe)</span><br> 
																													</td>
																												 </tr>
																											  </tbody>
																										   </table>
																										</td>
																									 </tr>
																								  </tbody>
																							   </table>
																							</td>
																						 </tr>
																					  </tbody>
																				   </table>
																				</td>
																			 </tr>
																		  </tbody>
																	   </table>
																	</td>
																 </tr>
															  </tbody>
														   </table>
									  
														   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
															  <tbody>
																 <tr>
																	<td align='center' style='padding:10px 0px 10px 0px'>
																	   <table width='100%' border='0' cellspacing='0' cellpadding='0'>
																		  <tbody>
																			 <tr>
																				<td align='left' valign='top' style='padding-bottom:10px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:24px'><span style='color:#333333; align:center;'><strong style='/* margin-left: 88px; */text-align:center;float: none !important;'>Below are the details you have submitted on the online form</strong></span><br></td>
																			 </tr>
																			 <tr>
																				<td>
																				   <span style='color:#333333'></span>
																				   <table cellpadding='0' cellspacing='0'>
																					  <tbody>
																						 <tr>
																							<td width='300' height='30px' style='font-weight: bold;'>Name: </td>
																							<td>". $firstname ." ". $lastname ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Email: </td>
																							<td style='color:rgb(192, 106, 4);text-decoration:underline'>". $email ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Contact #: </td>
																							<td>". $contact ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Amount to Invest: </td>
																							<td>". $currency ." ". $amount ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Terms of Placement: </td>
																							<td>". $terms ."</td>
																						 </tr>
																						 <tr>
																							<td width='300' height='30px'  style='font-weight: bold;'>Payment Crediting: </td>
																							<td>". $payout_method ."</td>
																						 </tr>";
																						 
		$footer_message = "<p style='margin:0px 0px 25px;color:rgb(102,102,102);line-height:1.15;font-size:14px'><em>&nbsp;Visit this page <a href='#' style='color:rgb(192, 106, 4);text-decoration:underline'>Deposit-Help</a> for more details on how to fund your account.&nbsp;</em></p>
                                                
                                                <table width='100%' height='100%' style='font-family:Helvetica,Verdana,sans-serif;border-spacing:0' bgcolor='#f5f5f5' border='0' cellspacing='0' cellpadding='10'>
                                                   <tbody>
                                                      <tr>
                                                         <td style='color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;border-collapse:collapse'>
                                                            <div class='m_-6131339021085106198m_5583956883234724384vero-editable'>
                                                               <table width='100%' style='font-family:Helvetica,Verdana,sans-serif;border-spacing:0' bgcolor='#f5f5f5' border='0' cellspacing='0' cellpadding='10'>
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style='color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;border-collapse:collapse'>
                                                                           <table style='padding:0px;text-align:left;font-family:Helvetica,Verdana,sans-serif;vertical-align:top;border-collapse:collapse;border-spacing:0'>
                                                                              <tbody>
                                                                                 <tr align='left' style='padding:0px;width:100%;text-align:left;vertical-align:top'>
                                                                                    <td style='color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;border-collapse:collapse'>&nbsp; &nbsp; &nbsp;</td>
                                                                                    <td align='left' valign='top' style='padding:7px 9px 7px 3px;width:25px;text-align:left;color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;vertical-align:top;display:table-cell;border-collapse:collapse!important'><a style='color:rgb(55,185,229);text-decoration:underline' href='https://www.facebook.com/VidaliaLending/'><img height='50' align='left' style='clear:both;text-decoration:none;margin-right:7px;float:left;display:block' src='https://vidalia.com.ph/images/mail-template/share.png'></a></td>
                                                                                    <td align='left' valign='top' style='padding:4px 0px 0px;width:300px;text-align:left;color:rgb(120,120,120);line-height:16px;font-family:Helvetica,Verdana,sans-serif;font-size:14px;vertical-align:top;border-right-color:rgb(181,181,181);border-right-width:1px;border-right-style:solid;display:table-cell;border-collapse:collapse!important'>
                                                                                       <span style='padding-bottom:5px;display:inline-block'><a style='color:rgb(122,122,122);text-decoration:none' href='' target='_blank'>Share </a>with friends</span><br><span style='color:rgb(178,178,178);font-size:11px;display:inline-block'>Get 50 PHP for every friend</span><br><span style='color:rgb(178,178,178);font-size:11px;display:inline-block'>you invite. <a title='Link: https://coins.ph/invite' style='color:rgb(249, 172, 24);text-decoration:underline' href='#' target='_blank'>Refer friends</a></span>
                                                                                    </td>
                                                                                    <td style='color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;border-collapse:collapse'>&nbsp; &nbsp; &nbsp;</td>
                                                                                    <td align='left' valign='top' style='padding:7px 9px 7px 3px;width:25px;text-align:left;color:rgb(102,102,102);font-family:Helvetica,Verdana,sans-serif;vertical-align:top;display:table-cell;border-collapse:collapse!important'><a style='color:rgb(192, 106, 4));text-decoration:underline' href='https://vidalia.com.ph/'><img height='50' align='left' style='clear:both;text-decoration:none;margin-right:7px;float:left;display:block' src='https://vidalia.com.ph/images/mail-template/web.png'></a></td>
                                                                                    <td align='left' valign='top' style='padding:4px 0px 0px;width:300px;text-align:left;color:rgb(120,120,120);line-height:16px;font-family:Helvetica,Verdana,sans-serif;font-size:14px;vertical-align:top;display:table-cell;border-collapse:collapse!important'>
                                                                                       <span style='padding-bottom:5px;display:inline-block'><a title='View Website'>View Website</a></span><br><span style='color:rgb(178,178,178);font-size:11px;text-decoration:none;display:inline-block'>Always have your Coins.ph wallet</span><br><span style='color:rgb(178,178,178);font-size:11px;display:inline-block;'>with you. <a title='View Website' href='vidalia.com.ph' style='color:rgb(249, 172, 24);text-decoration:underline' href='#' target='_blank'>Click here</a></span>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>

                                                
                                                   <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td style='padding:10px 0px 10px 0px;border-top:1px solid #e8e8e8'>
                                                               <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align='center' width='100%' style='font-size:9px;font-family:Helvetica,Arial,sans-serif;color:#999999;line-height:16px'>Vidalia Lending Corp. is authorised and regulated by Securities and Exchange Commission (SEC) with License No. CS200813771 issued October 2008. Vidalia Lending is incorporated with registered office at Unit 601 Summit One Tower #530 Shaw Boulevard Mandaluyong City, Metro Manila Philippines
                                                                           <br> © 2007 - 2018, <span class='il'>Vidalia Lending Corp.
                                                                           All rights reserved.
                                                                        
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>"; 
				
		if(($payout_method == "Local Bank Deposit") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "Local Bank"))
		{	
			if($payout_method == "Post Dated Check")
			{
				$second_half_message  = "<tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Your Bank Details: </td>
											<td>". $_POST['template-location-bank'] ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Name: </td>
											<td>". $accountname ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
											<td>". $accountnumber ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Bank Name: </td>
											<td>". $bankname ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Bank Branch Address: </td>
											<td>". $bankbranchaddress ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Type: </td>
											<td>". $accounttype ."</td>
										 </tr>
									  </tbody>
								   </table>
								</td>
							 </tr>
						  </tbody>
					   </table>
					</td>
				 </tr>
			  </tbody>
		   </table>";
			}
			else
			{
				$second_half_message  = "<tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Name: </td>
											<td>". $accountname ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Number: </td>
											<td>". $accountnumber ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Bank Name: </td>
											<td>". $bankname ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Bank Branch Address: </td>
											<td>". $bankbranchaddress ."</td>
										 </tr>
										 <tr>
											<td width='300' height='30px'  style='font-weight: bold;'>Account Type: </td>
											<td>". $accounttype ."</td>
										 </tr>
									  </tbody>
								   </table>
								</td>
							 </tr>
						  </tbody>
					   </table>
					</td>
				 </tr>
			  </tbody>
		   </table>";
			}
			
			$forapplicantmail->Body = $first_half_message."".$second_half_message."".$footer_message;
		}
		else if(($payout_method == "International Bank Wire") || ($payout_method == "Post Dated Check" && $_POST['template-location-bank'] == "International Bank"))
		{
			if($payout_method == "Post Dated Check")
			{
					$second_half_message    = "<tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Your Bank Details: </td>
												<td>". $_POST['template-location-bank'] ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Name: </td>
												<td>". $intermediarybankname ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Address: </td>
												<td>". $intermediarybankaddress ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Swift Code: </td>
												<td>". $intermediaryswiftcode ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Name: </td>
												<td>". $beneficiarybankname ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Beneficiary Bank Address: </td>
												<td>". $beneficiarybankaddress ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Beneficiary Swift Code: </td>
												<td>". $beneficiaryswiftcode ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Bank Account Name: </td>
												<td>". $bankaccountname ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Account Number: </td>
												<td>". $bankaccountnumber ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
												<td>". $bankaccounttype ."</td>
											 </tr>
										  </tbody>
									   </table>
									</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>";
			}
			else
			{
				$second_half_message    = "<tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Name: </td>
												<td>". $intermediarybankname ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Bank Address: </td>
												<td>". $intermediarybankaddress ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Intermediary Swift Code: </td>
												<td>". $intermediaryswiftcode ."</td>
											 </tr>
											 <tr>
												<td width='300' height='30px'  style='font-weight: bold;'>Beneficiary Bank Name: </td>
												<td>". $beneficiarybankname ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Beneficiary Bank Address: </td>
												<td>". $beneficiarybankaddress ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Beneficiary Swift Code: </td>
												<td>". $beneficiaryswiftcode ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Bank Account Name: </td>
												<td>". $bankaccountname ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Account Number: </td>
												<td>". $bankaccountnumber ."</td>
											 </tr>
											 <tr>
												<td width='190' height='30px'  style='font-weight: bold;'>Account Type: </td>
												<td>". $bankaccounttype ."</td>
											 </tr>
										  </tbody>
									   </table>
									</td>
								 </tr>
							  </tbody>
						   </table>
						</td>
					 </tr>
				  </tbody>
			   </table>";
			}
			
			$forapplicantmail->Body = $first_half_message."".$second_half_message."".$footer_message;
			
		}
	if($firstname == '' || $lastname == '' || $email == '' || $contact == '' || $currency == '' || $amount == '' || $terms == '' || $payout_method == '')
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
        echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
    }
//}
// else{
//    echo '{ "alert": "error", "message": "' . $recaptcha_failed . '" }';
//}
?>