<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
    {
		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

		$connection->autocommit(FALSE);

		$query ="insert into faculty(fname,mname,lname,gender,title,facultyid,email,phno,degree,deptid) values('".strtoupper($_POST['fname'])."','".strtoupper($_POST['mname'])."','".strtoupper($_POST['lname'])."','".$_POST['gender']."','".strtoupper($_POST['title'])."','".strtoupper($_POST['id'])."','".strtoupper($_POST['email'])."','".$_POST['phno']."','".strtoupper($_POST['degree'])."','".strtoupper($_POST['dept'])."');";

		if (!$connection->real_query($query)) 
		{
		    if($connection->errno==1062)
		    {
		    	$_SESSION['msg']="*Faculty already exists";
		    }
		    else
		    {
		    	$_SESSION['msg']=$connection->error;
		    }
		    $connection->close();
			header("location: ./facultyhomepage.php");
			exit;	    
		}
		else
		{
			foreach($_POST['course'] as $subject) 
			{

				$query="insert into facultycourse(facultyid,courseid) values('".strtoupper($_POST['id'])."','".strtoupper($subject)."');";
				if (!$connection->real_query($query)) 
				{
					if($connection->errno==1062)
		    		{
		    			$_SESSION['msg']="*Facultycourse already exists";
		    		}
		    		else
		    		{
				    	$_SESSION['msg']=$connection->error;
					}
				    $connection->rollback();
				    $connection->close();
					header("location: facultyhomepage.php");
					exit;	    
				}
			}
		}
		$_SESSION['msg']= 'Added Successfully';
		$connection->commit();
		$connection->close();
		header("location: ./facultyhomepage.php");
	}
?>