<?php
$id = $_GET['id'];
?>
<script>
    const selectCompany = document.getElementById('company');
    const selectProject = document.getElementById('project');
    const description = document.getElementById('description');
    const btnEdit = document.getElementById('btnEdit');

    axios.get(`../../UserHistory/dataEdit/?id=<?php echo $id; ?>`)
        .then((response) => {
            const data = response.data[0];

            const defaultOptionCompany = document.createElement('option');
            defaultOptionCompany.value = data.company_id;
            defaultOptionCompany.textContent = data.company_name;
            defaultOptionCompany.selected = true;
            selectCompany.appendChild(defaultOptionCompany);

            const defaultOptionProject = document.createElement('option');
            defaultOptionProject.value = data.project_id;
            defaultOptionProject.textContent = data.project_name;
            defaultOptionProject.selected = true;
            selectProject.appendChild(defaultOptionProject);

            description.value = data.description;

            axios.get('../../UserHistory/getCompanies')
                .then((response) => {
                    response.data.forEach(company => {
                        var option = document.createElement('option');
                        option.value = company['company_id'];
                        option.textContent = company['company_name'];
                        selectCompany.appendChild(option);
                    });
                }).catch((error) => {
                    console.log(error);
                });

        }).catch((error) => {
            console.log(error);
        })

    selectCompany.addEventListener('change', () => {
        selectProject.innerHTML = '<option value="" disabled selected>Seleccione una opción...</option>';
        axios.get(`../../UserHistory/getProjects/?id=${selectCompany.value}`)
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

    btnEdit.addEventListener('click', () => {

        let field = true;

        let fields = {
            company: document.getElementById('company'),
            project: document.getElementById('project'),
            description: document.getElementById('description')
        };

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
            };

            axios.patch(`../../UserHistory/update/?id=<?php echo $id; ?>`, data, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                Swal.fire({
                    title: "Registro Actualizado",
                    text: "La historia a sido actualizada exitosamente.",
                    icon: "success",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1e293b'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../UserHistory/index';
                    }
                });
            }).catch((error) => {
                console.log(error);
                Swal.fire({
                    title: "Error",
                    text: "Ha ocurrido un error al momento de actualizar la historia, por favor intente más tarde.",
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