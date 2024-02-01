<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('assets/website/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/website/carousel.css')}}" rel="stylesheet">
    <link href="{{url('assets/website/custom.css')}}" rel="stylesheet">

    <title>Móveis Pontarollo</title>
</head>

<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark dark-blue">
    <div class="container">

        <!-- Logotipo à esquerda em telas médias e maiores -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img width="150px" src="{{ url($company->logo_path ?: '') }}" alt="Logo"> {{$company->company ?: ''}}<!--Móveis Pontarollo-->
        </a>

        <!-- Botão de alternância para dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu à direita em telas médias e maiores -->
        <div class="collapse navbar-collapse" id="navbarsFurni" style="margin-left: 20vw; text-align: center">
            <ul class="navbar-nav mr-auto">
                @foreach($categories as $key => $cat)
                    @if(count($cat) == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{$cat[$key]}}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            @foreach($cat as $subKey => $subCat)
                                @if ($loop->first)
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarsFurni" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$subCat}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarsFurni">
                                @else
                                        <a class="dropdown-item" href="#">
                                            {{$subCat[$subKey]}}
                                        </a>
                                @endif
                            @endforeach
                                    </div>
                        </li>
                    @endif
                @endforeach
            </ul>

            <!-- Ícones de usuário e carrinho -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa-2x fa fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">
                        <i class="fa-2x fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- Botão WhatsApp flutuante -->
<a href="https://web.whatsapp.com/send?phone={{$company->whatsapp ?: ''}}" target="_blank" class="whatsapp-btn btn btn-success">
    <i class="fab fa-whatsapp"></i>
</a>
