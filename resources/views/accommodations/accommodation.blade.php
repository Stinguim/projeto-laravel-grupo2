@extends("layouts.main")
@section('title', 'Alojamentos - ' . $lodge->name)

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">

        {{-- Lodging info card --}}
        <div class="lodge-info">
            <div>
                <span class="label">Endereço</span>
                <p>{{ $lodge->address }}</p>
            </div>

            <div>
                <span class="label">Descrição</span>
                <p>{{ $lodge->description }}</p>
            </div>

            <div>
                <span class="label">Validado</span>
                <p class="{{ $lodge->validated ? 'ok' : 'no' }}">
                    {{ $lodge->validated ? 'Sim' : 'Não' }}
                </p>
            </div>
        </div>

        {{-- Cleanings --}}
        <h2 class="section-title">Limpezas</h2>

        <div class="cleaning-table">
            <div class="cleaning-row header">
                <span>Descrição</span>
                <span>Data</span>
                <span>Companhia</span>
            </div>

            @forelse($cleaning as $clean)
                <div class="cleaning-row">
                    <span>{{ $clean->descricao }}</span>
                    <span>{{ $clean->data_request }}</span>
                    <span>{{ $clean->company }}</span>
                </div>
            @empty
                <div class="cleaning-row empty">
                    <span>Sem limpezas registadas</span>
                </div>
            @endforelse
        </div>

    </div>
@endsection

