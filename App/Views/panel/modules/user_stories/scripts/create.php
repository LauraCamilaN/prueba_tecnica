<script>
    const selectCompany = document.getElementById('company');
    const selectProject = document.getElementById('project');
    const btnCreate = document.getElementById('btnCreate');

    axios.get('../UserHistory/getCompanies')
        .then((response) => {
            response.data.forEach(company => {
                var option = document.createElement('option');
                option.value = company['company_id'];
                option.textContent = company['company_name'];
                selectCompany.append(option);
            });
        }).catch((error) => {
            console.log(error);
        });

    selectCompany.addEventListener('change', () => {
        selectProject.innerHTML = '<option value="" disabled selected>Seleccione una opción...</option>';
        axios.get(`../UserHistory/getProjects/?id=${selectCompany.value}`)
            .then((response) => {
                response.data.forEach(project => {
                    var option = document.createElement('option');
                    option.value = project['id'];
                    option.textContent = project['name'];
                    selectProject.append(option);
                });
            }).catch((error) => {
                console.log(error);
            });
    });

    btnCreate.addEventListener('click', () => {

        let field = true;

        let fields = {
            company: document.getElementById('company'),
            project: document.getElementById('project'),
            description: document.getElementById('description')
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

            let data = {
                project: document.getElementById('project').value,
                description: document.getElementById('description').value
            }

            axios.post('../UserHistory/store', data, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                Swal.fire({
                    title: "Registro creado",
                    text: "La historia de usuario ha sido creada exitosamente.",
                    icon: "success",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../UserHistory/index';
                    }
                });
            }).catch((error) => {
                console.log(error);
                Swal.fire({
                    title: "Error",
                    text: "Ocurrio un error al registrar la historia de usuario, por favor intentelo más tarde.",
                    icon: "error",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                });
            })

        } else {
            Swal.fire({
                title: "Campos vacios",
                text: "Recuerda, todos los campos con asterisco son obligatorios.",
                icon: "warning",
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#1e293b'
            });
        }

    });
</script>