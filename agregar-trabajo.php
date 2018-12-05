
<center>
<h3 class="texto">AGREGAR UN NUEVO EMPLEO</h3>
</center>

<br>
<form action="controladores/trabajo.php" method="POST" style="width:50%; margin:auto;">


	<div class="columns is-movil">
		<div class="column">
			<!-- area -->
	 <label class="label">Seleccione el area</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="id_area">
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
		</div>
		<div class="column">
<!-- sub area -->
<label class="label">Seleccione el Sub Area</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="id_sub_area">
           <option value="">Seleccione SubArea</option>
           <?php 
            $subarea = $trabajo->Traer_sub_area();
             
            foreach ($subarea as $key => $value) {
            ?>
           <option value="<?php echo $value["id_sub"] ?>"><?php echo $value["subarea"]; ?></option>
       <?php } ?>
        </select>
       </div>
      </div>	
		</div>
	</div>
 
<div class="columns is-movil">
	  <div class="column">
	  	
	  </div>
	  <div class="column">
	  	
	  </div>
</div>

<div class="columns is-movil">
	  <div class="column">
      <!-- provincia -->

  <label class="label">Seleccione Ubicacion del trabajo</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="id_provincia">
           <option value="">Seleccione Provincia</option>
           <?php 
            $provincia = $obj->Traer_Provincia();
             
            foreach ($provincia as $key => $value) {
            ?>
           <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"]; ?></option>
       <?php } ?>
        </select>
       </div>
      </div>

	  </div>
	  <div class="column">
	  	<label class="label">Nombre de la Empresa</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="id_tipo_trabajo">
           <option value="">Seleccione Empresa</option>
            <?php 
            $empresa = $trabajo->Traer_Empresa();
             
            foreach ($empresa as $key => $value) {
            ?>
           <option value="<?php echo $value["id_tipo_trabajo"] ?>"><?php echo $value["nombre"]; ?></option>
       <?php } ?>
          
        </select>
       </div>
      </div>
	  </div>
</div>

<div class="columns is-movil">
	 <div class="column">
      <label class="label">Nivel Laboral</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="nivel_laboral">
           <option value="Seleccione Nivel">Seleccione Nivel</option>
           <option value="Seni/ Semi Senio">Seni/ Semi Senior</option>
           <option value="Junior">Junior</option>
           <option value="Jefe / Supervisor">Jefe / Supervisor</option>
           <option value="Gerencia">Gerencia</option>
          
        </select>
       </div>
      </div>	 	
	 </div>
	 <div class="column">
            <label class="label">Tipo de Puesto</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="tipo_empleo">
           <option value="">Seleccione Puesto</option>
           <option value="Full - Time">Full - Time</option>
           <option value="Part - Time">Part - Time</option>
           <option value="Temporario">Temporario</option>
           <option value="PasaTiempo">PasaTiempo</option>
           <option value="Por Contrato">Por Contrato</option>
        </select>
       </div>
      </div>	 	
	 </div>
</div>
<div class="columns">
	<div class="column">
<div class="field">
  <label class="label">Descripción del trabajo</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea" name="descripcion"></textarea>
  </div>
</div>
	</div>
	<div class="column">
    <div class="field">
  <label class="label">Salario</label>
  <div class="control">
      <input class="input" type="number" placeholder="Salario Ofrecido" name="salario">
    </div>
       </div>	
	</div>
</div>
  
     <br>
		<div class="control">
                 <button class="button is-primary" name="enviar">Agregar Sub_Area &nbsp; <i class="fa fa-save"></i></button>
       </div>
  		  	 
  		  </form>
