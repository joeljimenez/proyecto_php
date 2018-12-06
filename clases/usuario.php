<?php 
 require ('conexion.php');
 class Usuario 
 {
 	public function Traer_Provincia()
 	{
 		 $sql ="CALL sp_provincia()";
 		 $statement = Conexion::conectar()->prepare($sql);
 		 $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

 	}

 	public function Traer_Sexo()
 	{
 		 $sql ="CALL sp_sexo()";
 		 $statement = Conexion::conectar()->prepare($sql);
 		 $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

 	}
 public function Insertar_Registro($data){
 $sql ="CALL `sp_insertar`('".$data["nombre"]."', '".$data["apellido"]."', '".$data["email"]."', '".$data["pass"]."', '".$data["puesto"]."', '".$data["provincia"]."', '".$data["sexo"]."')";
 		 $statement = Conexion::conectar()->prepare($sql);
 		if ($statement->execute()) {
 			return "ok";
 		}else{
 			return "error";
 		}
         $statement->close();
         $statement=null;

 	}
 	
  	public function Ingreso_Sistema($data)
 	{
 		 $sql ="CALL `sp_ingresar`('".$data["email"]."', '".$data["pass"]."')";
 		 $statement = Conexion::conectar()->prepare($sql);
 		 $statement->execute();
         return $statement->fetch();
         $statement->close();
         $statement=null;

 	}
   //CALL `sp_traer_usuarios`()
   public function Traer_Usuarios()
   {
       $sql ="CALL sp_traer_usuarios()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }

      public function traer_Solicitud()
   {
       $sql ="CALL `sp_solicitud`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }
 //CALL `sp_solicitud_limit`()
 //
public function traer_Solicitud_limit()
   {
       $sql ="CALL `sp_solicitud_limit`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }

   public function traer_un_Usuario($id)
   {
       $sql ="CALL `sp_traer_un_usuario`('".$id."')";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetch();
         $statement->close();
         $statement=null;

   }
   public function traer_un_Registro($data)
   {
       $sql ="CALL `sp_traer_un_registro`('".$data["id"]."', '".$data["consulta"]."')";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetch();
         $statement->close();
         $statement=null;

   }
   //CALL `sp_traer_una_info`('12')
   public function traer_un_Info($id)
   {
       $sql ="CALL `sp_traer_una_info`('".$id."')";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetch();
         $statement->close();
         $statement=null;

   }
//sp para eliminar
 public function Sp_Eliminar($data)
  {
 $sql ="CALL sp_eliminacion('".$data["id"]."','".$data["consulta"]."')";
     $statement = Conexion::conectar()->prepare($sql);
    if ($statement->execute()) {
      return "ok";
    }else{
      return "error";
    }
         $statement->close();
         $statement=null;

  }

   public function Postulaciones($data)
   {
      $sql ="CALL `sp_postulacion`('".$data["consulta"]."', '".$data["id_area"]."', '".$data["id_sub_area"]."', '".$data["id_usuario"]."', '".$data["salario"]."', '".$data["id"]."')";
       $statement = Conexion::conectar()->prepare($sql);
       //si es uno retorna una cadena
       //si es dos retorna un boolean
       if ($data["funcion"] =="1") {
                $statement->execute();
         return $statement->fetchAll();
       }else{
        echo $sql;

         if ($statement->execute()) {
            return "ok";
           }else{
              return "error";
           }
       }

         $statement->close();
         $statement=null;

   }

   public function traer_tipo_usuario()
   {
       $sql ="CALL `sp_tipo_usuario`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;
   }

 public function sp_actualizar($data){
 $sql ="CALL sp_update_usuario('".$data["nombre"]."', '".$data["apellido"]."', '".$data["email"]."', '".$data["puesto"]."', '".$data["provincia"]."', '".$data["sexo"]."', '".$data["tipo_usuario"]."', '".$data["estado"]."', '".$data["id_usuario"]."')";
     $statement = Conexion::conectar()->prepare($sql);
    if ($statement->execute()) {
      return "ok";
    }else{
      return "error";
    }
         $statement->close();
         $statement=null;

  }

 

 public function sp_actualizar_postulaciones($data){
 $sql ="CALL sp_actualizar_postulacion('".$data["id_Area"]."', '".$data["id_sub_area"]."', '".$data["id_usuario"]."', '".$data["salario"]."', '".$data["estado"]."', '".$data["id"]."')";
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



 class Trabajo 
 {
      public function Insertar_Trabajo($data)
   {
        $sql ="CALL sp_insertar_trabajo('".$data["id_area"]."','".$data["id_sub_area"]."','".$data["id_provincia"]."','".$data["salario"]."','".$data["descripcion"]."','".$data["id_tipo_trabajo"]."','".$data["nivel_laboral"]."','".$data["tipo_empleo"]."')";
       $statement = Conexion::conectar()->prepare($sql);
      if ($statement->execute()) {
         return "ok";
      }else{
         return "error";
      }
         $statement->close();
         $statement=null;

   }

         public function Insertar_area($data)
   {
        $sql ="CALL sp_insertar_area('".$data["area"]."')";
       $statement = Conexion::conectar()->prepare($sql);
      if ($statement->execute()) {
         return "ok";
      }else{
         return "error";
      }
         $statement->close();
         $statement=null;

   }


         public function Insertar_Sub_area($data)
   {
        $sql ="CALL sp_insertar_sub('".$data["sub_area"]."','".$data["id_area"]."')";
       $statement = Conexion::conectar()->prepare($sql);
      if ($statement->execute()) {
         return "ok";
      }else{
         return "error";
      }
         $statement->close();
         $statement=null;

   }

  public function Insertar_Empresa($data)
   {
        $sql ="CALL sp_insertar_tipo('".$data["empresa"]."')";
       $statement = Conexion::conectar()->prepare($sql);
      if ($statement->execute()) {
         return "ok";
      }else{
         return "error";
      }
         $statement->close();
         $statement=null;

   }

      public function Traer_area()
   {
       $sql ="CALL `sp_traer_area`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }


   public function Traer_sub_area()
   {
       $sql ="CALL `sp_traer_sub`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   } 

   public function Traer_Empresa()
   {
       $sql ="CALL sp_traer_empresa()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }


   public function Traer_Trabajo()
   {
       $sql ="CALL `sp_traer_trabajo`()";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }

         public function traer_un_trabajo($id)
   {
       $sql ="CALL `sp_traer_un_trabajo`('".$id."')";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetch();
         $statement->close();
         $statement=null;

   }
   
 public function sp_actualizar_area($data){
 $sql ="CALL sp_actualizar_area('".$data["nombre_area"]."', '".$data["id_area"]."', '".$data["sub_area"]."', '".$data["empresa"]."', '".$data["consulta"]."', '".$data["id"]."')";
     $statement = Conexion::conectar()->prepare($sql);
    if ($statement->execute()) {
      return "ok";
    }else{
      return "error";
    }
         $statement->close();
         $statement=null;

  }

      public function sp_actualizar_trabajo($data)
   {
        $sql ="CALL sp_actualizar_trabajo('".$data["id_area"]."','".$data["id_sub_area"]."','".$data["id_provincia"]."','".$data["descripcion"]."','".$data["id_tipo_trabajo"]."','".$data["salario"]."','".$data["nivel_laboral"]."','".$data["tipo_empleo"]."','".$data["id"]."')";
        echo $sql;
       $statement = Conexion::conectar()->prepare($sql);
      if ($statement->execute()) {
         return "ok";
      }else{
         return "error";
      }
         $statement->close();
         $statement=null;

   }
  public function sp_actualizar_solicitud($data){
 $sql ="CALL sp_actualizar_solicitud('".$data["email"]."', '".$data["nombre"]."', '".$data["estado"]."', '".$data["pregunta"]."', '".$data["id"]."')";
     $statement = Conexion::conectar()->prepare($sql);
    if ($statement->execute()) {
      return "ok";
    }else{
      return "error";
    }
         $statement->close();
         $statement=null;
  }

     public function Traer_Filtro($data)
   {
       $sql ="CALL `sp_filtro_trabajo`('".$data["campo"]."', '".$data["valor"]."', '".$data["consulta"]."')";
       $statement = Conexion::conectar()->prepare($sql);
       $statement->execute();
         return $statement->fetchAll();
         $statement->close();
         $statement=null;

   }


 }

 ?>