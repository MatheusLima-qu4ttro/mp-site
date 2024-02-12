<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-primary text-white">
                <h3>Configurações do Website</h3>
            </div>
            <div class="card-body">
{{--                <form method="post" action="{{route('website_edit')}}">--}}
{{--                    <input type="hidden" name="websiteId" value="{{$website->id ?? null}}">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="websiteCompany">Nome</label>--}}
{{--                        <input value="{{$website->company ?? null}}" name="company" type="text" class="form-control" id="websiteCompany" placeholder="Nome do Website" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="websiteDescription">Descrição</label>--}}
{{--                        <textarea name="description" class="form-control" id="websiteDescription" rows="3" required>{{$website->company_description ?? null}}</textarea>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <button type="submit" class="btn btn-primary text-white m-1">Salvar</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <form method="post" action="{{ route('website_edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="websiteId" value="{{ $website->id ?? null }}">
                    <div class="form-group">
                        <label for="websiteCompany">Nome</label>
                        <input value="{{ $website->company ?? null }}" name="company" type="text" class="form-control" id="websiteCompany" placeholder="Nome do Website" required>
                    </div>
                    <div class="form-group">
                        <label for="websiteDescription">Descrição</label>
                        <textarea name="description" class="form-control" id="websiteDescription" rows="3" required>{{ $website->company_description ?? null }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file" id="logo" name="logo_path">
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
</script>
