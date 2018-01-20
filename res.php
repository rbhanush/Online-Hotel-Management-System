<?php
session_start();
?>
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
    <link rel="stylesheet" href="css/datepicker.css">
    <style type="text/css">
        div#menu {
                width: 100%;
                padding-left: 30px;
                padding-top: 12px;
                border: 5px solid white;
                margin: 0;
				}
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
	<script language="javascript" src="validreservation.js"></script>
	<script type="text/javascript">
	function display(obj,id1,id2) 
	{
		txt = obj.options[obj.selectedIndex].value;
		document.getElementById(id1).style.display = 'none';
		document.getElementById(id2).style.display = 'none';
		
		if ( txt.match(id1) ) {
			document.getElementById(id1).style.display = 'block';
		}
		
		if ( txt.match(id2) ) {
			document.getElementById(id2).style.display = 'block';
		}
	}
	</script>
	<style type="text/css" media="screen">
	<!--
	.hiddenDiv {
		display: none;
		}
	.visibleDiv {
		display: block;
		}
	.style29 {color: #FFFF99}

	-->
	</style>
	<script type="text/javascript"><!--
	var lastDiv = "";
	function showDiv(divName) {
		// hide last div
		if (lastDiv) {
			document.getElementById(lastDiv).className = "hiddenDiv";
		}
		//if value of the box is not nothing and an object with that name exists, then change the class
		if (divName && document.getElementById(divName)) {
			document.getElementById(divName).className = "visibleDiv";
			lastDiv = divName;
		}
	}
	//-->
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

    <div class="container">
        <a href="changepass.php" class="btn btn-default btn-lg" role="button">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewprofile.php" class="btn btn-default btn-lg" role="button">View Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="changeprofile.php" class="btn btn-default btn-lg" role="button">Change Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewbook.php" class="btn btn-default btn-lg" role="button">View Booking</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="res.php" class="btn btn-danger btn-lg disabled" role="button">Reservation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="signout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
    </div>


<?php
	require("connect.php");
	$room_count=0;
	$roomavail='No';
	$hallavail='No';
			
	//Room Nos
	$room1=0;
	$room2=0;
	$room3=0;
	$room4=0;
	$room5=0;
	
	function noofdays($start,$end)
	{
		$range = array();
		if (is_string($start) === true) $start = strtotime($start);
		if (is_string($end) === true ) $end = strtotime($end);
		if ($start > $end) return noofdays($end, $start);
		$i=0;
		while($start <= $end)
		{
			$start = strtotime("+ 1 day", $start);
			$i++;
		}				
		return $i;
	}
				
    if ( $_SESSION['username'])
    {  
		 	$username=$_SESSION['username'];
	  		require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$username'") or die(mysql_error());
			$count=mysql_num_rows($ex0);
			if($count)
				{			    
		echo "<br><center><strong><font color='white' size='3%'><b><u>Welcome ".$_SESSION['username']."</u></b></font><br /><br></center></strong>";
		if(isset($_POST['submit']))
		{
			$username = $_POST["uname"];
			$cindate  = $_POST["cindate"];
			$coutdate = $_POST["coutdate"];
			$nrooms	  = $_POST["nrooms"];
			$ct		  = $_POST["ct"];
			$type	  = $_POST["type"];
			$optn	  = $_POST["optn"];  
			$ndays=noofdays($cindate,$coutdate);
			//********************Checking if room is available*********************//



			if($ct=='Room')
			{	
				$room=mysql_query("SELECT * FROM roomtypes WHERE roomtype='$type' AND ac='$optn' ") or die(mysql_error());
				$cntr=mysql_num_rows($room);
				if($cntr>0)
				{						
					while($rod=mysql_fetch_assoc($room))
					{
						$roomno=$rod['roomno'];
						$roomcheck=mysql_query("SELECT * FROM roombooking WHERE roomno='$roomno' ORDER BY checkoutdate ") or die(mysql_error());
	    		    	$cnt=mysql_num_rows($roomcheck);
						if($cnt==0)
						{
							$room_count++;
							switch($room_count)
							{
								case 1:$room1=$roomno;
										break;
								case 2:$room2=$roomno;
										break;
								case 3:$room3=$roomno;
										break;
								case 4:$room4=$roomno;
										break;
								case 5:$room5=$roomno;
										break;
								default :break;
							}
						}
						else if($cnt>0)
						{
							$roomavail='No';
							while($row=mysql_fetch_assoc($roomcheck))
			          		{	
								$rno=$row['roomno'];
								$cin=$row['checkindate'];
								$cind=strtotime($cin);
							
								$cout=$row['checkoutdate'];
								$coutd=strtotime($cout);
								
								$entered_cin=strtotime($cindate);
								$entered_cout=strtotime($coutdate);
								
								if($coutd<$entered_cin)
									$roomavail='Yes';
								else
									$roomavail='No';
							}
							if($roomavail=='Yes')
							{
								$room_count++;
								switch($room_count)
								{
									case 1:$room1=$roomno;
											break;
									case 2:$room2=$roomno;
											break;
									case 3:$room3=$roomno;
											break;
									case 4:$room4=$roomno;
											break;
									case 5:$room5=$roomno;
											break;
									default :break;
								}
							}
						}
					}							
					/////************End of room checking***************************///
					if($room_count==0)
						die("<b><center><font color='white' size='4%'>Sorry, No rooms are Available.</font></center></b>
							<div class='container'>
							 <br>
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
								
								<a href='#0' class='cd-top'>Top</a>
								<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
							    <script src='js/bootstrap.min.js'></script>
							    <script src='js/main.js'></script>
							    <script>
							        $(document).ready(function () {
							            $('.dropdown-toggle').dropdown();
							        });
							    </script>");
					else
					 {
						if($room_count<$nrooms)
							if($room_count==1)
								echo "<b><center><font color='white' size='4%'>Sorry, Only $room_count $type $optn Room is Available.</font></center></b>";
							else
								echo "<b><center><font color='white' size='4%'>Sorry, Only $room_count $type $optn Rooms are Available.</font></center></b>"; 
						else 
							if($room_count==1)
								echo "<b><center><font color='white' size='4%'>Yes, Room is Available.</font></center></b>";	
							else
								echo "<b><center><font color='white' size='4%'>Yes, Rooms are Available.</font></center></b>";
					 }

					$nrooms=$room_count<$nrooms?$room_count:$nrooms;
					if($room_count>=1)
					{
						if($nrooms==1)
							$rooms_got=$room1;
						else if($nrooms==2)
							$rooms_got=$room1.",".$room2;
						else if($nrooms==3)
							$rooms_got=$room1.",".$room2.",".$room3;
						else if($nrooms==4)
							$rooms_got=$room1.",".$room2.",".$room3.",".$room4;
						else if($nrooms==5)
							$rooms_got=$room1.",".$room2.",".$room3.",".$room4.",".$room5;
					}
					
				
					//Room Tarriffs.
					if($optn=='Ac')
					{
						if($type=='Single')
							{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='2'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
						else if($type=='Deluxe')
							{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='4'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
						else if($type=='Suite')
							{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='6'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
					}
					else if ($optn=='Non Ac')
					{
						if($type=='Single')
						{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='1'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
							else if($type=='Deluxe')
							{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='3'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
						else if($type=='Suite')
							{ $ext=mysql_query("SELECT rate FROM tariff WHERE no='5'");
            				$row = mysql_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
					}
					
				}
			}







			else if($ct=='Hall')
			{
				$ext=mysql_query("SELECT rate FROM tariff WHERE no='7'");
            	$row = mysql_fetch_assoc($ext);
           		$rate = $row['rate'];
				$type='Hall';
				$optn='-';
				$hallcheck=mysql_query("SELECT * FROM hallbooking ORDER BY checkoutdate");
				$hcnt=mysql_num_rows($hallcheck);
				if($hcnt==0)
				{
					$hallavail='Yes';
				}
				else if($hcnt>0)
				{
					$hallavail='No';
					while($hrow=mysql_fetch_assoc($hallcheck))
					{
						$cin=$hrow['checkindate'];
						$cind=strtotime($cin);
							
						$cout=$hrow['checkoutdate'];
						$coutd=strtotime($cout);
														
						$entered_cin=strtotime($cindate);
						
						if($coutd<$entered_cin)
							$hallavail='Yes';
						else
							$hallavail='No';
					}
				}
				if($hallavail=='Yes')
					echo "<b><center><font color='white' size='4%'>Yes, Hall is Available</font></center></b>";
				else
					die("<b><center><font color='white' size='4%'>Sorry, Hall is Not Available.</font></center></b>
							<div class='container'>
							 <br>
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

							<a href='#0' class='cd-top'>Top</a>
							<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
						    <script src='js/bootstrap.min.js'></script>
						    <script src='js/main.js'></script>
						    <script>
						        $(document).ready(function () {
						            $('.dropdown-toggle').dropdown();
						        });
						    </script>");
				$nrooms=1;
				$rooms_got='-';
				$room_count=1;
			}
			
			if($ct=='Hall')
			{
				$noofrooms='-';
				$tot_rate=$rate*$ndays;
			}
			else
			{
				$noofrooms=$room_count<$nrooms?$room_count:$nrooms;
				$tot_rate=$rate*$ndays*$noofrooms;
			}
				echo "<br>";
				echo"<div class='container'>
                        <div class='row'>
                            <div class='col-sm-3'></div>
                            <!-- panel preview -->
                            <div class='col-sm-6'>
                              <form action='resconfirm.php' method='post';>
                                <div class='panel panel-default'>
                                    <div class='panel-body form-horizontal payment-form'>
                                      
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Username:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='username' value='$username' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>No. of Rooms:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='nrooms' value='$noofrooms' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Room No(s):</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='roomno' value='$rooms_got' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Check-in Date:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='cindate' value='$cindate' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Check-out Date:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='coutdate' value='$coutdate' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Room Type:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='type' value='$type' onFocus='this.blur()'/>
                                                <input class='form-control' type='hidden' name='ct' value='$ct'>
												<input class='form-control' type='hidden' name='optn' value='$optn'></td>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Ac/Non-Ac?:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='ac' value='$optn' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>No. of Days:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='ndays' value='$ndays' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Rate per Day:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='rateperroom' value='$rate' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                                            <label class='col-sm-4 control-label'><center><i>Total Rate:</center></label>
                                            <div class='col-sm-8'>
                                                <input class='form-control' type='text' name='rate' value='$tot_rate.00' onFocus='this.blur()'/>
                                            </div></i>
                                        </div>
                                        <div class='form-group'>
                            				<div class='row'>
                                			<div class='col-sm-6 col-sm-offset-3'>
                                    			<input type='submit' name='book' class='form-control btn btn-register' value='Confirm Booking & Pay'>
                                			</div>
                            				</div>
                    					</div>
									</div>
                                </div>
                              </form>
                            </div>
                            <div class='col-sm-3'></div>
                        </div>
                    </div>

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

		die();
	}
	else
		{
?>

<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
        <!-- panel preview -->
        <div class="col-sm-6">
          <form action="" method="post" name="register" onSubmit="return validateRes()">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                  
                    <div class="form-group">
                        <label for="uname" class="col-sm-4 control-label"><center>Username:</center></label>
                        <div class="col-sm-8">
                            <input id="uname" name="uname" class="form-control" type="text" value="<?php echo $_SESSION['username'];?>" onFocus="this.blur()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cindate" class="col-sm-4 control-label"><center>Check-in Date:</center></label>
                        <div class="col-sm-8">
                            <input type="text" class="span2 form-control" id="dpd1" name="cindate" onblur="cincheck()" />
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="coutdate" class="col-sm-4 control-label"><center>Check-out Date:</center></label>
                        <div class="col-sm-8">
                            <input type="text" class="span2 form-control" id="dpd2" name="coutdate" onblur="coutcheck()" />
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="ct" class="col-sm-4 control-label"><center>Room Category:</center></label>
                        <div class="col-sm-8">
                            <select name="ct" id="ct" class="form-control" onChange="showDiv(this.value);" onblur="checkcategory()">
			                  	<option selected="selected" value="default" disabled>Select Room</option>
			                    <option value="Room">Room</option>
			                    <option value="Hall">Hall</option>
			                </select>
			            </div>
			        </div>


			             	<div class="hiddenDiv" id="Room">
			             		<div class="form-group">
			             		<label for="type" class="col-sm-4 control-label"><center>Type:</center></label>
			             		<div class="col-sm-8">
									<select name="type" id="type" class="form-control">
					            		<option selected="selected" value="Single">Single </option>
							            <option value="Deluxe">Deluxe</option>
							            <option value="Suite">Suite</option>
						 	        </select>
			             		</div>
			             		</div>

			             		<div class="form-group">
			             		<label for="optn" class="col-sm-4 control-label"><center>Ac/Non-Ac:</center></label>
			             		<div class="col-sm-8">
									<select name="optn" id="optn" class="form-control">
										<option selected="selected" value="Ac">Ac</option>
					            		<option value="Non Ac">Non Ac</option>
			          				</select>
			          			</div>
			          			</div>

			          			<div class="form-group">
			          			<label for="nrooms" class="col-sm-4 control-label"><center>No. of Rooms:</center></label>
			          			<div class="col-sm-8">
			                  		<select name="nrooms" id="nrooms" class="form-control">
					          			<option selected="selected">1</option>
					            		<option>2</option>
					            		<option>3</option>
					            		<option>4</option>
					            		<option>5</option>
			                  		</select>
			                  	</div>
			                  	</div>

			                </div>
			                     
                    <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="submit" id="submit" class="form-control btn btn-register" value="Check Availability">
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


<?php 
		}}
	 else
    {	
        header("Location:login.php");
    }}
?>





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
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
		if (top.location != location) {
	    top.location.href = document.location.href ;
	  	}
		$(function(){
		window.prettyPrint && prettyPrint();
		$('#dp1').datepicker({
		format: 'yyyy-mm-dd'
			});
		$('#dp2').datepicker();
							
		    // disabling dates
	        var nowTemp = new Date();
	        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	        var checkin = $('#dpd1').datepicker({
	          onRender: function(date) {
	            return date.valueOf() < now.valueOf() ? 'disabled' : '';
	          }
	        }).on('changeDate', function(ev) {
	          if (ev.date.valueOf() > checkout.date.valueOf()) {
	            var newDate = new Date(ev.date)
	            newDate.setDate(newDate.getDate() + 1);
	            checkout.setValue(newDate);
	          }
	          checkin.hide();
	          $('#dpd2')[0].focus();
	        }).data('datepicker');
	        var checkout = $('#dpd2').datepicker({
	          onRender: function(date) {
	            return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
	          }
	        }).on('changeDate', function(ev) {
	          checkout.hide();
	        }).data('datepicker');
			});
	</script>
</body>
</html>