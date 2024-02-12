<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{url('assets/js/sb-admin-2.min.js')}}"></script>
        <script src="{{url('assets/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{url('assets/js/demo/chart-area-demo.js')}}"></script>
        <script src="{{url('assets/js/demo/chart-pie-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <link href="https://unpkg.com/tabulator-tables@5.5.4/dist/css/tabulator.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.4/dist/js/tabulator.min.js"></script>
        <link href="https://unpkg.com/tabulator-tables@4.3.0/dist/css/bootstrap/tabulator_bootstrap.css" rel="stylesheet">

        <!-- CSS do Summernote -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

        <!-- jQuery (obrigatório para o Summernote) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- JavaScript do Summernote -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-light">
        <div id="wrapper">
            @livewire('navigation-menu')

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <div class="card">
                        <div class="card-body">
                            {{ $header }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="container my-5">
            {{ $slot }}
        </main>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>

    {{--mostra mensagem de suceso se existir a variavel sucess--}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: '{{ session('success') }}',
            })
        </script>
    @endif

    {{--mostra mensagem de erro se existir a variavel error--}}
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '{{ session('error') }}',
            })
        </script>
    @endif

</html>

<script>
    $(document).ready(function() {
        $('.decimal').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>
