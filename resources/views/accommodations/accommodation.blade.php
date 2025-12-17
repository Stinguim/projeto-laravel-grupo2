@extends("layouts.main")
@section('title', 'Alojamentos - ' . $lodge->name)

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        <p>Endereço: {{ $lodge->address }}</p>
        <p>Descrição: {{ $lodge->description }}</p>
        <p>Validado: {{ $lodge->validated ? 'Sim' : 'Não' }}</p>
        <h2>Limpezas</h2>
        <div class="acc-container">
            <p class="bold">Descrição</p>
            <p class="bold">Data</p>
            <p class="bold">Companhia</p>
        </div>
        @foreach($cleaning as $clean)
            <div class="acc-container">
                <p>{{ $clean->descricao }}</p>
                <p>{{ $clean->data_request }}</p>
                <p>{{ $clean->company }}</p>
            </div>
        @endforeach
    </div>
@endsection

