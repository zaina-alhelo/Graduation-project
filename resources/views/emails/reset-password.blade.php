<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - OptiEye</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #1E40AF; 
            font-size: 32px;
            font-weight: bold;
        }

        .content {
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }

        .content a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888888;
        }

        .button {
            display: inline-block;
            background-color: #1E40AF;
            color: #ffffff; 
            padding: 15px 30px; 
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            font-weight: bold; 
            line-height: 1.4; 
            width: 100%; 
            box-sizing: border-box; 
        }

        .button:hover {
            background-color: #0c2d80;
            color: #ffffff;
        }
        #url {
            color: #1E40AF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OptiEye</h1>
            <p>Password Reset Request</p>
        </div>

        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>We received a request to reset your password for your OptiEye account. If you did not request a password reset, you can safely ignore this email.</p>
            <p>To reset your password, click the button below:</p>

            <a href="{{ route('password.reset', ['token' => $token]) }}" class="button">Reset Password</a>

            <p>If the button above does not work, you can copy and paste the following URL into your browser:</p>
            <p><a href="{{ route('password.reset', ['token' => $token]) }}" id="url">{{ route('password.reset', ['token' => $token]) }}</a></p>
        </div>

        <div class="footer">
            <p>Thank you for using OptiEye.</p>
            <p>If you have any questions, feel free to contact our support team at <a href="mailto:support@optieye.com">support@optieye.com</a>.</p>
        </div>
    </div>
</body>
</html>
