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
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/adminhomepage.css"></link>
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/classinput/classmodify.css">
        <link rel="stylesheet" type="text/css" href="../../../../css/admin/classinput/modifyoverlay.css">
        <script type="text/javascript" src="../../../../js/admin/classinput/modifyoverlay.js"></script>
        <script type="text/javascript" src="../../../../js/admin/classinput/inputvalidate.js"></script>
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
                    <p class="navbar-brand">MODIFY CLASS</p>
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
                        <li >
                            <a href="../../departmentinput/departmenthomepage.php">Department</a>
                        </li>

                        <li id="active">
                            <a id="active">Class</a>
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
                                        <a href="../classhomepage.php" id="m1">Add Class</a> 
                                        <a id="m2">Modify Class</a>
                                    </div>
                                </div>
                            </div>
                            <!--MenuBar End-->

                           <!--Class Data Table Begin-->
                            <div id="classmodify-upload-header">
                                <div id="classmodify-upload-wrapper">
                                    <div id="classmodify-upload-table">
                                        <form>
                                            <fieldset id="classmodify-data">
                                                <legend id="classmodify-data-legend">Modify Class Data</legend>
                                                <span id="err-msg"><?php echo $_SESSION["errmsg"];unset($_SESSION["errmsg"]);?></span>
                                                <table id="classmodify-data-table">
                                                    <thead>
                                                        <tr class="row head">

                                                            <th class="column column1"><div id="heading">Degree</div></th>

                                                            <th class="column column2"><div id="heading">DepartmentId</div></th>

                                                            <th class="column column3"><div id="heading">Batch</div></th>

                                                            <th class="column column4"><div id="heading">Year</div></th>

                                                            <th class="column column5"><div id="heading">No.of Sections</div></th>

                                                            <th class="column0"></th>

                                                            <th class="column0"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php
                                                    		$connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
															$query="select * from class;";
															$classdatalist=$connection->query($query);
															while($classdata = $classdatalist->fetch_array()) {
                                                                $innerquery="select shortname from department where degree='$classdata[0]' and deptid='$classdata[1]';";
                                                                $deptname=$connection->query($innerquery)->fetch_object()->shortname;
																echo('<tr class="row">');
															    echo('<td class="column row1">'.$classdata[0].'</td>');
															    echo('<td class="column row2">'.$deptname.'</td>');
															    echo('<td class="column row3">'.$classdata[2].'</td>');
															    echo('<td class="column row4">'.$classdata[3].'</td>');
															    echo('<td class="column row5">'.$classdata[4].'</td>');
															    echo('<td class="column row0"><a id="modify" onclick="modifyoverlay(\''.$classdata[0].'\',\''.$classdata[1].'\',\''.$classdata[2].'\',\''.$classdata[3].'\',\''.$classdata[4].'\')">Edit</a></td>');
															    echo('<td class="column row0"><a id="delete" onclick="return confirm(\'Delete Class\nDegree:'.$classdata[0].'\nDepartment:'.$deptname.'\nBatch:'.$classdata[2].'\nYear:'.$classdata[3].'\')" href="./deleteclass.php?degree='.$classdata[0].'&deptid='.$classdata[1].'&year='.$classdata[3].'">Delete</a></td>');
															}
															$classdatalist->free();
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
    	<div id="class-upload-header">
            <div id="class-upload-wrapper">
                <div id="class-upload-table">
                    <form id="overlaydata" action="./editclass.php" onsubmit="return Validate()" method="post">
                        <fieldset id="class-data">
                            <legend id="class-data-legend">Modify Class</legend>
                            <table id="class-data-table">
                                <tbody id='class-data-body'>
                                    <tr>
                                        <td id="error-msg">
                                            <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="degree-data">
                                            <input type="radio" name="degree" value="BTech" onclick="deptlist(this)" required>BTech
                                            <input type="radio" name="degree" value="MTech" onclick="deptlist(this)" required>MTech
                                        </td>
                                    </tr>
                                    <tr>
                                       <td id="dept-data">
                                        <span id="dept-list">
                                            <select id="dept" name="dept">
                                                <option value="dept" disabled selected>Department</option>
                                            </select>
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="batch-data">
                                            <input type="text" id="batch" name="batch" placeholder="Batch" spellcheck="false" autocomplete="off" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="year-data">
                                            <span id="year-list">
                                                <select id="year" name="year">
                                                    <option value="year" disabled selected hidden>Year</option>
                                                </select>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="sec-data">
                                            <input type="number" name="sections" id="sections" min="1" placeholder="No.of Sections"  onfocus="document.getElementById('msg').innerHTML=''" required>
                                        </td>
                                    <tr>
                                     <tr id="primary-key" style="display:none;">
                                     	<td>
                                        <input type="text" name="pk1" id="pk1">
                                        <input type="text" name="pk2" id="pk2">
                                        <input type="text" name="pk3" id="pk3">
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