   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Bill Receipt</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
			$u=$_SESSION['uname'];
			$u1=$_SESSION['u_id'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	/*error_reporting('keyword');
	$src="";
	if(isset($_POST['search']) && $_POST['search']='Search')
	{
		$keyword=trim($_POST['keyword']);
		$src="WHERE months LIKE '%$keyword%' OR tot_amt LIKE '%$keyword%' OR date LIKE '%$keyword%'";	
	} */
?>
<style>
#table1
{
}
#th
</style>

<script>
/*function search_record()
	{
	var keyword=document.getElementById('keyword').value;
		if(keyword.length==0)
		{
		alert("Please Enter Text To Search");
		document.getElementById('keyword').focus();
		return false;
		}
		return true;
	}*/
	</script>

</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
       <form name="Bill_Receipt" id="bill" method="post">
  <center>
    <h2>Bill Receipts</h2>
    <hr />
     &nbsp;&nbsp; 
    <!-- <div align="right">
    <input type="text" name="keyword" id="keyword" value="<?php echo $keyword?>" >&nbsp;
        <input type="submit" value="Search"  name="search" class="button">&nbsp;
        <input type="button" value="Show All" name="show all" class="button" onClick="window.location='allbill_display.php';"> </div>      
   </form>
<br >
   <form name="form2" method="post">-->
 <table align="center" border="0">
 
        <?php /*?>  <?php if(isset($keyword) && !empty($keyword)) { ?>
          <tr>
          	<td colspan="5"><h3><?php echo "Search Result For <b>'". $keyword ."'</b>";?></h3></td>
          </tr>
          <?php } ?>
    	<?php */?>
        <?php
		$u1=$_SESSION['u_id'];
		$sel="select * from maintenance where u_id='$u1'";
	 //  $sel='select p.*,m.* from payment AS p JOIN maintenance AS m ON u_id=$u1'.$src;
	   $row=mysql_query($sel) or die(mysql_error());
	   $r=mysql_num_rows($row);
	 if($r)
		  {
		  
	   while($d=mysql_fetch_array($row))
	   {
		   $b=$d['main_id'];
		?>
         <tr>    
        <td><p><b>Name: &nbsp;</b>
           <?php echo $u ?></p>
          <p><b>Maintenance Amount: &nbsp;</b>
           <label name="fix_amt" id="fix_amt" readonly="readonly" value="" />500</label></p>
           <p><b>Months: &nbsp;</b>
           <?php echo $d['months'];?></p>
           <p><b>Total Amount: &nbsp;</b>
           <?php echo $d['tot_amt'];?></p>
          <p><b>Date: &nbsp;</b>
           <?php echo $d['date'];?></p>
           <?php /*?> <p><b>Account No: &nbsp;</b>
           <?php echo $d['acc_no'];?></p>
           <!--<p><b>Bank Name: &nbsp;</b>-->
           <?php     
		   
     $sel1="select * from maintenance where u_id='$u1' AND main_id='$b'";
 $row1=mysql_query($sel1) or die(mysql_error());  
	   while($d1=mysql_fetch_array($row1))
	   {
?>
<?php /*?>           <?php echo $d1['bank_name']; }?><?php */?>
          
        <a href="?main_id=<?php echo $d['main_id'];?>&amp;action=delete" class="font"><img src="style/images/delete1.png" width="30" height="40" class="right" onclick="return confirm('Are You Sure Want To Delete ?');"/></a>
           <a href="?main_id=<?php echo $d['main_id'];?>&amp;action=edit" class="font"> <img src="style/images/printer.png" width="30" height="30" class="right"/></a></p>  
           </td> 
     </tr>
     <tr><td>&nbsp;</td></tr>
 
      <?php
	   }
		  }
	//}
		  else
		  {
		  ?>
          <tr><td colspan="5" align="center"><h3><?php echo "No Records Found";?></h3></td></tr>
        
  <?php }  ?>          
    
    </table>	
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