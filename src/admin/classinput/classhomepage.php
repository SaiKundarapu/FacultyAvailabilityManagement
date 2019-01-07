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
        <link rel="stylesheet" type="text/css" href="../../../css/admin/classinput/classhomepage.css">
        <script type="text/javascript" src="../../../js/datetime.js"></script>
        <script type="text/javascript" src="../../../js/admin/classinput/deptlistajax.js"></script>
        <script type="text/javascript" src="../../../js/admin/classinput/inputvalidate.js"></script>
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
                    <p class="navbar-brand">ADD CLASS</p>
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
                        <li >
                            <a href="../departmentinput/departmenthomepage.php">Department</a>
                        </li>

                        <li id="active">
                            <a id="active">Class</a>
                        </li>

                        <li>
                            <a href="../courseinput/coursehomepage.php">Course</a>
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
                                        <a id="m1">Add Class</a> 
                                        <a href="./classmodify/classmodify.php" id="m2">Modify Class</a>
                                    </div>
                                </div>
                            </div>
                            <!--MenuBar End-->

                           <!--Department Data Table Begin-->
                            <div id="class-upload-header">
                                <div id="class-upload-wrapper">
                                    <div id="class-upload-table">
                                        <form name="classdata" action="./insertclass.php" onsubmit="return Validate()" method="post">
                                            <fieldset id="class-data">
                                                <legend id="class-data-legend">Add Class Data</legend>
                                                <table id="class-data-table">
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
                                                                <input type="number" id='sections' name="sections" min="1" placeholder="No.of Sections"  onfocus="document.getElementById('msg').innerHTML=''" required>
                                                            </td>
                                                        <tr>
                                                            <td id="button">
                                                                <input type="submit" id="add" name="add" value="Add">
                                                                <input type="reset" id="reset" name="reset" value="Reset">
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