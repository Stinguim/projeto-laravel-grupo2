@extends("layouts.main")
@section('title', 'DashBoard')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="/styles/dashboard.css">
    </head>
    <body>
        @section('content')
            <div class="b-container">
                <div class="dashboard-container">
                    <p>dashboard</p>
                </div>
            </div>
        @endsection
    </body>
</html>
