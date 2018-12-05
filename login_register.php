<?php 
session_start();
unset($_SESSION["mensajeSolicitud"]);
session_destroy();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WORK EXPRESS</title>
	<link rel="stylesheet" href="bulma/css/bulma.css">
	<link rel="stylesheet" href="assest/css/login_register.css">
	<link rel="stylesheet" href="assest/css/footer.css">
	<link rel="stylesheet" href="assest/css/general.css">
	<link rel="icon" href="imagen/imagen.png">

</head>
<body>
<?php 
   if (isset($_SESSION["session"])) {
      if ($_SESSION["session"]=="ok") {
    header('Location: login_register.php');
 
}}else{
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
 

<div class="container">
 
		
	<div class="columns">

		<div class="column">
			<div class="login">
				<?php 
                   if (isset($_SESSION["errorS"])) {
                   	  if ($_SESSION["errorS"] == "ERROR") {
                   	  ?>
                   	  <h1 class="notification is-danger">Contraseña o correo Incorrectos</h1>
                   	  <?php
                   	  } 
                   	}
		 		 ?>
				<h3>INGRESO AL SISTEMAS</h3>
			<img src="imagen/login.png" alt="">
		  <form action="controladores/login_register.php" method="post">
	             <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="email" placeholder="Correo Electronico" name="email" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-envelope"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

                <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="password" placeholder="Ingrese su Contraseña" name="pass" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-unlock"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

                <div class="field">
				 <p class="control">
					<button class="button is-success" type="submit" name="login">Entrar &nbsp;<i class="fas fa-check"></i></button>
				 </p>
			  </div>

          </form>

		</div>
			</div>
			

		 <div class="column">
		 	<div class="register">
		 		<?php 
                   if (isset($_SESSION["error"])) {
                   	  if ($_SESSION["error"] =="ok2") {
                   	  ?>
                   	  <h1 class="notification is-success"><?php echo $_SESSION["mensaje2"] ?></h1>
                   	  <?php
                   	  }elseif($_SESSION["error"] =="ok"){
                       ?>
                        <h1 class="notification is-danger"><?php echo $_SESSION["mensaje"] ?></h1>
                       <?php
                   	  }
                   }
		 		 ?>
		 	
		 	<h3>REGISTRATE GRATIS</h3>
		  <form action="controladores/login_register.php" method="post">
	 	          <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="text" placeholder="Nombre" name="nombre" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-user"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

                <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="text" placeholder="Apellido" name="apellido" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-user"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

           <div class="field">
                 <p class="control has-icons-left">
                   <span class="select">
                      <select name="sexo">
                         <option selected>Seleccione el Sexo</option>
                         <?php 
                        include 'clases/usuario.php';
                        $obj = new Usuario();
                        $resultado = $obj->Traer_Sexo();
                        foreach ($resultado as $key => $value) {
                     ?>
                         <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>

                     <?php
                        }
                          ?>
                      </select>
                 </span>
                 <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                 </span>
              </p>
           </div>

               <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="email" placeholder="Correo Electronico" name="email" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-envelope"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

              <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="password" placeholder="Ingrese su Contraseña" name="pass" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-unlock"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

                <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="text" placeholder="¿que puesto esta buscando" name="puesto" required>
		                  <span class="icon is-small is-left">
		                   <i class="fas fa-address-book"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

             <div class="field">
                 <p class="control has-icons-left">
                   <span class="select">
                      <select name="provincia">
                         <option selected>Seleccione Provincia</option>
                         <?php 
                       
                        $obj = new Usuario();
                        $resultado = $obj->Traer_Provincia();
                        foreach ($resultado as $key => $value) {
                     ?>
                         <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>

                     <?php
                        }
                          ?>
                      </select>
                 </span>
                 <span class="icon is-small is-left">
                    <i class="fas fa-globe"></i>
                 </span>
              </p>
           </div>

           <div class="field">
                 <div class="control">
                  <label class="checkbox">
                    <input type="checkbox">
                     Acepto Todas las Condiciones
                </label>
             </div>
          </div>

           <div class="field">
				 <p class="control">
					<button class="button is-warning" type="submit" name="registrar">Registrarse &nbsp;<i class="fas fa-check"></i></button>
				 </p>
			  </div>
 
          </form>
        </div>
		</div>
		
 
	</div>
</div>


 

<br>
<footer class="footer_caja">
	<div class="columns">
		 <div class="column">
		 	<div class="columns is-mobile">
		 		<div class="column" style="margin-left: 4%;">
		 			SIGUENOS<br>
	               <a href=""><i class="fab fa-facebook social"></i></a>
		 		   <a href=""><i class="fab fa-twitter social"></i></a>
		 		   <a href=""><i class="fab fa-instagram social"></i></a>

		 		   <br>
		 		   <br>
		 		   <label>Telefono</label> &nbsp;<i class="fa fa-phone"></i>
		 		   <p>6598-9896</p>
		 		   <br><br>
		 		   <label>Ubicacion</label> <i class="fa fa-directions"></i>
		 		   <p>Punta Pacifico Calle 57 , Panamá</p>
		 		</div>
		 		<div class="column imagen">
		 			<img src="imagen/imagen.png" alt="">
		 		</div>
		 		
		 	</div>
		 
		 </div>
		 <hr>
<div class="column">
		  	<h3>SOLICITA INFORMACIÓN</h3>
		  	<div class="is-half">
		 	<form action="controladores/solicitudInformacion.php" method="post" >
		 		<div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="email" placeholder="Email" name="email" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-envelope"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>

              <div class="field">
		           <p class="control has-icons-left has-icons-right">
		               <input class="input" type="text" placeholder="Nombre" name="nombre" required>
		                  <span class="icon is-small is-left">
		                    <i class="fas fa-user"></i>
		                  </span>
		                 <span class="icon is-small is-right">
		                    <i class="fas fa-check"></i>
		                </span>
		          </p>
               </div>
                 
                <div class="field">
               <div class="control">
              <textarea class="textarea" placeholder="Escriba su Inquietud" name="pregunta" required></textarea>
              </div>
			
			  </div>
								
				<div class="field">
				 <p class="control">
					<button class="button is-success" name="enviar">Enviar <i class="fas fa-check"></i></button>
				 </p>
			  </div>
								
		 	</form>
		 	<?php 
              if (isset($_SESSION["mensajeSolicitud"])) {
              	?>
              	<h4><?php echo $_SESSION["mensajeSolicitud"]  ?></h4>
              	<?php
              }
		 	 ?>
	     </div>
		</div>
	</div>
		<p>&copy; 2018 WORK EXPRESS<p>
</footer>

	<script src="assest/js/jquery.js"></script>
	<script src="assest/js/iconos.js"></script>
	<script src="assest/js/slider.js"></script>

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
	<?php 
	}
 ?>

</body>
</html>