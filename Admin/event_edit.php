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
	$event_id=$_GET['event_id'];
	$a="select * from event where event_id=$event_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
<script type="text/javascript">
function val()
 {
	 var a=document.getElementById("event_place").value;
	 if(a=="")
	 {
		console.log(a); 
		return false;
	 }
	 else
	 {
		 console.log(a);
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
 <form method="post">
 <center>
<h2>Event Edit Form</h2>
<hr />
&nbsp;&nbsp;
<table align="center" border="1">
        	<tr>
            	<td>Name</td>
                <td><input type="text" name="event_name" value="<?php echo $d['event_name']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Date</td>
                <td><input type="date" name="event_date" value="<?php echo $d['event_date']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Time</td>
                <td><input type="time" name="event_time" value="<?php echo $d['event_time']; ?>"></td>
            </tr>
            
            <tr>
            <?php if($d['event_place']=='Play Ground')
					{
					$sel='selected="selected"';
					}
					else if($d['event_place']=='Club House')
					{
						$sel_1='selected="selected"';
					}
					else
					{
						 $sel="";
						 $sel_1="";
					}
			?>
            	<td>Place</td>
                 <td><select id="event_place" name="event_place">
                 
    					<option value="">Select</option>
                         <option value="Play Ground" <?php if(isset($sel))echo $sel;?>>Play Ground</option>
                         <option value="Club House" <?php if(isset($sel_1))echo $sel_1;?>>Club House</option>
                         
                         </select></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button" onclick="return val()">
                <input type="button" value="Back" name="button" class="button" onclick="window.location='event_display.php';"/></td></td>
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
		$name=$_POST['event_name'];
		$date=$_POST['event_date'];
		$time=$_POST['event_time'];
		$place=$_POST['event_place'];
		
		$q="update event set event_name='$name', event_date='$date', event_time='$time', event_place='$place' where event_id=$_GET[event_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='event_display.php';
		</script>";
	}
?>