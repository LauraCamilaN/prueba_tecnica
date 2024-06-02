<script>
    const inputHistoryUser = document.getElementById('history');
    const inputUser = document.getElementById('user');
    const inputCompany = document.getElementById('company');
    const inputProject = document.getElementById('project');
    const inputStatus = document.getElementById('status');
    const description = document.getElementById('comments');

    axios.get('../../Ticket/lisEdit/?id=<?php echo $_GET['id']; ?>')
        .then((response) => {
            const data = response.data[0];

            inputHistoryUser.value = data.description;
            inputUser.value = data.names + ' ' + data.last_names;
            inputProject.value = data.project_name;
            inputCompany.value = data.company_name;
            description.value = data.comments;
            inputStatus.value = data.status;

        }).catch((error) => {
            console.log(error);
        });
</script>