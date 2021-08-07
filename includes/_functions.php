<?php
//conectar a la DB
require_once '_db.php';
if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
        
        case 'login_usuarios':
        login_usuarios();
        break;
        case 'select_empleados':
            select_empleados();
            break;
        case 'consultar_empleados':
            consultar_empleados();
            break;
        case 'insertar_empleados':
            insertar_empleados();
            break;
        case 'eliminar_empleados':
            eliminar_empleados();
            break;
        case 'editar_empleados':
            editar_empleados();
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
        case 'select_clientes':
            select_clientes();    
            break;
        case 'editar_clientes':
            editar_clientes();
            break;
        case 'insertar_clientes':
            insertar_clientes();
            break;
        case 'eliminar_clientes':
            eliminar_clientes();
            break;
        case 'consultar_clientes':
            consultar_clientes();
        case 'mostrar_servicios':
            mostrar_servicios();
    } 
}

elseif($id_login=1){
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
elseif($id_login=2){
    global $conexion;
    extract($_POST);
    $consulta="UPDATE empleados SET status='1' WHERE id=$id";
    mysqli_query($conexion,$consulta);
    
}

function login_usuarios(){

    session_start();
    global $conexion;
    extract($_POST);
    $sql = "SELECT * from empleados WHERE email='$correo' and password='$password' and status='1' ";
    $resultado = mysqli_query($conexion, $sql);
    $array= mysqli_fetch_array($resultado);
    if (mysqli_num_rows($resultado)>0){
        $_SESSION ['username']=$array['nombre'];
        header("Location: ../views/empleados/");

    }
    else{
        echo "Datos incorrectos";
    }
}
function consultar_empleados(){
    global $conexion;
    $id = $_POST['id'];
    $consulta = "SELECT * FROM empleados WHERE id = $id";
    $resultado = mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_assoc($resultado);
    $data = [
        "nombre" => $row['nombre'],
        "email" => $row['email'],
        "password" => $row['password'],
        "tipo" => $row['tipo'],
        "status" => $row['status'],
        "id" => $row['id'],  
    ];
    echo json_encode($data);
};
function select_empleados(){
    global $conexion;
    $consulta = "SELECT e.id, e.nombre , e.email, e.`password`, r.puesto as tipo 
    FROM empleados e left join rol r on r.id = e.tipo";
    $resultado = mysqli_query($conexion,$consulta);
    $data = [];
    while ($row = mysqli_fetch_assoc($resultado)){
        $data[] = [
        "nombre" => $row['nombre'],
        "email" => $row['email'],
        "password" => $row['password'],
        "tipo" => $row['tipo'],
        "id" => $row['id'],
        ];
    }
    echo json_encode($data);
};

function insertar_empleados(){
    global $conexion;
    extract($_POST);
    $consulta = "INSERT INTO municipios ( nombre , estado ) 
    values ( '$nombre' , '$estado' )";
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

    $to      = $email; // Enviar Email al usuario
    $subject = 'Signup | Verification'; // Darle un asunto al correo electrónico
    $message = '
        Gracias por registrarte!
        Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
        
        ------------------------
        Nombre: '.$nombre.'
        Correo: '.$email.'
        Password: '.$password.'
        ------------------------
        
        Por favor haz clic en este enlace para activar tu cuenta:
        http://localhost/Proyecto-Segundo-Parcial/includes/_functions.php?id_login=2&id='.$id.'
        
        '; // Aqui se incluye la URL para ir al mensaje
    $headers = 'From:noreply@proyectosegundoparcial.com' . "\r\n"; // Colocar el encabezado
    mail($to, $subject, $message, $headers); // Enviar el correo electrónico    
};
function eliminar_empleados(){
    global $conexion;
    extract($_POST);
    $consulta="DELETE FROM empleados WHERE id=$id";
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
    }
    echo json_encode($respuesta);
    
};
function editar_empleados(){
    global $conexion;
    extract($_POST);
    $consulta="UPDATE empleados SET nombre='$nombre',email='$email', password='$password', tipo='$tipo', status='$status' WHERE id=$id";
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
    $consulta = "SELECT c.nombre as cliente, e.nombre as empleado, s.nombre as servicio, v.id, v.registro, v.cita, DATEDIFF(v.cita ,CURDATE()) as 	 DateDif FROM visitas v
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
            "date" => $row['DateDif'],
                

        ];
    }
    echo json_encode($data);
   
};
function insertar_visitas(){
    global $conexion;
    extract($_POST);
    $consulta = "INSERT INTO visitas (cliente_id, servicio_id, empleado_id, cita) 
    values ('$cliente', '$servicio', '$empleado', CURDATE()+ INTERVAL 30 DAY) ";
    $consulta2 = "UPDATE clientes SET status = status+1 WHERE id= $cliente;";
    mysqli_query($conexion, $consulta2);
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
function consultar_clientes(){
    global $conexion;
    $id = $_POST['id'];
    $consulta = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_assoc($resultado);
    $data = [
        "nombre" => $row['nombre'],
        "correo" => $row['correo'],
        "telefono" => $row['telefono'],
        "direccion" => $row['direccion'],
        "registro" => $row['registro'],
        "status" => $row['status'],
        "id" => $row['id'],
    ];
    echo json_encode($data);
}
function select_clientes(){
    global $conexion;
    $consulta = "SELECT * FROM clientes ";
    $resultado = mysqli_query($conexion,$consulta);
    $data = [];
    while ($row = mysqli_fetch_assoc($resultado)){ 
        $data[] = [
            "nombre" => $row['nombre'],
            "correo" => $row['correo'],
            "telefono" => $row['telefono'],
            "direccion" => $row['direccion'],
            "registro" => $row['registro'],
            "status" => $row['status'],
            "id" => $row['id'],
        ];
    };
    echo json_encode($data);
};
function insertar_clientes(){
    global $conexion;
    extract($_POST);
    $consulta_duplicado="SELECT * FROM clientes WHERE nombre='$nombre' and correo='$correo' and telefono='$telefono' and direccion='$direccion' and registro='$registro
     and status='$status'";
    $resultado = mysqli_query($conexion, $consulta_duplicado);
    if (mysqli_num_rows($resultado)>0) {
        echo "
    <p class='avisos'>El nombre del cliente ya esta registrado</p>
    <p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p>
    ";
    }
    else{
        $consulta = "INSERT INTO clientes (nombre, correo, telefono, direccion, registro, status) values ('$nombre', '$correo', '$telefono', '$direccion', '$registro', '$status')";
        $respuesta = [
            'type' => 'success',
            'title' => 'Operación exitosa',
            'text' => 'Se ha insertado correctamente el registro del cliente'
        ];
        if(!mysqli_query($conexion, $consulta)){
            $respuesta = [
                'type' => 'error',
                'title' => 'Operación fallida',
                'text' => mysqli_error($conexion)
            ];
        }
        echo json_encode($respuesta);       
    }
};
function editar_clientes(){
    global $conexion;
    extract($_POST);
    //crear una cadena de texto para UPDATE
    $consulta = "UPDATE clientes SET nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion',
     registro='$registro', status='$status' WHERE id=$id";
    //ejecutar la consulta
    mysqli_query($conexion, $consulta);
    $respuesta = [
        'type' => 'success',
        'title' => 'Operación exitosa',
        'text' => 'Se ha editado correctamente el registro del cliente'
        ];
    if(mysqli_affected_rows($conexion) > 0){
        $respuesta = [
            'type' => 'error',
            'title' => 'Operación fallida',
            'text' => mysqli_error($conexion)
        ];
    };
    echo json_encode($respuesta);
    
}
function eliminar_clientes(){
    global $conexion;
    $id=$_POST['id'];
    $consulta="DELETE FROM clientes WHERE id= $id";
    mysqli_query($conexion,$consulta);
    $respuesta = [
        'type' => 'success',
        'title' => 'Operación exitosa',
        'text' => 'Se ha eliminado correctamente el registro del cliente'
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
function mostrar_servicios(){
    global $conexion;
    $id=$_POST['id'];
    $consulta="SELECT c.nombre as cliente,  s.nombre as servicio, v.registro FROM visitas v
    LEFT JOIN clientes c ON c.id = v.cliente_id
    LEFT JOIN servicios s ON s.id = v.servicio_id WHERE v.cliente_id=$id order by v.registro desc";
    $resultado = mysqli_query($conexion,$consulta);
    $data = [];
    while ($row = mysqli_fetch_assoc($resultado)){ 
        $data[] = [
            "cliente" => $row['cliente'],
            "servicio" => $row['servicio'],
            "registro" => $row['registro']
        ];
    };
    echo json_encode($data);
};
?>
