<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Complain</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
		$u1=$_SESSION['u_id'];
		$a="select * from profile where pro_id=$u1";
		$b=mysql_query($a) or die(mysql_error());
		$d=mysql_fetch_array($b);

	
?>
<script>
function valid_data()
{
	//var name=document.getElementById('name');
//	if(name.value=="")
//	{
//		alert("Enter Your Name");
//		name.focus();
//		return false;
//	}
	var ctype=document.getElementById('complain_type');
	if(ctype.selectedIndex<1)
	{
		alert("Please select Complain type");
		complain_type.focus();
		return  false;
	}
	var block=document.getElementById('block');
	if(block.selectedIndex<1)
	{
		alert("Please select Block Name");
		block.focus();
		return  false;
	}
	var date=document.getElementById('date');
	if(date.value=="")
	{
		alert("Please Enter Date");
		date.focus();
		return false;
	}
	var title=document.getElementById('comp_title');
	if(title.value=="")
	{
		alert("Please Enter Title");
		comp_title.focus();
		return false;
	}
	var msg=document.getElementById('comp_desc');
	if(msg.value=="")
	{
		alert("Enter Your Complain Message");
		comp_desc.focus();
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
<form name="complain" id="complain" method="post">
  	<center>
    <h2>Complain Form</h2>
    <hr/>
    &nbsp;&nbsp;
    <table align="center" border="0">
	  <tr>
     	 <td>Name</td>
         <td>&nbsp;<input type="text" name="uname" id="uname" value="<?php if(!empty($d['name'])) echo $d['name'];?>" readonly="readonly"/></td>
     </tr>
     <tr>
     	<td>Complain Type</td>
    	<td>&nbsp;<select id="complain_type" name="complain_type">
         <option value="">Select</option>
         <option value="common">common</option>
         <option value="personal">personal</option>
         
         </select></td>
     </tr>     
   
      <tr class="block">
     	 <td>Block</td>
         <td>&nbsp;<select id="block" name="block">
         <option value="">Select</option>
         <option value="A">A</option>
         <option value="B">B</option>
         <option value="C">C</option>
         </select></td>
     </tr>
    <tr>
     	 <td>Date</td>
         <td>&nbsp;<input type="date" name="date" id="date" /></td>
     </tr>
     <tr>
     	 <td>Title</td>
         <td>&nbsp;<input type="text" name="comp_title" id="comp_title" /></td>
     </tr>
     <tr>
     	 <td>Description</td>
         <td>&nbsp;<textarea name="comp_desc" id="comp_desc"></textarea></td>
     </tr>
     
    </table>	
 <p><a href="complain_display.php"><input type="submit" name="submit" value="Submit" class="button" onclick="return valid_data();" /></a>
 <input type="reset" name="cancel" value="Cancel" class="button" onclick="window.location='complain_display.php'" /></p>  
</center> 
</form>
<?php
include "footer.php";
?>

</body>
</html>
<?php
}
?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#block").click(function(){
	console.log($("select option:selected").val());
	});
	$("#complain_type").click(function(){
	if($("select option:selected").val()=="common")
	{
		$(".block").hide();
	}
	else
	{
		$(".block").show();
	}
	});
});
</script>
<?php
if(isset($_POST['submit']))
	{
		
		$u_id=$_SESSION['u_id'];
		$name=$_POST['uname'];
		$block=$_POST['block'];
		$date=$_POST['date'];
		$title=$_POST['comp_title'];
		$desc=$_POST['comp_desc'];
		
		if($_POST['complain_type']=='common')
		{
			$status=0;
		}
		else
		{
			$status=1;
		}
		
	$q="insert into complain(u_id,uname,block,date,comp_title,comp_desc,status)values('$u_id','$name','$block','$date','$title','$desc','$status')";
	mysql_query($q) or die(mysql_error());
		echo "<script> alert('Complain Posted successfully.');
			window.location='complain_display.php';
			</script>";	
	}
?>
