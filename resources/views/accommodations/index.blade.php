@extends("layouts.main")
@section('title', 'Accommodations')

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
                <p class="bold">Name</p>
                <p class="bold">Address</p>
                <p class="bold">Description</p>
                <p class="bold">Validated</p>
            </div>
            @foreach($lodging as $lodge)
                <div class="acc-container">
                    <a class="acc-container clickable-element"
                       href="{{ url('/accommodations', ['id' => $lodge->id_lodging]) }}">
                        <p>{{ $lodge->name }}</p>
                        <p>{{ $lodge->address }}</p>
                        <p>{{ $lodge->description }}</p>
                        <p>{{ $lodge->validated ? 'Sim' : 'Não' }}</p>
                    </a>

                    @if(auth()->user()->user_type == 'admin')
                        <form class="default-form" action="{{ url('/accommodations', ['id' => $lodge->id_lodging]) }}"
                              method="POST">
                            @method('patch')
                            @csrf
                            <button class="default-button"
                                    type="Submit"
                                {{ $lodge->validated ? 'disabled' : '' }}>
                                {{$lodge->validated ? 'Aprovado' : 'Aprovar'}}
                            </button>
                        </form>
                    @elseif($lodge->validated)
                        <a type="button" class="default-button"
                           href="{{ url('/accommodations/'. $lodge->id_lodging .'/schedule-cleaning')
                        }}">
                            Pedir limpeza
                        </a>
                    @else
                        <button type="button" class="default-button" disabled>
                            Pedir limpeza
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

