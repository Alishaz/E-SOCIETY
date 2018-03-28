<?php
	include 'connection.php';
?>

<select name="city_id">
<option value="">Select city</option>
<?php 
$c=mysql_query("SELECT * FROM city WHERE state_id=".$_REQUEST['state_id']);
while($f=mysql_fetch_array($c))
{
?>
<option value="<?php echo $f['city_id']?>"><?php echo $f['city_name']?></option>
<?php }?>
</select>