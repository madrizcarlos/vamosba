<?php
function printValues($arr) {
    global $count;
    global $values;
    
    // Check input is an array
    if(!is_array($arr)){
        die("ERROR: Input is not an array");
    }
    
    /*
    Loop through array, if value is itself an array recursively call the
    function else add the value found to the output items array,
    and increment counter by 1 for each value found
    */
    foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
    }
    
    // Return total count and values found in array
    return array('total' => $count, 'values' => $values);
}


// Store JSON data in a PHP variable
//$json = '{"Peter":65,"Harry":80,"John":78,"Clark":90}';
 
//var_dump(json_decode($json));

$url="https://newsapi.org/v2/everything?q=bitcoin&from=2019-03-21&sortBy=publishedAt&apiKey=e7b90eeac0cc446fa93ea1bf5ca17d38";
//$json = file_get_contents($url);
//$data = json_decode($json, TRUE);
//echo $data;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://newsapi.org/v2/top-headlines?country=ar&apiKey=e7b90eeac0cc446fa93ea1bf5ca17d38",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$arr = json_decode($response, true); //because of true, it's in an array
//echo 'Online: '. $response['status'];

//$result = printValues($arr);
//echo "<h3>" . $result["total"] . " value(s) found: </h3>";
//echo implode("<br>", $result["values"]);
?>


<html lang="en">
<head>
<?php include 'include/head.inc';?>
<title> Vamos Buenos Aires</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Weather Widget - Responsive Template">
<link rel="shortcut icon" href="images/favicon.ico">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->

<!-- Reset CSS -->
<link rel="stylesheet" href="css/reset.css">
<!-- Style CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
<div class="container" style="background-color:#F2F2F2;">
<?php include 'include/membrete_01.inc';?>


  
  
 
	
<?php 
foreach($arr['articles'] as $articles) {
	?>

	<!--<div class="col-sm-12 col-md-12 col-lg-8" > -->
	 <div class="card">
  <div class="card-body">
  <h6 class="card-title">
	 <?php echo  $articles['title'] . '<br />';?>
	 </h6>
	 <img src="<?php echo $articles['urlToImage'];?>"    class="img-fluid" >
	 <p class="card-text">
	  <?php echo $articles['description']. '<br />';?>
	 </p>
	 <a href="<?php echo $articles['url']?>" class="card-link" style="font-size: 12px">
	<?php echo $articles['url']. '<br />';?>
	</a>
	 </div>
</div>


 <?php 
}
?>


  
<?php 

//echo ($json, ["status"]);
?>
 
<!--pie de pagina-->

<?php include 'include/footer.inc';?>
</div>
</body>
</html>