$("#imagemEntrada").change(function() {
    if (this.files && this.files[0]) {
        // validación para saber si el input tiene o no una imagen cargada
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#previeEntrada").attr("src", e.target.result); //asignar imagen en base64 para la vista previa
        };
        reader.readAsDataURL(this.files[0]);
        $(".save_data").removeAttr("hidden"); //mostrar boton para subir imagen
    } else {
        $(".save_data").attr("hidden");
    }
});

$('.save_data').on('click', () => {

    var tipoEntrada = $('#tipoEntrada').val(),
        monto = $('#monto').val(),
        fechaRegistro = $('#fechaRegistro').val(),
        imagemEntrada = $('#previeEntrada').attr("src")

    if (tipoEntrada.length == 0 || monto.length == 0 || fechaRegistro.length == 0) {
        alertError('Los datos de este formulario son obligatorios.')
    } else {
        Swal.fire({
            title: 'Espere...',
            html: 'Ingresando datos...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        $.ajax({
            type: "POST",
            url: baseURL + "saveEntrada",
            data: {
                tipoEntrada: tipoEntrada,
                monto: monto,
                fechaRegistro: fechaRegistro,
                imagemEntrada: imagemEntrada
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro guardado',
                        text: 'Se ha ingresado una nueva entrada',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'registros-de-entrada'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de ingresar un nuego registro. Intente de nuevo')
                }
            }
        });
    }
})