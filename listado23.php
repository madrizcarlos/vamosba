

<?php 

$lat  = $_SESSION["lat"];
$lon  = $_SESSION["lon"];
$categoria = $_GET['categoria'];
//$str_sql="SELECT N.nomb_negocio,N.codi_negocio , N.desc_negocio ,N.valoracion ,N.telef_negocio ,N.imagen_negocio ,N.direccion_negocio,N.coord_negocio, N.coord2, N.webpage FROM t_negocios N JOIN tr_negocios_categorias R ON N.codi_negocio = R.codi_negocio WHERE R.id_categoria ='" .$categoria. "' AND Activo=1;";

$str_sql="SELECT N.* FROM t_negocios N JOIN tr_negocios_categorias R ON N.codi_negocio = R.codi_negocio WHERE R.id_categoria ='" .$categoria. "' AND Activo=1;";
$str_sql2 = urlencode($str_sql);
$str_sql3 = urldecode($str_sql2);

$lat = -34.5737177;
$lon = -58.4354472;
$str_sql4="SELECT N.*, Round((( 3959 * acos( cos( radians('$lat') ) * cos( radians( N.lat ) ) * cos( radians( N.lon ) - radians('$lon') ) + sin( radians('$lat') ) * sin( radians( N.lat ) ) ) )*1.60934),1)  AS distance FROM t_negocios N JOIN tr_negocios_categorias R ON N.codi_negocio = R.codi_negocio WHERE R.id_categoria ='" .$categoria. "' AND Activo=1 Order By Distance ASC;";


?>

<?php include 'include/db_conect.inc';?>


<?php
$result = $conn->query($str_sql4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'include/head.inc';?>
   <link rel="stylesheet" href="../css/mis_estilos.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
   
   
   
   
</head>

<body>

<?php// print $str_sql2; ?>

<?php //print $str_sql3; ?>

<div class="container-fluid" >

<!--membrete general-->
<div class="container-fluid" style="background-color:#FBFCFC;" >
	<div class="row">
		<div class="col-sm-6 col-md-8 col-lg-8"> 
		  	<img src="../imagenes/apps/logo01.png"  alt="" longdesc="" id="img_logo" height="42" width="82">
			
		</div>
		<div class="col-sm-6 col-md-4 col-lg-4" align="right">
			
			<font size="1" face="arial" color=white><b>email:</b>buai@gmail.com</font>
			</div>
	</div>
</div>
<?php include '../include/membrete_01.inc';?>

	<div class="container-fluid" style="background-color:#fafafa;">
		<br><br>
		<div class="row gutter-10" >
			
				<div class="container-fluid" border=1 >
				
				<form target="POPUPW" action="https://vamosba.com/maps/map2a.php" method="post" 
				onsubmit="POPUPW = window.open('about:blank','POPUPW',
   'width=600,height=400');">
					<input type="hidden" name="var_sql" value="<?php print($str_sql); ?>" />
					<input id="xlat" type="input" name="lat"/>
					<input id="xlon" type="input" name="lon"/>
					<input type="submit" value="Ver mapa" />
				</form>
				
				
				<script>
var xlat = document.getElementById("xlat");


  if (navigator.geolocation) {
	  alert("xxx22");
	   alert("bbb999");
    navigator.geolocation.getCurrentPosition(showPosition);
	 alert("xxx999");
} else { 
 alert("xxx3334");
    xlat.innerHTML = "Geolocation is not supported by this browser.";
  }


function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude; 
  document.getElementById('xlat').value = position.coords.latitude;
}
</script>
					<div class="panel-group"   >
						<?php
    					while($row = $result->fetch_assoc()) {
							
									$max = "5"; // Numero total de imagenes
$extension2 = ".png";// Definimos la extension, puede ser .jpg, gif, bmp, etc.
$carpeta2 = "../imagenes/apps/estrellas";//Carpeta con las imagenes
$start = "2";
$random = mt_rand($start, $max);
$image_name2 = $carpeta2  . $random . $extension2;
$image_name2= "img src='" . $image_name2 . "'  width=52,height=28 id='imagen' class='imagen'/> ";
$image_name3= "img src='" . $image_name2 . "'  width=25,height=25 id='imagen' class='imagen'/> ";



						?>
						
						
							<!--<div class="shadow p-3 mb-5 bg-white rounded">-->
						<div class="panel panel-default"  >
							<div class="panel-body ">
							
								<table border=0 width="100%">
									<tr>
									<td  valign="top" width="40" align="center">
								
									<?php
									$foto = "img src='../imagenes/negocios/" . $row['imagen_negocio'] . "' width='60' height='60' class='img-rounded' onclick='javascript:alert(" . $row['codi_negocio'] . ");'  class='img-responsive'/> ";
									print "<" . $foto;
									?>
									</p>
									<?php
									
print "<" . $image_name2;
?> 

									<font face="helvetica"><small><?php print $row['distance']; ?>&nbsp;KM		</font>							
									</td>
									<td rowspan=2 width=10>&nbsp;&nbsp;&nbsp;</td>
									<td class="align-top" >
									<h5><font color="#086A87"><span id="titulo"> <?php print $row['nomb_negocio']; ?></span></h5></font>
									<font face="helvetica" color="black">
									<?php $rank = $row['valoracion']; ?>									
									<div id="ocu_mayor_igual_800">
										<?php print Substr($row['desc_negocio'], 0,50) . "..."; ?>
									</div>
									<!-- <div id="ocu_menor_igual_800"> -->
										<?php print $row['desc_negocio']; ?>
									<!--</div>-->
									</font><p><a href="<?php print $row['webpage']; ?>" target="blank" >
			<?php print $row['webpage']; ?></a><p>
									
									<span class="glyphicon">&#xe182;</span>
									<?php print $row['telef_negocio']; ?>
									<br>
									</font>
									<div>
										<font face="helvetica"><small><b>Dir:&nbsp;</u></b>	<?php print $row['direccion_negocio']; ?></font></small>
																				
									</div>
									<div id="ocu_mayor_igual_800">
										<?php print Substr($row['direccion_negocio'], 0,50) . "..."; ?>
										
									</div>
									
									
	<font face="helvetica"><small>
									<?php
									//$coord = $row['coord_negocio'];
									//$tira= "<a href=https://maps.google.co.ve/maps?q=" .$coord . " onclick=" . "\"window.open(this.href, 'mywin', 'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;" . "\" >Ver mapa</a>";
									$coord = $row['coord2'];
									$tira= "<a href=https://www.google.co.ve/maps/place/" .$coord . " onclick=" . "\"window.open(this.href, 'mywin', 'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;" . "\" >Ver mapa</a>";
									echo $tira;
									?>
									</small></font>
									
									
									</td>
									
									</tr>
									
								</table>
								
									
									
							</div>
						<!--</div>-->
						
						</div>
							<?php
							}
							$conn->close();
							?>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--pie de pagina-->
<?php include 'include/footer.inc';?> 

</div>
</body>
</html>
