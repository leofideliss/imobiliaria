"use strict";

// Class definition
var KTAddProperty = function () {
    // Elements
    var form;
    var submitButton;
    var closeButton
    var validator;
    var myDropzone
    var myDropzonePDF
    var myDropzoneVideo
    var submitButtonCondominio
    var closeCondominio
    var regexUrl = /(https?:\/\/.*?)/
    var btnOpenModalCondominio
    const allStates = {
        "UF": [
            { "nome": "Acre", "sigla": "AC" },
            { "nome": "Alagoas", "sigla": "AL" },
            { "nome": "Amapá", "sigla": "AP" },
            { "nome": "Amazonas", "sigla": "AM" },
            { "nome": "Bahia", "sigla": "BA" },
            { "nome": "Ceará", "sigla": "CE" },
            { "nome": "Distrito Federal", "sigla": "DF" },
            { "nome": "Espírito Santo", "sigla": "ES" },
            { "nome": "Goiás", "sigla": "GO" },
            { "nome": "Maranhão", "sigla": "MA" },
            { "nome": "Mato Grosso", "sigla": "MT" },
            { "nome": "Mato Grosso do Sul", "sigla": "MS" },
            { "nome": "Minas Gerais", "sigla": "MG" },
            { "nome": "Pará", "sigla": "PA" },
            { "nome": "Paraíba", "sigla": "PB" },
            { "nome": "Paraná", "sigla": "PR" },
            { "nome": "Pernambuco", "sigla": "PE" },
            { "nome": "Piauí", "sigla": "PI" },
            { "nome": "Rio de Janeiro", "sigla": "RJ" },
            { "nome": "Rio Grande do Norte", "sigla": "RN" },
            { "nome": "Rio Grande do Sul", "sigla": "RS" },
            { "nome": "Rondônia", "sigla": "RO" },
            { "nome": "Roraima", "sigla": "RR" },
            { "nome": "Santa Catarina", "sigla": "SC" },
            { "nome": "São Paulo", "sigla": "SP" },
            { "nome": "Sergipe", "sigla": "SE" },
            { "nome": "Tocantins", "sigla": "TO" }

        ]
    }

    const urlBase = window.location.protocol + "//" + window.location.host;
    const apiGoogleGeo = "https://maps.googleapis.com/maps/api/geocode/json?"
    // https://maps.googleapis.com/maps/api/geocode/json?address=ADDRESS&key=KEY

    function getPrice(input) {
        let value = input.value
        let test = value.match(/\d+/g) != null ? value.match(/\d+/g).join('') : 0
        if (test <= 0)
            return false
        else
            return true
    }



    var SerializedDataToJson = function (form) {

        var formobj = {};
        $.each(form,
            function (i, v) {
                if (typeof formobj[v.name] === 'undefined')
                    formobj[v.name] = v.value;
                else {
                    if (typeof formobj[v.name] === 'string') {

                        formobj[v.name] = [formobj[v.name], v.value];
                    } else {

                        formobj[v.name].push(v.value);


                    }

                }
            });

        return formobj;
    }

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'finalidadeUtilizacao': {
                        validators: {
                            notEmpty: {
                                message: 'Finalidade é obrigatório'
                            }
                        }
                    },
                    'honorario_corretagem': {
                        validators: {
                            notEmpty: {
                                message: 'Corretagem é obrigatório'
                            }
                        }
                    },
                    'iptu_price': {
                        validators: {
                            notEmpty: {
                                message: 'IPTU é obrigatório'
                            }
                        }
                    },
                    'title': {
                        validators: {
                            notEmpty: {
                                message: 'titulo é obrigatório'
                            }
                        }
                    },
                    // 'type_prop_id': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Tipo é obrigatório'
                    //         }
                    //     }
                    // },
                    'CEP': {
                        validators: {
                            notEmpty: {
                                message: 'CEP é obrigatório'
                            }
                        }
                    },
                    'street': {
                        validators: {
                            notEmpty: {
                                message: 'Rua é obrigatório'
                            }
                        }
                    },
                    'number': {
                        validators: {
                            notEmpty: {
                                message: 'Numero é obrigatório'
                            }
                        }
                    },
                    'district': {
                        validators: {
                            notEmpty: {
                                message: 'Bairro é obrigatório'
                            }
                        }
                    },
                    'city_id': {
                        validators: {
                            notEmpty: {
                                message: 'Cidade é obrigatório'
                            }
                        }
                    },
                    'opcaoExclusividade': {
                        validators: {
                            notEmpty: {
                                message: 'Exclusividade é obrigatório'
                            }
                        }
                    },
                    // 'complement': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Complemento é obrigatório'
                    //         }
                    //     }
                    // },
                    'state': {
                        validators: {
                            notEmpty: {
                                message: 'Estado é obrigatório'
                            }
                        }
                    },
                    // 'bathrooms': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Quantidade de banheiros é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'bedroom': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Quantidade de quartos é obrigatório'
                    //         }
                    //     }
                    // },
                    'category': {
                        validators: {
                            notEmpty: {
                                message: 'Categoria é obrigatório'
                            }
                        }
                    },
                    // 'condominium': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Condominio é obrigatório'
                    //         }
                    //     }
                    // },
                    'description': {
                        validators: {
                            notEmpty: {
                                message: 'Descrição é obrigatório'
                            }
                        }
                    },
                    // 'garage': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Quantidade de vagas é obrigatório'
                    //         }
                    //     }
                    // },
                    'prop_size': {
                        validators: {
                            notEmpty: {
                                message: 'Tamanho do imóvel é obrigatório'
                            }
                        }
                    },
                    'prop_price': {
                        validators: {
                            notEmpty: {
                                enabled: true,
                                message: 'Preço do imóvel é obrigatório'
                            },
                            callback: {
                                enabled: true,
                                message: 'Valor não pode ser zero',
                                callback: function (input) {
                                    return getPrice(input)
                                },
                            }
                        }
                    },
                    'prop_rent': {
                        validators: {
                            notEmpty: {
                                enabled: false,
                                message: 'Preço do imóvel é obrigatório'
                            },
                            callback: {
                                enabled: false,
                                message: 'Valor não pode ser zero',
                                callback: function (input) {
                                    return getPrice(input)
                                },
                            }
                        }
                    },
                    'condominium_price': {
                        validators: {
                            notEmpty: {
                                enabled: false,
                                message: 'Preço do condominio é obrigatório'
                            },
                            callback: {
                                enabled: false,
                                message: 'Valor não pode ser zero',
                                callback: function (input) {
                                    return getPrice(input)
                                },
                            }
                        }
                    },
                    // 'prop_photos[]': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Fotos do imóvel é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'list_caract': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Caracteristicas do imóvel é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'cpf_vendor': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'CPF do dono do imóvel é obrigatório'
                    //         },
                    //         id: {
                    //             enabled: true,
                    //             country: 'BR',
                    //             message: 'CPF inválido',
                    //         },
                    //     }

                    // },
                    'name_vendor': {
                        validators: {
                            notEmpty: {
                                message: 'Selecione um proprietário'
                            }
                        }
                    },
                    // 'phone_vendor': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'telefone do dono do imóvel é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'email_vendor': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'telefone do dono do imóvel é obrigatório'
                    //         },
                    //         emailAddress: {
                    //             message: 'Email inválido',
                    //         },
                    //     }
                    // },
                    'url_video': {
                        validators: {
                            regexp: {
                                regexp: regexUrl,
                                message: 'Não é um link valido',
                            },

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
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();
            //variables
            let dataSerialized = $(form).serializeArray();
            let data = SerializedDataToJson(dataSerialized);
            let id_youtube = getYoutubeId(data.url_video)
            let formated_address
            let lng
            let lat
            let place_id
            let address = `${$("input[name='city_id']").val()}%20${data.street}%20${data.number}`
            let property_id


            $("#modal-edit-loading").modal('show')
            setTimeout(() => {
                //get lng and lat
                $.ajax({
                    type: 'POST',
                    url: `${apiGoogleGeo}address=${address}&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0`,
                    async: false,
                    dataType: 'json',
                    success: (data) => {
                        formated_address = data.results[0].formatted_address
                        lng = data.results[0].geometry.location.lng
                        lat = data.results[0].geometry.location.lat
                        place_id = data.results[0].place_id

                    },
                    error: (data) => { console.log(data) }
                }).done(function (e) {
                    $("#spinner-geo").removeClass('spinner-border')
                    $("#spinner-geo").addClass('fade')
                    $("#check-geo").find('i').show()
                })


                if (myDropzone.files.length == 0) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-danger',
                        },
                        buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire(
                        'Fotos do imóvel',
                        'É necessário inserir pelo menos uma foto.',
                        'error'
                    )

                    $("#modal-edit-loading").modal('hide')

                    return
                }


                // Validate form
                validator.validate().then(function (status) {

                    if (status == 'Valid') {

                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        //get state name
                        let indexState = allStates.UF.findIndex(({ sigla }) => sigla == $("#state").val())
                        let state_name = allStates.UF[indexState]

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
                            }
                        });

                        var formData = new FormData(this);

                        formData.append('citie_id', $("#city_id").data('citie'));
                        formData.append('lat', lat);
                        formData.append('lng', lng);
                        formData.append('formated_address', formated_address);
                        formData.append('place_id', place_id);
                        formData.append('description_html', $("#description_html").val());
                        formData.append('condominio_id', $("#condominio_selected").attr('data-cond-id'))
                        formData.append('id_youtube', "https://www.youtube.com/embed/" + id_youtube);
                        formData.append('name_vendor', $('#name_vendor').find(':selected').val());



                        data.honorario_corretagem = data.honorario_corretagem.replace(" %", "")
                        data.honorario_corretagem = data.honorario_corretagem.replaceAll("_", "")
                        data.honorario_corretagem = data.honorario_corretagem.replaceAll(".", "")
                        data.honorario_corretagem = data.honorario_corretagem.replace(",", ".")

                        //remove mask
                        data.prop_rent = data.prop_rent.replace("R$", "")
                        data.prop_rent = data.prop_rent.replaceAll(".", "")
                        data.prop_rent = data.prop_rent.replace(",", ".")


                        data.prop_price = data.prop_price.replace("R$", "")
                        data.prop_price = data.prop_price.replaceAll(".", "")
                        data.prop_price = data.prop_price.replace(",", ".")

                        data.iptu_price = data.iptu_price.replace("R$", "")
                        data.iptu_price = data.iptu_price.replaceAll(".", "")
                        data.iptu_price = data.iptu_price.replace(",", ".")

                        data.condominium_price = data.condominium_price.replace("R$", "")
                        data.condominium_price = data.condominium_price.replaceAll(".", "")
                        data.condominium_price = data.condominium_price.replace(",", ".")


                        // add form inputs value in data variable
                        formData.append('data', JSON.stringify(data));
                        formData.append('state_name', state_name.nome);



                        let notaComodidade = 0;
                        let notaFotos;
                        let notaDescricao;
                        let notaVideo = 0;
                        if (data.list_caract) {
                            let tam = data.list_caract.length
                            if (tam >= 0 && tam <= 3)
                                notaComodidade = 2.5
                            if (tam >= 4 && tam <= 5)
                                notaComodidade = 5
                            if (tam >= 6 && tam <= 7)
                                notaComodidade = 7.5
                            if (tam >= 8)
                                notaComodidade = 10
                        }
                        if (myDropzone.files) {
                            let tam = myDropzone.files.length
                            if (tam >= 0 && tam <= 6)
                                notaFotos = 2.5
                            if (tam >= 7 && tam <= 9)
                                notaFotos = 5
                            if (tam >= 10 && tam <= 11)
                                notaFotos = 7.5
                            if (tam >= 12)
                                notaFotos = 10
                        }
                        if (data.description) {
                            let tam = data.description.length
                            if (tam <= 60)
                                notaDescricao = 2.5
                            if (tam > 60 && tam <= 90)
                                notaDescricao = 5
                            if (tam > 90 && tam < 120)
                                notaDescricao = 7.5
                            if (tam >= 120)
                                notaDescricao = 10
                        }
                        if (data.url_video != "")
                            notaVideo = 10
                        else
                            notaVideo = 0


                        formData.append('notaComodidade', notaComodidade);
                        formData.append('notaFotos', notaFotos);
                        formData.append('notaDescricao', notaDescricao);
                        formData.append('notaVideo', notaVideo);


                        $.ajax({
                            type: 'POST',
                            url: `${urlBase}/property/add-property`,
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            async: false,
                            success: (data) => {
                                myDropzone.files.forEach(element => {
                                    myDropzone.enqueueFile(element)
                                });

                                property_id = data.prop_id
                                myDropzone.options.url = `${urlBase}/property/uploadImg/${data.prop_code}/${data.prop_id}`
                                myDropzone.processQueue();
                                myDropzonePDF.options.url = `${urlBase}/property/uploadPDF/${data.prop_code}/${data.prop_id}`
                                myDropzonePDF.processQueue();
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;

                            },
                            error: function (data) {
                                $("#modal-edit-loading").modal('hide')

                                Swal.fire({
                                    text: data.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });

                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;
                            },
                            complete: function (data) {

                                // busca lugares próximos
                                $("#spinner-nearby").removeClass('spinner-border')
                                $("#spinner-nearby").addClass('fade')
                                $("#check-nearby").find('i').show()
                                // $.ajax({
                                //     type: 'POST',
                                //     url: `${urlBase}/property/nearbyPlaces`,
                                //     async: false,
                                //     dataType: 'json',
                                //     data: {
                                //         'lat': lat,
                                //         'lng': lng,
                                //         'property_id': property_id

                                //     },

                                //     success: (data) => {
                                //         console.log('nearby place', data)
                                //         console.log($("#spinner-imovel"))


                                //     },
                                //     error: (data) => { console.log(data) }
                                // }).done(function (e) {
                                //     $("#spinner-nearby").removeClass('spinner-border')
                                //     $("#spinner-nearby").addClass('fade')
                                //     $("#check-nearby").find('i').show()


                                // })

                            }
                        }).done(function (e) {
                            $("#spinner-imovel").removeClass('spinner-border')
                            $("#spinner-imovel").addClass('fade')
                            $("#check-imovel").find('i').show()
                            // setTimeout(() => {

                            //     $("#modal-edit-loading").modal('hide')

                            // }, 1000);

                            setTimeout(() => {

                                // location.href = `${urlBase}/property`

                            }, 1000);
                        })


                    } else {
                        // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Algum campo não está preenchido , confira novamente",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        $("#modal-edit-loading").modal('hide')

                    }
                });
            }, 1000);

        });
    }

    var cancelForm = function () {
        // closeButton.addEventListener('click', function (e) {
        //     e.preventDefault()
        //     window.history.go(-1)
        // })
    }

    var seedProprietarios = function () {
        let select = $("#name_vendor")


        $.ajax({
            url: `${urlBase}/admin/proprietarios/getProprietarios`,
            type: "get",
            dataType: 'json',
            success: function (d) {
                proprietarios = d.data
            },
            error: function (d) {
                console.log(d);
            },
            complete: function (d) {
                let option = $('<option></option>');
                option.attr('value', "");
                option.text("Selecionar");
                select.append(option);

                proprietarios.forEach(element => {
                    let option = $('<option></option>');
                    option.attr('value', element.id);
                    option.text(element.nome);
                    select.append(option);
                });
            }
        });


        $("body").on("change", "#name_vendor", function () {
            let value = this.value;
            var result = proprietarios.find(({ id }) => id == value);
            $("input[name='phone_vendor']").val(result.telefone)
            $("input[name='email_vendor']").val(result.email)
        });


        // let timezoneSelected = $("#timezoneSelected").val()
        // $("#timezone").val(timezoneSelected).trigger('change');
    }

    var handleValidatorPrice = function () {

        $('#mySelectCategory')[0].addEventListener('change', function (e) {
            console.log($('#mySelectCategory').val())
            if ($('#mySelectCategory').val() == 'Aluguel') {
                validator.enableValidator('prop_rent');
                validator.disableValidator('prop_price');
                $('input[name="prop_price"]').val('')
            }
            if ($('#mySelectCategory').val() == 'Venda') {
                validator.enableValidator('prop_price');
                validator.disableValidator('prop_rent');
                $('input[name="prop_rent"]').val('')

            }
            if ($('#mySelectCategory').val() == 'VendaAluguel') {
                validator.enableValidator('prop_rent');
                validator.enableValidator('prop_price');


            }
        })

        $('#mySelect')[0].addEventListener('change', function (e) {
            if ($('#mySelect').val() == 0) {
                validator.disableValidator('condominium_price');
            }
            if ($('#mySelect').val() == 1) {
                validator.enableValidator('condominium_price');
            }
        })

    }

    var seedTypesProperty = function () {
        $.ajax({
            url: `${urlBase}/register/listTypeProperty`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let selectType = $("#type_prop_id");
                d.data.forEach(element => {
                    selectType.append($("<option />").val(element.id).text(element.name));
                });
            },
            error: function (d) {
                console.log(d);
            }
        });
    }

    var seedCities = function () {
        $.ajax({
            url: `${urlBase}/register/listCitiesJson`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let selectCities = $("#city_id");
                d.data.forEach(element => {
                    selectCities.append($("<option />").val(element.id).text(element.name));
                });
            },
            error: function (d) {
                console.log(d);
            }
        });
    }

    var seedCaracteristicas = function () {
        $.ajax({
            url: `${urlBase}/register/caracteristicas/listCaracteristicasJson`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let list_caracteristicas = $("#caracteristica_list")
                d.data.forEach(element => {
                    let html = `          <div class="form-check col-3 pb-4 responsividadeItemCaracteristica">
                    <input class="form-check-input list_caract" type="checkbox" value="${element.id}"
                        id="caracteristicas${element.id}" name="list_caract" />
                    <label class="form-check-label" for="caracteristicas${element.id}" ">
                   ${element.name}
                    </label>
                </div>`
                    list_caracteristicas.append(html)
                });
            },
            error: function (d) {
                console.log(d);
            }
        });
    }

    var closeCondominioModal = function () {
        closeCondominio.addEventListener('click', function (e) {
            $('#add_condominio').modal('hide')
        })
    }

    var seedModalCondominio = function () {

        $('#add_condominio').on('show.bs.modal', function (event) {
            $.ajax({
                url: `${urlBase}/condominio/listjson`,
                type: "get",
                data: {
                    "_token": $("input[name=csrf_token]").val()
                },
                dataType: 'json',
                success: function (d) {



                    let html = ''
                    d.data.forEach(element => {
                        html += `<tr class="odd" >
                    <td>
                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                            <input data-name-cond="${element.title}" class="form-check-input" type="radio" name="checkboxCondominio" value="${element.id}">
                        </label>
                    </td>
                    <td>
                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                    
                            <div class="ms-5">
                                <!--begin::Titulo-->
                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">${element.title}</div>
                                <!--begin::Titulo-->
                    
                                <!--begin::Price-->
                                <div class="fw-semibold fs-7">
                                ${element.address}
                                </div>
                                <!--end::Price-->
                    
                            </div>
                        </div>
                    </td>
                    </tr >`
                    });
                    $("#kt_table_select_condominio tbody").html(html)
                    $("#loading_condominio").hide()

                },
                error: function (d) {
                    console.log(d);
                }
            });


        })


    }

    var removeCondominio = function () {
        $("body").on("click", "#removeCondominioSelected", function (e) {
            $("#condominio_selected").text("")
            $("#condominio_selected").attr('data-cond-id', "")
            $("#removeCondominioSelected").addClass("d-none")

            $('input[name="CEP"]').val("")
            $('input[name="street"]').val("")
            $('input[name="district"]').val("")
            $('input[name="city_id"]').val("")
            $('input[name="state"]').val("")
            $('input[name="complement"]').val("")
            $('input[name="number"]').val("")

        })
    }
    var selectCondominio = function () {
        submitButtonCondominio.addEventListener('click', function (e) {
            e.preventDefault()
            $('#add_condominio').modal('hide')

            let cond_selected = $('input[name=checkboxCondominio]:checked');

            $("#condominio_selected").text($(cond_selected).attr("data-name-cond"))
            $("#condominio_selected").attr('data-cond-id', $(cond_selected).val())
            $("#removeCondominioSelected").removeClass("d-none")
            let idCondominio = $(cond_selected).val()
            let condominio
            $.ajax({
                url: `${urlBase}/condominio/get-condominio/${idCondominio}`,
                type: 'GET',
                dataType: 'json',
                success: function (e) {
                    condominio = e.condominio
                    $('input[name="CEP"]').val(condominio.CEP)
                },
                complete: function (e) {
                    $('input[name="CEP"]').blur()
                    $('input[name="complement"]').val(condominio.complement)
                    $('input[name="number"]').val(condominio.number)
                },
                error: function (e) {
                    console.log('error', e)
                }
            })


        })
    }

    var createSortableImgs = function () {
        $(".dropzone").sortable({
            items: '.dz-preview',
            cursor: 'grab',
            opacity: 0.5,
            containment: '.dropzone',
            distance: 20,
            tolerance: 'pointer',
            stop: function () {
                let queue = myDropzone.getAcceptedFiles();
                let newQueue = [];
                $('div#divDropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function (file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
                });
                myDropzone.files = newQueue
            }
        });
    }

    var openModalCondominio = function () {
        btnOpenModalCondominio.addEventListener("click", function (e) {
            e.preventDefault();
            $("#modalAddcondominioProriedade").modal("show")
        })
    }

    // Public functions
    return {
        // Initialization
        init: function () {

            form = document.querySelector('#kt_properties_form');
            if (!form)
                return
            submitButton = document.querySelector('[data-kt-properties-type="submit"]');
            closeButton = document.querySelector('[data-kt-properties-type="cancel"]');
            closeCondominio = document.querySelector('#kt_modal_comments_cancel')
            submitButtonCondominio = document.querySelector('#kt_modal_comments_submit')
            btnOpenModalCondominio = document.querySelector("#openModalCondominio")
            // var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            //     url: `${urlBase}/api/property/uploadImg`, // Set the url for your upload script location
            //     paramName: "file", // The name that will be used to transfer the file
            //     maxFiles: 10,
            //     maxFilesize: 10, // MB
            //     addRemoveLinks: true,
            //     accept: function(file, done) {
            //         if (file.name == "wow.jpg") {
            //             done("Naha, you don't.");
            //         } else {
            //             done();
            //         }
            //     }
            // });

            Dropzone.prototype.isFileExist = function (file) {
                var i;
                if (this.files.length > 0) {
                    for (i = 0; i < this.files.length; i++) {
                        if (this.files[i].name === file.name
                            && this.files[i].size === file.size
                            && this.files[i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                            return true;
                        }
                    }
                }
                return false;
            };

            Dropzone.prototype.addFile = function (file) {
                file.upload = {
                    progress: 0,
                    total: file.size,
                    bytesSent: 0
                };
                if (this.options.preventDuplicates && this.isFileExist(file)) {
                    alert(this.options.dictDuplicateFile);
                    return;
                }
                this.files.push(file);
                file.status = Dropzone.ADDED;
                this.emit("addedfile", file);
                this._enqueueThumbnail(file);
                return this.accept(file, (function (_this) {
                    return function (error) {
                        if (error) {
                            file.accepted = false;
                            _this._errorProcessing([file], error);
                        } else {
                            file.accepted = true;
                            if (_this.options.autoQueue) {
                                _this.enqueueFile(file);
                            }
                        }
                        return _this._updateMaxFilesReachedClass();
                    };
                })(this));
            };

            myDropzone = new Dropzone("div#divDropzone", {
                url: `${urlBase}/api/property/uploadImg`, // Set the url for your upload script location
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 20,
                maxFilesize: 1500, // MB
                addRemoveLinks: true,
                autoProcessQueue: false,
                parallelUploads: 1,
                autoQueue: false,
                dictDuplicateFile: "Arquivos duplicatos !!",
                preventDuplicates: true,
                headers: {
                    'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
                },
                acceptedFiles: "image/jpeg,image/png,image/gif",
                accept: function (file, done) {
                    file.previewElement.querySelector(".dz-progress").remove();

                    if (file.name == "wow.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                },
                init: function () {
                    this.on("complete", function (file) {
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
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
                    });

                    this.on('success', this.processQueue.bind(this));
                    this.on("queuecomplete", function (file) {
                        $("#spinner-images").removeClass('spinner-border')
                        $("#spinner-images").addClass('fade')
                        $("#check-images").find('i').show()

                        Swal.fire({
                            text: "Imóvel cadastrado com sucesso!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        location.href = `${urlBase}/property`

                    });
                    this.on("complete", function (file) {
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                            // location.href = `${urlBase}/property`
                        }
                    });

                    this.on("maxfilesexceeded", function (file) {
                        alert("Limite de arquivos atingido!");
                        this.removeFile(file);
                    });

                }
            });



            // PDF FILE
            myDropzonePDF = new Dropzone("div#divDropzonePDF", {
                url: `${urlBase}/api/property/uploadImg`, // Set the url for your upload script location
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 5,
                maxFilesize: 1500, // MB
                addRemoveLinks: true,
                autoProcessQueue: false,
                parallelUploads: 1,
                dictDuplicateFile: "Arquivos duplicatos !!",
                preventDuplicates: true,
                headers: {
                    'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
                },
                acceptedFiles: ".pdf",
                init: function () {
                    this.on('success', this.processQueue.bind(this));

                    this.on("maxfilesexceeded", function (file) {
                        alert("Limite de arquivos atingido!");
                        this.removeFile(file);
                    });

                },
                accept: function (file, done) {
                    file.previewElement.querySelector(".dz-progress").remove();

                    if (file.name == "wow.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                }

            });


            seedTypesProperty()
            seedCities()
            seedCaracteristicas()
            handleForm();
            cancelForm();
            handleValidatorPrice()
            closeCondominioModal()
            seedModalCondominio()
            selectCondominio()

            createSortableImgs()

            openModalCondominio()

            seedProprietarios()
            removeCondominio()
            // Stepper lement
            var element = document.querySelector("#stepper_add_property");

            // Initialize Stepper
            var stepper = new KTStepper(element);

            // Handle next step
            stepper.on("kt.stepper.next", function (stepper) {
                let index = stepper.getCurrentStepIndex()
                $(stepper.steps[index - 1]).find('span').removeClass('active')
                $(stepper.steps[index]).find('span').addClass('active')

                stepper.goNext(); // go next step
            });

            // Handle previous step
            stepper.on("kt.stepper.previous", function (stepper) {
                let index = stepper.getPreviousStepIndex()
                $(stepper.steps[index]).find('span').removeClass('active')
                $(stepper.steps[index - 1]).find('span').addClass('active')
                stepper.goPrevious(); // go previous step
            });


            // let value_select_finalidade = $("#finalidadeUtilizacao").attr('value')
            // $("#finalidadeUtilizacao").val(value_select_finalidade).change()
            $("#mySelectCategory").val("Venda").change()

            $("#finalidadeUtilizacao")[0].addEventListener("click",function(e){
                if($(this).val() == "comercial")
                {
                    $("#mySelectCategory").val("Venda").change()
                    validator.enableValidator('prop_price');
                    validator.disableValidator('prop_rent');
                    $('input[name="prop_rent"]').val('')
                }
            })


        }
    };
}();



// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAddProperty.init();
});
