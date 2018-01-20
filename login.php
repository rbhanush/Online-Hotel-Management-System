<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style type="text/css">
        div#menu {
                width: 100%;
                padding-left: 30px;
                padding-top: 12px;
                border: 5px solid white;
                margin: 0;
        }
    </style>

    <script type="text/javascript" src="validadminlogin.js"></script>

  </head>
  <body>
  <?php
   	error_reporting(0);
    session_start();
    if(isset($_SESSION['username']))
    {
  		$username=$_SESSION['username'];
    	require('connect.php');
      	$ex0=mysql_query("SELECT * FROM registration WHERE user='$username'");
        $count=mysql_num_rows($ex0);
        $ex1=mysql_query("SELECT * FROM adminlogin WHERE user='$user'") or die(mysql_error());
		$count1=mysql_num_rows($ex1);
        if($count)
        {         
           	echo "<br><center><strong>Welcome ".$_SESSION['username'].".<br /></center></strong>";      

     		header("Location:login2.html");
    	}
    	else
    		if ($count1) 
    		{
    			echo "<br><center><strong>Welcome ".$_SESSION['username'].".<br /></center></strong>";			 

     			header("Location:admin/admincpanel.php");
    		}
	}

    require('connect.php');

if(isset($_POST['submit']))
    {

        $user=$_POST['username'];
        //$user=mysql_real_escape_string($user);

        //$password=md5($_POST['password']);
    $password=$_POST['password'];


        $extract1=mysql_query("SELECT *FROM registration WHERE user='$user' ");
        $count=mysql_num_rows($extract1);
        $extract2=mysql_query("SELECT *FROM adminlogin WHERE user='$user' ");
        $count1=mysql_num_rows($extract2);

        if($count == 0 && $count1 == 0)
        {
          echo "<script type=\"text/javascript\">
alert(\"Sorry user: $user not found...!!! \");
</script>";
           
        }
        if ($count != 0)
        {
            $extract2=mysql_query("SELECT password FROM registration WHERE user='$user'");
            $row = mysql_fetch_assoc($extract2);
            $checkpass = $row['password'];

            if($password != $checkpass)
            {
            echo "<script type=\"text/javascript\">
      alert(\"Password incorrect.Please enter correct password and try again!!!\");
      </script>";
            }
            else
            {   $_SESSION['username']=$user;
                header("Location:login2.html"); 
            }
          }

         else
         {
          if ($count1 != 0) {
            $extract2=mysql_query("SELECT * FROM adminlogin WHERE user='$user'");
            $row = mysql_fetch_assoc($extract2);
            $checkpass = $row['pass'];
    
            if($password != $checkpass)
            {
        echo "<script type=\"text/javascript\">
alert(\"Password incorrect.Please enter correct password and try again!!!\");
</script>";
            }
            else
            {   $_SESSION['username']=$user;
                header("Location:admin/admincpanel.php"); }
          }
         } 
    }

    
  ?>

  <?php
        error_reporting(0);
        if(isset($_POST['submit1']))
        {
	        require('connect.php');

	        $fname=$_POST["fname"];
	        $username=$_POST["username"];
	        $password=$_POST["password"];
	        $gender=$_POST["sex"];
	        $city=$_POST["city"];
	        $state=$_POST["state"];
	        $country=$_POST["country"];
	        $phone=$_POST["phone"];
	        $email=$_POST["email"];
	        $secquestion=$_POST["secquestion"];
	        $secanswer=$_POST["secanswer"];

	       	$extract1=mysql_query("SELECT * FROM registration WHERE user='$username' ");
	        $count=mysql_num_rows($extract1);

	      	if($count == 0)
	        {

	          $sql="INSERT INTO registration VALUES('', '$fname','$username','$password','$gender','$city','$state','$country','$phone','$email','$secquestion','$secanswer')";

	          $result=mysql_query($sql) or die(mysql_error());
	          if($result)
	          	{
	                echo "Registration done";
	                header('Location:login.php');
	          	}
	          else
	            {   echo "<script type=\"text/javascript\">
	          		alert(\"Registration Failed\");
	          		</script>";
	          	}
	        }
    	} 
  ?>


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
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                          </div>
                          <div class="col-xs-6">
                            <a href="#" id="register-form-link">New User</a>
                          </div>
                        </div>
                        <hr>
                      </div>

                      <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;" onsubmit="return validateLogin(this);">

                                    <div class="form-group">
                                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" onblur="checkname()">
                                    </div>

                                    <div class="form-group">
                                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" onblur="pass()">
                                    </div>

                                    <div class="form-group text-center">
                                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                      <label for="remember"> Remember Me</label>
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                          <input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="text-center">
                                            <a href="fpass.php" tabindex="5" class="forgot-password"><b><font color="black">Forgot Password?</font></b></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                </form>
                                                  
                <form id="register-form" action="" method="post" role="form" style="display: none;" onsubmit="return validateFormOnSubmit(this);">
                  
                  <div class="form-group">
                    <input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="Name" value="<?php echo $_POST['fname'];?>" onblur="checkfname()" onkeypress="return alpha(event,letters)">
                  </div>

                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" onblur="checkuname()" value="<?php echo $_POST['username'];?>">
                  </div>
                  
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $_POST['email'];?>"onblur="checkemail()">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $_POST['password'];?>" onblur="checkpass()">
                  </div>

                  <div class="form-group">
                    <input type="password" name="confirmpass" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" value="<?php echo $_POST['confirmpass'];?>" onblur="checkconfpass()">
                  </div>

                  <div class="form-group">
                      <div class="funkyradio">
                          <div class="row">
                              <div class="col-lg-12">
                                <div class="funkyradio-default">
                                    <input type="radio" name="sex" id="sex" value="Male">
                                    <label for="sex">Male</label>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="funkyradio-default">
                                    <input type="radio" name="sex" id="sex1" value="Female">
                                    <label for="sex1">Female</label>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
               
                  <div class="form-group">
                    <input type="text" name="city" id="city" tabindex="2" class="form-control" placeholder="City" value="<?php echo $_POST['city'];?>" onblur="checkcity()">
                  </div>

                  <div class="form-group">
                    <input type="text" name="state" id="state" tabindex="2" class="form-control" placeholder="State" value="<?php echo $_POST['state'];?>" onblur="checkstate()">
                  </div>
                  
                  <div class="form-group">
                    <input type="text" name="country" id="country" tabindex="2" class="form-control" placeholder="Country" value="<?php echo $_POST['country'];?>" onblur="checkcountry()">
                  </div>
                  
                  <div class="form-group">
                    <input type="text" name="phone" id="phone" tabindex="2" class="form-control" placeholder="Contact" value="<?php echo $_POST['phone'];?>" onkeypress="return isNumberKey(event)">
                  </div>
                 
                  <div class="form-group">
                    <input type="text" name="secquestion" id="secquestion" tabindex="2" class="form-control" placeholder="Security Question" onblur="securityques()">
                  </div>
                 
                  <div class="form-group">
                    <input type="text" name="secanswer" id="secanswer" tabindex="2" class="form-control" placeholder="Security Answer" value="<?php echo $_POST['secanswer'];?>"  onblur="checksecqstn()">
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="submit1" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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


    <a href="#0" class="cd-top">Top</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script type="text/javascript">
        $(function() {
              $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
              });         
              $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
              });
              $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
              });
        });
    </script>
  <script type="text/javascript" src="formvalidation.js"></script>
  <script type="text/javascript">
        function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      </script>
  <script type="text/javascript">
      var letters=' ABCÇDEFGHIJKLMNÑOPQRSTUVWXYZabcçdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ'
      var numbers='1234567890'
      var signs=',.:;@-\''
      var mathsigns='+-=()*/'
      var custom='<>#$%&?¿'

      function alpha(e,allow) 
      {
        var k;
        k=document.all?parseInt(e.keyCode): parseInt(e.which);
        return (allow.indexOf(String.fromCharCode(k))!=-1);
      }
  </script>
<script type="text/javascript" src="validlogin.js"></script>
</body>
</html>