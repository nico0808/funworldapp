<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'GET':
        $IDEvento = filter_input(INPUT_GET, "IDEvento");


        $consultaTraerEvento = "SELECT * 
        FROM `eventos` 
        INNER JOIN `clientes` ON eventos.IDCliente = clientes.IDCliente
        WHERE eventos.IDEvento = $IDEvento";
        $resultadoTraerEvento = mysqli_query($db, $consultaTraerEvento) or die(mysqli_error($db));

        $cantidad = mysqli_affected_rows($db);


        if ($cantidad != 0) {
            $mostrarEventos = array();
            while ($fila = mysqli_fetch_assoc($resultadoTraerEvento)) {
                array_push($mostrarEventos, $fila);
            }
            $dev = $mostrarEventos;
        }

        // echo $consultaTraerEvento;
        break;
}

echo json_encode($dev);
