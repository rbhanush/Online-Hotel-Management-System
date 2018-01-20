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
    <script type="text/javascript" src="validchangepass.js"></script>
    <script language=Javascript>
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
    error_reporting(0);
    session_start();
    if ( $_SESSION['username'])
        {
            $username=$_SESSION['username'];
            require('connect.php');
            $ex0=mysql_query("SELECT * FROM adminlogin WHERE user='$username'") or die(mysql_error());
            $count=mysql_num_rows($ex0);
            if($count)
                {               
                  echo "<center><strong><b><br><font color='white' size='3%'><u>Welcome ".$_SESSION['username']."</u></font></b><br><br></center></strong>";          
                  if(isset($_POST['submit']))
                    {
                        require('connect.php');
                        //$username=$_POST["username"];
                        $curpass=$_POST["curpass"];
                        $newpass=$_POST["newpass"];
                        $extract1=mysql_query("SELECT *FROM adminlogin WHERE user='$username' ");
                        $count=mysql_num_rows($extract1);

                        if($count == 0)
                         {
                            echo "<script type=\"text/javascript\">
                            alert(\"Sorry user: $user not found...!!!\");
                            </script>";
                         }
                        else
                         {
                            $extract2=mysql_query("SELECT pass FROM adminlogin WHERE user='$username'");
                            $row = mysql_fetch_assoc($extract2);
                            $checkpass = $row['pass'];

                            if($curpass != $checkpass)
                             {
                                echo "<script type=\"text/javascript\">
                                alert(\"Password Incorrect.Please enter correct password and try again!!!\");
                                </script>";
                             }                          
                            else
                             {    
                                $extract2=mysql_query("UPDATE adminlogin SET pass='$newpass' WHERE user='$username' ");
                                echo "<script type=\"text/javascript\">
                                alert(\"Updated Successfully\");
                                </script>";
                             }
                         }
                    }
                } 
        }
?>

    <br>
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
                                <form action="" method="post" role="form" style="display: block;" onsubmit="return validNewpassword(this);">

                                    <div class="form-group">
                                      <input type="text" name="user" value="<?php echo $username; ?>" onfocus="this.blur()" tabindex="1" class="form-control">
                                    </div>

                                    <div class="form-group">
                                      <input type="password" name="curpass" onblur="Current()" tabindex="2" class="form-control" placeholder="Enter the Current Password">
                                    </div>

                                    <div class="form-group">
                                      <input type="password" name="newpass" onblur="New()" tabindex="3" class="form-control" placeholder="Enter the New Password" />
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

