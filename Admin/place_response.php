<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Place Response</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png"/>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
	$plc_id=$_GET['plc_id'];
	$a="select * from place_permission where plc_id=$plc_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
	//include 'secure.php';
?>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
  <form name="place_response" id="place_response" method="post">
  <center>
    <h2>Place Permission</h2>
    <hr />
    &nbsp;&nbsp;
    <table align="center" border="0">
    <tr>
    <td>Permission Id</td>
    <td><input type="text" name="plc_id" value="<?php echo $d['plc_id']; ?>" readonly="readonly" /></td>
    </tr>
     <tr>
    <td>User Id</td>
    <td><input type="text" name="u_id" value="<?php echo $d['u_id']; ?>" readonly="readonly"/></td>
    </tr>
    <tr>
    	<td>Message</td>
        <td>&nbsp;<textarea name="msg" id="msg"></textarea></td>
     </tr>
     
     	 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='place_display.php';"  /></td>
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
		$id=$_GET['plc_id'];
		$u1=$d['u_id'];
	//	$u1=$_SESSION['u_id'];
		//$plc_id=$_POST['plc_id'];
		$msg=$_POST['msg'];
		
		
		$q="insert into place_response(plc_id,u_id,msg)
		values('$id','$u1','$msg')";
		
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('Send Permission successfully');
			window.location='response_display.php';
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

