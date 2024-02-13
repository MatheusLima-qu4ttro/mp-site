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
            <img width="150px" src="{{ url($company->logo_path ?: '') }}" alt="Logo"> <span style="font-size: {{$company->size ?: '20'}}px;font-family: {{$company->font ?: 'Arial'}};">{{$company->company ?: ''}}</span>
        </a>

        <!-- Botão de alternância para dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu à direita em telas médias e maiores -->
        <div class="collapse navbar-collapse" id="navbarsFurni" style="margin-left: 10vw; text-align: center">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Todos</a>
                </li>
                @foreach($categories as $category)
                    @if(isset($category['subcategories']))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarsFurni{{$category['id']}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$category['name']}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarsFurni{{$category['id']}}">
                                @foreach($category['subcategories'] as $subcategory)
                                    <a class="dropdown-item" href="#">
                                        {{$subcategory['name']}}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/?category_id={{$category['id']}}">{{$category['name']}}</a>
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
