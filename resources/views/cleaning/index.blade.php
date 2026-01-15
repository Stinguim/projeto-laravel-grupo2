@extends("layouts.main")
@section('title', 'Cleaning')

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        <div>
            <div class="acc-container">
                <p class="bold">Accommodation</p>
                <p class="bold">Address</p>
                <p class="bold">Date</p>
            </div>
            @if(sizeof($cleanings) > 0)
                <div class="a-container">
                    @foreach($cleanings as $cleaning)
                        <a class="acc-container clickable-element" href="/cleaning/{{$cleaning['id']}}">
                            <p>{{$cleaning['name']}}</p>
                            <p>{{$cleaning['address']}}</p>
                            <p>{{$cleaning['date']}}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <h2>No cleanings found</h2>
            @endif
        </div>
    </div>
@endsection
