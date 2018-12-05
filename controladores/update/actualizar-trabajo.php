<?php 
include '../../clases/usuario.php';
if (isset($_POST["enviar"])) {
	if (isset($_POST['descripcion'])) {
		echo $_POST["nivel_laboral"];
		$data = array('id_area' => $_POST["id_area"],
	                  'id_sub_area' => $_POST["id_sub_area"],
	                  'id_provincia' => $_POST["id_provincia"],
	                  'descripcion' => $_POST["descripcion"],
	                  'id_tipo_trabajo' => $_POST["id_tipo_trabajo"],
	                  'nivel_laboral' => $_POST["nivel_laboral"],
	                  'tipo_empleo' => $_POST["tipo_empleo"],   
	                  'salario' => $_POST["salario"],
	                  'id' => $_POST["id_trabajo"],);
      $obj= new Trabajo();
       $resp = $obj->sp_actualizar_trabajo($data);
       if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../../mantenimiento.php?id=2');

    }else{
      echo "error";
    }

	}
}else {
	 header('Location: ../../mantenimiento.php?id=2');
}

 ?>

