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
            <h2>Login</h2>
            <form action="/" method="POST">
                @csrf
                <div class="user-input">
                    <label for="first">Email:</label>
                    <input type="text" id="first" name="email" placeholder="yourmail@gmail.com" required>
                </div>
                <div class="user-input">
                    <label for="first">Password:</label>
                    <input type="text" id="first" name="password" placeholder="YourPassword" required>
                </div>
                    <button type="submit">Entrar</button>
                <div class="user-input">
                    <p style="margin: 0">Dont have an account?</p>
                    <div class="reg_container">
                        <a class="reg_btn" href="/register">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
