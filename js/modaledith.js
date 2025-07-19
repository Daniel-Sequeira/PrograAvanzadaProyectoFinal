
$('#modalEditarEmpleado').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $('#edit_id_empleado').val(button.data('id'));
    $('#edit_nombre').val(button.data('nombre'));
    $('#edit_correo').val(button.data('correo'));
    $('#edit_telefono').val(button.data('telefono'));
    $('#edit_cedula').val(button.data('cedula'));
    $('#edit_estado').val(button.data('estado'));
    $('#edit_id_rol').val(button.data('idrol'));
    $('#edit_contrasena').val('').prop('disabled', true);
    $('#check_cambiar_contrasena').prop('checked', false);
});

// Habilita/deshabilita el input de contraseña según el checkbox
$('#check_cambiar_contrasena').on('change', function() {
    $('#edit_contrasena').prop('disabled', !this.checked);
    if(!this.checked) { $('#edit_contrasena').val(''); }
});

