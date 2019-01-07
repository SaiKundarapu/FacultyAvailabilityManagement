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
        <link rel="stylesheet" type="text/css" href="../../../css/admin/courseinput/coursehomepage.css">
        <script type="text/javascript" src="../../../js/datetime.js"></script>
        <script type="text/javascript" src="../../../js/admin/courseinput/deptlistajax.js"></script>
        <script type="text/javascript" src="../../../js/admin/courseinput/inputvalidate.js"></script>
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
                    <p class="navbar-brand">ADD COURSE</p>
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

                        <li id="active">
                            <a id="active">Course</a>
                        </li>

                        <li>
                            <a href="../facultyinput/facultyhomepage.php">Faculty</a>
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
                                        <a id="m1">Add Course</a> 
                                        <a href="./coursemodify/coursemodify.php" id="m2">Modify Course</a>
                                    </div>
                                </div>
                            </div>
                            <!--MenuBar End-->

                           <!--Course Data Table Begin-->
                            <div id="course-upload-header">
                                <div id="course-upload-wrapper">
                                    <div id="course-upload-table">
                                        <form name="deptdata" action="./insertcourse.php" onsubmit="return Validate()" method="post">
                                            <fieldset id="course-data">
                                                <legend id="course-data-legend">Add Course Data</legend>
                                                <table id="course-data-table">
                                                    <tbody>
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
                                                                <input type="radio" name="sem" value="1" required>SEM-1
                                                                <input type="radio" name="sem" value="2" required>SEM-2
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td id="ele-data">
                                                                <input type="radio" name="ele" value="1" checked onclick="hide(this)">Non-Elective
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
                                                        <tr>
                                                            <td id="button">
                                                                <input type="submit" id="add" name="add" value="Add">
                                                                <input type="reset" id="reset" name="Reset" value="Reset">
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
                </div>
            </div>
        <!-- /. PAGE INNER  -->
    
        <script type="text/javascript">window.onload=dateTime();</script>
    </body>
</html>