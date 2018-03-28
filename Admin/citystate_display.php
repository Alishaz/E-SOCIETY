
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Location</title>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{	
?>
<link href="style/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
<form name="citystate_display" id="citystate_display" method="post">
<center>
   <h2>Location Form</h2>
   <hr />
   &nbsp;&nbsp;
     <table align="center" border="1">
    <tr align="center">
    	<td><b>#</b></td>
    	<td><b>ID</b></td>
    	<td><b>City Name</b></td>
        <td><b>State Name</b></td>
        <td colspan="2"><b>Action</b></td>
    
<?php
	$w="select state.state_name,city. * FROM  city JOIN state state ON state.state_id=city.state_id";
	
	$res=mysql_query($w) or die(mysql_error());
	while($d=mysql_fetch_array($res))
	{
		?>
        </tr>
        <tr align="center">
                <td><input type="checkbox" name="chk[]" value="<?php echo $d['city_id'];?>" /></td>
        <td><?php echo $d['city_id'];?></td>
        <td><?php echo $d['city_name'];?></td>
        <td><?php echo $d['state_name'];?></td>
        
        <td><a href="?city_id=<?php echo $d['city_id'];?>&amp;action=delete" class="font"><img src="style/images/delete.png" /></a></td>
        <td><a href="city_edit.php?city_id=<?php echo $d['city_id'];?>&amp;action=edit" class="font"><img src="style/images/edit.png" /></a></td>         
		</tr>
        <?php        
	}
	?>
     <tr>
       		<td colspan="6" align="center">
            	<a href="city.php">
            	<input type="button" name="insert" value="Insert" class="button" /></a>
                <a href="citystate_display.php"> <input type="submit" name="muldelete" value="Delete" class="button" /></a></td>
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
	if(isset($_REQUEST['city_id'],$_REQUEST['action'])&&$_REQUEST['action']=='delete')
{
	//echo "hi";

	//echo $_GET['admin_id'];
	$q="delete from city where city_id='$_GET[city_id]'";

	mysql_query($q) or die(mysql_error());
	echo "<script>alert('record deleted');
	window.location='citystate_display.php';
	</script>";
}
?>

<?php
	if(isset($_REQUEST['muldelete']) && $_REQUEST['muldelete']=='Delete')
	{
		echo $id=$_REQUEST['chk'];
		echo $cnt=count($id);
		if($cnt)
		{
			for($i=0;$i<$cnt;$i++)
			{
				echo "<br>";
				echo $q="delete from city where city_id=$id[$i]";	
				mysql_query($q) or die(mysql_error());
			}
			echo "<script>alert('record deleted');
			window.location='citystate_display.php';
			</script>";
		}
		else
		{
			echo "<script>alert('record deleted');
			window.location='citystate_display.php';
			</script>";
		}
	}
	}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}

?>