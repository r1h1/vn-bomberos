//valida los codigos correctos o incorrectos de error
function validarInsercionDeDatosCompletada() {

    //valida si la inserción de datos fue exitoso o no
    const valores = window.location.search;

    const urlParametrosEnviados = new URLSearchParams(valores);

    const
        keys = urlParametrosEnviados.keys(),
        values = urlParametrosEnviados.values(),
        entries = urlParametrosEnviados.entries();

    for (const codigoRespuesta of values) {

        if (codigoRespuesta == 'ok') {
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó con éxito.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../../view/components/unidades.php";
                } else if (result.isDenied) {
                    window.location.href = "../../view/components/unidades.php";
                }
            });
        }
        else if (codigoRespuesta == 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La operación no pudo ser completada, por favor, intenta de nuevo o comunícate con el administrador del sistema.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../../view/components/unidades.php";
                } else if (result.isDenied) {
                    window.location.href = "../../view/components/unidades.php";
                }
            });
        }
    };


}

validarInsercionDeDatosCompletada();