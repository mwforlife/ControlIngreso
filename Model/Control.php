<?php
class Control{
    private $id;
    private $curso;
    private $asignatura;
    private $profesor;
    private $condicion;
    private $estado;
    private $fecha;
    private $hora;
    private $observacioningreso;
    private $observacionsalida;

    public function Control($id, $curso, $asignatura, $profesor, $condicion, $estado, $fecha, $hora, $observacioningreso, $observacionsalida) {
        $this->id = $id;
        $this->curso = $curso;
        $this->asignatura = $asignatura;
        $this->profesor = $profesor;
        $this->condicion = $condicion;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->observacioningreso = $observacioningreso;
        $this->observacionsalida = $observacionsalida;
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

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getObservacioningreso() {
        return $this->observacioningreso;
    }

    public function getObservacionsalida() {
        return $this->observacionsalida;
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

    public function setEstado($estado) {
        $this->estado = $estado;
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

}
