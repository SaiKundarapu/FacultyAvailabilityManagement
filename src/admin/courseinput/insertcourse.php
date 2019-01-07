<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
{
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
	$lab=($_POST['lab']=="1")?"YES":"NO";
	$lecture=($_POST['lab']=="2")?"YES":"NO";

	if($_POST['ele']=="1")
	{
		$query ="insert into course(degree,deptid,year,sem,elective,courseid,coursefullname,courseshortname,lab,lecture) values('".strtoupper($_POST['degree'])."','".strtoupper($_POST['dept'])."','".$_POST['year']."','".$_POST['sem']."','NO','".strtoupper($_POST['courseid'])."','".strtoupper($_POST['subfull'])."','".strtoupper($_POST['subshort'])."','".$lab."','".$lecture."');";

		if (!$connection->real_query($query)) {

			if($connection->errno==1062)
			{
				$_SESSION['msg']="*Course already exists";
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
	}
	else
	{
		$eletype=($_POST['eletype']=="1")?"OE":"PE";
		$query ="insert into course(degree,deptid,year,sem,elective,electivetype,electiveno,courseid,coursefullname,courseshortname,lab,lecture) values('".strtoupper($_POST['degree'])."','".strtoupper($_POST['dept'])."',".$_POST['year'].",".$_POST['sem'].",'YES','".$eletype."',".$_POST['eleno'].",'".strtoupper($_POST['courseid'])."','".strtoupper($_POST['subfull'])."','".strtoupper($_POST['subshort'])."','".$lab."','".$lecture."');";

		if (!$connection->real_query($query)) {

			if($connection->errno==1062)
			{
				$_SESSION['msg']="*Course already exists";
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

	}
	$connection->close();
	header("location: ./coursehomepage.php");
}
?>