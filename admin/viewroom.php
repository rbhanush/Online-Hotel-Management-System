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
        <div class="col-md-3"><a href="viewroom.php" class="btn btn-default btn-lg disabled" role="button">View all Rooms</a></div>
        <div class="col-md-3"><a href="checkincout.php" class="btn btn-default btn-lg" role="button">Room Allotment</a></div>
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
            echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";
            echo "<div class='container'>
                                <div class='row'>
                                    <div class='col-sm-3'></div>
                                    <!-- panel preview -->
                                    <div class='col-sm-6'>
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <label for='roomno' class='col-sm-3 control-label'><center><u>Room No.:</u></center></label>
                                            <label for='type' class='col-sm-3 control-label'><center><u>Room Type:</u></center></label>
                                            <label for='option' class='col-sm-3 control-label'><center><u>Ac/Non-Ac:</u></center></label>
                                            <label for='option' class='col-sm-3 control-label'><center><u>Option:</u></center></label>
                                      </div>";
            if($count)
                {                                        
               
                if(!isset($_POST['delete']) && !isset($_GET['roomno']))
                    {
                        
                        $ex=mysql_query("SELECT * FROM roomtypes") or die(mysql_error());
                        $count=mysql_num_rows($ex);
                        if($count)
                            {
                                
                                while($row=mysql_fetch_assoc($ex))
                                    {
                                        $roomno     =$row['roomno'];
                                        $type       =$row['roomtype'];
                                        $optn       =$row['ac'];
                                        echo "<div class='form-group'>
                                                    <label for='roomno' class='col-sm-3 control-label'><center>$roomno</center></label>
                                                    <label for='type' class='col-sm-3 control-label'><center>$type</center></label>
                                                    <label for='option' class='col-sm-3 control-label'><center>$optn</center></label>
                                                    <label for='option' class='col-sm-3 control-label'><center><a href='viewroom.php?roomno=$roomno&delete=yes'><img src='img/b_drop.png'></a></center></label>
                                              </div>";
                                    }
                                
                            }
                    }
                    echo " </div>
            </div> 
          </form>           
        </div> 
        <div class='col-sm-3'></div>
    </div>
</div>";
                
                if(isset($_GET['roomno']) && isset($_GET['delete']))
                    {
                        $roomno  = $_GET['roomno'];
                        $ex=mysql_query("DELETE FROM roomtypes WHERE roomno='$roomno'") or die(mysql_error());
                                
                        echo "<script type=\"text/javascript\">
                        alert(\"Room with Room No. $roomno Deleted\");
                        </script>";
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