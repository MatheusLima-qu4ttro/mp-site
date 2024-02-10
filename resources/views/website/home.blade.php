@extends('website.layout')

@section('content')

@include('website.carousel')

<!-- Catalogo -->
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

            @foreach($products as $variant)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="225px" height="225px" src="{{url($variant->path ?? 'assets/website/logo.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text text-uppercase">{{$variant->description}}</p>
                        <div class="">
                            @if(!$variant->promotional_price)
                                <small class="font-weight-bold font-size-20">R$ {{$variant->price}}</small>
                            @endif
                            @if($variant->promotional_price)
                                <small class="text-secondary font-size-14"><strike>R$ {{$variant->price}}</strike></small>
                            @endif
                        </div>
                        @if($variant->promotional_price)
                            <div class="">
                                <small class="font-weight-bold font-size-20">R$ {{$variant->promotional_price}}</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Catalogo -->

@include('website.product_modal')

@endsection
