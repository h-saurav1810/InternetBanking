<?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d', time());
    $con = mysqli_connect('localhost', 'root', '', 'banking');

    $email = $_GET['email'];

    if(isset($_POST['reset'])) {
        $newPassword = $_POST['newpassword'];
        $confirmPassword = $_POST['confirmpassword'];

        if($newPassword == $confirmPassword) {
            $sql = "UPDATE customer SET password = '$confirmPassword', otp = 0 WHERE email = '$email'";
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
    <title>Reset Password</title>
    <link rel="stylesheet" href="bank_passwordrecovery.scss">
</head>
<body>
    
    <div class='container'>
        <img src="/bankproject/back.png" width="30px" height="30px" onclick="location.href='bank_passwordrecovery2.php'">
        <br>
        <br>
        <h1 style="font-size:25px">Reset Password </h1>
        <br>
        <p> Enter your new password. </p>
       
		<br>
        <br>
        <label class="input_label">New Password</label>
        <form action="" method="post">
        <input type="password" name="newpassword">
        <br>
        <br>
        <label class="input_label">Confirm Password</label>
        <input type="password" name="confirmpassword">

    <br>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
    
        <input type="submit" name="reset" value="Reset">
    </form>
    <br>
    <br>
    </div>



    


    
</body>
</html>