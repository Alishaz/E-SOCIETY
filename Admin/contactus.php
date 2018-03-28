<?php
include('connection.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>E-Society</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/color/red.css" media="all" />
<link rel="stylesheet" type="text/css" media="screen" href="style/css/prettyPhoto.css"  />
<link rel="stylesheet" type="text/css" href="style/type/museo.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/ptsans.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/charis.css" media="all" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/transify.js"></script>
<script type="text/javascript" src="style/js/jquery.aw-showcase.js"></script>
<script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="style/js/carousel.js"></script>
<script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="style/js/jquery.superbgimage.min.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
</head>
<body>

  <!-- Begin Menu -->
  <?php 
include "Header.php";
include "Slider.php";
?>
  <!-- End Showcase -->
    <div class="hr2"></div>
    <!-- Divider -->
    <!-- Begin Top Columns -->
    <!-- End Top Columns -->
    <h2 align="center">Contact Us</h2>
<hr />
<br />

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
    <p>  <label for="name">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="name" id="name" /></p><br>
    <p> 
          <label for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="email" id="email" /></p><br>
  <p>
          <label for="message">Message</label>&nbsp;&nbsp;
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