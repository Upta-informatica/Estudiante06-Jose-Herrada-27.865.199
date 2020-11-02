$(document).ready(function() {
    $('#mascotas').DataTable({
        "language" : {
        "sSearch" : "Buscar:",
        "zeroRecords" : "No se encontraron resultados",
        "lengthMenu" : "Mostrar _MENU_ de mascotas",
        "info" : "Mostrando citas del _START_ al _END_ de un total de _TOTAL_ mascotas",
        "infoEmpty" : "¡¡No se hallaron mascotas!!",
        "infoFiltered" : "(filtrado de un total de _MAX_ mascotas)",
        "oPaginate" : {
            "sFirst" : "Primero",
            "sLast" : "Ultimo",
            "sNext" : "Siguiente",
            "sPrevious" : "Anterior"
        },
            "sProcessing" : "Procesando...",
        },
        stateSave: true,
        responsive: false,
        "lengthChange": false
    });
});