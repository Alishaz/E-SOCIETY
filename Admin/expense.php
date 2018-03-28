 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Expense</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
?>
<script>
function valid_data()
{
	var year=document.getElementById('exp_year');
	if(year.value=="")
	{
		alert("Enter Expense Year");
		year.focus();
		return false;
	}
	var subject=document.getElementById('exp_sub');
	if(subject.value=="")
	{
		alert("Enter Expense Subject");
		exp_sub.focus();
		return false;
	}
	var amount=document.getElementById('exp_amt');
	if(amount.value=="")
	{
		alert("Enter Expense Amount");
		exp_amt.focus();
		return false;
	}
}
</script>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
      <form name="expense" id="expense" method="post">
      <center>
    <h2>Expense Form</h2>
    <hr />
    &nbsp;&nbsp; 
    <table align="center" border="0">
    <tr>
    	<td>Year</td>
        <td>&nbsp;<input type="text" name="exp_year" id="exp_year" /></td>
     </tr>
     <tr>
     	 <td>Subject</td>
         <td>&nbsp;<textarea name="exp_sub" id="exp_sub"></textarea></td>
     </tr>
     <tr>
     	 <td>Amount</td>
         <td>&nbsp;<input type="text" name="exp_amt" id="exp_amt" /></td>
     </tr>

     <tr>
     	 <td colspan="3" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='expense_display.php';"  /></td>
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
	if(isset($_POST['submit']))
	{
		$year=$_POST['exp_year'];
		$sub=$_POST['exp_sub'];
		$amt=$_POST['exp_amt'];
		
		$q="insert into expense(exp_year,exp_sub,exp_amt)values('$year','$sub','$amt')";
		mysql_query($q) or die(mysql_error());
		echo "<script> alert('record inserted successfully');
		window.location='expense_display.php';
		</script>";
	}
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}
?>