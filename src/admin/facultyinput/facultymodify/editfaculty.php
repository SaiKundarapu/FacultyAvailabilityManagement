<?php
session_start();
$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
$query ="UPDATE faculty SET fname='".strtoupper($_POST['fname'])."',mname='".strtoupper($_POST['mname'])."',lname='".strtoupper($_POST['lname'])."',gender='".$_POST['gender']."',title='".strtoupper($_POST['title'])."',facultyid='".strtoupper($_POST['id'])."',email='".strtoupper($_POST['email'])."',phno='".strtoupper($_POST['phno'])."',degree='".strtoupper($_POST['degree'])."',deptid='".strtoupper($_POST['dept'])."' where degree='".$_POST['pk1']."' AND deptid='".$_POST['pk2']."' AND facultyid='".$_POST['pk3']."';";
$connection->real_query($query);
$query="DELETE FROM facultycourse WHERE facultyid='".strtoupper($_POST['id'])."';";
$connection->real_query($query);
foreach($_POST['course'] as $subject) 
{
	$query="insert into facultycourse(facultyid,courseid) values('".strtoupper($_POST['id'])."','".strtoupper($subject)."');";
	$connection->real_query($query);
}
$_SESSION['errmsg']='Modified Sucessfully';
$connection->close();
header("location: facultymodify.php");
?>