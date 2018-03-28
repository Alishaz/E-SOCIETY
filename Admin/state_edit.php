<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>State</title>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$state_id=$_GET['state_id'];
	$a="select * from state where state_id=$state_id";
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
<h2>State Edit Form</h2>
<hr />
    	&nbsp;&nbsp;<table align="center" border="1" >

        	<tr>
            	<td>Name</td>
                <td><input type="text" name="state_name" value="<?php echo $d['state_name']; ?>"></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button"></td>
            </tr>
        </center>
        </table>
        
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
		$name=$_POST['state_name'];
		
		$q="update state set state_name='$name' where state_id=$_GET[state_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='state_display.php';
		</script>";
	}
?>