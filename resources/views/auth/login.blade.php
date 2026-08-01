<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            background:linear-gradient(
                135deg,
                #ffffff,
                #ecfdf5,
                #bbf7d0,
                #22c55e
            );
            padding:20px;

        }

        .card{

            width:430px;
            max-width:100%;
            background:white;
            border-radius:20px;
            padding:40px;
            box-shadow:0 20px 40px rgba(0,0,0,.2);
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
            color:#2563eb;
            margin-bottom:10px;

        }

        p{

            text-align:center;
            color:#666;
            margin-bottom:30px;

        }

        label{

            display:block;
            margin-bottom:8px;
            font-weight:600;

        }

        input[type=email],
        input[type=password]{

            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            margin-bottom:18px;
            outline:none;
            transition:.3s;

        }

        input:focus{

            border-color:#2563eb;
            box-shadow:0 0 10px rgba(37,99,235,.2);

        }

        .remember{

            display:flex;
            align-items:center;
            gap:8px;
            margin-bottom:20px;

        }

        .remember input{

            width:auto;

        }

        .error{

            color:#ef4444;
            font-size:14px;
            margin-top:-12px;
            margin-bottom:15px;

        }

        .status{

            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;

        }

        button{

            width:100%;
            padding:15px;
            border:none;
            border-radius:10px;
            background:#2563eb;
            color:white;
            font-size:17px;
            cursor:pointer;
            transition:.3s;

        }

        button:hover{

            background:#1d4ed8;

        }

        .links{

            margin-top:20px;
            display:flex;
            justify-content:space-between;
            font-size:14px;

        }

        .links a{

            color:#2563eb;
            text-decoration:none;
            font-weight:600;

        }

        .links a:hover{

            text-decoration:underline;

        }

    </style>

</head>

<body>

<div class="card">

    <h1>🤖 AI Summarizer</h1>

    <p>Welcome Back</p>

    @if(session('status'))

        <div class="status">

            {{ session('status') }}

        </div>

    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required
            autofocus>

        @error('email')

            <div class="error">{{ $message }}</div>

        @enderror

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter your password"
            required>

        @error('password')

            <div class="error">{{ $message }}</div>

        @enderror

        <div class="remember">

            <input
                type="checkbox"
                name="remember"
                id="remember">

            <label for="remember">
                Remember me
            </label>

        </div>

        <button type="submit">

            Login

        </button>

    </form>

    <div class="links">

        @if(Route::has('password.request'))

            <a href="{{ route('password.request') }}">

                Forgot Password?

            </a>

        @endif

        <a href="{{ route('register') }}">

            Create Account

        </a>

    </div>

</div>

</body>
</html>

