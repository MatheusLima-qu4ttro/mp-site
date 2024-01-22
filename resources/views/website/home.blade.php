@extends('website.layout')

@section('content')

@include('website.carousel')

<!-- Catalogo -->
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/sofa.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">LIQUIFICADOR OSTER 1400W.</p>
                        <div class="">
                            @if(!true)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(true)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(true)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/logo.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info"><i class="fa-solid fa-info"></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">LIQUIFICADOR OSTER 1400W.</p>
                        <div class="">
                            @if(!false)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(false)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(false)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/sofa.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info"><i class="fa-solid fa-info"></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">LIQUIFICADOR OSTER 1400W.</p>
                        <div class="">
                            @if(!true)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(true)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(true)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/sofa.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info"><i class="fa-solid fa-info"></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">LIQUIFICADOR OSTER 1400W.</p>
                        <div class="">
                            @if(!true)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(true)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(true)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/sofa.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info"><i class="fa-solid fa-info"></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">LIQUIFICADOR OSTER 1400W.</p>
                        <div class="">
                            @if(!true)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(true)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(true)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Catalogo -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <section id="product-info" class="m-3">

                <div class="item-image-parent mx-2">
                    <div class="item-list-vertical">
                        <div class="thumb-box">
                            <img src="https://i.ibb.co/VJf6fXm/thumb1.jpg" alt="thumbnail" />
                        </div>
                        <div class="thumb-box">
                            <img src="https://i.ibb.co/Jt5zc58/thumb2.jpg" alt="thumbnail" />
                        </div>
                        <div class="thumb-box">
                            <img src="https://i.ibb.co/Yf9LMpy/thumb3.jpg" alt="thumbnail" />
                        </div>
                        <div class="thumb-box">
                            <img src="https://i.ibb.co/60hPGy2/thumb4.jpg" alt="thumbnail" />
                        </div>

                    </div>
                    <div class="item-image-main">
                        <img src="https://i.ibb.co/xYpFY0T/item1.jpg" alt="default" />
                    </div>
                </div>

                <div class="item-info-parent mx-2">
                    <!-- main info -->
                    <div class="main-info">
                        <h3 class="font-weight-bold text-dark">Sofa de canto</h3>
                        <h4 class="">Design moderno, revestimento em tecido de alta qualidade, assento profundo e almofadas macias para máximo conforto, durabilidade e resistência, versatilidade para diversos estilos de decoração. Aproveite a oferta limitada para transformar sua sala com estilo.</h4>
                        <hr>
                        <div class="mt-3">
                            @if(!true)
                                <small class="font-weight-bold font-size-20">R$ 230,99</small>
                            @endif
                            @if(true)
                                <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                            @endif
                        </div>
                        @if(true)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ 199,99</small>
                            </div>
                        @endif
                        <hr>
                    </div>
                    <!-- Choose -->
                    <div class="select-items">

                        <div class="change-color my-2">
                            <label><b>Cor:</b> Preto</label><br>
                            <div class="thumb-box">
                                <img src="https://i.ibb.co/QjkJJk3/select1.jpg" alt="thumbnail" />
                            </div>
                            <div class="thumb-box">
                                <img src="https://i.ibb.co/C297yD0/select2.jpg" alt="thumbnail" />
                            </div>
                        </div>

                        <div>
                            <h2>Escolha a Voltagem</h2>

                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="voltagem" id="voltagem110" autocomplete="off"> 110V
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> 220V
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> Bivolt
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="align-self-end" style="margin-top: 35%">
                            <button type="button" class="btn btn-outline-primary ">Primary</button>
                            <button type="button" class="btn btn-outline-success ">Success</button>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
