<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your VideoShared OTP Code</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        .wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .container {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #ffffff;
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
        }
        .logo {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .content {
            background-color: #ffffff;
            padding: 30px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #ff5a5f;
        }
        h2 {
            margin-top: 0;
            color: #ff5a5f;
        }
        .otp-code {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            margin: 30px 0;
            letter-spacing: 16px;
            color: #000000;
            background-color: #ffffff;
            padding: 15px;
        }
        .button {
            display: inline-block;
            background-color: #ff5a5f;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #ff4146;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 20px;
            padding: 0 20px 20px;
        }
        .footer a {
            color: #000000;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <img src="{{asset('img/sing-up-ba.jpg')}}" alt="Motionmate Logo" class="logo">
                <h1>Video Share</h1>
            </div>
            <div class="content">
                <h2>Hello {{$user->name}},</h2>
                <p>Welcome to Video Share! To complete your sign-up, please use the following one-time passcode:</p>
                <div class="otp-code">123456</div>
                <p>This code will expire in <strong>10 minutes</strong>. Please enter it to complete your account verification.</p>
                <p>If you didn't request this OTP, please disregard this email.</p>
                <a href="" class="button">Verify Your Account</a>
            </div>
            <div class="footer">
                <p>Best regards,<br>The dlpr Team</p>
            </div>
        </div>
    </div>
</body>
</html>