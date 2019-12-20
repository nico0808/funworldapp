<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev=array();

// $token = $_SERVER["HTTP_TOKEN"];

// $consultaUsuarioToken = "SELECT * FROM `usuarios` WHERE `Token` LIKE '$token'";
// $resultadoUsuarioToken = mysqli_query($db, $consultaUsuarioToken);

// $cantidad = mysqli_num_rows($resultadoUsuarioToken);
// if ($cantidad === 0) {
//     $dev["mensaje"] = "Token no válido";
//     http_response_code(401);
//     echo json_encode($dev);
//     die();
// }


switch ($metodo) {
    case 'POST':
        $nombreMenu = filter_input(INPUT_POST, "NombreMenu");
        $descripcionMenu = filter_input(INPUT_POST, "DescripcionMenu");
        $precioMenu = filter_input(INPUT_POST, "PrecioMenu");
        $idCategoria = filter_input(INPUT_POST, "IDCategoria");

        $consultaInsertarMenu = "INSERT INTO `gastronomia` (`IDMenu`, `NombreMenu`, `DescripcionMenu`, `PrecioMenu`, `IDCategoria`) VALUES (NULL, '$nombreMenu', '$descripcionMenu', '$precioMenu', '$idCategoria')";
        $resultadoInsertarMenu = mysqli_query($db, $consultaInsertarMenu);


        if ($resultadoInsertarMenu) {
            $idMenu = mysqli_insert_id($db);

            $consultaBuscarMenu = "SELECT * FROM `gastronomia` WHERE `IDMenu` LIKE '$idMenu'";
            $resultadoBuscarMenu = mysqli_query($db, $consultaBuscarMenu);
            $datosMenu = mysqli_fetch_array($resultadoBuscarMenu);

            $dev["IDMenu"] = $datosMenu["IDMenu"];
            $dev["NombreMenu"]  = $datosMenu["NombreMenu"];
            $dev["DescripcionMenu"]  = $datosMenu["DescripcionMenu"];
            $dev["PrecioMenu"]  = $datosMenu["PrecioMenu"];
            $dev["IDCategoria"]  = $datosMenu["IDCategoria"];
            $dev["mensaje"] = "Se Ingreso un nuevo menu";
        } else {
            $dev["mensaje"] = "No se pudo ingresar el menu";
        }
        break;

    case 'GET':
    
        $idCategoria = filter_input(INPUT_GET, "idCategoria");

        if ($idCategoria === null) {
            $idMenu = filter_input(INPUT_GET, "IDMenu");
            //no levanta descripcion 
            $consultaBuscarMenu = "SELECT `NombreMenu`, `PrecioMenu`, `IDMenu`, `IDCategoria`, `DescripcionMenu` FROM `gastronomia` WHERE `IDMenu`=".$idMenu;
        } else if ($idCategoria === '-1') {
            $consultaBuscarMenu = "SELECT `NombreMenu`, `PrecioMenu`, `IDMenu`, `IDCategoria` FROM `gastronomia`";
        } else {
            $consultaBuscarMenu = "SELECT `NombreMenu`, `PrecioMenu`, `IDMenu`, `IDCategoria` FROM `gastronomia` WHERE `IDCategoria`=".$idCategoria;
        }
        $resultadoBuscarMenu = mysqli_query($db, $consultaBuscarMenu);
        
        $cantidad = mysqli_affected_rows($db);

        if ($cantidad === 0) {
            $dev["mensaje"] = "Registro borrado o no existe";
            http_response_code(400);
        } else {
            $mostrarMenu = array();

            while ($fila = mysqli_fetch_assoc($resultadoBuscarMenu)) {
                array_push($mostrarMenu, $fila);
            }
    
            $dev["menu"] = $mostrarMenu;
        }
      
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $infoDelete);
        
        $idEliminarMenu = $infoDelete["IDMenu"];
        $consultaBorrarMenu = "DELETE FROM `gastronomia` WHERE `IDMenu` = ".$idEliminarMenu;
        $resultadoBorrarMenu = mysqli_query($db, $consultaBorrarMenu);

        $cantidad = mysqli_affected_rows($db);

        if ($cantidad === 0) {
            $dev["mensaje"]="No se pudo borrar el registro porque no existe";
            http_response_code(400);
        } else {
            $dev["mensaje"]="Se borro el registro con exito";
        }
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $infoPut);
        
        $idModifcar = $infoPut["IDMenu"];
        $nombreMenuModificar = $infoPut["NombreMenu"];
        $descripcionMenuModificar = $infoPut["DescripcionMenu"];
        $precioMenuModificar = $infoPut["PrecioMenu"];
        $idCategoria = $infoPut["IDCategoria"];

        $consultaModificarMenu= "UPDATE `gastronomia` SET `NombreMenu` = '$nombreMenuModificar', `DescripcionMenu` = '$descripcionMenuModificar', `PrecioMenu` = '$precioMenuModificar', `IDCategoria` = '$idCategoria' WHERE `gastronomia`.`IDMenu` = '$idModifcar'";
        $resultadoModificarMenu = mysqli_query($db, $consultaModificarMenu);
        // $cantidad = mysqli_affected_rows($db);
        
        if ($resultadoModificarMenu) {
            $dev["mensaje"]="Se actualizo el registro con exito";
        } else {
            $dev["mensaje"]="No se pudo actualizar el registro";
            http_response_code(400);
        }
        break;
}

echo json_encode($dev);

?>