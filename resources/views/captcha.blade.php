<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .captcha-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }
        
        .captcha-image {
            border: 1px solid #ccc;
            cursor: pointer;
        }
        
        .captcha-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .refresh-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form id="captcha-form">
        @csrf
        
        <div class="captcha-container">
            <img id="captcha-image" src="{{ route('captcha.generate') }}" 
                 alt="CAPTCHA" class="captcha-image" onclick="refreshCaptcha()">
            <input type="text" name="captcha" id="captcha-input" 
                   class="captcha-input" placeholder="Enter captcha here" required>
            <button type="button" class="refresh-btn" onclick="refreshCaptcha()">↻</button>
        </div>
        
        <div id="captcha-error" class="error"></div>
        
        <button type="submit">Submit</button>
    </form>

    <script>
        function refreshCaptcha() {
            document.getElementById('captcha-image').src = 
                '{{ route("captcha.generate") }}?' + Math.random();
            document.getElementById('captcha-input').value = '';
            document.getElementById('captcha-error').textContent = '';
        }
        
        document.getElementById('captcha-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('{{ route("captcha.verify") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('CAPTCHA verified successfully!');
                    // Continue with form submission or redirect
                } else {
                    document.getElementById('captcha-error').textContent = data.message;
                    refreshCaptcha();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>