<?php session_start();?>
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
if (isset($_GET['x'])) {

   if ($_GET['x'] !="") {
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
  <br><br><br>
  <a href="trabajos.php" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
        
      <?php
           include 'clases/usuario.php';
          $obj = new Trabajo();
          if (isset($_GET["x"])) {
            $traba = $obj->traer_un_trabajo($_GET["x"]);
             $_SESSION['id_trabajo']=$traba["id_trabajo"];
          }else{
          //  header('Location: trabajos.php');
          }
           
       ?>
                    <br>
                    <br>
                     <div class="card" style="margin-bottom: 4%; width: 80%; margin: auto;">
                       <div class="card-header" style="background-color: #F1F8FE; font-size: 25px; font-weight:bold;">
                          <div class="card-header-title row"> 
                            
                            <div class="col-md-6">
   
                              <h5><?php echo $traba["subarea"] ?></h5>
                                <strong style="color: #3EA0F1;"><?php echo $traba["empresa"] ?></strong>

                            </div>
                  
                          </div>
                     </div>
                          <div class="card-content">
                            <span>Lugar de Trabajo: &nbsp;</span> <strong><span><?php echo $traba["provincia"] ?></span></strong> <br>
                            <span>Publicado: &nbsp;</span><strong><span><?php echo $traba["publicado"] ?></span></strong> <br>
                            <span>Salario: &nbsp;</span><strong><span><?php echo $traba["salario"] ?></span></strong> <br>
                            <span>Tipo de Puesto: &nbsp;</span><strong><span><?php echo $traba["tipo_empleo"] ?></span></strong> <br>
                            <span>Area: &nbsp;</span><strong><span><?php echo $traba["area"] ?></span></strong> <br>
                            <span>Nivel Laboral: &nbsp;</span><strong><span><?php echo $traba["nivel_laboral"] ?></span></strong> <br>
                            <br>
                            <hr>
                            <h4 style="font-size: 20px;"><strong>Descripción del trabajo</strong></h4>
                              <p style="text-align: justify;">
                                <?php echo $traba["descripcion"] ?>
                              </p>
                          </div>
                         
                        <footer class="card-footer notification">    
                       <div>
                            <?php 
                               if (isset($_SESSION["session"])) {
           
                                   if (isset($_SESSION['errorPostulacion'])) {
                                     if ($_SESSION['errorPostulacion'] =="ok") {
                                       ?>
                                           <h4 class="notification is-info"><?php echo $_SESSION['mensajePostulacion']?></h4>
                                       <?php
                                     }
                                   }else{
                                    ?>
                        <form method="post" action="ver-trabajo.php">
                          <div class="field has-addons">
                               <div class="control">
                                 <input class="input" type="number" placeholder="SALDO PRETENDIDO" name="saldo">
                               </div>
                               <div class="control">
                                 <button class="button is-info" name="postu">
                                   POSTULARME
                                </button>
                   

                               </div>
                             </div>
                        </form>
                      <?php } }else{
                        ?>
                        <h5 class="notification is-warning">DEBE INICIAR SESSIÓN PARA POSTULARSE</h5>
                        <?php
                      } ?>
                       </div>
              </footer>
              
           </div>
       </div>

   <?php  
      }else{
header('Location: trabajos.php');
   }
}else{
  header('Location: trabajos.php');
}
 ?>


<?php 
  if (isset($_POST['postu'])) {
               include 'clases/usuario.php';
     $obj = new Trabajo();
     $traba = $obj->traer_un_trabajo($_SESSION['id_trabajo']);
     //var_dump($traba);



     $obj1 = new Usuario();
          $data = array('consulta' => 3, 
                       'id_area' => $traba["id_area"],
                       'id_sub_area' =>$traba['id_sub'],
                       'id_usuario' =>$_SESSION['id'],
                       'salario' => $_POST['saldo'],
                        'funcion' => "2", 
                        'id' => "",);
           
      
         $postu = $obj1->Postulaciones($data);
         if ($postu =="ok") {
         $_SESSION["mensajePostulacion"]="Postulado Correctamente";
         $_SESSION["errorPostulacion"]="ok";
         echo 'insertado';
          header('Location: ver-trabajo.php?x='.$_SESSION['id_trabajo']);
    }else{
      echo "error";
    }
  }
 ?>
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