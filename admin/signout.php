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
                                <a href="#" role="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
                                    <li><a href="signout.php"><font color="black"><b>Sign Out</b></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
    </div>



      <?php
session_start();
session_destroy();

echo "<br><br><br>
<center><table style='border:2px solid black; color:#FFFFFF; background-color:transparent; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif' width:100%>
        <tr><td colspan='3'><br></td></tr>
        <tr><td>&nbsp;</td><td><center><font size='5%'>Signed out Successfully.</font></center></td><td>&nbsp;</td></tr>
        
        <tr><td>&nbsp;</td><td><a href='index.html'><font color='black' size='5%'><u><b>Click here</b></u></font></a> <font size='5%'>to go to Home page or wait to be redirected.</font></center></td><td>&nbsp;</td></tr>
        <tr><td colspan='3'><br></td></tr>

        </table></center>";
header('Refresh:5;url=index.html');
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