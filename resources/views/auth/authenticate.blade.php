<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/styles/auth_style.css">
</head>
<body>
    <div class="bg-container">
        <div class="form-container">
            <img class="image" src="/images/logo_app.png">
            <h2 class="login">Login</h2>
            <p class="small-text grey">Please enter your details</p>
            <form action="/login" method="POST">
                @csrf
                <div class="user-input">
                    <label for="first">Email:</label>
                    <input type="text" id="first" name="email" placeholder="yourmail@gmail.com" required>
                </div>
                <div class="user-input">
                    <label for="first">Password:</label>
                    <input type="password" id="first" name="password" placeholder="YourPassword" required>
                </div>
                <button class="button-special">
                    <div>
                        <span>
                          <p>Sign In</p>
                        </span>
                    </div>
                    <div>
                        <span>
                          <p>Let's Clean!</p>
                        </span>
                    </div>
                </button>
                <div class="small-text">
                    <p>Forgot your Password?</p><a class="small-text destaque" href="/login"> Reset Password</a>
                </div>
                <div class="small-text">
                    <p>Don't have an account?</p><a class="small-text destaque" href="/register"> Sign up!</a>
                </div>
                <p class="small-text grey smaller">Click 'Sign in' to agree to the Cleanio Terms of Service and acknowledge that the Cleanio Privacy Policy applies to you.</p>
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
