<script>
    const table = document.getElementById('tableTicket');

    axios.get('../Ticket/list')
        .then((response) => {
            response.data.forEach(ticket => {
                const tr = document.createElement('tr');
                tr.innerHTML = ` 
                <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <p class="text-sm text-dark mb-0">${ticket['company_name']}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark mb-0">${ticket['prject_name']}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-dark mb-0">${ticket['status']}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-dark mb-0">${ticket['user_story_id']}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="../Ticket/edit/?id=${ticket['ticket_id']}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" data-container="body" data-animation="true">
                                                <iconify-icon icon="clarity:edit-solid" width="15" height="15"  style="color: with"></iconify-icon>
                                            </a>
                                            <a href="../Ticket/show/?id=${ticket['ticket_id']}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver" data-container="body" data-animation="true">
                                            <iconify-icon icon="carbon:view-filled" width="15" height="15"  style="color: white"></iconify-icon>
                                            </a>
                                            <a class="btn btn-danger btn-sm btnDelete" data-id="${ticket['ticket_id']}" data-bs-placement="top" title="Eliminar" data-container="body" data-animation="true" id="btnDelete">
                                            <iconify-icon icon="wpf:delete" width="15" height="15"  style="color: white"></iconify-icon>
                                            </a>
                                        </td>
                
                `;
                table.appendChild(tr);
            });

        }).catch((error) => {
            console.log(error);
        })
</script>
<?php
require_once(__DIR__ . '/delete.php');
