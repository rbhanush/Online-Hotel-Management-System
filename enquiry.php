<!DOCTYPE html>
<html>
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
    <script type="text/javascript" src="validcontact.js"></script>
	<script language=Javascript>
	      <!--
	      function isNumberKey(evt)
	      {
	         var charCode = (evt.which) ? evt.which : event.keyCode
	         if (charCode > 31 && (charCode < 48 || charCode > 57))
	            return false;

	         return true;
	      }

        function checkmessage()
        {
        var error="";
        theForm=document.forms['f'];
        var fn=theForm.message;
        
        if(fn.value=="")
        {       fn.style.background = 'Yellow';

            alert("You didn't enter the Message.\n");
        }
                else if ((fn.value.length > 50) ) {
            fn.style.background = 'Yellow';
            alert("The Maximum size of Message is 50 characters\n");
        }

        else
        {
            fn.style.background = 'White';
        }
    }
	      //-->
	</script>
	  

	<?php
		  require('connect.php');
	if(isset($_POST['submit']))
	{
	require("connect.php");
	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$message=$_POST["message"];

	$sql="INSERT INTO contact VALUES('', '$name','$email','$phone','$message')";

	$result=mysql_query($sql) or die(mysql_error());
	if($result)
	{

	echo "<script type=\"text/javascript\">
	alert(\"Message Sent\");
	</script>";
	}
	else
	header("Location:enquiry.php");

	}
	?>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
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
                        	<div class="col">
                        		 <a href="enquiry.php" class="active text-center">Enquiry</a>
                          	</div>
                        </div>
                        <hr>
                      </div>

                      <div class="panel-body">
                        	<div class="row">
                              <div class="col-lg-12">
                                <form action="" id="f" method="post" name="f" onsubmit="return validateEnquiry(this);" role="form" style="display: block;">

                                    <div class="form-group">
                                      <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Enter your Name" onblur="checkname()">
                                    </div>

                                    <div class="form-group">
                                      <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Enter your E-mail" onblur="checkemail()">
                                    </div>

                                    <div class="form-group">
                                      <input type="text" name="phone" id="phone" tabindex="3" class="form-control" placeholder="Enter your Contact Number" maxlength="10" onkeypress="return isNumberKey(event)">
                                    </div>

                                   	<div class="form-group">
                                      <textarea type="text" name="message" id="message" tabindex="4" class="form-control" placeholder="Enter your Message" onblur="checkmessage()"></textarea>
                                    </div>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                          <input type="submit" name="submit" id="submit" tabindex="5" class="form-control btn btn-login" value="Submit">
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
</body>
</html>