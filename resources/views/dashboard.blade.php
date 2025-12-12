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
                <div class="dash-containers">
                    <div class="dash-stat">
                        <p>Cleaned</p>
                        <h2>Number Cleaned</h2>
                    </div>
                    <div class="dash-stat">
                        <p>Filthy</p>
                        <h2>Number Filthy</h2>
                    </div>
                    <div class="dash-stat">
                        <p>Current Accommodations</p>
                        <h2>Number Accommodations</h2>
                    </div>
                </div>
                <div class="dash-containers">

                </div>
                <div class="dash-containers">

                </div>
            </div>
        @endsection
    </body>
</html>
