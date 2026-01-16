<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/styles/main.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="bg-container">
        <div class="sub-nav-container">
            <div class="m-left-side">
                <img src="/images/logo_app.png">
                <h3>Cleanio</h3>
            </div>
            <div class="m-center-side">
                <nav class="sn-container m-center-side">
                    @guest
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endguest
                    @if(Auth::user()->user_type != config("constants.roles")[1])
                            <a href="/dashboard">DashBoard</a>
                    @endif
                    @if(Auth::user()->user_type == config("constants.roles")[0])
                        <a href="/users">Users</a>
                    @endif
                        <a href="/accommodations">Accommodations</a>
                    @if(Auth::user()->user_type != config("constants.roles")[1])
                        <a href="/schedule">Schedule</a>
                    @endif
                    @if(Auth::user()->user_type == config("constants.roles")[2])
                        <a href="/cleaning-requests">Cleaning Requests</a>
                            <a href="/cleaning">Cleaning</a>
                    @endif
                </nav>
            </div>
            <div class="m-right-side">
                <nav class="bottom-nav sn-container">
                    @auth
                        <h3>{{ucfirst(Auth::user()->name)}}</h3>
                        <a class="anchor-settings" href="/settings"><i class="material-icons">&#xe8b8;</i></a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn-logout"><i class="material-icons">&#xe879;</i></button>
                        </form>
                    @endauth
                </nav>
            </div>
        </div>

    </div>
    @yield('content')
</body>
</html>
