<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-SOCITY</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png"/>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
?>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
 
    <form method="post" name="home">
    <center>
	<img src="images/admin.jpg" class="image-centered"/> 
  <ul>
<li> <span style="font-size:24px;color:#415093;"><center>
<?php
if(isset($_SESSION['adminlogin']))
{
	echo "<span>Welcome:</span>";
	echo $_SESSION['adminlogin'];
	?> 
    </center>
</span></li>
</ul>      
	</center>
    </form>
<?php
include "footer.php";
?>

</body>
</html>
<?php 
	}
	else
	{
		header("location:index.php");
	}
?>
