<?php
include("configuration.php");
session_start();
if(isset($_SESSION['id']))
{
	header("location:adminHome.php");
}
$id=$_POST['id'];
$password=$_POST['password'];
if($id==NULL || $_POST['password']==NULL)
{
	echo "Not found";
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM admin WHERE id='".mysqli_real_escape_string($al,$id)."' AND password='".mysqli_real_escape_string($al,sha1($password))."'");	
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['id']=$_POST['id'];
		header("location:adminHome.php");
	}
	else
	{
		$info="Incorrect ID or Password";
		header("location:adminHome.php");
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Chat Box</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><br />
<span class="heading">Welcome to Chat Box Admin Panel</span><br />
<br /><br />
<br />
<form method="post" action="">
<table class="table" cellpadding="4" cellspacing="4">
<tr><td align="center" colspan="2" class="tableHead">Admin Login</td></tr>
<tr><td align="center" class="info" colspan="2"><?php echo $info;?></td></tr>
<tr><td class="labels">Admin ID : </td><td><input type="text" name="id" class="fields" size="30" required="required" placeholder="Enter Admin ID" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" name="password" class="fields" size="30" required="required" placeholder="Enter Password" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="commandButton" /></td></tr>
</table>
</form>
<br />

<br />
<span class="text">Main Page </span><a href="index.php">Click Here</a>

</div>
</body>

</html>