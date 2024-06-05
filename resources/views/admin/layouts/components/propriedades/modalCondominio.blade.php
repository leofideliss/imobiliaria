<div class="modal fade" id="modalAddcondominioProriedade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddcondominioProriedade" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddcondominioProriedade">Adicionar condominio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('admin.layouts.components.condominios.cardCreate')
                @include('admin.layouts.components.modalAwaitImages')

            </div>
        </div>
    </div>
</div>
