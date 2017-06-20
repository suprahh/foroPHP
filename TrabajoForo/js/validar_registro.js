function validar()
{
	var usuario = document.getElementById('usuario');
	var clave = document.getElementById('clave');
	var reClave = document.getElementById('reClave');
	var nombre = document.getElementById('nombre');
	var apellido = document.getElementById('apellido');
	var foto = document.getElementById('foto');
	

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

	if (reClave.value=="") {
		swal("segunda clave es obligatorio");
		reClave.focus();
		return false;
	}

	if (clave.value != reClave.value) {
		swal("las claves deben ser iguales");
		clave.focus();
		return false;
	}

	if (nombre=="") {
		swal("nombre es obligatorio");
		nombre.focus();
		return false;
	}
	if (apellido=="") {
		swal("apellido es obligatorio");
		clave.focus();
		return false;
	}
	if (foto.value=="") {
		swal("foto es obligatorio");
		foto.focus();
		return false;
	}

}