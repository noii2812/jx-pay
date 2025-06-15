<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Game Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #F3F3F3FF;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;

        }

        .login-container {
            border-radius: 15px;
            overflow: hidden;
            justify-content: space-between;
            box-shadow: 0 0 20px rgba(108, 92, 231, 0.1);
        }

        .game-wallpaper {
            position: relative;
            min-height: 600px;
            border-radius: 15px 0 0 15px;
            overflow: hidden;
        }

        .login-form {
            padding: 48px 40px 40px 40px;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            border-radius: 0 15px 15px 0;
            box-shadow: 0 8px 32px rgba(255, 211, 42, 0.15), 0 1.5px 6px rgba(0, 0, 0, 0.04);
            border: 1.5px solid #ffe066;
            position: relative;
        }

        .login-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
            animation: bounceIn 1s;
        }

        .login-icon img {
            width: 56px;
            height: 56px;
            filter: drop-shadow(0 2px 8px #ffe06688);
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        .divider {
            border-bottom: 1.5px dashed #ffe066;
            margin: 18px 0 28px 0;
        }

        .form-label {
            font-weight: 500;
            color: #bfa600;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid #ffe066;
            background: #fffde7;
            font-size: 1.08rem;
            box-shadow: 0 1px 4px #ffe06622;
        }

        .form-control:focus {
            border-color: #ffd32a;
            box-shadow: 0 0 10px #ffe06655;
        }

        .forgot-link {
            display: block;
            text-align: right;
            margin-top: -10px;
            margin-bottom: 24px;
            color: #bfa600;
            font-size: 0.98rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #ffb300;
            text-decoration: underline;
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #bfa600;
            text-decoration: none;
            transition: all 0.3s;
            padding: 10px 20px;
            border: 2px dashed #ffe066;
            border-radius: 15px;
            background: rgba(255, 211, 42, 0.1);
        }

        .signup-link:hover {
            color: #333;
            background: #ffd32a;
            border-style: solid;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 211, 42, 0.2);
        }

        .btn-login {
            background-color: #ffd32a;
            border: none;
            color: #333;
            font-weight: bold;
            border-radius: 20px;
            padding: 12px 30px;
            text-transform: uppercase;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s, box-shadow 0.2s;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        .btn-login:hover {
            background-color: #ffc107;
            transform: scale(1.07);
            box-shadow: 0 8px 24px #ffe06655;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .nav-link {
            color: #666;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        .nav-link:hover {
            background-color: #f0f0f0;
        }

        .login-title {
            color: #bfa600;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 2.2rem;
            text-align: center;
        }

        .login-subtitle {
            color: #8e7c3b;
            text-align: center;
            margin-bottom: 0;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <!-- Background Music -->
    <audio id="bgMusic" loop>
        <source src="{{ asset('images/music/song.mp3') }}" type="audio/mp3">
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
        <div class="container" style="width:1000px;">
            <div class="row login-container">
                <!-- Game Wallpaper Side -->
                <div class="col-md-6 game-wallpaper d-none d-md-block">
                    <video autoplay muted loop playsinline
                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 0 0 15px;">
                        <source src="/images/login.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Login Form Side -->
                <div class="col-md-6 login-form">
                    <div class="login-icon">
                        <img src="/images/banks/game-logo.jpg" alt="Coin Icon"
                            style="width: 100px; height: 100px; border-radius: 50%;">
                    </div>
                    <h1 class="login-title">Login Now</h1>
                    <h6></h6>
                    <p class="login-subtitle">ឱកាសក្លាយជាអ្នកក្លាហានក្នុងដៃអ្នក</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="divider"></div>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="username"  class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="mb-2 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                            <span class="password-toggle" onclick="togglePassword()"
                                style="padding-top: 30px; padding-right: 10px;">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                        <a href="/login/forgot" class="forgot-link">Forgot password?</a>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-login w-100">Login</button>
                        </div>
                       
                    </form>
                    <a href="/signup" class="signup-link">Don't have an account? Sign Up</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bgMusic = document.getElementById('bgMusic');

            // Try to play immediately
            // tryPlayMusic();

            // Also try to play on first user interaction
            document.addEventListener('click', function () {
                // tryPlayMusic();
            }, { once: true });
            //
            // Also try to play on first scroll
            document.addEventListener('scroll', function () {
                // tryPlayMusic();
            }, { once: true });
        });

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

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

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