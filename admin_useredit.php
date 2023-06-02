<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	$account = $_GET['account'];
	
	if (isset($_POST["update"]))
	{
		$editaccount = $account;
		$editfirstname = $_POST["firstname"];
		$editlastname = $_POST["lastname"];
		$editphonenum = $_POST["phonenum"];
		$editemail = $_POST["email"];
		$editusername = $_POST["username"];
			
		$sql = "UPDATE customer SET firstname = '$editfirstname', lastname = '$editlastname', phonenum = '$editphonenum', email = '$editemail', username = '$editusername' WHERE accountno = '$editaccount'";
		if (mysqli_query($con, $sql))
		{
			header("Location: admin_homepage.php");;
		}
		else
		{
			echo "Record could not be edited.";
		}	
	}
	
	if ($con)
	{
		$constatus = 1;
	}
	else
	{
		echo "Connection Failed.";
	}
		
	$sel = "SELECT firstname, lastname, phonenum, email, username FROM customer WHERE accountno = '$account'";
	$query = $con->query($sel);
	while ($row = $query->fetch_array())
	{
		$firstname = $row[0];
		$lastname = $row[1];
		$phonenum = $row[2];
		$email = $row[3];
		$username = $row[4];
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registration_css.scss">
    <style>
        
    </style>
</head>
<body>

    <div class='right-container'>
    
    <form action="" method="post">
        <div class='container'>
        <div class='card'>
        <h1 style="font-size:20px" > Edit Customer Information </h1>
        <br>
        <label class="input_label">Account Number</label><br>
		<label class="input_label"><?php echo $account;?></label><br>
        <br>
        <br>
        <label class="input_label">Fullname</label><br>
        <input class='input_field' type="text" name="firstname" placeholder="First" value="<?php echo $firstname;?>">
		<br>
		<br>
        <input class='input_field' type="text" name="lastname" placeholder="Last" value="<?php echo $lastname;?>">
		
		<br>
        <br>

        <label class="input_label"> Phone Number </label><br>
        <input class='input_field' type="text" name="phonenum" placeholder="+60 XXXXXXXXXX" value="<?php echo $phonenum;?>">
        
        <br>
        <br>

        <label class="input_label"> Email Address </label><br>
        <input class='input_field' type="email" name="email" placeholder="test@test.com" value="<?php echo $email;?>">

		<br>
        <br>

        <label class="input_label"> Username </label><br>
        <input class='input_field' type="text" name="username" placeholder="" value="<?php echo $username;?>">
		
        </div>
        </div>
    
    <footer>
        
        <div class='set'>

		<input type="submit" name="update" value="Update">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<form action="admin_homepage.php" method="post">
			<input type="button" onClick="location.href='admin_homepage.php'" value="Cancel">
		</form>
	</div>
    </footer>
    </form>
<?php
	}
?>
</div>
</body>
</html>