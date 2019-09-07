<?php
$idp = $_GET['idp'];
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
$urlx= "https://maps.googleapis.com/maps/api/place/details/json?placeid=".$idp."&fields=name,rating,formatted_phone_number,reviews&key=AIzaSyBVOLc37522Ao4pUJWcj2tX7cHb5OmvK5o"  ;
curl_setopt_array($curl, array(
  CURLOPT_URL => $urlx,
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
$arr2 = json_decode($response, true); //because of true, it's in an array
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
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#F2F2F2;">
<div class="container-fluid" style="background-color:#F2F2F2;">

<br>
<?php 
foreach($arr2['result']['reviews'] as $articles) {
 
//foreach($arr as $articles) {
	
	?>

<div class='row' >
<br>

<div class="container-fluid" border=1 >
<div class="card"  border=2>

<table cellpadding="10">
<tr>
<th width="100">
<img src="<?php echo $articles['profile_photo_url'];?>" alt="Card image cap" width="80">
</th>
<th>
<b>
<?php echo $articles['author_name'];?></b><br>

<?php
$star = $articles['rating'];
$image_name2 = "/imagenes/apps/estrellas".$star . ".png";
?>
<img src="<?php echo $image_name2;?>" alt="Card image cap" width='50' height='15'>
&nbsp;&nbsp;<?php echo $articles['relative_time_description'];?>
</th>
</tr>
<tr>

<th colspan=2>
<hr>
<?php echo $articles['text'];?>
</p>

</th>
</tr>
</table>

	
</div></div>	
<br>
</div>
<br>

 <?php 
}

?>

</div>