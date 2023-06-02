<?php
    session_start();

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d', time());
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	
	$email = $_GET['email'];
    $accountno = $_SESSION['accountno'];
    $firstname = $_SESSION['fname'];
    $lastname = $_SESSION['lname'];
    $dob = $_SESSION['dob'];
    $phonenum = $_SESSION['phonenum'];
	
	if(isset($_POST['submit'])) 
	{
		$username = $_POST["username"];
		$newPassword = $_POST["password"];
		$confirmPassword = $_POST["confirmpassword"];
		$securityquestion = $_POST["securityquestion"];
		$securityans = $_POST["securityans"];

        if($newPassword == $confirmPassword) 
		{
            $sql = "INSERT INTO customer VALUES ('$firstname', '$lastname', '$dob', '$phonenum', '$email', '$username', '$newPassword', '$securityquestion', '$securityans', '$accountno', 1, 0)";
            mysqli_query($con, $sql);
			
            header("Location: bank_login.php");
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
    
    <form action="" method="post">
        <div class='container'>
        <div class='card'>
        <h1 style="font-size:18px" > Complete your bank account registration </h1>
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