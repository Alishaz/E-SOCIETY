<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>FAQ</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$faq_id=$_GET['faq_id'];
	$a="select * from faq where faq_id=$faq_id";
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
<h2>FAQ Edit Form</h2>
<hr />
&nbsp;&nbsp;
    	<table align="center" border="1">
        	<tr>
            	<td>Question</td>
                <td><textarea name="faq_que" id="faq_que"><?php echo htmlentities($d['faq_que']);?></textarea></td>
            </tr>
            
            <tr>
            	<td>Answer</td>
                <td><textarea name="faq_ans" id="faq_ans"><?php echo htmlentities($d['faq_ans']);?></textarea></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
          <input type="button" value="Back" name="button" class="button" onclick="window.location='faq_display.php';"/></td>
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
		$que=$_POST['faq_que'];
		$ans=$_POST['faq_ans'];
		
		$q="update faq set faq_que='$que', faq_ans='$ans' where faq_id=$_GET[faq_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='faq_display.php';
		</script>";
	}
?>