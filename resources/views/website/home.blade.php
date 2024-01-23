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
                        <p class="card-text">POTRONA TECIDO VERDE</p>
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
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/geladeira.jpeg')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">GELADEIRA BRANCA 2 PORTAS</p>
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
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/couch.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">SOFA 2 METROS</p>
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
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/product-3.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">CADEIRA ESTOFADA</p>
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
                        <img class="opacity" width="225px" height="225px" src="{{url('assets/website/images/product-1.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text">CADEIRA GIRATORIA</p>
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

@include('website.product_modal')

@endsection
