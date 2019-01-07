<?php
	session_start();
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

	$lab=($_POST['lab']=="1")?"YES":"NO";
	$lecture=($_POST['lab']=="2")?"YES":"NO";

	if($_POST['ele']=="1")
	{
		$query ="UPDATE course SET degree='".strtoupper($_POST['degree'])."',deptid='".$_POST['dept']."',year='".$_POST['year']."',sem='".$_POST['sem']."',elective='NO',electivetype=NULL,electiveno=NULL,courseid='".$_POST['courseid']."',coursefullname='".$_POST['subfull']."',courseshortname='".$_POST['subshort']."',lab='".$lab."',lecture='".$lecture."' where degree='".$_POST['pk1']."' AND deptid='".$_POST['pk2']."' AND year='".$_POST['pk3']."' AND courseid='".$_POST['pk4']."';";

		if (!$connection->real_query($query)) {

		    if($connection->errno==1062)
		    {
		    	$_SESSION['errmsg']="*Course already exists";
		    }
		    else
		    {
		    	$_SESSION['errmsg']=$connection->error;
		    }		    
		}
		else
		{
			$_SESSION['errmsg']= 'Modify Successfully';
		}
	}
	else
	{
		$eletype=($_POST['eletype']=="1")?"OE":"PE";
		$query ="UPDATE course SET degree='".strtoupper($_POST['degree'])."',deptid='".$_POST['dept']."',year='".$_POST['year']."',sem='".$_POST['sem']."',elective='YES',electivetype='".$eletype."',electiveno='".$_POST['eleno']."',courseid='".$_POST['courseid']."',coursefullname='".$_POST['subfull']."',courseshortname='".$_POST['subshort']."',lab='".$lab."',lecture='".$lecture."' where degree='".$_POST['pk1']."' AND deptid='".$_POST['pk2']."' AND year='".$_POST['pk3']."' AND courseid='".$_POST['pk4']."';";

		if (!$connection->real_query($query)) {

		    if($connection->errno==1062)
		    {
		    	$_SESSION['errmsg']="*Course already exists";
		    }
		    else
		    {
		    	$_SESSION['errmsg']=$connection->error;
		    }		    
		}
		else
		{
			$_SESSION['errmsg']= 'Modify Successfully';
		}

	}
	$connection->close();
	header("location: ./coursemodify.php");
?>