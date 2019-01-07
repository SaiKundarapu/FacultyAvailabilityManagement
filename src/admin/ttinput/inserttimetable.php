<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
{
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

	$connection->autocommit(FALSE);

	$query ="INSERT INTO classtimetableid(degree, deptid, year, section, sem, timetableid) VALUES('".strtoupper($_POST['degree'])."','".$_POST['dept']."',".$_POST['year'].",'".$_POST['sec']."',".$_POST['sem'].",'".$_POST['dept'].$_POST['year'].$_POST['sec'].$_POST['sem']."');";

	if (!$connection->real_query($query)) 
	{
		if($connection->errno==1062)
		{
			$_SESSION['msg']="*TimeTable already exists1".$connection->error.$query;
		}
		else
		{
			$_SESSION['msg']=$connection->error.$query;
		}
		$connection->close();
		header("location: ./tthomepage.php");
		exit;	    
	}
	else
	{
		foreach($_SESSION['timetable'] as $day =>$period) 
		{
			foreach($period as $periodvalue => $faculty)
			{
				foreach($faculty as $facultyvalue=>$course)
				{
					$query="INSERT INTO classtimetable(timetableid, day, period, facultyid, courseid) VALUES('".$_POST['dept'].$_POST['year'].$_POST['sec'].$_POST['sem']."','".$day."',".$periodvalue.",'".$facultyvalue."','".$course."');";
					if (!$connection->real_query($query)) 
					{
						if($connection->errno==1062)
						{
							$_SESSION['msg']="*TimeTable already exists2".$connection->error.$query;
						}
						else
						{
							$_SESSION['msg']=$connection->error.$query;
						}
						$connection->rollback();
						$connection->close();
						header("location: tthomepage.php");
						exit;	    
					}
				}
			}
		}
	}
	$_SESSION['msg']= 'Added Successfully';
	$connection->commit();
	$connection->close();
	header("location: ./tthomepage.php");
}
?>