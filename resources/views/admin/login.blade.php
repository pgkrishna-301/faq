
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"> 
 
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <input type="email" name="email" class="form-control" required placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-login">Login</button>

                <div class="register-container">
                    <a href="{{ route('admin.register.form') }}" class="btn btn-secondary btn-register">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

