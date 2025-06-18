<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url("/images/sky.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100vw; 
            height: 100vh;
            object-fit: cover;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            margin: 50px auto;
            padding: 30px;
        }
        .input-group {
            position: relative;
        }
        .input-group .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            /* transform: translateY(-50%); */
            cursor: pointer;
            color: #a0a0a0;
        }
        .sabay-logo {
            width: 80px; /* Adjust as needed */
            height: auto;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="card">
        <div class="flex justify-center items-center mb-6 rounded-circle">
            <img src="{{asset("/images/banks/game-logo.jpg")}}" alt="Sabay Logo" class="rounded-md w-16"> 
        </div>

        <h2 class="text-2xl font-bold text-center mb-6">Reset Password via security Password</h2>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 input-group">
                <label for="security-password" class="block text-gray-700 text-sm font-semibold mb-2">Security Password</label>
                <input type="password" id="security-password" name="security_password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Security Password">
                <span class="toggle-password"><i class="bi bi-eye"></i></span>
                @error('security_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 input-group">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Password">
                <span class="toggle-password"><i class="bi bi-eye"></i></span>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 input-group">
                <label for="confirm-password" class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Confirm Password">
                <span class="toggle-password"><i class="bi bi-eye"></i></span>
            </div>

            <button type="submit" class=" w-full bg-gray-200 text-gray-600 font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75" 
                    style="background-color: #ffd32a;">
                Submit
            </button>
        </form>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex justify-center items-center text-sm mt-6">
            <a href="/login" class="text-blue-500 hover:underline">Return to login</a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function (e) {
                const passwordInput = this.previousElementSibling;
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
        });
    </script>
</body>
</html>