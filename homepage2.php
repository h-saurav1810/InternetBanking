<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	$account = $_GET['account'];
		
	/*	
		if (isset($_POST["username"]) && isset($_POST["password"]))
		{
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["password"] = $_POST["password"];
			header("Location: homepage2.php");
		}
		
		$username = $_SESSION["username"];
		$password = $_SESSION["password"];
	*/
	
		$sql = "SELECT customer.firstname, customer.lastname, customer.accountno, account.balance FROM customer INNER JOIN account ON customer.accountno = account.accountno WHERE customer.accountno = '$account'";
		$query = $con->query($sql);
		$result = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1)
		{
			while ($row = $query->fetch_array())
			{
				$firstname = $row[0];
				$lastname = $row[1];
				$account = $row[2];
				$balance = $row[3];
			} 
		}
		else
		{
			echo "Invalid Username or Password Entered.";
		}
		
		$accountNum = $account;
		$accountNo = $account;
		$account = $account;
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="/bankproject/homepage2css.scss" rel="stylesheet">
    <style>

        body {
            background-image: url(/bankproject/wallpaper3.jpg);
        }

    </style>
    

</head>
<body>
    
    <div class="logo">

    <img src="/bankproject/horizon5.png" width="105" height="70" onclick="location.href='homepage2.php?account=<?php echo $account ?>'">
    </div>


    <ul>
        <li><a href="homepage2.php?account=<?php echo $account; ?>">Home</a></li>
		<li><a href="favourites.php?account=<?php echo $account; ?>">Favourites</a></li>
        <li><a href="bank_transferfunds.php?account=<?php echo $account; ?>">Transfer Funds</a></li>
        <li><a href="bank_paybills.php?account=<?php echo $account; ?>">Pay Bills</a></li>
        <li><a href="bank_statement.php?account=<?php echo $account; ?>">Bank Statement</a></li>
        <li style="float:right"><a href="bank-index.php">Sign Out</a>
        <li style="float:right"><a href="#">Settings</a>
        
    </ul>

      <hr class="new1">

    
    <div class="container">
        <div class="container-label">
        <br>
        <h1 style="font-size:25px">Saving Accounts </h1>
        <br>
        <label><h3 style="font-size:18px">Account No. : <?php echo $account ?></h3></label>
        <br>
        <label><h3>Name : <?php echo $firstname . " " .  $lastname ?></h3></label>
        <br>
        <label><h2>Balance : RM  <?php echo $balance ?></h2></label>
    </div>
</div>

    <!-- <div class="background-container">
        <img src="/bankproject/wallpaper1.jpg" width="720" height="700">
    </div> -->


    
</body>
</html>