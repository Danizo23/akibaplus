<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Akibaplus</title>
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

        .register-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 900px;
            width: 100%;
        }

        .register-image {
            background: linear-gradient(135deg, #00a8d8, #0088a8);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            order: 2;
        }

        .register-image::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .register-image::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .register-illustration {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .register-illustration svg {
            width: 200px;
            height: 200px;
            margin-bottom: 1rem;
        }

        .register-illustration h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .register-illustration p {
            opacity: 0.9;
        }

        .register-form {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            max-height: 100vh;
            order: 1;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            color: #1a5f7a;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.7rem 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #00a8d8;
            box-shadow: 0 0 0 3px rgba(0, 168, 216, 0.1);
            background: #f8f9ff;
        }

        .form-group input::placeholder {
            color: #999;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .form-row .form-group {
            margin-bottom: 0.8rem;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 1rem;
            color: #666;
            font-size: 0.8rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
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
            margin: 1rem 0;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 168, 216, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #00a8d8;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #0088a8;
            text-decoration: underline;
        }

        .back-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #00a8d8;
            text-decoration: none;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0088a8;
        }

        .form-title {
            font-size: 1.6rem;
            color: #1a5f7a;
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .form-subtitle {
            color: #999;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 0.7rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            border-left: 4px solid #c33;
        }

        .error-list {
            list-style: none;
        }

        .error-list li {
            margin-bottom: 0.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-container {
                grid-template-columns: 1fr;
            }

            .register-image {
                min-height: 250px;
                order: 1;
            }

            .register-form {
                order: 2;
                padding: 1.5rem;
            }

            .form-title {
                font-size: 1.4rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-group {
                margin-bottom: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .register-form {
                padding: 1rem;
            }

            .form-title {
                font-size: 1.2rem;
            }

            .form-group input,
            .form-group select {
                padding: 0.6rem 0.7rem;
                font-size: 0.85rem;
            }

            .submit-btn {
                padding: 0.7rem 1rem;
                font-size: 0.9rem;
            }

            .checkbox-group {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-form">
            <a href="/" class="back-link">← Kurudi</a>
            
            <h1 class="form-title">Jisajili</h1>
            <p class="form-subtitle">Tengeneza akaunti yako mpya saa hii</p>

            @if($errors->any())
                <div class="error-message">
                    <ul class="error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Jina Kamili</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            placeholder="John Doe"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Anuani</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                </div>

                <div class="form-row">
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

                    <div class="form-group">
                        <label for="password_confirmation">Thibitisha Neno la siri</label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="••••••••"
                            required
                        >
                    </div>
                </div>

                <!-- Role set to customer by default -->
                <input type="hidden" name="role" value="customer">

                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" value="1" required>
                    <label for="terms">Nakubali Sera ya Matumizi na Faragha</label>
                </div>

                <button type="submit" class="submit-btn">Jisajili</button>

                <div class="login-link">
                    Tayari una akaunti? <a href="{{ route('login') }}">Ingia hapa</a>
                </div>
            </form>
        </div>

        <div class="register-image">
            <div class="register-illustration">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="50" r="30" fill="currentColor" opacity="0.8"/>
                    <path d="M60 90 Q100 70 140 90 L135 160 Q100 170 65 160 Z" fill="currentColor" opacity="0.8"/>
                    <rect x="75" y="120" width="50" height="8" fill="currentColor" opacity="0.6"/>
                    <circle cx="50" cy="140" r="8" fill="currentColor" opacity="0.4"/>
                    <circle cx="150" cy="140" r="8" fill="currentColor" opacity="0.4"/>
                </svg>
                <h3>Karibu!</h3>
                <p>Jisajili na kuanza safari yako</p>
            </div>
        </div>
    </div>
</body>
</html>
