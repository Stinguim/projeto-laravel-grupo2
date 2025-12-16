
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
                    <p>Cleaning To Do</p>
                    <div class="cleanings-container">
                        @foreach($cleanings as $cleaning)
                            <p>{{$cleaning}}</p>
                            <p>{{$cleaning->cleaning_request_id}} |{{$cleaning->date}} - {{$cleaning->estado}}| Team: {{$cleaning->cleaning_team_id}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
    @endsection
</body>
</html>
