<?php
	include 'connection.php';
	include("class.phpmailer.php");
	include("class.smtp.php");
		session_start();
	
//	error_reporting('s_que');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Forgot Password</title>
</head>
<body>
<?php 
include "Header.php";
include "Slider.php";
?>
 <div class="footer-top"></div>
    <form method="post" enctype="multipart/form-data" name="forgotpass">
    <center>
    <h2>Forgot Password</h2>
        &nbsp;&nbsp; <table align="center" border="0">
    <tr>
   	<td>Email</td>
        <td>&nbsp;<input type="email" name="email" id="email" /></td>
    </tr>
    <tr>
    	<td>Security Question</td>
        <td>&nbsp;<select><option>Select Security Question</option>
    <?php 
		$c=mysql_query("select * from security_question ORDER BY s_que") or die(mysql_error());
		while($f=mysql_fetch_array($c))
		{
	?>
    <option value="<?php echo $f['s_id']?>"><?php echo $f['s_que']?></option>
    <?php } ?>
    </select>
 </td>    </tr>
    <tr>
    	<td>Security Answer</td>
        <td>&nbsp;<input type="text" name="s_ans" id="s_ans" maxlength="50" /></td>
    </tr>
    </table>	<br>
     <input type="submit" value="Submit" name="submit" class="button" />&nbsp;&nbsp;
     </center>
</form>		
<?php
include "footer.php";
?>	
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$sq=$_POST['s_id'];
		$sa=$_POST['s_ans'];
		$s="select * from profile where email='$email' AND s_id='$sq' AND s_ans='$sa'";
		
		$n=mysql_query($s) or mysql_error();
		$num=mysql_num_rows($n);
		if($num>0)
		{
			$h=mysql_fetch_array($n);
			echo $h['pwd'];
			
			
			$to=$email; 
			$email1 = "alishazaveri91@gmail.com"; // from
// Your subject
			$subject="Recover Psw";

// From
//$header="From:".$email1."\r\n";

// Your message
$message="<h2>SMES</h2><br><br>";
$message.="<b>Your Confirmation link here</b><br><br>";
$message.="Click on this link to activate your account <br><br>";
$message.="Your Psw=$psw <br><br>";
$message.="Please visit <br><br>";
$message.="http://smesindia.in <br><br>";
$message.="Thank You.";


 // note, this is optional - gets called from main class if not already loaded

$mail             = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 25;                   // set the SMTP port

$mail->Username   = "alishazaveri91gmail.com";  // GMAIL username
$mail->Password   = "alisha@zaveri";            // GMAIL password

$mail->From       = "afnanpathan22@gmail.com";
$mail->FromName   = "Sai Mgt";
$mail->Subject    = $subject;
$mail->AltBody    = "This is the body when user views in plain text format"; //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($message);



$mail->AddAddress($to,"First Last");
$mail->IsHTML(true); // send as HTML


$email="alishazaveri91@gmail.com";
	$smsres = mysql_query("SELECT * FROM register,sms_settings,sms_config where email = '$email' ");
	$rows = mysql_fetch_array($smsres);
	
	$cpass=$rows['cpassword'];
			$sitename = $info['web_name'];
			$ID=$rows['sms_uname'];
			$Pwd=$rows['sms_pswd'];
			$baseurl =$rows['sms_baseurl'];
			
			
			$mno="9825077442";
			
			$msg ="Your Confirm password: $cpass For $sitename";
			//Invoke HTTP Submit url
			
			 


		?>
	<?php		
	$smsurl = "http://api.urlsms.com/SendSMS.aspx?UserID=m9825044556@yahoo.com&Password=my_psw&SenderID=sendername&MsgText=$msg&RecipientMobileNo=$mno";
$ret = implode('', file($smsurl));
			//Process $ret to check whether it contains "Message Submitted"
			//echo "Message Sent Successfully...";
	
	
}


	 print "<script>";
	  //print " self.location='register_confirm_pswd2.php?email=$email';"; 
	 print "</script>"; 
	 
	 
	 
	 
	 
	 
	 //initialize the request variable
$request = "";
//this is the username of our TM4B account
$param["username"] = "patel";
//this is the password of our TM4B account
$param["password"] = "password";
//this is the message that we want to send
$param["msg"] = "This is sample message.";
//these are the recipients of the message
$param["to"] = "9825066448|9825077884";
//this is our sender
$param["from"] = "MyCompany";
//we want to send the message via first class
$param["route"] = "frst";
//we are only simulating a broadcast
$param["sim"] = "yes";
//traverse through each member of the param array
foreach($param as $key=>$val){
	//we have to urlencode the values
	$request.= $key."=".urlencode($val);
	//append the ampersand (&) sign after each paramter/value pair
	$request.= "&";
}
//remove the final ampersand sign from the request
$request = substr($request, 0, strlen($request)-1); 

//this is the url of the gateway's interface
$url = "http://www.innovisioninfo.com/dpanel/sms.aspx";
//initialize curl handle
$ch = curl_init;
curl_setopt($ch, CURLOPT_URL, $url); //set the url
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //return as a variable
curl_setopt($ch, CURLOPT_POST, 1); //set POST method
curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
$response = curl_exec($ch); //run the whole process and return the response
curl_close($ch); //close the curl handle



if(!$mail->Send()) 
{
 echo "<script>alert('fmail email');</script>";
}
else
{
	echo "<script>alert('sucess');</script>";	
}
}
?>
<?php /*?>else
{
echo "<script>alert('fail');</script>";
}
<?php */?>