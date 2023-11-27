<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- You can add your styles or link to a CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        .error-input {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<div>
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="username">Username:</label>
        <input type="text" id="username" name="username"{{ $errors->has('username') ? '' : old('username') }}"{{ $errors->has('username') ? ' autofocus' : '' }}>

        @error('username')
        <span class="error-message">{{ $message }}</span>
        @enderror

        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        @error('password')
        <span class="error-message">{{ $message }}</span>
        @enderror

        <br>

        <button type="submit">Login</button>
    </form>
    @if(session('error') && ! $errors->has('username'))
        <!-- Show a specific error message only if it's not related to the username field -->
        <div class="alert alert-danger">
            <p style="color: red;">Username or password incorrect</p>
        </div>
    @endif
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
</div>
</body>
</html>
