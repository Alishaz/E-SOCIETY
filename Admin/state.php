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
	if(isset($_SESSION['adminlogin']))
	{
	
?>	

<script>
function valid_data()
{
	var name=document.getElementById('state_name');
	if(name.value=="")
	{
		alert("Enter State Name");
		state_name.focus();
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
   <form name="state" id="state" method="post">
  <center>
    <h2>State Form</h2>
    <hr />
   &nbsp;&nbsp; 
   <table align="center" border="0">
    <tr>
    	<td>Name</td>
        <td>&nbsp;<input type="text" name="state_name" id="state_name" /></td>
     </tr>     
     <tr><br>
     	 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="button" id="submit" onclick="return valid_data();" /></td>
     </tr>
</center> 
    </table>	

</form>
</div> 

<?php
include "footer.php";
?>
</body>
</html>
<?php
if(isset($_POST['submit']))
	{
		$name=$_POST['state_name'];
		
		$q="insert into state(state_name)values('$name')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='state_display.php';
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
