<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
ob_start();
 
//connect to the database so we can check, edit, or insert data to our users table
$con = mysql_connect('localhost', 'rboonen', 'rboonen') or die(mysql_error());
$db = mysql_select_db('rboonen', $con) or die(mysql_error());
 
//include out functions file giving us access to the protect() function made earlier
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
<!-- End Save for Web Styles -->
</head>
<body style="background-color:#FFFFFF; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">
<?php
 
		//If the user has submitted the form
		if($_POST['submit']){
			//protect the posted value then store them to variables
			$username = protect($_POST['username']);
			$password = protect($_POST['password']);
 
			//Check if the username or password boxes were not filled in
			if(!$username || !$password){
				//if not display an error message
				echo "<center>You need to fill in a <b>Username</b> and a <b>Password</b>!</center>";
			}else{
				//if the were continue checking
 
				//select all rows from the table where the username matches the one entered by the user
				$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'");
				$num = mysql_num_rows($res);
 
				//check if there was not a match
				if($num == 0){
					//if not display an error message
					echo "<center>The <b>Username</b> you supplied does not exist!</center>";
				}else{
					//if there was a match continue checking
 
					//select all rows where the username and password match the ones submitted by the user
					$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
					$num = mysql_num_rows($res);
 
					//check if there was not a match
					if($num == 0){
						//if not display error message
						echo "<center>The <b>Password</b> you supplied does not match the one for that username!</center>";
					}else{
						//if there was continue checking
 
						//split all fields fom the correct row into an associative array
						$row = mysql_fetch_assoc($res);
 
						//check to see if the user has not activated their account yet
						if($row['active'] != 1){
							//if not display error message
							echo "<center>You have not yet <b>Activated</b> your account!</center>";
						}else{
							//if they have log them in
 
							//set the login session storing there id - we use this to see if they are logged in or not
							$_SESSION['uid'] = $row['id'];
							//show message
							echo "<center>You have successfully logged in!</center>";
 
							//update the online field to 50 seconds into the future
							$time = date('U')+50;
							mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
 
							//redirect them to the usersonline page
							header('Location: Shopping Cart/shoppingcart.html');
						}
					}
				}
			}
		}
 ?>
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
<form action="login.php" method="post">
			<div>
				<table cellpadding="2" cellspacing="10" border="0">
					<tr>
						<td>	Username:</td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>	Password:</td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><a href="register.php">Register</a></td>
					</tr>
				</table>
			</div>
		</form>
</div>
	<div id="Login-08"></div>
	<div id="Login-09"></div>
	<div id="Login-10">
		<img src="images/Login_10.jpg" width="378" height="252" alt="">
	</div>
	<div id="Login-11">

	</div>
	<div id="Login-12">
		<img src="images/Login_12.jpg" width="378" height="55" alt="">
	</div>
	<div id="Login-13"> <a href="media.php"><img src="images/Login_13.jpg" width="378" height="251" alt=""></a>
	</div>
	<div id="Login-14"></div>
	<div id="Login-15"></div>
</div>
<!-- End Save for Web Slices -->
</body>
</html>