<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>E-Society</title>
<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.png" />
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
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.forms').dcSlickForms();
});
</script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			900,
		content_height:			400,
		auto:					true,
		interval:				3000,
		continuous:				false,
		arrows:					true,
		buttons:				true,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				'fade', /* hslide/vslide/fade */
		transition_delay:		0,
		transition_speed:		500,
		show_caption:			'onload' /* onload/onhover/show */
	});
});

</script>

</head>
<body>
<!-- Fullscreen backgrounds -->
<div id="thumbs">
<a href="style/images/art/bg1.jpg"></a>
<!--<a href="style/images/art/bg2.jpg"></a>
<a href="style/images/art/bg3.jpg"></a>
<a href="style/images/art/bg4.jpg"></a>
<a href="style/images/art/bg5.jpg"></a>
<a href="style/images/art/bg6.jpg"></a>-->
</div>
<div id="superbgimage">
	<div class="scanlines"></div>
</div>
<!-- End Fullscreen backgrounds -->
<!-- Begin Wrapper -->
<div id="wrapper">
  <div id="header">
   <div class="logo opacity"><a href="index.php"><img src="images/logo5.png" width="50"/><img src="images/e4.png" alt="" width="100" /></a>
   <!--<h1><font color="#0099CC">E-Society</font></h1>-->
    </div>
    <div class="social">
      <ul>
        <li><a href="https://www.facebook.com/"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
        <li><a href="https://twitter.com/"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>
      </ul>
    </div>
  </div>
  <h4 align="right"><a href="changepass.php">Change Password</a></h4>
  <!-- <div class="clear"></div>
  Begin Menu -->
<div id="menu" class="menu opacity">
    <ul>
      <li><a href="home.php">Home</a></li>
      
      <li><a href="">Portfolio</a>
        <ul>
        	<li><a href="myprofile_display.php">Profile</a>
            <ul><li><a href="allmember_display.php">All Members</a></li></ul></li>
        	<li><a href="adv1_display.php">Advertisement</a></li>
      	  <li><a href="event_display.php">Events</a>
          <ul><li><a href="place_permission.php">Permission</a></li></ul></li>
          <li><a href="gallery_display.php">Gallery</a></li>
          <li><a href="news1_display.php">News</a></li>
        </ul>
      </li>
      
      <li><a href="">Services</a>
        <ul>
        <li><a href="meeting_display.php">Meetings</a></li>
          <li><a href="complain_display.php">Complain</a></li>
    	<li><a href="maintenance.php">Maintenance</a>
          <ul><li><a href="allbill_display.php">Bill Receipt</a></li></ul>
          </li>
          <li><a href="#">Society Fund</a>
          <ul>
          <li><a href="income_display.php">Income</a></li>
          <li><a href="expense_display.php">Expense</a></li></ul></li>
        </ul>
      </li>
      
      <li><a href="faq_display.php">Faq</a></li>
      <li><a href="feedback_display.php">Feedback</a></li>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
     <!-- <li><a href="changepass.php">ChangePassword</a></li> -->
      <li><a href="logout.php">logout</a></li> 
    </ul>
        <br style="clear: left" />
  </div>
  <!-- End Menu --> 
			