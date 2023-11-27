<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
<form id="registrationForm" method="post" action="{{ route('user/register')}}">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="{{ $errors->has('username') ? '' : old('username') }}" {{ $errors->has('username') ? ' autofocus' : '' }} class="@error('username') error-input @enderror">
    @error('username')
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="fullName">Full Name:</label>
    <input type="text" id="fullName" name="fullName" value="{{ $errors->has('fullName') ? '' : old('fullName') }}" {{ $errors->has('fullName') ? ' autofocus' : '' }} class="@error('fullName') error-input @enderror">
    @error('fullName')
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="email">E-Mail:</label>
    <input type="email" id="email" name="email" value="{{ $errors->has('email') ? '' : old('email') }}" {{ $errors->has('email') ? ' autofocus' : '' }} class="@error('email') error-input @enderror">
    @error('email')
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="phoneNumber">Phone Number:</label>
    <input type="tel" id="phoneNumber" name="phoneNumber" value="{{ $errors->has('phoneNumber') ? '' : old('phoneNumber') }}" {{ $errors->has('phoneNumber') ? ' autofocus' : '' }} class="@error('phoneNumber') error-input @enderror">
    @error('phoneNumber')
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="{{ $errors->has('password') ? '' : old('password') }}" {{ $errors->has('password') ? ' autofocus' : '' }} class="@error('password') error-input @enderror">
    @error('password')
    <p style="color: red;">{{ $message }}</p>
    @enderror
    <button type="submit" >Submit</button>
</form>
</body>
</html>
