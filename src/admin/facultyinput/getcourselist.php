<?php
	$dept=strtoupper($_POST['dept']);
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
	$query="select distinct courseshortname,courseid from course where deptid='$dept';";
	$courselist=$connection->query($query);
	while($course = $courselist->fetch_array()) {
	    echo("<input type='checkbox' name='course[]' value='".$course['courseid']."'><label>".$course['courseshortname']."</label><br>");
	}
	$courselist->free();
	$connection->close();
?>