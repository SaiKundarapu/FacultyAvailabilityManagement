<?php
session_start();
$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
$query="DELETE FROM faculty WHERE degree='".$_GET['degree']."' AND deptid='".$_GET['deptid']."' AND facultyid='".$_GET['facultyid']."';";
$connection->real_query($query);
$connection->close();
$_SESSION['errmsg']='Deleted Sucessfully';
header("location: facultymodify.php");
?>