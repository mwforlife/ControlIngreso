<?php
include 'controller.php';

    $c = new Controller();

    $id = $_POST['id'];

    $respuesta = $c->BuscarControl($id);

    echo "
    <div class='row'>
        <div class='col-md-12 col-lg-12'>
            <label for=''>Observacion Ingreso</label>
            <textarea disabled name='observacioningreso' class='form-control' id='' cols='30' rows='10'>".$respuesta->getObservacionIngreso()."</textarea>";
    echo "</div>";
    echo "</div>";
    if ($respuesta->getObservacionSalida() == null || $respuesta->getObservacionSalida() == "" || $respuesta->getObservacionSalida() == " " || $respuesta->getObservacionSalida() == "null") {

    }else{
        echo "
        <div class='row'>
            <div class='col-md-12 col-lg-12'>
                <label for=''>Observacion Salida</label>
                <textarea disabled name='observacionSalida' class='form-control' id='' cols='30' rows='10'>".$respuesta->getObservacionSalida()."</textarea>";
        echo "</div>";
        echo "</div>";

        echo "
        <div class='row'>
            <div class='col-lg-12 col-md-12'>
            <label for=''>Hora Salida:</label>
            <input disabled name='observacioningreso' class='form-control' value='".$respuesta->getHoraSalida()."'/>";
        echo "</div>";
        echo "</div>";
    }