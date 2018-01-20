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
        <div class="col-md-3"><a href="bill.php" class="btn btn-default btn-lg disabled" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
        <div class="col-md-3"><a href="enquiry.php" class="btn btn-default btn-lg" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enquiry Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
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
            if(!isset($_POST['delete']) && !isset($_GET['roomno']) && !isset($_GET['id']))
             {
                echo "<div class='container'>
                                <div class='row'>
                                   
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Username:</u></center></label>
                                            <label for='type' class='col-sm-1 control-label'><center><u>Room No.:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-in Date:</u></center></label>
                                            <label for='option' class='col-sm-2 control-label'><center><u>Check-out Date:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>No.of Days:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Category:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Room Type:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Ac/Non-Ac:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Rate:</u></center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><u>Option:</u></center></label>
                                       
                                         </div>";
                $ex=mysql_query("SELECT * FROM roombooking") or die(mysql_error());
                $count=mysql_num_rows($ex);
                if($count)
                {               while($row=mysql_fetch_assoc($ex)){
                $username       =$row['username'];
                $roomno         =$row['roomno'];
                $cin            =$row['checkindate'];
                $cout           =$row['checkoutdate'];
                $ndays          =$row['ndays'];
                $ct             =$row['category'];
                $type           =$row['type'];
                $optn           =$row['option'];
                $rate           =$row['rate'];
                        echo "<div class='form-group'>
                                            
                                            <label for='roomno' class='col-sm-1 control-label'><center>$username</center></label>
                                            <label for='type' class='col-sm-1 control-label'><center>$roomno</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cin</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cout</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$ndays</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$ct</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$type</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$optn</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$rate</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><a href='bill.php?roomno=$roomno&delete=yes'><img src='img/b_drop.png'></a></center></label>
                                            
                                         </div>";
                        }
                }
                $ex1=mysql_query("SELECT * FROM hallbooking") or die(mysql_error());
                $count1=mysql_num_rows($ex1);
                if($count1)
                {
                while($row=mysql_fetch_assoc($ex1)){
                $id             =$row['id'];
                $username       =$row['username'];
                $cin            =$row['checkindate'];
                $cout           =$row['checkoutdate'];
                $ndays          =$row['ndays'];
                $rate           =$row['rate'];
                            echo "<div class='form-group'>
                                            
                                            <label for='roomno' class='col-sm-1 control-label'><center>$username</center></label>
                                            <label for='type' class='col-sm-1 control-label'><center>$id</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cin</center></label>
                                            <label for='option' class='col-sm-2 control-label'><center>$cout</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$ndays</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>Hall</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>-</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>-</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center>$rate</center></label>
                                            <label for='roomno' class='col-sm-1 control-label'><center><a href='bill.php?id=$id&delete=yes'><img src='img/b_drop.png'></a></center></label>
                                           
                                         </div>";
            }}

    echo " </div>
            </div> 
              
    
    </div>
</div>";
if($count==0 && $count1==0)
                    {       echo "<script type=\"text/javascript\">
alert(\"No Bils are present\");
</script>";
}
                    echo "</table>";
        }
                
             if(isset($_GET['roomno']) && isset($_GET['delete']))
             {
            $roomno  = $_GET['roomno'];
            $ex=mysql_query("DELETE FROM roombooking WHERE roomno='$roomno'") or die(mysql_error());
            echo "<div class='container'>
                                <div class='row'>
                                    <div class='col-sm-3'></div>
                                    <!-- panel preview -->
                                    <div class='col-sm-6'>
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <label for='roomno' class='col-sm-12 control-label'><center><u><font size='5px'>Customer with Room No. $roomno is Deleted.</font></u></center></label>
                                            </div>";
            echo " </div>
            </div> 
          </form>           
        </div> 
        <div class='col-sm-3'></div>
    </div>
</div>";  
            }
            
            if(isset($_GET['id'])  && isset($_GET['delete']))
             {
            $id =$_GET['id'];
            $ex1=mysql_query("DELETE FROM hallbooking WHERE id='$id'") or die(mysql_error());
            echo "<div class='container'>
                                <div class='row'>
                                    <div class='col-sm-3'></div>
                                    <!-- panel preview -->
                                    <div class='col-sm-6'>
                                      
                                        <div class='panel panel-default'>
                                            <div class='panel-body form-horizontal payment-form'>";
                                            echo "<div class='form-group'>
                                            <label for='roomno' class='col-sm-12 control-label'><center><u><font size='5px'>Hall Booking is Deleted.</font></u></center></label>
                                            </div>";
            echo " </div>
            </div> 
          </form>           
        </div> 
        <div class='col-sm-3'></div>
    </div>
</div>";     
            }}
   else
    {   
        header("Location:../login.php");
    }

}?>





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