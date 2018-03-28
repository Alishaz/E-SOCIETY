
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Advertiment</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$adv_id=$_GET['adv_id'];
	$a="select * from advertisement where adv_id=$adv_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
<script type="text/javascript">

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
<link href="style/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
<form method="post" enctype="multipart/form-data">
<center>
<h2>Advertisement Edit Form</h2>
<hr />
    	 &nbsp;&nbsp;<table align="center" border="1">
        	<tr>
            	<td>Name</td>
                <td><input type="text" name="adv_name" value="<?php echo $d['adv_name']; ?>"></td>
            </tr>

			<tr>
            	<td>Mobile No.</td>
                <td><input type="text" name="adv_mob"  id="adv_mob" value="<?php  if(isset($d['adv_mob'])) echo $d['adv_mob']; ?>" onkeyup="return Validate()" onkeydown="return Validate()" >
                               <span id="mo_error_msg">  <label id="mo_error_msg"></label><span>
                               </td>
            </tr>
                     
            <tr>
            	<td>Email ID</td>
                <td><input type="email" name="adv_email" value="<?php echo $d['adv_email']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Title</td>
                <td><input type="text" name="adv_title" value="<?php echo $d['adv_title']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Image</td>
                <td><img src="upload/<?php echo $d['adv_img'];?>" height="100" width="100" />
                <input type="file" name="adv_img" value="<?php echo $d['adv_img']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Description</td>
                <td><textarea name="adv_desc"><?php echo htmlentities($d['adv_desc']);?></textarea></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
               <input type="button" value="Back" name="button" class="button" onclick="window.location='adv_display.php';"/></td>
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
		if(@is_uploaded_file($_FILES['adv_img']['tmp_name']))
		{
			copy($_FILES['adv_img']['tmp_name'],"upload/".$_FILES['adv_img']['name']);
		
			$image=$_FILES['adv_img']['name'];
		}
		else
		{
			$image=$d['adv_img'];
		}
		//echo "hi";	
		$name=$_POST['adv_name'];
		$mob=$_POST['adv_mob'];
		$email=$_POST['adv_email'];
		$title=$_POST['adv_title'];
		$desc=$_POST['adv_desc'];
		$q="update advertisement set adv_name='$name', adv_mob='$mob', adv_email='$email', adv_title='$title', adv_img='$image', adv_desc='$desc' where adv_id=$_GET[adv_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='adv_display.php';
		</script>";
	}
?>