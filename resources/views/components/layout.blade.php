<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        .bg-dashboard-green {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
            background: #FCFCFFFF;
            z-index: 0;
        }

        .app-container {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .sidebar {
            width: 270px;
            background: #fff;
            min-height: 80vh;
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.15), 0 1.5px 8px rgba(0, 0, 0, 0.04);
            padding: 2rem 1rem 1rem 1rem;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            height: calc(100vh - 2rem);
            border-radius: 1.5rem;
            margin: 3.5rem 0rem 0rem 0.5rem;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1030;
            transition: transform 0.3s ease-in-out;
            will-change: transform;
            backface-visibility: hidden;
        }

        .sidebar .sidebar-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .sidebar .sidebar-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .sidebar .sidebar-title {
            font-size: 0.85rem;
            font-weight: 700;
            color: #94a3b8;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding-left: 0.5rem;
        }

        .sidebar .nav-link {
            color: #64748b;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
            margin-bottom: 0.375rem;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
            font-weight: 600;
        }

        .sidebar .nav-link.active::before {
            content: '';
            position: absolute;
            left: -1rem;
            top: 50%;
            transform: translateY(-50%);
            height: 60%;
            width: 4px;
            background: #22c55e;
            border-radius: 0 4px 4px 0;
        }

        .sidebar .nav-link .bi {
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link:hover .bi,
        .sidebar .nav-link.active .bi {
            transform: scale(1.1);
            color: #22c55e;
        }

        .sidebar .nav-item {
            position: relative;
        }

        .sidebar .nav-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 10%;
            width: 80%;
            height: 1px;
            background: rgba(100, 116, 139, 0.1);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .sidebar .nav-item:hover::after {
            transform: scaleX(1);
        }

        .sidebar .collapse {
            margin-left: 1.5rem;
        }

        .sidebar-search {
            margin-bottom: 1.5rem;
        }

        .sidebar-footer {
            margin-top: auto;
            font-size: 0.9rem;
            color: #a3a3a3;
        }

        .main-content {
            flex: 1;
            background: #f8fafc;
            padding: 0.5rem;
            min-height: 100vh;
            height: auto;
            border-radius: 2rem 0 0 2rem;
            margin: 0.5rem 1rem 1rem 0;
            position: relative;
            z-index: 2;
            margin-left: 290px;
            transition: all 0.3s ease;
            opacity: 1;
            transform: translateZ(0);
            backface-visibility: hidden;
            will-change: opacity, transform;
        }

        .page-transition {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .page-transition.show {
            opacity: 1;
        }

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .dashboard-cards {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .dashboard-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            padding: 1.5rem;
            flex: 1 1 220px;
            min-width: 220px;
        }

        .profile-pic {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1031;
            background: #22c55e;
            border: none;
            color: white;
            padding: 0.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .sidebar-toggle:hover {
            background: #16a34a;
        }

        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1029;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            overflow-y: hidden;
        }

        /* Used to prevent flashing during page loads */
        .no-transition {
            transition: none !important;
        }

        @media (max-width: 991px) {
            .app-container {
                flex-direction: column;
            }

            .sidebar {
                transform: translateX(-100%);
                margin: 0;
                height: 100vh;
                position: fixed;
                border-radius: 0;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin: 0;
                padding: 1rem;
                border-radius: 0;
                width: 100%;
                margin-left: 0;
            }

            .sidebar-backdrop.show {
                opacity: 1;
                display: block;
            }

            body.sidebar-open .main-content {
                position: fixed;
                overflow: hidden;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 1rem;
            }
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg sticky-top"
    style=" top: 0; right: 16px; z-index: 1030; height: 6vh; background-color: #ffffff;">
    <div class="container-fluid ">
        <button class="btn btn-warning" onclick="toggleSidebar()" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        <div class="d-flex align-items-center justify-content-end">
            <span class="me-3">20,145 <i class="bi bi-coin text-warning"></i></span>
            <div class="dropdown">
                <div class="d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" 
                         style="width: 35px; height: 35px;">
                        {{ strtoupper(substr(auth()->user()->username ?? 'U', 0, 1)) }}
                    </div>
                    <span>{{ auth()->user()->username ?? 'Username' }}</span>
                    <i class="bi bi-chevron-down ms-2"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="/profile">
                            <i class="bi bi-person me-2"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i>Settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<body>
    <div class="app-container">
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header mb-3">
                <div>
                    <img src="{{ asset('images/banks/game-logo.jpg') }}" alt="Admin"
                        style="border-radius: 10px; width: 100%; height: 100%;">
                </div>
            </div>
            
            @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'gm']))
            <div class="sidebar-title">Admin</div>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="/admin" data-path="/admin"><i class="bi bi-grid"></i> Admin Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orderCoin" data-path="/orderCoin"><i class="bi bi-tag"></i> Order Coin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users" data-path="/users"><i class="bi bi-people"></i> Users</a>
                </li>
            </ul>
            @endif
            
            <div class="sidebar-title">Pages</div>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="/" data-path="/"><i class="bi bi-grid"></i> Dashboards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile" data-path="/profile"><i class="bi bi-person"></i>Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/game" data-path="/game"><i class="bi bi-controller"></i>Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transferCoinHistory" data-path="/transferCoinHistory"><i class="bi bi-clipboard2-check"></i>Transfer Coin History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/topUpHistory" data-path="/topUpHistory"><i class="bi bi-coin"></i>Top Up History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop" data-path="/shop"><i class="bi bi-cart"></i>Shop</a>
                </li>
            </ul>

            <div class="sidebar-footer mt-4">

            </div>
        </aside>

        <main class="main-content page-transition" id="mainContent">
            {{ $slot }}
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const body = document.body;
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarBackdrop = document.getElementById('sidebarBackdrop');
            const navLinks = document.querySelectorAll('.sidebar .nav-link');

            // Set no-transition class initially to prevent flash during page load
            sidebar.classList.add('no-transition');
            mainContent.classList.add('no-transition');
            
            // Remove the no-transition class after a short delay
            setTimeout(() => {
                sidebar.classList.remove('no-transition');
                mainContent.classList.remove('no-transition');
                mainContent.classList.add('show');
            }, 50);

            function toggleSidebar() {
                sidebar.classList.toggle('show');
                sidebarBackdrop.classList.toggle('show');
                body.classList.toggle('sidebar-open');
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarBackdrop.addEventListener('click', toggleSidebar);

            // Handle page transitions
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Don't do this for active links
                    if (this.classList.contains('active')) return;
                    
                    // Store the current scroll position
                    const scrollPos = window.scrollY;
                    localStorage.setItem('scrollPosition', scrollPos);
                    
                    // Store sidebar state
                    localStorage.setItem('sidebarOpen', sidebar.classList.contains('show'));
                    
                    // Add animation for page transition
                    mainContent.classList.remove('show');
                    
                    // Small delay for the animation to be visible
                    setTimeout(() => {
                        // Continue with the navigation
                    }, 150);
                });
            });

            // Close sidebar when clicking on a link (for mobile)
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 991) {
                        toggleSidebar();
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', function () {
                if (window.innerWidth > 991) {
                    sidebar.classList.remove('show');
                    sidebarBackdrop.classList.remove('show');
                    body.classList.remove('sidebar-open');
                }
            });

            // Get current path and remove trailing slash if exists
            let currentPath = window.location.pathname;
            currentPath = currentPath.endsWith('/') ? currentPath.slice(0, -1) : currentPath;
            // If path is empty (root), set it to "/"
            currentPath = currentPath === '' ? '/' : currentPath;

            function setActiveLink() {
                // Remove active class from all links
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Find and set active link based on current path
                navLinks.forEach(link => {
                    const linkPath = link.getAttribute('data-path');
                    if (linkPath === currentPath) {
                        link.classList.add('active');
                    }
                });
            }

            // Set initial active state
            setActiveLink();
            
            // Restore scroll position if exists
            const savedScrollPosition = localStorage.getItem('scrollPosition');
            if (savedScrollPosition) {
                window.scrollTo(0, parseInt(savedScrollPosition));
                localStorage.removeItem('scrollPosition');
            }
            
            // Restore sidebar state if exists
            const savedSidebarOpen = localStorage.getItem('sidebarOpen');
            if (savedSidebarOpen === 'true' && window.innerWidth <= 991) {
                sidebar.classList.add('show');
                sidebarBackdrop.classList.add('show');
                body.classList.add('sidebar-open');
                localStorage.removeItem('sidebarOpen');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>