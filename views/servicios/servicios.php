<?php
require_once ("../../includes/_db.php");

?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
<?php require_once("../../includes/_header.php") ?>
<link href="../../css/styles.css" rel="stylesheet">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class= "container mt-5 " >
        <div class="row" >
        <div class="col-sm-1"></div>
        <div class=" col-sm-8 mb-3 ">
          
            <h1>Servicios</h1>
            
        </div>
        <div class="col-sm-3">
            <div class="float-end">
                <a href="#" class="btn btn-primary" id="showForm">Insertar</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 offset-sm-1">
                <label for="ordenar" class="form-label">Ordenar por: </label>
                <select name="ordenar" class="form-control" id="ordenar">
                    <option value="" selected disabled>----- Selecciona -----</option>
                    <option value="NOM_ASC">Nombre Ascendente</option>
                    <option value="NOM_DESC">Nombre Descendente</option>
                    <option value="EMAIL_ASC">Precio Ascendente</option>
                    <option value="EMAIL_DESC">Precio Descendente</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="buscar" class="form-label">Buscar:</label>
                <input type="text" id="buscar" name="buscar" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="buscar" class="form-label">Campo:</label>
                <select type="text" id="campo" name="campo" class="form-control">
                    <option value="" selected disabled>----- Selecciona -----</option>
                    <option value="CAMP_NOM">Nombre</option>
                    <option value="CAMP_EMAIL">Precio</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Click para busqueda ordenada:</label>
                <button id="btnBuscar" class="btn btn-info">Buscar</button>
            </div>
        </div>
        <div class="vistas">
            <div clas="row vista" id="vista_principal">
                <div class="col-sm-11 offset-sm-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover " id="table-servicios">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php require_once("formulario.php") ?>
        </div>
    <?php require_once("../../includes/_sidebar.php"); ?>
    <?php require_once("../../includes/_footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/servicios.js"></script>
</div>
</body>
</html>
