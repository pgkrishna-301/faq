@section('content')
<div class="login-container">
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

        <!-- Register button with small size and centered -->
        <div class="register-container">
            <a href="{{ route('admin.register.form') }}" class="btn btn-secondary btn-register">Register</a>
        </div>
    </form>
</div>


<!-- CSS for background image and animation -->
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('/images/bg%20(1).jpg');  /* Replace with your image path */
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        animation: moveBackground 20s infinite ease-in-out;
    }

    @keyframes moveBackground {
        0% { background-position: 0% 0%; }
        50% { background-position: 100% 100%; }
        100% { background-position: 0% 0%; }
    }

    .login-container {
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        padding: 40px;
        border-radius: 10px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    h1 {
        text-align: center;
        color: white;
        font-size: 32px;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .alert.alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007BFF;
        color: white;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    .register-container {
        margin-top: 15px;
        text-align: center; /* Centers the text (and the <a> link) */
    }

    .btn-register {
        font-size: 14px;
        padding: 5px 10px;
        background-color: transparent;
        color: white;
        border: none;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s ease-in-out;
    }

    .btn-register:hover {
        color: #007BFF;
    }

    .btn-register:focus, .btn-register:active {
        outline: none;
    }

</style>

