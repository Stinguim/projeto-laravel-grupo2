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
                <a href="/dashboard">DashBoard</a>
                <a href="#">Anchor 2</a>
                <a href="#">Anchor 3</a>
                <a href="#">Anchor 4</a>
            </nav>
            <nav class="bottom-nav sn-container">
                <a href="/settings">Settings</a>
                <a href="#logout">Log out</a>
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
{{--                @if($username)--}}
{{--                    <p>{{$username}}</p>--}}
{{--                @endif--}}
                <p>Username</p>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>
