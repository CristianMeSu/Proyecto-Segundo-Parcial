
     <div class="row vista" id="vista_edicion">
        <div class="col-sm-11 offset-sm-1">
                <div class="col-sm-6 offset-3 mt-6">
                    <form action="../../includes/_functions.php" method="POST" id="form">
                        <div class="row">
                            <div class="mb-3">
                                <label for="id" class="form-label">Id *</label>
                                <input type="text" id="id" name="id" class="form-control">
                            </div>
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
                                    <label for="tipo" class="form-label">Tipo *</label>
                                    <input type="text" id="tipo" name="tipo" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status *</label>
                                    <input type="text" id="status" name="status" class="form-control">
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
