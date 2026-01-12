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
{{--                        <div class="stat-card">--}}
{{--                            <h3>📅 Schedules</h3>--}}
{{--                            <p class="stat-number">12 Today</p>--}}
{{--                        </div>--}}
                        @if(!is_null($cleaningRequests))
                            <div class="stat-card">
                                <h3>🧹 Requests</h3>
                                <p class="stat-number">{{$cleaningRequests}} Pending</p>
                            </div>
                        @endif
                    </div>

                    <div class="dashboard-grid">
{{--                        <div class="card">--}}
{{--                            <h2>📈 Recent Activity</h2>--}}
{{--                            <ul>--}}
{{--                                <li>João created an account</li>--}}
{{--                                <li>Maria booked a schedule</li>--}}
{{--                                <li>Cleaning completed</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

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
                </div>

                {{--                <div class="dash-containers">--}}
{{--                    <div class="dash-stat">--}}
{{--                        <p>Cleaned</p>--}}
{{--                        <h2>Number Cleaned</h2>--}}
{{--                    </div>--}}
{{--                    <div class="dash-stat">--}}
{{--                        <p>Filthy</p>--}}
{{--                        <h2>Number Filthy</h2>--}}
{{--                    </div>--}}
{{--                    <div class="dash-stat">--}}
{{--                        <p>Current Accommodations</p>--}}
{{--                        <h2>Number Accommodations</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="dash-containers">--}}
{{--                    <div class="graph-container">--}}
{{--                        <p>graphs</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        @endsection
    </body>
</html>
