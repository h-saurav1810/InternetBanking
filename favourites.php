<?php
	session_start();
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$account = $_GET['account'];
	
	if (isset($_POST["submit"]))
	{
		$receivingaccount = $_POST["receiving_account"];
		$amount = $_POST["amount"];
		$reference = $_POST["reference"];
		$pin = $_POST["pin"];
	/*
		$sql = "SELECT accountno FROM account WHERE accountno = '$receivingaccount'";
		$query = $con->query($sql);
		$result = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1)
		{
			while ($row = $query->fetch_array())
			{
				$receivingaccount = $row[0];
			} 
		}
	*/	
		$sql = "SELECT pin, balance FROM account WHERE accountno = '$account'";
		$query = $con->query($sql);
		$result = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1)
		{
			while ($row = $query->fetch_array())
			{
				$checkpin = $row[0];
				$currentBalance = $row[1];
			} 
		}
		
		if ($pin == $checkpin)
		{
			if($currentBalance > $amount) {
				$sql = "UPDATE account SET balance = (balance - $amount) WHERE accountno = '$account'";
				if (mysqli_query($con, $sql))
				{
					$_SESSION['status'] = "Bill Payment Completed.";
				}
				else
				{
					echo "Payment could not be made.";
				}
				
				$sql = "UPDATE account SET balance = (balance + $amount) WHERE accountno = '$receivingaccount'";
				if (mysqli_query($con, $sql))
				{
					$_SESSION['status'] = "Bill Payment Completed.";
				}
				else
				{
					echo "Payment could not be made.";
				}
				
				$totalBalance = 0;
				$balance = mysqli_query($con, "SELECT balance FROM account WHERE accountno = '$account'");
				while($rows = mysqli_fetch_assoc($balance)) {
					$totalBalance = ($rows['balance'] + $amount);
				}
				$sql = "INSERT INTO transaction VALUES (NULL, '$date', '$reference', '$account', 0, '$amount', $totalBalance)";

				if (mysqli_query($con, $sql))
				{
					$_SESSION['status'] = "Record Successfully added into Property For Rent table.";
				}
				else
				{
					echo "Record could not be added into the table.";
				}	
				
				$date = date('Y-m-d', time());
				
				$totalBalance = 0;
				$balance = mysqli_query($con, "SELECT balance FROM account WHERE accountno = '$receivingaccount'");
				while($rows = mysqli_fetch_assoc($balance)) {
					$totalBalance = ($rows['balance'] - $amount);
				}
				$sql = "INSERT INTO transaction VALUES (NULL, '$date', '$reference', '$receivingaccount', '$amount', 0, $totalBalance)";

				if (mysqli_query($con, $sql))
				{
					$_SESSION['status'] = "Record Successfully added into Property For Rent table.";
				}
				else
				{
					echo "Record could not be added into the table.";
				}	

				header("Location: payment_successful_fav.php?account=$account&amount=$amount&receivingaccount=$receivingaccount");
						
			} else {
				echo "Insufficient Funds!"; 
			}
		}
		else
		{
			echo "PIN Entered is incorrect.";
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Funds</title>
    <link rel="stylesheet" href="transferfunds.scss">
    <style>
        
    </style>
</head>
<body>

<div class="logo">

<img src="/bankproject/horizon5.png" width="105" height="70" onclick="location.href='homepage2.php'">
</div>


<ul>
    <li><a href="homepage2.php?account=<?php echo $account; ?>">Home</a></li>
	<li><a href="favourites.php?account=<?php echo $account;?>">Favourites</a></li>
        <li><a href="bank_transferfunds.php?account=<?php echo $account;?>">Transfer Funds</a></li>
        <li><a href="bank_paybills.php?account=<?php echo $account;?>">Pay Bills</a></li>
        <li><a href="bank_statement.php?account=<?php echo $account;?>">Bank Statement</a></li>
    <li style="float:right"><a href="bank-index.php">Sign Out</a>
    <li style="float:right"><a href="#">Settings</a>
    
  </ul>


    <div class='right-container'>
    

    <form class='card_form' action="" method="post">
        <div class='container'>
        <div class='card'>
        <h1 style="font-size:22px" >Favorites  </h1>
        <br>
        <h1 style="font-size:14px" >Complete a payment to one of your favourited accounts  </h1> 
        <br>
        <br>

        <label class="input_label">Bank Account </label><br>
        <select name="receiving_account" id="receiving_account" value="">
			<?php
				$sel = "SELECT DISTINCT favoritedaccount FROM favorites WHERE useraccount = '$account'";
				$query = $con->query($sel);
				while ($branch = $query->fetch_array())
				{
			?>
		<option value="<?php echo $branch[0]?>"><?php echo $branch[0]?></option>
			<?php
				}
			?>
		</select>

        <br>
		<br>


        <label class="input_label">Enter Amount</label><br>
        <input class="input_field" type="text" name="amount" placeholder="RM ">

        <br>
        <br>

        <label class='input_label'>Recipient Reference</label><br>
        <input class='input_field'type="text" name="reference" placeholder="">

        <br>
        <br>
		
		<label class="input_label">PIN</label><br>
        <input class="input_field" type="password" name="pin" placeholder="*****">

        <br>
        <br>
        <br>

		<input type="submit" name="submit" value="Transfer">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<form action="homepage2.php" method="post">
			<input type="button" onClick="location.href='homepage2.php?account=<?php echo $account; ?>'" value="Cancel">
		</form>
        </div>
        </div>
	</form>
</div>

</body>
</html>