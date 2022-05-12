<?php
class Control{
    private $id;
    private $curso;
    private $asignatura;
    private $profesor;
    private $condicion;
    private $estado;
    private $fecha;
    private $hora_ingreso;
    private $observacioningreso;
    private $observacionsalida;
    private $hora_salida;
    private $fechacontrol;

    public function Control($id, $curso, $asignatura, $profesor, $condicion, $fecha, $hora_ingreso, $observacioningreso, $observacionsalida, $hora_salida, $fechacontrol) {
        $this->id = $id;
        $this->curso = $curso;
        $this->asignatura = $asignatura;
        $this->profesor = $profesor;
        $this->condicion = $condicion;
        $this->fecha = $fecha;
        $this->hora_ingreso = $hora_ingreso;
        $this->observacioningreso = $observacioningreso;
        $this->observacionsalida = $observacionsalida;
        $this->hora_salida = $hora_salida;
        $this->fechacontrol = $fechacontrol;
    }

    public function getId() {
        return $this->id;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function getProfesor() {
        return $this->profesor;
    }

    public function getCondicion() {
        return $this->condicion;
    }


    public function getFecha() {
        return $this->fecha;
    }

    public function getHoraIngreso() {
        return $this->hora_ingreso;
    }

    public function getObservacioningreso() {
        return $this->observacioningreso;
    }

    public function getObservacionsalida() {
        return $this->observacionsalida;
    }

    public function getHoraSalida() {
        return $this->hora_salida;
    }

    public function getFechacontrol() {
        return $this->fechacontrol;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public function setAsignatura($asignatura) {
        $this->asignatura = $asignatura;
    }

    public function setProfesor($profesor) {
        $this->profesor = $profesor;
    }

    public function setCondicion($condicion) {
        $this->condicion = $condicion;
    }


    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setObservacioningreso($observacioningreso) {
        $this->observacioningreso = $observacioningreso;
    }

    public function setObservacionsalida($observacionsalida) {
        $this->observacionsalida = $observacionsalida;
    }

    public function setHoraSalida($hora_salida) {
        $this->hora_salida = $hora_salida;
    }

    public function setFechacontrol($fechacontrol) {
        $this->fechacontrol = $fechacontrol;
    }

}
