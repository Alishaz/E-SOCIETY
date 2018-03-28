<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Report</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
	
?>
<!-- validation -->
	
<link href="style/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
 <form name="city" id="city" method="post">
 <center>
   <h2>Report Form</h2>
   <hr />
   &nbsp;&nbsp;
   <p><label><h3><a href="report/member_report.php"><u>Member Detail Report</u></a></h3></label></p>
     <p> <label><h3><a href="report/maintenance_report.php"><u>Maintenance Report</u></a></h3></label></p>
     <p> <label><h3><a href="report/complain_report.php"><u>Complain Report</u></a></h3></label></p>
     <p><label><h3><a href="report/meeting_report.php"><u>Meeting Report</u></a></h3></label></p>	
     <p><label><h3><a href="report/societyfund_report.php"><u>Society Fund</u></a></h3></label></p>
</center> 
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
			window.location='index.php';
			</script>";
	}

?>