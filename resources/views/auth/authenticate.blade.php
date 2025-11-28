<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/styles/auth_style.css">
</head>
<body>
{{--    fazer como esta no register--}}
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
                        <a class="reg_btn" href="/create_account">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
