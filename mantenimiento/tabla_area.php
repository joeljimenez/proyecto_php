<div class="columns">
  <div class="column">
    <a href="mantenimiento.php?id=6" class="button is-info">
      <i class="fa fa-plus"></i>
    &nbsp;Nueva Area</a><br>
    <div class="card">
        <div class="card-header">

         <div class="card-header-title">
                <center>
                 <h2> <strong>LISTA DE AREA DE TRABAJOS</strong> </h2>
                  
                </center>
               </div>
           </div>
          <div class="card-content ">
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Area</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    
     <?php 
       $area = $trabajo->Traer_area();
       foreach ($area as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["nombre"] ?></td>
     <td>
        <a href="mantenimiento.php?id=11&x=<?php echo $value["id_area"] ?>&edit=area" class="button is-success">Editar &nbsp; <i class="fa fa-edit"></i> </a>
        <a href="mantenimiento.php?id=15&x=<?php echo $value["id_area"] ?>&fu=area" class="button is-danger"> <i class="far fa-trash-alt"></i> &nbsp; Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
<?php
if (isset($_SESSION["error_usuario1"]) =="ok" && isset($_SESSION["mensaje_usuario1"]) !="") {
?>
<h5 class="notification is-danger"><?php echo $_SESSION["mensaje_usuario1"] ?></h5>

<?php
}
?>
</div>
 </div> 
  </div>
  <div class="column">
        <a href="mantenimiento.php?id=7" class="button is-info">
         <i class="fa fa-plus"></i>
       &nbsp; Nueva Sub Area</a><br>
    <div class="card">
        <div class="card-header">

         <div class="card-header-title">
                <center>
                 <h2> <strong>LISTA DE SUBAREA DE TRABAJOS</strong> </h2>
                  
                </center>
               </div>
           </div>
          <div class="card-content ">
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Area</th>
      <th>Sub Area</th>
      <th>Acciones</th>


    </tr>
  </thead>
  <tbody>
    
     <?php 
        $Subarea = $trabajo->Traer_sub_area();
       foreach ($Subarea as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["area"] ?></td>
     <td><?php echo $value["subarea"] ?></td>
     <td>
        <a href="mantenimiento.php?id=11&x=<?php echo $value["id_sub"] ?>&edit=subarea" class="button is-success">Editar &nbsp; <i class="fa fa-edit"></i> </a>
        <a href="mantenimiento.php?id=15&x=<?php echo $value["id_sub"] ?>&fu=subarea" class="button is-danger"> <i class="far fa-trash-alt"></i> &nbsp; Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>
<?php
if (isset($_SESSION["error_usuario3"]) =="ok" && isset($_SESSION["mensaje_usuario3"]) !="") {
?>
<h5 class="notification is-danger"><?php echo $_SESSION["mensaje_usuario3"] ?></h5>

<?php
}
?>
</div>
 </div> 
  </div>
</div>
<div class="columns">
     <div class="column is-half">
           <a href="mantenimiento.php?id=9" class="button is-info">
      <i class="fa fa-plus"></i>
    &nbsp;Nueva  Empresa</a><br>
    <div class="card">
        <div class="card-header">

         <div class="card-header-title">
                <center>
                 <h2> <strong>LISTA DE AREA DE EMPRESA</strong> </h2>
                  
                </center>
               </div>
           </div>
          <div class="card-content ">
 <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Empresa</th>
      <th>Acciones</th>
      
    </tr>
  </thead>
  <tbody>
    
     <?php 
       $empresa = $trabajo->Traer_Empresa();
       foreach ($empresa as $key => $value) {
     ?>
     <tr>
     <td><?php echo $key +1?></td>
     <td><?php echo $value["nombre"] ?></td>
     <td>
        <a href="mantenimiento.php?id=11&x=<?php echo $value["id_tipo_trabajo"] ?>&edit=empresa" class="button is-success">Editar &nbsp; <i class="fa fa-edit"></i> </a>
        <a href="mantenimiento.php?id=15&x=<?php echo $value["id_tipo_trabajo"] ?>&fu=empresa" class="button is-danger"> <i class="far fa-trash-alt"></i> &nbsp; Eliminar</a>
      </td>
      </tr>
  <?php } ?>
    

  </tbody>
</table>

</div>
 </div> 
     </div>
</div>