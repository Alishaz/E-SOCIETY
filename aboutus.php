<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>About Us</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
?>

</head>

<body>
<?php 
include "Header.php";
include "Slider.php";
?>
<h2 align="center">About Us</h2>
<hr /><br />
<p>This system works online so it saves the time. Society member dont't know their pending or penalty amount so they go to society  office for inquiry.Society members can post their advertisement.</p>
            


<div >
        <h2><span>Services</span></h2>
        <p>This is all about services.It will work for online payments,online customer support,online adsrvatisesment,etc...</p>
        <ul class="fbg_ul">
          <li><a href="#">For offical Use  Only.</a></li>
          <li><a href="#">For online manage all funcitions of home.</a></li>
          <li><a href="#">Leagal Website System.</a></li>
        </ul>
      </div>
      <div>
        <h2><span>Contact</span></h2>
        <p>This will help for online support.or if you have any queery then contact us..
		    Thanks.</p>
        <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
          <span>Telephone:</span> +123-1234-5678<br />
          <span>FAX:</span> +458-4578<br />
          <span>Others:</span> +301 - 0125 - 01258<br />
          <span>E-mail:</span> <a href="#">maiil@esociety.co.in</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>

<?php
include "footer.php";
?>
</body>
</html>
