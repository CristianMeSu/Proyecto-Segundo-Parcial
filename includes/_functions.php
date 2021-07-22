<?php
//conectar a la DB
require_once '_db.php';
if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
        
        case 'login_usuarios':
            login_usuarios();
            break;
        case 'select_visitas':
            select_visitas();
            break;
        case 'consultar_visitas':
            consultar_visitas();
            break;
        case 'insertar_visitas':
            insertar_visitas();
            break;
        case 'eliminar_visitas':
            eliminar_visitas();
            break;
        case 'editar_visitas':
            editar_visitas();
            break;
        case 'select_servicios':
            select_servicios();
            break;
        case 'consultar_servicios':
            consultar_servicios();
            break;
        case 'insertar_servicios':
            insertar_servicios();
            break;
        case 'eliminar_servicios':
            eliminar_servicios();
            break;
        case 'editar_servicios':
            editar_servicios();
            break;
    } 
}

elseif($id_login=1){
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();
}

function login_usuarios(){

    session_start();
    global $conexion;
    extract($_POST);
    $sql = "SELECT * from empleados WHERE correo='$correo' and password='$password' ";
    $resultado = mysqli_query($conexion, $sql);
    $array= mysqli_fetch_array($resultado);
    if (mysqli_num_rows($resultado)>0){
        $_SESSION ['username']=$array['nombre'];
        header("Location: ../views/usuarios/");

    }
    else{
        echo "Datos incorrectos";
    }
}
function consultar_visitas(){
    global $conexion;
    $id = $_POST['id'];
    $consulta = "SELECT * FROM visitas WHERE id = $id";
    $resultado = mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_assoc($resultado);
    $data = [
        "cliente" => $row['cliente_id'],
        "servicio" => $row['servicio_id'],
        "empleado" => $row['empleado_id'],
        "registro" => $row['registro'],
        "id" => $row['id'],
        
    ];
    echo json_encode($data);
   
};
function select_visitas(){
    global $conexion;
    $consulta = "SELECT c.nombre as cliente, e.nombre as empleado, s.nombre as servicio, v.id, v.registro, v.cita FROM visitas v
    LEFT JOIN clientes c ON c.id = v.cliente_id
    LEFT JOIN empleados e ON e.id = v.empleado_id
    LEFT JOIN servicios s ON s.id = v.servicio_id order by v.cita asc;";
    $resultado = mysqli_query($conexion,$consulta);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($resultado)){
        $data[] = [
            "cliente" => $row['cliente'],
            "empleado" => $row['empleado'],
            "servicio" => $row['servicio'],
            "registro" => $row['registro'],
            "cita" => $row['cita'],
            "id" => $row['id'],
                

        ];
    }
    echo json_encode($data);
   
};
function insertar_visitas(){
    global $conexion;
    extract($_POST);
    $consulta = "INSERT INTO visitas (cliente_id, servicio_id, empleado_id, cita) 
    values ('$cliente', '$servicio', '$empleado', CURDATE()+ INTERVAL 30 DAY) ";
    $respuesta = [
        'type' => 'success',
        'title' => 'Operación exitosa',
        'text' => 'Se ha insertado correctamente el registro'
    ];
    
    if(!mysqli_query($conexion, $consulta)){
        $respuesta = [
            'type' => 'error',
            'title' => 'Operación fallida',
            'text' => mysqli_error($conexion)
        ];
    } 
    echo json_encode($respuesta);      
};
function eliminar_visitas(){
    global $conexion;
    extract($_POST);
    $consulta="DELETE FROM visitas WHERE id=$id";
    mysqli_query($conexion,$consulta);
    $respuesta = [
        'type' => 'error',
        'title' => 'Operación fallida',
        'text' => mysqli_error($conexion)
    ];
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = [
            'type' => 'success',
            'title' => 'Operación exitosa',
            'text' => 'Se ha eliminado correctamente la visita'
        ];
    };
    echo json_encode($respuesta);
};
function editar_visitas(){
    global $conexion;
    extract($_POST);
    $consulta="UPDATE visitas SET cliente='$cliente',servicio='$servicio',empleado='$empleado',
    registro='$registro'  WHERE id=$id";
    mysqli_query($conexion,$consulta);
    $respuesta = [ 
        'type' => 'error',
        'title' => 'Operación fallida',
        'text' => mysqli_error($conexion)
    ];
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = [
            'type' => 'success',
            'title' => 'Operación exitosa',
            'text' => 'Se ha editado correctamente el producto'
            
        ];
    };
    echo json_encode($respuesta);
}
function consultar_servicios(){
    global $conexion;
    $id = $_POST['id'];
    $consulta = "SELECT * FROM servicios WHERE id = $id";
    $resultado = mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_assoc($resultado);
    $data = [
        "nombre" => $row['nombre'],
        "precio" => $row['precio'],
        "id" => $row['id'],
        
    ];
    echo json_encode($data);
   
};
function select_servicios(){
    global $conexion;
    $consulta = "SELECT * FROM servicios";
    $resultado = mysqli_query($conexion,$consulta);
    $data = [];
    while ($row = mysqli_fetch_assoc($resultado)){
        $data[] = [
            "nombre" => $row['nombre'],
            "precio" => $row['precio'],
            "id" => $row['id'],
        ];
    }
    echo json_encode($data);
   
};
function insertar_servicios(){
    global $conexion;
    extract($_POST);
    $consulta = "INSERT INTO servicios (nombre, precio) 
    values ('$nombre', '$precio')";
    $respuesta = [
        'type' => 'success',
        'title' => 'Operación exitosa',
        'text' => 'Se ha insertado correctamente el registro'
    ];
    
    if(!mysqli_query($conexion, $consulta)){
        $respuesta = [
            'type' => 'error',
            'title' => 'Operación fallida',
            'text' => mysqli_error($conexion)
        ];
    } 
    echo json_encode($respuesta);      
};
function eliminar_servicios(){
    global $conexion;
    extract($_POST);
    $consulta="DELETE FROM servicios WHERE id=$id";
    mysqli_query($conexion,$consulta);
    $respuesta = [
        'type' => 'error',
        'title' => 'Operación fallida',
        'text' => mysqli_error($conexion)
    ];
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = [
            'type' => 'success',
            'title' => 'Operación exitosa',
            'text' => 'Se ha eliminado correctamente el servicio'
        ];
    };
    echo json_encode($respuesta);
};
function editar_servicios(){
    global $conexion;
    extract($_POST);
    $consulta="UPDATE servicios SET nombre='$nombre',precio='$precio' WHERE id=$id";
    mysqli_query($conexion,$consulta);
    $respuesta = [ 
        'type' => 'error',
        'title' => 'Operación fallida',
        'text' => mysqli_error($conexion)
    ];
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = [
            'type' => 'success',
            'title' => 'Operación exitosa',
            'text' => 'Se ha editado correctamente el producto'
            
        ];
    };
    echo json_encode($respuesta);
}
?>
