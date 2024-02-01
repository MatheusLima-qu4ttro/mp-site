<div class="container mt-5">
    <footer class="text-center py-4">
        <div class="row py-4 d-flex align-items-center dark-blue">
            <div class="col-md-6 text-white">
                <h6">Conecte-se conosco nas redes sociais!</h6>
            </div>
            <div class="col-md-6">
{{--                <a href="#"><span class="fa fa-brands fa-facebook-f"></span></a>--}}
{{--                <a href="#"><span class="fa fa-brands fa-twitter"></span></a>--}}
{{--                <a href="#"><span class="fa fa-brands fa-instagram"></span></a>--}}
{{--                <a href="#"><span class="fa fa-brands fa-linkedin"></span></a>--}}
            </div>
        </div>
        <div class="container text-center text-md-left mt-5">
            <div class="row mt-3">
                <div class="col-md-4 col-lg-5 col-xl-4 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">{{$company->company ?: ''}}</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p class="text-justify">
{{--                        Descubra a combinação perfeita entre funcionalidade e estilo em nossa ampla seleção de móveis e eletrodomésticos. Na MÓVEIS PONTAROLLO, oferecemos soluções inteligentes para transformar sua casa em um espaço acolhedor e moderno.--}}
                        {{$company->company_description ?: ''}}
                    </p>
                </div>
{{--                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">--}}
{{--                    <h6 class="text-uppercase font-weight-bold">Products</h6>--}}
{{--                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">--}}
{{--                    <p>--}}
{{--                        <a href="#!">MDBootstrap</a>--}}
{{--                    </p>--}}
{{--                    <p>--}}
{{--                        <a href="#!">MDWordPress</a>--}}
{{--                    </p>--}}
{{--                    <p>--}}
{{--                        <a href="#!">BrandFlow</a>--}}
{{--                    </p>--}}
{{--                    <p>--}}
{{--                        <a href="#!">Bootstrap Angular</a>--}}
{{--                    </p>--}}
{{--                </div>--}}
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Redes Sociais</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    @if($company->facebook_url)
                    <p>
                        <a href="{{$company->facebook_url}}{{--https://www.facebook.com/moveispontarollooficial--}}" target="_blank"><span class="fa fa-brands fa-facebook-f"></span> Facebook</a>
                    </p>
                    @endif
                    @if($company->instagram_url)
                    <p>
                        <a href="{{$company->instagram_url}}{{--https://www.instagram.com/moveis.pontarollo/--}}" target="_blank"><span class="fa fa-brands fa-instagram"></span> Instagram</a>
                    </p>
                    @endif
                    @if($company->linkedin_url)
                    <p>
                        <a href="{{$company->linkedin_url}}" target="_blank"><span class="fa fa-brands fa-linkedin-in"></span> LinkedIn</a>
                    </p>
                    @endif
                    @if($company->twitter_url)
                    <p>
                        <a href="{{$company->twitter_url}}" target="_blank"><span class="fa fa-brands fa-twitter"></span> Twitter</a>
                    </p>
                    @endif
                    @if($company->tiktok_url)
                    <p>
                        <a href="{{$company->tiktok_url}}" target="_blank"><span class="fa fa-brands fa-tiktok"></span> Tiktok</a>
                    </p>
                    @endif
                </div>
                <div class="col-md-5 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Contato</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> {{$company->address ?: ''}}{{--Avenida São João 1949, Prudentópolis, PR, Brazil--}}</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> {{$company->email ?: ''}}{{--televendas@lojaspontarollo.com.br--}}</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> {{$company->whatsapp ?: ''}}{{--+55 42 9871-0091--}}</p>
                </div>
            </div>
        </div>

        <div class="row pt-4 border-top">
            <div class="col-lg-6 text-center text-lg-end">
                <ul class="list-unstyled d-inline-flex ms-auto">
                    <li class="me-4 mx-2"><a href="{{ route("terms") }}">Termos &amp; Condições</a></li>
                    <li class="mx-2"><a href="{{ route("lgpd") }}">Politica de privacidade</a></li>
                </ul>
            </div>
        </div>
        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-12">
                    <p class="mb-2 text-center text-lg-start">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>. Todos os direitos reservados. &mdash; Desenvolvido por <a href="https://mlsolution.net.br/">ML Solutions</a> em parceria com Javier Santiago
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
