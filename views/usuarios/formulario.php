
    <div class="row vista" id="vista_edicion">
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
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono *</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control">
                            <input type="hidden" name="accion" value="insertar_usuarios">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
