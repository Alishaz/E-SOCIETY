<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Advertiment</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
		
		$u1=$_SESSION['u_id'];
	$a="select * from profile where u_id=$u1";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
	
	

?>
<!-- validation -->
<script>
function valid_data()
{
	var name=document.getElementById('adv_name');
	if(name.value=="")
	{
		alert("Enter the Full Name.");
		adv_name.focus();
		return false;
	}
	var mnum=document.getElementById('adv_mob');
	if(mnum.value=="")
	{
		alert("Please Enter Mobile Number");
		adv_mob.focus();
		return false;	
	}
	if(isNaN(mnum.value))
	{
		alert("Invalid Mobile Number");
		adv_mob.focus();
		return false;	
	}
	if(!(mnum.value.length==10))
	{
		alert("Invalid Mobile Number");
		adv_mob.focus();
		return false;	
	}
	var email=document.forms["adv"]["adv_email"].value;
	if(email=="")
	{
		alert("Enter Email Address");
		adv_email.focus();
		return false;
	}
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2)
	{
		alert("Please Enter valid email address");
		adv_email.focus();
		return false;	
	}
	var title=document.getElementById('adv_title');
	if(title.value=="")
	{
		alert("Please Enter Title");
		adv_title.focus();
		return false;
	}
	var img=document.getElementById('adv_img');
		if(img.value=="")
	{
		alert("Select Image");
		adv_img.focus();
		return false;
	}
	var dec=document.getElementById('adv_desc');
	if(dec.value=="")
	{
		alert("Enter Description About your Advertisement");
		adv_desc.focus();
		return false;
	}
	
}
function Validate() {
       var mobile = document.getElementById("adv_mob").value;
       var pattern = /^\d{10}$/;
       if (pattern.test(mobile)) {
         document.getElementById("mo_error_msg").innerHTML="valid Number";
         console.log("valid");
       }
               else{
       document.getElementById("mo_error_msg").innerHTML="in valid Number";
     console.log("in valid");
               }
   }
</script>
	
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
 
    <form method="post" enctype="multipart/form-data" name="adv">
    <center>
    <h2>Advertisement Form</h2>
    <hr />
        &nbsp;&nbsp; <table align="center" border="0">
    <tr>
   	<td>Name</td>
        <td>&nbsp;<input type="text" name="adv_name" id="adv_name"  value="<?php  echo $d['name'];?>" /></td>
    </tr>
    <tr>
    	<td>Mobile No.</td>
        <td>&nbsp;<input type="text" name="adv_mob"  id="adv_mob" value="<?php  if(isset($d['adv_mob'])) echo $d['adv_mob']; ?>" onkeyup="return Validate()" onkeydown="return Validate()" >
                               <span id="mo_error_msg">  <label id="mo_error_msg"></label><span>
                               </td>
    </tr>
    <tr>
    	<td>Email Id</td>
        <td>&nbsp;<input type="email" name="adv_email" id="adv_email" /></td>
     </tr>
     <tr>
     	 <td>Title</td>
         <td>&nbsp;<input type="text" name="adv_title" id="adv_title" /></td>
     </tr>
     <tr>
     	 <td>Image</td>
         <td>&nbsp;<input type="file" name="adv_img" id="adv_img" /></td>
     </tr>
     <tr>
     	 <td>Description</td>
         <td>&nbsp;<textarea name="adv_desc" id="adv_desc"></textarea></td>
     </tr>
    </table>	
     <input type="submit" value="Submit" name="submit" class="button" onclick="return valid_data();" />&nbsp;&nbsp;
      <input type="reset" value="Cancel" name="button" class="button" onclick="window.location='adv1_display.php';"  />
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
		if(@is_uploaded_file($_FILES['adv_img']['tmp_name']))
		{
			copy($_FILES['adv_img']['tmp_name'],"upload/".$_FILES['adv_img']['name']);
		{
		
		$name=$_POST['adv_name'];
		$mob=$_POST['adv_mob'];
		$mail=$_POST['adv_email'];
		$title=$_POST['adv_title'];
		$image=$_FILES['adv_img']['name'];
		$desc=$_POST['adv_desc'];
		
		$q="insert into advertisement(adv_name,adv_mob,adv_email,adv_title,adv_img,adv_desc)values('$name','$mob','$mail','$title','$image','$desc')";
		mysql_query($q) or die(mysql_error());
		echo "<script>alert('Record Inserted');
		window.location='adv1_display.php';
		</script>";	
		}
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