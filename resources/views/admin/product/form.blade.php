<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-primary text-white">
                <h3>Produto</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('product_create')}}">
                    <input type="hidden" name="productId" value="{{$product->id ?? null}}">
                    <div class="form-group">
                        <label for="productName">Nome</label>
                        <input value="{{$product->name ?? null}}" name="name" type="text" class="form-control" id="productName" placeholder="Nome do produto" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Descrição</label>
                        <textarea name="description" class="form-control" id="productDescription" rows="3" required>{{$product->description ?? null}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="productName">Categoria</label>
                        <select name="category_id" class="form-select" data-live-search="true" required>
                            <option value="" disabled selected>Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{($product->category_id ?? null) == $category->id ? 'selected' : ''}}>{{$category->fullName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary text-white m-1">Salvar</button>
                        @if(($product->id ?? null))
                            <button type="button" class="btn btn-primary text-white m-1" data-bs-toggle="modal" data-bs-target="#variantModal">Adicionar Variante</button>                        @endif
                        <a href="{{route("product_list")}}" class="btn btn-secondary text-white m-1">Voltar</a>
                    </div>
                </form>
            </div>
        </div>

{{--        Modal      --}}
        <div class="modal fade" id="variantModal" tabindex="-1" aria-labelledby="variantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="variantModalLabel">Variante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="post" action="{{route('product_variant_create')}}">
                            <input type="hidden" name="productId" value="{{$product->id ?? null}}">
                            <input type="hidden" name="variantId" id="variantId" value="">

                            <div class="row">
                                    <div class="form-group col">
                                        <label for="price">Preço original</label>
                                        <input name="price" type="text" class="form-control decimal" id="price" required>
                                    </div>
                                    <div class="form-group col">
                                        <label for="promotionalPrice">Preço promocional</label>
                                        <input name="promotionalPrice" type="text" class="form-control decimal" id="promotionalPrice" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" class="form-control" id="productVariantDescription" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="model">Modelo</label>
                                        <input name="model" type="text" class="form-control" id="model" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="colorName">Nome da cor</label>
                                        <input name="colorName" type="text" class="form-control" id="productColorName" required>
                                    </div>
                                    <div class="form-group col">
                                        <label for="colorCode">Cor</label>
                                        <input name="colorCode" type="color" class="form-control" id="productColor" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="productVolt">Voltagem</label>
                                        <select name="voltage" class="form-control" id="productVolt" required>
                                            <option value="" disabled selected>Selecione uma voltagem</option>
                                            <option>N/A</option>
                                            <option>110</option>
                                            <option>220</option>
                                            <option>Bivolt</option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="imagemProduto">Imagem do Produto:</label>
                                        <input type="file" id="imagemProduto" name="imagem_produto[]" accept="image/*" multiple>
                                        <br>
                                    </div>
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner" id="imagePreviewCarousel"></div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Anterior</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Próximo</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" id="addVariant" class="btn btn-primary text-white">Adicionar</button>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @if(isset($product->id))
            <input type="text" id="search-field" class="form-control m-1 col-3" placeholder="Buscar..." />
            <div id="variantGrid"></div>
         @endif
    </x-slot>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var table = new Tabulator("#variantGrid", {
            columns: [
                {title: "ID", field: "id"},
                {title: "Descrição", field: "description"},
                {title: "Modelo", field: "model"},
                {title: "Cor", field: "color_name"},
                {title: "Preço", field: "price"},
                {title: "Preço promocional", field: "promotional_price"},
                {title: "Voltagem", field: "voltage"},
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
                            editarVariant(id);
                        } else if(clickedElement && clickedElement.classList.contains('delete-btn')){
                            excluirVariant({{$product->id ?? null}}, id);
                        }
                    }

                }
            ],
            data: @json($variants), // Certifique-se de que $variants é convertido para JSON
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
        }

        function editarVariant(id) {
            var variantDetails = table.getData().find(variant => variant.id == id);

            if (variantDetails) {
                // Preenche os campos do modal com os dados da variante
                $('#variantId').val(variantDetails.id);
                $('#price').val(decimalShow(variantDetails.price));
                $('#promotionalPrice').val(decimalShow(variantDetails.promotional_price));
                $('#productVariantDescription').val(variantDetails.description);
                $('#model').val(variantDetails.model);
                $('#productColorName').val(variantDetails.color_name);
                $('#productColor').val(variantDetails.colorCode);
                $('#productVolt').val(variantDetails.voltage);

                // Aqui você adiciona a lógica para preencher o carrossel com as imagens da variante
                var carouselInner = $('#imagePreviewCarousel');
                carouselInner.empty(); // Limpa o carrossel antes de adicionar novas imagens
                if (variantDetails.image && variantDetails.image.length > 0) {
                    variantDetails.image.forEach(function(image, index) {
                        var isActive = index === 0 ? 'active' : ''; // Faz a primeira imagem ativa
                        var carouselItem = $(`<div class="carousel-item ${isActive}"><img src="${image.image}" class="d-block w-100" alt="Imagem do Produto"></div>`); // Certifique-se de que `image.url` é o caminho correto para a URL da imagem
                        carouselInner.append(carouselItem);
                    });
                }

                // Abre o modal
                $('#variantModal').modal('show');
            } else {
                console.log("Detalhes da variante não encontrados para o ID:", id);
            }
        }


        function excluirVariant(productId, variantId) {
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
                if (result.isConfirmed) {
                   location.href = "{{route('product_variant_delete')}}?variantId=" + variantId + "&productId=" + productId;
                }
            });
        }
    });



    $(document).ready(function() {
        $('#imagemProduto').on('change', function() {
            var files = $(this)[0].files;
            var carouselInner = $('#imagePreviewCarousel');
            carouselInner.empty();

            for (var i = 0; i < files.length; i++) {
                (function(file){
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imageUrl = e.target.result;
                        var carouselItem = $('<div class="carousel-item ' + (carouselInner.children().length === 0 ? 'active' : '') + '"><img src="' + imageUrl + '" class="d-block w-100" alt="Imagem do Produto"></div>');
                        carouselInner.append(carouselItem);
                    };
                    reader.readAsDataURL(file);
                })(files[i]);
            }
        });
    });

    //valida se o campo promotionalPrice é maior que o campo price se for ele limpa os campos e tambem validar o price
    $('#price').on('change', function() {
        if(parseFloat($('#promotionalPrice').val()) > parseFloat($('#price').val())){
            $('#promotionalPrice').val('');
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O preço promocional não pode ser maior que o preço original!',
            });
        }
    });

    $('#promotionalPrice').on('change', function() {
        if(parseFloat($('#promotionalPrice').val()) > parseFloat($('#price').val())){
            $('#promotionalPrice').val('');
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O preço promocional não pode ser maior que o preço original!',
            });
        }
    });

    function decimalShow(number) {
        return number.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

</script>
