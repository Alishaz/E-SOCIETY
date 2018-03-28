<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>State</title>

<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
	
?>
<link href="style.css" rel="stylesheet" type="text/css" />	
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
     <form name="state" id="state" method="post">
<center>
    <h2>State Form</h2>
    <hr />
    &nbsp;&nbsp;
      <table align="center" border="1" >
    <tr align="center">
       	<td><b>#</b></td>
    	<td><b>ID</b></td>
    	<td><b>Name</b></td>
		<td colspan="2"><b>Action</b></td>
        
		<?php
	   
	   $sel="select * from state";
	   $row=mysql_query($sel) or die(mysql_error());
	   
	   while($d=mysql_fetch_array($row))
	   {
		   
		?>
     </tr>
     
     <tr align="center">
     	<td><input type="checkbox" name="chk[]" value="<?php echo $d['state_id'];?>" /></td>
     	<td><?php echo $d['state_id'];?></td>
     	<td><?php echo $d['state_name'];?></td>
      	
        <td><a href="?state_id=<?php echo $d['state_id'];?>&amp;action=delete" class="font"><img src="style/images/delete.png" /></a></td>
        <td><a href="state_edit.php?state_id=<?php echo $d['state_id'];?>&amp;action=edit" class="font"><img src="style/images/edit.png" /></a></td>
      </tr>
      
      <?php
	   }
	  ?>

        <tr>
       		<td colspan="5" align="center">
            	<a href="state.php">
            	<input type="button" name="insert" value="Insert" class="button" /></a>
                <a href="state_display.php"><input type="submit" name="muldelete" value="Delete" class="button" /></a>
			</td>
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
	if(isset($_REQUEST['state_id'],$_REQUEST['action'])&&$_REQUEST['action']=='delete')
{
	//echo "hi";

	//echo $_GET['admin_id'];
	$q="delete from state where state_id='$_GET[state_id]'";

	mysql_query($q) or die(mysql_error());
	echo "<script>alert('record deleted');
	window.location='state_display.php';
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
				echo $q="delete from state where state_id=$id[$i]";	
				mysql_query($q) or die(mysql_error());
			}
			echo "<script>alert('record deleted');
			window.location='state_display.php';
			</script>";
		}
		else
		{
			echo "<script>alert('record deleted');
			window.location='state_display.php';
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