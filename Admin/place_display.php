<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Place Permission</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png"/>
<?php
	include 'connection.php';
	session_start();
	//include 'secure.php';
	if(isset($_SESSION['adminlogin']))
	{
		error_reporting('keyword');
	$src="";
	if(isset($_POST['search']) && $_POST['search']='Search')
	{
		$keyword=trim($_POST['keyword']);
		$src=" WHERE plc_name LIKE '%$keyword%' OR plc_event LIKE '%$keyword%' OR plc_date LIKE '%$keyword%' OR plc_time LIKE '%$keyword%' OR plc_place LIKE '%$keyword%'";	
	}
?>	

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
<script type="text/javascript">
$(document).ready(function()
{
	
    $('#check_all').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.check').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.check').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
});


function search_record()
	{
	var keyword=document.getElementById('keyword').value;
		if(keyword.length==0)
		{
		alert("Please Enter Text To Search");
		document.getElementById('keyword').focus();
		return false;
		}
		return true;
	}

</script>

 <div class="footer-top"></div>
    <form name="place_permission" id="place_permission" method="post">
    <div style=" width:800;overflow:auto">
  <center>
    <h2>Place Permission</h2>
    <hr />
    <div align="right">
<input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>">&nbsp;
        <input type="submit" value="Search"  name="search" class="button">&nbsp;
        <input type="button" value="Show All" name="show all" onClick="window.location='place_display.php';" class="button">
        </div> 
    </form>
    
      <form name="form2" method="post">
     <center>
    &nbsp;&nbsp;&nbsp;
<table align="center" border="1">
 <?php if(isset($keyword) && !empty($keyword)) { ?>
          <tr>
          	<td colspan="11"><h3><?php echo "Search Result For <b>'". $keyword ."'</b>";?></h3></td>
          </tr>
          <?php } ?>
   
   <tr align="left" bgcolor="#CCCCCC">
  	<td><b><input type="checkbox" id="check_all"  value="" /></b></td>
    	<td><b>ID</b></td>
        <td><b>User Id</b></td>
    	<td><b>Name</b></td>
	   	<td><b>Event Name</b></td>
        <td><b>Date</b></td>
        <td><b>Time</b></td>
        <td><b>Event Place</b></td>
        <td colspan="2"><b>Action</b></td></tr>
        
        <?php
$rpp=3;
$adjacents = 10;
if(isset($_GET["page"]))
{
$page = intval($_GET["page"]);
}
else
$page = 1;
$reload = $_SERVER['PHP_SELF']; ?>

       <?php
	   $sel="select * from place_permission".$src;
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
	     
     <tr>
     	<td><input type="checkbox" name="chk[]" value="<?php echo $d['plc_id'];?>" class="check" /></td>
     	<td><?php echo $d['plc_id'];?></td>
        <td><?php echo $d['u_id'];?></td>
     	<td><?php echo $d['plc_name'];?></td>
      	<td><?php echo $d['plc_event'];?></td>
     	<td><?php echo $d['plc_date'];?></td>
        <td><?php echo $d['plc_time'];?></td>
     	<td><?php echo $d['plc_place'];?></td>

        <td><a href="?plc_id=<?php echo $d['plc_id'];?>&amp;action=delete" class="font"><img src="style/images/delete.png" onclick="return confirm('Are You Sure Want To Delete ?');" /></a></td>
        <td><a href="place_response.php?plc_id=<?php echo $d['plc_id'];?>&amp;action=edit" class="font"><img src="style/images/approve.jpg" height="32px" width="32px" /></a></td>
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
					echo paginate_three($reload, $page, $tpages, $adjacents); ?>
                 
           <!-----------pagination third part complete---------->    
                                
         <?php
	   }
		  
		  else
		  {
		  ?>
          <tr><td colspan="8" align="center"><h3><?php echo "No Records Found";?></h3></td></tr>
          <?php }  ?>                  
           
        
   <tr>
       		<td colspan="10" align="center">
            	<!--<a href="event.php">
            	<input type="button" name="insert" value="Insert" class="button" /></a>-->
                <a href="place_display.php"><input type="submit" name="muldelete" value="Delete" class="button" onclick="return confirm('Are You Sure Want To Delete ?');" /></a>
    </tr>
    
    
    </table>	
</center>
</div> 
</form>
</body>
</html>

<?php
include "footer.php";
?>

<?php
	if(isset($_REQUEST['plc_id'],$_REQUEST['action'])&&$_REQUEST['action']=='delete')
{
	//echo "hi";

	//echo $_GET['admin_id'];
	$q="delete from place_permission where plc_id='$_GET[plc_id]'";

	mysql_query($q) or die(mysql_error());
	echo "<script>alert('record deleted');
	window.location='place_display.php';
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
				echo $q="delete from place_permission where plc_id=$id[$i]";	
				mysql_query($q) or die(mysql_error());
			}
			echo "<script>alert('record deleted');
			window.location='place_display.php';
			</script>";
		}
		else
		{
			echo "<script>alert('record deleted');
			window.location='place_display.php';
			</script>";
		}
	}
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
?>