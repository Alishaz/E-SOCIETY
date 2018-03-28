<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Registration</title>
<?php
	include 'connection.php';
?>

<script>
function getcity(url)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("city_div").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",url,true);
xmlhttp.send();
}

/* validation */
function valid_data()
{
	var name=document.getElementById('name');
	if(name.value=="")
	{
		alert("Enter the Full Name.");
		name.focus();
		return false;
	}
	var add=document.getElementById('add');
	if(add.value=="")
	{
		alert("Enter Your Address");
		add.focus();
		return false;
	}
	var state=document.getElementById('state');
	if(state.selectedIndex<1)
	{
		alert("Please Select State");
		state.focus();
		return  false;
	}
	var city=document.getElementById('city_div');
	if(city.selectedIndex<1)
	{
		alert("Please Select City");
		city_div.focus();
		return  false;
	}
	var nation=document.getElementById('nation');
	if(nation.value=="")
	{
		alert("Enter Natioality");
		nation.focus();
		return false;
	}
	var rel=document.getElementById('rel');
	if(rel.value=="")
	{
		alert("Enter Religion");
		rel.focus();
		return false;
	}
	var dob=document.getElementById('dob');
	if(dob.value=="")
	{
		alert("Enter Birth Date");
		dob.focus();
		return false;
	}
	var gender=document.getElementsByName('gender');
	if(!(gender[0].checked==true || gender[1].checked==true))
	{
		alert("Select gender");
		return false;	
	}
	var mnum=document.getElementById('mno');
	if(mnum.value=="")
	{
		alert("Please Enter Mobile Number");
		mnum.focus();
		return false;	
	}
	if(isNaN(mnum.value))
	{
		alert("Invalid Mobile Number");
		mnum.focus();
		return false;	
	}
	if(!(mnum.value.length==10))
	{
		alert("Invalid Mobile Number");
		mnum.focus();
		return false;	
	}
	var email=document.forms["register"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2)
	{
		alert("Please Enter valid email address");
		return false;	
	}
	var uname=document.getElementById('uname');
	if(uname.value=="")
	{
		alert("Enter the username for login.");	
		uname.focus();
		return false;
	}
	var pass=document.getElementById('pass');
	var cpass=document.getElementById('cpass');
	if(pass.value=="")
	{
		alert("Enter Password");
		pass.focus();
		return false;
	}
	if(pass.length<8)
	{
		alert("Enter minimum 8 digit password");
		pass.focus();
		return false;
	}
	 if(cpass.value=="")
	{
		alert("Enter Conform Password");
		cpass.focus();
		return false;
	}
	if(!(pass.value==cpass.value))
	{		
		alert("Password and Conform Password are not Match");
		cpass.focus();
		return false;
	}
	var s_que=document.getElementById('s_que');
	if(s_que.selectedIndex<1)
	{
		alert("Please Select Security Question");
		s_que.focus();
		return  false;
	}
	var s_ans=document.getElementById('s_ans');
	if(s_ans.value=="")
	{
		alert("Enter Security Answer");
		s_ans.focus();
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
    <form name="Register" id="register" method="post">
    <center>
    <h2>Registration Form</h2>
    <table align="center" border="0">	
 	<tr>
    	<td>Name</td> 
        <td> &nbsp;&nbsp; <input type="text" name="name" id="name" placeholder="Enter Full Name" /> </td>
     </tr>
     <tr>
     	<td>Address</td>
        <td> &nbsp;&nbsp; <textarea name="address" id="add"> </textarea> </td>
     </tr>
     
     <tr>
     <td>State</td>
     <td>&nbsp;&nbsp;
    <select name="state" onChange="getcity('findcity.php?state_id='+this.value)" id="state">
    <option value="">Select State</option>
    <?php 
		$c=mysql_query("SELECT * FROM state ORDER BY state_name") or die(mysql_error());
		while($f=mysql_fetch_array($c))
		{
	?>
    <option value="<?php echo $f['state_id']?>"><?php echo $f['state_name']?></option>
    <?php } ?>
    </select></td>
     </tr>
     
     <tr>
     	<td>City &nbsp;&nbsp;&nbsp;</td>
	    <td>&nbsp;&nbsp;
         <select name="city" id="city_div">
    		<option value="">Select city</option>
    	</select></td>

     </tr>
     <tr>
     	<td>Nationality</td>
        <td> &nbsp;&nbsp; <input type="text" name="nationality"  id="nation"/></td>
     </tr>
     <tr>
     	<td>Religion</td>
        <td> &nbsp;&nbsp; <input type="text" name="religion"  id="rel"/></td>
     </tr>
     <tr>
     	<td>Date of Birth</td>
        <td> &nbsp;&nbsp; <input type="date" name="dob"  id="dob"/> </td> 
     </tr>
     <tr>
     	<td>Gender</td>
        <td> &nbsp;&nbsp; <input type="radio" name="gender" value="male" id="gender"/><b>Male</b>
            <input type="radio" name="gender" value="female" /><b>Female</b></td>
     </tr>
     <tr>
     	<td>Mobile No.</td>
        <td> &nbsp;&nbsp; <input type="text" name="mob_no"  id="mno"/> </td>
     </tr>
     <tr>
    	<td>Email Id</td>
        <td> &nbsp;&nbsp; <input type="email" name="email_id" id="email" /> </td>
    </tr>
     <tr>
     	<td>Enter Username</td>
        <td> &nbsp;&nbsp; <input type="text" name="uname" id="uname" /> </td>
     </tr>
     <tr>
     	<td>Create password</td>
     	<td> &nbsp;&nbsp; <input type="password" name="pwd" id="pass" />
     </tr>
     <tr>
     	<td>Confirm password</td>
        <td> &nbsp;&nbsp; <input type="password" name="confirm_pwd" id="cpass" /> </td>
     </tr>
    <tr>
    	<td>Security Question</td>
        <td> &nbsp;&nbsp; <select name="s_que" id="s_que">
        	<option value="Select Question">Select Question</option>
            <option value="What is your nick name?">What is your nick name?</option>
            <option value="What is your school name?">What is your school name?</option>
            <option value="What is your hobby?">What is your hobby?</option>
            </select> </td>
    </tr>
    <tr>
    	<td>Security Answer</td>
        <td> &nbsp;&nbsp; <input type="text" name="s_ans" id="s_ans" maxlength="50" /></td>
    </tr>
    <br />
    <tr>
   <td align="center" colspan="2"> <br /> <input type="submit" name="submit" id="submit" value="submit" onClick="return valid_data();" class="button" />&nbsp;&nbsp;
   <input type="reset" value="Cancel" name="button" class="button"  /> </td>
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
			$name=$_POST['name'];
			$add=$_POST['address'];
			$state=$_POST['state'];
			$city=$_POST['city'];
			$nation=$_POST['nationality'];
			$rel=$_POST['religion'];
			$dob=$_POST['dob'];
			$gen=$_POST['gender'];
			$mno=$_POST['mob_no'];
			$mail=$_POST['email_id'];
			$uname=$_POST['uname'];
			$pwd=$_POST['pwd'];
			$cpwd=$_POST['confirm_pwd'];
			$sq=$_POST['s_que'];
			$sa=$_POST['s_ans'];
			
	$q="insert into user_registration(name,address,state,city,nationality,religion,dob,gender,mob_no,email_id,uname,pwd,confirm_pwd,s_que,s_ans)values('$name','$add','$state','$city','$nation','$rel','$dob','$gen','$mno','$mail','$uname','$pwd','$cpwd','$sq','$sa')";
			mysql_query($q) or die(mysql_errno());
	$que="insert into userlogin(uname,pwd)values('$uname','$pwd')";
	mysql_query($que) or die(mysql_errno());
			echo "<script> alert('record inserted successfully');
			window.location='login.php';
			</script>";
	}
	
?>