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
	if(isset($_SESSION['adminlogin']))
	{

?>
<script>
function valid_data()
{
	var name=document.getElementById('gallery_name');
	if(name.value=="")
	{
		alert("Enter Gallery Name");
		gallery_name.focus();
		return false;
	}
	var img=document.getElementById('gallery_image');
	if(img.value=="")
	{
		alert("Select Image");
		gallery_image.focus();
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
    <form name="gallery" id="gallery" method="post" enctype="multipart/form-data">
    <h2 align="center">Gallery Form</h2>
    &nbsp;&nbsp;<table align="center" border="0">
    <tr>
    	<td>Name</td>
        <td>&nbsp;<input type="text" name="gallery_name" id="gallery_name" /></td>
     </tr>
     <tr>
     	 <td>Image</td>
         <td>&nbsp;<input type="file" name="image" id="gallery_image"/></td>
     </tr>
     <tr>
     	 <td colspan="3" align="center"><input type="submit" name="submit" value="Submit" id="submit" class="button" onclick="return valid_data();"/>
         <input type="reset" value="Cancel" name="reset" class="button" onclick="window.location='gallery_display.php';"  /></td>
     </tr>
    </table>	
</form>

<?php
include "footer.php";
?>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		//echo "hii";
		if(@is_uploaded_file($_FILES['image']['tmp_name']))
		{
			copy($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);
		{
		$name=$_POST['gallery_name'];
		$image=$_FILES['image']['name'];
		
		$q="insert into gallery(gallery_name,image)values('$name','$image')";
		mysql_query($q) or die(mysql_error());
		echo "<script> alert('record inserted successfully');
		window.location='gallery_display.php';
		</script>";
		}
		}
	}
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}
?>