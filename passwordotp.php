<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$email = $_GET['email'];
	
	if (isset($_POST["submit"]))
	{
		$validateOTP = $_POST['otp'];
		$sql = "SELECT * FROM customer WHERE email='$email'";
		$results = mysqli_query($con, $sql);
		while($rows = mysqli_fetch_assoc($results)) {
			if($validateOTP == $rows['otp']) {
				header("Location: bank_passwordrecovery3.php?email=$email");
			}
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
    
	<form method="post" action="" >
		<div class='container'>

			<br>
			<h1 style="font-size:25px">Code Verification </h1>
			<br>
			<p> Please enter the security code sent to your email. </p>
			
			<br>
			<br>
			<label class="input_label">Enter The OTP Number</label>
			<input type="text" name="otp">

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