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
                <a href="#">Anchor 1</a>
                <a href="#">Anchor 2</a>
                <a href="#">Anchor 3</a>
                <a href="#">Anchor 4</a>
            </nav>
        </div>
    </div>
    <div class="main-nb">
        <div class="nav-bar-container">

        </div>
        @yield('content')
    </div>
</body>
</html>
