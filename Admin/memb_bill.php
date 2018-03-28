<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Mentenance Bill</title>
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
		$src=" WHERE uname LIKE '%$keyword%' OR months LIKE '%$keyword%' OR date LIKE '%$keyword%'";	
	}
?>	
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>

<script type="text/javascript">
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
    <form name="Bill" id="Bill" method="post" onSubmit="return search_record();">
    <div style=" width:800;overflow:auto">
    <h2 align="center">Maintenance Bill</h2>
    <hr /><br ><div align="right">
    <input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>" >&nbsp;
        <input type="submit" value="Search" class="button"  name="search">&nbsp;
        <input type="button" value="Show All" class="button" name="show all" onClick="window.location='memb_bill.php';">
        </div>
        </form>

  <form name="form2" method="post">    
    &nbsp;&nbsp;
   <table align="center" border="1">
   <?php if(isset($keyword) && !empty($keyword)) { ?>
          <tr>
          	<td colspan="9"><h3><?php echo "Search Result For <b>'". $keyword ."'</b>";?></h3></td>
          </tr>
          <?php } ?>
          <tr align="left" bgcolor="#CCCCCC">
        <td><b>main Id</b></td>
         <td><b>User Id</b></td>
    	<td><b>Name</b></td>
        <td><b>Maintenance Amount</b></td>
        <td><b>Months</b></td>
        <td><b>Total Amount</b></td>
	   	<td><b>Date</b></td>
       <!-- <td><b>Bank Name</b></td>-->
        <td><b>Status</b></td>
        </tr>
        
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
	   $sel="select * from maintenance".$src;
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
		    //$row = mysql_fetch_array($result); 

            
   /// <!--------------------pagination sec part complete-------------->			
		$main_id=$d['main_id'];
			$select="select * from payment where main_id=$main_id";
	   		$row1=mysql_query($select) or die(mysql_error());
			$d1=mysql_fetch_array($row1);
			
			
			if(isset($d1['pay_id']))
			{
				$status="Paid";
			}
			else
			{
				$status="Pending";
			}

  ?>
     
     <tr>
        <td><?php echo $d['main_id'];?></td>
        <td><?php echo $d['u_id'];?></td>
     	<td><?php if(isset($d['uname'])) echo $d['uname'];?></td>
      	<td><?php echo $d['fix_amt'];?></td>
     	<td><?php if(isset($d['months'])) echo $d['months'];?></td>
     	<td><?php echo $d['tot_amt'];?></td>
		<td><?php echo $d['date'];?></td>
<?php /*?>        <td><?php echo $d['bank_name'];?></td><?php */?>
   		<td><?php echo $status;?></td>   
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
              <td colspan="13" align="center"><font color="#FF0000" size="5" >No Records Found..!</font> </td>
            
            <?php } ?>
          <td colspan="13" align="center" ><?php include("paging1.php");
					echo paginate_three($reload, $page, $tpages, $adjacents); ?>
                 
           <!-----------pagination third part complete---------->    
                                
         <?php
	}
		  else
		  {
		  ?>
          <tr><td colspan="9" align="center"><h3><?php echo "No Records Found";?></h3></td></tr>
          <?php }  ?>                  
           
    </table>	
    </div>
</form>

<?php
include "footer.php";
?>
</body>
</html>
<?php
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='index.php';
			</script>";
	}	
?>