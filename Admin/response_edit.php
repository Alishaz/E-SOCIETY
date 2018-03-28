<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Response</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png"/>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$res_id=$_GET['res_id'];
	$a="select * from place_response where res_id=$res_id";
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
<h2>Place Response Edit Form</h2>
<hr />
&nbsp;&nbsp;
<table align="center" border="1">
        	<tr>
            	<td>Permission Id</td>
                <td><input type="text" name="plc_id" value="<?php echo $d['plc_id']; ?>" readonly="readonly"></td>
            </tr>
            <tr>
            	<td>User Id</td>
                <td><input type="text" name="u_id" value="<?php echo $d['u_id']; ?>" readonly="readonly"></td>
            </tr>
            
            <tr>
            	<td>Message</td>
                <td><textarea name="msg"><?php echo htmlentities($d['msg']);?></textarea></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
                         <input type="button" value="Back" name="button" class="button" onclick="window.location='response_display.php';"  /></td>
            </tr>
        </table>
        </center>
    </form>

</body>
</html>

<?php
include "footer.php";
?>

<?php

	if(isset($_POST['submit']))
	{
		//echo "hi";	
		$plc_id=$_POST['plc_id'];
		$u_id=$_POST['u_id'];
		$msg=$_POST['msg'];
		
		$q="update place_response set msg='$msg' where res_id=$_GET[res_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='response_display.php';
		</script>";
	}
?>