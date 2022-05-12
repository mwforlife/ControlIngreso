<?php
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


     /**Iniciar Insert */
     public function RegistrarIngreso($curso, $asignatura, $profesor, $condicion, $observacioningreso){
        $this->conexion();
        $sql = "INSERT INTO control values (null,$curso,'$asignatura', $profesor, $condicion,curdate(),curtime(), '$observacioningreso',null,null);";
        $result = $this->mi->query($sql);
        $this->desconexion();
        return json_encode($result);
    }

    public function RegistrarSalida($id, $observacionsalida){
        $this->conexion();
        $sql = "UPDATE control SET observacionsalida = '$observacionsalida', hora_salida = curtime() WHERE id_con = $id";
        $result = $this->mi->query($sql);
        $this->desconexion();
        return json_encode($result);
    }


    /**Busquedas */
    public function BuscarControl($id){
        $this->conexion();
        $sql = "SELECT * FROM control WHERE id_con = $id";
        $result = $this->mi->query($sql);
        while ($rs = mysqli_fetch_array($result)) {
            $id = $rs['id_con'];
            $curso = $rs['id_cur'];
            $asignatura = $rs['asignatura'];
            $profesor = $rs['id_doc'];
            $condicion = $rs['id_est'];
            $fecha = $rs['fecha'];
            $hora_ingreso = $rs['hora_ingreso'];
            $observacioningreso = $rs['observacioningreso'];
            $observacionsalida = $rs['observacionsalida'];
            $hora_salida = $rs['hora_salida'];  
            $control = new Control($id, $curso, $asignatura, $profesor, $condicion, $fecha, $hora_ingreso, $observacioningreso, $observacionsalida, $hora_salida,'null');
            $this->desconexion();
            return $control;
        }
    }

}