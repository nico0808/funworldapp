<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'POST':
        $conoceSalon = filter_input(INPUT_POST, "conoceSalon");
        $tipoEvento = filter_input(INPUT_POST, "tipoEvento");
        $fechaVisita = filter_input(INPUT_POST, "fechaVisita");
        $edadCumpleanos = filter_input(INPUT_POST, "edadCumpleanos");

        $consultaInsertarVisita = "INSERT INTO `visitas` (`IDVisita`, `conoceSalon`, `tipoEvento`, `edadCumpleanos`) VALUES ('', '$conoceSalon', '$tipoEvento', '$edadCumpleanos')";
        $resultadoInsertarVisita = mysqli_query($db, $consultaInsertarVisita) or die(mysqli_error($db));

        if ($resultadoInsertarVisita) {
            $IDVisita = mysqli_insert_id($db);
            
            
            $consultaBuscarVisita = "SELECT * FROM `visitas` WHERE `IDVisita` LIKE '$IDVisita'";
            $resultadoBuscarVisita = mysqli_query($db, $consultaBuscarVisita);
            $datosVisita = mysqli_fetch_array($resultadoBuscarVisita);
            $dev["IDVisita"] = $datosVisita["IDVisita"];    
        }
        break;
}

echo json_encode($dev);
