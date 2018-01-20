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
        input[type="text"],input[type="password"],textarea {
          background: transparent;
          color: black;
          font-weight: bold;
          font-size: 15px;
          height: 100%;
        }
    </style>
    <script language="javascript" src="validaterescon.js"></script>
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
        <a href="res.php" class="btn btn-danger btn-lg disabled" role="button">Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="signout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
    </div>


          <?php

		    if ( $_SESSION['username'])
    {
	 $username=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$username'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{			    
    			 echo "<br><center><strong><font color='white' size='3%'><b><u>Welcome ".$_SESSION['username']."</u></b></font><br /><br></center></strong>";			 

	if(isset($_POST['book']))
		{
			$username	=$_POST["username"];
			$cindate	=$_POST["cindate"];
			$coutdate	=$_POST["coutdate"];
			$rooms		=$_POST["roomno"];
			$perroom	=$_POST["rateperroom"];
			$ndays		=$_POST["ndays"];
			$ct			=$_POST["ct"];
			$type		=$_POST["type"];
			$optn		=$_POST["optn"];
			$rate		=$_POST['rate'];
			$transid	=strtotime(date("Y-m-d G:i:s"));

?>

<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
        <!-- panel preview -->
        <div class="col-sm-6">
          <form action='confirmed.php' name='rescon' method='post' onsubmit="return validateRes(this)">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">

                    <div class="form-group">
                      <div class="col-sm-9">
                        <input type='hidden' name='amount' class="form-control" value='<?php echo $rate?>' />
                        <input type='hidden' name='optn' class="form-control" value='<?php echo $optn?>' />
                        <input type='hidden' name='ndays' class="form-control" value='<?php echo $ndays?>' />
                        <input type='hidden' name='type' class="form-control" value='<?php echo $type?>' />
                        <input type='hidden' name='perroom' class="form-control" value='<?php echo $perroom?>' />
                        <input type='hidden' name='roomno' class="form-control" value='<?php echo $rooms?>' />
                        <input type='hidden' name='cindate' class="form-control" value='<?php echo $cindate?>' />
                        <input type='hidden' name='coutdate'class="form-control"  value='<?php echo $coutdate?>' />
                        <input type='hidden' name='ct' class="form-control" value='<?php echo $ct?>' />
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label"><center>Username:</center></label>
                        <div class="col-sm-8">
                            <input type='text' name='username' class="form-control" value='<?php echo $username?>' onfocus='this.blur()' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bankname" class="col-sm-4 control-label"><center>Bank Name:</center></label>
                        <div class="col-sm-8">
                            <input type='text' name='bankname' class="form-control" id="bankname" onblur="checkbankname()" />
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="cardno" class="col-sm-4 control-label"><center>Account No.:</center></label>
                        <div class="col-sm-8">
                            <input type='text' name='cardno' id="cardno" class="form-control" onblur="checkcardno()" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardno" class="col-sm-4 control-label"><center>Transaction ID:</center></label>
                        <div class="col-sm-8">
                            <input type='text' name='transid' class="form-control" value='<?php echo $transid?>' onfocus='this.blur()' />
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label"><center>Password:</center></label>
                        <div class="col-sm-8">
                            <input type='password' class="form-control" name='password' id="password" onblur="checkpass()" />
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="submit" id="submit" class="form-control btn btn-register" value="Confirm Booking & Pay">
                                </div>
                            </div>
                    </div>
                </div>
            </div> 
          </form>           
        </div> 
        <div class="col-sm-3"></div>
    </div>
</div>
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
      <div class="container">
        <div class="social-icon text-center">
          <a href="https://www.facebook.com/rohit.bhanushali.5437" target="_blank"><font color="white"><i class="fa fa-facebook fa-3x"></i></font></a>
          <a href="https://twitter.com/samrohit27" target="_blank"><font color="white"><i class="fa fa-twitter fa-3x"></i></font></a>
          <a href="https://plus.google.com/109611949306916087163/posts?hl=en-GB" target="_blank"><font color="white"><i class="fa fa-google-plus fa-3x"></i></font></a>        
        </div>
        <p align="center"><font color="white"><b>&copy; 2015 Company, Inc. All rights Resevered.</b></font></p>
      </div>
      </footer>

      </div><!-- div of first footer class -->
    </div><!-- /.container -->  




        <?php			  
		}
		}
		 else
    {	
        header("Location:login.php");
    }
		}?>
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
