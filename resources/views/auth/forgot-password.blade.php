
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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

            width:450px;
            max-width:100%;

            background:rgba(255,255,255,.93);

            backdrop-filter:blur(15px);

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

            color:#666;

            line-height:1.7;

            margin-bottom:25px;

            text-align:center;

        }

        .success{

            background:#dcfce7;

            color:#166534;

            padding:12px;

            border-radius:10px;

            margin-bottom:20px;

            text-align:center;

        }

        label{

            display:block;

            margin-bottom:8px;

            font-weight:600;

        }

        input{

            width:100%;

            padding:14px;

            border:1px solid #ddd;

            border-radius:10px;

            outline:none;

            transition:.3s;

            margin-bottom:18px;

        }

        input:focus{

            border-color:#22c55e;

            box-shadow:0 0 12px rgba(34,197,94,.25);

        }

        .error{

            color:#ef4444;

            margin-top:-10px;

            margin-bottom:15px;

            font-size:14px;

        }

        button{

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

        button:hover{

            transform:translateY(-5px);

            box-shadow:0 15px 30px rgba(34,197,94,.35);

        }

        button:active{

            transform:scale(.96);

        }

        button::before{

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

        button:hover::before{

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

        .back{

            margin-top:20px;

            text-align:center;

        }

        .back a{

            color:#15803d;

            text-decoration:none;

            font-weight:600;

        }

        .back a:hover{

            text-decoration:underline;

        }

    </style>

</head>

<body>

<div class="card">

    <h1>🔑 Forgot Password</h1>

    <p>

        Enter your email address and we will send you a password reset link.

    </p>

    @if(session('status'))

        <div class="success">

            {{ session('status') }}

        </div>

    @endif

    <form method="POST" action="{{ route('password.email') }}">

        @csrf

        <label>Email Address</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required>

        @error('email')

            <div class="error">

                {{ $message }}

            </div>

        @enderror

        <button type="submit">

            Send Reset Link

        </button>

    </form>

    <div class="back">

        <a href="{{ route('login') }}">

            ← Back to Login

        </a>

    </div>

</div>

</body>
</html>

