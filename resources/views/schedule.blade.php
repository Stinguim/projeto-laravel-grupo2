
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
            @else
                <h2>Scheduled Cleanings</h2>
            @endif

            <div class="sch-container">
                <div class="cleanings-container">
                    @forelse($cleanings as $cleaning)
                        <div class="cleaning-card">
                            <h3>{{ $cleaning->lodging_name }}</h3>
                            <p><strong>Company:</strong> {{ $cleaning->company_name }}</p>
                            <p><strong>Date:</strong> {{ $cleaning->date }}</p>
                            <p><strong>Address:</strong> {{ $cleaning->address }}</p>
                            <p><strong>Description:</strong> {{ $cleaning->description }}</p>
                            <p><strong>State:</strong> {{ $cleaning->state }}</p>

                            @if($cleaning->state != config('constants.cleanStates')[2])
                                <form action="/schedule/{{ $cleaning->request_id }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="estado" value="{{ config('constants.cleanStates')[2] }}">

                                    <button type="submit" class="btn-complete">Mark as Cleaned </button>
                                </form>
                                <form action="{{ route('schedule.destroy', $cleaning->request_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="date" value="{{ $cleaning->date }}">
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            @else
                                <span class="completed-label">Completed</span>
                            @endif
                        </div>
                    @empty
                        <p>No scheduled cleanings at the moment.</p>
                    @endforelse

                </div>
            </div>
        </div>
    @endsection
</body>
</html>
