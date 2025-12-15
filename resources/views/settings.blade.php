@extends("layouts.main")
@section("title", "Settings")
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/settings.css">
</head>
<body>
    @section("content")
        <div class="p-container">
            <div class="details-container">
                <div class="user-n-s user-details">
                    <p><strong>Name: </strong>{{Auth::user()->name}}</p>
                    <div class="user-surname">
                        <p><strong>Surname: </strong>{{Auth::user()->surname}}</p>
                    </div>
                </div>
                <div class="user-e-p user-details">
                    <p><strong>Email: </strong>{{Auth::user()->email}}</p>
                </div>
                <div class="user-type user-details">
                    <p><strong>User Type: </strong>{{Auth::user()->user_type}}</p>
                </div>
                @if(Auth::user()->user_type == 'supervisor' || Auth::user()->user_type =='employ '))
                    <h4><strong>Company ID:</strong> {{Auth::user()->company_id}}</h4>
                @endif

                <form action="{{route("settings.destroy", $id=Auth::user()->id_user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Account</button>
                </form>
            </div>
        </div>
    @endsection
</body>
</html>

