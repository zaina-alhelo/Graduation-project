<!DOCTYPE html>
<html dir="ltr">
<head>
    <title>Email Verification</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            text-align: center; 
            background-color: #f3f4f6; 
            margin: 0; 
            padding: 0; 
        }
        .container { 
            width: 100%; 
            max-width: 600px; 
            margin: 50px auto; 
            background-color: #fff; 
            border-radius: 10px; 
            padding: 30px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 { 
            font-size: 28px; 
            color: #333; 
        }
        p { 
            font-size: 16px; 
            color: #555; 
        }
        .code { 
            font-size: 36px; 
            letter-spacing: 5px; 
            background-color: #e0e0e0; 
            padding: 20px; 
            border-radius: 8px; 
            font-weight: bold;
            margin: 20px 0;
        }
        .footer { 
            font-size: 14px; 
            color: #777; 
        }
        .footer a { 
            color: #007bff; 
            text-decoration: none; 
        }
        .footer a:hover { 
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, {{ $user->name }}</h2>
        <p>Your verification code is:</p>
        <div class="code">{{ $verificationCode }}</div>
        <p>The code will expire in 10 minutes.</p>
        <div class="footer">
            <p>If you did not request this, please ignore this email.</p>
        </div>
    </div>
</body>
</html>
