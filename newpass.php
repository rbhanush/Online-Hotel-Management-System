<!DOCTYPE>
<html>
<head>
<script type="text/javascript" src="validlogin.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
   error_reporting(0);
	  require('connect.php');
    if(isset($_POST['changepass']))
    {   $user		=$_POST['user'];
		$newpass	=$_POST['npass'];

	       	$passupdate		= mysql_query("UPDATE registration SET password='$newpass' WHERE user='$user' ") or die(mysql_error());
			echo "<script type=\"text/javascript\">
					alert(\" Congrats your new password saved\");
					</script>";
	 	header('location:login.php');
	
	}
	else
	header('location:fpass.php');
?>
</body>
</html>
