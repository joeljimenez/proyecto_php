<?php 
session_start();
include '../clases/informacion.php';
if (isset($_POST["enviar"])) {
	if ($_POST["email"] !="" && $_POST["nombre"] !="" && $_POST["pregunta"] !="" ) {
		$data = array('email' => $_POST["email"],
		              'nombre' => $_POST["nombre"],
		              'pregunta' => $_POST["pregunta"], );
		var_dump($data);
		$obj = new Informacion();
		$resp = $obj->Insertar_Informacion($data);
		if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../index.php');

		}else{
			echo "error";
		}
	}
}
 ?>