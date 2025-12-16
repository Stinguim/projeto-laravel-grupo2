<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Account Register</title>
        <link rel="stylesheet" href="/styles/register.css">
    </head>
    <body>
        <div class="bg-container">
            <div class="form-container">
                <h2>Register</h2>
                <form action="/register" method="POST" id="register">
                    @csrf
                    <div class="username-inputs">
                        <div class="ep-input user-input">
                            <label for="first">Username:</label>
                            <input type="text" id="first" name="name" placeholder="Username" required>
                        </div>
                        <div class="ep-input user-input">
                            <label for="first">Surname:</label>
                            <input type="text" id="surname" name="surname" placeholder="UserSurname" required>
                        </div>
                    </div>
                    <div class="username-inputs">
                        <div class="ep-input user-input">
                            <label for="first">Email:</label>
                            <input type="text" id="email" name="email" placeholder="yourmail@gmail.com" required>
                        </div>
                        <div class="ep-input user-input">
                            <label for="first">Password:</label>
                            <input type="password" id="password" name="password" placeholder="YourPassword" required>
                        </div>
                    </div>
                    <div class="username-inputs">
                        <div class="user-input">
                            <label for="first">User Type</label>
                            <select class="sel-container" id="user_type" name="user_type" form="register">
                                <option value="client">client</option>
                                <option value="employ">employ</option>
                                <option value="supervisor">supervisor</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Create Account</button>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </body>
</html>
