<?php 
include '../../clases/usuario.php';
if (isset($_POST['enviar'])) {

      $data = array('email'=>$_POST['email'],
                    'nombre'=>$_POST['nombre'],
                    'estado'=>$_POST['estado'],
                    'pregunta'=>$_POST['pregunta'],
                    'id'=>$_POST['id_solicitud'],);
      var_dump($data);
            $obj= new Trabajo();
           $resp = $obj->sp_actualizar_solicitud($data);
            if ($resp =="ok") {
             $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
               header('Location: ../../mantenimiento.php?id=4');

               }else{
                 echo "error";
               }
}else {
	
	header('Location: ../../mantenimiento.php?id=4');
}

 ?>