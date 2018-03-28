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
	$fback_id=$_GET['fback_id'];
	$a="select * from feedback where fback_id=$fback_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
    <form method="post">
    <center>
<h2>Feedback Edit Form</h2>
<hr />
   &nbsp;&nbsp;
   <table align="center" border="1">
        	<tr>
            	<td>Name</td>
                <td><input type="text" name="fback_name" value="<?php echo $d['fback_name']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Address</td>
                <td><textarea name="fback_add"><?php echo $d['fback_add'];?></textarea></td>
            </tr>
            
            <tr>
            	<td>Mobile No.</td>
                <td><input type="text" name="fback_mob" value="<?php echo $d['fback_mob']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Email Id</td>
                <td><input type="email" name="fback_email" value="<?php echo $d['fback_email']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Comments</td>
                <td><textarea name="fback_msg"><?php echo $d['fback_msg'];?></textarea></td>
            </tr>
             
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button"></td>
            <br /></tr>
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
		$name=$_POST['fback_name'];
		$address=$_POST['fback_add'];
		$mob=$_POST['fback_mob'];
		$email=$_POST['fback_email'];
		$msg=$_POST['fback_msg'];
		
		$q="update feedback set fback_name='$name', fback_add='$address', fback_mob='$mob', fback_email='$email', fback_msg='$msg' where fback_id=$_GET[fback_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='feedback_display.php';
		</script>";
	}
?>