 
<div class="card">
        <div class="card-header">

         <div class="card-header-title">
               	<center>
                 <h2> <strong>POSTULACIONES REALIZADAS</strong> </h2>
               		
               	</center>
               </div>
           </div>
          <div class="card-content ">
            <center>
 <table class="table">
  <thead>
    <tr>
     
      <th>#</th>
      <th>Usuario</th>
      <th> Area del trabajp</th>
      <th>Nombre del Trabajo</th>
      <th>Salario</th>
      <th>Estado</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    
     <?php 
         $data = array('consulta' => 2, 
                       'id_area' => "",
                       'id_sub_area' => "",
                       'id_usuario' => "",
                       'salario' => "",
                       'funcion' => "1", 
                       'id' => "",);

       $postu = $obj->Postulaciones($data);
       foreach ($postu as $key => $value) {
     ?>
     <tr>
      <td><?php echo $key + 1  ?></td>
       <td><?php echo $value["usuario"]  ?></td>
       <td><?php echo $value["area"] ?></td>
       <td><?php echo $value["subarea"] ?></td>
       <td><?php echo $value["salario"] ?></td>
       <td><?php echo $value["estado"] ?></td>
       <td><?php echo $value["fecha_post"] ?></td>
     <td>
      	<a href="mantenimiento.php?id=14&x=<?php echo $value["id_postulacion"] ?>" class="button is-success">Editar&nbsp; <i class="fa fa-edit"></i> </a>
      	<a href="mantenimiento.php?id=15&x=<?php echo $value["id_postulacion"] ?>&fu=postulaciones" class="button is-danger"><i class="far fa-trash-alt"></i> &nbsp;Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
</center>

</div>
 </div> 