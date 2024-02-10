<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-primary text-white">
                <h3>Produto</h3>
            </div>
            <div class="card-body">
                <input type="text" id="search-field" class="form-control m-1 col-3" placeholder="Buscar..." />
                <div id="productGrid"></div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var table = new Tabulator("#productGrid", {
            columns: [
                {title: "ID", field: "id"},
                {title: "Nome", field: "name"},
                {title: "Descrição", field: "description"},
                {title: "categoria", field: "category"},
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
                            editarProduct(id);
                        } else if(clickedElement && clickedElement.classList.contains('delete-btn')){
                            excluirProduct(id);
                        }
                    }



                }

            ],
            data: @json($products), // Certifique-se de que $products é convertido para JSON
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

        function editarProduct(productId) {
            location.href = "{{route('product_form')}}?productId=" + productId;
        }

        function excluirProduct(productId) {
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
                location.href = "{{route('product_delete')}}?productId=" + productId;
            });
        }
    });







</script>
