<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Feedback</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
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
	var name=document.getElementById('fback_name');
	if(name.value=="")
	{
		alert("Enter Your Full Name");
		fback_name.focus();
		return false;
	}
	var email=document.forms["feedback"]["fback_email"].value;
	if(email=="")
	{
		alert("Enter Email Address");
		fback_email.focus();
		return false;
	}
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2)
	{
		alert("Please Enter valid email address");
		fback_email.focus();
		return false;	
	}
	var com=document.getElementById('fback_msg');
	if(com.value=="")
	{
		alert("Enter Your Comment");
		fback_msg.focus();
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
  <form name="feedback" id="feedback" method="post">
  <center>
    <h2>Feedback Form</h2>
    <hr />
	&nbsp;&nbsp;  
      <table align="center" border="0">
    <tr>
    	<td>Name</td>
        <td>&nbsp;<input type="text" name="fback_name" id="fback_name"  /></td>
     </tr>
     <tr>
     	  <td>Email Id</td>
          <td>&nbsp;<input type="email" name="fback_email" id="fback_email"/></td>
     </tr>
     <tr>
     	 <td>Comments</td>
         <td>&nbsp;<textarea name="fback_msg" id="fback_msg"></textarea></td>
     </tr>
     <tr>
     	 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();"/>
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='feedback_display.php';"  /></td>
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
			$name=$_POST['fback_name'];
			$mail=$_POST['fback_email'];
			$msg=$_POST['fback_msg'];
			
			$q="insert into feedback(fback_name,fback_email,fback_msg)
			values('$name','$mail','$msg')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='feedback_display.php';
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