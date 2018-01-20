<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/full-slider.css" rel="stylesheet">
    <style type="text/css">
    	label {
	            font-size: 15px;
	            font-weight: bold;
	            color: black;
        	 }
    </style>
</head>
<body>
  <div class="navbar-wrapper">
                <div class="container-fluid">
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a class="logo" href="index.html"><img src="img/index.png"></a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="admincpanel.php"><font color="black"><b>Home</b></font></span></a></li>
                                    <li><a href="room.php"><font color="black"><b>Back</b></font></span></a></li>
                                    <li><a href="signout.php"><font color="black"><b>Sign Out</b></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
  </div>

    <div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3"><a href="newroom.php" class="btn btn-default btn-lg" role="button">Add Room</a></div>
        <div class="col-md-3"><a href="viewroom.php" class="btn btn-default btn-lg" role="button">View all Rooms</a></div>
        <div class="col-md-3"><a href="checkincout.php" class="btn btn-default btn-lg disabled" role="button">Room Allotment</a></div>
        <div class="col-md-2"><a href="tariff.php" class="btn btn-default btn-lg" role="button">Tarrif Plan</a></div>
    </div>
  </div>

<?php
session_start();

    if ( $_SESSION['username'])
    {  
$user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM adminlogin WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{								 		 
			 echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";
				 if(!isset($_POST['delete']) && !isset($_GET['roomno']))
			 {
		 echo "<table align='center' border=1 bgcolor='white' cellspacing='0' style=' border:double; border-color:#000000; color:#FFFFFF; background-color:maroon; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif'>";
			$ex=mysql_query("SELECT * FROM roombooking") or die(mysql_error());
			$count=mysql_num_rows($ex);
				if($count)
				{
					echo "<div class='container'>
                                <div class='row'>
                                    <div class='col-sm-1'></div>
                                    <!-- panel preview -->
                                    <div class='col-sm-10'>
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <div class='col-sm-1'></div>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>RoomNo.:</u></center></label>
                                            <label for='type' class='col-sm-2 control-label'><center><u>Username:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-in Date:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-out Date:</u></center></label>
                                            <label for='option' class='col-sm-1 control-label'><center><u>Type:</u></center></label>
                                            <label for='option' class='col-sm-1 control-label'><center><u>Option:</u></center></label>  
                                            <label for='option' class='col-sm-1 control-label'><center><u>Cancel?:</u></center></label>
                                            <div class='col-sm-1'></div>
                                      </div>";
                    while($row=mysql_fetch_assoc($ex)){
				$username		=$row['username'];
				$roomno			=$row['roomno'];
				$cin			=$row['checkindate'];
				$cout			=$row['checkoutdate'];
				$type 			=$row['type'];
				$optn 			=$row['option'];

										echo "<div class='form-group'>
													<div class='col-sm-1'></div>
                                                    <label for='roomno' class='col-sm-1 control-label'><center>$roomno</center></label>
                                                    <label for='type' class='col-sm-2 control-label'><center>$username</center></label>
                                                    <label for='option' class='col-sm-2 control-label'><center>$cin</center></label>
                                                    <label for='option' class='col-sm-2 control-label'><center>$cout</center></label>
                                                    <label for='option' class='col-sm-1 control-label'><center>$type</center></label>
                                                    <label for='option' class='col-sm-1 control-label'><center>$optn</center></label>
                                                    <label for='option' class='col-sm-1 control-label'><center><a href='checkincout.php?roomno=$roomno&delete=yes'><img src='img/b_drop.png'></a></center></label>
                                                    <div class='col-sm-1'></div>
                                              </div>";
                                          }
                                          echo " </div>
												        </div> 
												          </form>           
												        </div> 
												        <div class='col-sm-1'></div>
												    </div>
												</div>";
				}


				else
					{		echo "<script type=\"text/javascript\">
alert(\"Customers are not present. so rooms are free\");
</script>";
}
}
 if(isset($_GET['roomno']) && isset($_GET['delete']))
			 {
			$roomno	 = $_GET['roomno'];
			echo "<table align='center' border=1 bgcolor='white' cellspacing='0' >";
			$ex=mysql_query("DELETE FROM roombooking WHERE roomno='$roomno'") or die(mysql_error());
			echo "<script type=\"text/javascript\">
alert(\"Customer with Room No. $roomno is Deleted\");
</script>";
			echo "</table>";	
			}
}
   else
    {	
        header("Location:../login.php");
    }   

}
?>




    <a href="#0" class="cd-top">Top</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>