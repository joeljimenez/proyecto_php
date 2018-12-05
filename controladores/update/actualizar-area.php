<?php 
include '../../clases/usuario.php';
  if (isset($_POST["area"])) {
  	   $data = array('nombre_area' => $_POST["area_N"],
                     'id_area' => "",
                     'sub_area' => "",
                     'empresa' => "",
                     'consulta' => "1",
                     'id' => $_POST["id"],);
       $obj= new Trabajo();
       $resp = $obj->sp_actualizar_area($data);
       if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../../mantenimiento.php?id=3');

    }else{
      echo "error";
    }


var_dump($data);
  	  
  }elseif (isset($_POST["sub_area"])) {
           $data = array('nombre_area' => "",
                     'id_area' => $_POST["id_area"],
                     'sub_area' => $_POST["subarea_N"],
                     'empresa' => "",
                     'consulta' => "2",
                     'id' => $_POST["id"],);
           $obj= new Trabajo();
           $resp = $obj->sp_actualizar_area($data);
           if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../../mantenimiento.php?id=3');

    }else{
      echo "error";
    }

  var_dump($data); 	  
  	}elseif (isset($_POST["empresa"])) {
             $data = array('nombre_area' => "",
                     'id_area' => "",
                     'sub_area' => "",
                     'empresa' => $_POST["empresa_N"],
                     'consulta' => "3",
                     'id' => $_POST["id"],);
             $obj= new Trabajo();
             $resp = $obj->sp_actualizar_area($data);
             if ($resp =="ok") {
         $_SESSION["mensajeSolicitud"]="Fue Enviado Correctamente";
         header('Location: ../../mantenimiento.php?id=3');

    }else{
      echo "error";
    }

 var_dump($data);
    }
   else{
         header('Location: ../../mantenimiento.php?id=3');

  }

 ?>