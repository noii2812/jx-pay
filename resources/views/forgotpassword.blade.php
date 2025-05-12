<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - Game Store</title>
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
        }
        .forgot-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(108, 92, 231, 0.1);
        }
        .game-wallpaper {
            position: relative;
            min-height: 600px;
            border-radius: 15px 0 0 15px;
            overflow: hidden;
        }
        .forgot-form {
            padding: 48px 40px 40px 40px;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            border-radius: 0 15px 15px 0;
            box-shadow: 0 8px 32px rgba(255, 211, 42, 0.15), 0 1.5px 6px rgba(0,0,0,0.04);
            border: 1.5px solid #ffe066;
            position: relative;
        }
        .forgot-icon {
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
        .forgot-title {
            color: #bfa600;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 2.2rem;
            text-align: center;
        }
        .forgot-subtitle {
            color: #8e7c3b;
            text-align: center;
            margin-bottom: 0;
            font-size: 1rem;
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
            padding: 12px;
        }
        .form-control:focus {
            border-color: #ffd32a;
            box-shadow: 0 0 10px #ffe06655;
        }
        .btn-reset {
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
        }
        .btn-reset:hover {
            background-color: #ffc107;
            transform: scale(1.07);
            box-shadow: 0 8px 24px #ffe06655;
        }
        .back-to-login {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #bfa600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-to-login:hover {
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
    <div class="container">
        <div class="row forgot-container">
            <!-- Game Wallpaper Side -->
            <div class="col-md-6 game-wallpaper d-none d-md-block">
                <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 0 0 15px;">
                    <source src="/images/login.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <!-- Forgot Password Form Side -->
            <div class="col-md-6 forgot-form">
                <div class="forgot-icon">
                    <img src="/images/banks/game-logo.jpg" alt="Game Logo" style="width: 100px; height: 100px; border-radius: 50%;">
                </div>
                <h1 class="forgot-title">Reset Password</h1>
                <p class="forgot-subtitle">Enter your details to reset your password</p>
                <div class="divider"></div>
                <form>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-4 position-relative">
                        <label for="old-password" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="old-password" placeholder="Enter your old password">
                        <span class="password-toggle" onclick="toggleOldPassword()" style="margin-top: 15px; margin-right: 5px;">
                            <i class="bi bi-eye" id="oldToggleIcon" style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                        </span>
                    </div>
                    <div class="mb-4 position-relative">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new-password" placeholder="Enter your new password">
                        <span class="password-toggle" onclick="toggleNewPassword()" style="margin-top: 15px; margin-right: 5px;">
                            <i class="bi bi-eye" id="newToggleIcon" style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                        </span>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-reset w-100">Reset Password</button>
                    </div>
                </form>
                <a href="/login" class="back-to-login">Back to Login</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleOldPassword() {
            const passwordInput = document.getElementById('old-password');
            const toggleIcon = document.getElementById('oldToggleIcon');
            
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

        function toggleNewPassword() {
            const passwordInput = document.getElementById('new-password');
            const toggleIcon = document.getElementById('newToggleIcon');
            
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