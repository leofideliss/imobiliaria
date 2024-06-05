"use strict";

// Class definition
var KTEditCondominio = function () {
    var form
    var closeButton
    var submitButton
    var regexUrl = /(https?:\/\/.*?)/
    var myDropzone
    var validator;
    var cond_id
    var uploadControl = 0
    var hasSortable
    var deleteExceed = 0
    const urlBase = window.location.protocol + "//" + window.location.host;

    var seedCaracteristicas = function () {
        let condominio_id = $("input[name=condominio_id]").val()
        let selecteds
        $.ajax({
            url: `${urlBase}/condominio/caracteristicas/listCaracteristicasCondominioJsonSelected/${condominio_id}`,
            type: "get",
            dataType: 'json',
            async: false,
            success: function (d) {
                selecteds = d
            },
            error: function (d) {
                console.log(d);
            },

        });

        $.ajax({
            url: `${urlBase}/register/caracteristicas/listCaracteristicasCondominioJson`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let list_caracteristicas = $("#caracteristicas_condominio")
                let inputHtml
                d.data.forEach(element => {
                    if (selecteds.findIndex(({ id }) => id == element.id) != -1) {
                        inputHtml = `   <input class="form-check-input list_caract" type="checkbox" value="${element.id}"
id="caracteristicas${element.id}" name="list_caract" checked/>`
                    }
                    else {

                        inputHtml = `   <input class="form-check-input list_caract" type="checkbox" value="${element.id}"
                        id="caracteristicas${element.id}" name="list_caract" />`
                    }

                    let html = `<div class="form-check col-3 pb-4">
                 ${inputHtml}
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
                    formData.append('cond_id', cond_id)




                    $.ajax({
                        url: `${urlBase}/condominio/deleteAllImages/${cond_id}`,
                        type: "delete",
                        dataType: 'json',
                        async: false,
                        success: function (e) {
                            console.log('success', e)

                        },
                        error: function (e) {
                            console.log('error', e)

                        }
                    });

                    uploadControl = 1

                    myDropzone.files.forEach((element, i) => {
                        myDropzone.enqueueFile(element)
                    });

                    $.ajax({
                        url: $(form).data("request"),
                        type: "post",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function (data) {

                            condominio_id = data.condominio_id
                            myDropzone.options.url = `${urlBase}/condominio/uploadImg/${data.condominio_code}/${data.condominio_id}`
                            myDropzone.processQueue();

                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;

                            // location.href = data.redirect
                            console.log(data, 'success')
                        },
                        error: function (d) {
                            let data = d.responseJSON;

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
            window.history.go(-1)
        })
    }

    var toFile = function (src, fileName, mimeType) {
        return (fetch(src)
            .then(function (res) {
                return res.arrayBuffer();
            })
            .then(function (buf) {
                return new File([buf], fileName, { type: mimeType });
            })
        );
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
                hasSortable = 1
                let queue = myDropzone.files;
                let newQueue = [];

                $('#divDropzoneCondominio .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function (file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
                });
                myDropzone.files = newQueue;

            }
        });
    }



    var handleImgs = function () {
        let imgs
        $.ajax({
            url: `${urlBase}/api/condominio/getImgs/${cond_id}`,
            type: 'get',
            dataType: 'json',
            async: false,
            success: function (data) {
                imgs = data.imgs
            },
            error: function (data) {

                console.log('error', data)
            }
        });

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

        myDropzone = new Dropzone("div#divDropzoneCondominio", {
            url: `${urlBase}/api/condominio/getImgs/`, // Set the url for your upload script location
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
            init: function () {
                let myDropzone = this;

                $.each(imgs, function (index, preFile) {
                    var mockFile = toFile(preFile.pathname, preFile.filename);
                    mockFile.then(function (file) {
                        file.status = Dropzone.ADDED
                        file.upload = { bytesSent: 0, filename: preFile.filename, progress: 0, total: 12345 };
                        file.accepted = true;
                        myDropzone.files.push(file);
                        myDropzone.displayExistingFile(file, preFile.pathname);
                    });
                })

                this.on("addedfile", function (file) {
                    if (this.files.length) {
                        var _i, _len;
                        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) // -1 to exclude current file
                        {
                            if (this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                                this.removeFile(file);
                            }
                        }
                    }
                });


                this.on('success', this.processQueue.bind(this));

                this.on("complete", function (file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                        if (uploadControl == 1)
                            location.href = `${urlBase}/condominio`
                    }
                });

                this.on("maxfilesexceeded", function (file) {
                    alert("Limite de arquivos atingido!");
                    deleteExceed = 1
                    this.removeFile(file);
                });
                // let myDropzone = this;

                // // If the thumbnail is already in the right size on your server:
                // imgs.forEach(element => {
                //     var mockFile = { name: element.filename, size: 12345 };
                //     let callback = null; // Optional callback when it's done
                //     let crossOrigin = 'img'; // Added to the `img` tag for crossOrigin handling
                //     let resizeThumbnail = true; // Tells Dropzone whether it should resize the image first
                //     console.log(element.pathname)
                //     // myDropzone.displayExistingFile(mockFile, element.pathname, callback, crossOrigin, resizeThumbnail);
                //     myDropzone.files.push(mockFile)
                //     myDropzone.options.addedfile.call(myDropzone, mockFile);
                //     myDropzone.options.thumbnail.call(myDropzone, mockFile, element.pathname, resizeThumbnail);
                //     myDropzone.emit("complete", mockFile);
                // });

            },

            accept: function (file, done) {
                file.previewElement.querySelector(".dz-progress").remove();

                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            removedfile: function (file) {
                if (deleteExceed == 0)
                    Swal.fire({
                        title: 'A foto será excluída do imóvel',
                        text: "Não é possível reverter está ação",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, excluir!',
                        cancelButtonText: 'Não, cancelar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var fileName = file.name;
                            console.log(file)
                            $.ajax({
                                type: 'DELETE',
                                url: `${urlBase}/condominio/deleteImg`,
                                data: {
                                    'fileName': fileName,
                                    'prop_id': cond_id,
                                    '_token': $("input[name=csrf_token]").val()
                                },
                                success: function (data) {
                                    console.log('success: ' + data);
                                }
                            });

                            var _ref;
                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

                        }
                    })

                    deleteExceed = 0 
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }

        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector("#kt_condiminio_form_edit")
            if (!form)
                return

            closeButton = $('[data-kt-properties-type="cancel"]')[0]
            submitButton = $('[data-kt-properties-type="submit"]')[0]
            cond_id = $("#condominio_id").val()
            seedCaracteristicas()
            handleForm()
            cancelForm()
            handleImgs()

            createSortableImgs()





        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTEditCondominio.init();
});
