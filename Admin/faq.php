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
	if(isset($_SESSION['adminlogin']))
	{
?>
<script>
function valid_data()
{
	var que=document.getElementById('faq_que');
	if(que.value=="")
	{
		alert("Enter Question");
		faq_que.focus();
		return false;
	}
	var ans=document.getElementById('faq_ans');
	if(ans.value=="")
	{
		alert("Enter Answer");
		faq_ans.focus();
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
     <form name="faq" id="faq" method="post">
     <center>
    <h2>FAQ Form</h2>
    <hr />
    &nbsp;&nbsp;
    <table align="center" border="0">
    <tr>
    	<td>Question</td>
        <td>&nbsp;<textarea name="faq_que" id="faq_que"></textarea></td>
     </tr>
     <tr>
     	 <td>Answer</td>
         <td>&nbsp;<textarea name="faq_ans" id="faq_ans"></textarea></td>
     </tr> 
     <tr><br>
     	 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='faq_display.php';"  /></td>
     </tr>
    </table>	
</cener> 
</form>
 
<?php
include "footer.php";
?>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$que=$_POST['faq_que'];
		$ans=$_POST['faq_ans'];
		
		$q="insert into faq(faq_que,faq_ans)values('$que','$ans')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='faq_display.php';
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