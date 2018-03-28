<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Advertisement</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	error_reporting('keyword');
	$src="";
	if(isset($_POST['search']) && $_POST['search']='Search')
	{
		$keyword=trim($_POST['keyword']);
		$src=" WHERE adv_name LIKE '%$keyword%' OR adv_email LIKE '%$keyword%'OR adv_title LIKE '%$keyword%' OR adv_desc LIKE '%$keyword%'";	
	} 
?>
<style>
#table1
{
}
#th
</style>

<script>
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

</head>
<body>
<?php 
include "Header.php";
include "slider.php";
?>
<div class="footer-top"></div>
       <form method="post" enctype="multipart/form-data" name="advertisement" id="adv" onSubmit="return search_record();">
    <h2 align="center">Advertisement Form</h2>
    <hr />
    &nbsp;&nbsp; <div align="right">
    <input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>" >&nbsp;
        <input type="submit" value="Search"  name="search" class="button">&nbsp;
        <input type="button" value="Show All" name="show all" class="button" onClick="window.location='adv1_display.php';"> </div>      
   </form>
<br >
        <form name="form2" method="post">
 <table align="center" border="0">
 
          <?php if(isset($keyword) && !empty($keyword)) { ?>
          <tr>
          	<td colspan="5"><h3><?php echo "Search Result For <b>'". $keyword ."'</b>";?></h3></td>
          </tr>
          <?php } ?>
          
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
	   
	  $sel='select * from advertisement'.$src;
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
        <td align="center"><img src="upload/<?php echo $d['adv_img'];?>" height="150" width="150" /></td>
        <td><p><b>Name: &nbsp;</b>
            <?php echo $d['adv_name'];?></p>
          <p><b>Mobile No: &nbsp;</b>
           <?php echo $d['adv_mob'];?></p>
           <p><b>Email Id: &nbsp;</b>
           <?php echo $d['adv_email'];?></p>
           <p><b>Title: &nbsp;</b>
           <?php echo $d['adv_title'];?></p>
          <p><b>Description: &nbsp;</b>
           <?php echo htmlentities($d['adv_desc']);?></p>
           <a href="adv_edit.php?adv_id=<?php echo $d['adv_id'];?>&amp;action=edit" class="font"> <img src="style/images/edit.png" width="30" height="30" class="right"/></a>
           <a href="adv1_display.php?adv_id=<?php echo $d['adv_id'];?>&amp;action=delete" class="font"><img src="style/images/delete1.png" width="50" height="45" class="right" onclick="return confirm('Are You Sure Want To Delete ?');"/></a></td> 
     </tr>
     <tr>
     <td>&nbsp;&nbsp; </td>
     <td>&nbsp;&nbsp; </td>
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
           
           </table>	
    <p align="center"><a href="adv.php"><u>Upload your Advertisment</u></a></p>

</form>


<?php
include "footer.php";
?>

</body>
</html>
<?php
	if(isset($_REQUEST['adv_id'],$_REQUEST['action'])&&$_REQUEST['action']=='delete')
	{
		//echo "hii";
		
		$q="delete from advertisement where adv_id='$_GET[adv_id]'";
		mysql_query($q)or die(mysql_error());
		
		echo "<script>alert('Record Deleted');
		window.location='adv1_display.php';
		</script>";
	}
}
	else
	{
		echo "<script> alert('Please login to view this page.');
			window.location='../index.php';
			</script>";
	}
	
?>
