<?php
	$con = mysqli_connect('localhost', 'root', '', 'banking');
	$account = $_GET['account'];
	
		$sql = "SELECT blocked FROM account WHERE accountno = '$account'";
		$query = $con->query($sql);
		$result = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1)
		{
			while ($row = $query->fetch_array())
			{
				$blockedvalue = $row[0];
			} 
		}
		else
		{
			echo "Could not Get Personal Details.";
		}
		if ($blockedvalue == 0)
		{
			$sql = "UPDATE account SET blocked = 1 WHERE accountno = '$account'";
			if (mysqli_query($con, $sql))
			{
				header("Location: admin_homepage.php");
			}
			else
			{
				echo "Command could not be executed.";
			}
		}
		else
		{
			$sql = "UPDATE account SET blocked = 0 WHERE accountno = '$account'";
			if (mysqli_query($con, $sql))
			{
				header("Location: admin_homepage.php");
			}
			else
			{
				echo "Command could not be executed.";
			}
		}
?>