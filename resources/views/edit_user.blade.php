@extends("layouts.main")
@section('title', 'AllUsers')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/styles/users_edit.css">
        <title></title>
    </head>
    <body>
        @section('content')
            <div class="b-container">
                <div class="edit-user-page">
                    <h1>Edit User</h1>
                    <p class="subtitle">Update user account information</p>
                    <div class="card">
                        <h2>👤 User Information</h2>
                        <form action="/users/{{$user->id_user}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="surname" value="{{$user->surname}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label>User Type</label>
                                <select name="user_type">
                                    <option value="client">User</option>
                                    <option value="employ">Employ</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="actions">
                                <input class="btn-primary" type="submit" value="Save Changes">
                                <a href="/users"><button class="btn-secondary" type="button">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
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
