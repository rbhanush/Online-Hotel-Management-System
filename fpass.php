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
    <script type="text/javascript" src="validpass.js"></script>
    <script type="text/javascript" src="validnewpass.js"></script>
    <script language=Javascript>
          <!--
        function Name()
    {
      var error="";
      theForm=document.forms['f'];
      var fn=theForm.username;
      
      if(fn.value=="")
      {   fn.style.background = 'Yellow';

        alert("You didnt enter the Username.\n");
      }
      
      else
      {
        fn.style.background = 'White';
      }
    }

    function checksecquestion(fld) {
          var error = "";
          theForm=document.forms['f'];
      var fld=theForm.secquestion;

        if(fld.value == 'default') {
        fld.style.background = 'Yellow';
            alert("Please select the security question.\n");
        }
        else
      {
        fn.style.background = 'White';
      }
    }

    function checkpass()
    {
      var error="";
      theForm=document.forms['f2'];

      var pass=theForm.npass;

    if(pass.value=="")
      {   pass.style.background = 'Yellow';

        error += "You didnt enter the password.\n";
      }
      else if ((pass.value.length < 5) ) {
            pass.style.background = 'Yellow';
            error = "The password must be min 5 character long.\n";
        }

      if(error=="")
      {
        pass.style.background = 'White';
      }
      else
      {
        alert(error);
      }
    }

    function checkconfirpass()
    {
      var error="";
      theForm=document.forms['f2'];

      var pass=theForm.npass;
      var confpass=theForm.cpass;

    if(confpass.value=="")
      {   confpass.style.background = 'Yellow';

        error += "You didnt enter the confirmation password.\n";
      }
      
      else if(pass.value != confpass.value)
      {
        if(pass!=confpass){
            confpass.style.background = 'Yellow';
          error += "Confirmation password mismatch.\n";
      }}
      
      if(error=="")
      {
        confpass.style.background = 'White';
      }
      else
      {
        alert(error);
      }
    }

    function Secans()
    {
      var error="";
      theForm=document.forms['f'];
      var fn=theForm.secanswer;
      
      if(fn.value=="")
      {   fn.style.background = 'Yellow';

        alert("You didnt enter the Current password.\n");
      }
      
      else
      {
        fn.style.background = 'White';
      }
    }
    </script>
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

        <?php
   error_reporting(0);
      require('connect.php');
    if(isset($_POST['submit']))
    {       require('connect.php');
      $user   =$_POST['username'];
    $secquestion=$_POST['secquestion'];
    $secanswer  =$_POST['secanswer'];

          $checkquestion  = mysql_query("SELECT security_question FROM registration WHERE user='$user' ");
      $row      = mysql_fetch_assoc($checkquestion);
            $secques    = $row['security_question'];

            if($secquestion != $secques)
      {
      echo "<script type=\"text/javascript\">
alert(\"Incorrect question.Please enter correct value and try again!!! \");
</script>";
}       
          else
      {
        $checkanswer  =mysql_query("SELECT answer FROM registration WHERE user='$user' ");
        $row      =mysql_fetch_assoc($checkanswer);
              $answer     =$row['answer'];
        if($secanswer != $answer)
        {
        echo "<script type=\"text/javascript\">
alert(\"Incorrect answer.Please enter correct value and try again!!! \");
</script>";
}
        else
        {
          echo '<div class="container">';
          echo '<div class="row">';
             echo '<div class="col-md-6 col-md-offset-3">';
                  echo '<div class="panel panel-login">';
                      
                        
                                        

                     echo "<div class='panel-body'>";
                         echo "<div class='row'>";
                            echo "<div class='col-lg-12'>";
                              echo "<form id='forgot-password' action='newpass.php' method='post' role='form' style='display: block;' onsubmit='return validForgetpass(this);'>

                                    <div class='form-group'>
                                      <input type='text' name='user' tabindex='1' class='form-control' value='$user' onfocus='this.blur()'>
                                    </div>

                                    <div class='form-group'>
                                      <input type='password' name='npass' tabindex='2' class='form-control' placeholder='New Password' onblur='checkpass()'>
                                    </div>

                                    <div class='form-group'>
                                      <input type='password' name='cpass' tabindex='3' class='form-control' placeholder='Confirm Password' onblur='checkconfirpass()'>
                                    </div>

                                    <div class='form-group'>
                                      <div class='row'>
                                        <div class='col-sm-6 col-sm-offset-3'>
                                          <input type='submit' name='changepass' id='submit' tabindex='4' class='form-control btn btn-register' value='Update Password'>
                                        </div>
                                      </div>
                                    </div>";

                             echo "</form>";

                            echo " </div>";
                   echo " </div>";
                 echo "</div>";

           echo "</div>";
          echo "</div>";
          echo "</div>";
   echo "</div>

            <div class='container'>
      <div class='footer'>
          <hr class='featurette-divider'>
            <div class='container'>
              <p align='center'>
                <a href='index.html'><font color='black'><b>Home</b></font></a>&nbsp;&nbsp; &nbsp;<font color='white'>|</font> &nbsp; &nbsp;&nbsp;
                <a href='aboutus.php'><font color='black'><b>About us</b></font></a>&nbsp;&nbsp; &nbsp;<font color='white'>|</font> &nbsp; &nbsp;&nbsp;
                <a href='login.php'><font color='black'><b>Booking</b></font></a>&nbsp;&nbsp; &nbsp;<font color='white'>|</font> &nbsp; &nbsp;&nbsp;
                <a href='tourplace.html'><font color='black'><b>Places to Visit</b></font></a>&nbsp;&nbsp; &nbsp;<font color='white'>|</font> &nbsp; &nbsp;&nbsp;
                <a href='lmap.html'><font color='black'><b>Location Map</b></font></a>&nbsp;&nbsp; &nbsp;<font color='white'>|</font> &nbsp; &nbsp;&nbsp;
                <a href='enquiry.php'><font color='black'><b>Enquiry</b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            </div>
          <hr class='featurette-divider'>   
          <div class='row featurette'>
            <div class='col-md-3'>
                  <h3><font color='white'><u>Contact Us:</u></font></h3>
                  <font color='white'>SAI SURAJ INTERNATIONAL HOTELS PVT. LTD.</font><br>
                  <font color='white'>0824-2478531/32/33</font>
            </div>
            <div class='col-md-9'>
                      <div id='menu'>
                        <ul id='menu'>
                            <li>
                              <a href='gallery.html'>
                                <img src='img/hotel.jpg' width='109px'><img src='img/suite_1.jpg' width='175px'><img src='img/lobby.jpg' width='175px'><img src='img/lounge.jpg' width='147px'><img src='img/dine_3.jpg' width='175px'>
                              </a>
                            </li>
                        </ul>
                      </div>
            </div>
          </div>
          <hr class='featurette-divider'>

      <footer id='footer'style='position: relative;'>
      <div class='container'>
        <div class='social-icon text-center'>
          <a href='https://www.facebook.com/rohit.bhanushali.5437' target='_blank'><font color='white'><i class='fa fa-facebook fa-3x'></i></font></a>
          <a href='https://twitter.com/samrohit27' target='_blank'><font color='white'><i class='fa fa-twitter fa-3x'></i></font></a>
          <a href='https://plus.google.com/109611949306916087163/posts?hl=en-GB' target='_blank'><font color='white'><i class='fa fa-google-plus fa-3x'></i></font></a>        
        </div>
        <p align='center'><font color='white'><b>&copy; 2015 Company, Inc. All rights Resevered.</b></font></p>
      </div>
      </footer>

      </div><!-- div of first footer class -->
    </div><!-- /.container -->  


    <a href='#0' class='cd-top'>Top</a>";



    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
    echo "<script src='js/bootstrap.min.js'></script>";
    echo "<script src='js/main.js'></script>";
    echo "<script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>";
        die("");
            }
            
  }}
?>

    <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">
                      <div class="panel-heading">
                        <div class="row">
                        	<div class="col">
                        		 <a href="fpass.html" class="active text-center">Forgot Password</a>
                          	</div>
                        </div>
                        <hr>
                      </div>

                      <div class="panel-body">
                        	<div class="row">
                              <div class="col-lg-12">
                                <form id="forgot-password" action="" method="post" role="form" style="display: block;" onsubmit="return validForgetpassword(this);">

                                    <div class="form-group">
                                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" onblur="Name()">
                                    </div>

                                    <div class="form-group">
                                      <input type="text" name="secquestion" id="secquestion" tabindex="2" class="form-control" placeholder="Security Question" onblur="checksecquestion()">
                                    </div>

                                    <div class="form-group">
                                      <input type="text" name="secanswer" id="secanswer" tabindex="3" class="form-control" placeholder="Security Answer" onblur="Secans()">
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