<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Advertisement</title>
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
include "slider.php";
?>
 <div class="footer-top"></div>
       <form method="post" enctype="multipart/form-data" name="advertisement" id="adv">
       <center>
    <h2>Advertisement Form</h2>
    <hr />
    &nbsp;&nbsp;
     <table align="center" border="0">
   
    
    	 <?php
	   	$id=$_GET['adv_id'];
	   $sel="select * from advertisement where adv_id='$id'";
	   $row=mysql_query($sel) or die(mysql_error());
	   
	   while($d=mysql_fetch_array($row))
	   {
		   
		?>
    <tr>    
        <td align="center"><img src="upload/<?php echo $d['adv_img'];?>" height="150" width="150" /></td>
        <td><p><b>Name: &nbsp;</b>
            <?php echo $d['adv_name'];?></p>
          <p><b>Mobile No: &nbsp;</b>
           <?php echo $d['adv_mob'];?></p>
           <p><b>Email Id: &nbsp;</b>
           <?php echo $d['adv_email'];?></p>
           <p><b>Title: &nbsp;</b>
           <?php echo $d['adv_title'];?></p>
           <p><b>Description: &nbsp;</b>
           <?php echo htmlentities($d['adv_desc']);?></p>
           </td> 
     </tr>
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

