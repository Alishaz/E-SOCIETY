<?php
	include 'connection.php';
	session_start();
	if(isset($_SESSION['adminlogin']))
	{
		header("location:home.php");
	}
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
<?php
	$msg='';
	if(isset($_POST['submit']))
	{
		$uname=$_POST['uname'];	
		$pwd=$_POST['pwd'];
		$q="select * from adminlogin where uname='$uname' and pwd='$pwd'";
		$data=mysql_query($q);
		
		if(mysql_fetch_array($data))
		{
				$_SESSION['adminlogin']=$uname;
				echo "<script>alert('Login successfully');
				window.location='home.php';
				</script>";
		}
		else if($uname=='' && $pwd=='')
		{
			$msg="Please Enter Username And Password";
		}
		else
		{
			$msg="Enter Valid Username And Password";	
		}
	}
	
?>

</head>
<body>
<!-- Fullscreen backgrounds -->
<div id="thumbs">
<a href="style/images/art/bg1.jpg">1</a>
<a href="style/images/art/bg2.jpg">2</a>
<a href="style/images/art/bg3.jpg">3</a>
<a href="style/images/art/bg4.jpg">4</a>
<a href="style/images/art/bg5.jpg">5</a>
<a href="style/images/art/bg6.jpg">6</a>
</div>
<div id="superbgimage">
	<div class="scanlines"></div>
</div>
<!-- End Fullscreen backgrounds -->
<!-- Begin Wrapper -->
<div id="wrapper">
  <div id="header">
    <div class="logo opacity"><!--<a href="index.html"><img src="style/images/logo1.jpg" alt="" /></a>-->
   <h1><font color="#0099CC">E-Society</font></h1>
    </div>
    <div class="social">
      <ul>
        <li><a href="https://www.facebook.com/"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
        <li><a href="https://twitter.com/"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <!--Menu-->
  <!-- End Menu --> 
  
  <!-- Begin Container -->
  <div id="container" class="opacity"> 
    
    <!-- Begin Showcase -->
    <div id="showcase" class="showcase"> 
      <!-- Each child div in #showcase represents a slide -->
      <div class="showcase-slide"> 
        <!-- Put the slide content in a div with the class .showcase-content. -->
        <div class="showcase-content"> <img src="style/images/art/s1.jpg" alt="1" /> </div>
      </div>
      
      <!-- Each child div in #showcase represents a slide -->
      <div class="showcase-slide"> 
        <!-- Put the slide content in a div with the class .showcase-content. -->
        <div class="showcase-content"> <img src="style/images/art/s2.jpg" alt="2" /> </div>
        <div class="showcase-caption">
		</div>
      </div>
      
      <div class="showcase-slide"> 
        <!-- Put the slide content in a div with the class .showcase-content. -->
         <div class="showcase-content">
        <!--  <iframe src="http://player.vimeo.com/video/24243147?title=0&amp;byline=0&amp;portrait=0" width="900" height="400" frameborder="0"></iframe>--> <img src="style/images/art/s5.jpg" alt="3"/> 
        </div>
      </div>
      
      <!-- Each child div in #showcase represents a slide -->
      <div class="showcase-slide"> 
        <!-- Put the slide content in a div with the class .showcase-content. -->
        <div class="showcase-content"> <img src="style/images/art/s3.jpg" alt="3" /> </div>
      </div>
      <!-- Each child div in #showcase represents a slide -->
      <div class="showcase-slide"> 
        <!-- Put the slide content in a div with the class .showcase-content. -->
        <div class="showcase-content"> <img src="style/images/art/s4.jpg" alt="4" /> </div>
         <div class="showcase-caption">
		</div>
      </div>
    </div>
    <!-- End Showcase -->
    
    <!-- Begin Top Columns -->
      
     <!-- Form -->
      <div class="footer-top"></div>
 <form name="login" id="login" method="post">
	<center>
    <h2>Login Form</h2>
    <hr />
    	&nbsp;&nbsp;
    <table align="center">
    <tr>
    <td>UserName</td>
    <td><input type="text" name="uname" id="username" /></td>
     </tr>
    <tr>
   <td>Password</td> 
   <td><input type="password" name="pwd" id="password" /></td>
   </tr>
   <tr>
   <td colspan="2" align="center"><br /><?php echo "<b>$msg"; ?></td>
   </tr>
   <tr><td colspan="2"  align="center">
   <input type="submit" name="submit" value="Submit" class="button" onclick="home.php" /></td></tr>
  
</center> 
</table>
</form>

        <!-- End Form --> 
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!-- End Container -->
  
  <div id="copyright" class="opacity">
    <p>© 2015 E-Society Provided by Alisha Zaveri & Pooja Patel</p>
  </div>
</div>
<!-- End Wrapper --> 

<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>