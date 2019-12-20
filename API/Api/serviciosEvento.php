<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'POST':
        $IDEvento = filter_input(INPUT_POST, "IDEvento");
        $cantidadAdultos = filter_input(INPUT_POST, "cantidadAdultos");
        $cantidadNinos = filter_input(INPUT_POST, "cantidadNinos");

        $cantidadMozos = filter_input(INPUT_POST, "cantidadMozos");
        $cantidadAnimadores = filter_input(INPUT_POST, "cantidadAnimadores");
        $cantidadHoraExtra = filter_input(INPUT_POST, "cantidadHoraExtra");

        $colores = filter_input(INPUT_POST, "colores");
        $traenContratantes = filter_input(INPUT_POST, "traenContratantes");
        $aclaraciones = filter_input(INPUT_POST, "aclaraciones");
        $comentariosServiciosAdicionales = filter_input(INPUT_POST, "comentariosServiciosAdicionales");

        $menuNino = filter_input(INPUT_POST, "menuNino");
        $cantidadMenuNino = filter_input(INPUT_POST, "cantidadMenuNino");
        $menuNinoDos = filter_input(INPUT_POST, "menuNinoDos");
        $cantidadMenuNinoDos = filter_input(INPUT_POST, "cantidadMenuNinoDos");

        $menuAdulto = filter_input(INPUT_POST, "menuAdulto");
        $cantidadMenuAdulto = filter_input(INPUT_POST, "cantidadMenuAdulto");
        $menuAdultoDos = filter_input(INPUT_POST, "menuAdultoDos");
        $cantidadMenuAdultoDos = filter_input(INPUT_POST, "cantidadMenuAdultoDos");

        $adicionalUno = filter_input(INPUT_POST, "adicionalUno");
        $adicionalDos = filter_input(INPUT_POST, "adicionalDos");
        $adicionalTres = filter_input(INPUT_POST, "adicionalTres");
        $adicionalCuatro = filter_input(INPUT_POST, "adicionalCuatro");
        $adicionalCinco = filter_input(INPUT_POST, "adicionalCinco");
        $adicionalSeis = filter_input(INPUT_POST, "adicionalSeis");
        $adicionalSiete = filter_input(INPUT_POST, "adicionalSiete");
        $adicionalOcho = filter_input(INPUT_POST, "adicionalOcho");
        $adicionalNueve = filter_input(INPUT_POST, "adicionalNueve");
        $adicionalDiez = filter_input(INPUT_POST, "adicionalDiez");
        $adicionalOnce = filter_input(INPUT_POST, "adicionalOnce");
        $adicionalDoce = filter_input(INPUT_POST, "adicionalDoce");
        $adicionalTrece = filter_input(INPUT_POST, "adicionalTrece");
        $adicionalCatorce = filter_input(INPUT_POST, "adicionalCatorce");
        $adicionalQuince = filter_input(INPUT_POST, "adicionalQuince");
        
        //INSERTAR ADICIONALES
        $consultaTraerAdicionales = "SELECT * FROM `adicionales_evento` WHERE `IDEvento` = '$IDEvento'";
        $respuestaTraerAdicionales = mysqli_query($db, $consultaTraerAdicionales) or die(mysqli_error($db));
        $cantidad = mysqli_affected_rows($db);

        if ($cantidad) {
            $consultaBorrarAdicionales = "DELETE FROM `adicionales_evento` WHERE `IDEvento` = '$IDEvento'";
            $respuestaBorrarAdicionales = mysqli_query($db, $consultaBorrarAdicionales) or die(mysqli_error($db));

            if ($adicionalUno != '0') {
                $consultaInsertarAdicionalesUno = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalUno', '$IDEvento')";
                $resultadoInsertarAdicionalesUno = mysqli_query($db, $consultaInsertarAdicionalesUno) or die(mysqli_error($db));
            }

            if ($adicionalDos != '0') {
                $consultaInsertarAdicionalesDos = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDos', '$IDEvento')";
                $resultadoInsertarAdicionalesDos = mysqli_query($db, $consultaInsertarAdicionalesDos) or die(mysqli_error($db));
            }

            if ($adicionalTres != '0') {
                $consultaInsertarAdicionalesTres = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalTres', '$IDEvento')";
                $resultadoInsertarAdicionalesTres = mysqli_query($db, $consultaInsertarAdicionalesTres) or die(mysqli_error($db));
            }

            if ($adicionalCuatro != '0') {
                $consultaInsertarAdicionalesCuatro = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCuatro', '$IDEvento')";
                $resultadoInsertarAdicionalesCuatros = mysqli_query($db, $consultaInsertarAdicionalesCuatro) or die(mysqli_error($db));
            }

            if ($adicionalCinco != '0') {
                $consultaInsertarAdicionalesCinco = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCinco', '$IDEvento')";
                $resultadoInsertarAdicionalesCinco = mysqli_query($db, $consultaInsertarAdicionalesCinco) or die(mysqli_error($db));
            }

            if ($adicionalSeis != '0') {
                $consultaInsertarAdicionalesSeis = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalSeis', '$IDEvento')";
                $resultadoInsertarAdicionalesSeis = mysqli_query($db, $consultaInsertarAdicionalesSeis) or die(mysqli_error($db));
            }

            if ($adicionalSiete != '0') {
                $consultaInsertarAdicionalesSiete = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalSiete', '$IDEvento')";
                $resultadoInsertarAdicionalesSiete = mysqli_query($db, $consultaInsertarAdicionalesSiete) or die(mysqli_error($db));
            }

            if ($adicionalOcho != '0') {
                $consultaInsertarAdicionalesOcho = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalOcho', '$IDEvento')";
                $resultadoInsertarAdicionalesOcho = mysqli_query($db, $consultaInsertarAdicionalesOcho) or die(mysqli_error($db));
            }

            if ($adicionalNueve != '0') {
                $consultaInsertarAdicionalesNueve = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalNueve', '$IDEvento')";
                $resultadoInsertarAdicionalesNueve = mysqli_query($db, $consultaInsertarAdicionalesNueve) or die(mysqli_error($db));
            }

            if ($adicionalDiez != '0') {
                $consultaInsertarAdicionalesDiez = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDiez', '$IDEvento')";
                $resultadoInsertarAdicionalesDiez = mysqli_query($db, $consultaInsertarAdicionalesDiez) or die(mysqli_error($db));
            }

            if ($adicionalOnce != '0') {
                $consultaInsertarAdicionalesOnce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalOnce', '$IDEvento')";
                $resultadoInsertarAdicionalesOnce = mysqli_query($db, $consultaInsertarAdicionalesOnce) or die(mysqli_error($db));
            }

            if ($adicionalDoce != '0') {
                $consultaInsertarAdicionalesDoce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDoce', '$IDEvento')";
                $resultadoInsertarAdicionalesDoce = mysqli_query($db, $consultaInsertarAdicionalesDoce) or die(mysqli_error($db));
            }

            if ($adicionalTrece != '0') {
                $consultaInsertarAdicionalesTrece = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalTrece', '$IDEvento')";
                $resultadoInsertarAdicionalesTrece = mysqli_query($db, $consultaInsertarAdicionalesTrece) or die(mysqli_error($db));
            }

            if ($adicionalCatorce != '0') {
                $consultaInsertarAdicionalesCatorce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCatorce', '$IDEvento')";
                $resultadoInsertarAdicionalesCatorce = mysqli_query($db, $consultaInsertarAdicionalesCatorce) or die(mysqli_error($db));
            }

            if ($adicionalQuince != '0') {
                $consultaInsertarAdicionalesQuince = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalQuince', '$IDEvento')";
                $resultadoInsertarAdicionalesQuince = mysqli_query($db, $consultaInsertarAdicionalesQuince) or die(mysqli_error($db));
            }
        } else {
            if ($adicionalUno != '0') {
                $consultaInsertarAdicionalesUno = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalUno', '$IDEvento')";
                $resultadoInsertarAdicionalesUno = mysqli_query($db, $consultaInsertarAdicionalesUno) or die(mysqli_error($db));
            }

            if ($adicionalDos != '0') {
                $consultaInsertarAdicionalesDos = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDos', '$IDEvento')";
                $resultadoInsertarAdicionalesDos = mysqli_query($db, $consultaInsertarAdicionalesDos) or die(mysqli_error($db));
            }

            if ($adicionalTres != '0') {
                $consultaInsertarAdicionalesTres = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalTres', '$IDEvento')";
                $resultadoInsertarAdicionalesTres = mysqli_query($db, $consultaInsertarAdicionalesTres) or die(mysqli_error($db));
            }

            if ($adicionalCuatro != '0') {
                $consultaInsertarAdicionalesCuatro = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCuatro', '$IDEvento')";
                $resultadoInsertarAdicionalesCuatros = mysqli_query($db, $consultaInsertarAdicionalesCuatro) or die(mysqli_error($db));
            }

            if ($adicionalCinco != '0') {
                $consultaInsertarAdicionalesCinco = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCinco', '$IDEvento')";
                $resultadoInsertarAdicionalesCinco = mysqli_query($db, $consultaInsertarAdicionalesCinco) or die(mysqli_error($db));
            }

            if ($adicionalSeis != '0') {
                $consultaInsertarAdicionalesSeis = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalSeis', '$IDEvento')";
                $resultadoInsertarAdicionalesSeis = mysqli_query($db, $consultaInsertarAdicionalesSeis) or die(mysqli_error($db));
            }

            if ($adicionalSiete != '0') {
                $consultaInsertarAdicionalesSiete = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalSiete', '$IDEvento')";
                $resultadoInsertarAdicionalesSiete = mysqli_query($db, $consultaInsertarAdicionalesSiete) or die(mysqli_error($db));
            }

            if ($adicionalOcho != '0') {
                $consultaInsertarAdicionalesOcho = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalOcho', '$IDEvento')";
                $resultadoInsertarAdicionalesOcho = mysqli_query($db, $consultaInsertarAdicionalesOcho) or die(mysqli_error($db));
            }

            if ($adicionalNueve != '0') {
                $consultaInsertarAdicionalesNueve = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalNueve', '$IDEvento')";
                $resultadoInsertarAdicionalesNueve = mysqli_query($db, $consultaInsertarAdicionalesNueve) or die(mysqli_error($db));
            }

            if ($adicionalDiez != '0') {
                $consultaInsertarAdicionalesDiez = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDiez', '$IDEvento')";
                $resultadoInsertarAdicionalesDiez = mysqli_query($db, $consultaInsertarAdicionalesDiez) or die(mysqli_error($db));
            }

            if ($adicionalOnce != '0') {
                $consultaInsertarAdicionalesOnce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalOnce', '$IDEvento')";
                $resultadoInsertarAdicionalesOnce = mysqli_query($db, $consultaInsertarAdicionalesOnce) or die(mysqli_error($db));
            }

            if ($adicionalDoce != '0') {
                $consultaInsertarAdicionalesDoce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalDoce', '$IDEvento')";
                $resultadoInsertarAdicionalesDoce = mysqli_query($db, $consultaInsertarAdicionalesDoce) or die(mysqli_error($db));
            }

            if ($adicionalTrece != '0') {
                $consultaInsertarAdicionalesTrece = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalTrece', '$IDEvento')";
                $resultadoInsertarAdicionalesTrece = mysqli_query($db, $consultaInsertarAdicionalesTrece) or die(mysqli_error($db));
            }

            if ($adicionalCatorce != '0') {
                $consultaInsertarAdicionalesCatorce = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalCatorce', '$IDEvento')";
                $resultadoInsertarAdicionalesCatorce = mysqli_query($db, $consultaInsertarAdicionalesCatorce) or die(mysqli_error($db));
            }

            if ($adicionalQuince != '0') {
                $consultaInsertarAdicionalesQuince = "INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES ('', '$adicionalQuince', '$IDEvento')";
                $resultadoInsertarAdicionalesQuince = mysqli_query($db, $consultaInsertarAdicionalesQuince) or die(mysqli_error($db));
            }
        }


        //INSERTA SERVICIOS
        if ($cantidadAdultos != 0 && $cantidadNinos != 0) {
            $consultaTraerServicios = "SELECT * FROM `servicios_evento` WHERE `IDEvento` = '$IDEvento'";
            $respuestaTraerServicios = mysqli_query($db, $consultaTraerServicios) or die(mysqli_error($db));

            $cantidad = mysqli_affected_rows($db);
            if ($cantidad) {
                $consultaActualizarServicios = "UPDATE `servicios_evento` SET `cantidadAdultos` = '$cantidadAdultos', `cantidadNinos` = '$cantidadNinos', `cantidadMozos` = '$cantidadMozos', `cantidadAnimadores` = '$cantidadAnimadores', `cantidadHoraExtra` = '$cantidadHoraExtra', `colores` = '$colores', `traenContratantes` = '$traenContratantes', `aclaraciones` = '$aclaraciones', `comentariosServiciosAdicionales` = '$comentariosServiciosAdicionales' WHERE `IDEvento` = '$IDEvento'";
                $resultadoActualizarServicios = mysqli_query($db, $consultaActualizarServicios) or die(mysqli_error($db));
            } else {
                $consultaInsertarServicios = "INSERT INTO `servicios_evento` (`IDServicioEvento`, `IDEvento`, `cantidadAdultos`, `cantidadNinos`, `cantidadMozos`, `cantidadAnimadores`, `cantidadHoraExtra`, `colores`, `traenContratantes`, `aclaraciones`, `comentariosServiciosAdicionales`) VALUES ('', '$IDEvento', '$cantidadAdultos', '$cantidadNinos', '$cantidadMozos', '$cantidadAnimadores', '$cantidadHoraExtra', '$colores', '$traenContratantes', '$aclaraciones', '$comentariosServiciosAdicionales')";
                $resultadoInsertarServicios = mysqli_query($db, $consultaInsertarServicios) or die(mysqli_error($db));
            }
        }
        //INSERTA GASTRONOMIA
        $consultaTraerGastronomia = "SELECT * FROM `gastronomia_evento` WHERE `IDEvento` = '$IDEvento'";
        $respuestaTraerGastronomia = mysqli_query($db, $consultaTraerGastronomia) or die(mysqli_error($db));

        if ($cantidadMenuNino != "" && $cantidadMenuAdulto != "") {
            $cantidad = mysqli_affected_rows($db);
            if ($cantidad) {

                $consultaBorrarGastronomia = "DELETE FROM `gastronomia_evento` WHERE `IDEvento` = '$IDEvento'";
                $respuestaBorrarGastronomia = mysqli_query($db, $consultaBorrarGastronomia) or die(mysqli_error($db));

                $consultaInsertarGastronomia = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuNino', '$cantidadMenuNino', '1')";
                $resultadoInsertarGastronomia = mysqli_query($db, $consultaInsertarGastronomia) or die(mysqli_error($db));
                $consultaInsertarGastronomiaAdulto = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuAdulto', '$cantidadMenuAdulto', '2')";
                $resultadoInsertarGastronomiaAdulto = mysqli_query($db, $consultaInsertarGastronomiaAdulto) or die(mysqli_error($db));
                if ($cantidadMenuNinoDos != "" || $cantidadMenuNinoDos != 0) {
                    $consultaInsertarGastronomiaDos = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuNinoDos', '$cantidadMenuNinoDos', '1')";
                    $resultadoInsertarGastronomiaDos = mysqli_query($db, $consultaInsertarGastronomiaDos) or die(mysqli_error($db));
                }
                if ($cantidadMenuAdultoDos != "" || $cantidadMenuAdultoDos != null) {
                    $consultaInsertarGastronomiaAdultoDos = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuAdultoDos', '$cantidadMenuAdultoDos', '2')";
                    $resultadoInsertarGastronomiaAdultoDos = mysqli_query($db, $consultaInsertarGastronomiaAdultoDos) or die(mysqli_error($db));
                }
            } else {
                $consultaInsertarGastronomia = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuNino', '$cantidadMenuNino', '1')";
                $resultadoInsertarGastronomia = mysqli_query($db, $consultaInsertarGastronomia) or die(mysqli_error($db));
                $consultaInsertarGastronomiaAdulto = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuAdulto', '$cantidadMenuAdulto', '2')";
                $resultadoInsertarGastronomiaAdulto = mysqli_query($db, $consultaInsertarGastronomiaAdulto) or die(mysqli_error($db));
                if ($cantidadMenuNinoDos != "" || $cantidadMenuNinoDos != 0) {
                    $consultaInsertarGastronomiaDos = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuNinoDos', '$cantidadMenuNinoDos', '1')";
                    $resultadoInsertarGastronomiaDos = mysqli_query($db, $consultaInsertarGastronomiaDos) or die(mysqli_error($db));
                }
                if ($cantidadMenuAdultoDos != "" || $cantidadMenuAdultoDos != null) {
                    $consultaInsertarGastronomiaAdultoDos = "INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES ('', '$IDEvento', '$menuAdultoDos', '$cantidadMenuAdultoDos', '2')";
                    $resultadoInsertarGastronomiaAdultoDos = mysqli_query($db, $consultaInsertarGastronomiaAdultoDos) or die(mysqli_error($db));
                }
            }
        }


        break;
    case 'GET':
        $IDEvento = filter_input(INPUT_GET, "IDEvento");
        //TRAE SERVICIOS
        $consultaTraerServicios = "SELECT * FROM `servicios_evento` WHERE `IDEvento` = '$IDEvento'";
        $respuestaTraerServicios = mysqli_query($db, $consultaTraerServicios) or die(mysqli_error($db));

        $cantidad = mysqli_affected_rows($db);

        if ($cantidad === 0) {
            $dev["servicios"] = "";
        } else {
            $mostrarServicios = array();
            while ($fila = mysqli_fetch_assoc($respuestaTraerServicios)) {
                array_push($mostrarServicios, $fila);
            }
            $dev["servicios"] = $mostrarServicios;
        }

        //TRAE GASTRONOMIA
        $consultaTraerGastronomia = "SELECT * FROM `gastronomia_evento` WHERE `IDEvento` = '$IDEvento'";
        $respuestaTraerGastronomia = mysqli_query($db, $consultaTraerGastronomia) or die(mysqli_error($db));
        $cantidad = mysqli_affected_rows($db);

        if ($cantidad === 0) {
            $dev["gastronomia"] = "";
        } else {
            $mostrarGastronomia = array();
            while ($fila = mysqli_fetch_assoc($respuestaTraerGastronomia)) {
                array_push($mostrarGastronomia, $fila);
            }
            $dev["gastronomia"] = $mostrarGastronomia;
        }

        //TRAE ADICIONALES
        $consultaTraerAdicionales = "SELECT * FROM `adicionales_evento` WHERE `IDEvento` = '$IDEvento'";
        $respuestaTraerAdicionales = mysqli_query($db, $consultaTraerAdicionales) or die(mysqli_error($db));
        $cantidad = mysqli_affected_rows($db);

        if ($cantidad === 0) {
            $dev["adicionales"] = "";
        } else {
            $mostrarAdicionales = array();
            while ($fila = mysqli_fetch_assoc($respuestaTraerAdicionales)) {
                array_push($mostrarAdicionales, $fila);
            }
            $dev["adicionales"] = $mostrarAdicionales;
        }

        break;
}

echo json_encode($dev);
