
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
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" id="precio" name="precio" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="accion" value="insertar_servicios">
                        </div>
                        <div class="mb-3">
                        <button type="button" class="btn btn-success" id="btnSubmit">Guardar</button>
                        </div>
                    </form>    
                </div>
            
        </div>
    </div>
