<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

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

            width:450px;
            max-width:100%;

            background:#fff;

            border-radius:20px;

            padding:40px;

            box-shadow:0 20px 40px rgba(8, 8, 8, 0.77);

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

            color:#777;

            margin-bottom:30px;

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

            margin-bottom:18px;

            transition:.3s;

        }

        input:focus{

            border-color:#2563eb;

            box-shadow:0 0 10px rgba(37,99,235,.25);

        }

        .error{

            color:red;

            font-size:14px;

            margin-top:-12px;

            margin-bottom:15px;

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

        .login{

            text-align:center;

            margin-top:20px;

        }

        .login a{

            color:#2563eb;

            text-decoration:none;

            font-weight:600;

        }

        .login a:hover{

            text-decoration:underline;

        }

    </style>

</head>

<body>

<div class="card">

    <h1>🤖 AI Summarizer</h1>

    <p>Create your account</p>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <label>Full Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter your name"
            required>

        @error('name')

            <div class="error">{{ $message }}</div>

        @enderror

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required>

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

        <label>Confirm Password</label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm password"
            required>

        <button type="submit">

            Create Account

        </button>

    </form>

    <div class="login">

        Already have an account?

        <a href="{{ route('login') }}">

            Login

        </a>

    </div>

</div>

</body>
</html>
