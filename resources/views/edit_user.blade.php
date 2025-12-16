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
                <p>Utilizador:</p>
                <form action="/users/{{$user->id_user}}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    Name: <input type="text" name="name" value="{{$user->name}}"><br>
                    Surname: <input type="text" name="surname" value="{{$user->surname}}"><br>
                    Email: <input type="text" name="email" value="{{$user->email}}"><br>
                    <input type="submit">
                </form>
            </div>
        @endsection
    </body>
</html>
