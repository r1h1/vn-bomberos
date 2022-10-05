/* funciones para eliminar mantenimiento de BD */
function eliminarDatosAmbulancia() {
  Swal.fire({
    icon: 'question',
    title: '¿Estás seguro?',
    text: 'Si eliminas la información, no podrás recuperarla de ninguna manera si no la exportas previamente.',
    showDenyButton: true,
    confirmButtonText: 'Si, Eliminar',
    denyButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $('#modalAmbulancia').modal('show'); // abrir
    } else if (result.isDenied) {
    }
  });
}

function eliminarDatosIncendio() {
  Swal.fire({
    icon: 'question',
    title: '¿Estás seguro?',
    text: 'Si eliminas la información, no podrás recuperarla de ninguna manera si no la exportas previamente.',
    showDenyButton: true,
    confirmButtonText: 'Si, Eliminar',
    denyButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $('#modalIncendio').modal('show'); // abrir
    } else if (result.isDenied) {

    }
  });
}

function eliminarDatosRescate() {
  Swal.fire({
    icon: 'question',
    title: '¿Estás seguro?',
    text: 'Si eliminas la información, no podrás recuperarla de ninguna manera si no la exportas previamente.',
    showDenyButton: true,
    confirmButtonText: 'Si, Eliminar',
    denyButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $('#modalRescate').modal('show'); // abrir
    } else if (result.isDenied) {
    }
  });
}

function eliminarDatosServiciosVarios() {
  Swal.fire({
    icon: 'question',
    title: '¿Estás seguro?',
    text: 'Si eliminas la información, no podrás recuperarla de ninguna manera si no la exportas previamente.',
    showDenyButton: true,
    confirmButtonText: 'Si, Eliminar',
    denyButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $('#modalSVarios').modal('show'); // abrir
    } else if (result.isDenied) {
    }
  });
}




//validar codigos de errores y de exito
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
        icon: 'success',
        title: 'Correcto',
        text: 'La operación se completó con éxito.',
        confirmButtonText: 'Entendido',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "mantenimiento-bd.php";
        } else if (result.isDenied) {
          window.location.href = "mantenimiento-bd.php";
        }
      });
    }
    else if (codigoRespuesta == '2') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El usuario ingresado no es correcto, por favor, intenta de nuevo.',
        confirmButtonText: 'Intentar de nuevo',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "mantenimiento-bd.php";
        } else if (result.isDenied) {
          window.location.href = "mantenimiento-bd.php";
        }
      });
    }
    else {
      //no hace nada
    }
  };
}

validarInsercionDeDatosCompletada();