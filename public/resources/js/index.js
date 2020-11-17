$(document).ready(function() {

    $('table.display').DataTable({
        dom: 'Bfrtip',
		buttons: [
			'pdf', 'excel', 'copy'
		],
        "language" : {
        "sSearch" : "Buscar:",
        "zeroRecords" : "No se encontraron resultados",
        "lengthMenu" : "Mostrar _MENU_ de registros",
        "info" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty" : "¡¡No se hallaron registros!!",
        "infoFiltered" : "(filtrado de un total de _MAX_ registros)",
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
        "lengthChange": false,
        
    });
});

// Botones

$('#agregar_mascota').click(function(){
    $('#agregar_mascota_modal').modal('show');
});


$('#agregar_inventario').click(function(){
    $('#agregar_inventario_modal').modal('show');
});