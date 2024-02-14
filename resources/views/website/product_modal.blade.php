<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<!-- Custom styles for this template -->
<link href="{{url('assets/website/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('assets/website/carousel.css')}}" rel="stylesheet">
<link href="{{url('assets/website/custom.css')}}" rel="stylesheet">
<script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
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

<style>
    .carousel-control-next,
    .carousel-control-prev /*, .carousel-indicators */ {
        filter: invert(100%);
    }

</style>

<!-- Modal -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="productCarousel" class="carousel slide bg-gray-100" data-ride="carousel">
                            <div class="carousel-inner" style="width: 400px; height: 400px; margin-left: 25%">
                               @foreach($variant->imgs as $key => $image)
                                    <div style="width: 400px; height: 400px; " class="carousel-item text-center {{$key == 0 ? 'active' : ''}}">
                                        <img src="{{url($image->path)}}" class="d-block w-100 carousel-img" alt="Produto 1">
                                    </div>
                               @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item-info-parent mx-2 my-4">
                            <!-- main info -->
                            <div class="main-info">
                                <h3 class="font-weight-bold text-dark">{{$variant->name}}</h3>
                                <h4 class="">{!! $variant->description !!}</h4>
                                <hr>
                                <div class="mt-3">
                                    @if(!true)
                                        <small class="font-weight-bold font-size-20">R$ {{$variant->price}}</small>
                                    @endif
                                    @if(true)
                                        <small class="text-secondary font-size-14"><strike>R$ {{$variant->promotional_price}}</strike></small>
                                    @endif
                                </div>
                                @if(true)
                                    <div class="">
                                        <small class="font-weight-bold font-size-20">R$ {{$variant->price}}</small>
                                    </div>
                                @endif
                                <hr>
                            </div>
                            <!-- Choose -->
                            <div class="select-items">

                                <div class="change-color my-2">
                                    <label><b>Cor:</b> </label><br>
                                </div>

                                <div>
                                    <h3>Voltagem</h3>

                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem110" autocomplete="off"> 110V
                                        </label>
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> 220V
                                        </label>
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> Bivolt
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
{{--                        <button type="button" class="btn btn-add-cart "><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>--}}
                        <button type="button" class="btn btn-share-whatsapp "><i class="fa-brands fa-whatsapp"></i> Compartilhar por whatsapp</button>
                    </div>
                </div>

            </div>
        </div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
