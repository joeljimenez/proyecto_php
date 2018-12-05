<?php 
 require ('conexion.php');
 /**
  * 
  */
 class Informacion 
 {
 	
     public function Insertar_Informacion($data)
 	{
 $sql ="CALL `sp_insertar_informacion`('".$data["email"]."', '".$data["nombre"]."', '".$data["pregunta"]."')";
 		 $statement = Conexion::conectar()->prepare($sql);
 		if ($statement->execute()) {
 			return "ok";
 		}else{
 			return "error";
 		}
         $statement->close();
         $statement=null;

 	}

 }

 ?>