<?php
	include 'connection.php';
		
?>
  <table align="center" border="1">
    <tr align="center">
    	<td><b>Name</b></td>
        <td class="block"><b>Block</b></td>
        <td><b>Date</b></td>
        <td><b>Title</b></td>
        <td><b>Description</b></td>
		        
		<?php
	  
			if($_GET['complain_type']=="common")
			{
				$value=0;
			}
			else if($_GET['complain_type']=="personal")
			{
				$value=1;
			}
	   $sel="select * from complain where status='$value'";
	   $row=mysql_query($sel) or die(mysql_error());
	   
	   while($d=mysql_fetch_array($row))
	   {
		   
		?>
     </tr>
     
     <tr align="center">
     	<td><?php echo $d['uname'];?></td>
        <td class="block"><?php echo $d['block'];?></td>
        <td><?php echo $d['date'];?></td>
        <td><?php echo $d['comp_title'];?></td>
      	<td><?php echo $d['comp_desc'];?></td>
        
        </tr>
      
      <?php
	   }
	  ?>

        <tr>
       		<td colspan="9" align="center">
            <u><a href="complain.php">Enter your complain</a></u>
			</td>
       </tr>
    </table>
	