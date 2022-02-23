<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['id']))
{
	header("location:adminLogin.php");
}
$id=$_SESSION['id'];
$sql=mysqli_query($al,"SELECT * FROM admin WHERE id='$id'");
$b=mysqli_fetch_array($sql);
$name=$b['name'];
$pass=$b['password'];
if($_POST['password']==NULL)
{

}
else
{
	$password=sha1($_POST['password']);
	if($pass==$password)
	{
		mysqli_query($al,"TRUNCATE box");
		$info="Successfully Deleted All Messages";
	}
	else
	{
		$info="Incorrect Admin Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat Box | HOME</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="heading">Welcome Admin <?php echo $name;?></span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />
<br /><div align="center">
<table class="table" cellpadding="6" cellspacing="6">
<tr><td align="center">
<span class="tableHead" style="text-decoration:underline;">Admin Commands</span><br /><br />
<a href="manageUsers.php">Manage Users</a><br />
<a href="changePasswordAdmin.php">Change Password</a>

<br />
<br />
<form method="post" action="">
<span class="tableHead" style="font-size:16px;">Delete All Messages from  Chat Box  </span><br />
<span class="info"><?php echo $info;?></span><br />

<span class="labels">Password : </span><input type="password" name="password" size="25" class="fields" required="required" placeholder="Enter Admin Password" />
<input type="submit" value="DELETE" class="commandButton" />
<br />
</form>
 

</td></tr></table></div>
</body>
<!-- 
Property of Tech Vegan Not For Sell/Not for Selling through any Blog/Website
Designed &amp; Developed by:
								Ashish Labade - https://www.ashishvegan.com 
                                Tech Vegan YouTube Channel Link: https://bit.ly/2MFT35Q
                                Copyright 2021 - Tech Vegan
-->
</html>