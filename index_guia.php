<!DOCTYPE html>
<html lang="en">
<script>
function localizar() {


  if (navigator.geolocation) {
	  alert("xxx22");
	   if (navigator.geolocation) {
		   alert("Geolocation is YES supported by this browser.");
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
	
	   document.getElementById('xlat').value = "My Text Input";
	   document.getElementById('xlon').value = position.coords.latitude;
	  
	
	
	 
} else { 
 alert("9999");
    xlat.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition2(position) {
       alert(position.coords.latitude);
}
</script>
<head>
 <?php include 'include2/head.inc';?>
  
  

</head>


<body>

<script>

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
		
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }


function abrirpagina(pagina,categoria) {
  
	//alert(pagina);
	document.getElementById('categoria').value = categoria;
	document.getElementById('pagina').value = pagina;
	
	//alert(categoria);
	document.form1.submit();
	
  
}

function showPosition(position) {
 
document.getElementById('xlat').value = position.coords.latitude;
//alert(position.coords.latitude);
document.getElementById('xlon').value = position.coords.longitude;
	
}
</script>


<form id="form1" name="form1" action="handle.php">

<input id="xlat" type="hidden" name="lat"/>
<input id="xlon" type="hidden" name="lon"/>
<input id="categoria" type="hidden" name="categoria"/>
<input id="pagina" type="hidden" name="pagina"/>
</form>
<div class="container" >

<!--membrete general-->
<?php include 'include/membrete_01.inc';?>

</br></br>

<!--opciones de menu-->	

  

 

<div class="container-fluid"  >
    <div class="row">
		
		<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="#" target="_self" onclick="abrirpagina('menu_comidas.php','vacio');"><h4><font color="#086A87">1. Restaurantes</h4></font></a>
			<a href="#" target="_self" onclick="abrirpagina('menu_comidas.php','vacio');"><img src="imagenes/apps/cubiertos.jpeg" width="120" height="75" alt="Hospedaje" longdesc="Hospedaje" id="img_hosp" /></a>
		    <p><font color="black">Mejores asados de la ciudad y comida diversa.</p></font>
           <div id="ocu_menor_igual_800"> <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('menu_comidas.php','vacio');">Ir</a></p></div>
			<hr>
        </div>
		
		 <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','R000');"><h4><font color="#086A87">2. Diversion</h4></font></a>
			<a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','R000');"><img src="imagenes/apps/diversion.jpg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>
            <p>Parques, cines, paseos en lanchas, canchas deportivas...</p>
           <div id="ocu_menor_igual_800"> <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','R000');">Ir</a></p></div>
			<hr>
     </div>				
		
	  </div> <!--div row-->
</div>

<div class="container-fluid" >
    <div class="row">		 <div class="col-sm-6 col-md-4 col-lg-4">            <a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','T000');"><h4><font color="#086A87">3. Sitios Turísticos</h4></font></a>			<a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','T000');"><img src="imagenes/apps/siteturismo.jpg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>            <p>Barrios típicos, monumentos, lugares de interés...</p>           <div id="ocu_menor_igual_800"> <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','T000');">Ir</a></p></div>			<hr>     </div>
		
		<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','H000');"><h4><font color="#086A87">4. Compras varias</h4></font></a>
			<a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','H000');"><img src="imagenes/apps/hoteles.jpeg" width="120" height="75" alt="Hospedaje" longdesc="Hospedaje" id="img_hosp" /></a>
            <p>Ropa, equipaje, artículos deportivos...</p>
           <div id="ocu_menor_igual_800"> <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','H000');">Ir</a></p></div>
			<hr>
        </div>				
    </div> <!--div row-->
 </div>

<div class="container-fluid" >
    <div class="row">
	
	<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','N000');"><h4><font color="#086A87">5. Donde comprar productos Venezolanos</h4></font></a>
			<a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','N000');"><img src="imagenes/apps/producto_vzla.jpg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>
            <p>Repuestos, equipos, viveros, farmacias, ropa y todo tipo de tiendas.</p>
          <div id="ocu_menor_igual_800">  <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','N000');">Ir</a></p></div>
			<hr>
	</div>
		
	<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','S000');"><h4><font color="#086A87">6. Servicios</h4></font></a>
			<a href="#" target="_self" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','S000');"><img src="imagenes/apps/servprof.jpeg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>
            <p>Mecánicos, plomeros, soldadores, albañiles, médicos, abogados...</p>
           <div id="ocu_menor_igual_800"> <p><a href="#" target="_self" class="btn btn-success" onclick="abrirpagina('https://vamosba.com/guia/listado23.php','S000');">Ir</a></p></div>
			<hr>
     </div>
       
    </div> <!--div row-->
 </div>

 
<!--pie de pagina-->
<?php include 'include/footer.inc';?>


</div>



</body>
</html>