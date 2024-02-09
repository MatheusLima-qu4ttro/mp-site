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
                        <button href="" class="btn btn-secondary text-white m-1">Voltar</button>
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
                                        <select name="productVolt" class="form-control" id="productVolt" required>
                                            <option value="" disabled selected>Selecione uma voltagem</option>
                                            <option>110</option>
                                            <option>220</option>
                                            <option>Bivolt</option>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="imagemProduto">Imagem do Produto:</label>
                                        <input type="file" id="imagemProduto" name="imagem_produto[]" accept="image/*" multiple required>
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
        <div id="variantFields"></div>
    </x-slot>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#imagemProduto').on('change', function() {
            var files = $(this)[0].files;
            var carouselInner = $('#imagePreviewCarousel');
            carouselInner.empty(); // Limpa as imagens anteriores

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
</script>
