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
	$exp_id=$_GET['exp_id'];
	$a="select * from expense where exp_id=$exp_id";
	$b=mysql_query($a) or die(mysql_error());
	$d=mysql_fetch_array($b);
?>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
  <form method="post">
  <center>
<h2>Expense Edit Form</h2>
<hr />
    	&nbsp;&nbsp;
        <table align="center" border="1">

        	<tr>
            	<td>Year</td>
                <td><input type="text" name="exp_year" value="<?php echo $d['exp_year'];?>"></td>
            </tr>
            
            <tr>
            	<td>Subject</td>
                <td><textarea name="exp_sub"><?php echo htmlentities($d['exp_sub']); ?></textarea></td>
            </tr>
            
            <tr>
            	<td>Amount</td>
                <td><input type="text" name="exp_amt" value="<?php echo $d['exp_amt']; ?>"></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button"> <input type="button" value="Back" name="button" class="button" onclick="window.location='expense_display.php';"/></td>
            <br /></tr>
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
		//echo "hi";	
		$year=$_POST['exp_year'];
		$sub=$_POST['exp_sub'];
		$amount=$_POST['exp_amt'];
		
		$q="update expense set exp_year='$year', exp_sub='$sub', exp_amt='$amount' where exp_id=$_GET[exp_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='expense_display.php';
		</script>";
	}
?>