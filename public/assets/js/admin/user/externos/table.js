"use strict";

var KTExternalUsersList = function () {
    // Define shared variables

    //Elements
    var table;

    var datatable;
    var filterAdmin;

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_external_users').DataTable({
            'searchDelay': 500,
            'processing': true,
            'serverSide': true,
            'pageLength': 10,
            'order': [[0, 'asc']],
            'ajax': { url: `${urlBase}/user/listExternalUsers`, dataSrc: "data" },
            'columns': [
                { data: 'name' },
                { data: 'email' },
                { data: 'status' },
                { data: 'id' },
            ],
            "columnDefs": [
                {
                    'targets': 2,
                    'orderable': false,
                    'render': function (data, type, row, meta) {
                        let statusClass = '';
                        let status
                        if (type == 'display') {
                            switch (data) {
                                case 0:
                                    statusClass = 'badge-light-danger'
                                    status = "Desativado"
                                    break;
                                case 1:
                                    statusClass = 'badge-light-success'
                                    status = "Ativo"

                                    break;
                            }
                        }

                        return `     
                    <div
                       <span class="badge ${statusClass}">${status}</span>
                    </div>`;
                    }
                },
                {
                    'targets': -1,
                    'orderable': false,
                    'className': 'text-end',
                    'render': function (data, type, row, meta) {
                        let stringHTML
                        if (row.status == 1) {
                            stringHTML = `
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                    <a type="submit" class="menu-link px-3"
                                    href="${urlBase}/user/alterStatusCustomer" data-id="${data}" data-available="0"
                                    data-kt-properties-list-filter="update_row">Desabilitar</a>
                            </div>
                            <!--end::Menu item-->`
                        }
                        if (row.status == 0) {
                            stringHTML = `
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                    <a type="submit" class="menu-link px-3"
                                    href="${urlBase}/user/alterStatusCustomer" data-id="${data}" data-available="1"
                                    data-kt-properties-list-filter="update_row">Ativar</a>
                            </div>
                            <!--end::Menu item-->`
                        }
                        return `
                        <a href="#"
                        class="btn btn-sm btn-light btn-active-light-primary"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        Ações
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                        data-kt-menu="true">
                        
                      ${stringHTML}
                    </div>
                    <!--end::Menu-->
                        `
                    }
                }

            ],

        });

        table = datatable.$;

        // Re-init functions on datatable re-draws
        datatable.on('draw', function () {
            handleUpdateStatus()
            KTMenu.createInstances();
        });
    }
    var handleUpdateStatus = () => {
        // Select all delete buttons
        const updateBotton = document.querySelectorAll('[data-kt-properties-list-filter="update_row"]');

        updateBotton.forEach(d => {
            var urlUpdate = d.href
            var prop_id = $(d).data("id")
            var prop_status = $(d).data("available")
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const propertieName = parent.querySelectorAll('td')[1].innerText;
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem certeza de que deseja alterar o status " + propertieName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, alterar!",
                    cancelButtonText: "Não, cancelar",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "Você alterou o status " + propertieName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // delete row data from server and re-draw datatable
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('input[name="csrf_token"]').val()
                                }
                            });
                            $.ajax({
                                url: urlUpdate,
                                type: 'post',
                                dataType: 'json',
                                data:{
                                    id: prop_id,
                                    status: prop_status,
                                },
                                async: false,
                                success: function (e) {
                                    // console.log('success', e)
                                },
                                error: function (e) {
                                    console.log('error', e)
                                },
                                complete: function (e) {
                           
                                }
                            })
                            datatable.draw();
                        });

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: propertieName + " não foi atualizado.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    return {
        // Public functions  
        init: function () {
            table = document.querySelector('#kt_external_users');
            if (!table) {
                return
            }

            initDatatable();
            // handleSearchDatatable();
            // handleFilterDatatable();
            // handleDeleteRows();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTExternalUsersList.init();
});