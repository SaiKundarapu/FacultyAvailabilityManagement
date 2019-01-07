<?php
session_start();
$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
if(isset($_POST['type']))
{
	$type="YES";
}
else
{
	$type="NO";
}
$query ="UPDATE department SET degree='".strtoupper($_POST['degree'])."',deptid='".strtoupper($_POST['deptid'])."',fullname='".strtoupper($_POST['fname'])."',shortname='".strtoupper($_POST['sname'])."',iscoursedept='$type' where degree='".$_POST['pk1']."' AND deptid='".$_POST['pk2']."';";

if (!$connection->real_query($query)) {

    if($connection->errno==1062)
    {
    	$_SESSION['errmsg']="*Department already exists";
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
header("location: deptmodify.php");
?>