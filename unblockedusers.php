<?php
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
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
		table { border: 1px solid #5c743d;
				width: 50%;
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
		
		input[type=submit] {
		  font-size: 12pt;
		  border: 3px solid red;
		  padding: 16px 32px;
		  text-decoration: none;
		  margin: 4px 2px;
		  cursor: pointer;
		}
    </style>
    

</head>
<body>
    
    <div class="logo">

    <img src="/bankproject/horizon5.png" width="105" height="70" onclick="">
    </div>


    <ul>
        <li><a href="admin_homepage.php">Home</a></li>
		<li><a href="admin_user_registration1.php">Register New User</a></li>
        <li><a href="blockedusers.php">Blocked Users</a></li>
        <li><a href="unblockedusers.php">Unblocked Users</a></li>        
      </ul>

      <hr class="new1">

</div>

    <!-- <div class="background-container">
        <img src="/bankproject/wallpaper1.jpg" width="720" height="700">
    </div> -->
	<br>
	<br>
	<form action="blockedusers.php" method="post">
	<table cellpadding="5px" width="50%" border='1'>
		<tr>
			<td>Account</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>Username</td>
			<td>Balance</td>
			<td>Blocked / Unblocked</td>
			<td></td>
		</tr>
		<?php
			$constatus = 0;
			
			if ($con)
			{
				$constatus = 1;
			}
			else
			{
				echo "Connection Failed.";
			}
			
			if ($constatus == 1)
			{
				$sel = "SELECT customer.accountno, customer.firstname, customer.lastname, customer.email, customer.username, account.balance, account.blocked FROM customer INNER JOIN account ON customer.accountno = account.accountno WHERE account.blocked = 0";
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
			<td><?php 
			if ($row[6] == 0)
			{		
				echo "Unblocked";
			}
		    else
		    {
			    echo "Blocked";
		    }
			?></td>
			<td><input type="submit" value="Block" name="block" formaction="admin_blockunblock.php?account=<?php echo $row[0];?>"/></td>
		</tr>
		<?php
				}
			}
			
	?>
	</table></br>
	</form>
    
</body>
</html>