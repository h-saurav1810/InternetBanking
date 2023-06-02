<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	if (isset($_POST["submit"]))
	{
		$accountno = $_POST["account"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$dob = $_POST["dob"];
		$phonenum = $_POST["phonenum"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];
		$securityquestion = $_POST["securityquestion"];
		$securityans = $_POST["securityans"];
		
		if ($password == $confirmpassword)
		{
			$sql = "INSERT INTO customer VALUES ('$firstname', '$lastname', '$dob', '$phonenum', '$email', '$username', '$password', '$securityquestion', '$securityans', '$accountno', 1, 0)";
			if (mysqli_query($con, $sql))
			{
				$_SESSION['status'] = "Record Successfully added";
			}
			else
			{
				echo "Record could not be added into the table.";
			}	
		}
		else
		{
			echo "Passwords could not be confirmed.";
		}	
	}
	
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
    
    <form action="bank_login.php" method="post">
        <div class='container'>
        <div class='card'>
        <h1 style="font-size:22px" > Ready To Create An Account </h1>
        <br>
        <h1 style="font-size:14px" > Fill in your information to register an account</h1>
        <br>
        <label class="input_label">Account Number</label><br>
        <input class='input' type="number" name="account" placeholder="XXXX-XXXX-XXXX">

        <br>
        <br>
        <label class="input_label">Fullname</label><br>
        <input class='input_field' type="text" name="firstname" placeholder ="First">
		<br>
		<br>
        <input class='input_field' type="text" name="lastname" placeholder ="Last">
		
		<br>
        <br>

        <label class="input_label"> Date of Birth </label><br>
        <input class='input_field' type="date" name="dob" placeholder="">
		
		<br>
        <br>

        <label class="input_label"> Phone Number </label><br>
        <input class='input_field' type="text" name="phonenum" placeholder="+60 XXXXXXXXXX">
        
        <br>
        <br>

		
        <label class="input_label"> Email Address </label><br>
        <input class='input_field' type="email" name="email" placeholder="test@test.com">

		<br>
        <br>

        <label class="input_label">User Name </label><br>
        <input class='input_field' type="username" name="username" placeholder="">
		
        <br>
        <br>

        <label class="input_label">Password</label><br>
        <input class="input_field" type="password" name="password" placeholder="********">

        <br>
        <br>

        <label class='input_label'>Confirm Password</label><br>
        <input class="input_field" type="password" name="confirmpassword" placeholder="********">

        <br>
        <br>

        <label class="input_label"> Security Question </label><br>
        <select name="securityquestion" placeholder="">
			<option class='input_field' value="What was the first name of your best friend in high school?">What was the first name of your best friend in high school?</option>
			<option class='input_field' value="What was the name of your first pet?">What was the name of your first pet?</option>
			<option class='input_field' value="What was the name of your favorite high school teacher?</">What was the name of your favorite high school teacher?</option>
		</select>
		
		<br>
        <br>

        <label class="input_label"> Security Answer </label><br>
        <input class='input_field' type="text" name="securityans" placeholder="">
		
		<br>
		<br>
        <p> BY CLICKING 'REGISTER', I AGREE WITH THE TERMS & CONDITIONS AND THE PRIVACY STATEMENT</p>
        <br>

        </div>
        </div>
    
    <footer>
        
        <div class='set'>

		<input type="submit" name="submit" value="Register">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<form action="bank_login.php" method="post">
        <input type="button" onClick="location.href='bank_login.php'" value="Cancel">
        </div>
	</form>
    </footer>
    </form>
</div>
<?php
	if (isset($_SESSION['status']))
	{
		echo $_SESSION['status'];
		session_destroy();
	}
?>
</body>
</html>