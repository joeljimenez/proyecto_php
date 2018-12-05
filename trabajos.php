<?php session_start(); include 'clases/usuario.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WORK EXPRESS</title>
 
	<link rel="stylesheet" href="assest/css/general.css">
	<link rel="stylesheet" href="assest/css/mantenimiento.css">
	<link rel="stylesheet" href="bulma/css/bulma.css">


</head>
<body>

<nav class="navbar is-black" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item " href="index.php">
      <img src="imagen/logo.png" alt="">&nbsp;
      <span  class="is-hidden-desktop">WORK EXPRESS</span>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
       <i class="fa fa-home"></i>&nbsp;Home
      </a>
       <a class="navbar-item" href="trabajos.php">
        <i class="fas fa-briefcase"></i>&nbsp;Empleos
      </a>       
      <a class="navbar-item" href="">
       <i class="fa fa-address-book"></i>&nbsp;Contactos
      </a>
      <?php 
   if (isset($_SESSION["administrador"])) {
	if ($_SESSION["administrador"] =="1") {
		 ?>
	  <a class="navbar-item" href="mantenimiento.php">
       <i class="fa fa-user-lock"></i>&nbsp;Mantenimiento
      </a>
		 <?php
	  }
  }
       ?>
      
    </div>
<?php 
          if (isset($_SESSION["session"])) {
          	 if ($_SESSION["session"]=="ok") {
          	 	?>
   <div class="navbar-end">
   	<span class="nombre">Bienvenido : &nbsp; <?php echo $_SESSION["nombre"] ?></span>
      <div class="navbar-item">
      	<div class="buttons">
          <a class="button is-danger" href="logout.php">
            <strong>Salir&nbsp;</strong>
          </a>
        </div>
      </div>
    </div>
          	 	<?php 
          	 }
          	}else{
 	             ?>
   <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="login_register.php">
            <strong>Registrar&nbsp;</strong><i class="fa fa-users"></i>
          </a>
          <a class="button is-danger" href="login_register.php">
            Inicio Sessión&nbsp;<i class="fa fa-lock"></i>
          </a>
        </div>
      </div>
    </div>
          	 	<?php 
          	 } 
          
           ?>

   
  </div>
</nav>
 
 
	
	<div class="opciones text">
	<a href="mantenimiento.php">
    <img src="imagen/TRABAJO.png" alt="" width="60%"> 
  </a>
<aside>
	<nav>
    <center>
    <strong>FILTROS</strong>
    </center>
		<ul>
      <strong><label>Area</label></strong><br>
      <?php 
       $trabajo = new Trabajo();
       $obj = new Usuario();
            $respuesta1=$trabajo->Traer_area();
         foreach ($respuesta1 as $key => $value) {
         
       ?>
			<li><a href="mantenimiento.php?id=1" title=""><?php echo $value["nombre"] ?></a></li>
    <?php } ?>
      <strong><label>Empresa</label></strong><br>
      <?php 
          $respuesta2=$trabajo->Traer_Empresa();
         foreach ($respuesta2 as $key => $value) {
       ?>
			<li><a href="mantenimiento.php?id=2" title=""><?php echo $value["nombre"] ?></a></li>
    <?php } ?>
      <strong><label>Provincia</label></strong><br>
      <?php 
        $respuesta3 = $obj->Traer_Provincia();
       
         foreach ($respuesta3 as $key => $value) {
       ?>
			<li><a href="mantenimiento.php?id=3" title=""><?php echo $value["nombre"] ?></a></li>
    <?php } ?>
 
		</ul>
	</nav>
</aside>
	</div>
	<div class="contenido" style="background-color: white;">
	     <span class=" menu-bar menu1">
      <i class="fas fa-th-list"></i>   </span>
      <center><h2 class="texto">LISTA DE EMPLEOS DE WORKEXPRESS</h2></center>
      <br>
         <div class="columns">
           
          <?php 
            
            
            $re = $trabajo->Traer_Trabajo();
            //var_dump($re);
            foreach ($re as $key => $value) {
              ?>
               <div class="column">
           <a href="">
        <div class="card zoon">
            <div class="card-header">

              <div class="card-header-title">
               </div>
            </div>
              <div class="card-content ">
               
              </div>
  
        </div>
             </a>
                 </div>
                 <?php
            }
         ?>
        

              
         </div>
 
  </div>
 </div>

 	<script src="assest/js/jquery.js"></script>
	<script src="assest/js/iconos.js"></script>
	<script src="assest/js/lateral.js"></script>
<script>
	(function() {
		var burger = document.querySelector('.burger');
		var nav = document.querySelector('#'+burger.dataset.target);

		burger.addEventListener('click', function(){
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
		});
	})();
</script>
 
</body>
</html>