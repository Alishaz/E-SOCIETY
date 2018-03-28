<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Details</title>
</head>

<body>
<?php 
include "Header.php";
include "Slider.php";
?>
<div class="body3">
			<div class="main">
				<section id="content2">
				
				<form method="post" name="frmlogin">
<center>
<h2>Login Details</h2>
<table border="2">
 <tr>
   <td>Username</td>
   <td><input type="text" name="username" id="uname"></td>
 </tr>

 <tr>
   <td>Password</td>
   <td><input type="password" name="password" id="uname"></td>
 </tr>
 
 <tr>
   <td><input type="submit" name="btnsubmit" value="Save" onClick="validation()"/></td>
   <td><input type="reset" name="btncancel" value="Cancel" /></td>
 </tr>
</table>
</center>
</form>

				</section>
			</div>
		</div>
<?php
include "footer.php";
?>
</body>
</html>
