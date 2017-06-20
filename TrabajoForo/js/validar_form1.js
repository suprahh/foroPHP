function valida()
{
	var usuario = document.getElementById('usuario');
	var clave = document.getElementById('clave');

	if (usuario.value=="") {
		swal("usuario es obligatorio");
		usuario.focus();
		return false;

	}

	if (clave.value=="") {
		swal("clave es obligatorio");
		clave.focus();
		return false;
	}
}