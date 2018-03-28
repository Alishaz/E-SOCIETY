<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Profile</title>
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
<script>
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
	var add=document.getElementById('add1');
	if(add.value=="")
	{
		alert("Enter Your Address");
		add1.focus();
		return false;
	}
	var block=document.getElementById('block');
	if(block.selectedIndex<1)
	{
		alert("Please select block");
		block.focus();
		return  false;
	}
	var nation=document.getElementById('nation');
	if(nation.selectedIndex<1)
	{
		alert("Enter Natioality");
		nation.focus();
		return false;
	}
	var rel=document.getElementById('rel');
	if(rel.selectedIndex<1)
	{
		alert("Enter Religion")	;
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
	var occu=document.getElementById('occu');
	if(occu.value=="")
	{
		alert("Enter Occupation");
		occu.focus();
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
	var email=document.forms["profile"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2)
	{
		alert("Please Enter valid email address");
		return false;	
	}
	var img=document.getElementById('image');
	if(img.value=="")
	{
		alert("Select Image");
		image.focus();
		return false;
	}
	var flat=document.getElementById('flat_type');
	if(flat.selectedIndex<1)
	{
		alert("Please select flat type");
		flat_type.focus();
		return  false;
	}
	var memb=document.getElementById('total_memb');
	if(memb.value=="")
	{
		alert("Enter total members in house");
		memb.focus();
		return false;
	}
}
 function Validate() {
       var mobile = document.getElementById("mob_no").value;
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

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
    <form name="profile" id="profile" method="post" enctype="multipart/form-data">
    <center>
    <h2>Profile Form</h2>
    <table align="center" border="0">	
 	<tr>
    	<td>Name</td> 
        <td> &nbsp;&nbsp; <input type="text" name="name" id="name" value="<?php if(!empty($d['name'])) echo $d['name'];?>"/> </td>
     </tr>
     <tr>
     	<td>Address</td>
        <td> &nbsp;&nbsp; <textarea name="address" id="add1"> </textarea> </td>
     </tr>
     <tr>
    	<td>Block</td>
        <td> &nbsp;&nbsp; <select name="block" id="block">
        	<option value="Select">Select</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            </select> </td>
    </tr>
     <tr>
     	<td>Nationality</td>
        <td> &nbsp;&nbsp; <select name="nationality" id="nation">
        	<option value="Select">Select</option>
            <option value="Indian">Indian</option>
            <option value="Australian">Australian</option>
            <option value="Chinese">Chinese</option>
            <option value="Japanese">Japanese</option>
            <option value="British">British</option>
            </select> </td>
     </tr>
     <tr>
     	<td>Religion</td>
        <td> &nbsp;&nbsp; <select name="religion" id="rel">
        	<option value="">Select</option>
            <option value="Hindu">Hindu</option>
            <option value="Muslim">Muslim</option>
            <option value="Christian">Christian</option>
            <option value="Punjabi">Punjabi</option>
            <option value="Jain">Jain</option>
            </select> </td>
     </tr>
     <tr>
     	<td>Date of Birth</td>
        <td> &nbsp;&nbsp; <input type="date" name="dob"  id="dob"/> </td> 
     </tr>
     <tr>
     	<td>Gender</td>
        <td> &nbsp;&nbsp; <input type="radio" name="gender" value="male" id="gender" checked="Check"/><b>Male</b>
            <input type="radio" name="gender" value="female" /><b>Female</b></td>
     </tr>
     <tr>
     	<td>Education Qualification</td>
        <td> &nbsp;&nbsp; <input type="text" name="edu_qualification"  id="edu_qualification"/></td>
     </tr>
     <tr>
     	<td>Occupation</td>
        <td> &nbsp;&nbsp; <input type="text" name="occupation"  id="occu"/></td>
     </tr>
     <tr>
     	<td>Mobile No.</td>
         <td>&nbsp;&nbsp;<input type="text" name="mob_no"  id="mob_no" value="<?php  if(isset($d['mob_no'])) echo $d['mob_no']; ?>" onkeyup="return Validate()" onkeydown="return Validate()" >
                               <span id="mo_error_msg">  <label id="mo_error_msg"></label><span>
                               </td>
     </tr>
     <tr>
    	<td>Email Id</td>
        <td> &nbsp;&nbsp; <input type="email" name="email" id="email" /> </td>
    </tr>
     <tr>
     	<td>Hobbies</td>
        <td> &nbsp;&nbsp; <input type="checkbox" name="hobbies[]" value="Reading">Reading
						<input type="checkbox" name="hobbies[]" value="singing">Singing
						<input type="checkbox" name="hobbies[]" value="Dancing">Dancing
						<input type="checkbox" name="hobbies[]" value="Writing">Writing
						<input type="checkbox" name="hobbies[]" value="Others">Others
						</td>
     </tr>
     <tr>
     	 <td>Profile Picture</td>
         <td>&nbsp;<input type="file" name="image" id="image" /></td>
     </tr>
     <tr>
    	<td>Flat Type</td>
        <td> &nbsp;&nbsp; <select name="flat_type" id="flat_type">
        	<option value="Select">Select</option>
            <option value="Own">Own</option>
            <option value="Rent">Rent</option>
            </select> </td>
    </tr>
    <tr>
    	<td>Total Members</td>
        <td> &nbsp;&nbsp; <input type="text" name="total_memb" id="total_memb" /></td>
    </tr>
    <tr>
    	<td>User Name</td>
        <td> &nbsp;&nbsp; <input type="text" name="uname" id="uname" value="<?php echo $u ?>" /></td>
    </tr>
    <tr>
    	<td>Change Password</td>
        <td> &nbsp;&nbsp; <input type="password" name="pwd" id="pwd" /></td>
    </tr>
    <tr>
    	<td>Security Question</td>
        <td> &nbsp;&nbsp; <select name="seq_id"  class="textbox">
    <option value="">Select Security Question</option>
    <?php 
		$c=mysql_query("select * from security_question ORDER BY s_que") or die(mysql_error());
		while($f=mysql_fetch_array($c))
		{
	?>
    <option value="<?php echo $f['s_id']?>"><?php echo $f['s_que']?></option>
    <?php } ?>
    </select>

 </td>
    </tr>
    <tr>
    	<td>Security Answer</td>
        <td> &nbsp;&nbsp; <input type="text" name="s_ans" id="s_ans" maxlength="50" /></td>
    </tr>
    <br />
    <tr>
   <td align="center" colspan="2"> <br /> <input type="submit" name="submit" id="submit" value="Submit"  class="button" onclick="window.location='home.php';" />&nbsp;&nbsp;
   <input type="reset" value="Cancel" name="button" class="button" /> </td>
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
}
	if(isset($_POST['submit']))
	{
		//echo "hi";
		if(@is_uploaded_file($_FILES['image']['tmp_name']))
		{
			copy($_FILES['image']['tmp_name'],"profile/".$_FILES['image']['name']);
		{
			$u1=$_SESSION['u_id'];
			$name=$_POST['name'];
			$add=$_POST['address'];
			$block=$_POST['block'];
			$nation=$_POST['nationality'];
			$rel=$_POST['religion'];
			$dob=$_POST['dob'];
			$gen=$_POST['gender'];
			$quali=$_POST['edu_qualification'];
			$occu=$_POST['occupation'];
			$mno=$_POST['mob_no'];
			$mail=$_POST['email'];
			$hobbies=implode(',',$_POST['hobbies']);
			$res=implode($hobbies,',');
			$img=$_FILES['image']['name'];			
			$type=$_POST['flat_type'];
			$memb=$_POST['total_memb'];
			$uname=$_POST['uname'];
			$pwd=md5($_POST['pwd']);
			$security=$_POST['seq_id'];
		  	$ans=$_POST['s_ans'];
		

	$q="update profile set name='$name', u_id='$u1', address='$add', block='$block', nationality='$nation', religion='$rel', dob='$dob', gender='$gen', edu_qualification='$quali', occupation='$occu', mob_no='$mno', email='$mail', hobbies='$hobbies', image='$img', flat_type='$type', total_memb='$memb', uname='$uname', pwd='$pwd',s_id='$security' ,s_ans='$ans',status='0' where pro_id=$_GET[pro_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script>
		window.location='myprofile_display.php';
		</script>";
	
		}
		}
		
	}

	//else
//	{
//		echo "<script> alert('Please login to view this page.');
//			window.location='../index.php';
//			</script>";
//	}
//	

	
?>