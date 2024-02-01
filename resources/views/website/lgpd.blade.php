@extends('website.layout')

@section('content')

<div class="container">
    <h1 class="mt-4 mb-4">Política de Privacidade</h1>

    {!! $lgpd ?: '' !!}

</div>

@endsection
