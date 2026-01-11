@extends("layouts.main")
@section("title", "Settings")
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/styles/settings.css">
</head>
<body>
    @section("content")
        <div class="p-container">
            <div class="profile-page">
                <h1>Profile Settings</h1>
                <p class="subtitle">Manage your personal information and security</p>

                <div class="card">
                    <h2>👤 Profile Information</h2>
{{--                    transform this as a form to edit the profile--}}
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="marcio">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" value="lima">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="marciolima@gmail.com" disabled>
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <span class="role admin">{{$user->user_type}}</span>
                    </div>

                    <button class="btn-primary">Save Changes</button>
                </div>

                <div class="card">
                    <h2>🔐 Security</h2>
                    <button class="btn-secondary">Change Password</button>
                </div>

                <div class="card danger">
                    <h2>⚠️ Danger Zone</h2>
                    <p>This action is permanent and cannot be undone.</p>
                    <form action="{{route("settings.destroy", $id=$user->id_user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger" type="submit">Delete Account</button>
                    </form>
                </div>
            </div>
{{--            <div class="details-container">--}}
{{--                <div class="user-n-s user-details">--}}
{{--                    <p><strong>Name: </strong>{{Auth::user()->name}}</p>--}}
{{--                    <div class="user-surname">--}}
{{--                        <p><strong>Surname: </strong>{{Auth::user()->surname}}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="user-e-p user-details">--}}
{{--                    <p><strong>Email: </strong>{{Auth::user()->email}}</p>--}}
{{--                </div>--}}
{{--                <div class="user-type user-details">--}}
{{--                    <p><strong>User Type: </strong>{{Auth::user()->user_type}}</p>--}}
{{--                </div>--}}
{{--                @if(Auth::user()->user_type == 'supervisor' || Auth::user()->user_type =='employ '))--}}
{{--                    <h4><strong>Company ID:</strong> {{Auth::user()->company_id}}</h4>--}}
{{--                @endif--}}


{{--            </div>--}}
        </div>
    @endsection
</body>
</html>

