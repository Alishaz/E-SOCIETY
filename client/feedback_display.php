<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Feedback</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
	session_start();
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h4><br>";
	
	
/*	error_reporting('keyword');
	$src="";
	if(isset($_POST['search']) && $_POST['search']='Search')
	{
		$keyword=trim($_POST['keyword']);
		$src=" WHERE fback_name LIKE '%$keyword%' OR fback_email LIKE '%$keyword%' OR fback_msg LIKE '%$keyword%'";	
	} */
?>
<script type="text/javascript">
/* function search_record()
	{
	var keyword=document.getElementById('keyword').value;
		if(keyword.length==0)
		{
		alert("Please Enter Text To Search");
		document.getElementById('keyword').focus();
		return false;
		}
		return true;
	} */
</script>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
<form name="feedback" id="feedback" method="post" enctype="multipart/form-data" onSubmit="return search_record();">
<center>
    <h2>Feedback</h2>
    <hr />
   <!-- <div align="right">
<input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>">&nbsp;
        <input type="submit" value="Search"  name="search" class="button">&nbsp;
        <input type="button" value="Show All" name="show all" onClick="window.location='feedback_display.php';" class="button">
        </div> 
    </form>
    <form name="form2" method="post">-->
    &nbsp;&nbsp;&nbsp;
  <table align="center" border="0">
  
      <?php /*?>   <?php if(isset($keyword) && !empty($keyword)) { ?>
          <tr>
          	<td colspan="9"><h3><?php echo "Search Result For <b>'". $keyword ."'</b>";?></h3></td>
          </tr>
          <?php } ?>
      <?php */?>      
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
	   $sel='select * from feedback where fback_status="1" order by fback_id desc';
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
    	<td><b>Name</b></td>
	   	<td><?php echo $d['fback_name'];?></td></tr>
        <tr><td><b>Email Id</b></td>
		<td><?php echo $d['fback_email'];?></td>
        <tr><td><b>Comments</b></td>
     	<td><?php echo htmlentities($d['fback_msg']);?></td></tr>
        
        <tr>
        	<td colspan="2">&nbsp;&nbsp;
        	<br />&nbsp;&nbsp;</td>
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
                                
         <?php /*?><?php
	   }
		  
		  else
		  {
		  ?>
          <tr><td colspan="8" align="center"><h3><?php echo "No Records Found";?></h3></td></tr>
  <?php */?>       
   <?php }  ?>      
    </table>
        <p align="center"><a href="feedback.php">Give Feedback</a></p>	
</center> 
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
			window.location='../index.php';
			</script>";
	}
	
?>
