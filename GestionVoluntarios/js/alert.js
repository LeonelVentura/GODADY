const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
     }
    });
     Toast.fire({
     icon: "error",
     title: "Error!",
     text: "El correo ya se encuentra registrado. Por favor, verifica la información e inténtalo de nuevo.",
     

    }).then((result) => {
            if (result.isConfirmed) {
                window.location = "FormularioVoluntariado.php";
            }
            }); 
            const url = new URL(window.location);
                url.searchParams.delete("result");
                window.history.replaceState(null, null, url); 