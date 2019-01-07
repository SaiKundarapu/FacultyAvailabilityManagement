<?php
session_start();
$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
$query="DELETE FROM course WHERE degree='".$_GET['degree']."' AND deptid='".$_GET['deptid']."' AND year='".$_GET['year']."' AND courseid='".$_GET['courseid']."';";
$connection->real_query($query);
$connection->close();
$_SESSION['errmsg']='Deleted Sucessfully';
header("location: coursemodify.php");
?>