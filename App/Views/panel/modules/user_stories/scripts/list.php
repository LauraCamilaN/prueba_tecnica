<script>
    const list = document.getElementById('listUserStories');
    axios.get('../UserHistory/list')
        .then((response) => {
            const usersStories = response.data;

            usersStories.forEach(user => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <p class="text-sm text-dark mb-0">${user['names']} ${user['last_names']}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark mb-0">${user['project_name']}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-dark mb-0">${user['company_name']}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="../UserHistory/edit/?id=${user['id_user_stories']}" class="btn btn-info btn-sm" data-bs-toggle="tooltip">
                                                <iconify-icon icon="clarity:edit-solid" width="15" height="15"  style="color: with"></iconify-icon>
                                            </a>
                                            <a href="../UserHistory/show/?id=${user['id_user_stories']}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip">
                                            <iconify-icon icon="carbon:view-filled" width="15" height="15"  style="color: white"></iconify-icon>
                                            </a>
                                        </td>
                `
                list.appendChild(tr);
            });

        }).catch((error) => {
            console.log(error);
        });
</script>