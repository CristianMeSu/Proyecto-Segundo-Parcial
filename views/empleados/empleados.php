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
          
            <h1>Usuarios_empleados</h1>
            
        </div>
        <div class="col-sm-3">
            <div class="float-end">
                <a href="#" class="btn btn-primary" id="showForm">Insertar</a>
            </div>
        </div>
        <div class="vistas">
            <div clas="row vista" id="vista_principal">
                <div class="col-sm-11 offset-sm-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover " id="table-data empleados">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Puesto</th>
                                    <th>Password</th>
                                    <th>Acciones</th>
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
    <script src="../../js/empleados.js"></script>
</div>
</body>
</html>
