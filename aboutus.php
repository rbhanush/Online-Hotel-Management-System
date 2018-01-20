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
    <link href='https://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
    <style type="text/css">
    	table, th, td {
			    border: 2px solid black;
			    border-collapse: collapse;
			}		
         

        .middleportion {float:left;width: 45%;padding-left: 40%;}
        div#menu {
                width: 100%;
                padding-left: 30px;
                padding-top: 12px;
                border: 5px solid white;
                margin: 0;
				}

        .tab-content{
                    background-color:transparent;
                    color:black;
                    padding:5px
                    }
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
          color: #555555;
          cursor: default;
          background-color: #ffffff;
          cursor: default;
          border: 1px solid #dddddd;
          border-bottom-color: transparent;
          } 

          .jumbotron{
            background-color: transparent;
          }
          .well{
            background-color: transparent;
          }
    </style>
</head>
<body>
<?php
      require('connect.php');

      $e1= mysql_query("SELECT rate FROM tariff WHERE no='1'");
      $row    =mysql_fetch_assoc($e1);
      $r1   =$row['rate'];
      $e2= mysql_query("SELECT rate FROM tariff WHERE no='2'");
      $row    =mysql_fetch_assoc($e2);
      $r2   =$row['rate'];
      $e3= mysql_query("SELECT rate FROM tariff WHERE no='3'");
      $row    =mysql_fetch_assoc($e3);
      $r3   =$row['rate'];
      $e4= mysql_query("SELECT rate FROM tariff WHERE no='4'");
      $row    =mysql_fetch_assoc($e4);
      $r4   =$row['rate'];
      $e5= mysql_query("SELECT rate FROM tariff WHERE no='5'");
      $row    =mysql_fetch_assoc($e5);
      $r5   =$row['rate'];
      $e6= mysql_query("SELECT rate FROM tariff WHERE no='6'");
      $row    =mysql_fetch_assoc($e6);
      $r6   =$row['rate'];
      $e7= mysql_query("SELECT rate FROM tariff WHERE no='7'");
      $row    =mysql_fetch_assoc($e7);
      $r7   =$row['rate'];
  ?> 
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
                                    <li><a href="index.html"><font color="black"><b>Home</b></font></a></li>
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
  <!-- Nav tabs -->
  <br>
  <ul class="nav nav-tabs nav-justified"  id="myTabs">
    <li role="presentation" class="active"><a href="#services" data-toggle="tab"><font color="black"><b>Services</b></font></a></li>
    <li role="presentation"><a href="#facilities" data-toggle="tab"><font color="black"><b>Facilities</b></font></a></li>
    <li role="presentation"><a href="#foodmenu" data-toggle="tab"><font color="black"><b>Food Menu</b></font></a></li>
    <li role="presentation"><a href="#tariff" data-toggle="tab"><font color="black"><b>Tariff</b></font></a></li>
  </ul>

  <!-- Tab panes -->
    <div class="tab-content">

      <div class="tab-pane fade in active jumbotron well" id="services" style="font-family: 'Special Elite', cursive;">
        <h2 align="center"><u><b><i><font color="#EF9A9A">Services:</font></i></b></u></h2>
        <ul style="list-style-type:disc; color:white;">
          <li><h2><font color="#CDDC39">Hotel Sai Suraj International,</font><font size="4px "color="#1A237E"><b> brings in a new style and exclusivity in the midst of the developing city of the Surathkal. We take a word "Reception" seriously with courteous staff trained to please.</b></font></h2></li><br>
          <li><h2><font color="#CDDC39">"Sun-City Fine Dine" </font><font size="4px" color="#1A237E"><b>the AC Restaurant & Bar will serve you mouth watering Continental/Chinese/South Indian Veg/Non veg delicacies.</b></font></h2></li><br>
          <li><h2><font color="#CDDC39">"Sun-n-Shine Veg" </font><font size="4px" color="#1A237E"><b>Treat simply well designed vegetarian Restaurant with separate modified kitchen.</b></font></h2></li><br>
          <li><font size="4px" color="#1A237E"><b>Those who looking for tension free conference and party away from the city. Here is the place at </b></font><font color="#CDDC39" size="6px">"Suryodaya Terrace Garden" </font><font color="#1A237E" size="4px"><b>with a capacity of 600 members. With all the modern amenities.</b></font></li><br>
          <li><font size="4px" color="#1A237E"><b>Each room is provided with Channel Color TV, Telephone with direct dialing facility, hot & cold water & 24 hrs room service.</b></font></li><br>
          <li><font size="6px" color="#CDDC39">Feel at Home </font><font color="#1A237E" size="4px"><b>- All rooms specially designed to throaty pamper and please our guests.  Sink under soft linen sheets and warm interiors in our delightful rooms, call for discreet & quite room service, take a hot or cold shower as you please or simply watch TV with the snack of your choice.</b></font></li><br>
          <li><font size="4px" color="#1A237E"><b>The hotel has a variety of different kind of rooms. A/C Super Deluxe & Deluxe rooms with all the modern amenities at an affordable price with impeccable service to provide the most comforting experience.</b></font></li>
        </ul>
      </div>

      <div class="tab-pane fade in jumbotron well" id="facilities" style="font-family: 'Kaushan Script', cursive;height: 100%; width: 60%;margin-left:26%">
                <h3><i><u><font color="white">Amenities:</font></u></i></h3>
                <ul>               
                  <li>Hi-speed Wi-Fi (on request/chargeable)</li>
                  <li>Broadband/Any Other High-speed Access</li>
                  <li>Doctor on Call (on request/chargeable)</li>
                  <li>Electronic Safe Deposit</li>
                  <li>DVD Player</li>
                  <li>LCD (34 Inches)</li>
                  <li>Fruits</li>
                  <li>Bathrobes</li>
                  <li>Tea Coffee Maker</li>
                  <li>Mini Bar</li>
                  <li>Shopping Arcade (In Close Proximity)</li>
                </ul>


                <h3><i><u><font color="white">Satellite Television:</font></u></i></h3>
                <ul>
                  <li>CNBC</li>
                  <li>BBC</li>
                  <li>Times</li>
                  <li>Ten Sports</li>
                  <li>Star Sports</li>
                  <li>Cricket</li>
                  <li>ESPN</li>
                </ul>
            
            
                <h3><i><u><font color="white">Services:</font></u></i></h3>
                <ul>
                  <li>Business Centre (on request/chargeable)</li>
                  <li>Iron and Ironing Board</li>
                  <li>Daily Housekeeping</li>
                  <li>Turn Down Service</li>
                  <li>Laundry, Pressing and Dry Cleaning</li>
                  <li>All Major Credit Cards Accepted</li>
                  <li>Direct Dial</li>
                  <li>Valet Parking</li>
                  <li>Secretarial Service</li>
                  <li>24-hour In Room Dining</li>
                  <li>Complimentary Breakfast</li>
                  <li>Inter connecting Rooms</li>
                  <li>Travel Assistance</li>
                  <li>Rooms for the Differently Abled</li>
                  <li>Foreign Exchange</li>
                  <li>Banqueting</li>
                  <li>Baby Sitting</li>
                  <li>Fitness Centre</li>
                  <li>Concierge</li>
                  <li>Doctor on Call</li>
                </ul>
      </div>

      <div class="tab-pane fade" id="foodmenu" style="font-family: "Times New Roman", Times, serif;">
        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
              <table width="100%" align="center" cellspacing="3" >
                <tr>
                  <th scope="row"><img src="img/header_bg.gif" width="100%" height="100%" /></th>
                </tr>
                
                <tr>
                  <th height="99" scope="row"><marquee >
                        <img src="img/4page-img1.png" width="110" height="110" />&nbsp;&nbsp;<img src="img/chicken.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/bread roll.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/header.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/prons.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/spaghetti noddles.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/sandwitch.JPG" width="100" height="100" />&nbsp;&nbsp;<img src="img/tumblr_lwnfgktzvw1qdpdi4o1_500.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/specials.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/2page-img7.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/2page-img8.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/cake.jpg" width="100" height="100" />&nbsp;&nbsp;<img src="img/tumblr_lbcxphXRHs1qa2xsmo1_500.jpg" width="100" height="100" />
                    </marquee></th>
                </tr>
              </table>
              <table width="100%" height="388" align="center" background="img/Picture7.png">
                        <tr>
                          <th width="100%" scope="row">
                            <br><br><br><br><br><br><br>
                            <a href="sunshine.html" style="margin-left:25%;"><font color="white" size="6%"><u>&quot;Sun-n-Shine Veg&quot;</u></font></a>
                            <br><br><br><br>
                            <a href="suncity.html" style="margin-left:25%;"><font color="white" size="6%"><u>&quot;Sun-City Fine Dine&quot;</u></font></a>
                          </th>
                        </tr>
              </table>
          </div>
          <div class="col-md-1">
          </div></div>
          </div>
      <div class="tab-pane fade" id="tariff">
      		<br>         
      		<table align="center" style="border:2px solid black;">     
      				<tr>
      					<th colspan="2" class="text-center" height="50"><font color="white" size="5px"><u>Tariff</u></th>
                    </tr>
                    <tr>
                      <th width="350" height="57" scope="row">&nbsp;&nbsp;Single Room Non AC</th>
                      <td width="198"><div align="center"><b>Rs. <?php echo $r1 ?></b></div></td>
                  	</tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Single Room  AC</th>
                      <td><div align="center"><b>Rs. <?php echo $r2 ?></b></div></td>
                  	</tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Deluxe Room Non AC</th>
                      <td><div align="center"><b>Rs. <?php echo $r3 ?></b></div></td>
                  	</tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Deluxe Room AC</th>
                      <td><div align="center"><b>Rs. <?php echo $r4 ?></b></div></td>
                  	</tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Suite Room AC</th>
                      <td><div align="center"><b>Rs. <?php echo $r5 ?></b></div></td>
                    </tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Suite Room Non AC</th>
                      <td><div align="center"><b>Rs. <?php echo $r6 ?></b></div></td>
                    </tr>
                    <tr>
                      <th height="57" scope="row">&nbsp;&nbsp;Hall</th>
                      <td><div align="center"><b>Rs. <?php echo $r7 ?></b></div></td>
                    </tr>
          </table>
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
                    <div class="social-icon text-center">
                      <a href="https://www.facebook.com/rohit.bhanushali.5437" target="_blank"><font color="white"><i class="fa fa-facebook fa-3x"></i></font></a>
                      <a href="https://twitter.com/samrohit27" target="_blank"><font color="white"><i class="fa fa-twitter fa-3x"></i></font></a>
                      <a href="https://plus.google.com/109611949306916087163/posts?hl=en-GB" target="_blank"><font color="white"><i class="fa fa-google-plus fa-3x"></i></font></a>        
                    </div>
                    <p align="center"><font color="white"><b>&copy; 2015 Company, Inc. All rights Resevered.</b></font></p>
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
 <script>
            // Javascript to enable link to tab
            var hash = document.location.hash;
            var prefix = "tab_";
            if (hash) {
                $('.nav-tabs a[href=' + hash.replace(prefix, "") + ']').tab('show');
            }

            // Change hash for page-reload
            $('.nav-tabs a').on('shown', function(e) {
                window.location.hash = e.target.hash.replace("#", "#" + prefix);
            });
        </script>        

</body>
</html>