<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'GET':
        $fechaEvento = filter_input(INPUT_GET, "fechaEvento");
        $salon = filter_input(INPUT_GET, "salon");
        
        if ($fechaEvento) {
            $consultaTraerEventos = "SELECT fechaEvento, IDSalon, horaInicio, horaFin
                                    FROM `eventos` 
                                    WHERE fechaEvento = '$fechaEvento' AND IDSalon = '$salon'";
        } else {
            $consultaTraerEventos = "SELECT e.IDEvento, e.fechaEvento, h.homenajeadoEvento, e.tipoEvento, e.IDSalon, e.horaInicio, e.horaFin, e.señaEvento,
            TIMESTAMPDIFF(HOUR, NOW(), CONCAT(e.fechaEvento,' ',e.horaFin)) < 0 AS 'terminado',
            CASE WHEN EXISTS (SELECT IDServicioEvento FROM `servicios_evento` AS se
                                WHERE se.IDEvento = e.IDEvento)
                THEN 1 ELSE 0 END AS 'infoCompleta'
            FROM `eventos` AS e
            INNER JOIN `homenajeados` AS h ON e.IDEvento = h.IDEvento
            GROUP BY e.IDEvento";
        }
        $resultadoTraerEventos = mysqli_query($db, $consultaTraerEventos) or die(mysqli_error($db));

        $cantidad = mysqli_affected_rows($db);


        if ($cantidad != 0) {
            $mostrarEventos = array();

            while ($fila = mysqli_fetch_assoc($resultadoTraerEventos)) {
                array_push($mostrarEventos, $fila);
            }

            $dev = $mostrarEventos;
        }

        // echo $consultaTraerEventos;
        break;
}

echo json_encode($dev);
