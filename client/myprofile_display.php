<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	 $u1=$_SESSION['u_id'];

?>
<style>
#table1
{
}
#th
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "slider.php";
?>
 <div class="footer-top"></div>
       <form method="post" enctype="multipart/form-data" name="profile" id="profile">
       <center>
    <h2>Profile</h2></center>
    <hr />
    &nbsp;&nbsp;
    	 <?php
	   $sel="select * from profile where u_id='$u1'";
	   $row=mysql_query($sel) or die(mysql_error());
	   
	   while($d=mysql_fetch_array($row))
	   {	   
		?>
        <div class="one-third">
   <label><p><img src="profile/<?php echo $d['image'];?>" height="220" width="220" /></p></label></div><br />
   <div class="one-third">
   
    <h5><label><b>General Information</b></label></h5>
 <label>Name: <?php echo str_repeat("&nbsp;",15); echo $d['name'];?></label><br /><br />
  <label>Gender: <?php echo str_repeat("&nbsp;",13); echo $d['gender'];?></label><br /><br />
  <label>Birth date: <?php echo str_repeat("&nbsp;",8); echo $d['dob'];?></label><br /><br />
  <!--<label>Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php /*?><?php echo str_repeat("&nbsp;",15); echo htmlentities($d['address']);?><?php */?></label><br /><br />-->
  <label>Block: <?php echo str_repeat("&nbsp;",16); echo $d['block'];?></label><br /><br />
  <label>Flat Type: <?php echo str_repeat("&nbsp;",10); echo $d['flat_type'];?></label><br /><br />
   <label>Total Member: <?php echo str_repeat("&nbsp;",3); echo $d['total_memb'];?></label><br /><br />

  <h5><label><b>Contact Information</b></label></h5>
  <label>E_Mail: <?php echo str_repeat("&nbsp;",15); echo $d['email'];?></label><br /><br />
  <label>Mobile: <?php echo str_repeat("&nbsp;",15); echo $d['mob_no'];?></label><br /><br />
  <label>Occupation: <?php echo str_repeat("&nbsp;",8); echo $d['occupation'];?></label><br /><br />
<label>Education<br /> Qualification: <?php echo str_repeat("&nbsp;",6); echo $d['edu_qualification'];?></label><br /><br />

 <h5><label><b>Additional Information</b></label></h5>
 <label>Nationality:<?php echo str_repeat("&nbsp;",9); echo $d['nationality'];?></label><br /><br />
  <label>Religion: <?php echo str_repeat("&nbsp;",13); echo $d['religion'];?></label><br /><br />
  <label>hobbies: <?php echo str_repeat("&nbsp;",13); echo $d['hobbies'];?></label><br /><br />
   <?php echo str_repeat("&nbsp;",6); ?> 
   <a href="profile_edit.php?pro_id=<?php echo $d['pro_id'];?>&amp;action=edit" class="font">
   <input type="button" name="button" value="Edit" class="button"/></a>
 &nbsp;&nbsp;<input type="button" name="button" value="All Members" class="button" onclick="window.location='allmember_display.php';"/></a>
  
  </div>
  <div class="one-third">&nbsp;<br /></div>
  
    
 <?php
	   }
	  ?> 
</form>


<?php
include "footer.php";
?>

</body>
</html>
<?php
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
	
?>
