<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Society Fund Report</title>
<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.png" />
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
</head>
<body> 
<center>
<div class="clear">&nbsp;</div>
<div class="clear"></div>
<div id="content-outer">
<div id="content">
<table border="0" width="50%" cellpadding="0" cellspacing="0" id="content-table" align="center">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<div id="content-table-inner">
			<div id="table-content">
<form id="mainform" action="">


				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                <tr><center><b><h1>Report for</h1></b></center></tr>
                <br /><tr>
              <center> <b><font size="6" color="#333333">Society Fund</font></b></center>
              
                </tr>
				</br></br>             <tr>
            <!--    <th class="table-header-repeat line-left"><a href="">ID</a>	</th> -->
					<th class="table-header-repeat line-left minwidth-1"><a href="">Income Year</a>	</th>
                    	<th class="table-header-repeat line-left minwidth-1"><a href="">Income Amount</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Income Title</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Expense Year</a></th>
					  <th class="table-header-repeat line-left minwidth-1"><a href="">Expense Amount</a></th>
                        <th class="table-header-repeat line-left minwidth-1"><a href="">Expense Title</a></th>
                    
				</tr>
				
				<?php
				//$query="select ex.*,in.* from income in JOUN expense ex";
				$query="select  * from income";
				$query1="select  * from expense";
				mysql_connect("localhost","root","");
				mysql_select_db("dbsoc");
				$result=mysql_query($query);
				$result1=mysql_query($query1);
				if(mysql_affected_rows()>0)
				{
				while($f=mysql_fetch_assoc($result))
				{
				
				while($f1=mysql_fetch_assoc($result1))
				{ 
			?>
			<tr>
           
				<?php /*?><!-- <td><?php echo $f['meet_id'];?></td>--><?php */?>
                            <td><?php echo $f['income_year'];?></td>
                            <td><?php echo $f['income_amt'];?></td>
							 <td><?php echo $f['income_title'];?></td>
                              <td><?php echo $f1['exp_year'];?></td>  
							 <td><?php echo $f1['exp_amt'];?></td>
                             <td><?php echo $f1['exp_sub'];?></td>
			
		</tr>
			<?php
							
						}
					}
				}
				
				else
				{
					echo "no record found";
				}
				
			
			?>
				
			<tr><td colspan="10" align="center">		
	<center><h3> <a href="../download/<?php echo $f['profile'];?>" target="_blank">Download</a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="../report.php">Back</a> </h3></center>
    			</td></tr>	
				
				</table>
				
			
				<!--  end product-table................................... --> 
			  </form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- end actions-box........... -->
            <!--  start paging..................................................... -->
            <!--  end paging................ -->
<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<!--  end footer-left -->
<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 </center>
</body>
</html>

