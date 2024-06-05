"use strict";

var KTXMLList = function () {
    // Define shared variables

    //Elements
    var table;

    var datatable;
    var filterAdmin;
    var validator;
    var form
    var file_title
    var traduction = [];
    traduction['Administration'] = 'Administração';
    traduction['Alarm System'] = 'Sistema de alarme';
    traduction['Armored Security Cabin'] = 'Guarita blindada';
    traduction['Backyard'] = 'Quintal';
    traduction['Balcony'] = 'Varanda';
    traduction['Band Practice Room'] = 'Garage band';
    traduction['Bathtub'] = 'Banheira';
    traduction['Bar'] = 'Bar';
    traduction['Barbecue Balcony'] = 'Churrasqueira na varanda';
    traduction['BBQ'] = 'Churrasqueira';
    traduction['Beauty Room'] = 'Espaço de beleza';
    traduction['Bicycles Place'] = 'Bicicletário';
    traduction['Builtin Wardrobe'] = 'Armário embutido';
    traduction['Caretaker'] = 'Zelador';
    traduction['Caretaker House'] = 'Casa de caseiro';
    traduction['Cable Television'] = 'TV a cabo';
    traduction['Close to hospitals'] = 'Perto de hospitais';
    traduction['Close to main roads/avenues'] = 'Perto de vias de acesso';
    traduction['Close to public transportation'] = 'Perto de transporte público';

    traduction['Close to schools'] = 'Perto de Escolas';
    traduction['Close to shopping centers'] = 'Perto de Shopping Center';
    traduction['Closet'] = 'Closet';
    traduction['Controlled Access'] = 'Vigia';
    traduction['Cooling'] = 'Ar condicionado';
    traduction['Copa'] = 'Copa';
    traduction['Digital Locker'] = 'Fechadura digital';
    traduction['Dinner Room'] = 'Sala de jantar';
    traduction['Eco Condominium'] = 'Condomínio sustentável';

    traduction['Eco Garbage Collector'] = 'Coleta seletiva de lixo';
    traduction['Edicule'] = 'Edícula';
    traduction['Elevator'] = 'Elevador';
    traduction['Eletric Charger'] = 'Carregador eletrônico para carro e bicicleta';
    traduction['Exterior View'] = 'Vista exterior';
    traduction['Fireplace'] = 'Lareira';
    traduction['Fitness Room'] = 'Espaço fitness';
    traduction['Fully Wired'] = 'Cabeamento estruturado';
    traduction['Furnished'] = 'Mobiliado';
    traduction['Game room'] = 'Salão de jogos';
    traduction['Garden Area'] = 'Jardim';
    traduction['Geminada'] = 'Geminada';
    traduction['Generator'] = 'Gerador elétrico';
    traduction['Gourmet Area'] = 'Espaço gourmet';
    traduction['Gourmet Balcony'] = 'Varanda gourmet';
    traduction['Gourmet Kitchen'] = 'Cozinha Gourmet';
    traduction['Gravel'] = 'Cascalho';
    traduction['Green space / Park'] = 'Espaço verde / Parque';
    traduction['Gym'] = 'Academia';
    traduction['Heating'] = 'Aquecimento';
    traduction['Home Office'] = 'Escritório';
    traduction['Indoor Soccer'] = 'Quadra de futebol';
    traduction['Intercom'] = 'Interfone';
    traduction['Internet Connection'] = 'Conexão à internet';
    traduction['Jogging track'] = 'Pista de cooper';
    traduction['Kitchen'] = 'Cozinha';
    traduction['Kitchen Cabinets'] = 'Armário na cozinha';
    traduction['Lake View'] = 'Vista para lago';
    traduction['Integrated Environments'] = 'Ambientes integrados';
    traduction['Land'] = 'Terra';
    traduction['Large Kitchen'] = 'Cozinha grande';
    traduction['Large Window'] = 'Janela grande';
    traduction['Laundry'] = 'Lavanderia';
    traduction['Lawn'] = 'Gramado';
    traduction['Lunch Room'] = 'Sala de almoço';
    traduction["Maid's Quarters"] = 'Área de serviço';
    traduction['Massage Room'] = 'Cinema';
    traduction['Meeting Room'] = 'Sala de reunião';
    traduction['Mezzanine'] = 'Mezanino';
    traduction['Mountain View'] = 'Vista para a montanha';
    traduction['Number of stories'] = 'Mais de um andar';
    traduction['Ocean View'] = 'Vista para o mar';
    traduction['Parking Garage'] = 'Garagem';
    traduction['Party Room'] = 'Salão de Festas';
    traduction['Patrol'] = 'Ronda/Vigilância';
    traduction['Paved Street'] = 'Rua asfaltada';
    traduction['Pay-per-use Services'] = 'Serviço pay per use';
    traduction['Pets Allowed'] = 'Permite animais';
    traduction['Pet Space'] = 'Espaço Pet';
    traduction['Playground'] = 'Playground';
    traduction['Pool'] = 'Piscina';
    traduction['Reception room'] = 'Recepção';
    traduction['Recreation Area'] = 'Área de lazer';
    traduction['Reflective Pool'] = 'Playground';
    traduction['Playground'] = "Espelhos d'água";
    traduction['Sand Pit'] = 'Quadra de areia';
    traduction['Sauna'] = 'Sauna';
    traduction['Security Guard on Duty'] = 'Segurança 24h';
    traduction['Semi Olympic Pool'] = 'Piscina semi-olímpica';
    traduction['Smart Apartment'] = 'Apartamento inteligente';
    traduction['Smart Condominium'] = 'Condomínio inteligente';
    traduction['Solar Energy'] = 'Energia solar';
    traduction['Spa'] = 'Spa';
    traduction['Sports Court'] = 'Quadra poliesportiva';
    traduction['Square'] = 'Praça';
    traduction['Squash'] = 'Quadra de squash';
    traduction['Stair'] = 'Escada';
    traduction['Stores'] = 'Loja';
    traduction['Tennis court'] = 'Quadra de tênis';
    traduction['TV Security'] = 'Circuito de segurança';
    traduction['Utilities'] = 'públicos essenciais';
    traduction['Valet Parking'] = 'Manobrista';
    traduction['Warehouse'] = 'Depósito';
    traduction['Water Tank'] = 'Reservatório de água';
    // tipos de imoveis

    traduction['Residential / Apartment'] = 'Apartamento';
    traduction['Residential / Home'] = 'Casa';
    traduction['Residential / Condo'] = 'Casa de Condomínio';
    traduction['Residential / Village House'] = 'Casa de Vila';
    traduction['Residential / Penthouse'] = 'Cobertura';
    traduction['Residential / Farm Ranch'] = 'Chácara';
    traduction['Commercial / Consultorio'] = 'Consultório';
    traduction['Commercial / Edificio Residencial'] = 'Edifício Residencial';
    traduction['Commercial / Agricultural'] = 'Fazenda/Sítios/Chácaras';
    traduction['Residential / Flat'] = 'Flat';
    traduction['Commercial / Industrial'] = 'Galpão/Depósito/Armazém';
    traduction['Commercial / Hotel'] = 'Hotel/Motel/Pousada';
    traduction['Commercial / Building'] = 'Galpão/Depósito/Armazém';
    traduction['Commercial / Industrial'] = 'Imóvel Comercial';
    traduction['Residential / Kitnet'] = 'Kitnet/Conjugado';
    traduction['Residential / Studio'] = 'Apartamento	Studio';
    traduction['Residential / Land Lot'] = 'Lote/Terreno';
    traduction['Commercial / Land Lot'] = 'Lote/Terreno';
    traduction['Commercial / Business'] = 'Ponto Comercial/Loja/Box';
    traduction['Commercial / Edificio Comercial'] = 'Prédio/Edifício';
    traduction['Commercial / Office'] = 'Conjunto Comercial / Sala';
    traduction['Residential / Sobrado'] = 'Sobrado';

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $('#kt_xml_list_table').DataTable({
            'searchDelay': 500,
            'processing': true,
            'serverSide': true,
            'pageLength': 10,
            // 'order': [[0, 'asc']],
            'ajax': { url: `${urlBase}/property/listXmls`, dataSrc: "data" },
            'columns': [
                { data: 'name' },
                { data: 'date' },
                { data: 'qtd' },
                { data: 'link' },
                { data: 'id' },
            ],
            "columnDefs": [
                {
                    'targets': 1,
                    'type': 'datetime',
                    'def': () => new Date(),
                    'format': 'DD-MM-YYYY',
                    'render': function (data, type, row, meta) {
                        return new Date(data * 1000).toLocaleDateString("pt-BR")
                    }
                },
                {
                    'targets': 3,
                    'orderable': false,
                    // 'className': 'text-end',
                    'render': function (data, type, row, meta) {
                        return `<a target="_blank" href="${data}">${data}</a>`
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
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/property/createLinkXMLProperties" data-id="${data}" data-title="${row.name}"
                                data-kt-xml-list-filter="edit_row" >Editar</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a type="submit" class="menu-link px-3"
                                href="${urlBase}/property/deleteXML/${data}"
                                data-kt-xml-list-filter="delete_row">Deletar</a>
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
            handleSearchDatatable()
            handleDeleteRows()
            handleEditRows()
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-xml-list-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-xml-list-filter="delete_row"]');

        deleteButtons.forEach(d => {
            var urlDelete = d.href
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const XMLName = parent.querySelectorAll('td')[0].innerText;
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem certeza de que deseja excluir " + XMLName + "?",
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
                            text: "Você excluiu " + XMLName + "!.",
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

                                }
                            })
                            datatable.draw();
                        });

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: XMLName + " não foi deletado.",
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
    var handleEditRows = () => {
        // Select all delete buttons
        const editButtons = document.querySelectorAll('[data-kt-xml-list-filter="edit_row"]');

        editButtons.forEach(d => {
            var urlEdit = d.href
            var file_id = $(d).data("id")
            var file_title = $(d).data("title")

            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();
                loadPropertiesXML()
                $.ajax({
                    url: `${urlBase}/getXMLPropertiesList/${file_id}`,
                    type: "get",
                    data: {
                        "_token": $("input[name=csrf_token]").val(),
                        'file_name': file_title
                    },
                    dataType: 'json',
                    success: function (d) {
                        $("#file_id").val(d.file_id)
                        let props = d.props
                        let allCk = $('input[name="checkboxComentarioPost[]"]')
                        $("input[name='nameXML']").val(d.file_name)

                        allCk.each((i, element) => {
                            let value = $(element).val()
                            let result = props.find(({ prop_code }) => prop_code == value);

                            if (result != undefined) {
                                $(element).prop("checked", true)

                                $(`select[name="pt_${result.prop_code}"]`).val(result.publication_type).change()
                            }

                        })
                    },
                    error: function (d) { console.log(d) },
                })

            })
        });
    }

    function loadPropertiesXML() {
        $("#kt_modal_new_xml").modal("show")
        $("input[name='nameXML']").val("")
        $("#kt_table_xml_loading").removeClass("d-none");
        $("#kt_table_xml_list_tbody").addClass("d-none");

        $.ajax({
            url: `${urlBase}/property/listPropertiesJson`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let stringXML = ""
                d.data.forEach(element => {
                    if (element.is_from_xml == 0) {
                        stringXML += `<tr class="odd">
                        <td>
                            <label class="form-check form-check-sm form-check-custom form-check-solid fv-row">
                                <input class="form-check-input" type="checkbox" name="checkboxComentarioPost[]" value="${element.prop_code}">
                            </label>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span style="width:100px;height:70px;background-image:url(${element.photo});background-size: cover;">
                
                                </span>
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bold">${element.propriedadesArray.title}</div>
                                    <!--end::Title-->
                
                                    <!--begin::Price-->
                                    <div class="fw-semibold fs-7">
                                        Endereço (${element.propriedadesArray.endereco})
                                    </div>
                                    <!--end::Price-->
                
                                    <!--begin::SKU-->
                                    <div class="text-muted fs-7">
                                        TIPO: ${element.type}
                                    </div>
                                    <!--end::SKU-->                                                       <!--begin::SKU-->
                                    <div class="text-muted fs-7">
                                        CATEGORIA: ${element.category_prop}
                                    </div>
                                    <!--end::SKU-->
                                    <!--begin::SKU-->
                                    <div class="align-items-center d-flex fs-7 text-muted">
                                    <span>Tipo: </span>
                                    <select class="form-select form-select-sm" name="pt_${element.prop_code}" id="">
                                    <option value="STANDARD">normal</option>
                                    <option value="PREMIUM">destaque</option>
                                    <option value="SUPER_PREMIUM">super destaque</option>
                                    <option value="PREMIERE_1">destaque premium</option>
                                    <option value="PREMIERE_2">destaque especial</option>
                                    <option value="TRIPLE">destaque triplo</option>
                                </select>
                                    </div>
                                    <!--end::SKU-->
                                </div>
                            </div>
                        </td>
                    </tr> `
                    }
                });

                $("#kt_table_xml_list_tbody").html(stringXML);
            },
            error: function (d) {
                console.log(d);
            },
            complete: function (d) {
                $("#kt_table_xml_loading").addClass("d-none");
                $("#kt_table_xml_list_tbody").removeClass("d-none");
                $("#kt_modal_xml_selected_submit").prop("disabled", false)
            }
        });

    }

    var handleLoadProperties = function () {
        $('#openModalXML')[0].addEventListener("click", function (e) {
            loadPropertiesXML()
        })

    }

    var handleGenerateXML = function () {

        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'checkboxComentarioPost': {
                        validators: {
                            notEmpty: {
                                message: 'Selecionar pelo menos um imóvel'
                            }
                        }
                    },
                    'nameXML': {
                        validators: {
                            notEmpty: {
                                message: 'Nome é obrigatório'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }

        )
        $("body").on("click", "#kt_modal_xml_selected_submit", function (e) {
            e.preventDefault()
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    let submitButton = document.querySelector("#kt_modal_xml_selected_submit")
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    let valuesChecked = $('#kt_table_xml_list_tbody input[type=checkbox]:checked').map(function (_, el) {
                        return $(el).val();
                    }).get();

                    let objPublicationType = []
                    valuesChecked.forEach(element => {
                        objPublicationType.push({
                            'prop_code': element,
                            'publication_type': $(`select[name="pt_${element}"]`).find(":selected").val()
                        })
                    });

                    var qtd_imoveis = valuesChecked.length

                    if (qtd_imoveis == 0) {
                        Swal.fire({
                            text: "Selecione pelo menos um imóvel",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;
                        return
                    }
                    var name_file = $("input[name='nameXML']").val();
                    var padrao_file = $("#padrao_xml").find(":selected").val();
                    var arquivo
                    $.ajax({
                        url: `${urlBase}/property/getPropertiesSelecteds`,
                        type: "get",
                        async: false,
                        data: {
                            "_token": $("input[name=csrf_token]").val(),
                            "properties_code": valuesChecked
                        },
                        dataType: 'json',
                        success: function (d) {
                        },
                        error: function (d) {
                            console.log(d);
                        },
                        complete: function (d) {
                            let user = d.responseJSON.user
                            let imoveis = d.responseJSON.result
                            let desenvolvedor = ''
                            let email_dev = user.email
                            let nome_cliente = user.name
                            let tel_cliente = user.phone
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


                            let xml = ""
                            imoveis.forEach(imovel => {
                                let transaction
                                let value
                                let url_video = ''

                                if (imovel.imoveis.url_video != '')
                                    url_video = `<Item medium="video">${imovel.imoveis.url_video}</Item>`

                                switch (imovel.imoveis.category) {
                                    case 'Venda':
                                        transaction = 'For Sale'
                                        value = `<ListPrice currency="BRL">${imovel.imoveis.prop_price}</ListPrice>`

                                        break;
                                    case 'Aluguel':
                                        transaction = 'For Rent'
                                        value = `<RentalPrice currency="BRL">${imovel.imoveis.prop_rent}</RentalPrice>`
                                        break;
                                    case 'VendaAluguel':
                                        transaction = 'Sale/Rent'
                                        value = `<ListPrice currency="BRL">${imovel.imoveis.prop_price}</ListPrice>
                                        <RentalPrice currency="BRL" period="Monthly">${imovel.imoveis.prop_rent}</RentalPrice>`
                                        break;

                                    default:

                                        break;
                                }

                                let images = ''
                                imovel.photo.forEach((element, i) => {
                                    images += `<Item medium="image" caption="img${i}" primary="true">${element.pathname}</Item>`
                                });
                                var traductionArray = Object.entries(traduction);
                                var propertyType
                                traductionArray.forEach(search => {
                                    if (search[1] == imovel.type.name)
                                    propertyType = search[0]
                                });


                                let caracteristicas = ''
                                imovel.caracteristicas.forEach(element => {
                                    let val_traduction
                                    traductionArray.forEach(search => {
                                        if (search[1] == element.name)
                                            val_traduction = search[0]
                                    });
                                    caracteristicas += `<Feature>${val_traduction}</Feature>`
                                });

                                let result = objPublicationType.find(({ prop_code }) => prop_code == imovel.imoveis.prop_code);

                                xml += `<Listing>
                                      <ListingID>${imovel.imoveis.prop_code}</ListingID>
                                      <Title>![CDATA[${imovel.imoveis.title}]]</Title>
                                      <TransactionType>${transaction}</TransactionType>
                                      <PublicationType>${result.publication_type}</PublicationType>
                                      <DetailViewUrl>http://www.grupozap.com.br/imoveis/${imovel.imoveis.prop_code}</DetailViewUrl>
                                      <Media>
                                        ${url_video}
                                        ${images}
                                      </Media>
                                      <Details>
                                          <UsageType>Residential</UsageType>
                                          <PropertyType>${propertyType}</PropertyType>
                                          <Description>![CDATA[${imovel.imoveis.description}]]</Description>
                                          ${value}
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
                                          <State >![CDATA[${imovel.imoveis.state_name}]]</State>
                                          <City>![CDATA[${imovel.imoveis.city_name}]]</City>
                                          <Zone></Zone>
                                          <Neighborhood>![CDATA[${imovel.imoveis.district}]]</Neighborhood>
                                          <Address>![CDATA[${imovel.imoveis.street}]]</Address>
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

                            arquivo = header + xml + footer;

                        }


                    });

                    $.ajax({
                        url: `${urlBase}/property/createLinkXML`,
                        type: "post",
                        data: {
                            "_token": $("input[name=csrf_token]").val(),
                            "file": arquivo,
                            "name": name_file,
                            "qtd": qtd_imoveis,
                            'padrao': padrao_file,
                            'file_id': $("#file_id").val()
                        },
                        dataType: 'json',
                        success: function (d) {
                            $('#kt_xml_list_table').DataTable().ajax.reload();

                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                            $("#all_props_xml").prop("checked", false);

                            $.ajax({
                                url: `${urlBase}/property/createLinkXMLProperties`,
                                type: "post",
                                data: {
                                    "_token": $("input[name=csrf_token]").val(),
                                    "file_id": d.file_created,
                                    "prop_publication": JSON.stringify(objPublicationType),
                                    'file_id_update': $("#file_id").val()

                                },
                                success: function (d) {
                                    $("#file_id").val('')

                                    $("#kt_modal_new_xml").modal("hide")

                                },
                                error: function (d) {
                                    console.log(d);
                                },
                            })
                        },
                        error: function (d) {
                            console.log(d);
                        },
                    })
                }
            })

        })
    }

    var selectAllProps = function () {
        $("#all_props_xml").click(function () {
            $('#kt_table_xml_list_tbody input:checkbox').not(this).prop('checked', this.checked);
        });
    }

    return {
        // Public functions  
        init: function () {

            table = document.querySelector('#kt_xml_list_table');
            if (!table) {
                return
            }
            form = document.querySelector('#kt_modal_new_xml_form');

            initDatatable();
            handleLoadProperties()
            handleGenerateXML()
            selectAllProps()

            // $('#kt_modal_new_xml').on('shown.bs.modal', function (e) {
            //     loadPropertiesXML()

            // })
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTXMLList.init();
});