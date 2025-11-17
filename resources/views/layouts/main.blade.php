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
                <a><img src="" alt="app_logo"> Gestao Limpezas</a>
            </div>
            <nav class="nav_bar">
                <a>Dashboard</a>
                <a>Gestao</a>
                <a>Limpezas</a>
                <a>Calendario</a>
                <a>Login</a>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="footer_container">

        </div>
    </footer>
</body>
</html>
