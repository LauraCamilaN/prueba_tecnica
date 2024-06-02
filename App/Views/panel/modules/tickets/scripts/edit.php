<script>
    const selectHistoryUser = document.getElementById('history');
    const inputUser = document.getElementById('user');
    const inputCompany = document.getElementById('company');
    const inputProject = document.getElementById('project');
    const selectStatus = document.getElementById('status');
    const description = document.getElementById('comments');
    const btnEdit = document.getElementById('btnEdit');

    axios.get('../../Ticket/lisEdit/?id=<?php echo $_GET['id']; ?>')
        .then((response) => {
            const data = response.data[0];

            var defaultOptionHistory = document.createElement('option');
            defaultOptionHistory.value = data.user_story_id;
            defaultOptionHistory.textContent = data.description;
            defaultOptionHistory.selected = true;
            selectHistoryUser.appendChild(defaultOptionHistory);
            inputUser.value = data.names + ' ' + data.last_names;
            inputProject.value = data.project_name;
            inputCompany.value = data.company_name;
            description.value = data.comments;

            var defaultOptionState = document.createElement('option');
            defaultOptionState.value = data.status_id;
            defaultOptionState.textContent = data.status;
            defaultOptionState.selected = true;
            selectStatus.appendChild(defaultOptionState);

        }).catch((error) => {
            console.log(error);
        });

    axios.get('../../Ticket/getHistoriesUsers')
        .then((response) => {

            response.data.forEach(history => {
                var option = document.createElement('option');
                option.value = history['id'];
                option.textContent = history['description'];
                selectHistoryUser.appendChild(option);
            });

        }).catch((error) => {
            console.log(error);
        });

    selectHistoryUser.addEventListener('click', () => {
        axios.get(`../../UserHistory/dataEdit/?id=${selectHistoryUser.value}`)
            .then((response) => {
                const data = response.data[0];

                inputCompany.value = data.company_name;
                inputProject.value = data.project_name;
                inputUser.value = data.names + ' ' + data.last_names;

            }).catch((error) => {
                console.log(error);
            })
    });

    axios.get('../../Ticket/states')
        .then((response) => {
            response.data.forEach(state => {
                var option = document.createElement('option');
                option.value = state['id'];
                option.textContent = state['name'];

                selectStatus.appendChild(option);
            });
        }).catch((error) => {
            console.log(error);
        });

    btnEdit.addEventListener('click', () => {

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

            axios.patch('../../Ticket/update/?id=<?php echo $_GET['id'] ?>', data, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                Swal.fire({
                    title: "Registro editado",
                    text: "El ticket ha sido actualizado exitosamente.",
                    icon: "success",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../Ticket/index';
                    }
                });
            }).catch((error) => {
                console.log(error);
            });

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