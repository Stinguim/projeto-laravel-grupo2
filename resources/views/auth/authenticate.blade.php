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
                <form>
                    @csrf
                    <div class="ep_container">
                        <label>Email</label>
                        <input value="email">
                    </div>
                    <div class="ep_container">
                        <label>Password</label>
                        <input value="password">
                    </div>
                    <input type="submit" value="Submit">
                    <div class="ac_reg_container">
                        <p>Dont have an account?</p>
                        <a href="#registar">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
