<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'GET':
        $IDEvento = filter_input(INPUT_GET, "IDEvento");
        
        $consultaTraerEventos = "SELECT * FROM `eventos` AS e  
        INNER JOIN `homenajeados` AS h ON e.IDEvento = h.IDEvento
        INNER JOIN `clientes` AS c ON e.IDCliente = c.IDCliente
        INNER JOIN `servicios_evento` AS s ON e.IDEvento = s.IDEvento
        INNER JOIN `adicionales_evento` AS a ON e.IDEvento = a.IDEvento
        INNER JOIN `gastronomia_evento` AS g ON e.IDEvento = g.IDEvento
        WHERE e.IDEvento = '$IDEvento'
        GROUP BY e.IDEvento";
        $resultadoTraerEventos = mysqli_query($db, $consultaTraerEventos) or die(mysqli_error($db));

        $cantidad = mysqli_affected_rows($db);


        if ($cantidad != 0) {
            $mostrarEventos = array();

            while ($fila = mysqli_fetch_assoc($resultadoTraerEventos)) {
                array_push($mostrarEventos, $fila);
            }

            $dev = $mostrarEventos;
        }
        //echo $consultaTraerEventos;
        break;
}

echo json_encode($dev);