@extends("layouts.main")
@section('title', 'Cleaning Requests')

<link rel="stylesheet" href="/styles/accommodation.css">

@section('content')
    <div class="a-container">
        @if(!is_null($cleaningRequests))
            <div>
                <div class="acc-container">
                    <p class="bold">Client</p>
                    <p class="bold">Accommodation</p>
                    <p class="bold">Address</p>
                    <p class="bold">Description</p>
                    <p class="bold">Date</p>
                </div>
                <div class="a-container">
                    @foreach($cleaningRequests as $request)
                        <div class="acc-container">
                            <p>{{$request['client']}}</p>
                            <p>{{$request['accommodation']}}</p>
                            <p>{{$request['address']}}</p>
                            <p>{{$request['description']}}</p>
                            <p>{{$request['date']}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
