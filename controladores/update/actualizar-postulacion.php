<?php 
include '../../clases/usuario.php';
if (isset($_POST["enviar"])){
	 if (isset($_POST["id_area"])) {
	 	$data = array(  'id_Area'=>$_POST["id_area"] ,
                        'id_sub_area'=>$_POST["id_sub_area"] ,
                        'id_usuario'=>$_POST["id_usuario"] ,
                        'salario'=>$_POST["salario"] ,
                        'estado'=>$_POST["estado"] ,
                        'id'=>$_POST["id_postulacion"] ,);

            $obj = new Usuario();
            var_dump($data);
      $resp = $obj->sp_actualizar_postulaciones($data);
         if ($resp =="ok") {
        
         header('Location: ../../mantenimiento.php?id=5');

      }else{
         echo "error";
      }

      
      var_dump($data);
  }
}else{
         header('Location: ../../mantenimiento.php?id=5');
         }
 