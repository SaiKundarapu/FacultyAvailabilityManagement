<?php
	include('adminloginverify.php'); // Includes Login Script

	if(isset($_SESSION['admin']))
	{
		header("location: ./adminhomepage.php");
	}
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Faculty Availability Report</title>
		<meta http-equiv="Content-Type" content="text/html;charset="UTF-8">
		<meta name="author" content="SAI,ONKAR,RAHUL">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../../css/homepage.css"></link>
		<link rel="stylesheet" type="text/css" href="../../css/admin/adminlogin.css"></link>
		<script type="text/javascript" src="../../js/datetime.js"></script>
		<script type="text/javascript" src="../../js/formvalidation.js"></script>
	</head>
	<body>
		<!--Time-Date Bar Begin-->
		<div id="date-bar">
			<span id="date"></span>
		</div>
		<!--Time-Date Bar End-->

		<!--Logo Begin-->
		<div id="logo-header">
			<div id="logo-wrapper">
				<a href="../../index.html" id="logo"></a>
			</div>
		</div>
		<!--Logo End-->

		<!--MenuBar Begin-->
		<div id="menu-header">
			<div id="menu-wrapper">
				<div id="menu">
					<a href="../../index.html" id="m1">Home</a>
					<a id="m2">Administrator</a> 
					<a href="../faculty/facultyLogin.php" id="m3">Faculty</a>
				</div>
			</div>
		</div>
		<!--MenuBar End-->

		<!--LoginFrame Begin-->
		<div id="login-header">
			<div id="login-wrapper">
				<div id="login">
					<form name="login-form" action="" onsubmit="return Validate()" method="post">
						<fieldset id="admin-login">
							<legend id="admin-login-legend">Administrator Login</legend>
							<table id="login-form-table">
								<tbody>
									<tr>
										<td id="error-msg">
											<span id="msg"><?php echo $error;?></span>
										</td>
									</tr>
									<tr>
										<td id="username-data">
											<input type="text" id="username" name="username" placeholder="Phone Number or Email Id" spellcheck="false" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
										</td>
									</tr>
									<tr>
										<td id="password-data">
											<input type="password" name="password" hidden="true">
											<input type="password" id="password" name="password" placeholder="Password" autocomplete="off" onfocus="document.getElementById('msg').innerHTML=''" required>
										</td>
									</tr>
									<tr>
										<td id="submit-button">
											<input type="submit" id="submit" name="login" value="Login">
										</td>
									</tr>
								</tbody>
							</table>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<!--LoginFrame End-->

		<script type="text/javascript">window.onload=dateTime();</script>
	</body>
</html>