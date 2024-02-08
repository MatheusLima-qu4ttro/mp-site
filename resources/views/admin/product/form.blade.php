<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-gradient-primary text-white">
                <h3>Produto</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="productName">Nome</label>
                        <input type="text" class="form-control" id="productName" placeholder="Nome do produto">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Descrição</label>
                        <textarea class="form-control" id="productDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productName">Categoria</label>
                        <input type="text" class="form-control" id="productCategory">
                    </div>
                </form>
            </div>
        </div>

{{--        //Variants Form--}}
        <div class="card text-left">
            <div class="card-header bg-gradient-secondary text-white">
                <h3>Variante</h3>
            </div>

            <div class="card-body variant">
                <hr>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="productPrice">Preço original</label>
                        <input type="number" class="form-control" id="productPrice">
                    </div>
                    <div class="form-group">
                        <label for="productPromotionalPrice">Preço promocional</label>
                        <input type="number" class="form-control" id="productPromotionalPrice">
                    </div>
                    <div class="form-group">
                        <label for="productVariantDescription">Descrição</label>
                        <textarea class="form-control" id="productVariantDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productColorName">Nome da cor</label>
                        <input type="text" class="form-control" id="productColorName">
                    </div>
                    <div class="form-group">
                        <label for="productColor">Cor</label>
                        <input type="color" class="form-control" id="productColor">
                    </div>
                    <div class="form-group">
                        <label for="productVolt">Voltagem</label>
                        <select class="form-control" id="productVolt">
                            <option>110</option>
                            <option>220</option>
                            <option>Bivolt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagemProduto">Imagem do Produto:</label>
                        <input type="file" id="imagemProduto" name="imagem_produto[]" accept="image/*" multiple>
                        <br>
                        <img id="previewImagemProduto" src="#" alt="Imagem do Produto" style="display: none; width: 100px; height: auto;"/>
                    </div>
                </form>

                <button id="addVariant" class="btn btn-primary" >Adicionar Nova Variante</button>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-header bg-gradient-secondary text-white">
                <h3>Variantes</h3>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <h5 class="card-title font-weight-bold">Preço original</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="card-title font-weight-bold">Preço promocional</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="card-title font-weight-bold">Descrição</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="card-title font-weight-bold">Nome da cor</h5>
                        </div>
                        <div class="col-md-1">
                            <h5 class="card-title font-weight-bold">Cor</h5>
                        </div>
                        <div class="col-md-1">
                            <h5 class="card-title font-weight-bold">Voltagem</h5>
                        </div>
                        <div class="col-md-1">
                            <h5 class="card-title font-weight-bold">Imagem do Produto</h5>
                        </div>
                        <div class="col-md-1 font-weight-bold">
                            <h5 class="card-title font-weight-bold">Açôes</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="card-text">R$ 125</p>
                        </div>
                        <div class="col-md-2">
                            <p class="card-text">R$ 90</p>
                        </div>
                        <div class="col-md-2">
                            <p class="card-text">sdfmslkdfgs fsdnf jksdf  sdkjfsd fksdlkdfgs fsdnf jksdf  sdkjfsd fksdlkdfgs fsdnf jksdf  sdkjfsd fksdlkdfgs fsdnf jksdf  sdkjfsd fksdnfkjsd f...21</p>
                        </div>
                        <div class="col-md-2">
                            <p class="card-text">R$ 90</p>
                        </div>
                        <div class="col-md-1">
                            <p class="card-text">R$ 90</p>
                        </div>
                        <div class="col-md-1">
                            <p class="card-text">R$ 90</p>
                        </div>
                        <div class="col-md-1">
                            <p class="card-text">R$ 90</p>
                        </div>
                        <div class="col-md-1 justify-content-between">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

        </div>

        <div id="variantFields"></div>
    </x-slot>
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#imagemProduto').change(function() {
            var files = this.files;
            $('#previewImagemProduto').empty(); // Limpa pré-visualizações anteriores

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img/>', {
                        src: e.target.result,
                        width: '100px', // Define a largura da pré-visualização
                        height: 'auto', // Altura automática para manter a proporção
                        style: 'margin-right: 10px; margin-bottom: 10px;'
                    });
                    $('#previewImagemProduto').append(img); // Adiciona a imagem ao container de pré-visualização
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
