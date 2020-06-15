<?php
 include("abc.php");
//$con=mysqli_connect("localhost","root","","bloodbank_master");
$response = array();

    $username = $_GET['username'];
    //$password = $_GET['password'];
   
	$result=mysqli_query($con,"SELECT `Email`,`Password` FROM `quality_master2` WHERE `Email`='$username'");
      $row = mysqli_fetch_array($result);
    
	$data = $row[0];
	 
    if($data)
    {
		
      //$response["success"] = 1;
      $response["email"] = $row['Email'];
	  $response["pwd"]=$row['Password'];
	  
		require "PHPMailerAutoload.php";

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'tulsipatel29051995@gmail.com';                            // SMTP username
		$mail->Password = 'tulsipatel123';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 465;						//Port Number

		$mail->From = 'tulsipatel29051995@gmail.com';			//From Email Id
		$mail->FromName = 'QUALITY ASSESSMENT : TULSI';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($response["email"]);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		//$mail->isHTML(true);                                  // Set email format to HTML
		$str='Your Password Is:';
		$mail->Subject = 'Your Password::';
		$mail->Body    = $str.$response["pwd"];
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) 
		{
			$response["success"] = 0;
	 		$response["message"]="email error";
		}
		else
		{
			$response["success"] = 1;
	 		$response["message"]="email send";
		}
    }
    else
    {
     $response["success"] = 2;
	 $response["message"]="email id is not valid"; 
    }
	echo json_encode($response);
?>