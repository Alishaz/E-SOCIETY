<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<!--<link href="style/css/style.css" rel="stylesheet" type="text/css" />-->
<link href="style/css/zooming.css" rel="stylesheet" type="text/css" />
<link href="style/css/layout.css" rel="stylesheet" type="text/css" />
<link href="style/css/custom.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="style/js/zooming.js"> </script>
<title>Login</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
		if(isset($_SESSION['uname']))
	{
		header("location:index.php");
	}

	//include 'secure.php';
?>
<?php
	$msg='';
	if(isset($_POST['submit']))
	{
		$uname=$_POST['uname'];	
		$pwd=md5($_POST['pwd']);
		$q="select * from profile where uname='$uname' and pwd='$pwd'";
		
		$data=mysql_query($q);
		$fet=mysql_fetch_array($data);
		if($fet)
		{
			$_SESSION['uname']=$uname;
			$_SESSION['u_id'] =$fet['pro_id']; 
			if($fet['status']==1)
			{
					echo "<script>alert('login successfully');
					window.location='client/profile.php?pro_id=".$fet['pro_id']."';</script>";
			}
			else
			{
					echo "<script>alert('login successfully');
					window.location='client/home.php';</script>";
			
			}
			
		}
		else if($uname=='' && $pwd=='')
		{
			$msg="Enter username and password";			
		}
	else if($uname=="")
		{
		$msg="Enter username";
		}		
		else if($pwd<8)
		{
		$msg="Enter Minimum 8 digit Password";
		}
		else
		{
			$msg="Enter valid username and password";	
		}
	}
?>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
     <form name="login" id="login" method="post">
     <h2 align="center">Login Form</h2>
     <center>
    	&nbsp;&nbsp;
    <table align="center">
    <tr>
    <td>UserName</td>
    <td><input type="text" name="uname" id="username" /></td>
     </tr>
    <tr>
   <td>Password</td> 
   <td><input type="password" name="pwd" id="password" /></td>
   </tr>
   <tr>
   <td colspan="2" align="center"><br /><?php echo "<b>$msg"; ?></td>
   </tr>
   </table>
   <input type="submit" name="submit" value="Submit" class="button" onclick="home.php" /><br /><br />
   <a href="forgotpass.php" class="font"><h4><u>Forgot Password?</u></a>&nbsp;&nbsp;

</center> 
</form>
</body>
</html>
<?php
include "footer.php";
?>

