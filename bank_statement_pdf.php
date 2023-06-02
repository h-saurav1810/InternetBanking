<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());

	$account = $_GET['account'];

	
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
       table { border: 1px solid #5c743d;
				width: 85%;
				border-spacing: 0; 
				margin: auto; }
		td, th { padding: 10px; 
				font-family: Arial, sans-serif;  } 
		caption { font-family: Arial;
				font-size: 1.2em;
				font-weight: bold; 
				padding-bottom: 5px;}
		tr:nth-of-type(even) { background-color:#eaeaea; } 
		tr:first-of-type { background-color: blue; 
						color: #eaeaea; }
		.container2 {
        position: absolute;
        top: 7%;
        left: 35%;
        background-color: #fafafe;
        border-radius: 15px;
        padding: 0px 0px 0px 50px;
        border: 1px solid black;
        width: 375px;
        height: 250px;
        box-sizing:content-box;
      }
    
      .container-label {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color:#000000
      }
    </style>
</head>
<body style="height: 800px;">
	<br />
	<div class="logo">

    <img src="/bankproject/horizon5.png" width="210" height="140" onclick="location.href='homepage2.php?account=<?php echo $account ?>'">
	
    </div>


     

    



<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');

	$sql = "SELECT customer.firstname, customer.lastname, customer.email, customer.accountno, account.balance FROM customer INNER JOIN account ON customer.accountno = account.accountno WHERE customer.accountno = '$account'";
	$query = $con->query($sql);
	$result = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result);
	if ($rowcount == 1)
	{
		while ($row = $query->fetch_array())
		{
			echo "<div class = 'container2'>";
			echo "<div class='container-label'>";
			echo "<br>";
			echo "<h1 style='font-size:25px'> Saving Accounts </h1>";
			echo "<br>";
			echo "<br>";
			echo "<label><h3>Account No. :" . " " . $row[3] . "</h3></label>";
			echo "<br>";
			echo "<label><h3> Name : " . $row[0] . " " . $row[1] . "</h3></label>";
			echo "<br>";
			echo "<label><h3> Email : " . $row[2] . "</h3></label>";
			echo "<br>";
			echo "<label><h2>Current Balance: RM " .  $row[4] . "</h2></label>";
			echo "</div></div>";
		}
	}
	else
		{
		echo "Could not Get Personal Details.";
		}
?>
   
	<br>
	<center>
<br>
<br>
<br>


    <form action="bank_statement.php?account=<?php echo $account; ?>" method="post">
		
		<br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>     
       
        
	</form>

<table width="50%" border='1'>
	<tr>
	<td>Transaction Ref</td>
	<td>Date</td>
	<td>Reference</td>
	<td>Debit</td>
	<td>Credit</td>
	<td>Running Balance</td>
	</tr>
<?php

	$sel = "";

	if(!isset($_POST['generate']))
	{
		$sel = "SELECT transactionid, date, reference, deposit, withdraw, balance FROM transaction WHERE accountno = '$account'";
	}

	if(isset($_POST['generate'])){
		$startDate = $_POST['startdate'];
		$sel = "SELECT transactionid, date, reference, deposit, withdraw, balance FROM transaction WHERE accountno = '$account' AND date >= '$startDate' ORDER BY date";
	}

	$query = $con->query($sel);
	while ($row = $query->fetch_array())
	{
?>
		<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><?php echo $row[5];?></td>
		</tr>
<?php
	}
?>
</table></br>

</center>
<script> window.print() </script>

</body>
</html>