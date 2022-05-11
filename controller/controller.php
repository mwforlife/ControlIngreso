<?php
include '../Model/Curso.php';
include '../Model/Condicion.php';
include '../Model/Docente.php';
include '../Model/Control.php';


class Controller{

    private $mi;

     private function conexion()
     {
         $this->mi = new mysqli("localhost", "root", "", "CGGraneros");
            if ($this->mi->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->mi->connect_errno . ") " . $this->mi->connect_error;
            }
     }

     private function desconexion()
     {
         $this->mi->close();
     }

     public function listarcursos(){
            $this->conexion();
            $sql = "SELECT * FROM curso";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_cur'];
                $nombre = $rs['nombre'];
                $curso = new Curso($id, $nombre);
                $lista[] = $curso;
            }
            $this->desconexion();
            return $lista;
     }

    public function listarcondiciones(){
            $this->conexion();
            $sql = "SELECT * FROM EstadoComponentes";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_estado'];
                $nombre = $rs['nombre'];
                $condicion = new Condicion($id, $nombre);
                $lista[] = $condicion;
            }
            $this->desconexion();
            return $lista;
    }

    public function listardocentes(){
            $this->conexion();
            $sql = "SELECT * FROM CGDocente";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_doc'];
                $nombre = $rs['nom_doc'];
                $apellido = $rs['ape_doc'];
                $docente = new Docente($id, $nombre." ".$apellido);
                $lista[] = $docente;
            }
            $this->desconexion();
            return $lista;
    }

    public function listarControl(){
            $this->conexion();
            $sql = "SELECT id_con, curso.nombre as curso, asignatura, nom_doc, ape_doc, fecha, hora, observacioningreso, observacionsalida FROM control, curso, CGDocente WHERE control.id_cur = curso.id_cur AND control.id_doc =CGDocente.id_doc;           ";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_con'];
                $curso = $rs['curso'];
                $asignatura = $rs['asignatura'];
                $profesor = $rs['profesor'];
                $condicion = $rs['condicion'];
                $fecha = $rs['fecha'];
                $hora = $rs['hora'];
                $observacioningreso = $rs['observacioningreso'];
                $observacionsalida = $rs['observacionsalida'];

                $control = new Control($id, $curso, $asignatura, $profesor, $condicion, $fecha, $hora, $observacioningreso, $observacionsalida);
                $lista[] = $control;
            }
            $this->desconexion();
            return $lista;
    }





}