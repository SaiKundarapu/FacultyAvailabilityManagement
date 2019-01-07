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
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/courseinput/coursemodify.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/courseinput/modifyoverlay.css">
    <script type="text/javascript" src="../../../../js/admin/courseinput/modifyoverlay.js"></script>
    <script type="text/javascript" src="../../../../js/admin/courseinput/inputvalidate.js"></script>
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
                <p class="navbar-brand">MODIFY COURSE</p>
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

                    <li >
                        <a href="../../classinput/classhomepage.php">Class</a>
                    </li>

                    <li id="active">
                        <a id="active">Course</a>
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
                                <a href="../coursehomepage.php" id="m1">Add Course</a> 
                                <a id="m2">Modify Course</a>
                            </div>
                        </div>
                    </div>
                    <!--MenuBar End-->

                    <!--Class Data Table Begin-->
                    <div id="coursemodify-upload-header">
                        <div id="coursemodify-upload-wrapper">
                            <div id="coursemodify-upload-table">
                                <form>
                                    <fieldset id="coursemodify-data">
                                        <legend id="coursemodify-data-legend">Modify Course Data</legend>
                                        <span id="err-msg"><?php echo $_SESSION["errmsg"];unset($_SESSION["errmsg"]);?></span>
                                        <table id="coursemodify-data-table">
                                            <thead>
                                                <tr class="row head">

                                                    <th class="column column1"><div id="heading">Degree</div></th>

                                                    <th class="column column2"><div id="heading">Department</div></th>

                                                    <th class="column column3"><div id="heading">Year</div></th>

                                                    <th class="column column4"><div id="heading">Semister</div></th>

                                                    <th class="column column5"><div id="heading">Elective</div></th>

                                                    <th class="column column6"><div id="heading">Elective-Type</div></th>

                                                    <th class="column column7"><div id="heading">Elective-No</div></th>

                                                    <th class="column column8"><div id="heading">CourseId</div></th>

                                                    <th class="column column9"><div id="heading">Course FullName</div></th>

                                                    <th class="column column10"><div id="heading">Course ShortName</div></th>

                                                    <th class="column column11"><div id="heading">Lab</div></th>

                                                    <th class="column column12"><div id="heading">Lecture</div></th>

                                                    <th class="column0"></th>

                                                    <th class="column0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                               $connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
                                               $query="select * from course;";
                                               $coursedatalist=$connection->query($query);
                                               while($coursedata = $coursedatalist->fetch_array()) {
                                                   $deptnamequery="select shortname from department where degree='$coursedata[0]' and deptid='$coursedata[1]';";
                                                   $deptname=$connection->query($deptnamequery)->fetch_object()->shortname;
                                                   echo('<tr class="row">');
                                                   echo('<td class="column row1">'.$coursedata[0].'</td>');
                                                   echo('<td class="column row2">'.$deptname.'</td>');
                                                   echo('<td class="column row3">'.$coursedata[2].'</td>');
                                                   echo('<td class="column row4">'.$coursedata[3].'</td>');
                                                   echo('<td class="column row5">'.$coursedata[4].'</td>');
                                                   if($coursedata[4]=="NO")
                                                   {
                                                    echo('<td class="column row6">--</td>');
                                                    echo('<td class="column row7">--</td>');
                                                }
                                                else
                                                {
                                                    echo('<td class="column row6">'.$coursedata[5].'</td>');
                                                    echo('<td class="column row7">'.$coursedata[6].'</td>');
                                                }
                                                echo('<td class="column row8">'.$coursedata[7].'</td>');
                                                echo('<td class="column row9">'.$coursedata[8].'</td>');
                                                echo('<td class="column row10">'.$coursedata[9].'</td>');
                                                echo('<td class="column row11">'.$coursedata[10].'</td>');
                                                echo('<td class="column row12">'.$coursedata[11].'</td>');
                                                echo('<td class="column row0"><a id="modify" onclick="modifyoverlay(\''.$coursedata[0].'\',\''.$coursedata[1].'\',\''.$coursedata[2].'\',\''.$coursedata[3].'\',\''.$coursedata[4].'\',\''.$coursedata[5].'\',\''.$coursedata[6].'\',\''.$coursedata[7].'\',\''.$coursedata[8].'\',\''.$coursedata[9].'\',\''.$coursedata[10].'\',\''.$coursedata[11].'\')">Edit</a></td>');
                                                echo('<td class="column row0"><a id="delete" onclick="return confirm(\'Delete Course\nDegree:'.$coursedata[0].'\nDepartment:'.$deptname.'\nYear:'.$coursedata[2].'\nSem:'.$coursedata[3].'\nElective:'.$coursedata[4].'\nCourseId:'.$coursedata[7].'\nCourse FullName:'.$coursedata[8].'\nCourse ShortName:'.$coursedata[9].'\')" href="./deletecourse.php?degree='.$coursedata[0].'&deptid='.$coursedata[1].'&year='.$coursedata[2].'&courseid='.$coursedata[7].'">Delete</a></td>');
                                            }
                                            $coursedatalist->free();
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
    	<div id="course-upload-header">
            <div id="course-upload-wrapper">
                <div id="course-upload-table">
                    <form id="overlaydata" action="./editcourse.php" onsubmit="return Validate()" method="post">
                        <fieldset id="course-data">
                            <legend id="course-data-legend">Modify Course</legend>
                            <table id="course-data-table">
                                <tbody id='course-data-body'>
                                    <tr>
                                        <td id="error-msg">
                                            <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="degree-data">
                                            <input type="radio" name="degree" value="BTech" onclick="deptlist(this)">BTech
                                            <input type="radio" name="degree" value="MTech" onclick="deptlist(this)">MTech
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
                                    <td id="year-data">
                                        <span id="year-list">
                                            <select id="year" name="year">
                                                <option value="year" disabled selected hidden>Year</option>
                                            </select>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="sem-data">
                                        <input type="radio" name="sem" value="1">SEM-1
                                        <input type="radio" name="sem" value="2">SEM-2
                                    </td>
                                </tr>

                                <tr>
                                    <td id="ele-data">
                                        <input type="radio" name="ele" value="1" onclick="hide(this)">Non-Elective
                                        <input type="radio" name="ele" value="2" onclick="hide(this)">Elective
                                    </td>
                                </tr>

                                <tr>
                                    <td id="ele-type-data">
                                    </td>
                                </tr>

                                <tr>
                                    <td id="ele-no-data">
                                    </td>
                                </tr>

                                <tr>
                                    <td id="id-data">
                                     <input type="text" id="courseid" name="courseid" placeholder="CourseId" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                 </td>
                             </tr>

                             <tr>
                                <td id="subject-full-data">
                                    <input type="text" id="subfull" name="subfull" placeholder="Course Full Form" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                </td>
                            </tr>
                            <tr>
                                <td id="subject-short-data">
                                    <input type="text" id="subshort" name="subshort" placeholder="Course Short Form" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                </td>
                            </tr>
                            <tr>
                                <td id="type-data">
                                    <select id="type" name="lab">
                                        <option value="0" disabled selected hidden>Lab/Lecture</option>
                                        <option value="1">Lab</option>
                                        <option value="2">Lecture</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="primary-key" style="display:none;">
                              <td>
                                <input type="text" name="pk1" id="pk1">
                                <input type="text" name="pk2" id="pk2">
                                <input type="text" name="pk3" id="pk3">
                                <input type="text" name="pk4" id="pk4">
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