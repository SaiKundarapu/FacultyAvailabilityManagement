<?php
	session_start();
	if(!isset($_SESSION['admin']))
	{
		header("location: ./adminlogin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Faculty Availability Report</title>
		<meta http-equiv="Content-Type" content="text/html;charset="UTF-8">
		<meta name="author" content="SAI,ONKAR,RAHUL">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/admin/adminhomepage.css"></link>
        <link rel="stylesheet" type="text/css" href="../../css/admin/imageoverlay.css"></link>
		<script type="text/javascript" src="../../js/datetime.js"></script>

	</head>
	<body>

		<!--Time-Date Bar Begin-->
		<div id="date-bar">
			<span id="date">
			</span>
		</div>
		<!--Time-Date Bar End-->

		<!--Logo Begin-->
		<div id="logo-header">
			<div id="logo-wrapper">
				<a id="logo"></a>
			</div>
		</div>
		<!--Logo End-->

		<!--CONTENT-->
		<div id="wrapper">
            <!--Top Menu Bar-->
            <nav class="navbar top-navbar">
                    <a id="home-logo" href="./adminhomepage.php"></a>
                <div class="navbar-header"> 
                    <p class="navbar-brand">HOME</p>
                </div>
                <ul class="nav navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="./adminlogout.php">LOGOUT</a>
                    </li>
                </ul>
            </nav>

            <!--Side Menu Bar-->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a href="./departmentinput/departmenthomepage.php">Department</a>
                        </li>

                        <li>
                            <a href="./classinput/classhomepage.php">Class</a>
                        </li>

                        <li>
                            <a href="./courseinput/coursehomepage.php">Course</a>
                        </li>

                        <li>
                            <a href="./facultyinput/facultyhomepage.php">Faculty</a>
                        </li>

                        <li>
                            <a href="./ttinput/tthomepage.php">TimeTable</a>
                        </li>
                        
                        <li>
                            <a href="./report/reporthomepage.php">Report</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Inner page-->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="content">
                        <div class="grid">
                            <figure class="effect-phoebe">
                                <img src="../../images/department.jpg"/>
                                <figcaption>
                                    <li>
                                        <a href="./departmentinput/departmenthomepage.php">Add Department</a>
                                        <br>
                                        <a href="./departmentinput/departmentmodify/deptmodify.php">Modify Department</a>
                                    </li>  
                                </figcaption>           
                            </figure>
                            <figure class="effect-phoebe">
                                <img src="../../images/class.jpg"/>
                                <figcaption>
                                    <li>
                                        <a href="./classinput/classhomepage.php">Add Class</a>
                                        <br>
                                        <a href="./classinput/classmodify/classmodify.php">Modify Class</a>
                                    </li>
                                </figcaption>           
                            </figure>
                            <figure class="effect-phoebe">
                                <img src="../../images/course.jpg"/>
                                <figcaption>
                                    <li>
                                        <a href="./courseinput/coursehomepage.php">Add Course</a>
                                        <br>
                                        <a href="./courseinput/coursemodify/coursemodify.php">Modify Course</a>
                                    </li>
                                </figcaption>           
                            </figure>
                        </div>
                        <div class="grid">
                            <figure class="effect-phoebe">
                                <img src="../../images/faculty.png"/>
                                <figcaption>
                                    <li>
                                        <a href="./facultyinput/facultyhomepage.php">Add Faculty</a>
                                        <br>
                                        <a href="./facultyinput/facultymodify/facultymodify.php">Modify Faculty</a>
                                    </li>
                                </figcaption>           
                            </figure>
                            <figure class="effect-phoebe">
                                <img src="../../images/timetable.jpg"/>
                                <figcaption>
                                    <li>
                                        <a href="./ttinput/tthomepage.php">Add TimeTable</a>
                                        <br>
                                    </li>
                                </figcaption>           
                            </figure>
                            <figure class="effect-phoebe">
                                <img src="../../images/report.png"/>
                                <figcaption>
                                    <li>
                                        <a href="./report/reporthomepage.php">Generate Report</a>
                                    </li>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div> 
            </div>
        <!-- /. PAGE INNER  -->
    
		<script type="text/javascript">window.onload=dateTime();</script>
	</body>
</html>