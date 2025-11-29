<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/styles/auth_style.css">
</head>
<body>
    <div class="page_container">
        <div class="login_container">
            <div class="f_container">
                <h2>Login</h2>
                <form action="/homepage" method="POST">
                    @csrf
                    <div class="ep_container">
                        <label>Email</label>
                        <input placeholder="email@gmail.com" id="email_log" name="email_log">
                    </div>
                    <div class="ep_container">
                        <label>Password</label>
                        <input placeholder="password" id="pass_log" name="pass_log">
                    </div>
                    <div class="ep_container">
                        <input class="log_btn" href="/homepage" type="submit" value="Submit">
                    </div>
                    <div class="ac_reg_container ep_container">
                        <p style="margin: 0">Dont have an account?</p>
                        <a class="reg_btn" href="/register">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-container">
        <div class="form-container">
            <h2>Login</h2>
            <form action="" method="GET">
                <div class="user-input">
                    <label for="first">Email:</label>
                    <input type="text" id="first" name="email" placeholder="yourmail@gmail.com" required>
                </div>
                <div class="user-input">
                    <label for="first">Password:</label>
                    <input type="text" id="first" name="password" placeholder="YourPassword" required>
                </div>
                <a type="submit">Register</a>
            </form>
        </div>
    </div>
</body>
</html>
