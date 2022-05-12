<?php
include 'Model/Curso.php';
include 'Model/Condicion.php';
include 'Model/Docente.php';
include 'Model/Control.php';


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
            $sql = "SELECT * FROM curso ORDER BY nombre";
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
            $sql = "SELECT * FROM EstadoComponentes order by nom_est_comp asc";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_est_comp'];
                $nombre = $rs['nom_est_comp'];
                $condicion = new Condicion($id, $nombre);
                $lista[] = $condicion;
            }
            $this->desconexion();
            return $lista;
    }

    public function listardocentes(){
            $this->conexion();
            $sql = "SELECT * FROM CGDocente order by nom_doc asc";
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
            $sql = "SELECT id_con, curso.nombre as cursos, asignatura, nom_doc as profesor, nom_est_comp as condicion, ape_doc, fecha, hora_ingreso, observacioningreso,hora_salida, observacionsalida, curdate() as fechacontrol FROM control, curso, CGDocente, EstadoComponentes WHERE control.id_cur = curso.id_cur AND control.id_doc =CGDocente.id_doc and control.id_est=EstadoComponentes.id_est_comp order by fecha desc;";
            $resultado = $this->mi->query($sql);
            $lista = array();
            while ($rs = mysqli_fetch_array($resultado)) {
                $id = $rs['id_con'];
                $curso = $rs['cursos'];
                $asignatura = $rs['asignatura'];
                $profesor = $rs['profesor'];
                $condicion = $rs['condicion'];
                $fecha = $rs['fecha'];
                $hora = $rs['hora_ingreso'];
                $observacioningreso = $rs['observacioningreso'];
                $observacionsalida = $rs['observacionsalida'];
                $hora_salida = $rs['hora_salida'];
                $fechacontrol = $rs['fechacontrol'];

                $control = new Control($id, $curso, $asignatura, $profesor, $condicion, $fecha, $hora, $observacioningreso, $observacionsalida,$hora_salida, $fechacontrol);
                $lista[] = $control;
            }
            $this->desconexion();
            return $lista;
    }

    /**Iniciar Insert */





}