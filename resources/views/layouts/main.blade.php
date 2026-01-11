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
                <h3>Sparkle Home</h3>
            </div>
            <div class="m-center-side">
                <nav class="sn-container m-center-side">
                    @guest
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endguest
                    <a href="/dashboard">DashBoard</a>
                @if(Auth::user()->user_type == 'admin')
                    <a href="/users">Users</a>
                @endif
                    <a href="/accommodations">Accommodations</a>
                @if(Auth::user()->user_type != 'client')
                    <a href="/schedule">Schedule</a>
                @endif
                </nav>
            </div>
            <div class="m-right-side">
                <nav class="bottom-nav sn-container">
                    @auth
                        <h3>{{Auth::user()->name}}</h3>
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
{{--    <div class="main-nb">--}}
{{--        <div class="header-container">--}}
{{--            <div class="left-side">--}}
{{--                <h2 id="title_h2">@yield('title')</h2>--}}
{{--            </div>--}}
{{--            <div class="right-side">--}}
{{--                <img src="/images/user.png" alt="UserPfp">--}}
{{--                @auth--}}
{{--                    <span>{{Auth::user()->name}}</span>--}}
{{--                @endauth--}}
{{--                @guest--}}
{{--                    <span>Username</span>--}}
{{--                @endguest--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
</body>
</html>
