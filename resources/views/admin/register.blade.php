
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet"> 
   
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h1>Register</h1>
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" required placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <br>
                <div class="login-container">
                    <a href="{{ route('admin.login.form') }}" class="btn-login">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
