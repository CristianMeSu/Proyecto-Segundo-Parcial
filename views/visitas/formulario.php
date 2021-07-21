
    <div class="row vista" id="vista_edicion">
        <div class="col-sm-11 offset-sm-1">
            
                <div class="col-sm-6 offset-3 mt-6">
                    <form action="../../includes/_functions.php" method="POST" id="form">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Cliente *</label>
                            <input type="text" id="cliente" name="cliente" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Servicio</label>
                                    <input type="email" id="servicio" name="servicio" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Empleado *</label>
                                    <input type="password" id="empleado" name="empleado" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Registro</label>
                            <input type="tel" id="registro" name="registro" class="form-control">
                            <input type="hidden" name="accion" value="insertar_visitas">
                        </div>
                        <div class="mb-3">
                        <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
