@extends("layouts.main")
@section('title', 'Accommodations')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/accommodation.css">
</head>
<body>
    @section('content')
        <div class="a-container">
            <div class="table-header">
                <form class="search-bar table-header-85-percent" action="/accommodations" method="GET">
                    <input class="search-input" type="text" id="search"
                           name="search" placeholder="Procurar...">
                </form>
                <a href="/accommodations/create" class="default-button table-header-15-percent">
                    Adicionar alojamento
                </a>
            </div>
            <div>
                <div class="acc-container">

                </div>
            </div>
        </div>
    @endsection
</body>
</html>
