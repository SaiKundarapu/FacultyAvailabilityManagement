<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header("location: ../adminlogin.php");
}
if(!isset($_SESSION['msg']))
{
    $_SESSION['msg']='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faculty Availability Report</title>
    <meta http-equiv="Content-Type" content="text/html;charset="UTF-8">
    <meta name="author" content="SAI,ONKAR,RAHUL">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/admin/adminhomepage.css"></link>
    <link rel="stylesheet" type="text/css" href="../../../css/admin/facultyinput/facultyhomepage.css">
    <script type="text/javascript" src="../../../js/datetime.js"></script>
    <script type="text/javascript" src="../../../js/admin/facultyinput/deptlistajax.js"></script>
    <script type="text/javascript" src="../../../js/admin/facultyinput/courselistajax.js"></script>
    <script type="text/javascript" src="../../../js/admin/facultyinput/inputvalidate.js"></script>
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
            <a id="home-logo" href="../adminhomepage.php"></a>
            <div class="navbar-header"> 
                <p class="navbar-brand">ADD FACULTY</p>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="../adminlogout.php">LOGOUT</a>
                </li>
            </ul>
        </nav>

        <!--Side Menu Bar-->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../departmentinput/departmenthomepage.php">Department</a>
                    </li>

                    <li>
                        <a href="../classinput/classhomepage.php">Class</a>
                    </li>

                    <li>
                        <a href="../courseinput/coursehomepage.php">Course</a>
                    </li>

                    <li id="active">
                        <a id="active">Faculty</a>
                    </li>

                    <li>
                        <a href="../ttinput/tthomepage.php">TimeTable</a>
                    </li>

                    <li>
                        <a href="../report/reporthomepage.php">Report</a>
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
                                <a id="m1">Add Faculty</a> 
                                <a href="./facultymodify/facultymodify.php" id="m2">Modify Faculty</a>
                            </div>
                        </div>
                    </div>
                    <!--MenuBar End-->

                    <!--Faculty Data Table Begin-->
                    <div id="faculty-upload-header">
                        <div id="faculty-upload-wrapper">
                            <div id="faculty-upload-table">
                                <form name="facultydata" action="./insertfaculty.php" onsubmit="return Validate()" method="post">
                                    <fieldset id="faculty-data">
                                        <legend id="faculty-data-legend">Add Faculty Data</legend>
                                        <table id="faculty-data-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td id="error-msg">
                                                        <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                                    </td>
                                                    <td>
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
                                                <tr>
                                                    <td></td>
                                                    <td id="button">
                                                        <input type="submit" id="add" name="add" value="Add">
                                                        <input type="reset" id="reset" name="reset" value="Reset">
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
        </div>
    </div>
    <!-- /. PAGE INNER  -->
    <script type="text/javascript">window.onload=dateTime();</script>
</body>
</html>