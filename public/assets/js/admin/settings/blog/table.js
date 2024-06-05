"use strict";

var KTPostsList = function () {
    // Define shared variables

    //Elements
    var table;

    var datatable;
    var filterAdmin;
    var modal
    var cancelButtonComments
    var deleteButtonComments
    const urlBase = window.location.protocol + "//" + window.location.host;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_posts_table').DataTable({
            'searchDelay': 500,
            'processing': true,
            'serverSide': true,
            'pageLength': 10,
            // 'order': [[0, 'asc']],
            'ajax': { url: `${urlBase}/posts/getAllpost`, dataSrc: "data" },
            'columns': [
                { data: 'image_path' },
                { data: 'title' },

                { data: 'id' },
            ],
            "columnDefs": [
                {
                    'targets': 0,
                    'render': function (data, type, row, meta) {
                        return `
                        <img src="${data}" alt="" width="48px">
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
                        <a href="${urlBase}/posts/editPost/${data}"
                        data-kt-post-edit="editPost"
                            class="menu-link px-3">Editar</a>
                    </div>
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/posts/deletePost/${data}"
                                data-kt-post-filter="delete_row">Deletar</a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/posts/getCommentsByPost/${data}"
                                data-kt-post-filter="comment_rows">Comentários</a>
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
            handleEditRows()
            handleSearchDatatable()
            handleFilterDatatable()
            handleCommentRows()
            KTMenu.createInstances();
        });
    }


    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-post-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterAdmin = document.querySelectorAll('[data-kt-post-filter="post_name"] [name="post_name"]');
        const filterButton = document.querySelector('[data-kt-post-filter="search"]');

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

    var handleEditRows = () => {
        // Select all delete buttons
        const editButtons = document.querySelectorAll('[data-kt-post-edit="editPost"]');

        editButtons.forEach(d => {
            var urlEdit = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();
                console.log('edit', urlEdit)
                var post
                $.ajax({
                    url: urlEdit,
                    type: 'GET',
                    success: function (e) {
                        post = e.post
                        console.log('success', e)
                    },
                    error: function (e) {
                        console.log('error', e)
                    },
                    complete: function (e) {
                        $("#name_post").val(post.title)
                        $("#tipo_post").val(post.type_post)
                        PostEditor.setData(post.content_text)
                        $("#previewImg").show()
                        $("#previewImg").attr('src', `${urlBase}/storage_posts/${post.image_path}`)
                        $(modal).modal('show')
                        $("#post_id").val(post.id)
                    }
                })

            })
        })
    }

    var handleCommentRows = () => {
        // Select all comments
        const commentButtons = document.querySelectorAll('[data-kt-post-filter="comment_rows"]');

        commentButtons.forEach(d => {
            var urlComment = d.href

            d.addEventListener('click', function (e) {
                e.preventDefault();
                $("#kt_modal_new_comentario").modal('show')
                $("#loading_comments").show();
                let tableComments = $("#kt_table_delete_comments tbody")
                $(tableComments).empty()

                setTimeout(() => {
                    $.ajax({
                        url: urlComment,
                        type: 'GET',
                        dataType: 'json',
                        success: function (e) {

                            $("#post_id").val(e.post_id)
                        },
                        error: function (e) {
                            console.log('error', e)
                        },
                        complete: function (e) {
                            $("#loading_comments").hide();

                            let comments = e.responseJSON.comments
                            comments.forEach(element => {
                                $(tableComments).append(`<tr class="odd">
                                <td>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="checkboxComentarioPost" data-id="${element.id}">
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
    
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                            ${element.name}
                                            </div>
                                            <!--end::Title-->
    
                                            <!--begin::Price-->
                                            <div class="fw-semibold fs-7">
                                                E-mail: 
                                                <span>
                                                 ${element.email}
                                                </span>
                                            </div>
                                            <!--end::Price-->
    
                                            <!--begin::SKU-->
                                            <div class="text-muted fs-7">
                                               ${element.comment.substring(0, 20)}
                                            </div>
                                            <!--end::SKU-->
                                        </div>
                                    </div>
                                </td>
                            </tr>`)
                            });
                        }
                    })
                }, 1000);

            })
        })
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-post-filter="delete_row"]');

        deleteButtons.forEach(d => {
            var urlDelete = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const titelName = parent.querySelectorAll('td')[1].innerText;
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem certeza de que deseja excluir " + titelName + "?",
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
                            text: "Você excluiu " + titelName + "!.",
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
                                url: urlDelete,
                                type: 'delete',
                                dataType: 'json',
                                async: false,
                                success: function (e) {
                                    console.log('success', e)
                                },
                                error: function (e) {
                                    console.log('error', e)
                                }
                            })
                            datatable.draw();
                        });

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: titelName + " não foi deletado.",
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

    var handleCloseModal = function () {
        cancelButtonComments.addEventListener('click', function (e) {
            e.preventDefault()
            $("#kt_modal_new_comentario").modal('hide')

        })
    }
    var handleDeleteComments = function () {
        deleteButtonComments.addEventListener('click', function (e) {
            e.preventDefault()
            let arrayDelete = []
            $("input[name='checkboxComentarioPost']").each(function (e) {
                if ($(this).is(':checked'))
                    arrayDelete.push($(this).data('id'))
            })
            if (arrayDelete.length == 0) {
                Swal.fire({
                    text: "Nenhum comentário selecionado",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK, entendi!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                });
                return
            }
            let tableComments = $("#kt_table_delete_comments tbody")

            $.ajax({
                url: `${urlBase}/posts/deleteCommentsByPost`,
                type: 'delete',
                dataType: 'json',
                data: {
                    'arrayDelete': arrayDelete,
                    '_token': $('input[name="csrf_token"]').val()
                },
                beforeSend: function (e) {
                    $(tableComments).empty()
                    $("#loading_comments").show();

                },
                success: function (e) {
                    console.log('success', e)
                    showToastSuccessMessageJSON(e);

                    $.ajax({
                        url: `${urlBase}/posts/getCommentsByPost/${$("#post_id").val()}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (e) {

                        },
                        error: function (e) {
                            console.log('error', e)
                        },
                        complete: function (e) {

                    $("#loading_comments").hide();

                            let comments = e.responseJSON.comments
                            comments.forEach(element => {
                                $(tableComments).append(`<tr class="odd">
                                <td>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="checkboxComentarioPost" data-id="${element.id}">
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
    
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                            ${element.name}
                                            </div>
                                            <!--end::Title-->
    
                                            <!--begin::Price-->
                                            <div class="fw-semibold fs-7">
                                                E-mail: 
                                                <span>
                                                 ${element.email}
                                                </span>
                                            </div>
                                            <!--end::Price-->
    
                                            <!--begin::SKU-->
                                            <div class="text-muted fs-7">
                                               ${element.comment.substring(0, 20)}
                                            </div>
                                            <!--end::SKU-->
                                        </div>
                                    </div>
                                </td>
                            </tr>`)
                            });
                        }
                    })

                },
                error: function (e) {
                    showToastErrorMessageJSON(e)
                    console.log('error', e)
                }
            })
        })
    }

    return {
        // Public functions  
        init: function () {
            table = document.querySelector('#kt_posts_table');
            if (!table) {
                return
            }
            modal = document.querySelector('#kt_modal_new_post');
            cancelButtonComments = $("#kt_modal_comments_cancel")[0]
            deleteButtonComments = $("#kt_modal_comments_submit")[0]


            initDatatable();
            handleCloseModal()
            handleDeleteComments()
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTPostsList.init();
});