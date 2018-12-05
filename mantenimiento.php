<?php
 session_start();

?>
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
<?php 
   if (isset($_SESSION["session"]) && isset($_SESSION["administrador"])) {
      if ($_SESSION["session"]=="ok" && $_SESSION["administrador"] =="1") {
          	 	
 ?>
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
          
           ?>

   
  </div>
</nav>
 
 
	
	<div class="opciones">
	<a href="mantenimiento.php">
    <img src="imagen/MANTE.png" alt="" width="60%"> 
  </a>
<aside>
	<nav>
		<ul>
			<li><a href="mantenimiento.php?id=1" title="">Mantenimiento de Usuarios</a></li>
			<li><a href="mantenimiento.php?id=2" title="">Mantenimiento de Trabajos</a></li>
			<li><a href="mantenimiento.php?id=3" title="">Mantenimiento de Areas</a></li>
			<li><a href="mantenimiento.php?id=4" title="">Solicitud de Información</a></li>
			<li><a href="mantenimiento.php?id=5" title="">Ver Postulaciones</a></li>
		</ul>
	</nav>
</aside>
	</div>
	<div class="contenido">
		<span class=" menu-bar menu1">
			<i class="fas fa-th-list"></i>
		</span>
    <?php 
     include 'clases/usuario.php';
     $obj = new Usuario();
     $trabajo = new Trabajo();
        if (isset($_GET["id"])) {
          # code...
        
        $id = $_GET["id"];
        if ($id =="1") {
              include 'mantenimiento/Tabla-Usuario.php'; 
              
              unset($_SESSION["error_usuario1"]);
              unset($_SESSION["error_usuario3"]);

         }elseif ($id =="2") {
              include 'mantenimiento/Tabla-Trabajo.php';  
              
                    unset($_SESSION["error_usuario"]);
                    unset($_SESSION["error_usuario1"]);
                    unset($_SESSION["error_usuario3"]);

           
         }elseif ($id =="3") {
              include 'mantenimiento/tabla_area.php';      
              
                    unset($_SESSION["error_usuario"]);

         }elseif ($id =="4") {
              include 'mantenimiento/tabla-solicitud.php'; 
              
                    unset($_SESSION["error_usuario"]);
                    unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="5") {
         include 'mantenimiento/tabla-postulaciones.php';  
              
               unset($_SESSION["error_usuario"]);
               unset($_SESSION["error_usuario1"]);
               unset($_SESSION["error_usuario3"]);

         }elseif ($id =="6" || $id =="7"|| $id =="9") {
            include 'area-agregar.php';
               unset($_SESSION["error_usuario"]);
               unset($_SESSION["error_usuario1"]);
               unset($_SESSION["error_usuario3"]);
         }elseif ($id =="8") {
           include 'agregar-trabajo.php';
                          unset($_SESSION["error_usuario"]);
               unset($_SESSION["error_usuario1"]);
               unset($_SESSION["error_usuario3"]);
         }elseif ($id =="10") {
           include 'mantenimiento/Editar/editar-usuarios.php';
              
                 unset($_SESSION["error_usuario"]);
                 unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="11") {
           include 'mantenimiento/Editar/editar-area.php';
              
                 unset($_SESSION["error_usuario"]);        
                 unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="12") {
           include 'mantenimiento/Editar/editar-trabajo.php'; 
              
                 unset($_SESSION["error_usuario"]);
                 unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="13") {
           include 'mantenimiento/Editar/editar-solicitud.php'; 
              
                 unset($_SESSION["error_usuario"]);
                 unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="14") {
           include 'mantenimiento/Editar/editar-postulaciones.php'; 
              
                 unset($_SESSION["error_usuario"]);
                 unset($_SESSION["error_usuario1"]);
                 unset($_SESSION["error_usuario3"]);

         }elseif ($id =="15") {
           include 'mantenimiento/Eliminar/Eliminacion.php';
         }
       }else{
          ?>
          <center>
         <h1 class="texto">PANEL DE CONTROL</h1>
            
          </center>
<br>
        <div class="columns">
          
      <div class="column">
             
          <div class="card hover">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Cantidad de Usuario</strong> </h2>
               </div>
            </div>
          <div class="card-content ">

               <center>
                <?php 
                  $res = $obj->Traer_Usuarios();
                 ?>
               <h3><?php  echo count($res); ?> Usuarios Registrados</h3>
               </center>
          </div>
            <a href="mantenimiento.php?id=1">
              <footer class="card-footer notification is-info">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>

           </div>
            <div class="column">
        <div class="card hover">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Cantidad de Empleos</strong> </h2>
               </div>
            </div>
          <div class="card-content ">
              <center>
                 <?php 
                  $tra = $trabajo->Traer_Trabajo();
                 ?>
                  <h3><?php  echo count($tra); ?> Empleos Publicados</h3>
              </center>
          </div>
            <a href="mantenimiento.php?id=2">
              <footer class="card-footer notification is-success">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>
           </div>

           <div class="column">
       <div class="card hover">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Cantidad de Solicitud de Informacion</strong> </h2>
               </div>
            </div>
          <div class="card-content ">
            <center>
                <?php 
                  $res = $obj->traer_Solicitud();
                 ?>
              <center>
                  <h3><?php  echo count($res); ?>  Solicitud De Información</h3>
              </center>
          </div>
            <a href="mantenimiento.php?id=4">
              <footer class="card-footer notification is-info">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>
          
           </div>

            <div class="column">
              <div class="card hover">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Cantidad de Postulaciones</strong> </h2>
               </div>
            </div>
          <div class="card-content ">
             <?php 
             $data = array('consulta' => 1, 
                       'id_area' => "",
                       'id_sub_area' => "",
                       'id_usuario' => "",
                       'salario' => "",
                       'funcion' => "1",
                        'id' => "" );
                  $res = $obj->Postulaciones($data);
                 ?>
              <center>
                  <h3><?php  echo count($res); ?>  Postulaciones Realizadas</h3>
              </center>
          </div>
            <a href="mantenimiento.php?id=5">
              <footer class="card-footer notification is-success">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>
         
      </div>

  </div>
      
      <div class="columns">
          <div class="column">

               <div class="card">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Lista de Postulaciones</strong> </h2>
               </div>
            </div>
          <div class="card-content ">
 <table class="table">
  <thead>
    <tr>
     
      <th>#</th>
      <th>Usuario</th>
      <th> Area</th>
      <th>Nombre Trabajo</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php 
         $data = array('consulta' => 1, 
                       'id_area' => "",
                       'id_sub_area' => "",
                       'id_usuario' => "",
                       'salario' => "",
                        'funcion' => "1", 
                        'id' => "",);
         $postu = $obj->Postulaciones($data);
         //var_dump($postu);
         foreach ($postu as $key => $value) {
       ?>
       <tr>
       <td><?php echo $key + 1  ?></td>
       <td><?php echo $value["usuario"]  ?></td>
       <td><?php echo $value["area"] ?></td>
       <td><?php echo $value["subarea"] ?></td>
       <td><?php echo $value["fecha_post"] ?></td>
       </tr>
       <?php } ?>

  </tbody>
</table>
          </div>
            <a href="mantenimiento.php?id=5">
              <footer class="card-footer notification is-warning">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>           
          </div>
           <div class="column">
               <div class="card">
            <div class="card-header">

               <div class="card-header-title">
                 <h2> <strong>Información de Solicitud</strong> </h2>
               </div>
            </div>
          <div class="card-content ">
         <table class="table">
  <thead>
    <tr>
   
      <th>Nombre</th>
      <th>Email</th>
      <th>Inquietud</th> 
      <th>Fecha</th> 
    </tr>
  </thead>
  <tbody>
    <?php 
    $resul = $obj->traer_Solicitud_limit();
  
    foreach ($resul as $key => $value) {
  ?>
    <tr> 
      <td><?php echo $value["nombre"] ?></td>
      <td><?php echo $value["email"] ?></td>
      <td><?php echo substr($value["pregunta"] , 0, 20) ?>...</td> 
      <td><?php echo $value["fecha"] ?></td> 
    </tr>
  <?php } ?>

  </tbody>
</table>
          </div>
            <a href="mantenimiento.php?id=4">
              <footer class="card-footer notification is-warning">    
                       <center>
                         VER MAS <i class="fas fa-angle-double-right"></i>
                       </center>
              </footer>
           </a>

         </div>            
          </div>

      </div>



          <?php
         }



     ?>
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
<?php }else{
  header('Location: index.php');
}}else{
         header('Location: login_register.php');

} ?>
</html>