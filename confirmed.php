<?php
session_start();
?>
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
    <link rel="stylesheet" href="css/datepicker.css">
    <style type="text/css">
        div#menu {
                width: 100%;
                padding-left: 30px;
                padding-top: 12px;
                border: 5px solid white;
                margin: 0;
				}
		select{
    		font-weight: bold;
    		color: black;
    		height: 100%;
		}
		option{
    		font-weight: bold;
    		font-size: 15px;
    		color: black;
    		height: 100%;
		}
        label{
            font-size: 17px;
            font-weight: bold;
            color: black;
        }
        input[type="text"], textarea {
          background: transparent;
          color: black;
          font-weight: bold;
          font-size: 15px;
          height: 100%;
        }
	</style>
	<script language="javascript" src="cal2.js"></script>
	<script language="javascript" src="cal_conf2.js"></script>
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
        <a href="viewbook.php" class="btn btn-default btn-lg" role="button">View Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="res.php" class="btn btn-danger btn-lg" role="button">Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="signout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
    </div>


              <?php
			
		    if ( $_SESSION['username'])
    {  
			 $user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{			    
    			 echo "<br><center><strong><font color='white' size='3%'><b><u>Welcome ".$_SESSION['username']."</u></b></font><br /><br></center></strong>";			 

		require('connect.php');
		if(isset($_POST['submit']))
		{	
			$username	=$_POST["username"];
			$bankname	=$_POST["bankname"];
			$cardno		=$_POST["cardno"];		
			$password	=$_POST["password"];
			$amount		=$_POST["amount"];
			$transid	=$_POST['transid'];
			$username	=$_POST['username'];
			$rooms	    =$_POST['roomno'];
			$cindate	=$_POST['cindate'];
			$coutdate	=$_POST['coutdate'];
			$ct			=$_POST['ct'];
				$ndays		=$_POST["ndays"];
			$type		=$_POST["type"];
			$optn		=$_POST["optn"];
						$perroom	=$_POST["perroom"];
			
			
			$check=mysql_query("SELECT * FROM bankdetails WHERE bankname='$bankname' AND cardno='$cardno' AND password='$password'")or die(mysql_error());
			
			if(($num=mysql_num_rows($check))==1)
			{
				$row=mysql_fetch_assoc($check);
				
				$balance = $row['balance'];
				
				if($balance>$amount)
				{
					$remaining_balance=$balance-$amount;
					
					mysql_query("UPDATE bankdetails SET balance='$remaining_balance' WHERE cardno='$cardno'")or die("Unable to do transaction from your account.");
					
					mysql_query("INSERT INTO payment VALUES('','$username','$transid','$bankname','$amount','$cardno','$password')")or die("Unable to do transaction.");
				
					if($ct=='Hall')
					{
						mysql_query("INSERT INTO hallbooking VALUES('','$username','$cindate','$coutdate','$ndays','$amount')")or die("Unable to do transaction.");
					}
					else
					{
						$len=strlen($rooms);
						$i=0;
						while($i<$len)
						{
							$roomno=$rooms[$i]."".$rooms[$i+1]."".$rooms[$i+2];
							$daysamt=$perroom*$ndays;
							mysql_query("INSERT INTO roombooking VALUES('','$username','$roomno','$cindate','$coutdate','$ndays','$ct','$type','$optn','$daysamt')")or die("Unable to do transaction.");
							$i=$i+4;
						}
					}
	
					echo "<b><center><font color='white' size='5%'>Booking Done Successfully.</font></center></b><br>";
					
							

			   echo"<div class='container'>
                        <div class='row'>
                            <div class='col-sm-3'></div>
                            <!-- panel preview -->
                            <div class='col-sm-6'>
                                <div class='panel panel-default'>
                                	<div class='panel-heading'>
				                        <div class='row'>
				                        	<div class='col-md-12'>
				                        		 <a class='text-center'><center><font size='5%'><u>Details</u></font></center></a>
				                          	</div>
				                        </div>
                        	    </div>
                                    <div class='panel-body form-horizontal'>
                                      
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Userame:</center></label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='username' value='$username' onFocus='this.blur()'>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Bank Name:</center></label>
                                            <div class='col-sm-8'>
                                                <input type='text' name='bankname' class='form-control' value='$bankname' onFocus='this.blur()'>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Transaction ID:</center></label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='transid' value='$transid' onFocus='this.blur()'>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Deducted Amount:</center></label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='amount' value='$amount' onFocus='this.blur()'>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Current Amount:</center></label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='amnt' value='$remaining_balance.00' onFocus='this.blur()'>
                                            </div></i></u>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-3'></div>
                        </div>
                    </div>";
                }
				else
					echo "<b><center><font color='white' size='5%'>Sorry, You don't have enough Balance.</font></center></b><br>";
			}
			else
				echo "<b><center><font color='white' size='5%'>Sorry, The details you supplied doesn't exist.</font></center></b><br>";
			
			}
		}
		 else
    {	
        header("Location:login.php");
    }
		}
		?>          
    

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
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>