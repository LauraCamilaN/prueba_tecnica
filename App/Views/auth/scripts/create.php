<script>
    const btnCreate = document.getElementById('btnCreate');

    btnCreate.addEventListener('click', () => {

        let field = true;

        let fields = {
            names: document.getElementById('names'),
            last_names: document.getElementById('last_names'),
            phone: document.getElementById('phone'),
            department: document.getElementById('department'),
            city: document.getElementById('city'),
            email: document.getElementById('email'),
            password: document.getElementById('password'),
            company: document.getElementById('company')
        }

        for (let key in fields) {
            if (fields[key].value.trim() === '') {
                field = false;
                fields[key].classList.add('is-invalid');
            } else {
                fields[key].classList.remove('is-invalid');
                fields[key].classList.add('is-valid');
            }
        }

        if (field) {
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');

            if (phone.value.length > 10) {
                Swal.fire({
                    title: "Número de contacto invalido",
                    text: "El número de contacto puede tener como maximo 10 caracteres",
                    icon: "error",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                });
                phone.classList.add('is-invalid');
            } else {
                axios.get(`../Auth/duplicateUser/?email=${email.value}`)
                    .then((response) => {
                        if (response.data == true) {
                            Swal.fire({
                                title: "Correo electronico duplicado",
                                text: "Ya existe una cuenta registrada con este correo electronico, intente con otra dirección de correo electronico.",
                                icon: "error",
                                confirmButtonText: 'Aceptar',
                                confirmButtonColor: '#1e293b'
                            });
                            email.classList.add('is-invalid');
                        } else {

                            let data = {
                                names: document.getElementById('names').value,
                                last_names: document.getElementById('last_names').value,
                                phone: document.getElementById('phone').value,
                                department: document.getElementById('department').value,
                                city: document.getElementById('city').value,
                                email: document.getElementById('email').value,
                                password: document.getElementById('password').value,
                                company: document.getElementById('company').value
                            }

                            axios.post('../Auth/registerUser', data, {
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then((result) => {
                                    Swal.fire({
                                        title: "Cuenta creada",
                                        text: "Su cuenta ha sido creada exitosamente.",
                                        icon: "success",
                                        confirmButtonText: 'Aceptar',
                                        confirmButtonColor: '#1e293b'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../Auth/login';
                                        }
                                    });
                                }).catch((error) => {
                                    console.log(error);
                                    Swal.fire({
                                        title: "Error",
                                        text: "Ha ocurrido un error al crear su cuenta, por favor intente más tarde.",
                                        icon: "error",
                                        confirmButtonText: 'Aceptar',
                                        confirmButtonColor: '#1e293b'
                                    });
                                });
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
            }
        } else {
            Swal.fire({
                title: "Campos vacios",
                text: "Recuerde, todos los campos con asterisco son obligatorios.",
                icon: "warning",
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#1e293b'
            });
        }

    });
</script>