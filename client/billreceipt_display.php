<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Bill Receipt</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	//$id=$_GET['main_id'];
//	$q="select p.*,m.* from payment AS p JOIN maintenance AS m ON m.main_id=$id";
//	$result=mysql_query($q) or die(mysql_error());
//	   while($row=mysql_fetch_array($result))
//	   {
//		   	$months=$row['months'];
//			$tot_amt=$row['tot_amt'];
//			$date=$row['date'];
//		   	$acc_no=$row['acc_no'];
//			$bank_name=$row['bank_name'];
//	   }
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
			echo "<br><h3><b>Welcome $u</b></h3>";
			
?>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
       <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <center>
    <h2>Bill Receipt</h2>
    <hr />
    &nbsp;&nbsp; 
    <?php
	   $order_id=$_GET['order_id'];
	   $sel="select * from maintenance where order_id=$order_id";
	$d=mysql_query($sel) or mysql_error();
	$f=mysql_fetch_array($d);
		?>
    <table align="center" border="0">
    <tr>
     	 <td width="50%">Name</td>
        <td>&nbsp;<label name="uname" id="uname" value="" ><?php echo $u?></label></td>
     </tr>
      <tr>
     	 <td>Maintenance Amount</td>
         <td>&nbsp;<label name="fix_amt" id="fix_amt" /><?php echo $f['fix_amt']; ?></label></td>
     </tr>
     <tr>
     	 <td>Months</td>
         <td>&nbsp;<label name="months" id="months"><?php echo $f['months'];?></label></td>
     </tr>
     <tr>
     	 <td>Total Amount</td>
         <td>&nbsp;<label name="tot_amt" id="tot_amt" ><?php echo $f["tot_amt"];?></label></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<label name="date" id="date" ><?php echo $f["date"];?></label></td>
     </tr>
     <!--<tr>
     	<td>Account No.</td>
        <td>&nbsp;<label name="acc_no" id="acc_no"><?php /*?><?php echo $acc_no?><?php */?></label></td>
     </tr>-->
     <!--<tr>
     	<td>Bank Name</td>
        <td>&nbsp;<label name="bank_name" id="bank_name"><?php /*?><?php echo $bank_name?><?php */?></label></td>
     </tr>-->
      <tr>
     	
        <input type="hidden" name="main_id" value="<?php echo $main_id; ?>"/>



<input type="hidden" name="cmd" value="_cart">

<input type="hidden" name="business" value="gaurang@gmail.com">

<input type="hidden" name="lc" value="USD">

<input type="hidden" name="item_name" value="SMES By Gaurang">

<input type="hidden" name="amount" value="<?php echo $f['tot_amt'];?>">

<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="button_subtype" value="products">

<input type="hidden" name="no_note" value="0">

<input type="hidden" name="add" value="1">

<input type="hidden" name="bn" value="12345">

     </tr>
    </table>
  
<input type="image" src="style/images/btn_paynow_SM.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" value="submit">

<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" name="submit">
	
</center> 
</form>
<?php
include "footer.php";
?>
</body>
</html>

<?php
	
	if(isset($_POST['submit']))
	{
		
		 $sel1="select * from maintenance where order_id=$order_id";
		 $d1=mysql_query($sel1) or mysql_error();
	$f1=mysql_fetch_array($d1);

//		echo "Hi..";
			$u_id=$_SESSION['u_id'];
			$mainid=$f1['main_id'];
			$total=$f1['tot_amt'];
			$mon=$f1['months'];
			$date=$f1['date'];
			//$bname=$_POST['bank_name'];
			
	$qu="insert into payment(u_id,mainid,tot_amt,months,date)values('$u_id','$main_id','$total','$mon','$date')";
	mysql_query($qu) or die(mysql_error());
			//$main_id=mysql_insert_id();
	//header("location:payment.php?total=$total&&months=$mon&&date=$date&&main_id=$main_id");

}
	
}
?>