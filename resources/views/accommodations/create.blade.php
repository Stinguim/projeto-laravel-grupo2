@extends("layouts.main")
@section('title', 'Alojamentos - Criar')

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        <form class="default-form" action="/accommodations/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="input-container">
                    <label for="name">Nome do alojamento</label>
                    <input type="text" id="name" name="name" placeholder="Nome">
                </div>
            </div>

            <div class="container">
                <div class="input-container">
                    <label for="description">Descrição do alojamento</label>
                    <input type="text" id="description" name="description" placeholder="Descrição">
                </div>
            </div>

            <div class="container">
                <div class="input-container">
                    <label for="address">Endereço</label>
                    <input type="text" id="address" name="address" placeholder="Endereço">
                </div>
            </div>
            <button type="Submit" class="default-button">Adicionar</button>
        </form>
    </div>
@endsection
