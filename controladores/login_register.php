<?php 
 session_start();  
            
require '../clases/usuario.php';
 $obj = new Usuario();  
if(isset($_POST["registrar"])){
 if (isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["provincia"]) &&  isset($_POST["puesto"])  ) {
           	$encriptar = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
			   		$2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');
           	$data = array(
           'nombre'=> $_POST["nombre"],
           'apellido'=> $_POST["apellido"],
           'email'=> $_POST["email"],
           'pass'=> $encriptar,
           'puesto'=> $_POST["puesto"],
           'provincia'=> $_POST["provincia"],
           'sexo'=> $_POST["sexo"]);
 
           

              $resultado = $obj->Insertar_Registro($data);

              if ($resultado == "ok"){ 
            $_SESSION["error"] = "ok2";
            $_SESSION["mensaje2"]= "REGISTRADO CORRECTAMENTE, PUEDE INGRESAR AL SISTEMA";
            header('Location: ../login_register.php');
            echo "registrado";
              }else{
              	echo "error";
              }

 }else{
 	$_SESSION["error"] = "Ok1";
 	$_SESSION["mensaje"]= "LLENE TODOS LOS CAMPOS";
 }
 


}elseif (isset($_POST["login"])) {
if (isset($_POST["email"]) && isset($_POST["pass"])){

  $encriptar = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
            $2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');

  $data = array('email' => $_POST["email"],'pass' => $encriptar );
   $respuesta = $obj->Ingreso_Sistema($data);
  $cantidad= count($respuesta);
 // var_dump($respuesta);
   if ($cantidad >1) {
    //borrando una session en especifico
        unset($_SESSION["errorS"]);
        unset($_SESSION["error"]);
        unset($_SESSION["mensaje"]);
        unset($_SESSION["mensaje2"]);
    //creando session
   //var_dump($respuesta);
        $_SESSION["administrador"]=$respuesta["tipo"];
        $_SESSION["session"]="ok";
        $_SESSION["nombre"] =$respuesta["nombre"];
        $_SESSION["apellido"] =$respuesta["apellido"];
        $_SESSION["id"] =$respuesta["id"];
         echo $cantidad;
         header('Location: ../index.php');
   }else{
     unset($_SESSION["error"]);
     unset($_SESSION["mensaje"]);
     unset($_SESSION["mensaje2"]);
     $_SESSION["errorS"]="ERROR";
     header('Location: ../login_register.php');
   }
  




}else{
  $_SESSION["error"] = "Ok1";
  $_SESSION["mensaje"]= "LLENE TODOS LOS CAMPOS";
 }


	echo "login";
}
 ?>
