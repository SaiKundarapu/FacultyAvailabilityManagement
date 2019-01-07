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
        <link rel="stylesheet" type="text/css" href="../../../css/admin/departmentinput/departmenthomepage.css">
        <script type="text/javascript" src="../../../js/datetime.js"></script>
        <script type="text/javascript" src="../../../js/admin/departmentinput/inputvalidate.js"></script>
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
                    <p class="navbar-brand">ADD DEPARTMENT</p>
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
                        <li id="active">
                            <a id="active">Department</a>
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
                                        <a id="m1">Add Department</a> 
                                        <a href="./departmentmodify/deptmodify.php" id="m2">Modify Department</a>
                                    </div>
                                </div>
                            </div>
                            <!--MenuBar End-->

                           <!--Department Data Table Begin-->
                            <div id="dept-upload-header">
                                <div id="dept-upload-wrapper">
                                    <div id="dept-upload-table">
                                        <form name="deptdata" action="./insertdepartment.php" onsubmit="return Validate()" method="post">
                                            <fieldset id="dept-data">
                                                <legend id="dept-data-legend">Add Department Data</legend>
                                                <table id="dept-data-table">
                                                    <tbody>
                                                        <tr>
                                                            <td id="error-msg">
                                                                <span id="msg"><?php echo $_SESSION["msg"];unset($_SESSION["msg"]);?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="degree-data">
                                                                <input type="radio" name="degree" value="BTech" checked onfocus="document.getElementById('msg').innerHTML=''"> BTech
                                                                <input type="radio" name="degree" value="MTech" onfocus="document.getElementById('msg').innerHTML=''">MTech
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="id-data">
                                                                <input type="text" id="deptid" name="deptid" placeholder="DepartmentId" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="stream-data-fullform">
                                                                <input type="text" id="fname" name="fname" placeholder="Department Fullform" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="stream-data-shortform">
                                                                <input type="text" id="sname" name="sname" placeholder="Department Shortform" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''"  required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="type-data">
                                                                <input type="checkbox" id='type' name="type" value="Yes" onfocus="document.getElementById('msg').innerHTML=''">Foundational Course Department
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="button">
                                                                <input type="submit" id="add" name="add" value="Add" >
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