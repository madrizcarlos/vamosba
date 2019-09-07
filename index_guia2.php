<!DOCTYPE html>
<html lang="en">

<head>
 <?php include 'include2/head.inc';?>
  
  

</head>


<body>

<div class="container" >

<!--membrete general-->
<?php include 'include2/membrete.inc';?>

</br></br>

<!--opciones de menu-->	

  

 

<div class="container-fluid"  >
    <div class="row">
		
		<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="menu_comidas.php" target="_self"><h4><font color="#086A87">1. Restaurantes</h4></font></a>
			<a href="menu_comidas.php" target="_self"><img src="imagenes/apps/cubiertos.jpeg" width="120" height="75" alt="Hospedaje" longdesc="Hospedaje" id="img_hosp" /></a>
		    <p><font color="black">Conoce los mejores sitios para comer, desayunos, carnes, comida rápida.</p></font>
           <div id="ocu_menor_igual_800"> <p><a href="menu_comidas.php" target="_self" class="btn btn-success">Ir</a></p></div>
			<hr>
        </div>				<div class="col-sm-6 col-md-4 col-lg-4">            <a href="listado23.php?categoria=N000" target="_self"><h4><font color="#086A87">2. Donde comprar productos Venezolanos</h4></font></a>			<a href="listado23.php?categoria=N000" target="_self"><img src="imagenes/apps/producto_vzla.jpg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>            <p>Repuestos, equipos, viveros, farmacias, ropa y todo tipo de tiendas.</p>          <div id="ocu_menor_igual_800">  <p><a href="listado23.php?categoria=N000" target="_self" class="btn btn-success">Ir</a></p></div>			<hr>        </div>
		
	  </div> <!--div row-->
</div>

<div class="container-fluid" >
    <div class="row">		 <div class="col-sm-6 col-md-4 col-lg-4">            <a href="listado23.php?categoria=R000" target="_self"><h4><font color="#086A87">3. Diversion</h4></font></a>			<a href="listado23.php?categoria=R000" target="_self"><img src="imagenes/apps/diversion.jpg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>            <p>Parques, cines, paseos en lanchas, canchas deportivas...</p>           <div id="ocu_menor_igual_800"> <p><a href="listado23.php?categoria=R000" target="_self" class="btn btn-success">Ir</a></p></div>			<hr>        </div>
		<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="listado23.php?categoria=H000" target="_self"><h4><font color="#086A87">4. Hoteles</h4></font></a>
			<a href="listado23.php?categoria=H000" target="_self"><img src="imagenes/apps/hoteles.jpeg" width="120" height="75" alt="Hospedaje" longdesc="Hospedaje" id="img_hosp" /></a>
            <p>Hoteles y posadas en la ciudad, pueblos y a orilla de playa.</p>
           <div id="ocu_menor_igual_800"> <p><a href="listado23.php?categoria=H000" target="_self" class="btn btn-success">Ir</a></p></div>
			<hr>
        </div>				
		
		
    </div> <!--div row-->
 </div>

<div class="container-fluid" >
    <div class="row">
		<div class="col-sm-6 col-md-4 col-lg-4">
            <a href="listado23.php?categoria=S000" target="_self"><h4><font color="#086A87">5. Servicios</h4></font></a>
			<a href="listado23.php?categoria=S000" target="_self"><img src="imagenes/apps/servprof.jpeg" width="120" height="75" alt="Comida" longdesc="Restaurantes" id="img_rest" /></a>
            <p>Mecánicos, plomeros, soldadores, albañiles, médicos, abogados...</p>
           <div id="ocu_menor_igual_800"> <p><a href="listado23.php?categoria=S000" target="_self" class="btn btn-success">Ir</a></p></div>
			<hr>
        </div>
       
    </div> <!--div row-->
 </div>

 
<!--pie de pagina-->
<?php include 'include/footer.inc';?>


</div>



</body>
</html>