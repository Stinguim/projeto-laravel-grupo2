<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="bg-container">
        <div class="sub-nav-container">
            <h1>Cleaner App</h1>
            <nav class="sn-container">
                @guest
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                @endguest
                <a href="/dashboard">DashBoard</a>
                <a href="#">Utilizadores</a>
                <a href="#">Accommodations</a>
                <a href="#">Schedule</a>
            </nav>
            <nav class="bottom-nav sn-container">
                @auth
                    <a href="/settings">Settings</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                @endauth
            </nav>
        </div>
    </div>
    <div class="main-nb">
        <div class="header-container">
            <div class="left-side">
                <h2 id="title_h2">DashBoard</h2>
{{--                <script src="../../js/dynamic_tags.js">dynamic_h2()</script>--}}
            </div>
            <div class="right-side">
                <img src="/images/user.png" alt="UserPfp">
                @auth
                    <span>{{Auth::user()->name}}</span>
                @endauth
                @guest
                    <span>Username</span>
                @endguest
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>
