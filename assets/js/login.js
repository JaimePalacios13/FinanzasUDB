$(document).ready(function() {
    $('#table_id').DataTable();
});
$('.session-btn').on('click', () => {
    var user = $('#input_user').val(),
        pwd = $('#input_pwd').val()

    if (user.length == 0 || pwd.length == 0) {
        alertError('Usuario y contraseña requeridos.')
    } else {
        Swal.fire({
            title: 'Espere...',
            html: 'Verificando credenciales...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "validateUser",
            data: {
                user: user,
                pwd: pwd
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    window.location.href = baseURL + 'home'
                } else {
                    $('#input_user').css('border-color', 'red')
                    $('#input_pwd').css('border-color', 'red')
                    alertError('Usuario o contraseña incorrectos')
                }
            }
        });
    }
})