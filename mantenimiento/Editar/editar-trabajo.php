<div class="container">
	<center>
	 <h3 class="texto"> EDICIÓN DE TRABAJO </h3>	
	</center>
	<a href="mantenimiento.php?id=2" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
        

      <?php 
       
       $traba = $trabajo->traer_un_trabajo($_GET["x"]);
       //var_dump($traba);
       ?>
       <br>
       <hr>
       <form action="controladores/update/actualizar-trabajo.php" method="POST" style="width:70%; margin:auto;">
       <input type="hidden" name="id_trabajo" value="<?php echo $_GET["x"] ?>"> 
       <div class="columns is-movil">
         <div class="column">
			<!-- area -->
	         <label class="label">Seleccione el area</label>
              <div class="control">
                   <div class="select">
                     <select required style="padding-right: 14.5em;" name="id_area">
                       <option value="">Seleccione Area</option>
                       <option value="<?php echo $traba["id_area"] ?>" selected><?php echo $traba["area"]; ?></option>
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
             <option value="<?php echo $traba["id_sub"] ?>" selected><?php echo $traba["subarea"]; ?></option>

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

  <div class="columns is-movil" n>
    <div class="column">
      <!-- provincia -->

  <label class="label">Seleccione Ubicacion del trabajo</label>
  <div class="control">
        <div class="select">
         <select required style="padding-right: 14.5em;" name="id_provincia">
           <option value="">Seleccione Provincia</option>
           <option value="<?php echo $traba["id_prov"] ?>" selected><?php echo $traba["provincia"] ?></option>
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
           <option value="<?php echo $traba["id_tipo_trabajo"] ?>" selected><?php echo $traba["empresa"] ?></option>
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
           <option value="<?php echo $traba["nivel_laboral"] ?>" selected><?php echo $traba["nivel_laboral"] ?></option>
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
           <option value="<?php echo $traba["tipo_empleo"] ?>" selected><?php echo $traba["tipo_empleo"] ?></option>
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
    <textarea class="textarea" placeholder="Textarea" name="descripcion">
      <?php echo $traba["descripcion"] ?>
    </textarea>
  </div>
</div>
  </div>
  <div class="column">
    <div class="field">
  <label class="label">Salario</label>
  <div class="control">
      <input class="input" type="number" placeholder="Salario Ofrecido" name="salario"value="<?php echo $traba["salario"] ?>">
    </div>
       </div> 
  </div>
</div>
     <br>
    <div class="control">
       <button class="button is-primary" name="enviar">Actualizar &nbsp; <i class="fa fa-save"></i></button>
       </div>
   </form>
 </div>