<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	// require 'path/to/PHPMailer/src/Exception.php';
	// require 'path/to/PHPMailer/src/PHPMailer.php';
	// require 'path/to/PHPMailer/src/SMTP.php';
	require 'vendor/phpmailer/phpmailer/src/Exception.php';
	require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'vendor/phpmailer/phpmailer/src/SMTP.php';

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$email = $_GET['email'];
	
	if (isset($_POST["submit"]))
	{
		$securityquestion = $_POST['securityquestion'];
		$securityans = $_POST['securityans'];
		$sql = "SELECT email, password FROM customer WHERE email = '$email' AND securityquestion = '$securityquestion' AND securityanswer = '$securityans'";
		$query = $con->query($sql);
		$results = mysqli_query($con, $sql);

		if(mysqli_num_rows($results) > 0) 
		{
			while ($row = $query->fetch_array())
			{
				$securityemail = $row[0];
				$resetpassword = $row[1];
			}
			$code = rand(100000, 999999);
			$sqlupdate = "UPDATE customer SET otp = $code WHERE email = '$securityemail'";
			$results = mysqli_query($con, $sqlupdate);
			
			require 'vendor/autoload.php';
			$mail = new PHPMailer(true);		

			try
			{
			
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

				$mail->isSMTP();
				$mail->SMTPAuth = true;
				
				$mail->Host = "smtp.office365.com";
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = 587;

				$mail->Username = "baraihab490@outlook.sa";
				$mail->Password = "bIMKFY@1091";

				$mail->setFrom("baraihab490@outlook.sa");
				$mail->addAddress($email, "Saurav");

				$mail->Subject = "Password Recovery Verification Code";
				$mail->Body = "The code to reset your password is <br>" . $code;
				
				$mail->send();
				
				header("Location: passwordotp.php?email=$email");
			
			}
			catch (Exception $e) 
			{
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
		else
		{
			echo "Security Answer Did Not Match";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="bank_passwordrecovery.scss">
</head>
<body>
    
	<form action="" method="post">
		<div class='container'>
			<img src="/bankproject/back.png" width="30px" height="30px" onclick="location.href='bank_passwordrecovery.php'">
			<br>
			<br>
			<h1 style="font-size:25px">Security Question </h1>
			<br>
			
			<p> Please answer the security question to prove your identity. </p>
			<br>
			 <select name="securityquestion" placeholder="">
				<option class='input_field' value="What was the first name of your best friend in high school?">What was the first name of your best friend in high school?</option>
				<option class='input_field' value="What was the name of your first pet?">What was the name of your first pet?</option>
				<option class='input_field' value="What was the name of your favorite high school teacher?</">What was the name of your favorite high school teacher?</option>
			</select>
			
			<br>
			<br>
			<label class="input_label">Security Answer</label>
			<input type="text" name="securityans">

		<br>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<br>
		<input type="submit" name="submit" value="Submit">
		<br>
		<br>
		</div>
	</form>


    


    
</body>
</html>