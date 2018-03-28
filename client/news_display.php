<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>News</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	/*session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{*/
	
?>	

<style>
#table1
{
}
#th
</style>


</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
       <form name="news" id="news" method="post" enctype="multipart/form-data">
       <center>
    <h2>News Form</h2>
    <hr />
    &nbsp;&nbsp;
   <table align="center" border="0" >

		<?php
	   
	 $id=$_GET["news_id"];
	   $sel="select * from news where news_id='$id'";
	   $row=mysql_query($sel) or die(mysql_error());
	   
	   while($d=mysql_fetch_array($row))
	   {
		   
		?>
 
    <tr>
    	<td><b>Title</b></td>
     	<td><?php echo $d['news_title'];?></td></tr>
        <tr><td><b>Date</b></td>
     	<td><?php echo $d['news_date'];?></td></tr>
        <tr><td><b>Description</b></td>
  	    <td><?php echo htmlentities($d['news_desc']);?></td></tr>
        
        
      <?php
	   }
	  ?>
    </table>	
</center> 
</form>


<?php
include "footer.php";
?>

</body>
</html>
