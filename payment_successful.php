<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$account = $_GET['account'];
	$amount = $_GET['amount'];
	$receivingaccount = $_GET['receivingaccount'];
	$isPaybill = $_GET['paybills'];

	if (isset($_POST["add"]))
	{
		mysqli_query($con, "INSERT INTO favorites VALUES ('$account', '$receivingaccount')");
		header("Location: homepage2.php?account=$account");
	}

	if(isset($_POST['cancel'])) {
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
			<h1 style="font-size:25px"> 
				<?php
					if($isPaybill == 0) {
						$results = mysqli_query($con, "SELECT * FROM customer WHERE accountno = '$receivingaccount'");
						while($row = mysqli_fetch_assoc($results)) {
							echo "TO " . $row['firstname'] . " " . $row['lastname'];
						}
					}

					if($isPaybill == 1) {
						$results = mysqli_query($con, "SELECT * FROM institution WHERE accountno = '$receivingaccount'");
						while($row = mysqli_fetch_assoc($results)) {
							echo "TO " . $row['institution'];
						}
					}
					
				?>
			</h1>

			<br>


			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<h1 style="font-size:25px">Add to Favourites?</h1>

			<br>
			<input type="submit" name="add" value="Add">
			<form method="post" action="">
				<input type="submit" name="cancel" value="Cancel">
			</form>
			<br>
			<br>
			</div>
	</form>


    
</body>
</html>