 <?php
	$degree=strtoupper($_POST['degree']);
	$deptid=strtoupper($_POST['dept']);
	$year=$_POST['year'];
	$sem=$_POST['sem'];
	$eletype=$_POST['eletype'];
	echo("<select id='eleno' name='eleno' onchange='getelefacultylist()'>");
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
	$query="select distinct electiveno from course where degree='$degree' and deptid='$deptid' and year=$year and sem=$sem and elective='YES' and electivetype='$eletype';";
	echo($query);
	$elenolist=$connection->query($query);
	$flag=0;
	while($eleno = $elenolist->fetch_array()) {
		if($flag==0)
		{
		    echo("<option value='".$eleno['electiveno']."'selected>".$eleno['electiveno']."</option><br>");
		    $flag=1;
		}
		else
		{
			echo("<option value='".$eleno['electiveno']."'>".$eleno['electiveno']."</option><br>");
		}
	}
	echo("</select>");
	$elenolist->free();
	$connection->close();
?>