

<?php 
 
  if (isset($_GET["id"])) {
  	
  	if ($_GET["id"] == "6") {
  		  ?>
  		  <center>
  		  	<h3 class="texto">AGREGANDO NUEVA AREA</h3>
  		  	 </center>
  		  	<br><br>
    <form action="controladores/area.php" method="POST" style="width:50%; margin: auto;">
		<div class="field">
			<label class="label">Nombre de la Area</label>
			<div class="control">
				<input class="input" type="text" placeholder="Area" name="nombre">
				</div>
 	   </div>
		<div class="control">
                 <button class="button is-primary" name="area">Agregar Area &nbsp; <i class="fa fa-save"></i></button>
       </div>
  		  	 
  		  </form>
  		 

  		 <?php
  	}elseif ($_GET["id"] == "7") {
  		  ?>
  		  
  		  	<center>
  		  		<h3 class="texto">AGREGANDO NUEVA SUBAREA</h3>
  		  	</center>
  		  	<br><br>
    <form action="controladores/area.php" method="POST" style="width:80%; margin:auto;">
		<div class="field">
			<label class="label">Nombre de la Sub_Area</label>
			<div class="control">
				<input class="input" type="text" placeholder="sub_area" name="sub_area_nombre">
				</div>
 	   </div>

	<label class="label">Seleccione el area</label>
  <div class="control">
        <div class="select">
         <select name="area_select">
           <option value="">Seleccione Area</option>
           <?php 
            $areas = $trabajo->Traer_area();
            var_dump($areas);
            foreach ($areas as $key => $value) {
            ?>
           <option value="<?php echo $value["id_area"] ?>"><?php echo $value["nombre"]; ?></option>
       <?php } ?>
        </select>
       </div>
      </div>
 	   <br>
		<div class="control">
                 <button class="button is-primary" name="sub_area">Agregar Sub_Area &nbsp; <i class="fa fa-save"></i></button>
       </div>
  		  	 
  		  </form>
  		 
  		 <?php 
  	}elseif ($_GET["id"] == "9") {
      ?>
            <center>
          <h3 class="texto">AGREGANDO NUEVA EMPRESA</h3>
           </center>
          <br><br>
    <form action="controladores/area.php" method="POST" style="width:50%; margin: auto;">
    <div class="field">
      <label class="label">Nombre de la Empresa</label>
      <div class="control">
        <input class="input" type="text" placeholder="Area" name="empresaN">
        </div>
     </div>
    <div class="control">
                 <button class="button is-primary" name="empresa">Agregar Area &nbsp; <i class="fa fa-save"></i></button>
       </div>
           
        </form>

      <?php
    }
    
  }else{
         header('Location: ../mantenimiento.php?id=3');

  }

 ?>