<?php 
include '../../clases/usuario.php';
if (isset($_POST["enviar"])){
	 if (isset($_POST["nombre"])) {
	 	$data = array(  'nombre'=>$_POST["nombre"] ,
                        'apellido'=>$_POST["apellido"] ,
                        'email'=>$_POST["email"] ,
                        'puesto'=>$_POST["puesto"] ,
                        'estado'=>$_POST["estado"] ,
                        'provincia'=>$_POST["provincia"] ,
                        'sexo'=>$_POST["sexo"] ,
                        'tipo_usuario'=>$_POST["tipo_usuario"],
                        'id_usuario'=>$_POST["id_usuario"], );

	 	$obj = new Usuario();
	 	$resp = $obj->sp_actualizar($data);
	 		if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../../mantenimiento.php?id=1');

		}else{
			echo "error";
		}

	 }
	 var_dump($data);
}else{
         header('Location: ../../mantenimiento.php?id=1');
         }
 ?>
