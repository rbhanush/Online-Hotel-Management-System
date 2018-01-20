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
	</style>

    <script type="text/javascript" src="validchangepass.js"></script>
    <script language=Javascript>
          <!--

    function Current()
    {
        var error="";
        theForm=document.forms['f'];
        var fn=theForm.curpass;
        
        if(fn.value=="")
        {       fn.style.background = 'Yellow';

            alert("You didn't enter the Current Password.\n");
        }
        else
        {
            fn.style.background = 'White';
        }
    }

    function New()
    {
        var error="";
        theForm=document.forms['f'];
        var fn=theForm.newpass;
        
        if(fn.value=="")
        {       fn.style.background = 'Yellow';

            alert("You didn't enter the New Password.\n");
        }
                else if ((fn.value.length < 5) ) {
            fn.style.background = 'Yellow';
            alert("The Password must be minimum 5 characters long.\n");
        }

        else
        {
            fn.style.background = 'White';
        }
    }

          //-->
       </script>
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
        <a href="changepass.php" class="btn btn-default btn-lg disabled" role="button">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewprofile.php" class="btn btn-default btn-lg" role="button">View Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="changeprofile.php" class="btn btn-default btn-lg" role="button">Change Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewbook.php" class="btn btn-default btn-lg" role="button">View Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="res.php" class="btn btn-danger btn-lg" role="button">Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="signout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
    </div>
<br>
      <?php

error_reporting(0);
session_start();

    if ( $_SESSION['username'])
    {
     $username=$_SESSION['username'];
      require('connect.php');
            $ex0=mysql_query("SELECT * FROM registration WHERE user='$username'") or die(mysql_error());
                            $count=mysql_num_rows($ex0);
                if($count)
                {               
                 echo "<center><strong><b><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";          
        if(isset($_POST['submit']))
    {
        require('connect.php');
        //$username=$_POST["username"];
        $curpass=$_POST["curpass"];
        $newpass=$_POST["newpass"];
        $extract1=mysql_query("SELECT *FROM registration WHERE user='$username' ");
        $count=mysql_num_rows($extract1);

        if($count == 0)
        {
        echo "<script type=\"text/javascript\">
alert(\"Sorry user: $user not found...!!!\");
</script>";
        }
        else
        {
            $extract2=mysql_query("SELECT password FROM registration WHERE user='$username'");
            $row = mysql_fetch_assoc($extract2);
            $checkpass = $row['password'];

            if($curpass != $checkpass)
            {
            echo "<script type=\"text/javascript\">
alert(\"Password Incorrect.Please enter correct password and try again!!!\");
</script>";

            }
            else
            {    $extract2=mysql_query("UPDATE registration SET password='$newpass' WHERE user='$username' ");
           
            echo "<script type=\"text/javascript\">
alert(\"Updated Successfully\");
</script>";

                      }
        }}
    } else
    {   
        header("Location:login.php");
    }
    }
?>

      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">
                      <div class="panel-heading">
                        <div class="row">
                        	<div class="col">
                        		 <a href="changepass.php" class="active text-center">Enter Details to change your Password</a>
                          	</div>
                        </div>
                        <hr>
                      </div>

                      <div class="panel-body">
                        	<div class="row">
                              <div class="col-lg-12">
                                <form id="forgot-password" action="" method="post" role="form" style="display: block;" onsubmit="return validNewpassword(this);">

                                    <div class="form-group">
                                      <input type="text" name="user" value="<?php echo $username; ?>" onfocus="this.blur()" tabindex="1" class="form-control">
                                    </div>

                                    <div class="form-group">
                                      <input type="password" name="curpass" onblur="Current()" tabindex="2" class="form-control" placeholder="Enter the Current Password">
                                    </div>

                                    <div class="form-group">
                                      <input type="password" name="newpass" onblur="New()" tabindex="3" class="form-control" placeholder="Enter the New Password">
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                          <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-register" value="Submit">
                                        </div>
                                      </div>
                                    </div>

                                </form>

                              </div>
            				</div>
          			  </div>

       			  </div>
       		  </div>
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