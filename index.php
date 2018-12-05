<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WORK EXPRESS</title>
	<link rel="stylesheet" href="bulma/css/bulma.css">
	<link rel="stylesheet" href="assest/css/slide.css">
	<link rel="stylesheet" href="assest/css/footer.css">
	<link rel="stylesheet" href="assest/css/general.css">

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
<!-- SLIDER -->

<div class="container-fluid" id="slide">
<div class="row">
	<ul>
		<!-- SLIDE 1 -->
		<li>
			<img src="imagen/slider/slider1.png" alt="">
		
		  <div class="slideOpciones slideOpcion1">
		 
		
		<div class="textoSlide" style="top: 40%; left: 10%; width: 40%;" >
		    </div>

          </div>

		</li>

				<!-- SLIDE 2 -->
		<li>
			<img src="imagen/slider/slider2.png" alt="">
		
		  <div class="slideOpciones slideOpcion2">
		 
		
		<div class="textoSlide" style="top: 40%; right:15%; width: 40%;"  >
		    </div>

          </div>

		</li>
				<!-- SLIDE 3 -->


				<li>
			<img src="imagen/slider/slider3.png" alt="">
		
		  <div class="slideOpciones slideOpcion2">
			 
		
		<div class="textoSlide" style="top: 40%; right:15%; width: 40%;" >
			 
		    </div>

          </div>

		</li>

	</ul>

	<!-- Paginacion -->

	<ol class="paginacion">
		<li item ="1"> <i class="fa fa-circle"></i></li>
		<li item ="2"> <i class="fa fa-circle"></i></li>
		<li item ="3"> <i class="fa fa-circle"></i></li>
	</ol>


		<!-- FECHAS -->

		<div class="flechas" id="retroceder"><i class="fa fa-chevron-left"></i> </div>
				
		<div class="flechas" id="avanzar"><i class="fa fa-chevron-right"></i></div>

 </div>

</div>
	<script src="assest/js/jquery.js"></script>
	<script src="assest/js/iconos.js"></script>
	<script src="assest/js/slider.js"></script>
<br>
<div class="container">
	<div class="columns">
		<div class="column">

			<div class="card">
				<div class="card-header">

					<div class="card-header-title">
				      <h2> <strong>¿QUE OFRECEMOS EN WORK EXPRES?</strong> </h2>
					</div>
               </div>
			    <div class="card-content">
	<p class="ofrecemos">
	Parece que hay miles de formas de buscar empleo, pero precisamente por eso, sumado al shock por la situación en la que nos encontramos (si es nueva, porque es nueva, y si viene de lejos, por desesperación), es muy común bloquearse, no saber qué hacer, a quién acudir ni por dónde empezar. Si es la primera vez que te ocurre, deja de lamentarte y coge energía, en Word express mantenemos las mejores ofertas de empleo donde puedes encontrar las mejores vacantes de empleo, te garantizamos un proceso directo de contratación con las mejores empresas nacionales e internacionales para usted. cuanto antes empieces regístrate y comienza a buscar tu próximo empleo. Piensa que mientras repites una y otra vez “no me lo puedo creer” y te llenas de rencor e ira con los responsables, varias oportunidades están pasando cerca de ti y no has hecho nada por alcanzarlas.
	</p>
				</div>
			
				 <footer class="card-footer">
 	               <?php 
                       if (isset($_SESSION["session"])) {
				   ?>
                <p class="card-footer-item">
				  <a class="button is-primary is-outlined" href="" >Postulate Ya! &nbsp;<i class="fa fa-folder"></i></a>
               </p>	
                   <?php 
                    }
				    ?>
                </footer>

			</div><br>
		</div>
		 <div class="column">
			
			 <div class="card">
				<div class="card-header">

					<div class="card-header-title">
				      <h2> <strong>AREAS DE TRABAJO QUE OFRECEMOS</strong> </h2>
					</div>
               </div>
			    <div class="card-content">
			<p class="ofrecemos">
				Ofertas de empleo 
Según los datos que aporta el Ministerio de Empleo, el tipo de empresas es que más trabajadores contrata son las que se dedican a las áreas de ciencias, ingeniería, tecnología y matemáticas. Obtenido las siguientes:

			</p>
				</div>
				<footer class="card-footer">
 
                <p class="card-footer-item">
				  <a class="button is-primary is-outlined" href="" >Ver mas &nbsp;<i class="fa fa-arrow-right"></i></a>
               </p>
                </footer>
 
			</div>
		</div>
 
	</div>
</div>

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