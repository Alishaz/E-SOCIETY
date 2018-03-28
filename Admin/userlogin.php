<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User login Form</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png"/>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{	
?>
<script>
function valid_data()
{
	var name=document.getElementById('username');
	if(name.value=="")
	{
		alert("Enter Your Name");
		username.focus();
		return false;
	}
	var pwd1=document.getElementById('password');
	if(pwd1.value<8)
	{
		alert("Enter 8 digit Password");
		password.focus();
		return false;
	}
	if(pwd1.value=="")
	{
		alert("Enter Correct Password");
		password.focus();
		return false;
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
    <form name="userlogin" id="userlogin" method="post">
     <h2 align="center">User Login Form</h2>
     <center>
    	&nbsp;&nbsp;
    <table align="center">
    <tr>
    <td>Name</td>
    <td><input type="text" name="name" id="name" /></td>
     </tr>
     <tr>
    <td>UserName</td>
    <td><input type="text" name="uname" id="username" /></td>
     </tr>
    <tr>
   <td>Password</td> 
   <td><input type="password" name="pwd" id="password" /></td>
   </tr>
   </table>
   <input type="submit" name="submit" value="insert" class="button" onClick="return valid_data()"/>
    <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='member_display.php';"  />
</center> 
</form>

<?php
include "footer.php";
?>
</body>
</html>

<?php
	$msg='';
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$uname=$_POST['uname'];	
		$pwd=md5($_POST['pwd']);
				
		$q="insert into profile(name,uname,pwd) Values('$name','$uname','$pwd')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='member_display.php';
			</script>";
	}

}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}
?>