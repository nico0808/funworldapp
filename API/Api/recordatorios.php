<?php
include 'conexion.php';
// header('Access-Control-Allow-Origin: *');

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();
// echo "hola";
switch ($metodo) {
    case 'POST':
        $fechaRecordatorio = filter_input(INPUT_POST, "fechaRecordatorio");
        $descripcionRecordatorio = filter_input(INPUT_POST, "descripcionRecordatorio");
        $todoElDia = filter_input(INPUT_POST, "todoElDia");
        $horaInicio = filter_input(INPUT_POST, "horaInicio");
        $horaFin = filter_input(INPUT_POST, "horaFin");


        $consultaInsertarRecordatorio = "INSERT INTO `db5533534_funworld`.`recordatorios` (`IDRecordatorio`, `fechaRecordatorio`, `descripcionRecordatorio`, `todoElDia`, `horaInicio`, `horaFin`) VALUES ('', '$fechaRecordatorio', '$descripcionRecordatorio', '$todoElDia', '$horaInicio', '$horaFin')";
        $resultadoInsertarRecordatorio = mysqli_query($db, $consultaInsertarRecordatorio);

        break;
}

echo json_encode($dev);
