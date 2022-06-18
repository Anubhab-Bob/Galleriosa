<html>
<h1 align="center"><font size="26" face="Brush Script MT"><big>GALLERIOSA</big></font></h1>
    <hr><hr>
	<style>
		body 
		{
	  		background-image: url('bgimage.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;
	  		background-size: cover;
		}
	</style>
<?php
	 
	if($_POST['user_name']=='user' && $_POST['password']=='pass')
	{
		echo "Login successful!!<br><br>";
		echo "<a href='gallery_admin.php'>Continue >>></a> <br><br><br>";
		echo "<a href='order_query.php'>Sales Details >>></a>";
	}
	else
	{
		echo "Wrong Credentials. Sorry!<br><br>";
		echo "<a href='Start.php'><<< Back</a>";
	}
?>
</html>