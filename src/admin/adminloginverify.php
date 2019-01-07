<?php

	session_start();
	$error='Enter a Valid Phone Number or Email Id';
	if ($_SERVER['REQUEST_METHOD'] == "POST"&&isset($_POST['login'])) 
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

		if ($connection->connect_errno) {
			echo("Sorry, this website is experiencing problems.");
			echo("Error: Failed to make a MySQL connection, here is why: \n");
		    echo("Errno: " . $connection->connect_errno . "\n");
		    echo("Error: " . $connection->connect_error . "\n");
		}

		$username=strtolower($username);
		$query ="select * from admin where password='$password' AND (lower(username)='$username' OR phoneno='$username');";
		if (!$result = $connection->query($query)) {
		    echo("Sorry, the website is experiencing problems.");
		    echo("Error: Our query failed to execute and here is why: \n");
		    echo("Query: " . $query . "\n");
		    echo("Errno: " . $connection->errno . "\n");
		    echo("Error: " . $connection->error . "\n");
		    exit;
		}
		if ($result->num_rows >= 1)
		{
			$_SESSION['admin']=$username;
			$result->free();
			$connection->close();
			header("location: ./adminhomepage.php");
		} 
		else
		{
			$error = '**Incorrect Credentials';
		}
		$result->free();
		$connection->close();
	}
?>