@extends('layouts.main')
@section('title','Lodging')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/lodging.css">
</head>
<body>
    @section('content')
        <div class="l-container">
            <div class="log-arg">
                <h2>Lodging: {{$lodging->name}} - Id: {{$lodging->id_lodging}}</h2>
                <p>Address - {{$lodging->address}}</p>
                <p>Description: {{$lodging->description}}</p>
            </div>
            <div class="cleaning-r">
                <h2>Cleaning Request: {{$lodging->cleaning_request_id}}</h2>
                <p>Date: {{$lodging->date}}</p>
                <p>State: {{$lodging->state}}</p>
                <p>Description: {{$lodging->descricao}}</p>
                <p>Team Id: {{$lodging->team_id}}</p>
            </div>
        </div>
    @endsection
</body>
</html>
