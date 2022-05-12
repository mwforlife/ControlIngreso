$(document).ready(function() {
    $("#tabla-control").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "previous": "Anterior",
            "next": "Siguiente",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});

$(document).ready(function(){
    $('#form-regis').on('submit', function(e){
        e.preventDefault();

        var data = $("#form-regis").serialize();

        $.ajax({
            url: 'view/Regist__Control.php',
            type: 'POST',
            data: data,
            success: function(datos) {
                if (datos == false || datos == 'false') {
                    swal.fire('¡Oh Oh!', 'Hubo Un error, Verifique los datos', 'error');
                } else if (datos == true || datos == 'true') {
                    Swal.fire({
                        title: 'Felicidades',
                        text: '¡Gracias por su tiempo!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location = 'index.php';
                        } else if (result.isDenied) {
                            window.location = 'index.php';
                        }
                      })
                } else {
                    swal.fire('¡Owww!', datos, 'warning');
                }
            }
        });
    });
});

function detalles(id){
    $.ajax({
        url: 'view/Detalles.php',
        type: 'POST',
        data: {id: id},
        success: function(datos) {
            $('#detalles').html(datos);
        }
    });
}

$(document).ready(function(){
    $('#form-regis1').on('submit', function(e){
        e.preventDefault();

        var data = $("#form-regis1").serialize();

        $.ajax({
            url: 'view/Regist__Exit.php',
            type: 'POST',
            data: data,
            success: function(datos) {
                if (datos == false || datos == 'false') {
                    swal.fire('¡Oh Oh!', 'Hubo Un error, Verifique los datos', 'error');
                } else if (datos == true || datos == 'true') {
                    Swal.fire({
                        title: '¡Felicidades!',
                        text: '¡Que tenga un excelente fin de dia!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location = 'index.php';
                        } else if (result.isDenied) {
                            window.location = 'index.php';
                        }
                      })
                } else {
                    swal.fire('¡Owww!', datos, 'warning');
                }
            }
        });
    });
});

function salida(id){
    $.ajax({
        url: 'view/Detalles1.php',
        type: 'POST',
        data: {id: id},
        success: function(datos) {
            $('#detalles1').html(datos);
        }
    });
}