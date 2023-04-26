<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        p{
            color: #6c757d;
        }
        .button {
            background-color: white; 
            border: 2px solid #008CBA;
            border-radius: 10px;
            color: black; 
            padding: 12px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button:hover {
            background-color: #008CBA;
            color: white;
        }
        h3 {
            font-family: "Roboto Condensed", Sans-Serif;
            font-size: 35px;
            max-width: 100%;
            text-align: center;
        }
        img {
            width: 100%;
            max-width: 500px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body style="text-align: center;">
    <img src="https://img.freepik.com/free-vector/reset-password-concept-illustration_114360-7886.jpg?w=740&t=st=1682504848~exp=1682505448~hmac=bacb4b34a31064d597b49911bf39cbb869a490bc734718bb869bab28468d4d2e" alt="" width="600" height="400">
    <h4 style="font-size:20px;font-weight:bold;font-family:Arial,sans-serif;">
    Hello {{ $details['name'] }}!</h4>
    <p style="font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
        We've received a request to reset the password.
    </p>
    <p style="font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
        You can reset your password by clicking the button below:
    </p>
    <br>
    <p style="font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
    <a href="{{'http://127.0.0.1:8000/customer/Reset_Password/'.$details['email']}}"  class="button">Reset password</a>
    </p>
    <br>
    <h3 style="text-decoration: solid underline #e59c16 5px;">Thank you</h3>
    <p>Ecommerce.Com</p>

</body>
</html>