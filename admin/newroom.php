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
    <script type="text/javascript" src="validnewroom.js"></script>
    <style type="text/css">
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
            font-size: 15px;
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
  		<div class="col-md-3">
        <a href="newroom.php" class="btn btn-default btn-lg disabled" role="button">Add Room</a></div>
        <div class="col-md-3"><a href="viewroom.php" class="btn btn-default btn-lg" role="button">View all Rooms</a></div>
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
			if($count)
				{								 		 
					echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";
					if(isset($_POST['submit']))
						{
							$roomno=$_POST["roomno"];
							$type=$_POST["type"];
							$option=$_POST["option"];
    						$extract1=mysql_query("SELECT * FROM roomtypes WHERE roomno='$roomno' ");
        					$count=mysql_num_rows($extract1);
        					if($count == 0)
						        {
									$sql=mysql_query("INSERT INTO roomtypes VALUES('$roomno','$type','$option')") or die(mysql_error());
									echo "<script type=\"text/javascript\">
									alert(\"Room is Added\");
									</script>";
								}
							else
								{
									echo "<script type=\"text/javascript\">
									alert(\"Room already Present\");
									</script>";
								}
						}
				}
   			else
    			{	
        			header("Location:../login.php");
    			}   
		}
?>

<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
        <!-- panel preview -->
        <div class="col-sm-6">
          <form action="" method="post" name="f" id="f" onsubmit="return validateRoom(this)">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                  
                    <div class="form-group">
                        <label for="roomno" class="col-sm-4 control-label"><center>Room No.:</center></label>
                        <div class="col-sm-8">
                            <input name="roomno" type="text" class="form-control" id="roomno" onblur="checkroomno()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-4 control-label"><center>Room Type:</center></label>
                        <div class="col-sm-8">
                            <select name="type" id="type" class="form-control" onblur="checktype()">
				                <option value="default" selected="selected">Choose</option>
				                <option value="Single">Single</option>
				                <option value="Deluxe">Deluxe</option>
				                <option value="Suite">Suite</option>
				            </select>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="option" class="col-sm-4 control-label"><center>Option(Ac/Non-Ac):</center></label>
                        <div class="col-sm-8">
                            <select name="option" id="option" class="form-control" onblur="checkroomoption()">
                            	<option value="default" selected="selected">Choose</option>
				                <option value="Ac">Ac</option>
				                <option value="Non Ac">Non-Ac</option>
				            </select>
                        </div>
                    </div>   
                    <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="submit" id="submit" class="form-control btn btn-register" value="Submit">
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