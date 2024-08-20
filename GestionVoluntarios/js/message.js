document.addEventListener("DOMContentLoaded", function() {
    const status = new URLSearchParams(window.location.search).get('status');
    if (status === "rechazada") {
        Swal.fire({
            
            title: 'Solicitud rechazada',
            text: 'La solicitud ha sido rechazada y el solicitante ha sido notificado.'
        });
    } else if (status === "aceptada") {
        Swal.fire({
            
            title: 'Solicitud aceptada',
            text: 'La solicitud ha sido aceptada y el solicitante ha sido notificado.'
        });
    } else if (status === "error_correo") {
        Swal.fire({
            
            title: 'Error',
            text: 'Hubo un problema al enviar el correo de notificación. Por favor, intenta de nuevo.'
        });
    } else if (status === "error_actualizacion") {
        Swal.fire({
            
            title: 'Error',
            text: 'Hubo un problema al actualizar la solicitud. Por favor, intenta de nuevo.'
        });
    }

    // Eliminar el parámetro 'status' de la URL después de mostrar el mensaje
    const url = new URL(window.location);
    url.searchParams.delete('status');
    window.history.replaceState(null, null, url);
});