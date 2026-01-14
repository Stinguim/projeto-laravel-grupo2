@extends("layouts.main")
@section('title', 'AllUsers')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="/styles/users.css">
    </head>
    <body>
        @section('content')
            <div class="b-container">
                <form action="{{ route('users.index') }}" method="GET">
                    <input class="sb-input" type="text" name="search" placeholder="Pesquisar por nome,sobrenome ou email">
                    <button class="sb-btn" type="submit">Search</button>
                </form>
                <h2>Todos os Utilizadores:</h2>
                <div class="users-grid">
                    @forelse($users as $user)
                        <div class="user-card">
                            <div class="avatar">👤</div>

                            <h3>{{ucfirst($user->name)}} {{ucfirst($user->surname)}}</h3>
                            <p class="email">{{$user->email}}</p>

                            <span class="role {{$user->user_type}}">{{ucfirst($user->user_type)}}</span>

                            <div class="actions">
                                <a href="users/{{$user->id_user}}/edit" class="edit"><button>✏️ Edit</button></a>
{{--                                <button class="delete">🗑 Delete</button>--}}
                            </div>
                        </div>
                    @empty
                        <p>Nenhum utilizador encontrado.</p>
                    @endforelse
                </div>
            </div>
        @endsection
    </body>
</html>
