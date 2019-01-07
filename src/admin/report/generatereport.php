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
    <link rel="stylesheet" type="text/css" href="../../../../css/admin/adminhomepage.css"><
    <link rel="stylesheet" type="text/css" href="../../../css/admin/report/reporthomepage.css">
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
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $connection = new mysqli('localhost', 'sai', 'sai162', 'cvr_info');
                                                    $query="select * from faculty ORDER BY RAND() LIMIT 3;";
                                                    $facultydatalist=$connection->query($query);
                                                    while($facultydata = $facultydatalist->fetch_array()) {
                                                     $deptnamequery="select shortname from department where degree='$facultydata[8]' and deptid='$facultydata[9]';";
                                                     $deptname=$connection->query($deptnamequery)->fetch_object()->shortname;
                                                     
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
</div>
</body>
</html>