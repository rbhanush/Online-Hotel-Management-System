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
    <script language=Javascript>
	    function Bill()
		{
			var error="";
			theForm=document.forms['f'];
			var fn=theForm.user;
			
			if(fn.value=="")
			{		fn.style.background = 'Yellow';

				alert("You didn't enter the Username.\n");
			}
			
			if(error=="")
			{
				fn.style.background = 'White';
			}
		}
	</script>
	<script type="text/javascript" src="validatebill.js"></script>
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
                                    <li><a href="cust.php"><font color="black"><b>Back</b></font></span></a></li>
                                    <li><a href="signout.php"><font color="black"><b>Sign Out</b></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-3"><a href="adminregister.php" class="btn btn-default btn-lg" role="button">Customer Registration Details</a></div>
        <div class="col-md-3"><a href="billing.php" class="btn btn-default btn-lg disabled" role="button">&nbsp;&nbsp;&nbsp;Search Booked Customer&nbsp;&nbsp;&nbsp;</a></div>
        <div class="col-md-3"><a href="bill.php" class="btn btn-default btn-lg" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        <div class="col-md-3"><a href="enquiry.php" class="btn btn-default btn-lg" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enquiry Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
    </div>
  </div> 

<?php
session_start();

    if ( $_SESSION['username'])
    {  $user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM adminlogin WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{								 		 
    				 echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";
?>

      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">
					  <div class="panel-body">
                        	<div class="row">
                              <div class="col-lg-12">
                                <form id="form1" action="" name="f" method="post" role="form" style="display: block;" onsubmit="return validBill(this);">

                                    <div class="form-group">
                                      <input type="text" name="user" id="user" onblur="Bill()" placeholder="Username" tabindex="1" class="form-control">
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

    <?php
					 if(isset($_POST['submit']))
{
			$user=$_POST["user"];
			$ex=mysql_query("SELECT * FROM roombooking WHERE username='$user'") or die(mysql_error());
			$count=mysql_num_rows($ex);
				if($count)
				{
	$ex1=mysql_query("SELECT * FROM registration WHERE user='$user'") or die(mysql_error());
								$row=mysql_fetch_assoc($ex1);
					$fname=$row['first_name'];
$gender=$row['gender'];
$city=$row['city'];
$state=$row['state'];
$country=$row['country'];
$phone=$row["phone"];
$email=$row["email"];

echo"<div class='container'>
                        <div class='row'>
                            <div class='col-sm-3'></div>
                            <!-- panel preview -->
                            <div class='col-sm-6'>
                                <div class='panel panel-default'>
                                    <div class='panel-body form-horizontal payment-form'>
                                      
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Username:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$user' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Name:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$fname' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Gender:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$gender' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>City:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$city' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>State:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$state' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Country:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$country' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Phone No.:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$phone' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><u><i>Email:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' value='$email' onFocus='this.blur()'/>
                                            </div></i></u>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-3'></div>
                        </div>
                    </div>";

						echo "<div class='container'>
                                <div class='row'>
                                   
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <div class='col-sm-1'></div>
                                            <label for='type' class='col-sm-1 control-label'><center><u>Room No.:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Room Type:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Ac/Non-Ac:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-in Date:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-out Date:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Rate/Day:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>No.of Days:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Amount:</u></center></label>
                                            <div class='col-sm-1'></div>
                                         </div>";
                           $total=0;
								$ex2=mysql_query("SELECT * FROM roombooking WHERE username='$user'") or die(mysql_error());
					$count=mysql_num_rows($ex2);
				if($count)
				{
					while($row=mysql_fetch_assoc($ex2)){
					$perday	=0;
				$cin			=$row['checkindate'];
				$cout			=$row['checkoutdate'];
				$ndays			=$row['ndays'];
				$ct				=$row['category'];
				$type			=$row['type'];
				$optn			=$row['option'];
				$pernday		=$row['rate'];
				$roomno			=$row['roomno'];
				$perday			=$pernday/$ndays;
				$total 	=$total+$pernday;
							echo "<div class='form-group'>
                                            <div class='col-sm-1'></div>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$roomno</center></label>
                                            <label for='type' class='col-sm-1 control-label'><center>$type</center></label>
                                            <label for='option' class='col-sm-1 control-label'><center>$optn</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cin</center></label>
                                            <label for='roomno' class='col-sm-2 control-label'><center>$cout</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$perday</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$ndays</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$pernday</center></label>
                                            <div class='col-sm-1'></div>
                                         </div>";
                    }
				}
				$ex3=mysql_query("SELECT * FROM hallbooking WHERE username='$user'") or die(mysql_error());
					$count=mysql_num_rows($ex3);
				if($count)
				{
				while($row=mysql_fetch_assoc($ex3)){
					$perday	=0;
				$cin			=$row['checkindate'];
				$cout			=$row['checkoutdate'];
				$ndays			=$row['ndays'];
				$pernday			=$row['rate'];
				$perday			=$pernday/$ndays;
				$total 	=$total+$pernday;
						echo "<div class='form-group'>
                                            <div class='col-sm-1'></div>
                                            <label for='roomno' class='col-sm-1 control-label'><center>-</center></label>
                                            <label for='type' class='col-sm-1 control-label'><center>Hall</center></label>
                                            <label for='option' class='col-sm-1 control-label'><center>-</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cin</center></label>
                                            <label for='roomno' class='col-sm-2 control-label'><center>$cout</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$perday</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$ndays</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$pernday</center></label>
                                            <div class='col-sm-1'></div>
                                         </div>";
                        }
				}
				echo " </div>
            </div> 
              
    
    </div>
</div>";
				 echo"<div class='container'>
                        <div class='row'>
                            <div class='col-sm-3'></div>
                            <!-- panel preview -->
                            <div class='col-sm-6'>
                                <div class='panel panel-default'>
                                    <div class='panel-body form-horizontal payment-form'>
                                      
                                        <div class='form-group'>
                                            <label class='col-sm-6 control-label' style='font-size:175%'><center><u><i>Total Amount Paid:</center></label>
                                            <div class='col-sm-6'>
                                                <input type='text' style='font-size:200%' name='total' value='Rs.$total' onFocus='this.blur()' class='form-control'/>
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
		{
		echo "<script type=\"text/javascript\">
alert(\"Currently, there is no bill present for $user\");
</script>";
		}
		}
		}
   else
    {	
        header("Location:../login.php");
    }}
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