<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>All Bill Receipt</title>
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<h4><b>Welcome $u</b></h4>";
	

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
       <form method="post" enctype="multipart/form-data" name="allbill" id="allbill">
       <center>
    <h2>Bill Receipts Form</h2>
    <hr />
    &nbsp;&nbsp;
     <table align="center" border="0">
   
    
    	 <?php
	   $u1=$_SESSION['u_id'];
	 
	  $q="select m.main_id,payment. * FROM  payment JOIN m maintenance ON m.main_id=payment.main_id";
	$result=mysql_query($q) or die(mysql_error());
	   while($d=mysql_fetch_array($result))
	   {
	   
		?>
    <tr>    
        <td><p><b>Name: &nbsp;</b>
            <?php echo $d['uname'];?></p>
          <p><b>Maintenance Amount: &nbsp;</b>
           <?php echo $d['fix_amt'];?></p>
           <p><b>Months: &nbsp;</b>
           <?php echo $d['months'];?></p>
           <p><b>Total Amount: &nbsp;</b>
           <?php echo $d['tot_amt'];?></p>
            <p><b>Date: &nbsp;</b>
           <?php echo $d['date'];?></p>
            <p><b>Account No: &nbsp;</b>
           <?php echo $d['acc_no'];?></p>
            <p><b>Bank Name: &nbsp;</b>
           <?php echo $d['bank_name'];?></p>
           <a href="adv_edit.php?adv_id=<?php echo $d['adv_id'];?>&amp;action=edit" class="font"> <img src="style/images/edit.png" width="30" height="30" class="right"/></a> 
     </tr>
     <tr>
     <td>&nbsp;&nbsp; </td>
     <td>&nbsp;&nbsp; </td>
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
<?php
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
	
?>
