<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Hack the Election</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">    

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="jquery-1.11.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script>
	$(function() {
  	$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
	</script>

</head>

<body>
	<?php
	   				include_once 'class.sunlightlabs.php';

					//$ip = $HTTP_SERVER_VARS['HTTP_X_CLUSTER_CLIENT_IP'];
					$ip = $_SERVER['REMOTE_ADDR'];


					$details = ip_details($ip);

					$location = explode(',', $details->loc);
					$lat = floatval($location[0]);
					$lng = floatval($location[1]);

					$zip = intval($details->postal);

					$sunlight = new SunlightDistrict();

					$districtData = $sunlight->districtsGeoloc($lat, $lng);
					$districtNumber = $districtData->number;
					$state = $districtData->state;
					$data = "candidates.csv";
	   				$house_candidates = initializeData($data, "H", $state);
	   				$senate_candidates = initializeData($data, "S", $state);
					$hCandidate = $house_candidates[$districtNumber];
					$hc = explode(',', $hCandidate);
					$hCandidate = $hc[1] . " " . $hc[0];
					$sCandidate = $senate_candidates[$districtNumber];
					$sc = explode(',', $sCandidate);
					$sCandidate = $sc[1] . " " . $sc[0];

					function ip_details($ip) {
   					$json = file_get_contents("http://ipinfo.io/{$ip}");
    				$details = json_decode($json);
    				return $details;
					}

					function initializeData($data, $type, $state) {
						$file_handle = fopen($data, "r");
						$array = array();
						while (!feof($file_handle)){
							$line = fgetcsv($file_handle, 1024);
							if($line[1] == $type && $line[2] == $state){
								$district = $line[3];
								$person = $line[0];
								$array[$district] = $person;
							}
						}
						fclose($file_handle);
						return $array;
					}
					?>


   <!-- Intro Section
   ================================================== -->
   <section id="intro">

   	<div class="row">

	   	<div class="twelve columns">
	   			

	   		<h1> ON NOV. 4TH <br>
	   		 THE FUTURE OF OUR PLANET WILL RELY ON YOUR VOTE.
	   		 WE'VE DONE YOUR HOMEWORK FOR YOU AND HAVE FOUND THE CANDIDATES
	   		 IN YOUR AREA WHO SUPPORT CLEAN POWER.
	   			</h1>
	   			
	   		<br>

	   		<div class="firstscrollbutton" >
	   		<a href= "#1">
	   			<img src="images/Black Arrow.png">
	   		</a> <br />
	   	</div>

      </div> <!-- main end -->    	

   </section> <!-- end intro section -->
 
   <section id="1">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>THEY ARE:<br><h1>
	   		<span style="color: #99BBFE">	
	   		 <?php 
	   		 	if(strlen($hCandidate) > 1){
	   		 		echo $hCandidate;
	   		 	}
	   		 	?>
	   		 <span style="color: #BA4848">
	   		 <?php
	   		 	if(strlen($hCandidate) > 1){
	   		 		echo "FOR THE HOUSE<br>";
	   		 	}else{
	   		 		echo "<br>";
	   		 	}
	   		 	?>

	   		 	<span style="color: #99BBFE">	
	   		 <?php 
	   		 	if(strlen($sCandidate) > 1){
	   		 		echo $sCandidate;
	   		 	}
	   		 	?>
	   		 <span style="color: #BA4848">
	   		 <?php
	   		 	if(strlen($sCandidate) > 1){
	   		 		echo "FOR THE SENATE<br>";
	   		 	}else{
	   		 		echo "<br>";
	   		 	}

	   		  ?>
	   		 <br>
	   		 <br>
	   		 NEED MORE INFO? THAT'S AWESOME. READ ON TO FIND OUT WHY YOU NEED TO VOTE FOR THEM.
	   		</h1>


	   		<a href="#2" >
                 <img src="images/Red Arrow.png">                  
              </a>
             <br>

      </div> <!-- main end -->    	

   </section>

    <section id="2">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			RIGHT NOW, COAL FIRED POWER PLANTS RELEASE UNLIMITED AMOUNTS OF CO2 INTO THE AIR. NO JOKE.
	   			THEY PRODUCE AS MUCH AS THEY WANT.
	   		</h1>

	   		<br><br><br><br><br>

	   		<a href="#3" >
                 <img src="images/Red Arrow.png">                  
              </a>

	   		<br><br><br><br><br><br>

      </div> <!-- main end -->    	

   </section>

   <section id="3">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			THESE POWER PLANTS ACCOUNT FOR 1/3 OF THE CO2 PRODUCED IN AMERICA. THATS EQUIVALENT TO 450 MILLION CARS.
	   		</h1>

	   		<br><br><br><br><br><br><br>

	   		<a href="#4" >
                 <img src="images/Red Arrow.png">                  
              </a>

	   		<br><br><br><br><br><br>

      </div> <!-- main end -->    	

   </section>

   <section id="4">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			THIS SUMMER THE EPA ANNOUNCED A PLAN TO FINALLY BEGIN REGULATING THEM AND SECURING OUR FUTURE.
	   			IT'S CALLED THE CLEAN POWER PLAN.
	   		</h1>

	   		<br><br><br><br><br>

	   		<a href="#5" >
                 <img src="images/Red Arrow.png">                  
              </a>

	   		<br><br><br><br><br><br>

      </div> <!-- main end -->    	

   </section>

   <section id="5">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			SOME MEMBERS OF CONGRESS ARE ALREADY TRYING TO KILL THE PLAN.
	   		</h1>

	   		<br><br><br><br><br><br><br><br><br><br>

	   		<a href="#6" >
                 <img src="images/Red Arrow.png">                  
              </a>

	   		<br><br><br><br><br><br><br><br><br><br>

      </div> <!-- main end -->    	

   </section>

   <section id="6">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			BUT THEY CAN'T IF THEY AREN'T IN OFFICE.
	   		</h1>

	   		<br><br><br><br><br><br><br><br><br><br>

	   		<a href="#7" >
                 <img src="images/Red Arrow.png">                  
              </a>

	   		<br><br><br><br><br><br><br><br><br><br>

      </div> <!-- main end -->    	

   </section>

   <section id="7">

   	<div  id="main" class="row">

	   	<div class="twelve columns">
	   		<br><br><br>

	   		<h1>
	   			ON NOV. 4TH, VOTE FOR CLEAN POWER.<br>

	   			<span style="color: #99BBFE">	
	   		 <?php 
	   		 	if(strlen($hCandidate) > 1){
	   		 		echo $hCandidate;
	   		 	}
	   		 	?>
	   		 <span style="color: #BA4848">
	   		 <?php
	   		 	if(strlen($hCandidate) > 1){
	   		 		echo "FOR THE HOUSE<br>";
	   		 	}
	   		 	?>

	   		 	<span style="color: #99BBFE">	
	   		 <?php 
	   		 	if(strlen($sCandidate) > 1){
	   		 		echo $sCandidate;
	   		 	}
	   		 	?>
	   		 <span style="color: #BA4848">
	   		 <?php
	   		 	if(strlen($sCandidate) > 1){
	   		 		echo "FOR THE SENATE<br>";
	   		 	}

	   		  ?>
	   		</h1>

	   		<br><br><br><br><br><br><br><br>
	   		<a href="#"><img src="images/Find My Polling Place Red.png" 
			onmouseover="this.src='images/Find My Polling Place Grey.png'"
			onmouseout="this.src='images/Find My Polling Place Red.png'" /></A>

      </div> <!-- main end -->    	

   </section>


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

</body>

</html>