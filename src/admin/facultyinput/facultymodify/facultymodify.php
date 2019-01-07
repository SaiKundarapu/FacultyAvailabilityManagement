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
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/facultyinput/facultymodify.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/facultyinput/modifyoverlay.css">
    <script type="text/javascript" src="../../../../js/datetime.js"></script>
    <script type="text/javascript" src="../../../../js/admin/facultyinput/modifyoverlay.js"></script>
    <script type="text/javascript" src="../../../../js/admin/facultyinput/deptlistajax.js"></script>
    <script type="text/javascript" src="../../../../js/admin/facultyinput/courselistajax.js"></script>
    <script type="text/javascript" src="../../../../js/admin/facultyinput/inputvalidate.js"></script>
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
                <p class="navbar-brand">MODIFY FACULTY</p>
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

                    <li>
                        <a href="../../courseinput/coursehomepage.php">Course</a>
                    </li>

                    <li id="active">
                        <a id="active">Faculty</a>
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
                                    <a href="../facultyhomepage.php" id="m1">Add Faculty</a> 
                                    <a id="m2">Modify Faculty</a>
                                </div>
                            </div>
                        </div>

                        <!--Faculty Data Table Begin-->
                        <div id="facultymodify-upload-header">
                            <div id="facultymodify-upload-wrapper">
                                <div id="facultymodify-upload-table">
                                    <form>
                                        <fieldset id="facultymodify-data">
                                            <legend id="facultymodify-data-legend">Modify Faculty Data</legend>
                                            <span id="err-msg"><?php echo $_SESSION["errmsg"];unset($_SESSION["errmsg"]);?></span>
                                            <table id="facultymodify-data-table">
                                                <thead>
                                                    <tr class="row head">

                                                        <th class="column column1"><div id="heading">First Name</div></th>

                                                        <th class="column column2"><div id="heading">Middle Name</div></th>

                                                        <th class="column column3"><div id="heading">Last Name</div></th>

                                                        <th class="column column4"><div id="heading">Gender</div></th>

                                                        <th class="column column5"><div id="heading">Designation</div></th>

                                                        <th class="column column6"><div id="heading">FacultyID</div></th>

                                                        <th class="column column7"><div id="heading">EmailID</div></th>

                                                        <th class="column column8"><div id="heading">Phone Number</div></th>

                                                        <th class="column column9"><div id="heading">Degree</div></th>

                                                        <th class="column column10"><div id="heading">Department</div></th>

                                                        <th class="column column11"><div id="heading">Courses</div></th>

                                                        <th class="column0"></th>

                                                        <th class="column0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
                                                    $query="select * from faculty;";
                                                    $facultydatalist=$connection->query($query);
                                                    while($facultydata = $facultydatalist->fetch_array()) {
                                                     $courseidquery="select courseid from facultycourse where facultyid='$facultydata[5]';";
                                                     $deptnamequery="select shortname from department where degree='$facultydata[8]' and deptid='$facultydata[9]';";
                                                     $deptname=$connection->query($deptnamequery)->fetch_object()->shortname;
                                                     $courses='';
                                                     $courseidarray=array();
                                                     echo('<tr class="row">');
                                                     echo('<td class="column row1">'.$facultydata[0].'</td>');
                                                     echo('<td class="column row2">'.$facultydata[1].'</td>');
                                                     echo('<td class="column row3">'.$facultydata[2].'</td>');
                                                     echo('<td class="column row4">'.$facultydata[3].'</td>');
                                                     echo('<td class="column row5">'.$facultydata[4].'</td>');
                                                     echo('<td class="column row6">'.$facultydata[5].'</td>');
                                                     echo('<td class="column row7">'.$facultydata[6].'</td>');
                                                     echo('<td class="column row8">'.$facultydata[7].'</td>');
                                                     echo('<td class="column row9">'.$facultydata[8].'</td>');
                                                     echo('<td class="column row10">'.$deptname.'</td>');
                                                     $courseidresult=$connection->query($courseidquery);
                                                     while($courseid=$courseidresult->fetch_object())
                                                     {
                                                        $courseid=$courseid->courseid;
                                                        $courseidarray[]=$courseid;
                                                        $coursenamequery="select coursefullname,courseshortname from course where courseid='$courseid';";
                                                        $coursenameresult=$connection->query($coursenamequery)->fetch_object();
                                                        $coursefullname=$coursenameresult->coursefullname;
                                                        $courseshortname=$coursenameresult->courseshortname;
                                                        $courses=$courses.$coursefullname."(".$courseshortname.")\n";
                                                    }
                                                    echo('<td class="column row11">'.$courses.'</td>');
                                                    echo('<td class="column row0"><a id="modify" onclick=\'modifyoverlay("'.$facultydata[0].'","'.$facultydata[1].'","'.$facultydata[2].'","'.$facultydata[3].'","'.$facultydata[4].'","'.$facultydata[5].'","'.$facultydata[6].'","'.$facultydata[7].'","'.$facultydata[8].'","'.$facultydata[9].'",'.json_encode($courseidarray).')\'>Edit</a></td>');
                                                    echo('<td class="column row0"><a id="delete" onclick="return confirm(\'Delete Faculty\nFirst Name:'.$facultydata[0].'\nFacultyId:'.$facultydata[5].'\')" href="./deletefaculty.php?degree='.$facultydata[8].'&deptid='.$facultydata[9].'&facultyid='.$facultydata[5].'">Delete</a></td>');
                                                }
                                                $facultydatalist->free();
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
            <div id="faculty-upload-header">
                <div id="faculty-upload-wrapper">
                    <div id="faculty-upload-table">
                        <form id="overlaydata" action="./editfaculty.php" onsubmit="return Validate()" method="post">
                            <fieldset id="faculty-data">
                                <legend id="faculty-data-legend">Modify Faculty</legend>
                                <table id="faculty-data-table">
                                    <tbody id='faculty-data-body'>
                                        <tr>
                                            <td id="error-msg">
                                                <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="name-data1">
                                                <input type="text" id="fname" name="fname" placeholder="First Name" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                            </td>
                                            <td id="name-data2">
                                                <input type="text" id="mname" name="mname" placeholder="Middle Name(optional)" spellcheck="false" onfocus="document.getElementById('msg').innerHTML=''" autocomplete="off">
                                            </td>
                                            <td id="name-data3">
                                                <input type="text" id="lname" name="lname" placeholder="Last Name(optional)" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="gender-data">
                                                <select id="gender" name="gender" onfocus="document.getElementById('msg').innerHTML=''">
                                                    <option disabled selected hidden value="gender">Gender</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td id="title-data">
                                                <select id="title" name="title" onfocus="document.getElementById('msg').innerHTML=''">
                                                    <option disabled selected hidden value="title">Designation</option>
                                                    <option value="PROFESSOR">Professor</option>
                                                    <option value="ASSOCIATE PROFESSOR">Associate Professor</option>
                                                    <option value="ASSISTANT PROFESSOR">Assistant Professor</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="id-data">
                                                <input type="text" id="id" name="id" placeholder="FacultyId" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                            </td>
                                            <td id="email-data">
                                                <input type="text" id="email" name="email" placeholder="Email Id" spellcheck="false" autocomplete="off" required onfocus="document.getElementById('msg').innerHTML=''">
                                            </td>
                                            <td id="phno-data">
                                                <input type="text" id="phno" name="phno" placeholder="Phone Number" spellcheck="false" autocomplete="off" required onfocus="document.getElementById('msg').innerHTML=''">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="degree-data">
                                                <input type="radio" name="degree" value="BTech" onclick="deptlist(this)" required>BTech
                                                <input type="radio" name="degree" value="MTech" onclick="deptlist(this)" required>MTech
                                            </td>
                                            <td></td>
                                            <td id="dept-data">
                                                <span id="dept-list">
                                                    <select id="dept" name="dept">
                                                        <option value="dept" disabled selected>Department</option>
                                                    </select>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td id="course-data">
                                                <div id="course-heading">course-list</div>
                                                <div id="course-list">
                                                    **Select the Department**
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr id="primary-key" style="display:none;">
                                            <td>
                                                <input type="text" name="pk1" id="pk1">
                                                <input type="text" name="pk2" id="pk2">
                                                <input type="text" name="pk3" id="pk3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td id="button">
                                                <input type="submit" id="modify" name="modify" value="Modify" >
                                                <input type="button" value="Cancel" onclick="removeoverlay()">
                                            </td>
                                            <td></td>
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