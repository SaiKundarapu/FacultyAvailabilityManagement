<?php
	session_start();
	$error='Enter Registered Phone Number or Email Id';
	if ($_SERVER['REQUEST_METHOD'] == "POST"&&isset($_POST['login'])) 
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

		$username=strtolower($username);
		$query ="select * from faculty where phno='$password' AND (lower(email)='$username' OR phno='$username');";
		if (!$result = $connection->query($query)) {
		    echo("Query: " . $query . "\n");
		    echo("Errno: " . $connection->errno . "\n");
		    echo("Error: " . $connection->error . "\n");
		    exit;
		}
		if ($result->num_rows >= 1)
		{
			$_SESSION['faculty']=$username;
			$result->free();
			$connection->close();
			header("location: ./facultyhomepage.php");
		} 
		else
		{
			$error = '**Incorrect Credentials';
		}
		$result->free();
		$connection->close();
	}
?>