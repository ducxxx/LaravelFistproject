<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
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
    <h2>Confirm Forget Password</h2>
    @include("includes-back.flash.flash")
    <form method="POST" action="{{ route('password.new.change', ["email" => $email]) }}">
        @csrf

        <div class="form-group row">
            <div class="col-md-6">

                <label for="Code">Code:</label>
                <input type="text" id="code" name="code" value="{{ $errors->has('code') ? '' : old('code') }}" {{ $errors->has('code') ? ' autofocus' : '' }} class="@error('code') error-input @enderror">
                @error('code')
                <p style="color: red;">{{ $message }}</p>
                @enderror

                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" value="{{ $errors->has('password') ? '' : old('password') }}" {{ $errors->has('password') ? ' autofocus' : '' }} class="@error('password') error-input @enderror">
                @error('password')
                <p style="color: red;">{{ $message }}</p>
                @enderror

                <label for="confirm_password">Re-enter password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="{{ $errors->has('confirm_password') ? '' : old('confirm_password') }}" {{ $errors->has('confirm_password') ? ' autofocus' : '' }} class="@error('confirm_password') error-input @enderror">
                @error('confirm_password')
                <p style="color: red;">{{ $message }}</p>
                @enderror
                <button type="submit" >Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
