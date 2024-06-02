<script>
    const users = document.getElementById('users_count');
    const companies = document.getElementById('companies_count');
    const projects = document.getElementById('projects_count');
    const tickets = document.getElementById('tickets_count');

    axios.get('../Home/companies')
        .then((response) => {
            companies.textContent = response.data;
        }).catch((error) => {
            console.log(error);
        });

    axios.get('../Home/projects')
        .then((response) => {
            projects.textContent = response.data;
        }).catch((error) => {
            console.log(error);
        });

    axios.get('../Home/tickets')
        .then((response) => {
            tickets.textContent = response.data;
        }).catch((error) => {
            console.log(error);
        });

    axios.get('../Home/users')
        .then((response) => {
            users.textContent = response.data;
        }).catch((error) => {
            console.llog(error);
        });
</script>