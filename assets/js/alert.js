function alertError(entrada) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: entrada,
    })
}
$(document).ready(function() {
    $('#table_salidas').DataTable();
});
$(".input_txt").mask("z", {
    translation: { z: { pattern: /[a-zA-ZñÑáéíóúü ]/, recursive: true } },
});
$(".dollarInputMask").mask("0000000000.00", {
    reverse: true,
});