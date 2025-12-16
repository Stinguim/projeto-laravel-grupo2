@extends('layouts.main')
@section('title','Schedule')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/schedule.css">
</head>
<body>
    @section('content')
            <div class="s-container">
                <div class="sch-container">
                    <p>Valdenia</p>
                    @foreach($cleanings as $cleaning)
                        <p>{{$cleaning}}</p>
                    @endforeach
                </div>
            </div>
    @endsection
</body>
</html>
