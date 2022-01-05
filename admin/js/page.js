$(function () {
	$('#registros').DataTable({
		paging: true,
		pageLength: 10,
		lengthChange: false,
		searching: true,
		ordering: true,
		info: true,
		autoWidth: false,
		responsive: true,
		language: {
			paginate: {
				next: 'Siguiente',
				previous: 'Anterior',
				last: 'Ultimo',
				first: 'Primero',
			},
			info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
			emptyTable: 'No hay registros',
			infoEmpty: '0 Registros',
			search: 'Buscar',
		},
	});

	$('#crear_registro_admin').attr('disabled', true);

	$('#repetir_password').on('blur', () => {
		const password_nuevo = $('#password').val();

		if ($('#repetir_password').val() == password_nuevo) {
			$('#resultado_password').text('Correcto');
			$('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
			$('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
			$('#crear_registro_admin').attr('disabled', false);
		} else {
			$('#resultado_password').text('No son Iguales');
			$('#resultado_password').parents('.form-group').addClass('has-error').removeClass('.has-success');
			$('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
			$('#crear_registro_admin').attr('disabled', true);
		}
	});

	$('#reservationdate').datetimepicker({
		format: 'L',
	});
	$('#timepicker').datetimepicker({
		format: 'LT',
	});

	$('.select2').select2();

	$('#icono').iconpicker();

	const xhr = new XMLHttpRequest();
	xhr.open('POST', 'servicio-registrados.php', true);
	xhr.onload = function () {
		if (this.status === 200) {
			const response = JSON.parse(xhr.responseText);
			cargarGrafica(response);
		}
	};

	xhr.send();
});

function cargarGrafica(response) {
	const ctx = document.querySelector('#grafica-registros');
	const chart = new Chart(ctx, {
		type: 'line',

		data: {
			labels: response.map((reg) => reg.fecha),
			datasets: [
				{
					label: 'Registrados',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255,99,132)',
					data: response.map((reg) => reg.cantidad),
				},
			],
		},
	});
}
