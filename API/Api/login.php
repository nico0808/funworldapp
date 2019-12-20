<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev=array();

switch ($metodo) {
    case 'POST':

        $user = filter_input(INPUT_POST, "User");
        $password = filter_input(INPUT_POST, "Password");


        $consultaLoguearse = "SELECT * FROM `usuarios` WHERE `User` LIKE '$user' AND `Password` LIKE '$password'";
        $resultadoLoguearse = mysqli_query($db, $consultaLoguearse);

        $cantidad = mysqli_num_rows($resultadoLoguearse);

        if ($cantidad === 1) {
            $datosUsuario = mysqli_fetch_array($resultadoLoguearse);
            $dev["User"] = $datosUsuario["User"];
            $dev["Token"]  = $datosUsuario["Token"];
            $dev["IDUsuario"]  = $datosUsuario["IDUsuario"];
            $dev["mensaje"] = "Ingreso con éxito";
        } else {
            http_response_code(404);
            $dev["mensaje"] = "Usuario o contraseña incorrectos";
        }
        break;
}

echo json_encode($dev);

?>