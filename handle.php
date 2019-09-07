<?php
$pagina= $_GET['pagina'];
$categoria= $_GET['categoria'];

$str_url = "Location:" . $pagina . "?categoria=" . $categoria ;
session_start();
$_SESSION["lat"]=$_GET['lat'];
$_SESSION["lon"]=$_GET['lon'];
header($str_url);

?>