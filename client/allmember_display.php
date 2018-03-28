<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="paging1.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Members Profile</title>
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
		$src=" WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%'OR mob_no LIKE '%$keyword%' OR block LIKE '%$keyword%' OR flat_type LIKE '%$keyword%'";	
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
       <form method="post" enctype="multipart/form-data" name="member_profile" id="member_profile" onSubmit="return search_record();">
    <h2 align="center">All Members Profile Form</h2>
    <hr />
    &nbsp;&nbsp; <div align="right">
    <input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>" >&nbsp;
        <input type="submit" value="Search"  name="search" class="button">&nbsp;
        <input type="button" value="Show All" name="show all" class="button" onClick="window.location='allmember_display.php';"> </div>      
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
	   
	   $sel='select * from profile'.$src;
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
        <td align="center"><img src="profile/<?php echo $d['image'];?>" height="150" width="150" /></td>
        <td><p><b>Name: &nbsp;</b>
            <?php echo str_repeat("&nbsp;",10); echo $d['name'];?></p>
          <p><b>Birth date: &nbsp;</b>
           <?php echo str_repeat("&nbsp;",3); echo $d['dob'];?></p>
           <p><b>Block: &nbsp;</b>
           <?php echo str_repeat("&nbsp;",11); echo $d['block'];?></p>
           <p><b>Flat Type: &nbsp;</b>
           <?php echo str_repeat("&nbsp;",4); echo $d['flat_type'];?></p>
           <p><b>E_Mail: &nbsp;</b>
           <?php echo str_repeat("&nbsp;",8); echo $d['email'];?></p>
           <p><b>Mobile: &nbsp;</b>
           <?php echo str_repeat("&nbsp;",9); echo $d['mob_no'];?></p>
           <br />
<p align="rigth"><u><a href="alldetail_display.php?pro_id=<?php echo $d['pro_id'];?>&amp;action=view" class="font"><b>View Detail</b></a></u></p></td>         
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
