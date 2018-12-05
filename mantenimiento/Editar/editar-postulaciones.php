<div class="container">
	<center>
	 <h3 class="texto"> EDICIÓN DE POSTULACIÓNES DE USUARIOS </h3>	
	</center>
	<a href="mantenimiento.php?id=5" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
      <?php 
            $data = array('consulta' => 4, 
                       'id_area' => "",
                       'id_sub_area' => "",
                       'id_usuario' => "",
                       'salario' => "",
                       'funcion' => "1",
                        'id' => $_GET["x"] );
                  $res = $obj->Postulaciones($data);
                //var_dump($res);
       foreach ($res as $key => $value) {
  
       ?>

              <form action="controladores/update/actualizar-postulacion.php" method="POST">
     <input type="hidden" name="id_postulacion" value="<?php echo $_GET["x"]?>">

        <div class="columns">
          
          <div class="column">
              <div class="field">
                <label class="label">Area del Trabajo</label>
                <div class="control">
                  <input class="input" type="hidden" placeholder="nombre" value="<?php echo $value["id_area_p"] ?>" name="id_area">
                  <input class="input" type="text" placeholder="nombre" value="<?php echo $value["area"] ?>" name="area" disabled>
                </div>
              </div>    
          </div>
          

          <div class="column">
              <div class="field">
                <label class="label">Nombre del trabajo</label>
                <div class="control">
                  <input class="input" type="hidden" placeholder="nombre" value="<?php echo $value["id_sub_area"] ?>" name="id_sub_area">
                  <input class="input" type="text" placeholder="nombre" value="<?php echo $value["subarea"] ?>" name="sub" disabled>
                </div>
              </div>    
          </div>
       </div>

               <div class="columns">
          
          <div class="column">
              <div class="field">
                <label class="label">Usuario Postulado</label>
                <div class="control">
                  <input class="input" type="hidden" placeholder="nombre" value="<?php echo $value["id_usuario_P"] ?>" name="id_usuario">
                  <input class="input" type="text" placeholder="nombre" value="<?php echo $value["usuario"] ?>" name="usu" disabled>
                </div>
              </div>    
          </div>
          

          <div class="column">
              <div class="field">
                <label class="label">Salario de postulación</label>
                <div class="control">
                  <input class="input" type="hidden" placeholder="nombre" value="<?php echo $value["salario"] ?>" name="salario">
                  <input class="input" type="text" placeholder="nombre" value="<?php echo $value["salario"] ?>" name="sa" disabled>
                </div>
              </div>    
          </div>
       </div>
 <div class="columns">
          
          <div class="column">
             <div class="field">
                  <div class="control">
                <label class="label">Estado de la Postulacion</label>

                    <div class="select">
                      <select name="estado">
                        <option value="">Seleccionar estado</option>
                        <option value="<?php echo $value["estado"] ?>" selected><?php echo $value["estado"] ?></option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Respondida">Respondida</option>
                      </select>
                    </div>
                  </div>
                </div>
          </div>
 </div>
 <?php } ?>
     <br>
    <div class="control">
       <button class="button is-primary" name="enviar">Actualizar &nbsp; <i class="fa fa-save"></i></button>
       </div>
         
 
       </form>
 </div>