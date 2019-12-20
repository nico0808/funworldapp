<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'GET':

        $consultaTraerEventos = "SELECT e.IDEvento, e.fechaEvento, h.homenajeadoEvento, e.tipoEvento, e.IDSalon, e.horaInicio, e.horaFin, e.señaEvento,
                                TIMESTAMPDIFF(HOUR, NOW(), CONCAT(e.fechaEvento,' ',e.horaFin)) < 0 AS 'terminado',
                                CASE WHEN EXISTS (SELECT IDServicioEvento FROM `servicios_evento` AS se
                                                WHERE se.IDEvento = e.IDEvento)
                                THEN 1 ELSE 0 END AS 'infoCompleta'
                                FROM `eventos` AS e
                                INNER JOIN `homenajeados` AS h ON e.IDEvento = h.IDEvento
                                GROUP BY e.IDEvento";
        $resultadoTraerEventos = mysqli_query($db, $consultaTraerEventos) or die(mysqli_error($db));
        $cantidadEventos = mysqli_affected_rows($db);

        $consultaTraerRecordatorios = "SELECT * FROM `recordatorios`";
        $resultadoTraerRecordatorios = mysqli_query($db, $consultaTraerRecordatorios) or die(mysqli_error($db));
        $cantidadRecordatorios = mysqli_affected_rows($db);

        
        if ($cantidadEventos != 0) {
            $mostrarEventos = array();

            $mostrarEventos['eventos'] = array();
            $eventos = array();
            while ($fila = mysqli_fetch_assoc($resultadoTraerEventos)) {
                array_push($eventos, $fila);
            }
            $mostrarEventos['eventos'] = $eventos;
            $mostrarEventos['recordatorios'] = array();

            if ($cantidadRecordatorios != 0) {
                $recordatorioEvento = array();
                while ($fila = mysqli_fetch_assoc($resultadoTraerRecordatorios)) {
                    array_push($recordatorioEvento, $fila);
                }
                $mostrarEventos['recordatorios'] = $recordatorioEvento;
            }
            $dev = $mostrarEventos;
        }
        break;
}

echo json_encode($dev);
