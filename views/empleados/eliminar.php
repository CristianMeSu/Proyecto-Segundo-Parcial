<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
<?php require_once("../../includes/_header.php") ?>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class= "container mt-5 " >
        <div class="row " >
        <div class="col-sm-4"></div>
        <div class=" col-sm-6 mb-1 ">
          
            <h1>Eliminar empleados</h1>
            
        </div>
        <div class="col-sm-11 ">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="alert alert-dark text-center">
                            <p>¿Desea confirmar la eliminacion del registro</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <form action="../../includes/_functions.php" method="POST">
                                <input type="hidden" name="accion" value="eliminar_empleados">
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                <input type="submit" name="" value="eliminar" class="btn btn-success">
                                <a href="./" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    <?php require_once("../../includes/_sidebar.php"); ?>
    <?php require_once("../../includes/_footer.php"); ?>
</div>
</body>
</html>
