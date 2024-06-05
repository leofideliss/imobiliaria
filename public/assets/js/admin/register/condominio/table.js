"use strict";

var KTCondominioList = function () {
    // Define shared variables

    //Elements
    var table;

    var datatable;
    var filterAdmin;

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_condominios_list_table').DataTable({
            'searchDelay': 500,
            'processing': true,
            'pageLength': 10,
            'order': [[0, 'asc']],
            'ajax': { url: `${urlBase}/condominio/listjson`, dataSrc: "data" },
            'columns': [
                { data: 'photo' },
                { data: 'title' },
                { data: 'condominio_code' },
                { data: 'address' },
                { data: 'id' },
            ],
            "columnDefs": [
                {
                    'targets': 0,
                    'render': function (data, type, row, meta) {
                        return `
                        <img src="${data}" alt="" srcset="" width="48px">
                        `
                    }
                },
                {
                    'targets': -1,
                    'orderable': false,
                    'className': 'text-end',
                    'render': function (data, type, row, meta) {
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
                        <div class="menu-item px-3">
                        <a href="${urlBase}/condominio/edit-condominio/${data}"
                        data-kt-executions-table-filter="exec_name"
                            class="menu-link px-3">Editar</a>
                    </div>
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/condominio/delete-condominio/${data}"
                                data-kt-condominios-list-filter="delete_row">Deletar</a>
                        </div>
                        <!--end::Menu item-->
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
            handleDeleteRows();
            handleSearchDatatable()
            handleFilterDatatable()
            KTMenu.createInstances();
        });
    }


    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-condominios-list-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterAdmin = document.querySelectorAll('[data-kt-condominios-list-filter="caracter_name"] [name="caracter_name"]');
        const filterButton = document.querySelector('[data-kt-condominios-list-filter="search"]');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            // Get filter values
            let nameValue = '';

            // Get payment value
            filterAdmin.forEach(r => {
                if (r.checked) {
                    nameValue = r.value;
                }

                // Reset payment value if "All" is selected
                if (nameValue === 'all') {
                    nameValue = '';
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(nameValue).draw();
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-condominios-list-filter="delete_row"]');

        deleteButtons.forEach(d => {
            var urlDelete = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const caractName = parent.querySelectorAll('td')[1].innerText;
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem certeza de que deseja excluir " + caractName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, excluir!",
                    cancelButtonText: "Não, cancelar",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "Você excluiu " + caractName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // delete row data from server and re-draw datatable
                            $.ajax({
                                url: urlDelete,
                                type: 'delete',
                                data:{
                                    "_token": $("input[name=csrf_token]").val()
                                },
                                dataType: 'json',
                                success: function (e) {
                                    // console.log('success', e)
                                },
                                error: function (e) {
                                    console.log('error', e)
                                },
                                complete: function (e) {
                                    datatable.ajax.reload();
                                 
                                }
                            })
                
                        });

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: caractName + " não foi deletado.",
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
   
            table = document.querySelector('#kt_condominios_list_table');
            if (!table) {
                return
            }
         
            initDatatable();
            handleDeleteRows()
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCondominioList.init();
});