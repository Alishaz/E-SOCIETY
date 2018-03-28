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
	$meet_id=$_GET['meet_id'];
	$a="select * from meeting where meet_id=$meet_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
<script>
function val()
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
  <form method="post">
<center>
<h2>Meeting Edit Form</h2>
<hr />
    	&nbsp;&nbsp;
        <table align="center" border="1">

        	<tr>
            	<td>Meeting Title</td>
                <td><input type="text" name="meet_title" value="<?php echo $d['meet_title']; ?>"></td>
            </tr>
            
            <tr>
            <?php if($d['meet_invit']=='All Members')
					{
					$sel='selected="selected"';
					}
					else if($d['meet_invit']=='Committee Members')
					{
						$sel_1='selected="selected"';
					}
					else
					{
						 $sel="";
						 $sel_1="";
					}
			?>
            	<td>Invitation</td>
                 <td><select id="meet_invit" name="meet_invit">
                 
 			<option value="">Select</option>
            <option value="All Members" <?php if(isset($sel))echo $sel;?>>All Members</option>
            <option value="Committee Members" <?php if(isset($sel_1))echo $sel_1;?>>Committee Members</option>
                         
           </select></td>
            </tr>
            
            </tr>
            
            <tr>
            <?php if($d['meet_place']=='Play Ground')
					{
					$sel='selected="selected"';
					}
					else if($d['meet_place']=='Club House')
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
                 <td><select id="meet_place" name="meet_place">
                 
 			<option value="">Select</option>
            <option value="Play Ground" <?php if(isset($sel))echo $sel;?>>Play Ground</option>
            <option value="Club House" <?php if(isset($sel_1))echo $sel_1;?>>Club House</option>
                         
           </select></td>
            </tr>
            
            
            <tr>
            	<td>Time</td>
                <td><input type="time" name="meet_time" value="<?php echo $d['meet_time']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Date</td>
                <td><input type="date" name="meet_date" value="<?php echo $d['meet_date']; ?>"></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button" onclick="return val()">
              <input type="button" value="Back" name="button" class="button" onclick="window.location='meeting_display.php';"/></td>
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
		$title=$_POST['meet_title'];
		$invit=$_POST['meet_invit'];
		$place=$_POST['meet_place'];
		$time=$_POST['meet_time'];
		$date=$_POST['meet_date'];
		
		$q="update meeting set meet_title='$title', meet_invit='$invit', meet_place='$place', meet_time='$time', meet_date='$date'  where meet_id=$_GET[meet_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='meeting_display.php';
		</script>";
	}
?>