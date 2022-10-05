//obtener fecha y hora actual (navegador)
function traerHoraYFechaDelDia() {

  let traerFecha = new Date();

  let fechaActual = traerFecha.toLocaleDateString('es-GT');
  let horaActual = traerFecha.toLocaleTimeString('es-GT');

  document.getElementById('fechaActual').value = fechaActual;
  document.getElementById('horaActual').value = horaActual;

}
