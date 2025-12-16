@extends("layouts.main")
@section('title', 'Alojamentos')

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        <div class="table-header">
            <form class="search-bar table-header-85-percent" action="/accommodations" method="GET">
                <input class="search-input" type="text" id="search"
                       name="search" placeholder="Procurar...">
            </form>
            <a href="/accommodations/create" class="default-button table-header-15-percent">
                Adicionar alojamento
            </a>
        </div>
        <div>
            <div class="acc-container">
                <p class="bold">Nome</p>
                <p class="bold">Endereço</p>
                <p class="bold">Descrição</p>
                <p class="bold">Validado</p>
            </div>
            @foreach($lodging as $lodge)
                <div class="acc-container">
                    <p>{{ $lodge->name }}</p>
                    <p>{{ $lodge->address }}</p>
                    <p>{{ $lodge->description }}</p>
                    <p>{{ $lodge->validated ? 'Sim' : 'Não' }}</p>
                    <button type="button" class="default-button" {{ $lodge->validated ? '' : 'disabled' }}
                            onclick="url('/accommodations/{{ $lodge->id_lodge }}/pedido-limpeza')">
                        Pedir limpeza
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection

