{{--<?php--}}
{{--    $users = \App\Models\User::select('*')->get()   --}}
{{--?>--}}
{{--                @foreach($users as $user)--}}
{{--                    <p>{{$user->name}}</p>--}}
{{--                @endforeach--}}
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
            @if(Auth::user()->user_type == 'admin')
                <a href="/users">Users</a>
            @endif
                <a href="/accommodations">Accommodations</a>
                <a href="/schedule">Schedule</a>
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
                <h2 id="title_h2">@yield('title')</h2>
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
