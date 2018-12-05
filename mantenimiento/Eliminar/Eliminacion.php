<?php 
if (isset($_GET["x"]) || isset($_GET["fu"])) {
	 
	 if ($_GET["fu"] =="usuario") {
	 	//se busca si ese usuario tiene postulaciones
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"7" ); 
	 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=1');

  	    }else{
		$_SESSION["error_usuario"]="ok";
		$_SESSION["mensaje_usuario"]="NO PUEDE ELIMINAR USUARIO, TIENE UNA POSTULACION";
        header('Location: mantenimiento.php?id=1');

		
  	    }

	 }elseif ($_GET["fu"] =="area") {

	 	//se busca si esa area tiene sub area
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"1" );
	 		 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=3');

  	    }else{
			$_SESSION["error_usuario1"]="ok";
			$_SESSION["mensaje_usuario1"]="NO PUEDE ELIMINAR AREA, YA UN USUARIO ESTA POSTULADO EN ESTA AREA";
			header('Location: mantenimiento.php?id=3');
  	    }

      
	 }elseif ($_GET["fu"] =="empresa") {
	 	//se busca si esta empresa tiene empleos
	 	//
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"3" );
	 		 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=3');

  	    }else{
			$_SESSION["error_usuario"]="ok";
			$_SESSION["mensaje_usuario"]="NO PUEDE ELIMINAR AREA, YA UN USUARIO ESTA POSTULADO EN ESTA EMPRESA";
			header('Location: mantenimiento.php?id=3');
  	    }


	 } elseif ($_GET["fu"] =="trabajo") {
	 	
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"4" );
	 		 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=2');

  	    }else{
         echo "error";
  	    }


	 } elseif ($_GET["fu"] =="solicitud") {
	 	
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"5" );
	 		 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=4');

  	    }else{
         echo "error";
  	    }


	 } elseif ($_GET["fu"] =="postulaciones") {

      $data = array('id' =>$_GET["x"] ,
       'consulta'=>"6" );
      	 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=5');

  	    }else{
         echo "error";
  	    }


	 } elseif ($_GET["fu"] =="subarea") {
	 	$data = array('id' =>$_GET["x"] ,
	 	              'consulta'=>"2" );
	 		 	$res=$obj->Sp_Eliminar($data);
	 	if ($res =="ok") {
  	   echo "registrado";
        header('Location: mantenimiento.php?id=3');

  	    }else{
			$_SESSION["error_usuario3"]="ok";
			$_SESSION["mensaje_usuario3"]="NO PUEDE ELIMINAR AREA, YA UN USUARIO ESTA POSTULADO EN ESTA SUBAREA";
			header('Location: mantenimiento.php?id=3');
  	    }

	 	
	 } 

}else{
	 header('Location: mantenimiento.php');
}

 ?>