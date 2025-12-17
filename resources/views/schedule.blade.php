
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
                <h2>Cleaning To Do</h2>
                <div class="sch-container">
                    <div class="cleanings-container">
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Accommodation</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Team</th>
                            </tr>
                            @foreach($cleanings as $cleaning)
                                <tr>
                                    <td>{{$cleaning->date}}</td>
                                    <td>{{$cleaning->lodging_name}}</td>
                                    <td>{{$cleaning->address}}</td>
                                    <td>{{$cleaning->state}}</td>
                                    <td>{{$cleaning->team_id}}</td>
                                    <td><a href="/schedule/{{$cleaning->lodging_id}}">View</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    @endsection
</body>
</html>
