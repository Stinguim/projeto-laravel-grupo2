@extends("layouts.main")
@section('title', 'Pagina Inicial')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/styles/homepage.css">
        <title></title>
    </head>
    <body>
        @section('content')
            <div class="b-container">
                <div class="dashboard-container">
                    <div class="current-mrr">
                        <p>Current MRR</p>
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>
