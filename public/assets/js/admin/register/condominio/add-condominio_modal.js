"use strict";

// Class definition
var KTAddCondominioModal = function () {
    var form
    var closeButton
    var submitButton
    var regexUrl = /(https?:\/\/.*?)/
    var myDropzoneCondominio
    var validator;
    var divParent

    const urlBase = window.location.protocol + "//" + window.location.host;

    var seedCaracteristicas = function () {
        $.ajax({
            url: `${urlBase}/register/caracteristicas/listCaracteristicasCondominioJson`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let list_caracteristicas = $("#caracteristicas_condominio")
                d.data.forEach(element => {
                    let html = `          <div class="form-check col-3 pb-4">
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

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name_condominio': {
                        validators: {
                            notEmpty: {
                                message: 'Nome do Condomínio é obrigatório'
                            }
                        }
                    },
                    'cep_condominio': {
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
                    'state': {
                        validators: {
                            notEmpty: {
                                message: 'Estado é obrigatório'
                            }
                        }
                    },
                    'url_video_condominio': {
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
            let condominio_id
            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
                        }
                    });

                    var formData = new FormData(this);
                    formData.append('citie_id', $("#city_id").data('citie'));
                    formData.append('data', JSON.stringify(data));


                    myDropzoneCondominio.files.forEach(element => {
                        myDropzoneCondominio.enqueueFile(element)
                    });

                    $('#modalAwaitImages').modal('show')

                    $.ajax({
                        url: $(form).attr("data-request-condominio"),
                        type: "post",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (data) {

                            condominio_id = data.condominio_id
                            myDropzoneCondominio.options.url = `${urlBase}/condominio/uploadImg/${data.condominio_code}/${data.condominio_id}`
                            myDropzoneCondominio.processQueue();

                            // submitButton.removeAttribute('data-kt-indicator');
                            // submitButton.disabled = false;

                            $("#condominio_selected").text(data.title)
                            $("#condominio_selected").attr(data.condominio_id)
                            $("#removeCondominioSelected").removeClass("d-none")
                            $("#mySelect").val(1).change()

                            $('input[name="CEP"]').val(data.CEP)
                        },
                        error: function (d) {
                            console.log('error', d)
                            $('#modalAwaitImages').modal('hide')

                            Swal.fire({
                                text: d.responseJSON.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        },
                        complete: function (d) {

                            // $('#modalAwaitImages').modal('hide')
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                        }
                    });

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


                }
            });


        });
    }

    var cancelForm = function () {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault()
            $("#modalAddcondominioProriedade").modal('hide')
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
                let queue = myDropzoneCondominio.getAcceptedFiles();
                let newQueue = [];
                $('#divDropzoneCondominio .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function (file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
                });
                myDropzoneCondominio.files = newQueue

            }
        });
    }
    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector("#kt_condiminio_form")
            divParent = document.querySelector("#add_condominio_modal")

            if (!divParent)
                return

            closeButton = $('[data-kt-properties-type="cancel"]')[0]
            submitButton = $('[data-kt-properties-type-condominio="submit"]')[0]
            seedCaracteristicas()
            handleForm()
            // cancelForm()
            createSortableImgs()

            // Dropzone.prototype.isFileExist = function (file) {
            //     var i;
            //     if (this.files.length > 0) {
            //         for (i = 0; i < this.files.length; i++) {
            //             if (this.files[i].name === file.name
            //                 && this.files[i].size === file.size
            //                 && this.files[i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
            //                 return true;
            //             }
            //         }
            //     }
            //     return false;
            // };

            // Dropzone.prototype.addFile = function (file) {
            //     file.upload = {
            //         progress: 0,
            //         total: file.size,
            //         bytesSent: 0
            //     };
            //     if (this.options.preventDuplicates && this.isFileExist(file)) {
            //         alert(this.options.dictDuplicateFile);
            //         return;
            //     }
            //     this.files.push(file);
            //     file.status = Dropzone.ADDED;
            //     this.emit("addedfile", file);
            //     this._enqueueThumbnail(file);
            //     return this.accept(file, (function (_this) {
            //         return function (error) {
            //             if (error) {
            //                 file.accepted = false;
            //                 _this._errorProcessing([file], error);
            //             } else {
            //                 file.accepted = true;
            //                 if (_this.options.autoQueue) {
            //                     _this.enqueueFile(file);
            //                 }
            //             }
            //             return _this._updateMaxFilesReachedClass();
            //         };
            //     })(this));
            // };

            myDropzoneCondominio = new Dropzone("div#divDropzoneCondominio", {
                url: `${urlBase}/condominio/uploadImg}`,
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
                    this.on('success', this.processQueue.bind(this));

                    this.on("complete", function (file) {
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                            // location.href = `${urlBase}/condominio`

                        }
                    });

                    this.on("queuecomplete", function (file) {
                        // location.href = `${urlBase}/condominio`
                        $('#modalAwaitImages').modal('hide')
                        $("#modalAddcondominioProriedade").modal("hide")
                    });

                    this.on("maxfilesexceeded", function (file) {
                        alert("Limite de arquivos atingido!");
                        this.removeFile(file);
                    });
                }
            });


            $('#modalAddcondominioProriedade').on('hidden.bs.modal', function (e) {
                $(form)[0].reset()
                $('input[name="street"]').val("")
                $('input[name="district"]').val("")
                $('input[name="city_id"]').val("")
                $('input[name="state"]').val("")
                $('input[name="complement"]').val("")
                $('input[name="number"]').val("")
                myDropzoneCondominio.removeAllFiles(true);

                $('input[name="CEP"]').blur()

            })


            // Stepper lement
            var element = document.querySelector("#stepper_add_condominio");

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
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAddCondominioModal.init();
});
