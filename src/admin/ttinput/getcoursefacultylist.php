 <?php
	$degree=strtoupper($_POST['degree']);
	$deptid=strtoupper($_POST['dept']);
	$year=$_POST['year'];
	$sem=$_POST['sem'];
	$lab=$_POST['lab'];
	$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');

	$query="select courseshortname,fname,mname,lname,facultyid,courseid from course natural join facultycourse natural join faculty where degree='$degree' and deptid='$deptid' and year=$year and sem=$sem and elective='NO' and $lab;";

	$coursefacultylist=$connection->query($query);
	while($coursefaculty = $coursefacultylist->fetch_array()) {
	    echo("<input type='checkbox' name='coursefaculty' value='".$coursefaculty['courseid']."@".$coursefaculty['facultyid']."'><label>".$coursefaculty['courseshortname']."(".$coursefaculty['fname'].$coursefaculty['mname'].$coursefaculty['lname'].")</label><br>");
	}
	$coursefacultylist->free();
	$connection->close();
?>