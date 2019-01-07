<?php
	$degree=strtoupper($_POST['degree']);

	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
	$query="select distinct deptid,shortname from department where degree='$degree';";
	echo('<select id="dept" name="dept" required onchange="courselist(this)"><option value="dept" disabled selected hidden>Department</option>');
	$deptlist=$connection->query($query);
	while($dept = $deptlist->fetch_array()) {
	    echo("<option value='".$dept['deptid']."'>".$dept['shortname']."</option>");
	}
	echo('</select>');
	$deptlist->free();
	$connection->close();
?>