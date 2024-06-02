<script>
    const selectHistoryUser = document.getElementById('history');
    const inputUser = document.getElementById('user');
    const inputCompany = document.getElementById('company');
    const inputProject = document.getElementById('project');
    const selectStatus = document.getElementById('status');
    const btnCreate = document.getElementById('btnCreate');


    axios.get('../Ticket/getHistoriesUsers')
        .then((response) => {

            response.data.forEach(history => {
                var option = document.createElement('option');
                option.value = history['id'];
                option.textContent = history['description'];
                selectHistoryUser.append(option);
            });

        }).catch((error) => {
            console.log(error);
        });

    selectHistoryUser.addEventListener('click', () => {
        axios.get(`../UserHistory/dataEdit/?id=${selectHistoryUser.value}`)
            .then((response) => {
                const data = response.data[0];

                inputCompany.value = data.company_name;
                inputProject.value = data.project_name;
                inputUser.value = data.names + ' ' + data.last_names;

            }).catch((error) => {
                console.log(error);
            })

    });

    axios.get('../Ticket/states')
        .then((response) => {
            response.data.forEach(state => {
                var option = document.createElement('option');
                option.value = state['id'];
                option.textContent = state['name'];

                selectStatus.append(option);
            });
        }).catch((error) => {
            console.log(error);
        })

    btnCreate.addEventListener('click', () => {

        let field = true;

        let fields = {
            history: document.getElementById('history'),
            status: document.getElementById('status'),
            comments: document.getElementById('comments')
        }

        for (let key in fields) {
            if (fields[key].value.trim() === '') {
                fields[key].classList.add('is-invalid');
                field = false;
            } else {
                fields[key].classList.remove('is-invalid');
                fields[key].classList.add('is-valid');
            }
        }

        if (field) {

            let data = {
                history: document.getElementById('history').value,
                status: document.getElementById('status').value,
                comments: document.getElementById('comments').value
            }

            axios.post('../Ticket/store', data, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                Swal.fire({
                    title: "Registro creado",
                    text: "El ticket a sido creado satisfactoriamente.",
                    icon: "success",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../Ticket/index';
                    }
                });
            }).catch((error) => {
                console.log(error);
                Swal.fire({
                    title: "Error",
                    text: "Ha ocurrido un error al registrar el ticket, por favor intente más tarde.",
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