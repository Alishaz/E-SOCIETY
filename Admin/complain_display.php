<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Complain</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
	
?>
<!-- validation -->
	
<!--<link href="style/css/prettyPhoto.css" rel="stylesheet" type="text/css" />-->
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
   <hr />
   &nbsp;&nbsp;
  <p align="center"><b>Complain Type</b>
  <!-- <input type="radio" name="complain_type" value="common" id="complain_type" checked="Check"/><b>common</b>
            <input type="radio" name="complain_type" value="personal" id="complain_type" /><b>personal</b>-->
             <select id="complain_type" name="complain_type">
         <option value="">Select</option>
         <option value="common">common</option>
         <option value="personal">personal</option>
         
         </select>
            </p></center>
            <br />
            <div id="ajax">

      <table align="center" border="1">
    <tr align="center">
       	<td><b>#</b></td>
    	<td><b>ID</b></td>
    	<td><b>Name</b></td>
        <td class="block"><b>Block</b></td>
        <td><b>Date</b></td>
        <td><b>Title</b></td>
        <td><b>Description</b></td>
		<td colspan="2"><b>Action</b></td>
        
  <?php
$rpp=4;
$adjacents = 10;
if(isset($_GET["page"]))
{
$page = intval($_GET["page"]);
}
else
$page = 1;
$reload = $_SERVER['PHP_SELF']; ?>
         
		<?php
	   
	   $sel="select * from complain";
	   $row=mysql_query($sel) or die(mysql_error());
		   $r=mysql_num_rows($row);
			$d=mysql_fetch_array($row);
			$tcount = mysql_num_rows($row);
			$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; 
				?>    

<!----------------pagination second part-------------------->
			<?php
	        $count = 0;
	       if($tcount>0)
	        {
			$i = ($page-1)*$rpp;
			 if($r)
		  {
			while(($count<$rpp) && ($i<$tcount)) {
			mysql_data_seek($row,$i);
			$d=mysql_fetch_array($row);
		    //$row = mysql_fetch_array($result); ?>

            
    <!--------------------pagination sec part complete-------------->		
         </tr>
     
     <tr align="center">
     	<td align="center"><input type="checkbox" name="chk[]" value="<?php echo $d['comp_id'];?>" /></td>
     	<td><?php echo $d['comp_id'];?></td>
     	<td><?php echo $d['uname'];?></td>
        <td class="block"><?php echo $d['block'];?></td>
        <td><?php echo $d['date'];?></td>
        <td><?php echo $d['comp_title'];?></td>
      	<td><?php echo $d['comp_desc'];?></td>
        
        <td align="center"><a href="?comp_id=<?php echo $d['comp_id'];?>&amp;action=delete" class="font"><img src="style/images/delete.png" onclick="return confirm('Are You Sure Want To Delete ?');" /></a></td>
        </tr>
   <!------------------pagination third part---------->		
					
				<?php
			$i++;
			$count++;
			}
			}
			else {
		?>
        
           <tr>
              <td colspan="12" align="center"><font color="#FF0000" size="5" >No Records Found..!</font> </td>
            
            <?php } ?>
          <td colspan="12" align="center" ><?php include("paging1.php");
					echo paginate_three($reload, $page, $tpages, $adjacents); ?></td>
                 
           <!-----------pagination third part complete---------->    
                                
         <?php
	   }
	   ?>
      
        <tr>
       		<td colspan="9" align="center">
            <a href="complain_display.php"><input type="submit" name="muldelete" value="Delete" class="button" onclick="return confirm('Are You Sure Want To Delete ?');" /></a>
			</td>
       </tr>
    
     
    </table>	
    </div>
</center> 
</form>	

<?php
include "footer.php";
?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function()
{
	
	$("#complain_type").change(function(){
	var complain_type = $("select option:selected").val();
	if(complain_type!="")
	{
	$.ajax({
		type: "GET",
		url: "ajax.php?complain_type="+complain_type,
		cache: false,
		success: function(result){
		$("#ajax").html(result);
		}
		
	});
	
	}
	});
	
});
</script>

<?php
	if(isset($_REQUEST['comp_id'],$_REQUEST['action'])&&$_REQUEST['action']=='delete')
{
	//echo "hi";

	//echo $_GET['admin_id'];
	$q="delete from complain where comp_id='$_GET[comp_id]'";

	mysql_query($q) or die(mysql_error());
	echo "<script>alert('record deleted');
	window.location='complain_display.php';
	</script>";
}
?>

<?php
	if(isset($_REQUEST['muldelete']) && $_REQUEST['muldelete']=='Delete')
	{
		echo $id=$_REQUEST['chk'];
		echo $cnt=count($id);
		if($cnt)
		{
			for($i=0;$i<$cnt;$i++)
			{
				echo "<br>";
				echo $q="delete from complain where comp_id=$id[$i]";	
				mysql_query($q) or die(mysql_error());
			}
			echo "<script>alert('record deleted');
			window.location='complain_display.php';
			</script>";
		}
		else
		{
			echo "<script>alert('record deleted');
			window.location='complain_display.php';
			</script>";
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