<?php
$id= $_GET['id'];
require_once ("../../includes/_db.php");
$consulta="SELECT * FROM usuarios WHERE id=$id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
<?php require_once("../../includes/_header.php") ?>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class= "container mt-5 " >
        <div class="row " >
        <div class="col-sm-1"></div>
        <div class=" col-sm-8 mb-3 ">
          
            <h1>Editar Usuarios</h1>
            
        </div>
            <div class="col-sm-11 offset-sm-1">
            <form action="../../includes/_functions.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre'];?>">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico *</label>
                            <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $usuario['correo'];?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" id="password" name="password" class="form-control" value="<?php echo $usuario['password'];?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono *</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $usuario['telefono'];?>">
                    <input type="hidden" name="accion" value="editar_usuario">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form> 
            </div>
        </div>
    </div>
    <?php require_once("../../includes/_sidebar.php"); ?>
    <?php require_once("../../includes/_footer.php"); ?>
</div>
</body>
</html>
