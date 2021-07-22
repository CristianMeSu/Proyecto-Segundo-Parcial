<div class="row vista_" id="vista_edicion_">
        <div class="col-sm-11 offset-sm-1">
            
                <div class="col-sm-6 offset-3 mt-6">
                    <form action="../../includes/_functions.php" method="POST" id="form">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico *</label>
                                    <input type="email" id="correo" name="correo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono *</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control">
                            <input type="hidden" name="accion" value="insertar_usuarios">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion *</label>
                            <input type="text" id="direccion" name="direccion" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="registro" class="form-label">Registro *</label>
                                    <input type="date" id="registro" name="registro" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <input type="null" id="status" name="status" class="form-control">
                            <input type="hidden" name="accion" value="insertar_clientes">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
