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
                                    <li><a href="admincpanel.php"><font color="black"><b>Back</b></font></span></a></li>
                                    <li><a href="signout.php"><font color="black"><b>Sign Out</b></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
  </div>


<?php
    //error_reporting(0);
    session_start();
    if ( isset($_SESSION['username']) )
        {
            $user=$_SESSION['username'];
            require('connect.php');
            $ex0=mysql_query("SELECT * FROM adminlogin WHERE user='$user'") or die(mysql_error());
            $count=mysql_num_rows($ex0);
            if($count)
                {                                        
                    echo "<br><center><strong><font color='white' size='3%'><b><u>Welcome ".$_SESSION['username']."</u></b></font><br></center></strong>";          
                }
            else
                {
                    header("Location:../login.php");
                }
        }
?>

    <br><br>         
    <div class="container">
    <center><a href="newroom.php" role="button"  class="btn btn-danger btn-lg btn-block" style="width:75%"><font color='black'>Add Room</font></a></center>
    <br><br>
    <center><a href="viewroom.php" role="button"  class="btn btn-primary btn-lg btn-block" style="width:75%"><font color='black'>View all Rooms</font></a></center>
    <br><br>
    <center><a href="checkincout.php" role="button"  class="btn btn-success btn-lg btn-block" style="width:75%"><font color='black'>Room Allotment</font></a></center>
    <br><br>
    <center><a href="tariff.php" role="button"  class="btn btn-info btn-lg btn-block" style="width:75%"><font color='black'>Tarrif Plan</font></a></center>
    <br><br>
    </div>

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