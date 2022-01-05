document.addEventListener("DOMContentLoaded", () => {
  const formCrear = document.querySelector("#guardar-registro");

  if (formCrear) {
    formCrear.addEventListener("submit", (e) => {
      e.preventDefault();
      const modelo = e.target.getAttribute("action");

      const datos = new FormData(formCrear);
      const xhr = new XMLHttpRequest();

      xhr.open("POST", modelo, true);
      xhr.onload = function () {
        if (this.status === 200) {
          console.log(JSON.parse(xhr.responseText));
          let response = JSON.parse(xhr.responseText);
          if (response.respuesta === "exito") {
            swal.fire(
              "Correcto",
              "El registro se guardo correctamente",
              "success"
            );
          } else {
            swal.fire("Error!", "Hubo un error", "error");
          }
        }
      };

      xhr.send(datos);
    });
  }

  // Borrar Registro cualsea
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("borrar_registro")) {
      e.preventDefault();
      const id = e.target.getAttribute("data-id");
      const tipo = e.target.getAttribute("data-tipo");

      Swal.fire({
        title: "¿Estas Seguro?",
        text: "Un registro eliminado no se puede recuperar",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          const data = new FormData();
          data.append("id", id);
          data.append("registro", "eliminar");

          const xhr = new XMLHttpRequest();
          xhr.open("POST", `modelo-${tipo}.php`, true);
          xhr.onload = function () {
            if (this.status === 200 && this.readyState === 4) {
              const response = JSON.parse(xhr.responseText);
              if (response.respuesta === "exito") {
                e.target.parentElement.parentElement.remove();
                Swal.fire(
                  "Eliminado",
                  "El registro se ha eliminado",
                  "success"
                );
              } else {
                Swal.fire(
                  "Error al eliminar",
                  "No se pudo eliminar el registro",
                  "error"
                );
              }
            }
          };

          xhr.send(data);
        }
      });
    }
  });

  // Se ejecuta cuando hay un archivo
  $("#guardar-registro-archivo").on("submit", function (e) {
    e.preventDefault();

    var datos = new FormData(this);

    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function (data) {
        var resultado = data;
        console.log(resultado);
        if (resultado.respuesta == "exito") {
          Swal.fire("Correcto", "Se guardo correctamente", "success");
        } else {
          Swal.fire("Error!", "Hubo un error", "error");
        }
      },
    });
  });
});
