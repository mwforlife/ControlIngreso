<?php
include 'controller/controller.php';

$c = new Controller();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="application-name" content="Control de Ingreso">
    <title>Control Ingreso</title>
    <link rel="icon" href="img/time.svg">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/process.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 d-flex flex-column justify-content-center align-items-center flex-wrap">
                <img src="img/log.png" width="150" alt="">
                <h3 class="card-title">Control de Ingreso - Sala Computación</h3>
            </div>
        </div>
        <form action="" id="form-regis">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Curso:</label>
                    <select name="curso" id="" class="form-control">
                        <?php
                            $lista = $c->listarcursos();

                            if (count($lista) <= 0) {
                                echo "<option value=''>No hay cursos</option>";
                            }else{
                                for ($i=0; $i < count($lista); $i++) { 
                                    $CGCU = $lista[$i];
                                    echo "<option value='".$CGCU->getId()."'>".$CGCU->getNombre()."</option>";                                        
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Asignatura</label>
                    <input type="text" name="asignatura" placeholder="Ingrese la Asignatura" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Profesor:</label>
                    <select name="profesor" class="form-control" id="">
                    <?php
                            $lista = $c->listardocentes();
                            for ($i=0; $i < count($lista); $i++) { 
                                $CGCU = $lista[$i];
                                echo "<option value='".$CGCU->getId()."'>".$CGCU->getNombre()."</option>";                                        
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Condicion de recepción de equipos</label>
                    <select name="condicion" class="form-control" id="">
                    <?php
                            $lista = $c->listarcondiciones();
                            for ($i=0; $i < count($lista); $i++) { 
                                $CGCU = $lista[$i];
                                echo "<option value='".$CGCU->getId()."'>".$CGCU->getNombre()."</option>";                                        
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Observación de Ingreso</label>
                    <textarea name="observacioningreso" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-6 d-flex justify-content-center gap-3">
                    <button class="btn btn-warning btn-lg btn-block">Restablecer</button>
                    <button class="btn btn-success btn-lg btn-block">Registrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row">
            <div class="col">
                <table id="tabla-control" class="table table-dark table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                            <th>Condiciones de los equipos</th>
                            <th>Fecha y Hora Ingreso</th>
                            <th>Detalles</th>
                            <th>Marcar Salida</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $lista = $c->listarControl();
                        for ($i=0; $i < count($lista); $i++) {
                            $CGCU = $lista[$i];
                            echo "<tr>";
                            echo "<td>".$CGCU->getCurso()."</td>";
                            echo "<td>".$CGCU->getAsignatura()."</td>";
                            echo "<td>".$CGCU->getProfesor()."</td>";
                            echo "<td>".$CGCU->getCondicion()."</td>";
                            echo "<td>".$CGCU->getFecha()." ".$CGCU->getHoraIngreso()."</td>";
                            echo "<td class='text-center'><a href='#' type='button' data-bs-toggle='modal' data-bs-target='#modaldetails' onclick='detalles(".$CGCU->getID().")'><img src='img/details.svg' alt=''></a></td>";                    
                            if ($CGCU->getobservacionSalida() == "") {
                                if ($CGCU->getFechacontrol() == $CGCU->getFecha()) {
                                    echo "<td class='text-center'><a href='#' type='button' data-bs-toggle='modal' data-bs-target='#modaledit' onclick='salida(".$CGCU->getID().")'><img src='img/edit.svg' alt=''></a></td>";
                                }else{
                                    echo "<td class='text-center'><img src='img/error.svg' alt=''></td>";
                                }
                                
                            }else{
                                echo "<td class='text-center'><img src='img/check.svg' alt=''></td>";
                            }
                            
                        }
                    ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    
    <!-- Modal modal Details-->
    <div class="modal fade" id="modaldetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><img src="img/list.svg">Detalles Ingreso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">            
            <div class="row justify-content-center">
                <div id="detalles" class="col-md-12">
                    
                </div>
            </div>
            
            <div class="modal-footer">
            </div>

                    
            </div>
            </div>
        </div>
    </div>
    
    <!-- Modal modal Edit-->
    <div class="modal fade" id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><img src="img/list.svg">Registrar Salida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="form-regis1">
            <div class="row justify-content-center">
                <div id="detalles1" class="col-md-12">
                    
                </div>
            </div>
            
            <div class="modal-footer">
            <button class="btn btn-lg btn-success">Registrar</button>
            </div>
            </form>            

                    
            </div>
            </div>
        </div>
    </div>
</body>
</html>