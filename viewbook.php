<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">
    <style type="text/css">
        div#menu {
                width: 100%;
                padding-left: 30px;
                padding-top: 12px;
                border: 5px solid white;
                margin: 0;
				}
        table,td,tr{
          border:2px solid white;
        }		
                td{
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
                                <a href="#" role="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a class="logo" href="index.html"><img src="img/index.png"></a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.html"><font color="black"><b>Home</b></font></span></a></li>
                                    <li><a href="aboutus.php"><font color="black"><b>About us</b></font></a></li>
                                    <li><a href="login.php"><font color="black"><b>Booking</b></font></a></li>
                                    <li><a href="tourplace.html"><font color="black"><b>Places to Visit</b></font></a></li>
                                    <li><a href="lmap.html"><font color="black"><b>Location Map</b></font></a></li>
                                    <li><a href="enquiry.php"><font color="black"><b>Enquiry</b></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
    </div>

    <div class="container">
        <a href="changepass.php" class="btn btn-default btn-lg" role="button">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewprofile.php" class="btn btn-default btn-lg" role="button">View Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="changeprofile.php" class="btn btn-default btn-lg" role="button">Change Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewbook.php" class="btn btn-default btn-lg disabled" role="button">View Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="res.php" class="btn btn-danger btn-lg" role="button">Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="signout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
    </div>

    <div class="container">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
  
      
        <?php
	 	session_start();
		function noofdays($start,$end) {
	//UVray
		$range = array();

		if (is_string($start) === true) $start = strtotime($start);
		if (is_string($end) === true ) $end = strtotime($end);

		if ($start > $end) return noofdays($end, $start);

		$i=0;
		while($start <= $end)
		{
			$start = strtotime("+ 1 day", $start);
			$i++;
		}

		return $i;
	}


   if ( $_SESSION['username'])
    {  $user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{			    
    			 echo "<br><center><strong><font color='white' size='3%'><b><u>Welcome ".$_SESSION['username']."</u></b></font><br /><br></center></strong>";	
    			  echo "<form action='' method='post' name='f'>";		 
			echo "<table align='center' style='background:transparent'>";
			echo "<tr align='center'>
						<td height='75'><b>&nbsp;Room no&nbsp;</b></td>
						<td height='75'><b>&nbsp;Check-in Date&nbsp;</b></td>
						<td height='75'><b>&nbsp;Check-out Date&nbsp;</b></td>
						<td height='75'><b>&nbsp;No. of days&nbsp;</b></td>
						<td height='75'><b>&nbsp;Category&nbsp;</b></td>
						<td height='75'><b>&nbsp;Type of room&nbsp;</b></td>
						<td height='75'><b>&nbsp;AC/Non AC&nbsp;</b></td>
						<td height='75'><b>&nbsp;Amount&nbsp;</b></td>
						<td height='75'><b>Cancel<br>&nbsp;&nbsp;&nbsp;&nbsp;Booking?&nbsp;</b></td>
				  </tr>";

			$ex=mysql_query("SELECT * FROM roombooking WHERE username='$user'") or die(mysql_error());
			$count1=mysql_num_rows($ex);
				if($count1>0)
				{				while($row=mysql_fetch_assoc($ex)){
				//$username		=$row['username'];
				$id 	= $row['id'];
				$roomno	= $row['roomno'];
				$cin	= $row['checkindate'];
				$cout	= $row['checkoutdate'];
				$ndays	= $row['ndays'];
				$ct		= $row['category'];
				$type	= $row['type'];
				$optn	= $row['option'];
				$rate	= $row['rate'];
				
				echo "<tr align='center'>
							<td height='75'><b>&nbsp;$roomno&nbsp;</b></td>
							<td height='75'><b>&nbsp;$cin&nbsp;</b></td>
							<td height='75'><b>&nbsp;$cout&nbsp;</b></td>
							<td height='75'><b>&nbsp;$ndays&nbsp;</b></td>
							<td height='75'><b>&nbsp;$ct&nbsp;</b></td>
							<td height='75'><b>&nbsp;$type&nbsp;</b></td>
							<td height='75'><b>&nbsp;$optn&nbsp;</b></td>
							<td height='75'><b>&nbsp;$rate&nbsp;</b></td>
							<td height='75'><a href='booking_cancel.php?id=$id&type=room&submit=submit'><font color='red';><u><b>Cancel</b></u></font></a></td>
					  </tr>";
			}}
			$extr=mysql_query("SELECT * FROM hallbooking WHERE username='$user'") or die(mysql_error());
			$count2=mysql_num_rows($extr);
			if($count2>0)
			{
				while($hal=mysql_fetch_assoc($extr))
				{$id=$hal['id'];
					$name=$hal['username'];
					$cin=$hal['checkindate'];
					$cout=$hal['checkoutdate'];
					$nod=noofdays($cin,$cout);
					$rate=$nod*50000;
					$rate=round($rate,2);
					
					echo "<tr>
                    <td height='75' align='center'><b>&nbsp;-&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;$cin&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;$cout&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;$nod&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;Hall&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;-&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;-&nbsp;</td>
                    <td height='75' align='center'><b>&nbsp;$rate.00&nbsp;</td>";
					echo "<script type=\"text/javascript\">
var Date1 = new Date(cin.value);
	var today = new Date();
	
	var diff=daysBetween(Date1,today);
	
	if( diff > 0 )
		alert(\"Check-in Date is not proper.\");

</script>";
					echo "<td height='75' align='center'><a href='booking_cancel.php?id=$id&type=hall&submit=submit'><font color='red';><u><b>Cancel</b></u></font></a></td>";
				}
			}
		
		if($count1==0 && $count2==0){
		echo "<script type=\"text/javascript\">
alert(\"Currently no Booking is done by you\");
</script>";
}					echo "</table></form>";
	}		 else
    {	
        header("Location:login.php");
    }}
			?> 
			
			    </div>
    <div class="col-md-2"></div>
    </div>
			</div>
			<br>

			<div class="container">
    	<div class="footer">
      		<hr class="featurette-divider">
			<div class="container">
              <p align="center">
              	<a href="index.html"><font color="black"><b>Home</b></font></a>&nbsp;&nbsp; &nbsp;<font color="white">|</font> &nbsp; &nbsp;&nbsp;
                <a href="aboutus.php"><font color="black"><b>About us</b></font></a>&nbsp;&nbsp; &nbsp;<font color="white">|</font> &nbsp; &nbsp;&nbsp;
                <a href="login.php"><font color="black"><b>Booking</b></font></a>&nbsp;&nbsp; &nbsp;<font color="white">|</font> &nbsp; &nbsp;&nbsp;
                <a href="tourplace.html"><font color="black"><b>Places to Visit</b></font></a>&nbsp;&nbsp; &nbsp;<font color="white">|</font> &nbsp; &nbsp;&nbsp;
                <a href="lmap.html"><font color="black"><b>Location Map</b></font></a>&nbsp;&nbsp; &nbsp;<font color="white">|</font> &nbsp; &nbsp;&nbsp;
                <a href="enquiry.php"><font color="black"><b>Enquiry</b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           	  </p>
            </div>
        	<hr class="featurette-divider">   
      		<div class="row featurette">
            <div class="col-md-3">
                  <h3><font color="white"><u>Contact Us:</u></font></h3>
                  <font color="white">SAI SURAJ INTERNATIONAL HOTELS PVT. LTD.</font><br>
                  <font color="white">0824-2478531/32/33</font>
            </div>
            <div class="col-md-9">
                      <div id="menu">
                        <ul id="menu">
                            <li>
                              <a href="gallery.html">
                                <img src="img/hotel.jpg" width="109px"><img src="img/suite_1.jpg" width="175px"><img src="img/lobby.jpg" width="175px"><img src="img/lounge.jpg" width="147px"><img src="img/dine_3.jpg" width="175px">
                              </a>
                            </li>
                        </ul>
                      </div>
            </div>
          	</div>

      		<hr class="featurette-divider">

      		<footer id="footer"style="position: relative;">
			        <div class="social-icon text-center">
			          <a href="https://www.facebook.com/rohit.bhanushali.5437" target="_blank"><font color="white"><i class="fa fa-facebook fa-3x"></i></font></a>
			          <a href="https://twitter.com/samrohit27" target="_blank"><font color="white"><i class="fa fa-twitter fa-3x"></i></font></a>
			          <a href="https://plus.google.com/109611949306916087163/posts?hl=en-GB" target="_blank"><font color="white"><i class="fa fa-google-plus fa-3x"></i></font></a>        
			        </div>
			        <p align="center"><font color="white"><b>&copy; 2015 Company, Inc. All rights Resevered.</b></font></p>
      		</footer>

		</div><!-- div of first footer class -->
    </div><!-- /.container -->	

	<a href="#0" class="cd-top">Top</a>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>

</body>
</html>