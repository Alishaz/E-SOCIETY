<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Gallery</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	$gallery_id=$_GET['gallery_id'];
	$a="select * from gallery where gallery_id='$gallery_id'";
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
<form method="post" enctype="multipart/form-data">
<center>
<h2>Gallery Edit Form</h2>
<hr />
    	&nbsp;&nbsp;
        <table align="center" border="1">
        	<tr>
            	<td>Name</td>
                <td><input type="text" name="gallery_name" value="<?php echo $d['gallery_name']?>"></td>
            </tr>
            
            <tr>
            	<td>Image</td>
                <td><img src="upload/<?php echo $d['image'];?>" height="100" width="100" />
                <input type="file" name="image" value="<?php echo $d['image']; ?>"></td>
            </tr>      
            <tr>
            	<td colspan="2" align="center"> <input type="submit" name="submit" value="Update" class="button">
        <input type="button" value="Back" name="button" class="button" onclick="window.location='gallery_display.php';"  /></td>
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
		if(@is_uploaded_file($_FILES['image']['tmp_name']))
		{
			copy($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);	
			$image=$_FILES['image']['name'];
		}
		else
		{
			$image=$d['image'];
		}
		$name=$_POST['gallery_name'];
			$q="update gallery set gallery_name='$name', image='$image' where gallery_id='$gallery_id'";
		$s=mysql_query($q) or die(mysql_error());
		
		echo "<script> alert('record updated');
		window.location.href='gallery_display.php';
		</script>";
	
	}
?>