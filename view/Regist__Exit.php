<?php
include 'controller.php';

$c = new Controller();

$id = $_POST['id'];
$observacionsalida = $_POST['observacionsalida'];

$error = "";

if (strlen($observacionsalida) <= 0) {
    $error = "Debe ingresar una observación";
}

if (strlen($error) > 0) {
    echo $error;
}else{
    $respuesta = $c->RegistrarSalida($id, $observacionsalida);
    echo $respuesta;
}