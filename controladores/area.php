<?php 
 include '../clases/usuario.php';
  if (isset($_POST["area"])) {
  	 $data = array('area' => $_POST["nombre"] );
  	 $obj = new Trabajo();
  	 $resul = $obj->Insertar_area($data);
  	 if ($resul =="ok") {
  	   echo "registrado";
         header('Location: ../mantenimiento.php?id=3');

  	 }else{
  	 	echo "error";
  	 }
  }elseif (isset($_POST["sub_area"])) {
     $data = array('sub_area' => $_POST["sub_area_nombre"], 'id_area'=>$_POST["area_select"] );

  	 $obj = new Trabajo();
  	 $resul = $obj->Insertar_Sub_area($data);
  	 if ($resul =="ok") {
  	 	echo "registrado";
         header('Location: ../mantenimiento.php?id=3');
  	 	
  	 }else{
  	 	echo "error";
  	 }
  	}elseif (isset($_POST["empresa"])) {
       $data = array('empresa' => $_POST["empresaN"]);

     $obj = new Trabajo();
     $resul = $obj->Insertar_Empresa($data);
     if ($resul =="ok") {
      echo "registrado";
         header('Location: ../mantenimiento.php?id=3');
      
     }else{
      echo "error";
     }
    }
   else{
         header('Location: ../mantenimiento.php?id=3');

  }

 ?>