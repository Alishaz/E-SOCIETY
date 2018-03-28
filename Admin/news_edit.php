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
	$news_id=$_GET['news_id'];
	$a="select * from news where news_id=$news_id";
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
<h2>News Edit Form</h2>
<hr />
    	&nbsp;&nbsp;
        <table align="center" border="1">

        	<tr>
            	<td>Title</td>
                <td><input type="text" name="news_title" value="<?php echo $d['news_title']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Date</td>
                <td><input type="date" name="news_date" value="<?php echo $d['news_date']; ?>"></td>
            </tr>
            
            <tr>
            	<td>Description</td>
                <td><textarea name="news_desc"><?php echo htmlentities($d['news_desc']); ?></textarea></td>
            </tr>
                  
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
           <input type="button" value="Back" name="button" class="button" onclick="window.location='news_display.php';" />  </td>
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
		$title=$_POST['news_title'];
		$date=$_POST['news_date'];
		$desc=$_POST['news_desc'];
		
		$q="update news set news_title='$title', news_date='$date', news_desc='$desc'  where news_id=$_GET[news_id]";
		mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location='news_display.php';
		</script>";
	}
?>