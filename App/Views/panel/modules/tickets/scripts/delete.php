<script>
    $(document).ready(function() {
        $('.btnDelete').on('click', function() {
            let id = $(this).data('id');

            axios.delete(`../Ticket/delete/?id=${id}`)
                .then((response) => {
                    Swal.fire({
                        title: "¿Estas seguro de eliminar este registro?",
                        text: "Recuerda, una vez hayas realizado esto no podras recuperar este registro.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1e293b",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Eliminar",
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Registro eliminado",
                                text: "El ticket ha sido eliminado exitosamente.",
                                confirmButtonText: "Aceptar",
                                confirmButtonColor: "#1e293b",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    });
                }).catch((error) => {
                    console.log(error);
                    Swal.fire({
                        title: "Error",
                        text: "El ticket no ha sido eliminado exitosamente.",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#1e293b",
                        icon: "error"
                    })
                })
        });
    });
</script>