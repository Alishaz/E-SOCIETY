<?php
	
	$con=mysql_connect('localhost','root','') or die(mysql_errno());
	$db='dbsoc'; 
	
	if(mysql_select_db($db,$con))
	{
		//echo "selected successfully";
	}
	else
	{
		//echo "error in code";
	}
	
?>