<?php
$data_in = "http://ws.geeklab.com.ar/dolar/get-dolar-json.php";
$data_json = @file_get_contents($data_in);
if(strlen($data_json)>0)
{
  $data_out = json_decode($data_json,true);
 
  if(is_array($data_out))
  {
   // if(isset($data_out['libre'])) print "Libre: ".$data_out['libre']."<br>\n";
   //if(isset($data_out['blue'])) print "Blue: ".$data_out['blue']."<br>\n";
  }
}
?>

<!DOCTYPE html>


 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>



    <script type="text/javascript">
	
		//alert("Se ha lanzado la cuarta función");
        // Configure our weather widget during jQuery.OnReady
	//	 var awxGetValores = function () {
	//		 (function(){
	//		 alert("dad2");
   
    </script>
	<script>
(function(){
			//var text = $("#awxSearchTextBox").val();
			//alert("dad1");
			var isMetric = false;
            var locationUrl = "";
			var details = true;
			language:"es-es";
            var currentConditionsUrl = "";
            // Visit http://apidev.accuweather.com/developers/languages for a list of supported languages
            var language = "es";
            // Contact AccuWeather to get an official key. They key in this
            // example is temporary and should NOT be used it in production.
            var apiKey = "hoArfRosT1215";   
            var awxClearMessages = function() {
                $("#awxLocationInfo").html("...");
                $("#awxLocationUrl").html("...");
                $("#awxWeatherInfo").html("...");
                $("#awxWeatherUrl").html("...");
            }
           // alert("xxx2 Se ha lanzado la cuarta función");
			
			
            var awxCityLookUp = function (freeText) {
			//	 alert("xxx3 Se ha lanzado la cuarta función");
                awxClearMessages();
                locationUrl = "http://apidev.accuweather.com/locations/v1/search?q=" + freeText + "&apikey=" + apiKey;
                $.ajax({
                    type: "GET",
                    url: locationUrl,
                    dataType: "jsonp",
					language:"es-es",
                    cache: true,                    // Use cache for better reponse times
                    jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
                    success: function (data) { awxCityLookUpFound(data); }
                });
            };
			
			//alert("dad2");
			//var awxCityLookUpFound = function (data) {
				
			
			// var awxGetCurrentConditions = function (locationKey) {
				locationKey = "7894";
                currentConditionsUrl = "http://apidev.accuweather.com/currentconditions/v1/" + 
                    locationKey + ".json?language=" + language + "&apikey=" + apiKey +"&details=True";
				//	$("#headline").html(currentConditionsUrl);	
				//alert("xxx5 Se ha lanzado la cuarta función");
				//alert("dad3a1");
				//alert(currentConditionsUrl);
                $.ajax({
                    type: "GET",
                    url: currentConditionsUrl,
                    dataType: "jsonp",
                    cache: true,                    // Use cache for better reponse times
                    jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
					success: function (data) {
                            var html;
                            if(data && data.length > 0) {
                                var conditions = data[0];
                                var temp = isMetric ? conditions.Temperature.Metric : conditions.Temperature.Metric;
								var realfeeltemp = isMetric ? conditions.RealFeelTemperature.Metric : conditions.RealFeelTemperature.Metric;
								var vientospeed = isMetric ? conditions.Wind.Speed.Metric : conditions.Wind.Speed.Metric;
								//var lloviendo = conditions.HasPrecipitation : conditions.HasPrecipitation;
								
                                html =  temp.Value + " °" + temp.Unit;
								//html = temp.Value + " " + temp.Unit;
								htmlcielo=conditions.WeatherText;
								htmlrealfeeltemp = realfeeltemp.Value + " °" + realfeeltemp.Unit;
								htmlwindspeed = vientospeed.Value + " " + vientospeed.Unit;
								html_lluvia = "'" + conditions.HasPrecipitation + "'";
								//html_mobilelink=conditions.MobileLink;
								
								                            }
                            else {
                                html = "N/A";
                            }
							//alert("dad3a");
							//alert(html);
                        $("#awxTemp").html(html);
						$("#awxCielo").html(htmlcielo);
                        $("#awxWeatherUrl").html("<a href=" + currentConditionsUrl + ">" + currentConditionsUrl + "</a>");
						$("#realfeeltemp").html(htmlrealfeeltemp);
						$("#vientospeed").html(htmlwindspeed);
						$("#lloviendo").html(html_lluvia);
						//$("#mobilelink").html("<a href=" + html_mobilelink + ">" + "more info</a>");
                    }
                });
            //};
			//alert("dad4");
			
			
			//alert("xxx3a Se ha lanzado la cuarta función");
                var msg, locationKey = null;
                $("#awxLocationUrl").html("<a href=" + encodeURI(locationUrl) + ">" + locationUrl + "</a>");
				//alert("xxx3f Se ha lanzado la 3f función");
                if (data.length == 1) {
						//alert("11");
                    locationKey = data[0].Key;
                    msg = "One location found: <b>" + data[0].LocalizedName + "</b>. Key: " + locationKey;
					//alert(msg);
                }
                else if(data.length == 0) {
						//alert("12");
                    msg = "No locations found."
						//alert(msg);
                }
                else {
						//alert("13");
                    locationKey = data[0].Key;
					locationKey ="7894";
                    msg = "Multiple locations found (" + data.length + "). Selecting the first one: " + 
                        "<b>" + data[0].LocalizedName + ", " + data[0].Country.ID + "</b>. Key: " + locationKey;
							//alert(msg);
                }
					//alert("xxx3b Se ha lanzado la sexta función");
                $("#awxLocationInfo").html(msg);
                locationKey = "7894";
			
				if(locationKey != null) {
					//alert("dad99a");
                  //  awxGetCurrentConditions(locationKey);
					//awxGetProxConditions(locationKey);
                }
                    
       
			//alert("dad3");
			
	})();
</script>
<html lang="en">
<head>
<?php include 'include/head.inc';?>

<title>Clima</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- description -->
<meta name="description" content="Weather">


<link rel="shortcut icon" href="images/favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Fontawesome CSS -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 


<!-- Reset CSS -->
<link rel="stylesheet" href="css/reset.css">
<!-- Style CSS -->

<!-- Responsive  CSS -->
<link rel="stylesheet" href="css/responsive.css">


</head>
<body >
<div class="container" >

<div class="container-fluid">
<?php include 'include/membrete_01.inc';?>
<br>
<div id="cont_cdb7a0a7d9f96495ad4856af58eafc7f"><script type="text/javascript" async src="https://www.meteored.com.ar/wid_loader/cdb7a0a7d9f96495ad4856af58eafc7f"></script>
</div>

<div class="container" >

<div class="container-fluid" align="center">

<!--<div class="weathar-box" align="center">-->

	

<br><br>
<div class="weathar-box">
	<div class="container">
		
		<!--<div class="row"> -->
				   <!--<div class="col-lg-3 col-md-6 col-sm-6 col-12">-->
			<div class="col-sm-6 col-md-4 col-lg-4">
				
					
						
						<ul>
							<li>
								
									<span>Dolar: &nbsp;</span>
								
								
								
									<?php
									 print $data_out['libre']	?>&nbsp ARS
								
							</li>
												
							
								
						</ul>
						
					
					
				
			</div>

		<!--</div> -->
	</div>
</div>
</div></div>

<!-- jquery latest version -->
<script src="js/jquery.min.js"></script>
<!-- popper.min.js -->
<script src="js/popper.min.js"></script>    
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<br><br>
<?php include 'include/footer.inc';?>

</div>
</body>
</html>