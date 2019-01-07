<?php
session_start();

$_SESSION['timetable'][$_POST['day']]=array();
if($_POST['count']==0)
{
	$_SESSION['timetable'][$_POST['day']][$_POST['period']]="Free Period";
}
else
{
	$_SESSION['timetable'][$_POST['day']][$_POST['period']]=array();
	$coursefacultylist=json_decode($_POST['coursefacultylist']);
	for($i=0;$i<$_POST['count'];$i++)
	{
		$coursefaculty=explode("@",$coursefacultylist->{$i});
		$_SESSION['timetable'][$_POST['day']][$_POST['period']][$coursefaculty[1]]=$coursefaculty[0];
	}
}
?>