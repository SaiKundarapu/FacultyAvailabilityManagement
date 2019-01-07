 <?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("location: ../../adminlogin.php");
    }
    if(!isset($_SESSION['msg']))
    {
        $_SESSION['msg']='';
    }
    if(!isset($_SESSION['errmsg']))
    {
        $_SESSION['errmsg']='';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Availability Report</title>
        <meta http-equiv="Content-Type" content="text/html;charset="UTF-8">
        <meta name="author" content="SAI,ONKAR,RAHUL">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/adminhomepage.css">
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/departmentinput/departmentmodify.css">
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/departmentinput/modifyoverlay.css">
        <script type="text/javascript" src="../../../../js/admin/departmentinput/modifyoverlay.js"></script>
        <script type="text/javascript" src="../../../../js/admin/departmentinput/inputvalidate.js"></script>
        <script type="text/javascript" src="../../../../js/datetime.js"></script>
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
                    <a id="home-logo" href="../../adminhomepage.php"></a>
                <div class="navbar-header"> 
                    <p class="navbar-brand">MODIFY DEPARTMENT</p>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="../../adminlogout.php">LOGOUT</a>
                    </li>
                </ul>
            </nav>

            <!--Side Menu Bar-->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li id="active">
                            <a id="active">Department</a>
                        </li>

                        <li>
                            <a href="../../classinput/classhomepage.php">Class</a>
                        </li>

                        <li>
                            <a href="../../courseinput/coursehomepage.php">Course</a>
                        </li>

                        <li>
                            <a href="../../facultyinput/facultyhomepage.php">Faculty</a>
                        </li>

                        <li>
                            <a href="../../ttinput/tthomepage.php">TimeTable</a>
                        </li>
                        
                        <li>
                            <a href="../../report/reporthomepage.php">Report</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Inner page-->
            <div id="page-wrapper" >
                <div id="page-inner">
                 <div class="row">
                        <div class="col-md-12">
                            <!--MenuBar Begin-->
                            <div id="menu-header">
                                <div id="menu-wrapper">
                                    <div id="menu">
                                        <a href="../departmenthomepage.php" id="m1">Add Department</a> 
                                        <a id="m2">Modify Department</a>
                                    </div>
                                </div>
                            </div>
                            <!--MenuBar End-->

                           <!--Department Data Table Begin-->
                            <div id="deptmodify-upload-header">
                                <div id="deptmodify-upload-wrapper">
                                    <div id="deptmodify-upload-table">
                                        <form>
                                            <fieldset id="deptmodify-data">
                                                <legend id="deptmodify-data-legend">Modify Department Data</legend>
                                                <span id="err-msg"><?php echo $_SESSION["errmsg"];unset($_SESSION["errmsg"]);?></span>
                                                <table id="deptmodify-data-table">
                                                    <thead>
                                                        <tr class="row head">

                                                            <th class="column column1"><div id="heading">Degree</div></th>

                                                            <th class="column column2"><div id="heading">DepartmentId</div></th>

                                                            <th class="column column3"><div id="heading">FullName</div></th>

                                                            <th class="column column4"><div id="heading">ShortName</div></th>

                                                            <th class="column column5"><div id="heading">Foundational Course Department</div></th>

                                                            <th class="column0"></th>

                                                            <th class="column0"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                    		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
															$query="select * from department;";
															$deptdatalist=$connection->query($query);
															while($deptdata = $deptdatalist->fetch_array()) {
																echo('<tr class="row">');
															    echo('<td class="column row1">'.$deptdata[0].'</td>');
															    echo('<td class="column row2">'.$deptdata[1].'</td>');
															    echo('<td class="column row3">'.$deptdata[2].'</td>');
															    echo('<td class="column row4">'.$deptdata[3].'</td>');
															    echo('<td class="column row5">'.$deptdata[4].'</td>');
															    echo('<td class="column row0"><a id="modify" onclick="modifyoverlay(\''.$deptdata[0].'\',\''.$deptdata[1].'\',\''.$deptdata[2].'\',\''.$deptdata[3].'\',\''.$deptdata[4].'\')">Edit</a></td>');
															    echo('<td class="column row0"><a id="delete" onclick="return confirm(\'Delete Department\nDegree:'.$deptdata[0].'\nDepartmentID:'.$deptdata[1].'\nFullName:'.$deptdata[2].'\nShortName:'.$deptdata[3].'\')" href="./deletedept.php?degree='.$deptdata[0].'&deptid='.$deptdata[1].'">Delete</a></td>');
															}
															$deptdatalist->free();
															$connection->close();
                                                    	 ?>
                                                    </tbody>
                                                </table>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
        </div>
        <!-- /. PAGE INNER  -->
        <div class="overlay" id="overlay1">
        <div class="modify-overlay" id="modify-overlay">
    	<div id="dept-upload-header">
            <div id="dept-upload-wrapper">
                <div id="dept-upload-table">
                    <form id="overlaydata" action="./editdept.php" onsubmit="return Validate()" method="post">
                        <fieldset id="dept-data">
                            <legend id="dept-data-legend">Modify Department</legend>
                            <table id="dept-data-table">
                                <tbody id='dept-data-body'>
                                    <tr>
                                        <td id="error-msg">
                                            <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="degree-data">
                                            <input type="radio" name="degree" value="BTech" onfocus="document.getElementById('msg').innerHTML=''"> BTech
                                            <input type="radio" name="degree" value="MTech" onfocus="document.getElementById('msg').innerHTML=''">MTech
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="id-data">
                                            DepartmentID:<input type="text" id="deptid" name="deptid" placeholder="DepartmentId" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="stream-data-fullform">
                                            Department FullName:<input type="text" id="fname" name="fname" placeholder="Department Fullform" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="stream-data-shortform">
                                            Department ShortName:<input type="text" id="sname" name="sname" placeholder="Department Shortform" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''"  required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="type-data">
                                            <input type="checkbox" id='type' name="type" value="Yes" onfocus="document.getElementById('msg').innerHTML=''">Foundational Course Department
                                        </td>
                                    </tr>
                                     <tr id="primary-key" style="display:none;">
                                     	<td>
                                        <input type="text" name="pk1" id="pk1">
                                        <input type="text" name="pk2" id="pk2">
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td id="button">
                                            <input type="submit" id="modify" name="modify" value="Modify" >
                                            <input type="button" value="Cancel" onclick="removeoverlay()">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    	</div>
    	</div>
        <script type="text/javascript">window.onload=dateTime();</script>
    </body>
</html>