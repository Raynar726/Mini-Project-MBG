<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem MBG</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #cef3d4 0%, #2521ec 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #1e293b;
            font-size: 22px;
            text-align: center;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            text-align: center;
            margin-bottom: 28px;
        }

        .error-box {
            background-color: #fef2f2;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border: 1px solid #fee2e2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: all 0.2s ease;
        }

        input:focus {
            border-color: #191b8a;
            box-shadow: 0 0 0 4px rgba(25, 27, 138, 0.1);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #272adf;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
            margin-top: 8px;
        }

        button:hover {
            background-color: #181aa8;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Login Sistem MBG</h2>
        <div class="subtitle">Portal Keamanan Makanan MBG</div>

        @if($errors->any())
            <div class="error-box">{{ $errors->first() }}</div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="nama@email.com" required>
            </div>
            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
