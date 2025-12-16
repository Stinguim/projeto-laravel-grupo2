@extends("layouts.main")
@section('title', 'AllUsers')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="/styles/dashboard.css">
    </head>
    <body>
        @section('content')
            <div class="b-container">
                <form action="{{ route('users.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Pesquisar por nome,sobrenome ou email">
                    <button type="submit">Pesquisar</button>
                </form>
                <p>Todos os Utilizadores:</p>
                <ul>
                    @forelse ($users as $user)
                        <li>Nome: {{ $user->name }} | Email: {{ $user->email }}<a href="users/{{$user->id_user}}/edit"> Editar</a></li>
                    @empty
                        <li>Nenhum utilizador encontrado.</li>
                    @endforelse
                </ul>
            </div>
        @endsection
    </body>
</html>
