<nav class="navbar navbar-expand-lg sticky-top" style="width: 100vw;background-color: white"
    style=" top: 0; right: 16px; z-index: 1030; height: 6vh; background-color: #ffffff;">
    <div class="container-fluid ">
        <button class="btn btn-warning" onclick="toggleSidebar()" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        <div class="d-flex align-items-center justify-content-end">
            <span class="me-3">{{auth()->user()->coin ?? ''}} <i class="bi bi-coin text-warning"></i></span>
            <div class="dropdown">
                <div class="d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" 
                         style="width: 35px; height: 35px;">
                        {{ strtoupper(substr(auth()->user()->username ?? 'U', 0, 1)) }}
                    </div>
                    <span>{{ auth()->user()->username ?? 'Username' }}</span>
                    <i class="bi bi-chevron-down ms-2"></i>
                </div>
                <ul class="dropdown-menu  dropdown-menu-end">
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