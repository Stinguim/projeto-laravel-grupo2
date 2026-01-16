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
                    <p class="bold">Action</p>
                </div>
                <div class="a-container">
                    @foreach($cleaningRequests as $request)
                        <div class="acc-container">
                            <p>{{$request['client']}}</p>
                            <p>{{$request['accommodation']}}</p>
                            <p>{{$request['address']}}</p>
                            <p>{{$request['description']}}</p>
                            <p>{{$request['date']}}</p>
                            <div class="actions">
                                @if($request['state'] == config('constants.cleaningRequestsStates')[0])
                                    <form method="POST" action="{{ route('cleaningRequests.accept', $request['id']) }}">
                                        @csrf
                                        <button class="default-button --button-green">Accept</button>
                                    </form>

                                    <form method="POST" action="{{ route('cleaningRequests.reject', $request['id']) }}">
                                        @csrf
                                        <button class="default-button --button-red">Reject</button>
                                    </form>
                                @else
                                    <p class="state">{{ $request['state'] }} {{$request['state'] === \App\Models\CleaningRequest::STATE_APPROVED ? '✔' : '✘' }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
