<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');
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
   <style>
		.msg {
			color: white;
			font-size: 26px;
		}
   </style>
<?php
if(isset($_POST['login'])) 
{

	$password = $_POST['password'];
	$username = $_POST['username'];

	$sql = "SELECT customer.accountno, customer.username, customer.password, account.blocked FROM customer INNER JOIN account ON customer.accountno = account.accountno WHERE customer.username = '$username' AND customer.password = '$password'";
	$results = mysqli_query($con, $sql);

	if(mysqli_num_rows($results) > 0) 
	{
		while($rows = mysqli_fetch_assoc($results)) 
		{
			$accountno = $rows['accountno'];
			if($rows['blocked'] == 1) // unblocked
			{ 
				echo '<p class="msg">Account is Blocked!</p>';
			} 
			else 
			{
				header("Location: homepage2.php?account=$accountno");
			}
		}
	}
	else 
	{
		echo '<p class="msg">Incorrect Password Entered!</p>';
		$_SESSION['loginCounter']++ ;
		
		if($_SESSION['loginCounter'] > 2) 
		{
			echo "<br>Account Is Blocked! Contact the Bank for More Information.";
			$sel = "SELECT customer.accountno FROM customer INNER JOIN account ON customer.accountno = account.accountno WHERE customer.username = '$username'";
			$query = $con->query($sel);
			while ($row = $query->fetch_array())
			{
				$account = $row[0];
			}
			$sql = "UPDATE account SET blocked = 1 WHERE accountno = '" . $account . "'";
			$results = mysqli_query($con, $sql);
			/*
			if(mysqli_num_rows($results) > 0) 
			{
				
			}
			*/
		}
		
	}
}
?>

    <div class='container'>
        <img src="/bankproject/back.png" width="30px" height="30px" onclick="location.href='bank-index.php'">
        <br>
        <br>
        <h1 style="font-size:25px">Login to your account. </h1>
        <br>

	<form action="" method="post">
		<label class="input_label">User Name</label>
		<input type="text" name="username">

		<br>
		<br>
		<label class="input_label"> Password</label>
		<input type="password" name="password">
		<p><a href="bank_passwordrecovery.php"> Forgot Password? </a> </p>

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
		<br>
		<p>Not registered? <a href="bank_registration.php">Create an account</a></p>
		</div>


</body>
</html>