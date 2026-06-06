<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Akibaplus</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 900px;
            width: 100%;
        }

        .login-form {
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-image {
            background: linear-gradient(135deg, #00a8d8, #0088a8);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-image::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .login-image::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .login-illustration {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .login-illustration svg {
            width: 200px;
            height: 200px;
            margin-bottom: 1rem;
        }

        .login-illustration h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .login-illustration p {
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1a5f7a;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00a8d8;
            box-shadow: 0 0 0 3px rgba(0, 168, 216, 0.1);
            background: #f8f9ff;
        }

        .form-group input::placeholder {
            color: #999;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .checkbox-group a {
            color: #00a8d8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .checkbox-group a:hover {
            color: #0088a8;
            text-decoration: underline;
        }

        .submit-btn {
            background: linear-gradient(135deg, #00a8d8, #0088a8);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 168, 216, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .signup-link a {
            color: #00a8d8;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #0088a8;
            text-decoration: underline;
        }

        .back-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #00a8d8;
            text-decoration: none;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0088a8;
        }

        .form-title {
            font-size: 1.8rem;
            color: #1a5f7a;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .form-subtitle {
            color: #999;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #c33;
        }

        .success-message {
            background: #efe;
            color: #3a3;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #3a3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .login-image {
                min-height: 250px;
            }

            .login-form {
                padding: 2rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 1.5rem;
            }

            .form-title {
                font-size: 1.3rem;
            }

            .form-group input {
                padding: 0.7rem 0.8rem;
                font-size: 0.9rem;
            }

            .submit-btn {
                padding: 0.7rem 1.2rem;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <a href="/" class="back-link">← Kurudi</a>
            
            <h1 class="form-title">Ingiza Akaunti</h1>
            <p class="form-subtitle"></p>

            @if($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            @session('status')
                <div class="success-message">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Anuani</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Neno la siri</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember" style="margin: 0; font-weight: 400;">Kumbuka mimi</label>
                </div>

                <button type="submit" class="submit-btn">Ingia</button>

                <div class="signup-link">
                    Huna akaunti? <a href="{{ route('register') }}">Jisajili hapa</a>
                </div>
            </form>
        </div>

        <div class="login-image">
            <div class="login-illustration">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="60" r="25" fill="currentColor" opacity="0.8"/>
                    <path d="M70 90 Q100 80 130 90 Q130 120 100 130 Q70 120 70 90 Z" fill="currentColor" opacity="0.8"/>
                    <rect x="80" y="135" width="15" height="40" fill="currentColor" opacity="0.6"/>
                    <rect x="105" y="135" width="15" height="40" fill="currentColor" opacity="0.6"/>
                    <rect x="70" y="100" width="12" height="35" fill="currentColor" opacity="0.6"/>
                    <rect x="118" y="100" width="12" height="35" fill="currentColor" opacity="0.6"/>
                </svg>
                <h3>Karibu Akibaplus</h3>
                <p></p>
            </div>
        </div>
    </div>
</body>
</html>
