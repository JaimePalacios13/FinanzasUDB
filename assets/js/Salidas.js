$("#imagenSalida").change(function() {
    if (this.files && this.files[0]) {
        // validación para saber si el input tiene o no una imagen cargada
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#previeSalida").attr("src", e.target.result); //asignar imagen en base64 para la vista previa
        };
        reader.readAsDataURL(this.files[0]);
        $(".save_data_salida").removeAttr("hidden"); //mostrar boton para subir imagen
    } else {
        $(".save_data_salida").attr("hidden");
    }
});

$('.save_data_salida').on('click', () => {

    var tipoSalida = $('#tipoSalida').val(),
        monto = $('#montoSalida').val(),
        fechaRegistro = $('#fechaRegistro').val(),
        imagemSalida = $('#previeSalida').attr("src")

    if (tipoSalida.length == 0 || monto.length == 0 || fechaRegistro.length == 0) {
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
            url: baseURL + "saveSalida",
            data: {
                tipoSalida: tipoSalida,
                monto: monto,
                fechaRegistro: fechaRegistro,
                imagemSalida: imagemSalida
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro guardado',
                        text: 'Se ha ingresado una nueva salida',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'registros-de-salida'
                        }
                    })
                } else {
                    alertError('Ocurrio un error al momento de ingresar un nuevo registro. Intente de nuevo')
                }
            }
        });
    }
})