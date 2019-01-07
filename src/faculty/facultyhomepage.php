<?php
	session_start();
	if(!isset($_SESSION['faculty']))
	{
		header("location: ./facultylogin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Faculty Availability Report</title>
		<meta http-equiv="Content-Type" content="text/html;charset="UTF-8">
		<meta name="author" content="SAI,ONKAR,RAHUL">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/faculty/facultyhomepage.css"></link>
        <link rel="stylesheet" type="text/css" href="../../css/faculty/imageoverlay.css"></link>
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
                    <a id="home-logo" href="./facultyhomepage.php"></a>
                <div class="navbar-header"> 
                    <p class="navbar-brand">HOME</p>
                </div>
                <ul class="nav navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="./facultylogout.php">LOGOUT</a>
                    </li>
                </ul>
            </nav>

            <!--Side Menu Bar-->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <a href="">View WorkLoad</a>
                        </li>

                        <li>
                            <a href="">Change WorkLoad</a>
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
                                <img src="../../images/view.jpg"/>
                                 <figcaption>
                                    <li>
                                        <a href="./classinput/classhomepage.php">View</a>
                                    </li>
                                </figcaption>         
                            </figure>
                            <figure class="effect-phoebe">
                                <img src="../../images/change.jpg"/>
                                <figcaption>
                                    <li>
                                        <a href="./classinput/classhomepage.php">Change</a>
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