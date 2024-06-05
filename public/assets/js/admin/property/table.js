"use strict";

var KTPropertiesList = function () {
    // Define shared variables

    //Elements
    var table;

    var datatable;
    var filterAdmin;

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_properties_list_table').DataTable({
            'searchDelay': 500,
            'processing': true,
            'serverSide': true,
            'pageLength': 10,
            // 'order': [[0, 'asc']],
            'ajax': { url: `${urlBase}/property/listPropertiesJson`, dataSrc: "data" },
            'columns': [
                { data: 'photo' },
                { data: 'propriedadesArray' },
                // { data: 'prop_code' },
                // { data: 'category_prop' },
                // { data: 'prop_value' },
                { data: 'available' },
                { data: 'id' },
            ],
            "columnDefs": [
                {
                    'targets': 0,
                    'render': function (data, type, row, meta) {
                        return `
                        <img src="${data}" alt="" srcset="" width="200px">
                        `
                    }
                },
                {
                    'targets': 1,
                    'render': function (data, type, row, meta) {

                        const formatter = new Intl.NumberFormat('pt-br', {
                            style: 'currency',
                            currency: 'BRL',

                            // These options are needed to round to whole numbers if that's what you want.
                            //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                        });

                        let condDiv = '';
                        if (data.possuiCond == 1) {
                            condDiv = `
                                <div style="font-size: 11px">Condomínio R$</div>
                                <div style="font-weight: bold;font-size: 11px">${formatter.format(data.precoCond)}</div>
                            `;

                            // condNome = `
                            // <div style="font-size: 11px">Condomínio:</div>
                            // <div style="font-weight: bold;font-size: 11px">${data.nomeCondominio}</div>
                            // `;
                        }

                        const dataCriacao = new Date(data.dataCriacao.date); // Converte a string da data para um objeto Date
                        const opcoesFormato = { day: '2-digit', month: '2-digit', year: 'numeric' };
                        const dataFormatada = dataCriacao.toLocaleDateString('pt-BR', opcoesFormato);

                        return `
                            <div style="display:flex;">
                                <div style="display:flex;flex-direction:column;width:60%;padding:0px 20px">
                                    <div style="display: flex;justify-content: space-between;align-items: center;"> 
                                        <div style="background-color: #eeaa11;color: white;border-radius: 7px;align-self: flex-start;padding: 2px 8px 2px 8px;margin-bottom: 10px;font-size: 12px">${data.categoria}</div>
                                        <span style="font-size: 11px;"><i class="fa-solid fa-calendar-days" style="color: black;margin-right: 5px;"></i>${dataFormatada}</span>
                                    </div>

                                    <div style="font-weight: bold;">${data.title}</div>
                                    <div style="font-size: 11px;margin-bottom:10px">${data.endereco}</div>
                                    
                                    <div style="font-size: 11px;">
                                        <span style="font-weight: bold;font-size: 11px;">${data.code}</span>
                                        /
                                        <span style="font-size: 11px;">${data.user_name}</span>
                                    </div>
                                </div>
                                <div style="display:flex;flex-direction:column;width:20%;padding:0px 20px">
                                    <div style="font-size: 11px">Venda</div>
                                    <div style="font-weight: bold;font-size: 11px">${formatter.format(data.price)}</div>
                                    <div style="font-size: 11px">Preço do m²</div>
                                    <div style="font-weight: bold;font-size: 11px">${formatter.format(data.precom2)}</div>
                                    ${condDiv}
                                </div>
                                <div style="display:flex;flex-direction:column;width:20%;padding:0px 20px">
                                    <div style="font-size: 11px">Área (m²)</div>
                                    <div style="font-weight: bold;font-size: 11px">${data.area}</div>
                                    <div style="font-size: 11px">Dormitórios</div>
                                    <div style="font-weight: bold;font-size: 11px">${data.dormitorios}</div>
                                    <div style="font-size: 11px">Banheiros</div>
                                    <div style="font-weight: bold;font-size: 11px">${data.banheiros}</div>
                                    <div style="font-size: 11px">Vagas</div>
                                    <div style="font-weight: bold;font-size: 11px">${data.vagas}</div>
                                </div>
                            </div>
                        `;
                    }
                },
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
                // {
                //     'targets': 4,
                //     'orderable': false,
                //     'render': function (data, type, row, meta) {
                //         const formatter = new Intl.NumberFormat('pt-br', {
                //             style: 'currency',
                //             currency: 'BRL',

                //             // These options are needed to round to whole numbers if that's what you want.
                //             //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                //             //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                //         });
                //         return `<span>${formatter.format(data)} </span>`
                //     }
                // },
                {
                    'targets': -1,
                    'orderable': false,
                    'className': 'text-end',
                    'render': function (data, type, row, meta) {
                        let stringHTML
                        if (row.available == 1) {
                            stringHTML = `
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                    <a type="submit" class="menu-link px-3"
                                    href="${urlBase}/property/alterStatus" data-id="${data}" data-available="0"
                                    data-kt-properties-list-filter="update_row">Desabilitar</a>
                            </div>
                            <!--end::Menu item-->`
                        }
                        if (row.available == 0) {
                            stringHTML = `
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                    <a type="submit" class="menu-link px-3"
                                    href="${urlBase}/property/alterStatus" data-id="${data}" data-available="1"
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
                        <div class="menu-item px-3">
                        <a href="${urlBase}/property/edit-property/${data}"
                        data-kt-executions-table-filter="exec_name"
                            class="menu-link px-3">Editar</a>
                    </div>
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/property/delete-property/${data}"
                                data-kt-properties-list-filter="delete_row">Deletar</a>
                        </div>
                        <!--end::Menu item-->
                      ${stringHTML}

                      <!--begin::Menu item-->
                      <div class="menu-item px-3">
                              <a type="submit" class="menu-link px-3"
                              href="${urlBase}/property/resumo-property/${data}"
                              data-kt-properties-list-filter="resume_row">Resumo</a>
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
            handleUpdateStatus();
            handleSearchDatatable()
            handleFilterDatatable()
            handleResume()
            KTMenu.createInstances();
        });
    }


    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-properties-list-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterAdmin = document.querySelectorAll('[data-kt-properties-list-filter="property_name"] [name="property_name"]');
        const filterButton = document.querySelector('[data-kt-properties-list-filter="search"]');

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
                                data: {
                                    prop_id: prop_id,
                                    status: prop_status,
                                },
                                async: false,
                                success: function (e) {
                                    console.log('success', e)
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

    var handleResume = () => {
        // Select all delete buttons
        const resumeButtons = document.querySelectorAll('[data-kt-properties-list-filter="resume_row"]');

        resumeButtons.forEach(d => {
            var urlResume = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();
                location.href = urlResume
            })
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-properties-list-filter="delete_row"]');

        deleteButtons.forEach(d => {
            var urlDelete = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const propertieName = parent.querySelectorAll('td')[1].innerText;
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem certeza de que deseja excluir " + propertieName + "?",
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
                            text: "Você excluiu " + propertieName + "!.",
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
                                },
                                complete: function (e) {
                                    $.ajax({
                                        url: `${urlBase}/property/generateMapJson`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function (e) {
                                            console.log('success', e)
                                        },
                                        error: function (e) {
                                            console.log('error', e)
                                        }
                                    })
                                }
                            })
                            datatable.draw();
                        });

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: propertieName + " não foi deletado.",
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

    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }

    var handleDownloadXML = function () {
        $("body").on("click", "[data-action=export_xml]", function (e) {
            e.preventDefault();

            let imoveis
            $.ajax({
                url: `${urlBase}/property/listPropertiesActivesJson`,
                type: 'get',
                dataType: 'json',
                async: false,
                success: function (e) {
                    console.log('success', e)
                    imoveis = e.itens
                },
                error: function (e) {
                    console.log('error', e)
                },
                complete: function (e) {

                }
            })



            let desenvolvedor = ''
            let email_dev = 'contato@.com.br'
            let nome_cliente = 'João'
            let tel_cliente = '18997093231'
            let data = new Date(Date.now()).toISOString();




            let header = `<?xml version="1.0" encoding="UTF-8"?>
            <ListingDataFeed xmlns="http://www.vivareal.com/schemas/1.0/VRSync"
                 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                 xsi:schemaLocation="http://www.vivareal.com/schemas/1.0/VRSync  http://xml.vivareal.com/vrsync.xsd">
   <Header>
   <Provider>${desenvolvedor}</Provider>
   <Email>${email_dev}</Email>
   <ContactName>${nome_cliente}</ContactName>
   <PublishDate>${data}</PublishDate>
   <Telephone>${tel_cliente}</Telephone>
   </Header> 
   <Listings>`

            let footer = `      </Listings>
            </ListingDataFeed>`


            let xml
            imoveis.forEach(imovel => {
                let transaction
                let value
                let url_video = ''

                if (imovel.imoveis.url_video != '')
                    url_video = `<Item medium="video">${imovel.imoveis.url_video}</Item>`

                switch (imovel.imoveis.category) {
                    case 'Venda':
                        transaction = 'For Sale'
                        value = imovel.imoveis.prop_price
                        break;
                    case 'Aluguel':
                        transaction = 'For Rent'
                        value = imovel.imoveis.prop_rent
                        break;
                    case 'Venda e Aluguel':
                        transaction = 'Sale/Rent'
                        break;

                    default:

                        break;
                }

                let images = ''
                imovel.photo.forEach((element, i) => {
                    images += `<Item medium="image" caption="img${i}" primary="true">${element.pathname}</Item>`
                });

                let caracteristicas = ''
                imovel.caracteristicas.forEach(element => {

                    caracteristicas += `<Feature>${element.name}</Feature>`
                });

                xml = `
                     <Listing>
                      <ListingID>${imovel.imoveis.prop_code}</ListingID>
                      <Title>${imovel.imoveis.title}</Title>
                      <TransactionType>${transaction}</TransactionType>
                      <PublicationType>STANDARD</PublicationType>
                      <DetailViewUrl>http://www.grupozap.com.br/imoveis/${imovel.imoveis.prop_code}</DetailViewUrl>
                      <Media>
                        ${url_video}
                        ${images}
                      </Media>
                      <Details>
                          <UsageType>Residential</UsageType>
                          <PropertyType>${imovel.type.name}</PropertyType>
                          <Description><![CDATA[${imovel.imoveis.description}]]></Description>
                          <ListPrice currency="BRL">${value}</ListPrice>
                          <LotArea unit="square metres">${imovel.imoveis.prop_size}</LotArea>
                          <LivingArea unit="square metres">${imovel.imoveis.prop_size}</LivingArea>
                          <PropertyAdministrationFee currency="BRL">${imovel.imoveis.condominium_price}</PropertyAdministrationFee>
                          <YearlyTax currency="BRL">${imovel.imoveis.iptu_price}</YearlyTax>
                          <Bedrooms>${imovel.imoveis.bedroom}</Bedrooms>
                          <Bathrooms>${imovel.imoveis.bathrooms}</Bathrooms>
                          <Floors>0</Floors>
                          <Buildings>1</Buildings>
                          <Suites>${imovel.imoveis.suites}</Suites>
                          <Garage type="Parking Space">${imovel.imoveis.garage}</Garage>
                          <Features>
                            ${caracteristicas}
                             
                          </Features>
                      </Details>
                      <Location displayAddress="Street">
                          <Country abbreviation="BR">Brasil</Country>
                          <State abbreviation="SP">${imovel.imoveis.state_name}</State>
                          <City>${imovel.imoveis.city_name}</City>
                          <Zone></Zone>
                          <Neighborhood>${imovel.imoveis.district}</Neighborhood>
                          <Address>${imovel.imoveis.street}</Address>
                          <StreetNumber>${imovel.imoveis.number}</StreetNumber>
                          <Complement>${imovel.imoveis.complement}</Complement>
                          <PostalCode>${imovel.imoveis.CEP}</PostalCode>
                          <Latitude>${imovel.imoveis.lng}</Latitude>
                          <Longitude>${imovel.imoveis.lat}</Longitude>
                      </Location>
                      <ContactInfo>
                          <Name></Name>
                          <Email>contato@sevimoveis.com</Email>
                          <Website>https://development..com/</Website>
                          <Logo>https://development..com/assets/img/logo/logo-project.png</Logo>
                          <OfficeName>Sevimoveis</OfficeName>
                          <Telephone>(11) 3150-4646</Telephone>
                          <Location>
                             <Country abbreviation="BR">Brasil</Country>
                             <State abbreviation="SP">Sao Paulo</State>
                             <City>São Paulo</City>
                             <Neighborhood>Alto da Mooca</Neighborhood>
                             <Address>Rua Joá, 1890</Address>
                             <PostalCode>03178-200</PostalCode>
                          </Location>
                      </ContactInfo>
                     </Listing>
             
                `
            });

            let arquivo = header + xml + footer;

            download("imoveis.xml", arquivo);
        });
    }

    var handleImportXml = function () {
        var properties
        $("body").on("click", "[data-action=import_xml]", function (e) {
            $.ajax({
                url: `${urlBase}/formatedDataXml`,
                type: 'get',
                dataType: 'json',
                async: false,
                success: function (e) {
                    e.forEach(element => {
                        $.ajax({
                            url: ``,
                            type: 'GET',
                            async: false,
                            success: function (e) {
                                element.street = e.street
                                element.district = e.neighborhood
                                element.city_name = e.city

                            },
                            error: function (e) {
                                console.log('error', e)
                            }
                        })
                    });
                    properties = e;
                },
                error: function (e) {
                    console.log('error', e)
                },
                complete: function (e) {
                    $.ajax({
                        url: `${urlBase}/addPropertyXML`,
                        type: 'post',
                        async: false,
                        data: {
                            properties: properties,
                            "_token": $("input[name=csrf_token]").val()
                        },
                        success: function (e) {
                            console.log('add imoveis', e)

                        },
                        error: function (e) {
                            console.log('error imoveis', e)
                        }
                    })
                }
            })

        })
    }

    return {
        // Public functions  
        init: function () {

            table = document.querySelector('#kt_properties_list_table');
            if (!table) {
                return
            }

            initDatatable();

            // handleDownloadXML()

            // handleImportXml()
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTPropertiesList.init();
});