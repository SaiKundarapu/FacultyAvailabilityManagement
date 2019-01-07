<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
    {
    	if(isset($_POST['type']))
    	{
    		$type="YES";
    	}
    	else
    	{
    		$type="NO";
    	}
		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
		if ($connection->connect_errno) {
			echo("Sorry, this website is experiencing problems.");
			echo("Error: Failed to make a MySQL connection, here is why: \n");
		    echo("Errno: " . $connection->connect_errno . "\n");
		    echo("Error: " . $connection->connect_error . "\n");
		}
		$query ="insert into department(degree,deptid,fullname,shortname,iscoursedept) values('".strtoupper($_POST['degree'])."','".strtoupper($_POST['deptid'])."','".strtoupper($_POST['fname'])."','".strtoupper($_POST['sname'])."','$type');";

		if (!$connection->real_query($query)) {

		    if($connection->errno==1062)
		    {
		    	$_SESSION['msg']="*Department already exists";
		    }
		    else
		    {
		    	$_SESSION['msg']="*Invalid Data Format";
		    }
		}
		else
		{
			$_SESSION['msg']= 'Added Successfully';
		}
		$connection->close();
		header("location: departmenthomepage.php");
	}
?>