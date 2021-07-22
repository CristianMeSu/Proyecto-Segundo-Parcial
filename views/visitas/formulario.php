
    <div class="row vista" id="vista_edicion">
        <div class="col-sm-11 offset-sm-1">
            
                <div class="col-sm-6 offset-3 mt-6">
                    <form action="../../includes/_functions.php" method="POST" id="form">
                        <div class="mb-3">
                            
                            <label for="cliente" class="form-label">Cliente *</label>
                            <select id="cliente" name="cliente" class="form-control">
                                <option value="1" selected>--Seleccione--</option>
                                <?php
                                $sql="SELECT * FROM clientes";
                                $cliente = mysqli_query($conexion, $sql);

                                if($cliente ->num_rows > 0)
                                {
                                    foreach($cliente as $key => $row)
                                    {
                                ?>  

                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>

                                    <?php 
                                    }
                                }?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="servicio" class="form-label">Servicio *</label>
                                    <select id="servicio" name="servicio" class="form-control">
                                        <option value="1" selected>--Seleccione--</option>
                                        <?php
                                        $sql="SELECT * FROM servicios";
                                        $servicio = mysqli_query($conexion, $sql);

                                        if($servicio ->num_rows > 0)
                                        {
                                            foreach($servicio as $key => $row)
                                            {
                                        ?>  

                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>

                                            <?php 
                                            }
                                        }?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="empleado" class="form-label">Empleado *</label>
                                    <select id="empleado" name="empleado" class="form-control">
                                        <option value="1" selected>--Seleccione--</option>
                                        <?php
                                        $sql="SELECT * FROM empleados";
                                        $empleado = mysqli_query($conexion, $sql);

                                        if($empleado ->num_rows > 0)
                                        {
                                            foreach($empleado as $key => $row)
                                            {
                                        ?>  

                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>

                                            <?php 
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            
                            
                            <input type="hidden" name="accion" value="insertar_visitas">
                        </div>
                        <div class="mb-3">
                        <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
