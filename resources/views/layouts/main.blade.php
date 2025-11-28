<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div class="header_container">
            <div class="w_page_container">
                <a href="/homepage"><img src="/images/uac_logo.png" alt="app_logo"> Gestao Limpezas</a>
            </div>
            <nav class="nav_bar">
{{--            if the account is loged in show the profile icon and the username
                eg: img - username  --}}
                <a href="/create_account">Register</a>
                <a href="#dashboard">Dashboard</a>
                <a href="#calender">Calender</a>
                <a href="#cleanings">Cleanings</a>
                <a href="#manager">Manager</a>
            </nav>
            <div class="settings_container">
                <a href="#settings">Settings</a>
                <a class="logout_btn" href="#logout"><img src="/images/worker.png"></a>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="footer_container">

        </div>
    </footer>
</body>
</html>
