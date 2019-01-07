<?php
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
	echo('<select id="sec" name="sec" required><option value="sec" disabled selected hidden>Section</option>');
	$query="select sections from class where degree='".strtoupper($_POST['degree'])."' and deptid='".strtoupper($_POST['dept'])."' and year=".$_POST['year'].";";
	$sections=$connection->query($query);
	$sections=$sections->fetch_array();
	$sections=$sections[0];
	$count=0;
	while($count<$sections) {
	    echo("<option name='sec' value='".chr(65+$count)."'>".chr(65+$count)."</option>");
	    $count=$count+1;
	}
	echo('</select>');
	$connection->close();
?>
