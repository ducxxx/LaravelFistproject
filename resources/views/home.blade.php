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
</head>
<body>

<form id="registrationForm" method="post" action="/register">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="fullName">Full Name:</label>
    <input type="text" id="fullName" name="fullName" required>

    <label for="email">E-Mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="phoneNumber">Phone Number:</label>
    <input type="tel" id="phoneNumber" name="phoneNumber" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>

    <button type="submit" >Submit</button>
</form>

{{--<script>--}}
{{--    function submitForm() {--}}
{{--        var username = document.getElementById('username').value;--}}
{{--        var fullName = document.getElementById('fullName').value;--}}
{{--        var email = document.getElementById('email').value;--}}
{{--        var phoneNumber = document.getElementById('phoneNumber').value;--}}
{{--        var password = document.getElementById('password').value;--}}
{{--        var confirmPassword = document.getElementById('confirmPassword').value;--}}

{{--        // Perform validation and registration logic here--}}
{{--        // You can use AJAX to send this data to the server for processing--}}

{{--        // For demonstration purposes, let's just log the values to the console--}}
{{--        console.log('Username:', username);--}}
{{--        console.log('Full Name:', fullName);--}}
{{--        console.log('E-Mail:', email);--}}
{{--        console.log('Phone Number:', phoneNumber);--}}
{{--        console.log('Password:', password);--}}
{{--        console.log('Confirm Password:', confirmPassword);--}}
{{--    }--}}
{{--</script>--}}

</body>
</html>
