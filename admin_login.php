<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	if (isset($_POST["login"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$sql = "SELECT username, password FROM admin WHERE username = '$username' AND  password = '$password'";
		$query = $con->query($sql);
		$result = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1)
		{
			header("Location: admin_homepage.php");
		}
		else
		{
			echo "Invalid Username or Password Entered.";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_css.scss">
</head>
<body>
    
    <div class='container'>
        <img src="/bankproject/back.png" width="30px" height="30px" onclick="location.href='bank-index.php'">
        <br>
        <br>
        <h1 style="font-size:25px">Login to your account. </h1>
        <br>

	<form action="admin_login.php" method="post">
		<label class="input_label"> Admin Username</label>
		<input type="text" name="username">

		<br>
		<br>
		<label class="input_label"> Password</label>
		<input type="password" name="password">

		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<br>
		<input type="submit" name="login" value="Login">
	</form>
    <br>

    </div>


    
</body>
</html>