<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>E-Society</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon3.png" />
<?php
	include 'connection.php';
		session_start();
	//include 'secure.php';
	if(isset($_SESSION['uname']))
	{
		$u=$_SESSION['uname'];
		echo "<br><h3><b>Welcome $u</b></h3>";
	}

?>
</head>
<body>
<?php 
include "header.php";
include "Slider.php";
?>
<!-- Fullscreen backgrounds -->
     <div class="clear"></div><div class="one-third">
      <h2 align="center">Advertisement</h2>
      <hr>
      <marquee direction="up" loop="-1" onMouseOut="this.start()" onMouseOver="this.stop()">
      <div>
		<ul>
            <li>
              <?php
			  $select = "SELECT * FROM  advertisement";
	    	  $result = mysql_query($select) or die(mysql_error());	
				while($row = mysql_fetch_array($result))
				{
					?>
					<div>
                    <h4>
                    <i><?php
						echo "<u><a href='adv_display.php?adv_id=".$row['adv_id']."'><br/>" . $row['adv_title'] . " </a></u><br />";
						echo "<br/>" . $row['adv_desc'] . "<br/></h4>
                    </i>
					</div>";
				}?>	
			</li>			
           </ul>
    </div>
</marquee>
<div>
<h2 align="center">Personal Complain</h2>
			  <hr>
			  <marquee direction="up" loop="-1" onMouseOut="this.start()" onMouseOver="this.stop()">
				 <div>
					<ul>
						<li>
						  <?php
						  $u_id=$_SESSION['u_id'];
						  $select = "SELECT * FROM  profile where pro_id=$u_id";
						  $result = mysql_query($select) or die(mysql_error());	
						  $row = mysql_fetch_array($result);
						  $block=$row['block'];
						  
						  $select1 = "SELECT * FROM  complain ";
						  $result1 = mysql_query($select1) or die(mysql_error());
							while($row1 = mysql_fetch_array($result1))
							{
								if($row1['block']==$block && $row1['status']==1)
								{
								?>
								<div>
								<h4>
								<i><?php
									echo "<u>" . $row1['comp_title'] . " </u><br /></i>
								</div>";										
								}
							}?>	
						</li>			
					   </ul>
				</div>
			</marquee>
    </div>
    </div>
	  <div class="one-third last">
     <h2> <p align="center">About E-sociey</p>
     <br>
     <p>This system of maintaining a society is
made in a such a manner so that the most
common problem faced in residential societies
are solved. In many societies, bills and receipts
are being generated manually or they outsource
to do it. But this involves lots of cost and time.
and also maintain the registers.</p><p> 
In this system the bills, receipts and
vouchers are generated in easy manner also the
system is user friendly. The other details that
can be stored in this system are, member
details, employee details etc. 
The system also provides a way to see the
collection and expenditures made. </p>
     </h2>
    </div>
    <div class="one-third last">
      <h2 align="center">News</h2>
      <hr>
      <marquee direction="up" loop="-1" onMouseOut="this.start()" onMouseOver="this.stop()">
      <div>
		<ul>
            <li>
              <?php
			  $select = "SELECT * FROM  news";
	    	  $result = mysql_query($select) or die(mysql_error());	
				while($row = mysql_fetch_array($result))
				{
					?>
					<div>
                    <h4>
                    <i><?php
						echo "<u><a href='news_display.php?news_id=".$row['news_id']."'><br/>" . $row['news_title'] . " </a></u><br />";
					echo "<br/>" . $row['news_desc'] . "<br/></h4>
                    </i>
					</div>";
				}?>	
			</li>			
           </ul>
    </div>
	</marquee>
  
    	<div>
			  <h2 align="center">Common Complain</h2>
			  <hr>
			  <marquee direction="up" loop="-1" onMouseOut="this.start()" onMouseOver="this.stop()">
				 <div>
					<ul>
						<li><?php
								$result1 = mysql_query($select1) or die(mysql_error());
								while($row1 = mysql_fetch_array($result1))
								{
										if($row1['status']!=1)
										{
											?>
										<div>
										<h4>
										<i><?php
											echo "<u>".$row1['comp_title']."</u><br /></i></div>";										
										}
								}?>
						</li>			
					   </ul>
				</div>
			</marquee>
		</div>
	</div>
    <br />
    <br />
    <br />
    <!-- Begin 4 Columns -->
    
    <div class="clear"></div>
    <div class="hr1"></div>
    <!-- Divider -->
    <!-- Begin Latest Works -->
    <h2>Gallery</h2>
    <div class="carousel">
      <div id="carousel-scroll"><a href="#" id="prev">Prev</a><a href="#" id="next">Next</a></div>
      <ul>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/images (7).jpg" alt="" height="130px" width="164px" /> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/download (4).jpg" alt="" height="130px" width="164px" /> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/uttarayan.jpg" alt="" height="130px" width="164px"/> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/images (14).jpg" alt="" height="130px" width="164px"/> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/Republic.JPG" alt="" height="130px" width="164px"  /> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/janmastmi.png" alt="" height="130px" width="164px"/> </a> </li>
        <li> <a href="#"> <span class="overlay details"></span><img src="images/diwali.jpg" alt="" height="130px" width="164px"/> </a> </li>
      </ul>
    </div>
    <div class="hr1"></div>
    <!-- End Gallery-->
      
      <div class="clear"></div>
    </div>
  </div>
  <!-- End Container -->
<?php include "footer.php"; ?>
<!-- End Wrapper --> 
</body>
</html>