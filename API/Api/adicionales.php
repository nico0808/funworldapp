<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

// $token = $_SERVER["HTTP_TOKEN"];


switch ($metodo) {
    case 'GET':
        $consultaAdicionales = "SELECT * FROM `adicionales`";
        $resultadoAdicionales = mysqli_query($db, $consultaAdicionales);

        $consultaExtras = "SELECT `mozos`, `animadores`, `precioMozoExtra`, `precioAnimadorExtra`, `precioSemana`, `precioFinDeSemana`, `precioHoraExtraSemana`, `precioHoraExtraFinDeSemana` FROM `salon`";
        $resultadoExtras = mysqli_query($db, $consultaExtras);

        if ($resultadoAdicionales) {
            $mostrarAdicionales = array();
            while ($fila = mysqli_fetch_assoc($resultadoAdicionales)) {
                array_push($mostrarAdicionales, $fila);
            }
            $dev["adicionales"] = $mostrarAdicionales;

            if ($resultadoExtras) {
                $mostrarExtras = array();
                while ($fila = mysqli_fetch_assoc($resultadoExtras)) {
                    array_push($mostrarExtras, $fila);
                }
                $dev["extras"] = $mostrarExtras;
        
            }
        } else {
            http_response_code(400);
        }




        
        break;

    case "DELETE":
        // parse_str(file_get_contents("php://input"), $infoDelete);

        // $idEliminarMenu = $infoDelete["IDMenu"];
        // $consultaBorrarMenu = "DELETE FROM `gastronomia` WHERE `IDMenu` = " . $idEliminarMenu;
        // $resultadoBorrarMenu = mysqli_query($db, $consultaBorrarMenu);

        // $cantidad = mysqli_affected_rows($db);

        // if ($cantidad === 0) {
        //     $dev["mensaje"] = "No se pudo borrar el registro porque no existe";
        //     http_response_code(400);
        // } else {
        //     $dev["mensaje"] = "Se borro el registro con exito";
        // }
        break;

    case "PUT":
        // parse_str(file_get_contents("php://input"), $infoPut);

        // $idModifcar = $infoPut["IDMenu"];
        // $nombreMenuModificar = $infoPut["NombreMenu"];
        // $descripcionMenuModificar = $infoPut["DescripcionMenu"];
        // $precioMenuModificar = $infoPut["PrecioMenu"];
        // $idCategoria = $infoPut["IDCategoria"];

        // $consultaModificarMenu = "UPDATE `gastronomia` SET `NombreMenu` = '$nombreMenuModificar', `DescripcionMenu` = '$descripcionMenuModificar', `PrecioMenu` = '$precioMenuModificar', `IDCategoria` = '$idCategoria' WHERE `gastronomia`.`IDMenu` = '$idModifcar'";
        // $resultadoModificarMenu = mysqli_query($db, $consultaModificarMenu);

        // // $cantidad = mysqli_affected_rows($db);


        // if ($resultadoModificarMenu) {
        //     $dev["mensaje"] = "Se actualizo el registro con exito";
        // } else {
        //     $dev["mensaje"] = "No se pudo actualizar el registro";
        //     http_response_code(400);
        // }
        break;
}

echo json_encode($dev);
