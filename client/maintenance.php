<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Maintenance</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	$u1=$_SESSION['u_id'];
	$a="select * from profile where u_id=$u1";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
		
	
?>
<!--<script>
function valid_data()
{
	var name=document.getElementById('uname');
	if(name.value=="")
	{
		alert("Enter Your Name");
		uname.focus();
		return false;
	}
	var famt=document.getElementById('fix_amt');
	if(famt.value=="")
	{
		alert("Please Enter Maintenance Amount");
		fix_amt.focus();
		return false;
	}
	var month=document.getElementById('months');
	if(month.selectedIndex<1)
	{
		alert("Please select months");
		months.focus();
		return  false;
	}
	var tamt=document.getElementById('tot_amt');
	if(tamt.selectedIndex<1)
	{
		alert("Please select Total Amount");
		tot_amt.focus();
		return  false;
	}
	var date=document.getElementById('date');
	if(date.value=="")
	{
		alert("Please Enter Date");
		date.focus();
		return false;
	}
}
</script>-->

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
        <form name="main" method="post" action="">
  <center>
    <h2>Maintenance Form</h2>
    <hr />
    &nbsp;&nbsp; 
    <table align="center" border="0">
     <tr>
     	 <td>Name</td>
         <td>&nbsp;<input type="text" name="uname" id="uname" value="<?php  echo $d['name'];?>" readonly="readonly" /></td>
     </tr>
     <tr>
     	 <td>Maintenance Amount</td>
         <td>&nbsp;<input type="text" name="fix_amt" id="fix_amt" readonly="readonly" value="500" readonly="readonly"/></td>
     </tr>
     <tr>
     	 <td>Months</td>
         <td>&nbsp;<select id="months" name="months">
         <option value="">Select</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         </select></td>
     </tr>
     <tr>
     	 <td>Total Amount</td>
         <td>&nbsp;<input type="text" name="tot_amt" id="tot_amt" /></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="date" id="date" /></td>
     </tr>
     <!-- <tr>
     	 <td>Bank Name</td>
         <td>&nbsp;<select id="bank_name" name="bank_name">
         <option value="">Select</option>
         <option value="Axis Bank">Axis Bank</option>
         <option value="Bank of Baroda">Bank of Baroda</option>
         <option value="ICICI Bank">ICICI Bank</option>
         <option value="HDFC Bank">HDFC Bank</option>
         <option value="Indian Bank">Indian Bank</option>
         <option value="Punjab National Bank">Punjab National Bank</option>
         <option value="Dena Bank">Dena Bank</option>
         <option value="IDBI Bank">IDBI Bank</option>
         <option value="State Bank Of India">State Bank Of India</option>
         <option value="Bank Of India">Bank Of India</option>
         <option value="Central Bank">Central Bank</option>
         <option value="Kalupur Co-operative Bank">Kalupur Co-operative Bank</option>
         </select></td>
     </tr>
     -->
     <tr>
     	 <td colspan="6" align="center"><input type="submit" name="submit" id="submit" value="Pay" class="button" onclick="return valid_data();" />&nbsp;&nbsp;
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

<script type="text/javascript">
var total_amt=document.getElementById("tot_amt").value;
var months=document.getElementById("months").value;
var date=document.getElementById("date").value;
$(document).ready(function()
{
	$("#months").click(function(){
		var month=$("select option:selected").val();

		$("#tot_amt").val(500*month);

		});
		
});
</script>
<?php
	
	if(isset($_POST['submit']))
	{
			$u_id=$_SESSION['u_id'];
			$name=$_POST['uname'];
			$fix=$_POST['fix_amt'];
			$mon=$_POST['months'];
			$total=$_POST['tot_amt'];
			$date=$_POST['date'];
			//$bname=$_POST['bank_name'];
			$order_id=rand(1000,50000);
			
	$q="insert into maintenance(u_id,order_id,uname,fix_amt,months,tot_amt,date)values('$u_id','$order_id','$name','$fix','$mon','$total','$date')";
	mysql_query($q) or die(mysql_error());
			//$main_id=mysql_insert_id();
	//header("location:payment.php?total=$total&&months=$mon&&date=$date&&main_id=$main_id");
	echo "<script>window.location='billreceipt_display.php?order_id=$order_id';
  </script>";

}
	
?>


