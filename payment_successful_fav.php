<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$account = $_GET['account'];
	$amount = $_GET['amount'];
	$receivingaccount = $_GET['receivingaccount'];

	if (isset($_POST["back"]))
	{
		header("Location: homepage2.php?account=$account");
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
    
	<form method="post" action="">
		<div class='container'>

			<br>
			<h1 style="font-size:25px">Payment Successful!</h1>
			
			<br>
			<br>

			<h1 style="font-size:25px">RM <?php echo $amount; ?></h1>

			<br>


			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<br>
			<input type="submit" name="back" value="Back">
			<br>
			<br>
			</div>
	</form>


    
</body>
</html>