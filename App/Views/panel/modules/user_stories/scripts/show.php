<?php
$id = $_GET['id'];
?>
<script>
    const company = document.getElementById('company');
    const project = document.getElementById('project');
    const description = document.getElementById('description');
    const user = document.getElementById('user');
    const title = document.getElementById('user_history');

    axios.get(`../../UserHistory/dataEdit/?id=<?php echo $id; ?>`)
        .then((response) => {
            const data = response.data[0];

            company.value = data.company_name;
            project.value = data.project_name;
            description.value = data.description;
            user.value = data.names + ' ' + data.last_names;
            title.textContent = 'Información de la historia del usuario: ' + data.names + ' ' + data.last_names;

        }).catch((error) => {
            console.log(error);
        })
</script>