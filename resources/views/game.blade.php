@php
    $servers = [
        [
            'name' => 'Server Alpha',
            'status' => 'Online',
            'status_class' => 'success',
            'username' => 'john_doe_alpha',
            'coins' => '50,000'
        ],
        [
            'name' => 'Server Beta',
            'status' => 'Online',
            'status_class' => 'success',
            'username' => 'john_doe_beta',
            'coins' => '75,000'
        ],
        [
            'name' => 'Server Gamma',
            'status' => 'Offline',
            'status_class' => 'danger',
            'username' => 'john_doe_gamma',
            'coins' => '25,000'
        ],
        [
            'name' => 'Server Delta',
            'status' => 'Online',
            'status_class' => 'success',
            'username' => 'john_doe_delta',
            'coins' => '100,000'
        ],
        [
            'name' => 'Server Epsilon',
            'status' => 'Maintenance',
            'status_class' => 'warning',
            'username' => 'john_doe_epsilon',
            'coins' => '60,000'
        ],
        [
            'name' => 'Server Zeta',
            'status' => 'Online',
            'status_class' => 'success',
            'username' => 'john_doe_zeta',
            'coins' => '85,000'
        ]
    ];
@endphp

<x-layout>
    
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-gradient rounded-circle me-3"
                            style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-joystick text-white"></i>
                        </div>
                        <h2 class="fw-bold m-0">Game Servers</h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-yellow me-3" data-bs-toggle="modal" data-bs-target="#createServerModal">
                            <i class="bi bi-plus-circle me-1"></i>Create Server
                        </button>
                        <span class="badge bg-success me-2">
                            <i class="bi bi-circle-fill me-1"></i>4 Online
                        </span>
                        <span class="badge bg-danger me-2">
                            <i class="bi bi-circle-fill me-1"></i>1 Offline
                        </span>
                        <span class="badge bg-warning">
                            <i class="bi bi-circle-fill me-1"></i>1 Maintenance
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-body p-3">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light border-0"
                                        placeholder="Search servers...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select bg-light border-0">
                                    <option value="">All Statuses</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select bg-light border-0">
                                    <option value="">Sort By</option>
                                    <option value="name">Server Name</option>
                                    <option value="coins">Coins (High to Low)</option>
                                    <option value="status">Status</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-yellow w-100">
                                    <i class="bi bi-funnel me-1"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Server Cards Grid -->
        <div class="row g-3">
            @foreach($servers as $server)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-lg border-0 h-100" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-header border-0 p-3" style="background: linear-gradient(45deg, #6c5ce7, #3498db);">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white p-2 rounded-circle me-2"
                                        style="width: 50px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-server text-primary"></i>
                                    </div>
                                    <h6 class="card-title fw-bold text-white mb-0">{{ $server['name'] }}</h6>
                                </div>
                                <span class="badge bg-{{ $server['status_class'] }}">{{ $server['status'] }}</span>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-person-circle text-primary me-2"></i>
                                    <p class="text-muted mb-0 small">Username</p>
                                </div>
                                <h6 class="fw-bold">{{ $server['username'] }}</h6>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-coin text-warning me-2"></i>
                                    <p class="text-muted mb-0 small">Coins Available</p>
                                </div>
                                <h5 class="fw-bold text-primary">{{ $server['coins'] }} <small
                                        class="text-muted fw-normal">coins</small></h5>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-yellow btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#transferModal">
                                    <i class="bi bi-arrow-left-right me-1"></i>Transfer
                                </button>
                                <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">
                                    <i class="bi bi-key me-1"></i>Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
    <style>
        .btn-yellow {
            background-color: #ffd32a;
            border: none;
            color: #2d3436;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-yellow:hover {
            background-color: #ffc107;
            transform: translateY(-2px);
            color: #2d3436;
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .form-control,
        .form-select {
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border-radius: 10px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            border-color: #6c5ce7;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.8);
            transition: transform 0.3s ease-in-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(button) {
            const input = button.parentElement.querySelector('input');
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
</x-layout>
<!-- Transfer Modal -->
<div class="modal fade" id="transferModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 bg-primary bg-gradient p-4"
                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                <h5 class="modal-title fw-bold text-white">
                    <i class="bi bi-arrow-left-right me-2"></i>Transfer Coins
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    {{-- <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-server me-2"></i>From Server
                        </label>
                        <select class="form-select form-select-lg bg-light border-0">
                            <option>Server Alpha</option>
                            <option>Server Beta</option>
                        </select>
                    </div> --}}
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label class="form-label">
                                <i class="bi bi-person-circle me-2" style="color: #2e7eff"></i>Account
                            </label>
                            <h3>John Doe</h3>
                        </div>
                        <div>
                            <label class="form-label">
                                <i class="bi bi-server me-2" style="color: #2e7eff"></i>Server
                            </label>
                            <h5>Server Beta</h5>
                        </div>
                        {{-- <select class="form-select form-select-lg bg-light border-0">
                            <option>Server Beta</option>
                            <option>Server Alpha</option>
                        </select> --}}
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-coin me-2" style="color: #2e7eff"></i>Amount
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="number" class="form-control bg-light border-0" placeholder="Enter amount">
                            <span class="input-group-text bg-light border-0">coins</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-server me-2" style="color: #2e7eff"></i>Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required>
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-yellow btn-lg px-4">Transfer</button>
            </div>
        </div>
    </div>
</div>
<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 bg-primary bg-gradient p-4"
                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                <h5 class="modal-title fw-bold text-white">
                    <i class="bi bi-key me-2"></i>Change Game Password
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    {{-- <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-server me-2"></i>Select Server
                        </label>
                        <select class="form-select form-select-lg bg-light border-0">
                            <option>Server Alpha</option>
                            <option>Server Beta</option>
                        </select>
                    </div> --}}
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label class="form-label">
                                <i class="bi bi-person-circle me-2" style="color: #2e7eff"></i>Account
                            </label>
                            <h3>John Doe</h3>
                        </div>
                        <div>
                            <label class="form-label">
                                <i class="bi bi-server me-2" style="color: #2e7eff"></i>Server
                            </label>
                            <h5>Server Beta</h5>
                        </div>
                        {{-- <select class="form-select form-select-lg bg-light border-0">
                            <option>Server Beta</option>
                            <option>Server Alpha</option>
                        </select> --}}
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock me-2" style="color: #2e7eff"></i>Current Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required>
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-key me-2" style="color: #2e7eff"></i>New Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required>
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-check-double me-2" style="color: #2e7eff"></i>Confirm New Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required>
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-yellow btn-lg px-4">Update Password</button>
            </div>
        </div>
    </div>
</div>
<!-- Create Server Modal -->
<div class="modal fade" id="createServerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 bg-primary bg-gradient p-4"
                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                <h5 class="modal-title fw-bold text-white">
                    <i class="bi bi-plus-circle me-2"></i>Create New Game Server
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-server me-2"></i>Server Type
                        </label>
                        <select class="form-select form-select-lg bg-light border-0" required>
                            <option value="">Select Server Type</option>
                            <option value="alpha">Alpha Server</option>
                            <option value="beta">Beta Server</option>
                            <option value="gamma">Gamma Server</option>
                            <option value="delta">Delta Server</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-person me-2"></i>Username
                        </label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" required
                            placeholder="Enter username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock me-2"></i>Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required
                                placeholder="Enter password">
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-check-double me-2"></i>Confirm Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" required
                                placeholder="Confirm password">
                            <button class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-yellow btn-lg px-4">Create Server</button>
            </div>
        </div>
    </div>
</div>