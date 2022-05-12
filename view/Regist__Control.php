<?php
include 'controller.php';

$c = new Controller();

$curso = $_POST['curso'];
$asignatura = $_POST['asignatura'];
$profesor = $_POST['profesor'];
$condicion = $_POST['condicion'];
$observacioningreso = $_POST['observacioningreso'];

$error = "";
if (strlen($observacioningreso) <= 0) {
    $error = "Debe ingresar una observación";
}

if (strlen($curso) <= 0) {
    $error = "Debe ingresar un curso";
}

if (strlen($asignatura) <= 0) {
    $error = "Debe ingresar una asignatura";
}

if (strlen($profesor) <= 0) {
    $error = "Debe ingresar un profesor";
}

if (strlen($condicion) <= 0) {
    $error = "Debe ingresar La condición de los equipos";
}

if (strlen($error) > 0) {
    echo $error;
}else{
    $respuesta = $c->RegistrarIngreso($curso, $asignatura, $profesor, $condicion, $observacioningreso);
    echo $respuesta;
}