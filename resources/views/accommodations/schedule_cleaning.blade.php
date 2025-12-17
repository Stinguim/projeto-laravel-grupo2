@extends("layouts.main")
@section('title', 'Alojamentos - Agendar Limpeza')

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        <form class="default-form"
              action="{{ url('/accommodations/'. $lodge->id_lodging .'/schedule-cleaning') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="input-container">
                    <label for="lodging_id">Alojamento</label>
                    <input type="hidden" autocomplete="off" id="lodging_id" name="lodging_id"
                           value="{{ $lodge->id_lodging }}">
                    <p>{{ $lodge->name }}</p>
                </div>
            </div>

            <div class="container">
                <div class="input-container">
                    <label for="description">Descrição</label>
                    <input type="text" id="description" name="description" placeholder="Descrição">
                </div>
            </div>

            <div class="container">
                <div class="input-container">
                    <label for="date">Data</label>
                    <input type="date" id="date" name="date">
                </div>
            </div>

            <div class="container">
                <div class="input-container">
                    <label for="company_id">Companhia</label>
                    <select id="company_id" name="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id_company }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="Submit" class="default-button">Fazer pedido</button>
        </form>
    </div>
@endsection
