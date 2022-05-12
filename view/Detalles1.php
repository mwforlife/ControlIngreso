<?php
include 'controller.php';

    $c = new Controller();

    $id = $_POST['id'];

    $respuesta = $c->BuscarControl($id);

    echo "<input type='hidden' name='id' value='".$respuesta->getId()."'>";
    echo "
    <div class='row'>
        <div class='col-md-12 col-lg-12'>
            <label for=''>Observacion Ingreso</label>
            <textarea disabled name='observacioningreso' class='form-control' id='' cols='30' rows='10'>".$respuesta->getObservacionIngreso()."</textarea>";
    echo "</div>";
    echo "</div>";

    echo "
       <div class='row'>
        <div class='col-md-12 col-lg-12'>
            <label for=''>Observacion Salida</label>
            <textarea placeholder='Ingresar Observacion' name='observacionsalida' class='form-control' id='' cols='30' rows='10'>".$respuesta->getObservacionSalida()."</textarea>";
       echo "</div>";
       echo "</div>";

    