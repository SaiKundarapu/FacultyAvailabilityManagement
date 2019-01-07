<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
    {
		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
		if ($connection->connect_errno) {
			echo("Sorry, this website is experiencing problems.");
			echo("Error: Failed to make a MySQL connection, here is why: \n");
		    echo("Errno: " . $connection->connect_errno . "\n");
		    echo("Error: " . $connection->connect_error . "\n");
		}
		
		$query ="insert into class(degree,deptid,batch,year,sections) values('".strtoupper($_POST['degree'])."','".$_POST['dept']."','".$_POST['batch']."','".$_POST['year']."',".$_POST['sections'].");";

		if (!$connection->real_query($query)) {

		    if($connection->errno==1062)
		    {
		    	$_SESSION['msg']="*Class already exists";
		    }
		    else
		    {
		    	$_SESSION['msg']=$connection->error;
		    }		    
		}
		else
		{
			$_SESSION['msg']= 'Added Successfully';
		}
		$connection->close();
		header("location: classhomepage.php");
	}
?>