<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Game Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f4ff;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            padding: 2rem 0;
            min-height: 100vh;
        }
        .signup-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(108, 92, 231, 0.1);
            margin: 2rem auto;
            max-height: calc(100vh - 4rem);
            display: flex;
        }
        .game-wallpaper {
            position: relative;
            height: auto;
            border-radius: 15px 0 0 15px;
            overflow: hidden;
            flex: 1;
        }
        .signup-form {
            padding: 48px 40px 40px 40px;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            border-radius: 0 15px 15px 0;
            box-shadow: 0 8px 32px rgba(255, 211, 42, 0.15), 0 1.5px 6px rgba(0,0,0,0.04);
            border: 1.5px solid #ffe066;
            position: relative;
            overflow-y: auto;
            max-height: 100%;
            scrollbar-width: thin;
            scrollbar-color: #ffd32a #ffe066;
        }
        .signup-form::-webkit-scrollbar {
            width: 8px;
        }
        .signup-form::-webkit-scrollbar-track {
            background: #ffe066;
            border-radius: 4px;
        }
        .signup-form::-webkit-scrollbar-thumb {
            background: #ffd32a;
            border-radius: 4px;
        }
        .signup-form::-webkit-scrollbar-thumb:hover {
            background: #ffb300;
        }
        .signup-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
            animation: bounceIn 1s;
        }
        @keyframes bounceIn {
            0% { transform: scale(0.7); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
        .signup-title {
            color: #bfa600;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 2.2rem;
            text-align: center;
        }
        .signup-subtitle {
            color: #8e7c3b;
            text-align: center;
            margin-bottom: 0;
            font-size: 1rem;
        }
        .divider {
            border-bottom: 1.5px dashed #ffe066;
            margin: 18px 0 28px 0;
        }
        .form-section {
            background: rgba(255, 211, 42, 0.05);
            border: 1px solid #ffe066;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 24px;
        }
        .form-section-title {
            color: #bfa600;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group:last-child {
            margin-bottom: 0;
        }
        .form-label {
            font-weight: 500;
            color: #bfa600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .required-star {
            color: #ff6b6b;
            font-size: 14px;
        }
        .form-control {
            border-radius: 12px;
            border: 2px solid #ffe066;
            background: #fffde7;
            font-size: 1.08rem;
            box-shadow: 0 1px 4px #ffe06622;
            padding: 12px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #ffd32a;
            box-shadow: 0 0 10px #ffe06655;
            transform: translateY(-1px);
        }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #bfa600;
            z-index: 2;
        }
        .input-with-icon {
            padding-left: 35px;
        }
        .password-requirements {
            font-size: 0.85rem;
            color: #8e7c3b;
            margin-top: 8px;
            padding-left: 8px;
        }
        .password-requirements ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }
        .password-requirements li {
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .password-requirements i {
            font-size: 12px;
        }
        .btn-signup {
            background-color: #ffd32a;
            border: none;
            color: #333;
            font-weight: bold;
            border-radius: 20px;
            padding: 12px 30px;
            text-transform: uppercase;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            transition: all 0.3s, box-shadow 0.2s;
            letter-spacing: 1px;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
        }
        .btn-signup:hover {
            background-color: #ffc107;
            transform: scale(1.07);
            box-shadow: 0 8px 24px #ffe06655;
        }
        .btn-signup:active {
            transform: scale(0.98);
        }
        .terms-text {
            text-align: center;
            font-size: 0.9rem;
            color: #8e7c3b;
            margin-top: 15px;
        }
        .terms-text a {
            color: #bfa600;
            text-decoration: none;
            font-weight: 500;
        }
        .terms-text a:hover {
            text-decoration: underline;
            color: #ffb300;
        }
        .back-to-signin {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #bfa600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-to-signin:hover {
            color: #ffb300;
            text-decoration: underline;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Background Music -->
    <audio id="bgMusic" loop>
        <source src="{{ asset('images/music/song.mp3') }}" type="audio/mp3" style="width:30px; height:30px;">
        Your browser does not support the audio element.
    </audio>

    <!-- Add music control button -->
    <div style="position: fixed; top: 20px; right: 20px; z-index: 1000; width:50px; height:50px; display:flex; align-items:center; justify-content:center; background: rgba(255, 211, 42, 0.9); padding: 10px; border-radius: 50%; cursor: pointer; box-shadow: 0 2px 10px rgba(0,0,0,0.1);"
        onclick="toggleMusic()">
        <i class="bi bi-volume-up-fill" id="musicIcon" style="font-size: 24px; color: #333;"></i>
    </div>

    <div style="height: 100vh; width: 100vw; display: flex; align-items: center; justify-content: center;">
        <img src="/images/sky.jpg" alt="Kunlun"
            style="width: 100vw; height: 100vh; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -1;">
    <div class="container">
        <div class="signup-container">
                <!-- Game Wallpaper Side -->
                <div class="col-md-6 game-wallpaper d-none d-md-block">
                    <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 0 0 15px;">
                        <source src="/images/login.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
                <!-- Sign Up Form Side -->
                <div class="col-md-6 signup-form">
                    <div class="signup-icon">
                        <img src="/images/banks/game-logo.jpg" alt="Game Logo" style="width: 100px; height: 100px; border-radius: 50%;">
                    </div>
                    <h1 class="signup-title">Create Account</h1>
                    <p class="signup-subtitle">Join our gaming community today!</p>
                    <div class="divider"></div>
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-person-circle"></i> Account Information
                            </div>
                            <div class="input-group" style="justify-content: space-between">
                                <label for="username" class="form-label">Username <span class="required-star">*</span></label>
                                <div class="position-relative">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control input-with-icon @error('username') is-invalid @enderror" 
                                        name="username" id="username" placeholder="Choose a username" value="{{ old('username') }}" required>
                                </div>
                                @error('username')
                                    <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="input-group" style="justify-content: space-between">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="position-relative">
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input type="email" class="form-control input-with-icon @error('email') is-invalid @enderror" 
                                        name="email" id="email" placeholder="Enter your email (optional)" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="input-group" style="justify-content: space-between">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="position-relative">
                                    <i class="bi bi-phone input-icon"></i>
                                    <input type="tel" class="form-control input-with-icon @error('phone') is-invalid @enderror" 
                                        name="phone" id="phone" placeholder="Enter your phone number (optional)" value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="bi bi-shield-lock"></i> Security
                            </div>
                            <div class="input-group position-relative" style="justify-content: space-between;">
                                <label for="password" class="form-label">Password <span class="required-star">*</span></label>
                                <div class="position-relative">
                                    <i class="bi bi-key input-icon"></i>
                                    <input type="password" class="form-control input-with-icon @error('password') is-invalid @enderror" 
                                        name="password" id="password" placeholder="Create a password" required>
                                    <span class="password-toggle" onclick="togglePassword('password', 'passwordToggle')">
                                        <i class="bi bi-eye" id="passwordToggle"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="password-requirements">
                                <div>
                                    <ul>
                                        <li><i class="bi bi-x-circle text-danger"></i> At least 8 characters</li>
                                        <li><i class="bi bi-x-circle text-danger"></i> Include numbers and letters</li>
                                        <li><i class="bi bi-x-circle text-danger"></i> Include special characters</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="input-group position-relative" style="justify-content: space-between;">
                                <label for="password_confirmation" class="form-label">Confirm Password <span class="required-star">*</span></label>
                                <div class="position-relative">
                                    <i class="bi bi-key input-icon"></i>
                                    <input type="password" class="form-control input-with-icon" 
                                        name="password_confirmation" id="password_confirmation" placeholder="Confirm password" style="width: 100%;" required>
                                    <span class="password-toggle" onclick="togglePassword('password_confirmation', 'confirmToggle')">
                                        <i class="bi bi-eye" id="confirmToggle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
    
                        <div class="mb-4">
                            <button type="submit" class="btn btn-signup w-100">Create Account</button>
                            <p class="terms-text">
                                By creating an account, you agree to our
                                <a href="#">Terms of Service</a> and
                                <a href="#">Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                    <a href="/login" class="back-to-signin">Already have an account? Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add this at the beginning of your script section
        document.addEventListener('DOMContentLoaded', function() {
            const bgMusic = document.getElementById('bgMusic');
            
            // Try to play immediately
            tryPlayMusic();

            // Also try to play on first user interaction
            document.addEventListener('click', function() {
                tryPlayMusic();
            }, { once: true });

            // Also try to play on first scroll
            document.addEventListener('scroll', function() {
                tryPlayMusic();
            }, { once: true });
            
            // Password validation
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const lengthCheck = document.querySelector('.password-requirements li:nth-child(1) i');
            const alphanumericCheck = document.querySelector('.password-requirements li:nth-child(2) i');
            const specialCharCheck = document.querySelector('.password-requirements li:nth-child(3) i');
            
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const hasEightChars = password.length >= 8;
                const hasAlphaNumeric = /(?=.*[0-9])(?=.*[a-zA-Z])/.test(password);
                const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                
                // Update visual indicators
                updateCheckIcon(lengthCheck, hasEightChars);
                updateCheckIcon(alphanumericCheck, hasAlphaNumeric);
                updateCheckIcon(specialCharCheck, hasSpecialChar);
            });
            
            // Check if passwords match
            confirmInput.addEventListener('input', function() {
                if (passwordInput.value !== this.value) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });
        
        function updateCheckIcon(icon, isValid) {
            if (isValid) {
                icon.classList.remove('bi-x-circle', 'text-danger');
                icon.classList.add('bi-check-circle', 'text-success');
            } else {
                icon.classList.remove('bi-check-circle', 'text-success');
                icon.classList.add('bi-x-circle', 'text-danger');
            }
        }

        function tryPlayMusic() {
            const bgMusic = document.getElementById('bgMusic');
            const musicIcon = document.getElementById('musicIcon');
            
            if (bgMusic.paused) {
                const playPromise = bgMusic.play();
                
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        // Playback started successfully
                        musicIcon.classList.remove('bi-volume-up-fill');
                        musicIcon.classList.add('bi-volume-mute-fill');
                    })
                    .catch(error => {
                        // Auto-play was prevented
                        console.log("Autoplay prevented:", error);
                    });
                }
            }
        }

        function toggleMusic() {
            const bgMusic = document.getElementById('bgMusic');
            const musicIcon = document.getElementById('musicIcon');

            if (bgMusic.paused) {
                const playPromise = bgMusic.play();
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        musicIcon.classList.remove('bi-volume-up-fill');
                        musicIcon.classList.add('bi-volume-mute-fill');
                    });
                }
            } else {
                bgMusic.pause();
                musicIcon.classList.remove('bi-volume-mute-fill');
                musicIcon.classList.add('bi-volume-up-fill');
            }
        }

        function togglePassword(inputId, toggleId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>