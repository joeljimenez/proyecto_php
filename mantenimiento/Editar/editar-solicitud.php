 
<div class="container">
	<center>
	 <h3 class="texto"> EDICIÓN DE SOLICITUD DE INFOMRMACIÓN </h3>	
	</center>
	<a href="mantenimiento.php?id=4" class="button is-warning"><i class="fas fa-angle-left"></i>&nbsp;ATRAS</a>
      <?php 
       
       $info = $obj->traer_un_Info($_GET["x"]);
       //var_dump($info);
       ?>
       <form action="controladores/update/actualizar-solicitud.php" method="POST">
     <input type="hidden" name="id_solicitud" value="<?php echo $_GET["x"]?>">

       	<div class="columns">
       		<div class="column">
               <div class="field">
                 <label class="label">Email</label>
                 <div class="control">
                   <input class="input" type="email" placeholder="email" value="<?php echo $info["email"] ?>" name="email">
                 </div>
               </div>
       		</div>

       		<div class="column">
              <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                  <input class="input" type="text" placeholder="nombre" value="<?php echo $info["nombre"] ?>" name="nombre">
                </div>
              </div>		
       		</div>
       </div>

       		<div class="columns">
       		<div class="column">
                 <div class="field">
                  <label class="label">Estado</label>
                   <?php 
                         if ($info["estado"] =="0") {
                          $estado = "En Espera";
                         }else{
                           $estado = "Respondido";
                         }
                       ?>
                  <div class="control">
                    <div class="select">
                      <select style="padding-right: 14.5em;"  name="estado">
                        <option value="<?php echo $info["estado"] ?>"><?php echo $estado ?></option>
                        <option value=""> Seleccione Estado</option>
                        <option value="0"> En Espera</option>
                        <option value="1"> Respondido</option>
                      </select>
                    </div>
                  </div>
                </div>
       		</div>
       	    <div class="column">
                 <div class="field">
                   <label class="label">Pregunta</label>
                   <div class="control">
                     <textarea class="textarea" placeholder="Pregunta del usuario" name="pregunta"> <?php echo $info["pregunta"] ?></textarea>
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