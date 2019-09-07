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

$url="http://www.vamosba.com/api/generarJSON.php";
//$json = file_get_contents($url);
//$data = json_decode($json, TRUE);
//echo $data;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.vamosba.com/api/generarJSON.php",
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
//echo "<h3>" . $result[nombre"] . " value(s) found: </h3>";
//echo implode("<br>", $result["id"]);
?>


<html lang="en">
<head>
<title>Vamos Buenos Aires</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Vamos Buenos Aires">
<link rel="shortcut icon" href="../images/favicon.ico">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 
<!-- Reset CSS -->
<link rel="stylesheet" href="css/reset.css">
<!-- Style CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="css/responsive.css">
 <?php include 'include/head.inc';?>
</head>
<body style="background-color:#F2F2F2;">
<div class="container-fluid" style="background-color:#F2F2F2;">
<?php include 'include/membrete_01.inc';?>


<br>
<?php 
$i = 0;
foreach($arr as $articles) {
	
	?>

<?php 
$i = $i+1 ;
if ($i == 1)
{

echo "<div class='row' > <br>";

}
?>
<div class="col-sm-6 col-md-6 col-lg-4" >
		
		<div class="card" style="width: 18rem;" border=2>
			<img class="card-img-top" src="<?php echo $articles['img_evento'];?>" alt="Card image cap" height="220" width="42">
			<div class="card-body">
			<h5 class="card-title"><?php echo $articles['name_evento']. '<br />';?></h5>
			<p class="card-text"> <?php echo  $articles['date_evento'] . '<br />';?></p>
		</div>
		<ul class="list-group list-group-flush">
		<li class="list-group-item"> <?php echo  $articles['dir_evento'] . '<br />';?></li>
		</ul>
		<div class="card-body">
			<a href="<?php echo  $articles['web_evento']?>" class="card-link">Ir a sitio</a>
  		</div>
		</div>
		<br>
	
	<br>
</div>	
<?php 
if ($i == 3)
{

echo "</div>";

$i = 0;
 }
?>
	
<br>
<!--</div>-->



 <?php 
}

?>

</div>
  
<?php 

   
   
  

//echo ($json, ["status"]);
?>
<?php include 'include/footer.inc';?>