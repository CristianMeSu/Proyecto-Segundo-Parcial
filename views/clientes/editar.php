<?php
$id= $_GET['id'];
require_once ("../../includes/_db.php");
$consulta="SELECT * FROM clientes WHERE id=$id";
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
          
            <h1>Editar Clientes</h1>
            
        </div>
            <div class="col-sm-11 offset-sm-1">
            <form action="../../includes/_functions.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $cliente['nombre'];?>">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico *</label>
                            <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $cliente['correo'];?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono *</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $cliente['telefono'];?>">
                    
                </div>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion *</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $cliente['direccion'];?>">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="registro" class="form-label">Registro *</label>
                            <input type="date" id="registro" name="registro" class="form-control" value="<?php echo $cliente['registro'];?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <input type="text" id="status" name="status" class="form-control" value="<?php echo $cliente['status'];?>">
                        <input type="hidden" name="accion" value="editar_clientes">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        </div>
                    </div>
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
