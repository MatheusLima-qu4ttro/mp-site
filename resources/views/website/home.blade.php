@extends('website.layout')

@section('content')

@include('website.carousel')

<!-- Catalogo -->
<div class="album py-5 bg-light">
    <div class="container">
        <h3>{{$categorySelected}}</h3>

        <input type="search" class="form-control mb-3" placeholder="Pesquisar..." onchange="search()">

        <div class="row">
            @forelse($products as $variant)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow catalog">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="opacity" width="200px" height="200px" src="{{url($variant->path ?? 'assets/website/logo.png')}}">
                        <!-- Botões de ação (carrinho e detalhes) -->
                        <div class="card-actions">
                            <button class="card-action-button bg-secondary button-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-info" ></i></button>
                            <button class="card-action-button button-cart"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body border-top text-center">
                        <p class="card-text text-uppercase">{{ Illuminate\Support\Str::limit($variant->name, 50, '...') }}</p>
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
                @empty
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Nenhum produto encontrado!
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</div>
<!-- Catalogo -->

@include('website.product_modal')

@endsection

<script>
    function search() {
        var search = document.querySelector('input[type="search"]').value;
        window.location.href = `/?search=${search}`;
    }

    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const search = urlParams.get('search');
        if(search) {
            document.querySelector('input[type="search"]').value = search;
        }
    }
</script>
