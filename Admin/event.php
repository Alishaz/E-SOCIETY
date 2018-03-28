<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Event</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
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
	var name=document.getElementById('event_name');
	if(name.value=="")
	{
		alert("Enter the Event Name.");
		event_name.focus();
		return false;
	}
	
	var date=document.getElementById('event_date');
	if(date.value=="")
	{
		alert("Enter Date of Event");
		event_date.focus();
		return false;
	}
	var currentTime = new Date()
    month = currentTime.getMonth(),
    day = currentTime.getDate(),
    year = currentTime.getFullYear(),
    today = year + "-" + month + "-" + day;

var users_day = document.getElementById('event_date');
if (users_day > today) {
     alert ("Entered day is greater than today");
	 event_date.focus();
		return false;
}
 	var time=document.getElementById('event_time');
	if(time.value=="")
	{
		alert("Enter Event Time");
		event_time.focus();
		return false;
	}
	var place=document.getElementById('event_place');
	if(place.value=="")
	{
		alert("Select Place Name");
		event_place.focus();
		return false;
	}
	var place=document.getElementById('event_place');
	if(place.selectedIndex<1)
	{
		alert("Please select Place");
		event_place.focus();
		return  false;
	 }
 }
 function d()
 {
 var currentTime = new Date()
    month = currentTime.getMonth(),
    day = currentTime.getDate(),
    year = currentTime.getFullYear(),
    today = year + "-" + month + "-" + day;

var users_day = document.getElementById('event_place');

if (users_day.value > today) {
     alert ("Entered day is greater than today");
}
 else {
     alert ("Today is greater than entered day");
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
  <form name="event" id="event" method="post">
  <center>
    <h2>Event Form</h2>
    <hr />
    &nbsp;&nbsp;
    <table align="center" border="0">
    <tr>
    	<td>Name</td>
        <td>&nbsp;<input type="text" name="event_name" id="event_name" /></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="event_date" id="event_date" on /></td>
     </tr>
     <tr>
     	 <td>Time</td>
         <td>&nbsp;<input type="time" name="event_time" id="event_time" /></td>
     </tr>
     <tr>
     	 <td>Place</td>
         <td>&nbsp;<select id="event_place" name="event_place">
         <option value="">Select</option>
         <option value="Play Ground">Play Ground</option>
         <option value="Club House">Club House</option>
         
         </select></td>
     </tr>
   <tr>
     	 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();" />
           <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='event_display.php';"  />
         </td>
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
		$event_name=$_POST['event_name'];
		$event_date=$_POST['event_date'];
		$event_time=$_POST['event_time'];
		$event_place=$_POST['event_place'];
		
		
		$q="insert into event(event_name,event_date,event_time,event_place)
		values('$event_name','$event_date','$event_time','$event_place')";
		
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='event_display.php';
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

