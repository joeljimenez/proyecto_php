<div class="card">
        <div class="card-header">

         <div class="card-header-title">
               	<center>
                 <h2> <strong>USUARIOS DEL SISTEMA</strong> </h2>
               		
               	</center>
               </div>
           </div>
          <div class="card-content ">
            <center>
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo</th>
      <th>Puesto</th>
      <th>Provincia</th>
      <th>Sexo</th>
      <th>Perfil</th>
      <th>Estado</th>
      <th>Actiones</th>
    </tr>
  </thead>
  <tbody>
    
     <?php 
       $resultado = $obj->Traer_Usuarios();
       foreach ($resultado as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["nombre"] ?></td>
     <td><?php echo $value["apellido"] ?></td>
     <td><?php echo $value["correo"] ?></td>
     <td><?php echo $value["puesto"] ?></td>
     <td><?php echo $value["provincia"] ?></td>     
     <td><?php echo $value["sexo"] ?></td>
     <td><?php echo $value["usuario"] ?></td>
     <?php 
         if ($value["activo"]=="1") {
         	$estado = "Activo";
         }else{
         	$estado = "Inactivo";
         }
      ?>
     <td><?php echo $estado?></td>
     <td>
      	<a href="mantenimiento.php?id=10&x=<?php echo $value["id"] ?>" class="button is-success">&nbsp; <i class="fa fa-edit"></i> Editar </a>
      	<a href="mantenimiento.php?id=15&x=<?php echo $value["id"] ?>&fu=usuario" class="button is-danger"><i class="far fa-trash-alt"></i> &nbsp; Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
<?php
if (isset($_SESSION["error_usuario"]) =="ok" && isset($_SESSION["mensaje_usuario"]) !="") {
?>
<h5 class="notification is-danger"><?php echo $_SESSION["mensaje_usuario"] ?></h5>

<?php
}
?>
    
</center>
</div>
 </div> 