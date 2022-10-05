//validar que la contraseña sea igual en ambos campos
function validarContrasenaIgual() {

    let contrasena = document.getElementById('contrasena').value;
    let confirmacionContrasena = document.getElementById('contrasenaConfirmar').value;

    let botonSubmit = document.getElementById('botonGuardarPersona');
    let botonFakeSubmit = document.getElementById('botonFakeGuardarPersona');

    let mensajeContrasenaIncorrecta = document.getElementById('mensajeAlerta');

    mensajeContrasenaIncorrecta.style.display = "none";
    botonSubmit.style.display = "none";
    botonFakeSubmit.style.display = "block";

    if (contrasena == confirmacionContrasena) {
        botonSubmit.style.display = "block";
        botonFakeSubmit.style.display = "none";
        mensajeContrasenaIncorrecta.style.display = "none";
    }
    else if (confirmacionContrasena == contrasena) {
        botonSubmit.style.display = "block";
        botonFakeSubmit.style.display = "none";
        mensajeContrasenaIncorrecta.style.display = "none";
    }
    else if (confirmacionContrasena != contrasena) {
        botonSubmit.style.display = "none";
        botonFakeSubmit.style.display = "block";
        mensajeContrasenaIncorrecta.style.display = "block";
        mensajeContrasenaIncorrecta.innerHTML = "** Las contraseñas ingresadas no coinciden, por favor, intenta de nuevo. **";
    }
    else {
        botonSubmit.style.display = "none";
        botonFakeSubmit.style.display = "block";
        mensajeContrasenaIncorrecta.style.display = "block";
        mensajeContrasenaIncorrecta.innerHTML = "** Las contraseñas ingresadas no coinciden, por favor, intenta de nuevo. **";
    }
}

validarContrasenaIgual();


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
                    window.location.href = "../../view/components/personal.php";
                } else if (result.isDenied) {
                    window.location.href = "../../view/components/personal.php";
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
                    window.location.href = "../../view/components/personal.php";
                } else if (result.isDenied) {
                    window.location.href = "../../view/components/personal.php";
                }
            });
        }
    };


}

validarInsercionDeDatosCompletada();