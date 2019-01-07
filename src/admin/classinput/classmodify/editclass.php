<?php
session_start();
$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
$query ="UPDATE class SET degree='".strtoupper($_POST['degree'])."',deptid='".$_POST['dept']."',batch='".$_POST['batch']."',year='".$_POST['year']."',sections=".$_POST['sections']." where degree='".$_POST['pk1']."' AND deptid='".$_POST['pk2']."' AND year='".$_POST['pk3']."';";

if (!$connection->real_query($query)) {

    if($connection->errno==1062)
    {
    	$_SESSION['errmsg']="*Class already exists";
    }
    else
    {
    	$_SESSION['errmsg']="*Invalid Data Format";
    }
}
else
{
	$_SESSION['errmsg']='Modified Sucessfully';
}
$connection->close();
header("location: classmodify.php");
?>