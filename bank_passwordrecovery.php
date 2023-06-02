<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	if (isset($_POST["reset"]))
	{
		$email = $_POST["email"];
		header("Location: bank_passwordrecovery2.php?email=$email");
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
    <form action="bank_passwordrecovery.php" method="post">
		<div class='container'>
			<img src="/bankproject/back.png" width="30px" height="30px" onclick="location.href='bank_login.php'">
			<br>
			<br>
			<h1 style="font-size:25px">Password Recovery </h1>
			<br>
			<p> Enter the email address associated with your account to reset your password</p>
		   
			<br>
			<br>
			<label class="input_label">Email</label>
			<input type="email" name="email">

		<br>
		<br>

		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<br>
		<input type="submit" value="Reset" name="reset"/>
		<br>
		</div>
	</form>
	
 
</body>
</html>