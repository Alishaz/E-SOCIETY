<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<script type="text/javascript" src="style/js/modernizr-1.5.min.js"></script>
<script type="text/javascript" src="style/js/modernizr.custom.29473.js"></script>
<script src="style/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="style/js/jquery-ui-1.9.2.accordion.custom.min.js" type="text/javascript"></script>
<title>FAQ</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
/*	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
	}*/
		$s1 = "SELECT * FROM faq";
	$re1 = mysql_query($s1) or die(mysql_error());	

?>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
 
<div class="content">
 <h1>Frequently Asked Questions? </h1>
  <div class="container">
    <section class="ac-container">
      <?php
	  
		$i=1;
		
		while($f3=mysql_fetch_array($re1))
		{
		?>

      <div>
        <input id="ac-<?php echo $i; ?>" name="accordion-1" type="checkbox" />
        
        <label for="ac-<?php echo $i; ?>">
          <?php
		
			echo  $f3['faq_que'] . "<br/>";
    		?>
        </label>
        <article class="ac-small">
          <p>
            <?php
		
			echo  html_entity_decode($f3['faq_ans']) . "<br/>";
		?>
          </p>
        </article>
      </div>
      <?php
		$i++;
		}
				?>
    </section>
 
  </div>
</div>
     <div style="clear:both"></div>
<?php
include "footer.php";
?>

</body>
</html>
