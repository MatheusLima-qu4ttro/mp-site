<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-secondary text-white">
                <div class="row">
                    <h3 class="col-10">Categorias</h3>
                    <button class="btn btn-primary float-end col-2 text-white" onclick="location.href = '{{route('category_form')}}'">Adicionar</button>
                </div>
            </div>
            <div class="card-body">
                <input type="text" id="search-field" class="form-control m-1 col-3" placeholder="Buscar..." />
                <div id="categoryGrid"></div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var table = new Tabulator("#categoryGrid", {
            columns: [
                {title: "ID", field: "id"},
                {title: "Nome", field: "name"},
                {
                    title: "Ações",
                    formatter: function(cell, formatterParams, onRendered){
                        return "<button class='btn btn-danger m-1 delete-btn' data-id='" + cell.getRow().getData().id + "'><i class='fa fa-trash text-white'></i></button>" +
                            "<button class='btn btn-secondary m-1 edit-btn' data-id='" + cell.getRow().getData().id + "'><i class='fa fa-pen text-white'></i></button>";
                    },
                    cellClick: function(e, cell){
                        var clickedElement = e.target.closest('button'); // Encontra o botão mais próximo que foi clicado
                        var id = cell.getRow().getData().id;

                        if(clickedElement && clickedElement.classList.contains('edit-btn')){
                            editarCategory(id);
                        } else if(clickedElement && clickedElement.classList.contains('delete-btn')){
                            excluirCategory(id);
                        }
                    }



                }

            ],
            data: @json($category), // Certifique-se de que $category é convertido para JSON
            layout: "fitColumns",
            pagination: "local",
            paginationSize: 7,
            langs:{
                "default":{
                    "pagination":{
                        "first": "⬅️",
                        "prev": "Anterior",
                        "next": "Próximo",
                        "last": "➡️",
                    },
                },
            },
        });

        // Ativa a busca
        document.getElementById('search-field').addEventListener('keyup', function () {
            table.setFilter(customFilterFunction);
        });

        function customFilterFunction(data){
            var value = document.getElementById('search-field').value.toLowerCase();
            return Object.values(data).some(val => String(val).toLowerCase().includes(value));
        };

        function editarCategory(categoryId) {
            location.href = "{{route('category_form')}}?categoryId=" + categoryId;
        }

        function excluirCategory(categoryId) {
            Swal.fire({
                title: "Atenção!",
                text: "Essa ação é irreversível, deseja continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim",
            }).then((result) => {
                location.href = "{{route('category_delete')}}?categoryId=" + categoryId;
            });
        }
    });







</script>
