<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: TOKEN, Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
header("Content-Type:application/json");


$tipo = $_SERVER["REQUEST_METHOD"];
if ($tipo === "OPTIONS") {
	die();
}

$env = "dev";
if ($env === "dev") {
	$db = mysqli_connect("localhost", "root", "", "db5533534_funworld");
} else {
	$db = mysqli_connect("mysql374int.hostingwebmovistar.com.uy", "u5533534_fun", "17hostA147", "db5533534_FunWorld");
}
mysqli_set_charset($db, "utf8");

if (!$db) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>