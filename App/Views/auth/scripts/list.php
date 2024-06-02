<script>
    const selectDepartment = document.getElementById('department');
    const selectCity = document.getElementById('city');
    const selectCompany = document.getElementById('company');

    axios.get('../Auth/getStates')
        .then((response) => {
            response.data.states.forEach(state => {
                var option = document.createElement('option');
                option.value = state['id'];
                option.text = state['name'];
                selectDepartment.appendChild(option);
            });
        }).catch((error) => {
            console.log(error);
        })

    selectDepartment.addEventListener('change', () => {
        selectCity.innerHTML = '<option value="" disabled selected>Seleccione una opción...</option>';
        axios.get(`../Auth/getCities/?id=${selectDepartment.value}`)
            .then((response) => {
                response.data.cities.forEach(city => {
                    var option = document.createElement('option');
                    option.value = city['id'];
                    option.text = city['name'];
                    selectCity.append(option);
                });
            }).catch((error) => {
                console.log(error);
            });
    });

    axios.get('../Auth/getCompanies')
        .then((response) => {
            response.data.companies.forEach(company => {
                var option = document.createElement('option');
                option.value = company['id'];
                option.textContent = company['name'];
                selectCompany.append(option);
            });
        }).catch((error) => {
            console.log(error);
        });
</script>