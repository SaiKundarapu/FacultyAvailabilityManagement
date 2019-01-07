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
if(!isset($_SESSION['errmsg']))
{
    $_SESSION['errmsg']='';
}
if(!isset($_SESSION['timetable']))
{
    $_SESSION['timetable']=array();
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
    <link rel="stylesheet" type="text/css" href="../../../css/admin/ttinput/tthomepage.css">
    <script type="text/javascript" src="../../../js/datetime.js"></script>
    <script type="text/javascript" src="../../../js/admin/ttinput/deptlistajax.js"></script>
    <script type="text/javascript" src="../../../js/admin/ttinput/elenolistajax.js"></script>   
    <script type="text/javascript" src="../../../js/admin/ttinput/elefacultylistajax.js"></script>   
    <script type="text/javascript" src="../../../js/admin/ttinput/overlay.js"></script>
    <script type="text/javascript" src="../../../js/admin/ttinput/coursefacultylistajax.js"></script>
    <script type="text/javascript" src="../../../js/admin/ttinput/insertcourse.js"></script>
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
                <p class="navbar-brand">ADD TIMETABLE</p>
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

                    <li>
                        <a href="../facultyinput/facultyhomepage.php">Faculty</a>
                    </li>

                    <li id="active">
                        <a id="active">TimeTable</a>
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
                                <a id="m1">Add TimeTable</a> 
                            </div>
                        </div>
                    </div>
                    <!--MenuBar End-->

                    <!--Faculty Data Table Begin-->
                    <div id="tt-upload-header">
                        <div id="tt-upload-wrapper">
                            <div id="tt-upload-table">
                                <form name="ttdata" action="./inserttimetable.php" method="post">
                                    <fieldset id="tt-data">
                                        <legend id="tt-data-legend"> TimeTable </legend>
                                        <div id="error-msg">
                                            <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                        </div>
                                        <table id="tt-input-data">
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

                                                    <td id="sec-data">
                                                        <span id="sec-list">
                                                            <select id="sec" onfocus="document.getElementById('msg').innerHTML=''" name="sec">
                                                                <option value="sec" disabled selected>Section</option>
                                                            </select>
                                                        </span>
                                                    </td>

                                                    <td id="sem-data">
                                                        <input id="1" type="radio" name="sem" value=1 required><span id="sem1">SEM-1</span>
                                                        <input id="2" type="radio" name="sem" value=2 required><span id="sem2">SEM-2</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input id="button1" type="button" value="Generate TimeTable" onclick="showtimetable()">
                                        <hr>
                                        <table id="tt-data-table">
                                            <thead>
                                                <tr class="row head">
                                                    <th class="column0"></th>

                                                    <th class="column column1"><div id="period-no">Period-1</div><div id="text-timings1"><span id="text-start-time1">09:05</span>-<span id="text-end-time1">09:55</span></div></th>

                                                    <th class="column column2"><div id="period-no">Period-2</div><div id="text-timings2"><span id="text-start-time2">09:55</span>-<span id="text-end-time2">10:45</span></div></th>

                                                    <th class="column0"></th>

                                                    <th class="column column3"><div id="period-no">Period-3</div><div id="text-timings3"><span id="text-start-time3">10:55</span>-<span id="text-end-time3">11:45</span></div></th>

                                                    <th class="column column4"><div id="period-no">Period-4</div><div id="text-timings4"><span id="text-start-time4">11:45</span>-<span id="text-end-time4">12:35</span></div></th>

                                                    <th class="column0"></th>

                                                    <th class="column column5"><div id="period-no">Period-5</div><div id="text-timings5"><span id="text-start-time5">13:25</span>-<span id="text-end-time5">14:15</span></div></th>

                                                        <th class="column column6"><div id="period-no">Period-6</div><div id="text-timings6"><span id="text-start-time6">14:15</span>-<span id="text-end-time6">15:05</span></div></th>

                                                        <th class="column column7"><div id="period-no">Period-7</div><div id="text-timings7"><span id="text-start-time7">14:15</span>-<span id="text-end-time7">15:05</span></div></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="row">
                                                        <td class="column column0" id="Monday0">Monday</td>
                                                        <td class="column column1" id="Monday1" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column2" id="Monday2" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column0" id="Monday0" rowspan="5"><div id="break">BREAK</div></td>
                                                        <td class="column column3" id="Monday3" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column4" id="Monday4" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column0" id="Monday0" rowspan="5"><div id="break">LUNCH</div></td>
                                                        <td class="column column5" id="Monday5" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column6" id="Monday6" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column7" id="Monday7" onclick="periodoverlay(this)">--</td>
                                                    </tr>

                                                    <tr class="row">
                                                        <td class="column column0" id="Tuesday0">Tuesday</td>
                                                        <td class="column column1" id="Tuesday1" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column2" id="Tuesday2" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column3" id="Tuesday3" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column4" id="Tuesday4" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column5" id="Tuesday5" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column6" id="Tuesday6" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column7" id="Tuesday7" onclick="periodoverlay(this)">--</td>
                                                    </tr>

                                                    <tr class="row">
                                                        <td class="column column0" id="Wednesday0">Wednesday</td>
                                                        <td class="column column1" id="Wednesday1" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column2" id="Wednesday2" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column3" id="Wednesday3" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column4" id="Wednesday4" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column5" id="Wednesday5" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column6" id="Wednesday6" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column7" id="Wednesday7" onclick="periodoverlay(this)">--</td>
                                                    </tr>

                                                    <tr class="row">
                                                        <td class="column column0" id="Thursday0">Thursday</td>
                                                        <td class="column column1" id="Thursday1" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column2" id="Thursday2" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column3" id="Thursday3" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column4" id="Thursday4" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column5" id="Thursday5" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column6" id="Thursday6" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column7" id="Thursday7" onclick="periodoverlay(this)">--</td>
                                                    </tr>

                                                    <tr class="row">
                                                        <td class="column column0" id="Friday0">Friday</td>
                                                        <td class="column column1" id="Friday1" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column2" id="Friday2" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column3" id="Friday3" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column4" id="Friday4" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column5" id="Friday5" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column6" id="Friday6" onclick="periodoverlay(this)">--</td>
                                                        <td class="column column7" id="Friday7" onclick="periodoverlay(this)">--</td>
                                                    </tr>
                                                    <tr class='row'>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="submit" id="add" name="add" value="Add"></td>
                                                        <td><input type="reset" id="reset" name="reset" value="Reset"></td>
                                                        <td></td>
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

        <div class="overlay" id="overlay1">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="period-overlay" id="period-overlay">
            <form id="overlaydata">
                <fieldset id="tt-data">
                    <legend id="tt-data-legend"><span id="week"></span>-Period <span id="period"></span></legend>
                    <div id="error-msg">
                        <span id="overlay-msg"><?php echo $_SESSION["errmsg"];unset($_SESSION["errmsg"]);?></span>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td></td>
                                <td id="ele-data">
                                   <input type="radio" name="ele" value="1" checked onclick="hide(this)">Non-Elective
                                   <input type="radio" name="ele" value="2" onclick="hide(this)">Elective
                                   <input type="radio" name="ele" value="3" onclick="hide(this)">Free Period
                               </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="class-type">
                                    <input type="radio" name="lab" value="1" checked onclick="coursefacultylist(this)">Lab
                                    <input type="radio" name="lab" value="2" onclick="coursefacultylist(this)">Lecture
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="ele-type-data">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="ele-no-data">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="course-data">
                                    <div id="course-heading">Course-Faculty List</div>
                                    <div id="course-list"></div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="OK" onclick="insertcourse()"></td>
                                <td></td>
                                <td><input type="button" value="CANCEL" onclick="removeoverlay()"></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </form>
        </div>
        <script type="text/javascript">window.onload=dateTime();</script>
    </body>
    </html>