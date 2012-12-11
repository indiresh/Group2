<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
 
//connect to the database so we can check, edit, or insert data to our users table
$con = mysql_connect('localhost', 'rboonen', 'rboonen') or die(mysql_error());
$db = mysql_select_db('rboonen', $con) or die(mysql_error());
 
//include out functions file giving us access to the protect() function
include "./functions.php";
 
?>

<html>
<head>
<title>Pizza Box</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- Save for Web Styles (WEBSITE_PHOTOSHOP.psd) -->
<style type="text/css">
<!--
body {
	background-attachment: scroll;
	background-image: url(images/loginbg.jpg);
	background-repeat: no-repeat;
}

-->
</style>
<link href="CSS/pizza.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="5">
<!-- End Save for Web Styles -->
</head>
<body style="background-color:#FFFFFF; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">


<!-- Save for Web Slices (WEBSITE_PHOTOSHOP.psd) -->
<div id="Table_01">
	<div id="Home-01">
    <table width="120" border="0" cellspacing="0" cellpadding="0" align="right">
  		<tr>
    	<td align="center"><a href="login.php">Sign In</a> | </td>
    	<td align="center"><a href="register.php">Register</a></td>
  		</tr>
	  </table>
  </div>
	<div id="Login-02">
		<img src="images/Login_02.jpg" width="511" height="173" alt="">
	</div>
		<div id="Home-03"><a href="index.php"><img src="images/about_03.jpg" width="183" height="40" longdesc="index.html"></a></div>
	<div id="Home-04"><a href="media.php"><img src="images/mediabutton.jpg" width="183" height="40"></a></div>
    <div id="Home-16"><a href="about.php"><img src="images/aboutbutton.jpg" width="183" height="40"></a></div>
	<div id="Login-05">
		<img src="images/Login_05.jpg" width="183" height="91" alt="">
	</div>
	<div id="Login-06">
		<img src="images/Login_06.jpg" width="132" height="42" alt="">
	</div>


	<div id="Login-07">
<div>
<form>
<frameset cols="50%,50%">
  <frame src="Shopping Cart/menulist.php">
  <frame src="Shopping Cart/current_order.php">

</frameset>
</form>
</div>
</div>
	<div id="Login-08"></div>
	<div id="Login-09"></div>
	<div id="Login-10">
		<img src="images/Login_10.jpg" width="378" height="252" alt="">
	</div>
	<div id="Login-11">
		<img src="images/Login_11.jpg" width="50" height="756" alt="">
	</div>
	<div id="Login-12">
		<img src="images/Login_12.jpg" width="378" height="55" alt="">
	</div>
	<div id="Login-13"> <a href="http://goo.gl/maps/GrLBF"><img src="images/Login_13.jpg" width="378" height="251" alt=""></a>
	</div>
	<div id="Login-14"></div>
	<div id="Login-15"></div>
</div>
<!-- End Save for Web Slices -->
</body>
</html>