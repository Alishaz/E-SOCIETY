<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Meeting</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
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
var subj=document.getElementById('meet_title');
	if(subj.value=="")
	{
		alert("Enter Meeting Title");
		meet_title.focus();
		return false;
	}
	var inv=document.getElementById('meet_invit');
	if(inv.selectedIndex<1)
	{
		alert("Please select Invitation Member");
		meet_invit.focus();
		return  false;
	}
	var place=document.getElementById('meet_place');
	if(place.selectedIndex<1)
	{
		alert("Please select Place");
		meet_place.focus();
		return  false;
	}
	var time=document.getElementById('meet_time');
	if(time.value=="")
	{
		alert("Enter Meeting Time");
		meet_time.focus();
		return false;
	}
	var date=document.getElementById('meet_date');
	if(date.value=="")
	{
		alert("Enter Meeting Date");
		meet_date.focus();
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
      <form name="meeting" id="meeting" method="post">
<center>
    <h2>Meeting Form</h2>
    <hr />
    &nbsp;&nbsp; 
    <table align="center" border="0">
    <tr>
    	<td>Meeting Title</td>
        <td>&nbsp;<input type="text" name="meet_title" id="meet_title" /></td>
     </tr>
     <tr>
     	 <td>Invitation</td>
         <td>&nbsp;<select id="meet_invit" name="meet_invit">
         <option value="">Select</option>
         <option value="All Members">All Members</option>
         <option value="Committee Members">Committee Members</option>
         </select></td>

     </tr>
     <tr>
     	 <td>Place</td>
         <td>&nbsp;<select id="meet_place" name="meet_place">
         <option value="">Select</option>
         <option value="Play Ground">Play Ground</option>
         <option value="Club House">Club House</option>
         </select></td>

     </tr>
     <tr>
     	 <td>Time</td>
         <td>&nbsp;<input type="time" name="meet_time" id="meet_time" /></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="meet_date" id="meet_date" /></td>
     </tr>
     
     <tr>
     	 <td colspan="3" align="center"><input type="submit" name="submit" class="button" value="Submit" id="submit" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='meeting_display.php';"  /></td>
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
		$title=$_POST['meet_title'];
		$invit=$_POST['meet_invit'];
		$place=$_POST['meet_place'];
		$time=$_POST['meet_time'];
		$date=$_POST['meet_date'];
		
		$q="insert into meeting(meet_title,meet_invit,meet_place,meet_time,meet_date)values('$title','$invit','$place','$time','$date')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='meeting_display.php';
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