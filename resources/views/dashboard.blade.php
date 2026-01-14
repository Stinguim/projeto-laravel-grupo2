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
                <div class="dashboard">
                    <h1>Dashboard</h1>
                    <div class="stats-grid">
                        @if(!is_null($users))
                            <div class="stat-card">
                                <h3>👥 Users</h3>
                                <p class="stat-number">{{$users}}</p>
                            </div>
                        @endif
                        @if(!(is_null($accommodations) and is_null($cleanCanceled) and is_null($cleanDoing) and
                            is_null($cleanDone) and is_null($cleanToDo)))
                            <div class="stat-card">
                                <h3>🏠 Accommodations</h3>
                                @if(!is_null($accommodations))
                                    <p class="stat-number">{{$accommodations}} Accommodations</p>
                                @endif
                                @if(!is_null($cleanCanceled))
                                    <p class="stat-number">{{$cleanCanceled}} Cleaning requests canceled</p>
                                @endif
                                @if(!is_null($cleanDoing))
                                    <p class="stat-number">{{$cleanDoing}}  Cleaning being done</p>
                                @endif
                                @if(!is_null($cleanDone))
                                    <p class="stat-number">{{$cleanDone}} Cleaning done</p>
                                @endif
                                @if(!is_null($cleanToDo))
                                    <p class="stat-number">{{$cleanToDo}} Cleaning to be done</p>
                                @endif
                            </div>
                        @endif
{{--                        Employee--}}
                        @if(Auth::user()->user_type == config("constants.roles")[3])
                                <div class="stat-card">
                                    <h3>🧹 Limpezas</h3>
                                    @if(!is_null($cleaningRequests))
                                        <p class="stat-number">{{$cleaningRequests}} Pending</p>
                                    @else
                                        <p class="stat-number">12314 Pending</p>
                                    @endif
                                </div>
                        @endif

                    </div>
{{--                    Admin--}}
                    @if(Auth::user()->user_type == config("constants.roles")[0])
                        <div class="dashboard-grid">
                            <div class="card">
                                <h2>🧑‍💼 Users by Role</h2>
                                <ul class="roles-list">
                                    <li><span class="role admin">Admin</span> 3</li>
                                    <li><span class="role supervisor">Supervisor</span> 5</li>
                                    <li><span class="role employ">Employ</span> 12</li>
                                    <li><span class="role user">Client</span> 104</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endsection
    </body>
</html>
