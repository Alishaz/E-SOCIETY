<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>News</title>
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
	var title=document.getElementById('news_title');
	if(title.value=="")
	{
		alert("Enter News Title");
		news_title.focus();
		return false;
	}
	var date=document.getElementById('news_date');
	if(date.value=="")
	{
		alert("Enter News Date");
		news_date.focus();
		return false;
	}
	var desc=document.getElementById('news_desc');
	if(desc.value=="")
	{
		alert("Enter News Description");
		news_desc.focus();
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
  <form name="news" id="news" method="post">
  <center>
    <h2>News Form</h2>
    <hr />
    &nbsp;&nbsp;
    <table align="center" border="0">
    <tr>
    	<td>Title</td>
        <td>&nbsp;<input type="text" name="news_title" id="news_title"  /></td>
     </tr>
     <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="news_date" id="news_date" /></td>
     </tr>
     <tr>
     	 <td>Description</td>
         <td>&nbsp;<textarea name="news_desc" id="news_desc"></textarea></td>
     </tr>
     <tr>
     	 <td colspan="3" align="center"><input type="submit" name="submit" value="Submit" class="button" id="submit" onclick="return valid_data();" />
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='news_display.php';"  /></td>
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
		$title=$_POST['news_title'];
		$date=$_POST['news_date'];
		$desc=$_POST['news_desc'];
		
		$q="insert into news(news_title,news_date,news_desc)values('$title','$date','$desc')";
			mysql_query($q) or die(mysql_error());
			echo "<script> alert('record inserted successfully');
			window.location='news_display.php';
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