//envio de formulario con tecla enter login
function enviarFormularioConTeclaEnter() {
    document.formulario1.submit()
}


function validarInsercionDeDatosCompletada() {

    //valida si la inserción de datos fue exitoso o no
    const valores = window.location.search;

    const urlParametrosEnviados = new URLSearchParams(valores);

    const
        keys = urlParametrosEnviados.keys(),
        values = urlParametrosEnviados.values(),
        entries = urlParametrosEnviados.entries();

    for (const codigoRespuesta of values) {

        if (codigoRespuesta == '1') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El usuario y/o la contraseña no es correcto, verifique.',
                confirmButtonText: 'Intentar de nuevo',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                } else if (result.isDenied) {
                    window.location.href = "index.php";
                }
            });
        }
        else if (codigoRespuesta == '2') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No tienes permiso para realizar esta acción, intenta de nuevo.',
                confirmButtonText: 'Intentar de nuevo',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                } else if (result.isDenied) {
                    window.location.href = "index.php";
                }
            });
        }
        else if (codigoRespuesta == '3') {
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó con éxito.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                } else if (result.isDenied) {
                    window.location.href = "index.php";
                }
            });
        }
        else {
            //no hace nada
        }
    };
}

validarInsercionDeDatosCompletada();


//genera un codigo de validación random para cambiar clave
function codigoValidacionCambioClave() {

    let identificacion = document.getElementById('identificacionInput').value;
    let divIngresarCodigo = document.getElementById('ingresarCodigo');
    let codigoValidacionGenerado = document.getElementById('codigoValidacionGenerado');

    divIngresarCodigo.style.display = "none";

    if (identificacion != "") {

        divIngresarCodigo.style.display = "block";

        const generateRandomString = (num) => {
            const characters = '0123456789';
            let result1 = '';
            const charactersLength = characters.length;
            for (let i = 0; i < num; i++) {
                result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result1;
        }

        codigoValidacionGenerado.value = generateRandomString(5);

    } else {
        divIngresarCodigo.style.display = "none";
    }
}

codigoValidacionCambioClave();


//detecta que el codigo de validación ingresado sea el correcto
function detectarCodigoValidacionCorrecto() {

    let inputCodigoIngresado = document.getElementById('inputCodigoIngresado').value;
    let codigoValidacionGenerado = document.getElementById('codigoValidacionGenerado').value;
    let botonCambiarClave = document.getElementById('botonCambiarClave');
    let divIngresarCodigo = document.getElementById('ingresarCodigo');

    botonCambiarClave.style.display = "none";

    inputCodigoIngresado = inputCodigoIngresado.toUpperCase();

    if (inputCodigoIngresado == "" && codigoValidacionGenerado == "") {
        //no hace nada porque está en blanco
        botonCambiarClave.style.display = "none";
    }

    else if (inputCodigoIngresado == codigoValidacionGenerado) {
        botonCambiarClave.style.display = "block";
        divIngresarCodigo.style.display = "none";
    }

    else if (inputCodigoIngresado != codigoValidacionGenerado) {
        botonCambiarClave.style.display = "none";
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El código de validación ingresado no coincide o ha vencido, intenta de nuevo.'
        });
    }

    else {
        botonCambiarClave.style.display = "none";
        Swal.fire({
            icon: 'error',
            title: 'Error no manejado',
            text: 'Contacta al administrador del sistema para verificar el error, o cambia tu contraseña desde otro usuario administrador.'
        });
    }
}