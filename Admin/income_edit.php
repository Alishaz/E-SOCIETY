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
	$income_id=$_GET['income_id'];
	$a="select * from income where income_id=$income_id";
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
<h2>Income Edit Form</h2>
<hr />
    	&nbsp;&nbsp;
        <table align="center" border="1">
        	<tr>
            	<td>Amount</td>
                <td><input type="text" name="income_amt" value="<?php echo $d['income_amt']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Year</td>
                <td><input type="text" name="income_year" value="<?php echo $d['income_year']; ?>"></td>
            </tr>
            <tr>
            	<td>Title</td>
                <td><input type="text" name="income_title" value="<?php echo $d['income_title']; ?>"></td>
            </tr>
            <tr>
            	<td>Description</td>
                <td><textarea name="income_desc"><?php echo htmlentities($d['income_desc']); ?></textarea></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
           <input type="button" value="Back" name="button" class="button" onclick="window.location='income_display.php';"/></td>
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
		//echo "hi";	
		$amt=$_POST['income_amt'];
		$year=$_POST['income_year'];
		$title=$_POST['income_title'];
		$desc=$_POST['income_desc'];
		
		$q="update income set income_amt='$amt', income_year='$year', income_title='$title', income_desc='$desc'  where income_id=$_GET[income_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='income_display.php';
		</script>";
	}
?>