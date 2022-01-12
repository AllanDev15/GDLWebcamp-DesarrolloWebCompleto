document.addEventListener('DOMContentLoaded', () => {
	const loginAdminForm = document.querySelector('#login-admin');

	if (loginAdminForm) {
		loginAdminForm.addEventListener('submit', (e) => {
			e.preventDefault();
			const datos = new FormData(loginAdminForm);

			const xhr = new XMLHttpRequest();
			xhr.open('POST', 'login-admin.php', true);
			xhr.onload = function () {
				if (this.status === 200 && this.readyState === 4) {
					const response = JSON.parse(xhr.responseText);
					if (response.respuesta === 'exito') {
						Swal.fire({
							title: 'Login Correcto',
							text: `Bienvenid@ ${response.usuario}`,
							icon: 'success',
						});
						setTimeout(() => {
							window.location.href = 'dashboard.php';
						}, 2000);
					} else {
						Swal.fire({
							title: 'Error!',
							text: 'Usuario o Password Incorrectos',
							icon: 'error',
						});
					}
				}
			};
			xhr.send(datos);
		});
	}
});
