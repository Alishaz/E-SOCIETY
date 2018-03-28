
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Profile Edit</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";

	$pro_id=$_GET['pro_id'];
	$a="select * from profile where pro_id=$pro_id";
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
	if(isNaN(name.value))
	{
		alert("Enter Only Text");
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
     function o() {
var name1=document.getElementById("name").value;
  var regex = /^[a-zA-Z]*$/;
  if (regex.test(name1)) {

      //document.getElementById("notification").innerHTML = "Watching.. Everything is Alphabet now";
      return true;
  } 
  else {
      document.getElementById("name_error_msg").innerHTML = "Alphabets Only";
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
<form method="post" enctype="multipart/form-data">
<center>
<h2>Profile Edit Form</h2>
<hr />
    	 &nbsp;&nbsp;<table align="center" border="1">
        	<tr>
            	<td>Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $d['name']; ?>">
                  <!--  <span id="name_error_msg">  <label id="name_error_msg"></label><span> -->
                </td>
            </tr>
            
            <tr>
            	<td>Address</td>
                <td><textarea name="address" id="add1"><?php echo htmlentities($d['address']);?></textarea></td>
            </tr>
            
            <tr>
            <?php if($d['block']=='A')
					{
					$sel='selected="selected"';
					}
					else if($d['block']=='B')
					{
						$sel_1='selected="selected"';
					}
					else if($d['block']=='C')
					{
						$sel_2='selected="selected"';
					}
					else
					{
						 $sel="";
						 $sel_1="";
						 $sel_2="";
					}
			?>
            	<td>Block</td>
                 <td><select id="block" name="block">
                 
 			<option value="">Select</option>
            <option value="A" <?php if(isset($sel))echo $sel;?>>A</option>
            <option value="B" <?php if(isset($sel_1))echo $sel_1;?>>B</option>
            <option value="C" <?php if(isset($sel_2))echo $sel_2;?>>C</option>
                         
           </select></td>
            </tr>
            
            
            <tr>
            <?php 
					if($d['nationality']=='Indian')
					{
						$sel='selected="selected"';
					}
					else if($d['nationality']=='Australian')
					{
						$sel_1='selected="selected"';
					}
					else if($d['nationality']=='Chinese')
					{
						$sel_2='selected="selected"';
					}
					else if($d['nationality']=='Japanese')
					{
						$sel_3='selected="selected"';
					}
					else if($d['nationality']=='British')
					{
						$sel_4='selected="selected"';
					}
				
					else
					{
						 $sel="";
						 $sel_1="";
						 $sel_2="";
						 $sel_3="";
						 $sel_4="";
					}
			?>
            	<td>Nationality</td>
                 <td><select name="nationality" id="nation">
                 
 			<option value="">Select</option>
            <option value="Indian" <?php if(isset($sel))echo $sel;?>>Indian</option>
            <option value="Australian" <?php if(isset($sel_1))echo $sel_1;?>>Australian</option>
            <option value="Chinese" <?php if(isset($sel_2))echo $sel_2;?>>Chinese</option>
            <option value="Japanese" <?php if(isset($sel_3))echo $sel_3;?>>Japanese</option>
            <option value="British" <?php if(isset($sel_4))echo $sel_4;?>>British</option>
                         
           </select></td>
            </tr>
            
            <tr>
            <?php if($d['religion']=='Hindu')
					{
					$sel='selected="selected"';
					}
					else if($d['religion']=='Muslim')
					{
						$sel_1='selected="selected"';
					}
					else if($d['religion']=='Christian')
					{
						$sel_2='selected="selected"';
					}
					else if($d['religion']=='Punjabi')
					{
						$sel_3='selected="selected"';
					}
					
					else if($d['religion']=='Jain')
					{
						$sel_4='selected="selected"';
					}
				
					else
					{
						 $sel="";
						 $sel_1="";
						 $sel_2="";
						 $sel_3="";
						 $sel_4="";
						 
					}
			?>
            	<td>Religion</td>
                 <td><select name="religion" id="rel">
                 
 			<option value="">Select</option>
            <option value="Hindu" <?php if(isset($sel))echo $sel;?>>Hindu</option>
            <option value="Muslim" <?php if(isset($sel_1))echo $sel_1;?>>Muslim</option>
            <option value="Christian" <?php if(isset($sel_2))echo $sel_2;?>>Christian</option>
            <option value="Punjabi" <?php if(isset($sel_3))echo $sel_3;?>>Punjabi</option>
            <option value="Jain" <?php if(isset($sel_4))echo $sel_4;?>>Jain</option>
                         
           </select></td>
            </tr>
                     
             <tr>
            	<td>Date</td>
                <td><input type="date" name="dob"  id="dob" value="<?php echo $d['dob']; ?>"></td>
            </tr>
            <tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male"<?php if($d['gender']=='male') echo 'checked="checked"'?>>male
<input type="radio" name="gender" value="female"<?php if($d['gender']=='female') echo 'checked="checked"'?>>female
</td>
</tr>
      <tr>
            	<td>Education Qualification</td>
 <td><input type="text" name="edu_qualification"  id="edu_qualification" value="<?php echo $d['edu_qualification'];?>"></td>
            </tr>
            
            <tr>
            	<td>Occupation</td>
                <td><input type="text" name="occupation"  id="occu" value="<?php echo $d['occupation']; ?>"></td>
            </tr>
            
			<tr>
            	<td>Mobile No</td>
               <td>&nbsp;&nbsp;<input type="text" name="mob_no"  id="mob_no" value="<?php  if(isset($d['mob_no'])) echo $d['mob_no']; ?>" onkeyup="return Validate()" onkeydown="return Validate()" >
                               <span id="mo_error_msg">  <label id="mo_error_msg"></label><span>
                               </td>
            </tr>
            
            <tr>
            	<td>Email ID</td>
                <td><input type="email" name="email" id="email" value="<?php echo $d['email']; ?>"></td>
            </tr>
           <tr>
<td>Hobby:</td>
<td><input type="checkbox" name="hobbies[]"  value="Reading"<?php if(in_array('Reading',explode(',',$d['hobbies']))) echo 'checked="checked"';?>>Reading
<input type="checkbox" name="hobbies[]"  value="Singing"<?php if(in_array('Singing',explode(',',$d['hobbies']))) echo 'checked="checked"';?>>Singing
<input type="checkbox" name="hobbies[]"  value="Dancing"<?php if(in_array('Dancing',explode(',',$d['hobbies']))) echo 'checked="checked"';?>>Dancing
<input type="checkbox" name="hobbies[]"  value="Writing"<?php if(in_array('Writing',explode(',',$d['hobbies']))) echo 'checked="checked"';?>>Writing
<input type="checkbox" name="hobbies[]"  value="Others"<?php if(in_array('Others',explode(',',$d['hobbies']))) echo 'checked="checked"';?>>Others

</td></tr>
            <tr>
            	<td>Profile Picture</td>
                <td><img src="profile/<?php echo $d['image'];?>" height="100" width="100" />
                <input type="file" name="image" id="image"  value="<?php echo $d['image']; ?>"></td>
            </tr>
            
            
            <tr>
            <?php if($d['flat_type']=='Own')
					{
					$sel='selected="selected"';
					}
					else if($d['flat_type']=='Rent')
					{
						$sel_1='selected="selected"';
					}
					else
					{
						 $sel="";
						 $sel_1="";
					}
			?>
            	<td>Place</td>
                 <td><select id="flat_type" name="flat_type">
                 
 			<option value="">Select</option>
            <option value="Own" <?php if(isset($sel))echo $sel;?>>Own</option>
            <option value="Rent" <?php if(isset($sel_1))echo $sel_1;?>>Rent</option>
                         
           </select></td>
            </tr>
            <tr>
            	<td>Total Member</td>
                <td><input type="text" name="total_memb" value="<?php echo $d['total_memb'];?>"></td>
            </tr>
            <tr>
    	<td>Security Question</td>
        <td> 
     <select name="s_id" id="s_id"  class="textbox">
      <option>Select Security Question</option>
      <?php
											
            			 $a="SELECT * FROM security_question";
						 $occ_res=mysql_query($a);	
						while($d1=mysql_fetch_array($occ_res))
						{
							$select="";
							if($d['s_id']==$d1['s_id'])
							{
								$select='selected="selected"';	
								
							}
						?>
					
		<option value="<?php echo $d1['s_id']; ?>" <?php echo $select;?>><?php echo $d1['s_que']; ?></option>
					
<?php
}
?>

</select>
 </td>
    </tr>
    <tr>
    	<td>Security Answer</td>
        <td> <input type="text" name="s_ans" id="s_ans" maxlength="50" value="<?php echo $d['s_ans']; ?>" /></td>
    </tr>
    
            <tr>
            	<td colspan="2" align="center"><input type="submit" name="submit" value="Update" class="button"></td>
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
		//echo "hi";
		if(@is_uploaded_file($_FILES['image']['tmp_name']))
		{
			copy($_FILES['image']['tmp_name'],"profile/".$_FILES['image']['name']);
			$img=$_FILES['image']['name'];
		}
		else
		{
		$img=$d['image'];
		}
			$name=$_POST['name'];
			$u1=$_SESSION['u_id'];
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
			$type=$_POST['flat_type'];
			$memb=$_POST['total_memb'];
			$s=$_POST['s_id'];
			$sa=$_POST['s_ans'];
			
	$q="update profile set u_id='$u1',name='$name', address='$add', block='$block', nationality='$nation', religion='$rel', dob='$dob', gender='$gen', edu_qualification='$quali', occupation='$occu', mob_no='$mno', email='$mail', hobbies='$hobbies', image='$img', flat_type='$type', total_memb='$memb', s_id='$s', s_ans='$sa' where pro_id=$_GET[pro_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='myprofile_display.php';
		</script>";
	}
	}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}

?>