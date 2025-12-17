
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
                @if(Auth::user()->user_type != 'supervisor')
                    <h2>Cleaning To Do</h2>
                @endif
                @if(Auth::user()->user_type == 'supervisor')
                    <h2>Cleaning Requests</h2>
                @endif
                <div class="sch-container">
                    <div class="cleanings-container">
                        @if(Auth::user()->user_type != 'supervisor')
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
                        @endif
                        @if(Auth::user()->user_type == 'supervisor')
                            <table>
                                <tr>
                                    <th>Date</th>
                                    <th>Request Id</th>
                                    <th>Lodging Id</th>
                                    <th>Description</th>
                                    <th>State</th>
                                    <th>Team</th>
                                    <th colspan="2">Request</th>
                                </tr>
                                @foreach($cleanings as $cleaning)
                                    <tr>
                                        <td>{{$cleaning->date}}</td>
                                        <td>{{$cleaning->request_id}}</td>
                                        <td>{{$cleaning->lodging_id}}</td>
                                        <td>{{$cleaning->descricao}}</td>
                                        <td>{{$cleaning->state}}</td>
                                        <td>{{$cleaning->team_id}}</td>
                                        <td><a href="/schedule/cleaning/accept/{{$cleaning->request_id}}">Accept</a></td>
                                        <td><a href="/shcedule/cleaning/reject/{{$cleaning->request_id}}">Reject</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
    @endsection
</body>
</html>
