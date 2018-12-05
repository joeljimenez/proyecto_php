<?php 
include '../clases/usuario.php';
if (isset($_POST["enviar"])) {
	$obj = new Trabajo();

	$data = array('id_area' => $_POST["id_area"],
	                    'id_sub_area' => $_POST["id_sub_area"],
	                    'id_provincia' => $_POST["id_provincia"],
	                    'descripcion' => $_POST["descripcion"],
	                    'id_tipo_trabajo' => $_POST["id_tipo_trabajo"],
	                    'nivel_laboral' => $_POST["nivel_laboral"],
	                    'tipo_empleo' => $_POST["tipo_empleo"],   
	                     'salario' => $_POST["salario"],);
	var_dump($data);
	$res = $obj->Insertar_Trabajo($data);
	if ($res =="ok") {
  	   echo "registrado";
        header('Location: ../mantenimiento.php?id=2');

  	 }else{
  	 	echo "error";
  	 }
}
 
 ?>

