$(document).ready(function () {
    $('#doc').DataTable({
        "language": {
            "sSearch": "Buscar:",
            "zeroRecords": "No se encontraron resultados",
            "lengthMenu": "Mostrar _MENU_ de doctores",
            "info": "Mostrando doctores del _START_ al _END_ de un total de _TOTAL_ doctores",
            "infoEmpty": "¡¡No se hallaron doctores!!",
            "infoFiltered": "(filtrado de un total de _MAX_ doctores)",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        stateSave: true,
        responsive: false,
        "lengthChange": false,
        buttons: [
            'pdf'
        ]
    });
});
$('#agregar_doctor').click(function(){
    $('#agregar_doctor_modal').modal('show');
});