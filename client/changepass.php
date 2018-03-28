<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Change Password</title>
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	$u1=$_SESSION['u_id'];
		

?>
<script>
function valid_pwd()
{
	var pwd=document.getElementById('pwd').value;	
	if(pwd.length==0)
	{
	  	alert("Please Enter Old Password.");
	  	document.getElementById('pwd').focus();
	  	return false;
 	}
	var new_pwd=document.getElementById('new_pwd').value;
	 if(new_pwd.length==0)
	{
	    alert("please enter new password");
		document.getElementById('new_pwd').focus();
		return false;
		}
	else if(new_pwd.length>0)
	{
		if(new_pwd.length<8)
		{
			alert("New Password Must Not Be Less Than 8 Character.");
			document.forms.changepass.new_pwd.focus();
			return false;
		}
	}
	var con_pwd=document.getElementById('con_pwd').value;
	if(con_pwd.length==0)
	{
	   alert("please enter confirm password");
	   document.getElementById('con_pwd').focus();
	   return false;
	   }
	 else if(new_pwd.length>0 && con_pwd.length>0)
	 {
	   if(new_pwd!=con_pwd)
	   {
	      alert("confirm password does not match with new password");
		  document.getElementById('con_pwd').focus();
		  return false;
		  }
	 }
	 else
	 {
	 return true;
	}
}
</script>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
    <form name="changepass" id="changepass" method="post">
    <center>
    <h2>Change Password Form</h2>
    	<hr />
        &nbsp;&nbsp;
  <table align="center">
  <tr>
  <td>Old Password</td>
  <td ><input type="password" name="pwd" id="pwd" /></td>
  </tr>
  <tr>
  <td>New Password</td>
  <td><input type="password" name="new_pwd" id="new_pwd" /></td>
  </tr>
  <tr>
  <td>Confirm Password</td>
  <td><input type="password" name="con_pwd" id="con_pwd" /></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input type="submit" name="submit" value="change" class="button" onclick="return valid_pwd();" />
  <input type="button" name="back" value="back" onclick="window.location='home.php'" class="button"/></td>
  </tr>
  
  </table>
  </center>
  </form> 
<?php
include "footer.php";
?>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
$pwd=md5($_POST['pwd']);
$new_pwd=md5($_POST['new_pwd']);
$con_pwd=md5($_POST['con_pwd']);

$sql="select * from profile where pwd='$pwd' AND u_id ='$u1'";
$res=mysql_query($sql) or die(mysql_error());
if($row=mysql_fetch_array($res))
{
	if($new_pwd==$con_pwd)
	{
		 $upd="update profile set pwd='$new_pwd' where u_id='$u1'";
		mysql_query($upd)  or die(mysql_error());
        echo "<script>alert('Password Changed Successfully.');
		window.location='home.php';</script>";
	}
	
}
else
{
	echo "<script>alert('Old Password Does Not Match With Existing Password. Enter Correct old Password');
	</script>";
}
}
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}

?>