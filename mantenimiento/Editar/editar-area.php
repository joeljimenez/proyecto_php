<div class="container">
	<center>
	</center>
	<a href="mantenimiento.php?id=3" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
        
      <?php 
   if (isset($_GET["edit"])) {
          
         if ($_GET["edit"] =="area") {
     $data = array('id' => $_GET["x"], 'consulta'=>"1" );
       $area = $obj->traer_un_Registro($data);
        
          	?>
	     <center>
	     	<h3 class="texto"> EDICIÓN DE AREA </h3>	
          </center>

            <form action="controladores/update/actualizar-area.php" method="POST" style="width: 70%; margin: auto;">
              <input type="hidden" value="<?php echo $_GET["x"]?>"" name="id">
         <div class="field">
                <label class="label">Ingrese Area del Trabajo</label>
                  <div class="control">
                     <input class="input" type="text" placeholder="Area del trabajo" name="area_N" value="<?php echo $area["nombre"] ?>">
                  </div>
        </div>

        <div class="field">
            <p class="control">
               <button class="button is-success" name="area">
                   Actualizar <i class="fa fa-save"></i>
               </button>
           </p>
       </div>

            </form>

          	<?php
          }elseif ($_GET["edit"] == "subarea") {
       $data1 = array('id' => $_GET["x"], 'consulta'=>"3" );
       $subarea = $obj->traer_un_Registro($data1);
      
          	?>
	    <center>
	    	<h3 class="texto"> EDICIÓN DE SUBAREA </h3>	
          </center>

          <form action="controladores/update/actualizar-area.php" method="POST" style="width: 70%; margin: auto;">
            <input type="hidden" value="<?php echo $_GET["x"]?>"" name="id">
            <div class="columns">
              <div class="column">
                 <div class="field">
                   <label class="label">Ingrese Sub Area del Trabajo</label>
                   <div class="control">
                     <input class="input" type="text" placeholder="Sub Area del trabajo" name="subarea_N" value="<?php echo $subarea["sub"] ?>">
                  </div>
                 </div>
              </div>
              <div class="column">
                <label class="label">Selecione el Area</label>
                 <div class="control">
                    <div class="select">
                        <select name="id_area" style="padding-right: 23.5em;">
                          <option value="">Seleccione Area</option>
                          <option value="<?php echo $subarea["id_area"] ?>" selected><?php echo $subarea["area"]; ?></option>
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
              </div>
            </div>

    <div class="field">
            <p class="control">
               <button class="button is-success" name="sub_area">
                   Actualizar <i class="fa fa-save"></i>
               </button>
           </p>
       </div>

            </form>

          	<?php
           }elseif ($_GET["edit"] =="empresa") {
       $data2 = array('id' => $_GET["x"], 'consulta'=>"2" );
       $empresa = $obj->traer_un_Registro($data2);
        
           ?>
	     <center>
	     	<h3 class="texto"> EDICIÓN DE EMPRESA </h3>	
          </center>
      <form action="controladores/update/actualizar-area.php" method="POST" style="width: 70%; margin: auto;">
        <input type="hidden" value="<?php echo $_GET["x"]?>"" name="id">
         <div class="field">
                <label class="label">Ingrese Nombre de Empresa</label>
                  <div class="control">
                     <input class="input" type="text" placeholder="Nombre de empresa" name="empresa_N" value="<?php echo $empresa["nombre"] ?>">
                  </div>
        </div>

        <div class="field">
            <p class="control">
               <button class="button is-success" name="empresa">
                   Actualizar <i class="fa fa-save"></i>
               </button>
           </p>
       </div>

            </form>
          	<?php
          }}else{
     header('Location: mantenimiento.php?id=3');
          }
 ?>
 </div>