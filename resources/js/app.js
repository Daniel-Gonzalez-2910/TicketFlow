import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const formulariosEliminar = document.querySelectorAll(".form-eliminar");

    formulariosEliminar.forEach((formulario) => {
        formulario.addEventListener("submit", (event) => {
            // Obtener información almacenada en el formulario
            const id = formulario.dataset.id;
            const tipo = formulario.dataset.tipo;

            // Buscar el nombre correspondiente usando el ID
            const nombre = window.ticketflowRegistros?.[id];

            let mensaje;

            if (tipo === "ticket") {
                mensaje = `¿Estás seguro de que deseas eliminar el ticket "${nombre}"?`;
            } else {
                mensaje = `¿Estás seguro de que deseas eliminar al usuario "${nombre}"?`;
            }

            const confirmar = confirm(mensaje);

            if (!confirmar) {
                event.preventDefault();
            }
        });
    });
});
