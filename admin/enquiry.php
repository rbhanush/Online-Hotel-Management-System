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
        <div class="col-md-3"><a href="billing.php" class="btn btn-default btn-lg" role="button">&nbsp;&nbsp;&nbsp;Search Booked Customer&nbsp;&nbsp;&nbsp;</a></div>
        <div class="col-md-3"><a href="bill.php" class="btn btn-default btn-lg" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        <div class="col-md-3"><a href="enquiry.php" class="btn btn-default btn-lg disabled" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enquiry Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
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
			 echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";			 	 if((!isset($_POST['delete']) && !isset($_GET['id'])))
				 {
			 			$ex=mysql_query("SELECT * FROM contact") or die(mysql_error());
							$count=mysql_num_rows($ex);
				if($count)
				{	
					echo "<div class='container'>
                                <div class='row'>
                                  
                                      
                                        <div class='panel panel-default'>
                                        	 <div class='panel-heading'>
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <a class='text-center'><center><font size='5%'><u>Customer Enquiry/Feedback</u></font></center></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <label for='roomno' class='col-sm-2 control-label'><center><u>Name:</u></center></label>
                                            <label for='type' class='col-sm-2 control-label'><center><u>Email:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Phone:</u></center></label>
                                            <label for='option' class='col-sm-5 control-label'><center><u>Message:</u></center></label>
                                            <label for='option' class='col-sm-1 control-label'><center><u>Option:</u></center></label>
                                      </div>";
                    while($row=mysql_fetch_assoc($ex))
                    {
						$id	=$row['id'];
						$name			=$row['name'];
						$email			=$row['email'];
						$phone			=$row['phone'];
						$msg			=$row['message'];
						echo "<div class='form-group'>
                                                    <label for='roomno' class='col-sm-2 control-label'><center>$name</center></label>
                                                    <label for='type' class='col-sm-2 control-label'><center>$email</center></label>
                                                    <label for='option' class='col-sm-2 control-label'><center>$phone</center></label>
                                                    <label for='option' class='col-sm-5 control-label'><center>$msg</center></label>
                                                    <label for='option' class='col-sm-1 control-label'><center><a href='enquiry.php?id=$id&delete=yes'><img src='img/b_drop.png'></a></center></label>
                               </div>";
                    }
                            }
                    }
                    echo " </div>
            </div> 
       
       
    </div>
</div>";

	if((isset($_GET['delete'])) && (isset($_GET['id'])))
			 {
			$id	 = $_GET['id'];
		
			$ex=mysql_query("DELETE FROM contact WHERE id='$id'") or die(mysql_error());
					
			echo "<script type=\"text/javascript\">
alert(\"Enquiry Details of Customer with ID $id Deleted\");
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