@extends('website.layout')

@section('content')

<div class="container">
    <h1 class="mt-4 mb-4">Termos e Condições</h1>

    {!! $terms ?: '' !!}

</div>

@endsection
