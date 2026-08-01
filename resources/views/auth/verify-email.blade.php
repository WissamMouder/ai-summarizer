```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding:20px;

            background:linear-gradient(
                135deg,
                #ffffff,
                #ecfdf5,
                #bbf7d0,
                #22c55e
            );

        }

        .card{

            width:500px;
            max-width:100%;

            background:rgba(255,255,255,.95);

            border-radius:22px;

            padding:40px;

            box-shadow:0 20px 45px rgba(34,197,94,.2);

            animation:fade .6s;

        }

        @keyframes fade{

            from{

                opacity:0;
                transform:translateY(30px);

            }

            to{

                opacity:1;
                transform:translateY(0);

            }

        }

        h1{

            text-align:center;

            color:#15803d;

            margin-bottom:15px;

        }

        p{

            text-align:center;

            color:#555;

            line-height:1.8;

            margin-bottom:25px;

        }

        .success{

            background:#dcfce7;

            color:#166534;

            padding:14px;

            border-radius:10px;

            text-align:center;

            margin-bottom:20px;

            font-weight:600;

        }

        .btn{

            width:100%;

            padding:15px;

            border:none;

            border-radius:12px;

            background:linear-gradient(135deg,#22c55e,#16a34a);

            color:white;

            font-size:17px;

            font-weight:600;

            cursor:pointer;

            transition:.35s;

            animation:pulse 2.5s infinite;

            position:relative;

            overflow:hidden;

        }

        .btn:hover{

            transform:translateY(-5px);

            box-shadow:0 15px 30px rgba(34,197,94,.35);

        }

        .btn:active{

            transform:scale(.96);

        }

        .btn::before{

            content:"";

            position:absolute;

            top:0;

            left:-120%;

            width:60%;

            height:100%;

            background:rgba(255,255,255,.35);

            transform:skewX(-25deg);

            transition:.7s;

        }

        .btn:hover::before{

            left:140%;

        }

        @keyframes pulse{

            0%{

                transform:scale(1);

            }

            50%{

                transform:scale(1.02);

            }

            100%{

                transform:scale(1);

            }

        }

        .logout{

            margin-top:20px;

        }

        .logout button{

            width:100%;

            padding:14px;

            border:none;

            border-radius:12px;

            background:#ef4444;

            color:white;

            font-size:16px;

            font-weight:600;

            cursor:pointer;

            transition:.3s;

        }

        .logout button:hover{

            background:#dc2626;

            transform:translateY(-3px);

        }

    </style>

</head>

<body>

<div class="card">

    <h1>📧 Verify Your Email</h1>

    <p>

        Thank you for registering!

        <br><br>

        Before accessing your account, please verify your email by clicking the verification link we sent to your inbox.

        <br><br>

        If you didn't receive the email, you can request another one below.

    </p>

    @if(session('status')=='verification-link-sent')

        <div class="success">

            ✅ A new verification email has been sent successfully.

        </div>

    @endif

    <form method="POST" action="{{ route('verification.send') }}">

        @csrf

        <button class="btn">

            📩 Resend Verification Email

        </button>

    </form>

    <form method="POST"
          action="{{ route('logout') }}"
          class="logout">

        @csrf

        <button>

            🚪 Logout

        </button>

    </form>

</div>

</body>
</html>
```
