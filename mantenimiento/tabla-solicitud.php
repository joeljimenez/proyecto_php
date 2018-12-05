 
<div class="card">
        <div class="card-header">

         <div class="card-header-title">
               	<center>
                 <h2> <strong>SOLICITUD DE INFORMACIÓN</strong> </h2>
               		
               	</center>
               </div>
           </div>
          <div class="card-content ">
            <center>
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Correo</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Estado</th>
      <th>Fecha Publicación</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    
     <?php 
       $traba = $obj->traer_Solicitud();
       foreach ($traba as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["email"] ?></td>
     <td><?php echo $value["nombre"] ?></td>
     <td><?php echo substr($value["pregunta"],0,40) ?>..</td>
     <?php 
        if ($value["estado"] =="0") {
         $estado = "En Espera";
        }else{
          $estado = "Respondido";
        }
      ?>
     <td><?php echo $estado?></td>
     <td><?php echo $value["fecha"] ?></td>
     <td>
      	<a href="mantenimiento.php?id=13&x=<?php echo $value["id"] ?>" class="button is-success">Editar&nbsp; <i class="fa fa-edit"></i> </a>
      	<a href="mantenimiento.php?id=15&x=<?php echo $value["id"] ?>&fu=solicitud" class="button is-danger"><i class="far fa-trash-alt"></i> &nbsp;Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
</center>
</div>
 </div> 