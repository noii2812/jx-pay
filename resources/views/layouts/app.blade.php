<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #e8f4ff;
        }
        .sidebar {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            height: 100vh;
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
        .nav-link.active {
            background-color: #6c5ce7;
            color: white;
        }
        .card-privilege {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
        }
        .card-privilege:hover {
            transform: translateY(-5px);
        }
        .banner {
            background: linear-gradient(45deg, #6c5ce7, #3498db);
            border-radius: 15px;
            color: white;
        }
        .btn-yellow {
            background-color: #ffd32a;
            border: none;
            color: #333;
            font-weight: bold;
        }
        .server-status {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row g-4 py-3">
            {{-- {{ $slot }} --}}
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 