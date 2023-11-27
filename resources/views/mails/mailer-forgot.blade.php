<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            padding: 20px;
            background-color: #1c2127c8;
            width: 600px;
            color: white;
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin-bottom: 10px;
        }

        h4 {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <hr>
        <h4>Hello, {{ $users->name }}</h4>
        <h4>Click the button below to reset your password:</h4>
        <a href="{{ route('validation', ['resettoken' => $token]) }}"
            style="display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            width: 500px;">Reset
            Password</a>
    </div>
</body>

</html>
