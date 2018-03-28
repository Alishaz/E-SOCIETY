$session = session_id();
$order_id=$_REQUEST['order_id'];

$now1 = date('d M, Y');

$now= date('Y-m-d');

ob_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>



<title>SMES - By Gaurang</title>



<script language="JavaScript">

var gAutoPrint = true; // Tells whether to automatically call the print function



function printSpecial()

{

if (document.getElementById != null)

{

var html = '<HTML>\n<HEAD>\n';



if (document.getElementsByTagName != null)

{

var headTags = document.getElementsByTagName("head");

if (headTags.length > 0)

html += headTags[0].innerHTML;

}



html += '\n</HE>\n<BODY style="text-align:center;">\n<center>\n<table border=1 width="400px" height="570px"><tr><td align="center"><p><h3 class="verdana_13">Receipt</h3></p>\n';



var printReadyElem = document.getElementById("printReady");



if (printReadyElem != null)

{

html += printReadyElem.innerHTML;

}

else

{

alert("Could not find the printReady function");

return;

}



html += '\n</td></tr></table></center></BODY>\n</HTML>';



var printWin = window.open("","printSpecial");

printWin.document.open();

printWin.document.write(html);

printWin.document.close();

if (gAutoPrint)

printWin.print();

}

else

{

alert("The print ready feature is only available if you are using an browser. Please update your browswer.");

}

}



</script>

<script>

function gourl()

{

	history.go(-1);

}

</script>

<script language="JavaScript">

function setVisibility(id, visibility) {

document.getElementById(id).style.display = visibility;

}

</script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>



<body>

<center>	

     	<div id="main">

        	<!-- Top head -->

            		                     

           <!-- Top head -->

            

            <!--  head -->

            	               

           <!-- head -->

           

            <!-- menu -->

            	

                

            <!-- menu -->

            

            

             <!-- content -->

            <div id="content">

             

             		<!-- left menu --><!-- left menu -->

                     <div style="border-right:#c53d69 2px solid; float:left; width:2px; height:700px;" >.

              </div>

              

                     <!-- middle content -->

                    <div class="right_con" style="width:766px;">                     



<div class="scroll">



<div align="left" style="color:#c53d69; padding-left:25px; padding-top:8px;">

<a href="print_bill.php?order_id=<?php echo $order_id; ?>" class="verdana_13" style="color:#830226; text-decoration:none; font-weight:bolder;" target="_blank"><u>Print Receipt</u></a></div>

<?php ob_start(); ?> 

<div style="width:740px;">

<table align="center" width="100%">

<tr>

<td valign="top" width="100%" align="center">

<div style="padding-top:5px;" >

<table align="center" width="100%" >

<tr>

<td  class="verdana_13" align="center" colspan="2" valign="top"><h3>Receipt</h3>

</td>

</tr>

<tr>

<td align="left" valign="top" colspan="2" class="comp_text">

<div style="float:left; width:720px; height:128px; background-image:url(images2/print_logo.gif); background-repeat:no-repeat; border:#c53d69 1px solid;" align="left">







</div>



</td>

</tr>



<tr>

<td colspan="2">&nbsp;</td>

</tr>

<tr>

<td class="verdana_14" align="left" colspan="2">

<u><b>Here is your final Order Receipt</b></u></td>

</tr>

<tr>

<td class="verdana_14" align="left"  colspan="2">

<b>Order Date: &nbsp; <?php echo $now1; ?></b></td>

</tr>

<tr>

<td class="verdana_14" align="left"  colspan="2">

<b>Order Number: <?php echo $order_id; ?></b></td>

</tr>

<tr>

<td colspan="2">&nbsp;</td>

</tr>

 <?php

$sql_printbil="select * from ordermain where order_id='".$order_id."'";

$res_printbil=mysql_query($sql_printbil);

$result_printbil=mysql_fetch_array($res_printbil);

$sql_print="select * from customers where customer_id='".$result_printbil['customer_id']."'";

$res_print=mysql_query($sql_print);

$rowp=mysql_fetch_array($res_print);



?>

							   <tr>

								    <td width="50%" valign="top"> 

                                                             

     								<?php include("left_menu.php"); ?>
     								<table style="border:#c53d69 1px solid;" cellspacing=1 cellpadding=5  align="center" width="100%" class="verdana_12">

   									  <tr>

       									<th colspan="2" class="verdana_14" style="color:#830226;" align="center"><b>Billing Information</b></th>

   									  </tr>

                                        <tr class="verdana_14">

       										<td align="left" width="40%" class="verdana_14">First Name:</td>

								          <td align="left" class="verdana_14"><?php echo $rowp['first_name']; ?></td>

							  	      </tr>

                                        <tr class="verdana_14">

       										<td align="left" class="verdana_14">Last Name:</td>

								          <td align="left" class="verdana_14"><?php echo $rowp['last_name']; ?></td>

							     	  </tr>

                                        <tr class="verdana_14">

									       <td align="left" class="verdana_14">Billing Address 1:</td>

								          <td align="left" class="verdana_14"><?php echo $rowp['address_1']; ?></td>

   									  </tr>

                                      <?php 

									   if($rowp['address_2']!=NULL)

									   {

									   ?>

								        <tr class="verdana_14">

       										<td align="left" class="verdana_14">Billing Address 2: </td>

								          <td align="left" class="verdana_14"><?php echo $rowp['address_2']; ?></td>

   									  </tr>

                                      <?php

									  }

									  ?>

                                        <tr class="verdana_14">

       										<td align="left" class="verdana_14">City:</td>

								          <td align="left" class="verdana_14"><?php echo $rowp['city'];  ?></td>

								      </tr>

                                      <tr class="verdana_14">

       										<td align="left" class="verdana_14">State:</td>

								        <td align="left" class="verdana_14"><?php echo $rowp['state']; ?></td>

      								</tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Zip Code:</td>

							          <td align="left" class="verdana_14"><?php echo $rowp['zip_code']; ?></td>

      								</tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Phone Number:</td>

   									  <td align="left" class="verdana_14"><?php echo $rowp['phone']; ?></td>

      								</tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Email Address:</td>

							          <td align="left" class="verdana_14"><?php echo $rowp['email']; ?></td>

       								</tr>

                                   

     						</table>

                            

   						 </td>

                         <?php



$sql_printsh="select * from ordermain where order_id='".$order_id."'";

$res_printsh=mysql_query($sql_printsh);

$rows_sh=mysql_fetch_array($res_printsh);



?>

   						 <td width="50%" valign="top">

                         

     						<table style="border:#c53d69 1px solid;" cellspacing=1 cellpadding=5  align="center" width="100%" class="verdana_12">

		       <tr>

      								 <th colspan="2" class="verdana_14" style="color:#830226;" align="center"><b>Shipping Information</b></th>

							  </tr>

                                     <tr class="verdana_14">

      								 <td align="left" class="verdana_14" width="40%">First Name:</td>

       								 <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_first_name']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

       								<td align="left" class="verdana_14">Last Name:</td>

      								 <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_last_name']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Billing Address 1:</td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_address_1']; ?></td>

							  </tr>

                              <?php 

									   if($rows_sh['shipping_address_2']!=NULL)

									   {

									   ?>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Billing Address 2: </td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_address_2']; ?></td>

							  </tr>

                              <?php

							  }

							  ?>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">City:</td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_city']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">State:</td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_state']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Zip Code:</td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_zip_code']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

       									<td align="left" class="verdana_14">Phone Number:</td>

							          <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_phone']; ?></td>

							  </tr>

                                    <tr class="verdana_14">

      									 <td align="left" class="verdana_14">Email Address:</td>

   									  <td align="left" class="verdana_14"><?php echo $rows_sh['shipping_email']; ?></td>

							  </tr>

                              

     					</table>

                      

    				</td>

   					</tr>

 				 <tr>

                 <td colspan="2">&nbsp;</td>

                 </tr>

                 <tr>

                 <td colspan="2" width="100%" valign="top" align="left">

                <table width="100%" border="1" style="border-collapse:collapse;" class="verdana_12">

  <tr class="verdana_13" valign="top" height="35">

   

    <th align="center" style="color:#830226;" valign="middle" >Quantity</th>

    <th  style="width:100px; color:#830226;" align="center"  valign="middle" >Image </th>

    <th align="center" style="color:#830226;" valign="middle" >Product Description</th>

    <th align="center" style="color:#830226;" valign="middle" >Weight</th>

    <th align="center" style="color:#830226;" valign="middle" >Amount</th>

	<th  align="center" style="color:#830226;" valign="middle"  >Total</th>

   </tr>

   

   <tr>




      <td valign="top" align="center" class="verdana_14"><?php echo $order_qty; ?> </td> 

      

      

    <td align="center"  class="verdana_14"><img src="upload/<?php echo $row['prod_pic'];?>" alt="<?php echo $prod_code; ?>" border="0" width="70" height="100"/></td>

    

    

    <td valign="top"  class="verdana_14"><div>Product code:<?php echo $prod_code; ?></div>

      <div><img src="images/12rupee11.gif" border="0" />&nbsp;<?php echo $prod_price; ?></div>

      <div>

      <?php

	  if($mes_id > 0)

	  {

	  	echo "<font style='font-size:10px;'> Measurement Submitted</font>";

		echo "&nbsp;";

	  }	  

	  ?>

      </div>


	  </td>

    

     <td valign="top" align="center" class="verdana_14"><?php 

      echo $prod_weight=($prod_weight  * $order_qty); ?>&nbsp;kgs</td>

    <td style="text-align:center;" valign="top" class="verdana_14"> 

   <?php

	 

	

	?>

   

    <div align="right"><img src="images/12rupee11.gif" border="0" />&nbsp;<?php echo number_format($prod_price*$order_qty, 2); ?> </div>

     <div align="right"><?php

   

	

	

	 

	

	
 
   </tr>

<?php

   $total_weight1= $total_weight1 + number_format($prod_weight,2);

		

		

		 $total = $total +  ($stitch1 + $stitch2 +(($prod_price*$order_qty) - $discount));	

}

?>

   </table> 

</td>

</tr>

<tr>

<td colspan="2">&nbsp;</td>

</tr>

<tr>

<td colspan="2" align="left" class="verdana_12">

<?php

$queod = mysql_query("SELECT * FROM ordermain  where order_id = '" . $order_id . "'");

	$rqueod=mysql_fetch_array($queod);

?>

<p class="verdana_14" align="left"><b>Subtotal: <img src="images/12rupee11.gif" border="0" />&nbsp;<?php echo $rqueod['cost_subtotal']; ?></b></p>

 <p align="left" class="verdana_14"> <b>

  Shipping Charge: 

  <img src="images/12rupee11.gif" border="0" />&nbsp;<?php echo $rqueod['cost_shipping']; ?>

   </b>

  </p>

</td>

</tr>

<tr>

<td colspan="2" align="center" >

<hr color="#c53d69">

</td>

</tr>

<tr>

<td colspan="2" align="right" class="verdana_12">

<p class="verdana_14"><b> Subtotal After shipping charge is: <img src="images/12rupee11.gif" border="0" />&nbsp;

<?php echo $rqueod['cost_total']; ?></b></p>

</td>

</tr>

<tr>

<td colspan="2">&nbsp;</td>

</tr>



</table>

</div>



</td>

</tr>

</table>



</div>





<div align="left" style="margin-left:15px;">



 <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>"/>

<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">



<input type="hidden" name="cmd" value="_cart">

<input type="hidden" name="business" value="gaurang@gmail.com">

<input type="hidden" name="lc" value="USD">

<input type="hidden" name="item_name" value="SMES By Gaurang">

<input type="hidden" name="amount" value="<?php  echo $rqueod['currency_total']; ?> ">

<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="button_subtype" value="products">

<input type="hidden" name="no_note" value="0">

<input type="hidden" name="add" value="1">

<input type="hidden" name="bn" value="your Code From Paypal For Security">



<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynow_SM.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">

<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">

</form>

</div> 

