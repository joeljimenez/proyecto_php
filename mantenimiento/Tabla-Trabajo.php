   <a href="mantenimiento.php?id=8" class="button is-info" style="margin-top: 5px;">
      <i class="fa fa-plus"></i>
    &nbsp;Nueva Empleo</a><br>
<div class="card">
        <div class="card-header">

         <div class="card-header-title">
               	<center>
                 <h2> <strong>EMPLEOS PUBLICADOS</strong> </h2>
               		
               	</center>
               </div>
           </div>
          <div class="card-content ">
            <center>
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Area</th>
      <th>SubArea</th>
      <th>Provincia</th>
      <th>Empresa</th>
      <th>Salario</th>
      <th>Nivel Laboral</th>
      <th>Tipo Empleo</th>
      <th>Descripción</th>
      <th>Publicación</th>
      <th>Actiones</th>
    </tr>
  </thead>
  <tbody>
    
     <?php 
       $traba = $trabajo->Traer_Trabajo();
       foreach ($traba as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["area"] ?></td>
     <td><?php echo $value["subarea"] ?></td>
     <td><?php echo $value["provincia"] ?></td>
     <td><?php echo $value["empresa"] ?></td>
     <td><?php echo $value["salario"] ?></td>     
     <td><?php echo $value["nivel_laboral"] ?></td>
     <td><?php echo $value["tipo_empleo"] ?></td>
     <td><?php echo substr($value["descripcion"],0,15) ?> ...</td>
     <td><?php echo $value["publicado"] ?></td>
     <td>
      	<a href="mantenimiento.php?id=12&x=<?php echo $value["id_trabajo"] ?>" class="button is-success">Editar  &nbsp; <i class="fa fa-edit"></i>  </a>
      	<a href="mantenimiento.php?id=15&x=<?php echo $value["id_trabajo"] ?>&fu=trabajo" class="button is-danger">  <i class="far fa-trash-alt"></i> &nbsp; Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
</center>
</div>
 </div> 