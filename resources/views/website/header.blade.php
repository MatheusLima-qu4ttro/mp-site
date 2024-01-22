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


<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark dark-blue" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" style="margin-left: -30px" href="{{ route("home") }}">
            <img width="150px" src="{{ url('assets/website/logo.png') }}" alt="Logo"> Móveis Pontarollo
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ $page === "home" ? "active" : "" }}">
                    <a class="nav-link" href="{{ route("home") }}">Móveis</a>
                </li>
                <li class="nav-item {{ $page === "about" ? "active" : "" }}">
                    <a class="nav-link" href="{{ route("about") }}">Eletrodomésticos</a>
                </li>
                <li class="nav-item {{ $page === "catalog" ? "active" : "" }}">
                    <a class="nav-link" href="{{ route("catalog") }}">Estofados</a>
                </li>
                <li class="nav-item {{ $page === "contact" ? "active" : "" }}">
                    <a class="nav-link" href="{{ route("contact") }}">Celulares</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa-2x fa fa-user"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="cart.html">
                        <i class="fa-2x fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
