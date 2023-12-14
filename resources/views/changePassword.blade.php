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
    <h2>Login</h2>

    <form method="POST" action="{{ route('change.password') }}">
        @csrf

        <div class="form-group row">
            <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

            <div class="col-md-6">
                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>

                @error('current_password')
                <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-6">
                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                @error('new_password')
                <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required>

                @error('confirm_password')
                <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Change Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
