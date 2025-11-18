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
                <p style="margin: 0">Login Page</p>
                <form>
                    @csrf
                    <div>
                        <label>Email</label>
                        <input value="email">
                    </div>
                    <div>
                        <label>Password</label>
                        <input value="password">
                    </div>
                    <input type="submit" value="Submit">
                    <a href="#registar">registar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
