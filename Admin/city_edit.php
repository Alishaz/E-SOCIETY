<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>City</title>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$city_id=$_GET['city_id'];
	$a="select * from city where city_id=city_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
<link href="style/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
<form method="post">
<center>
<h2>City Edit Form</h2>
<hr />
&nbsp;&nbsp;
    	<table align="center" border="1">

        	<tr>
            	<td>Name</td>
                <td><input type="text" name="city_name" value="<?php echo $d['city_name']; ?>"></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button"></td>
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
		$name=$_POST['city_name'];
		
		$q="update city set city_name='$name' where city_id=$_GET[city_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='citystate_display.php';
		</script>";
	}
?>