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
	if(isset($_SESSION['adminlogin']))
	{
	
?>
<!-- validation -->
<script>
function valid_data()
{
var state=document.getElementById('state');
	if(state.selectedIndex<1)
	{
		alert("Please Select State");
		state.focus();
		return  false;
	}
var name=document.getElementById('name');
	if(name.value=="")
	{
		alert("Enter City Name");
		name.focus();
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
<form name="city" id="city" method="post">
<center>
 <h2>City Form</h2>
 <hr />
   &nbsp;&nbsp; 
   <table align="center" border="0"> 
    <tr>
      	<td>State</td>
        <td> &nbsp;&nbsp; <select name="state_id" id="state">
        <option value="select">Select State</option>
        <?php
			$b=mysql_query("SELECT * FROM state ORDER BY state_name") or die(mysql_error());
			while($d=mysql_fetch_array($b))
			{
		?>
                <option value="<?php echo $d['state_id']?>"><?php echo $d['state_name']?></option>
                <?php 	
			}
				?>
              </select>
        </td>
    </tr>
    
    <tr>
    	<td>City Name</td>
        <td>&nbsp;&nbsp;&nbsp;<input type="text" name="city_name" id="name" /></td>
     </tr>     
    </table>	
    <input type="submit" name="submit" value="Submit" class="button" id="submit" onclick="return valid_data();" />
</fieldset> 
</form>			

<?php
include "footer.php";
?>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['city_id'];
		 $city=$_POST['city_name'];
		//echo "<br>";
		 $state=$_POST['state_id'];
		//echo "<br>";
		
		 $q="INSERT INTO city(city_id,city_name, state_id) VALUES(NULL,'$city','$state')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='citystate_display.php';
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