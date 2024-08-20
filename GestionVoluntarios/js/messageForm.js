document.addEventListener("DOMContentLoaded", function() {
    const status = new URLSearchParams(window.location.search).get('status');
    if (status === "Solicitud_enviada") {
        Swal.fire({
            title: 'Solicitud Enviada',
            text: 'Gracias, hemos recibido tu solicitud.',
            confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '../index.php';
                }
                });
                } else if (status === "error_correo") {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al enviar el correo de confirmación.',
                        confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = '../index.php';
                                }
                                });
                                } else if (status === "error_actualizacion") {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Hubo un problema al enviar la solicitud.',
                                        confirmButtonText: 'Aceptar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '../index.php';
                                                }
                                                });
                                                }
                     // Eliminar el parámetro 'status' de la URL después de mostrar el mensaje de alerta//
                    const url = new URL(window.location);
                    url.searchParams.delete('status');
                    window.history.replaceState(null, null, url); 
});       