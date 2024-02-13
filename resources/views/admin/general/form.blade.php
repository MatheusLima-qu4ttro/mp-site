<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-primary text-white">
                <h3>Configurações do Website</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('website_edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="websiteId" value="{{ $website->id ?? null }}">
                    <div class="form-group">
                        <label for="websiteCompany">Nome</label>
                        <input value="{{ $website->company ?? null }}" name="company" type="text" class="form-control" id="websiteCompany" placeholder="Nome do Website" required>
                    </div>
                    <div class="form-group">
                        <label for="size">Escolha o Tamanho</label>
                        <select class="form-control" id="size" name="size">
                            <option value="">Escolha um Tamanho</option>
                            @for ($i = 1; $i <= 80; $i++)
                                <option value="{{ $i }}" {{ $website->size == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fontSelector">Escolha a fonte:</label>
                        <select id="fontSelector" name="font" class="form-control">
                            <option value="">Escolha uma Fonte</option>
                            <option value="Arial" {{ $website->font === 'Arial' ? 'selected' : '' }}>Arial</option>
                            <option value="Helvetica" {{ $website->font === 'Helvetica' ? 'selected' : '' }}>Helvetica</option>
                            <option value="Times New Roman" {{ $website->font === 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                            <option value="Courier New" {{ $website->font === 'Courier New' ? 'selected' : '' }}>Courier New</option>
                            <option value="Verdana" {{ $website->font === 'Verdana' ? 'selected' : '' }}>Verdana</option>
                            <option value="Georgia" {{ $website->font === 'Georgia' ? 'selected' : '' }}>Georgia</option>
                            <option value="Palatino Linotype" {{ $website->font === 'Palatino Linotype' ? 'selected' : '' }}>Palatino Linotype</option>
                            <option value="Tahoma" {{ $website->font === 'Tahoma' ? 'selected' : '' }}>Tahoma</option>
                            <option value="Geneva" {{ $website->font === 'Geneva' ? 'selected' : '' }}>Geneva</option>
                            <option value="Trebuchet MS" {{ $website->font === 'Trebuchet MS' ? 'selected' : '' }}>Trebuchet MS</option>
                            <option value="Arial Black" {{ $website->font === 'Arial Black' ? 'selected' : '' }}>Arial Black</option>
                            <option value="Impact" {{ $website->font === 'Impact' ? 'selected' : '' }}>Impact</option>
                            <option value="Lucida Sans Unicode" {{ $website->font === 'Lucida Sans Unicode' ? 'selected' : '' }}>Lucida Sans Unicode</option>
                            <option value="Book Antiqua" {{ $website->font === 'Book Antiqua' ? 'selected' : '' }}>Book Antiqua</option>
                            <option value="Arial Narrow" {{ $website->font === 'Arial Narrow' ? 'selected' : '' }}>Arial Narrow</option>
                            <option value="Garamond" {{ $website->font === 'Garamond' ? 'selected' : '' }}>Garamond</option>
                            <option value="Century Gothic" {{ $website->font === 'Century Gothic' ? 'selected' : '' }}>Century Gothic</option>
                            <option value="Bookman Old Style" {{ $website->font === 'Bookman Old Style' ? 'selected' : '' }}>Bookman Old Style</option>
                            <option value="Lucida Bright" {{ $website->font === 'Lucida Bright' ? 'selected' : '' }}>Lucida Bright</option>
                            <option value="Arial Rounded MT Bold" {{ $website->font === 'Arial Rounded MT Bold' ? 'selected' : '' }}>Arial Rounded MT Bold</option>
                            <!-- Adicione mais opções conforme necessário -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="websiteDescription">Descrição</label>
                        <textarea name="description" class="form-control" id="websiteDescription" rows="3" required>{{ $website->company_description ?? null }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file" id="logo" name="logo_path" accept="image/*" onchange="previewImage()">
                        <div id="imagePreview">
                            @if ($website->logo_path)
                                <img src="{{ asset($website->logo_path) }}" style="max-width: 150px; max-height: 150px;">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebookUrl">URL do Facebook</label>
                        <input value="{{ $website->facebook_url ?? null }}" name="facebook_url" type="text" class="form-control" id="facebookUrl" placeholder="URL do Facebook">
                    </div>
                    <div class="form-group">
                        <label for="instagramUrl">URL do Instagram</label>
                        <input value="{{ $website->instagram_url ?? null }}" name="instagram_url" type="text" class="form-control" id="instagramUrl" placeholder="URL do Instagram">
                    </div>
                    <div class="form-group">
                        <label for="linkedinUrl">URL do LinkedIn</label>
                        <input value="{{ $website->linkedin_url ?? null }}" name="linkedin_url" type="text" class="form-control" id="linkedinUrl" placeholder="URL do LinkedIn">
                    </div>
                    <div class="form-group">
                        <label for="twitterUrl">URL do Twitter</label>
                        <input value="{{ $website->twitter_url ?? null }}" name="twitter_url" type="text" class="form-control" id="twitterUrl" placeholder="URL do Twitter">
                    </div>
                    <div class="form-group">
                        <label for="tiktokUrl">URL do TikTok</label>
                        <input value="{{ $website->tiktok_url ?? null }}" name="tiktok_url" type="text" class="form-control" id="tiktokUrl" placeholder="URL do TikTok">
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input value="{{ $website->address ?? null }}" name="address" type="text" class="form-control" id="address" placeholder="Endereço">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input value="{{ $website->email ?? null }}" name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <input value="{{ $website->whatsapp ?? null }}" name="whatsapp" type="text" class="form-control" id="whatsapp" placeholder="WhatsApp">
                    </div>
                    <div class="form-group">
                        <label for="termsAndConditions">Termos e Condições</label>
                        <textarea name="terms_and_conditions" class="form-control" id="termsAndConditions" rows="3">{{ $website->terms_and_conditions ?? null }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="lgpd">LGPD</label>
                        <textarea name="lgpd" class="form-control" id="lgpd" rows="3">{{ $website->lgpd ?? null }}</textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="slides">Slides</label>
                        <input type="file" class="form-control-file" id="slides" name="path[]" accept="image/*" multiple onchange="previewSlides(this)">
                    </div>

                    <!-- Carousel para exibir slides -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="carouselInner">
                            <!-- Aqui as imagens dos slides serão inseridas dinamicamente -->
                            @foreach($slides as $index => $slide)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($slide->path) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary text-white m-1">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    // Inicialize o Summernote nos campos de texto
    $(document).ready(function() {
        $('#termsAndConditions').summernote({
            placeholder: 'Digite os termos e condições...',
            tabsize: 2,
            height: 200
        });

        $('#lgpd').summernote({
            placeholder: 'Digite a política de privacidade...',
            tabsize: 2,
            height: 200
        });
    });

    function previewImage() {
        var preview = document.getElementById('imagePreview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            var img = document.createElement('img');
            img.src = reader.result;
            img.style.width = '150px'; // Ajuste o tamanho da miniatura conforme necessário
            img.style.height = 'auto'; // Ajuste o tamanho da miniatura conforme necessário
            preview.innerHTML = '';
            preview.appendChild(img);
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    }

    // Função para exibir as imagens selecionadas no carousel
    function displayImages(input) {
        $('#carouselInner').empty(); // Limpa o carousel
        if (input.files && input.files.length > 0) {
            for (let i = 0; i < input.files.length; i++) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Adiciona uma nova div de carousel-item para cada imagem
                    $('#carouselInner').append('<div class="carousel-item"><img src="' + e.target.result + '" class="d-block w-100"></div>');
                    if (i === 0) {
                        $('.carousel-item').addClass('active'); // Define a primeira imagem como ativa
                    }
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    // Ao selecionar novas imagens, chama a função para exibi-las no carousel
    $('#slides').on('change', function () {
        displayImages(this);
    });

</script>
