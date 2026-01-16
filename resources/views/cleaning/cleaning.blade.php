@extends("layouts.main")
@section('title', 'Cleaning')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/cleaning.css">
</head>
<body>
    @section('content')
        <div class="a-container">
            <div class="page-container">

                <h2>Cleaning Request</h2>

                <!-- Cleaning Request Info -->
                <div class="info-box">
                    <p><strong>ID:</strong> {{$cleaningRequest->id_cleaning_request }}</p>
                    <p><strong>Description:</strong> {{ $cleaningRequest->descricao }}</p>
                    <p><strong>Lodging ID:</strong> {{ $cleaningRequest->lodging_id }}</p>
                    <p><strong>Company ID:</strong> {{ $cleaningRequest->company_id }}</p>
                </div>

                <h3>Create Cleaning Team</h3>

                <form method="POST"
                      action="/cleaning/{{$cleaningRequest->id_cleaning_request}}"
                >
                    @csrf
                    @method("POST")
                    <!-- Hidden cleaning request -->
                    <input type="hidden" name="cleaning_request_id" value="{{ $cleaningRequest->id_cleaning_request }}">

                    <!-- Date -->
                    <div class="form-group">
                        <label>Cleaning Date</label>
                        <input type="date" name="date" required>
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <label>Cleaning State</label>
                        <select name="estado" required>
                            <option value="{{config("constants.cleanStates")[3]}}">{{config("constants.cleanStates")[3]}}</option>
                            <option value="{{config("constants.cleanStates")[0]}}">{{config("constants.cleanStates")[0]}}</option>
                            <option value="{{config("constants.cleanStates")[1]}}">{{config("constants.cleanStates")[1]}}</option>
                            <option value="{{config("constants.cleanStates")[2]}}">{{config("constants.cleanStates")[2]}}</option>
                        </select>
                    </div>

                    <!-- Team Members -->
                    <div class="form-group">
                        <label>Team Members</label>

                        <div id="team-container">
                            <div class="team-row">
                                <select name="team[]">
{{--                                    @foreach($employees as $employee)--}}
{{--                                        <option value="{{ $employee->id }}">--}}
{{--                                            {{ $employee->name }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn-add" onclick="addMember()">+ Add member</button>
                    </div>

                    <button type="submit" class="btn-submit">Create Cleaning</button>
                </form>

            </div>


        </div>
    @endsection
    <script>
        function addMember() {
            const container = document.getElementById('team-container');
            const row = container.firstElementChild.cloneNode(true);
            container.appendChild(row);
        }
    </script>
</body>
</html>
