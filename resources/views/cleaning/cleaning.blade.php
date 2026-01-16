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
                    <p><strong>Request Date:</strong> {{ $cleaningRequest->data_request }}</p>
                </div>

                <h2>Create Cleaning Team</h2>

                <form method="POST" action="/cleaning/{{$cleaningRequest->id_cleaning_request}}">
                    @csrf
                    <!-- HIDDEN CLEANING REQUEST ID -->
                    <input type="hidden" name="cleaning_request_id" value="{{ $cleaningRequest->id_cleaning_request }}">

                    <!-- HIDDEN COMPANY ID -->
                    <input type="hidden" name="company_id" value="{{ $cleaningRequest->company_id }}">

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
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id_user }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="remove-member">Remove</button>
                            </div>
                        </div>

                        <button type="button" class="btn-add" onclick="addMember()">+ Add member</button>
                    </div>

                    <button type="submit" class="btn-submit">Create Cleaning</button>
                </form>

                <!-- DELETE (form separado) -->
                <h2>Warning</h2>
                <form
                    method="POST"
                    action="/cleaning/{{$cleaningRequest->id_cleaning_request}}" onsubmit="return confirm('Are you sure you want to delete this cleaning?')" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="date" value="{{ $cleaningRequest->data_request }}">
                    <button type="submit" class="btn-delete">Delete Cleaning Request</button>
                </form>

            </div>


        </div>
    @endsection
    <script>
        function addMember() {
            const container = document.getElementById('team-container');

            // Clone the first row
            const row = container.firstElementChild.cloneNode(true);

            // Reset the select value
            row.querySelector('select').selectedIndex = 0;

            // Append the cloned row
            container.appendChild(row);
        }

        // Remove member functionality using event delegation
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('team-container');

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-member')) {
                    const row = e.target.closest('.team-row');

                    // Ensure at least one row remains
                    if (container.querySelectorAll('.team-row').length > 1) {
                        row.remove();
                    } else {
                        alert("At least one member is required");
                    }
                }
            });
        });
    </script>
</body>
</html>
