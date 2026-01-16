@extends("layouts.main")
@section('title', 'Cleaning')

<link rel="stylesheet" href="/styles/cleaning.css">

@section('content')
    <div class="a-container">

        <h2 class="page-title">Cleanings Teams</h2>

        <div class="cleaning-list">

            {{-- Header row --}}
            <div class="cleaning-row header">
                <span>Accommodation</span>
                <span>Address</span>
                <span>Date</span>
            </div>

            @forelse($cleanings as $cleaning)
                <a href="/cleaning/{{ $cleaning['id'] }}" class="cleaning-row clickable">
                    <span>{{ $cleaning['name'] }}</span>
                    <span>{{ $cleaning['address'] }}</span>
                    <span>{{ $cleaning['date'] }}</span>
                </a>
            @empty
                <div class="cleaning-row empty">
                    <span>No cleanings found</span>
                </div>
            @endforelse

        </div>

    </div>
@endsection
