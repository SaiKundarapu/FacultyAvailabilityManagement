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
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/adminhomepage.css">
    <link rel="stylesheet" type="text/css" href="../../../css/admin/report/reporthomepage.css"></link>
    <script type="text/javascript" src="../../../../js/datetime.js"></script>
    <script type="text/javascript" src="../../../js/admin/ttinput/deptlistajax.js"></script>
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
                <p class="navbar-brand">REPORT</p>
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

                    <li >
                        <a href="../facultyinput/facultyhomepage.php">Faculty</a>
                    </li>

                    <li>
                        <a href="../ttinput/tthomepage.php">TimeTable</a>
                    </li>

                    <li id="active">
                        <a id="active">Report</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Faculty Data Table Begin-->
        <!-- Inner page-->
            <div id="page-wrapper" >
                <div id="page-inner">
                 <div class="row">
                        <div class="col-md-12">
                    <div id="report-upload-header">
                        <div id="report-upload-wrapper">
                            <div id="report-upload-table">
                                <form name="reportdata" action="./generatereport.php" method="post">
                                    <fieldset id="report-data">
                                        <legend id="report-data-legend">Generate Report</legend>
                                        <table id="report-data-table">
                                            <tbody>
                                                 <tr>
                                                    <td id="degree-data">
                                                        <input id="btech" type="radio" name="degree" value="BTech" onclick="deptlist(this)" required><span id='bt'>BTech</span>
                                                        <input id="mtech" type="radio" name="degree" value="MTech" onclick="deptlist(this)" required><span id='mt'>MTech</span>
                                                    </td>

                                                    <td id="dept-data">
                                                        <span id="dept-list">
                                                            <select id="dept" name="dept">
                                                                <option value="dept" disabled selected>Department</option>
                                                            </select>
                                                        </span>
                                                    </td>

                                                    <td id="year-data">
                                                        <span id="year-list">
                                                            <select id="year" name="year">
                                                                <option value="year" disabled selected hidden>Year</option>
                                                            </select>
                                                        </span>
                                                    </td>

                                                    <td id="sem-data">
                                                        <input id="1" type="radio" name="sem" value=1 required><span id="sem1">SEM-1</span>
                                                        <input id="2" type="radio" name="sem" value=2 required><span id="sem2">SEM-2</span>
                                                    </td>
                                                </tr>
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
                                                    <td></td>
                                                    <td id="button">
                                                        <input type="submit" id="add" name="add" value="Generate">
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