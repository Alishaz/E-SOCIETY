<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Place Permission</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	$uid=$_SESSION['u_id'];

	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
		$u1=$_SESSION['u_id'];
	$a="select * from profile where u_id=$u1";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);

?>

<!-- validation -->
<script>
function valid_data()
{
	var name=document.getElementById('plc_name');
	if(name.value=="")
	{
		alert("Enter the Full Name");
		plc_name.focus();
		return false;
	}
	var event_name=document.getElementById('plc_event');
	if(event_name.value=="")
	{
		alert("Enter the Event Name");
		plc_event.focus();
		return false;
	}
	var date=document.getElementById('plc_date');
	if(date.value=="")
	{
		alert("Please Select Date");
		plc_date.focus();
		return false;
	}
	var time=document.getElementById('plc_time');
		if(time.value=="")
	{
		alert("Please Select Time");
		plc_time.focus();
		return false;
	}
	var place=document.getElementById('plc_place');
	if(place.selectedIndex<1)
	{
		alert("Please Select Place");
		plc_place.focus();
		return  false;
	}
}
</script>
	
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
 
    <form method="post" enctype="multipart/form-data" name="place_permission">
    <center>
    <h2>Place Permission</h2>
    <hr />
        &nbsp;&nbsp; <table align="center" border="0">
    <tr>
   	<td>Name</td>
        <td>&nbsp;<input type="text" name="plc_name" id="plc_name" value="<?php if(!empty($d['name'])) echo $d['name'];?>" readonly="readonly"/></td>
    </tr>
    <tr>
    	<td>Event Name</td>
        <td>&nbsp;<input type="text" name="plc_event" id="plc_event" /></td>
    </tr>
    <tr>
    	<td>Date</td>
        <td>&nbsp;<input type="date" name="plc_date" id="plc_date" /></td>
     </tr>
     <tr>
     	 <td>Time</td>
         <td>&nbsp;<input type="time" name="plc_time" id="plc_time" /></td>
     </tr>
    <tr>
     	 <td>Place</td>
         <td>&nbsp;<select id="plc_place" name="plc_place">
         <option value="">Select</option>
         <option value="Play Ground">Play Ground</option>
         <option value="Club House">Club House</option>
         
         </select></td>
     </tr>
    </table>	
     <input type="submit" value="Submit" name="submit" class="button" />&nbsp;&nbsp;
      <input type="reset" value="Cancel" name="button" class="button"  />
</center>
</form>	
<br />	
<form name="Response Message" method="post">
<div>
<table align="center" border="1">
<?php
$uid=$_SESSION['u_id'];
$sel="select * from place_permission where u_id='$uid' order by plc_id desc";
 $row=mysql_query($sel) or die(mysql_error());  
	   while($d=mysql_fetch_array($row))
	   {
		   $p=$d['plc_id'];
?>
  <tr>    
        <td><p><b>Name: &nbsp;</b>
            <?php echo $d['plc_name'];?></p>
          <p><b>Event Name: &nbsp;</b>
           <?php echo $d['plc_event'];?></p>
           <p><b>Date: &nbsp;</b>
           <?php echo $d['plc_date'];?></p>
           <p><b>Title: &nbsp;</b>
           <?php echo $d['plc_time'];?></p>
          <p><b>Place Name: &nbsp;</b>
          <?php echo $d['plc_place'];?></p>
    
   
<?php  
     $sel1="select * from place_response where u_id='$uid' AND plc_id='$p'";
 $row1=mysql_query($sel1) or die(mysql_error());  
	   while($d1=mysql_fetch_array($row1))
	   {
?>
          <p><b>Permission Message: &nbsp;</b>
            <?php echo htmlentities($d1['msg']);}?>
                  
  <?php
	}
?> 
     </tr>
</table>
</div>
</form>	
<?php
include "footer.php";
?>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$u1=$_SESSION['u_id'];
		$plc_name=$_POST['plc_name'];
		$plc_event=$_POST['plc_event'];
		$plc_date=$_POST['plc_date'];
		$plc_time=$_POST['plc_time'];
		$plc_place=$_POST['plc_place'];
		
		
		$q="insert into place_permission(u_id,plc_name,plc_event,plc_date,plc_time,plc_place)
		values('$u1','$plc_name','$plc_event','$plc_date','$plc_time','$plc_place')";
		
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record Send successfully');
			window.location='place_permission.php';
			</script>";

	}

/*}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}*/

?>
<?php
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
	
?>
