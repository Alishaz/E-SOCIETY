<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Payment</title>
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<h4><b>Welcome $u</b></h4>";
	
?>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
        <form name="payment" id="payment" method="post">
  <center>
    <h2>Payment Form</h2>
    <hr />
    &nbsp;&nbsp; 
    <table align="center" border="0">
     <tr>
     	 <td>Bank Account No.</td>
         <td>&nbsp;<input type="text" name="acc_no" id="acc_no" /></td>
     </tr>
     <tr>
     	 <td>Total Amount</td>
         <td>&nbsp;<input type="text" name="tot_amt" id="tot_amt"  value="<?php echo $_GET["total"];?>" readonly="readonly"/></td>
     </tr>
     <tr>
     	 <td>Months</td>
         <td>&nbsp;<input type="text" name="months" id="months" value="<?php echo $_GET["months"];?>" readonly="readonly"/></td>
     </tr>
     <tr>
     	 <td>Society Account No.</td>
         <td>&nbsp;<input type="text" name="soc_acct" id="soc_acct" /></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="date" id="date" value="<?php echo $_GET["date"];?>" readonly="readonly"/></td>
     </tr>
      <tr>
     	 <td colspan="6" align="center"><input type="submit" name="submit" id="submit" value="OK" class="button" />&nbsp;&nbsp;
         <input type="reset" name="button" value="Cancel" class="button" /></td>
     </tr>
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

?>

<?php
	
	if(isset($_POST['submit']))
	{
			$u_id=$_SESSION['u_id'];
			$main_id=$_GET["main_id"];
			$acc=$_POST['acc_no'];
			$total=$_POST['tot_amt'];
			$mon=$_POST['months'];
			$soc=$_POST['soc_acct'];
			$date=$_POST['date'];
			
	$q="insert into payment(u_id,main_id,acc_no,tot_amt,months,soc_acct,date)values('$u_id','$main_id','$acc','$total','$mon','$soc','$date')";
	mysql_query($q) or die(mysql_error());
	//$id=mysql_insert_id();
	header("location:billreceipt_display.php?main_id=$main_id");
	

}
	
?>
