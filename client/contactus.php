<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>E-Society</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
include('connection.php');
session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";

?>
</head>
<body>
<!-- Fullscreen backgrounds -->
<?php 
include "Header.php";
include "Slider.php";
?>

    <!-- End Top Columns -->
    <div class="clear"></div><div class="one-third">
      <h2 align="center">Reach Us</h2>
      <p>Please use the contact form on the right side if you have any questions or requests, concerning our services.</p>
<p><br>
We will respond to your message within 24 hours.</p>
      </div>
      
    <div class="one-third last">
     <h2 align="center">General</h2>
     <center><p>Royal Society,</p>
	<p>bh. Drive-in road,</p>
    <p>Ahmedabad</p>
     <br>
     <p>Tel: (079) 3061 2162
     	<br>Mob:	+91 792 321 3293
<br>Email: inquery@esociety.com
<br>Website: www.esociety.com</p></center>
    </div>
    
    <div class="one-third last">
      <h2 align="center">Mail Us</h2>
    
    
      <form name="contact" id="contact" method="post">
    <p>  <label for="name">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="name" id="name" /></p><br>
    <p> 
          <label for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="email" id="email" /></p><br>
  <p>
          <label for="message">Message</label>
 		<textarea name="msg" id="msg"></textarea></p><br>
 <center>  <input type="submit" name="submit" value="Submit" class="button" onclick="home.php"/><br /><br /></center>
 
   
</form>
      </div>
    
    </div>
  </div>
  <!-- End Container -->
<?php include "footer.php"; ?>
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