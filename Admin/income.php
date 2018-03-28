<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Income</title>
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
	var amt=document.getElementById('income_amt');
	if(amt.value=="")
	{
		alert("Enter Income Amount");
		income_amt.focus();
		return false;
	}
	var year=document.getElementById('income_year');
	if(year.value=="")
	{
		alert("Enter Year");
		income_year.focus();
		return false;
	}
	var title=document.getElementById('income_title');
	if(title.value=="")
	{
		alert("Enter Income Title");
		income_title.focus();
		return false;
	}
	var desc=document.getElementById('income_desc');
	if(desc.value=="")
	{
		alert("Enter Description of Income");
		income_desc.focus();
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
        <form name="income" id="income" method="post">
  <center>
    <h2>Income Form</h2>
    <hr />
    &nbsp;&nbsp; 
    <table align="center" border="0">
    <tr>
    	<td>Amount</td>
        <td>&nbsp;<input type="text" name="income_amt" id="income_amt" /></td>
     </tr>
     <tr>
     	 <td>Year</td>
         <td>&nbsp;<input type="text" name="income_year" id="income_year" /></td>
     </tr>
     <tr>
     	 <td>Title</td>
         <td>&nbsp;<input type="text" name="income_title" id="income_title" /></td>
     </tr>
     <tr>
     	 <td>Description</td>
         <td>&nbsp;<textarea name="income_desc" id="income_desc"></textarea></td>
     </tr>
     <tr>
     	 <td colspan="3" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='income_display.php';"  /></td>
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
		$amt=$_POST['income_amt'];
		$year=$_POST['income_year'];
		$title=$_POST['income_title'];
		$desc=$_POST['income_desc'];
		
		$q="insert into income(income_amt,income_year,income_title,income_desc)values('$amt','$year','$title','$desc')";
		mysql_query($q) or die(mysql_error());
		echo "<script> alert('record inserted successfully');
		window.location='income_display.php';
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