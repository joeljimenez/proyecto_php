<div class="container">
	<center>
	 <h3 class="texto"> EDICIÓN DE USUARIOS </h3>	
	</center>
	<a href="mantenimiento.php?id=1" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
        

      <?php 
       
       $usuario = $obj->traer_un_Usuario($_GET["x"]);
     //  var_dump($usuario);
       ?>
       <br>
       <hr>
       <form action="controladores/update/actualizar-usuario.php" method="POST" accept-charset="utf-8" style="padding-right:30.80emwidth:80%; margin: auto;">
       <input type="hidden" name="id_usuario" value="<?php echo $_GET["x"] ?>">
        <div class="columns">
        	<div class="column">
				<div class="field">
				<label class="label">Nombre</label>
				<div class="control">
				<input class="input" type="text" placeholder="Ingrese Su nombre" value="<?php echo $usuario["nombre"] ?>" name="nombre" required >
				</div>
				</div>
        	</div>

        	<div class="column">
				<div class="field">
				<label class="label">Apellido</label>
				<div class="control">
				<input class="input" type="text" placeholder="Ingrese su Apellido" value="<?php echo $usuario["apellido"] ?>" name="apellido" required >
				</div>
				</div>
        	</div>
        </div>
        <div class="columns">
        	<div class="column">
				<div class="field">
				<label class="label">Corro Electronico</label>
				<div class="control">
				<input class="input" type="email" placeholder="Ingrese Su Correo" value="<?php echo $usuario["correo"] ?>" name="email" required >
				</div>
				</div>
        	</div>

        	<div class="column">
				<div class="field">
				<label class="label">Puesto</label>
				<div class="control">
				<input class="input" type="text" placeholder="Ingrese su Puesto" value="<?php echo $usuario["puesto"] ?>" name="puesto" required >
				</div>
				</div>
        	</div>
        </div>

        <div class="columns">
        	<div class="column">
        		<?php 
        		if ($usuario["activo"] =="1") {
        		 	$estado = "Habilitado";
        		 }else{
        		 	$estado = "DesHabilitado";

        		 } ?>
               <div class="control">
               	<label class="label">Seleccione El estado</label>
                <div class="select">
                  <select name="estado" style="padding-right:30.80em">
                    <option value="<?php echo $usuario["activo"] ?>" selected><?php echo $estado ?></option>
                    <option value="0">DesHabilitado</option>
                    <option value="1">Habilitado</option>
                    option
                  </select>
                </div>
              </div>			 
        	</div>

        	<div class="column">
               <div class="control">
               	<label class="label">Seleccione El Provincia</label>
                <div class="select">
                      <select name="provincia" style="padding-right:30.80em">
                         <option selected value="<?php echo $usuario["id_pro"] ?>"><?php echo $usuario["provincia"] ?></option>
                         <?php 
                        $resultado = $obj->Traer_Provincia();
                        foreach ($resultado as $key => $value) {
                     ?>
                         <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>

                     <?php
                        }
                          ?>
                      </select>
                  </div>
              </div>
                
           </div>
        	</div>

        <div class="columns">
        	<div class="column">
 

        <div class="control">
               	<label class="label">Seleccione El Sexo</label>
                <div class="select">
                      <select name="sexo" style="padding-right:30.80em">
                         <option selected value="<?php echo $usuario["id_s"] ?>"><?php echo $usuario["sexo"] ?></option>
                         <?php 
                 
                        $obj = new Usuario();
                        $resultado = $obj->Traer_Sexo();
                        foreach ($resultado as $key => $value) {
                     ?>
                         <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>

                     <?php
                        }
                          ?>
                      </select>
                  </div>
              </div>
          			 
        </div>

        	<div class="column">
               <div class="control">
               	<label class="label">Seleccione Tipo de Usuario</label>
                <div class="select">
                      <select name="tipo_usuario" style="padding-right:30.80em">
                      	<option value="<?php echo $usuario["tipo"] ?>" selected><?php echo $usuario["usuario"] ?></option>}
                         <?php 
                        $tipo = $obj->traer_tipo_usuario();
                        foreach ($tipo as $key => $value) {
                     ?>
                         <option value="<?php echo $value["id_tipo"] ?>"><?php echo $value["nombre"] ?></option>

                     <?php
                        }
                          ?>
                      </select>
                  </div>
              </div>
                
           </div>
        	</div>
        	<div class="field">
        <p class="control">
                <button class="button is-success" name="enviar">
                       Actualizar  <i class="fa fa-save"></i>
                </button>
        </p>
</div>
   </form>
        </div>
      
 </div>