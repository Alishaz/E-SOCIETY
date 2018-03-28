<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="lightbox/css/lightbox.css" rel="stylesheet" type="text/css" />
<!--<link href="lightbox/css/screen.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="lightbox/js/jquery-1.11.0.min.js"> </script>
<script type="text/javascript" src="lightbox/js/lightbox.js"> </script>
<!--<script type="text/javascript" src="lightbox/js/lightbox.min.js"> </script>-->
 
<title>Gallery</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	/*if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<h4><b>Welcome $u</b></h4>"; */
		
		$dis="select * from gallery";
	$res=mysql_query($dis);
	

?>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
//include "paging1.php";
?>
 <div class="footer-top"></div>
      <form name="gallery" id="gallery" method="post" enctype="multipart/form-data">
      <div id="site_content">
     
      <div id="sidebar_container">
      </div>
      <div class="content_gallery">
 
  <h2 align="center">Gallery Form</h2>
   <hr />
    
 <?php		
			
			while($dis_row=mysql_fetch_array($res))
			{
		
		?>
	<div style="width:30%;float:left;margin-left:10px"><a class="example-image-link" href="Admin/upload/<?php echo $dis_row['image']; ?>" title="<?php echo $dis_row['gallery_name']; ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward." class="bwGal"  ><br /> 
		<img class="example-image" src="Admin/upload/<?php echo $dis_row['image']; ?>" width="250" height="150" /> </a></div>
	
    
   <?php
		}
		?>	
  
  </div>
  </div>
                
</form>

<?php
include "footer.php";
?>

</body>
</html>
<?php
/*}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
	*/
?>