@extends('admin.layouts.page')

@section('content')
    <!---- TOOLBAR ---->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            @include('admin.layouts.components.title_bread')
        </div>
        <!--end::Toolbar container-->
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card shadow-sm p-md-2 mx-n4 mx-md-0">
                
                <div class="card card-flush">

                    <div class="card-body">

                        <div class="d-sm-flex justify-content-between align-items-start pb-4">

                            <div class="order-sm-1">
                                
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações Básicas
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            Título do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            TITULO IMOVEL
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Tipo do Imóvel:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                </table>

                            </div>

                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações do Proprietário do Imóvel
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            Nome Completo:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            TITULO IMOVEL
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            CPF:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Telefone:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            E-mail
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                </table>

                            </div>
                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Endereço do Imóvel
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            CEP:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            TITULO IMOVEL
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Rua:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Número:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Bairro:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Cidade:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Complemento:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Estado:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                </table>

                            </div>
                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Detalhes do Imóvel
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            Tamanho do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            TITULO IMOVEL
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Quartos:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Suítes:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Banheiros:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Vagas de Garagem:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Características:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Descrição:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                </table>

                            </div>
                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Preço do Imóvel
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            Categoria:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            TITULO IMOVEL
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Preço do Imóvel:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Valor do IPTU:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Possui Condomínio?:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Preço Condomínio:
                                        </td>
                                        <td class="text-gray-800">
                                            TIPO DO IMÓVEL                           
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                </table>

                            </div>
                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Mídias
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            Fotos do imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            FOTOS
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Video do imóvel:
                                        </td>
                                        <td class="text-gray-800">
                                                                        
                                        </td>
                                    </tr>
                                    <!--end::Row-->
            

                                </table>
                            </div>
                        </div>

                        <!--begin::BOTÕES-->
                        <div class="row py-5 justify-content-end">
                            <div class="d-flex justify-content-end col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <!--begin::Button-->
                                    <button type="reset" data-kt-properties-type="cancel"
                                        class="btn btn-light me-3">Voltar</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" data-kt-properties-type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Editar</span>

                                    </button>
                                    <!--end::Button-->
                                </div>
                            </div>
                        </div>
                        <!--end::BOTÕES-->
                    </div>



                </div>
            </div>

        </div>
    </div>

@endsection