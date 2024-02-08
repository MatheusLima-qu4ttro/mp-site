<x-app-layout>
    <x-slot name="header">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Informações do site</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
