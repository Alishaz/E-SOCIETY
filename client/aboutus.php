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
    <h2 align="center">About Us</h2>
    <hr><br>
    <p> E-Society is aimed for developing an Online Society Management for a society. We provide services like online maintenance, organise events, arrange meetings, post advertisement, news, complain. Members can give the feedback. Members can also arrange their personal events in society by online. They can view the events organised by committee members and can be a part of it. </p> <br>
    
<p>    Visitors can view the advertisement, news, gallery, frequently asked questions. They can also give the feedback. </p>  
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