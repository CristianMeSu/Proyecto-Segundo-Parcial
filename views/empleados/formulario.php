
     <div class="row vista" id="vista_edicion">
        <div class="col-sm-11 offset-sm-1">
                <div class="col-sm-6 offset-3 mt-6">
                    <form action="../../includes/_functions.php" method="POST" id="form">
                        <div class="row">
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="text" id="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                <label for="empleado" class="form-label">Empleado *</label>
                                    <select id="empleado" name="empleado" class="form-control">
                                        <option value="1" selected>--Seleccione--</option>
                                        <?php
                                        $sql="SELECT * FROM rol";
                                        $empleado = mysqli_query($conexion, $sql);

                                        if($empleado ->num_rows > 0)
                                        {
                                            foreach($empleado as $key => $row)
                                            {
                                        ?>  

                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['puesto'] ?></option>

                                            <?php 
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="accion" value="insertar_empleados">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
