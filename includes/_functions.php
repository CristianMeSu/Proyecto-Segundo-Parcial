<?php
//conectar a la DB
require_once '_db.php';
if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
        
        case 'login_usuarios':
            login_usuarios();
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
    $sql = "SELECT * from usuarios WHERE correo='$correo' and password='$password' ";
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
?>