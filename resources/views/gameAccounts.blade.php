<x-layout>
    <div class="container-fluid">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1" style="font-weight: 600; color: #414141;">Game Accounts Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Admin Board</a></li>
                        <li class="breadcrumb-item active">Game Accounts</li>
                    </ol>
                </nav>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                    <i class="bi bi-plus-lg me-1"></i>Add New Account
                </button>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(13, 110, 253, 0.1)">
                                    <i class="bi bi-controller text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1" style="font-size: 0.875rem">Total Accounts</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($totalAccounts) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(25, 135, 84, 0.1)">
                                    <i class="bi bi-person-check text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1" style="font-size: 0.875rem">Active Accounts</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($activeAccounts) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(220, 53, 69, 0.1)">
                                    <i class="bi bi-person-dash text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1" style="font-size: 0.875rem">Inactive Accounts</p>
                                <h3 class="mb-0 fw-bold">{{ number_format($totalAccounts - $activeAccounts) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Search and Filter Section --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('admin.gameAccounts') }}" method="GET" id="filterForm">
                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" name="username" class="form-control border-start-0 ps-0" 
                                    placeholder="Search by username..." value="{{ request('username') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-toggle-on text-muted"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0" name="status">
                                    <option value="">All Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text" name="user_id" class="form-control border-start-0 ps-0" 
                                    placeholder="Filter by user ID..." value="{{ request('user_id') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    <i class="bi bi-funnel me-1"></i> Filter
                                </button>
                                <a href="{{ route('admin.gameAccounts') }}" class="btn btn-outline-secondary" title="Clear filters">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Game Accounts Table --}}
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 fw-bold">Game Account List</h5>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="showInactiveAccounts" checked>
                            <label class="form-check-label" for="showInactiveAccounts">Show Inactive Accounts</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle border-bottom">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th scope="col" class="ps-3">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Coins</th>
                                <th scope="col" class="text-end pe-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accounts as $index => $account)
                                <tr class="account-row {{ $account->active == 0 ? 'inactive-account' : '' }}">
                                    <td class="ps-3">{{ $accounts->firstItem() + $index }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                                style="width: 40px; height: 40px; border: 1px solid #e9ecef;">
                                                <i class="bi bi-person-badge text-primary"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-medium">{{ $account->username }}</h6>
                                                <small class="text-muted">ID: {{ $account->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($account->user)
                                            <a href="{{ route('users.search', ['search' => $account->user->username]) }}" class="text-decoration-none d-inline-flex align-items-center">
                                                <span class="me-1">{{ $account->user->username }}</span>
                                                <i class="bi bi-box-arrow-up-right text-muted small"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar3 text-secondary me-2 small"></i>
                                            {{ date('Y-m-d', $account->dateCreate) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($account->active == 1)
                                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                                <i class="bi bi-check-circle-fill me-1"></i> Active
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                                <i class="bi bi-x-circle-fill me-1"></i> Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-warning bg-opacity-10 p-1 me-2">
                                                <i class="bi bi-coin text-warning"></i>
                                            </div>
                                            <span class="fw-medium">{{ number_format($account->coin) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-end pe-3">
                                        <div class="d-flex gap-1 justify-content-end">
                                            <button class="btn btn-sm btn-outline-primary view-account" data-account-id="{{ $account->id }}" title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary edit-account" data-account-id="{{ $account->id }}" title="Edit Account">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if($account->active == 1)
                                                        <li>
                                                            <button class="dropdown-item text-danger toggle-status" 
                                                                data-account-id="{{ $account->id }}" 
                                                                data-status="deactivate">
                                                                <i class="bi bi-slash-circle me-2"></i>Deactivate
                                                            </button>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <button class="dropdown-item text-success toggle-status" 
                                                                data-account-id="{{ $account->id }}" 
                                                                data-status="activate">
                                                                <i class="bi bi-check-circle me-2"></i>Activate
                                                            </button>
                                                        </li>
                                                    @endif
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <button class="dropdown-item" onclick="resetPassword('{{ $account->id }}')">
                                                            <i class="bi bi-key me-2"></i>Reset Password
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="rounded-circle bg-light p-4 mb-3">
                                                <i class="bi bi-controller text-secondary" style="font-size: 3rem;"></i>
                                            </div>
                                            <h5 class="mb-2">No game accounts found</h5>
                                            <p class="text-muted mb-4">There are no game accounts matching your search criteria.</p>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAccountModal">
                                                <i class="bi bi-plus-lg me-1"></i>Add New Account
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                {{-- <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing <strong>{{ $accounts->firstItem() ?: 0 }}-{{ $accounts->lastItem() ?: 0 }}</strong> of <strong>{{ $accounts->total() }}</strong> accounts
                    </div>
                    <div>
                        {{ $accounts->links() }}
                    </div>
                </div> --}}

                <div class="card-footer border-0 bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">
                            Showing {{ $accounts->firstItem() ?? 0 }} to {{ $accounts->lastItem() ?? 0 }} of {{ $accounts->total() }} entries
                        </p>
                        <nav>
                            {{ $accounts->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- Add New Account Modal --}}
    <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="addAccountModalLabel">
                        <i class="bi bi-plus-circle me-2"></i>Add New Game Account
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="addAccountForm" action="{{ route('admin.account.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-text">Username must be unique and between 3-32 characters.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">Password must be at least 6 characters.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Owner (User ID)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-people"></i>
                                </span>
                                <input type="text" class="form-control" id="user_id" name="user_id">
                            </div>
                            <div class="form-text">Leave blank to assign to the system.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="initial_coins" class="form-label">Initial Coins</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-coin"></i>
                                </span>
                                <input type="number" class="form-control" id="initial_coins" name="initial_coins" value="0" min="0">
                            </div>
                        </div>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                            <label class="form-check-label" for="active">Account Active</label>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x me-1"></i>
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-lg me-1"></i>
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Loading Animation Overlay --}}
    <div id="loading-overlay" class="position-fixed d-none" style="top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); z-index: 9999; display: flex; justify-content: center; align-items: center;">
        <div class="text-center p-4 rounded-4 shadow-lg" style="background-color: #fff; max-width: 300px;">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h5 class="mt-4 mb-2">Processing</h5>
            <p class="text-muted mb-0">Please wait while we process your request...</p>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="accountDataToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <i class="bi bi-check-circle me-2"></i>
                <strong class="me-auto">Success</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-database-check me-2"></i> Account data loaded successfully!
            </div>
        </div>
    </div>
    
    {{-- Confirmation Modal --}}
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    <h5 class="mt-3 mb-3" id="confirmationMessage">Are you sure?</h5>
                    <p class="text-muted mb-0" id="confirmationDetails">This action cannot be undone.</p>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmActionBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animation for statistics cards */
        .stat-card {
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
        }
        
        .stat-card.animate {
            transform: translateY(0);
            opacity: 1;
        }
        
        /* Add hover effect */
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        /* Table row hover effect */
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }

        /* Inactive account styling */
        .inactive-account {
            background-color: rgba(0, 0, 0, 0.01);
        }

        /* Badge styling */
        .badge.rounded-pill {
            font-weight: 500;
            font-size: 0.75rem;
        }

        /* Button hover effects */
        .btn-outline-primary:hover {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-outline-secondary:hover {
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
        }

        .btn-outline-success:hover {
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }

        .btn-outline-danger:hover {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        /* Card hover effect */
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate statistics cards on page load
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate');
                }, 100 * (index + 1));
            });

            // Show/hide inactive accounts
            const showInactiveAccountsCheckbox = document.getElementById('showInactiveAccounts');
            const inactiveAccounts = document.querySelectorAll('.inactive-account');
            
            showInactiveAccountsCheckbox.addEventListener('change', function() {
                inactiveAccounts.forEach(row => {
                    if (this.checked) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // View account details
            const viewButtons = document.querySelectorAll('.view-account');
            const accountModalElement = document.getElementById('accountDetailModal');
            const accountDetailModal = new bootstrap.Modal(accountModalElement);
            const editAccountBtn = document.getElementById('editAccountBtn');
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const accountId = this.getAttribute('data-account-id');
                    fetchAccountDetails(accountId);
                    
                    // Update the edit button to open edit modal with correct ID
                    editAccountBtn.setAttribute('data-account-id', accountId);
                });
            });

            // Connect view modal's edit button to edit modal
            editAccountBtn.addEventListener('click', function() {
                const accountId = this.getAttribute('data-account-id');
                accountDetailModal.hide();
                setTimeout(() => {
                    showEditModal(accountId);
                }, 500);
            });

            // Edit account
            const editButtons = document.querySelectorAll('.edit-account');
            const editModalElement = document.getElementById('editAccountModal');
            const editAccountModal = new bootstrap.Modal(editModalElement);
            
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const accountId = this.getAttribute('data-account-id');
                    showEditModal(accountId);
                });
            });

            // Toggle password visibility in add account modal
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });

            // Toggle account status
            const toggleButtons = document.querySelectorAll('.toggle-status');
            const loadingOverlay = document.getElementById('loading-overlay');
            
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const accountId = this.getAttribute('data-account-id');
                    const action = this.getAttribute('data-status');
                    
                    if (confirm(`Are you sure you want to ${action} this account?`)) {
                        // Show loading overlay
                        loadingOverlay.classList.remove('d-none');
                        
                        // In a real implementation, you'd submit a form or make an AJAX request
                        // For demo purposes, we'll just simulate the request with a timeout
                        setTimeout(() => {
                            loadingOverlay.classList.add('d-none');
                            
                            // Show success toast
                            const toastBody = document.querySelector('.toast-body');
                            toastBody.innerHTML = `<i class="bi bi-check-circle-fill me-2 text-success"></i> Account successfully ${action}d!`;
                            
                            const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                            toast.show();
                            
                            // In a real implementation, you'd reload the page or update the UI
                        }, 1500);
                    }
                });
            });

            // Handle form submission with AJAX
            const addAccountForm = document.getElementById('addAccountForm');
            
            if (addAccountForm) {
                addAccountForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Show loading overlay
                    loadingOverlay.classList.remove('d-none');
                    
                    // Get form data
                    const formData = new FormData(this);
                    
                    // Add CSRF token
                    formData.append('_token', '{{ csrf_token() }}');
                    
                    // Convert checkbox value to boolean
                    formData.set('active', document.getElementById('active').checked ? '1' : '0');
                    
                    // Submit form via AJAX
                    fetch('{{ route('admin.account.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        loadingOverlay.classList.add('d-none');
                        
                        // Hide modal
                        const addAccountModal = bootstrap.Modal.getInstance(document.getElementById('addAccountModal'));
                        addAccountModal.hide();
                        
                        if (data.success) {
                            // Show success toast
                            const toastHeader = document.querySelector('.toast-header');
                            toastHeader.classList.remove('bg-danger');
                            toastHeader.classList.add('bg-success');
                            
                            const toastBody = document.querySelector('.toast-body');
                            toastBody.innerHTML = `<i class="bi bi-check-circle-fill me-2 text-success"></i> ${data.message}`;
                            
                            // Reload page to show the new account
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        } else {
                            // Show error toast
                            const toastHeader = document.querySelector('.toast-header');
                            toastHeader.classList.remove('bg-success');
                            toastHeader.classList.add('bg-danger');
                            
                            const toastHeaderContent = toastHeader.querySelector('strong');
                            toastHeaderContent.textContent = 'Error';
                            
                            const toastBody = document.querySelector('.toast-body');
                            toastBody.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i> ${data.message}`;
                        }
                        
                        const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                        toast.show();
                    })
                    .catch(error => {
                        loadingOverlay.classList.add('d-none');
                        
                        // Show error toast
                        const toastHeader = document.querySelector('.toast-header');
                        toastHeader.classList.remove('bg-success');
                        toastHeader.classList.add('bg-danger');
                        
                        const toastHeaderContent = toastHeader.querySelector('strong');
                        toastHeaderContent.textContent = 'Error';
                        
                        const toastBody = document.querySelector('.toast-body');
                        toastBody.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i> Failed to create account. Please try again.`;
                        
                        const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                        toast.show();
                        
                        console.error('Error:', error);
                    });
                });
            }

            // Function to reset password
            window.resetPassword = function(accountId) {
                if (confirm(`Are you sure you want to reset the password for account #${accountId}?`)) {
                    // Show loading overlay
                    loadingOverlay.classList.remove('d-none');
                    
                    // In a real implementation, you'd submit a request to an API endpoint
                    // For demo purposes, we'll just simulate the request with a timeout
                    setTimeout(() => {
                        loadingOverlay.classList.add('d-none');
                        
                        // Show success toast
                        const toastBody = document.querySelector('.toast-body');
                        toastBody.innerHTML = `<i class="bi bi-key-fill me-2 text-success"></i> Password reset successfully! New password: <strong>temp123</strong>`;
                        
                        const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                        toast.show();
                    }, 1500);
                }
            };

            // Function to fetch account details
            function fetchAccountDetails(accountId) {
                // Show loading state
                document.getElementById('accountModalBody').innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading account details...</p>
                    </div>
                `;
                
                accountDetailModal.show();
                
                // In a real implementation, you'd fetch data from an API endpoint
                // For now, we'll just simulate loading with a timeout
                setTimeout(() => {
                    // For demo purposes, we'll just show some placeholder content
                    document.getElementById('accountModalBody').innerHTML = `
                        <div class="text-center mb-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mx-auto"
                                style="width: 100px; height: 100px;">
                                <i class="bi bi-person-badge fs-1 text-primary"></i>
                            </div>
                            <h4 class="mt-3 mb-1">Account #${accountId}</h4>
                            <p class="text-muted">Created on 2023-01-01</p>
                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                <i class="bi bi-check-circle-fill me-1"></i> Active
                            </span>
                        </div>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm rounded-3">
                                    <div class="card-header bg-white border-0 pt-3">
                                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2 text-primary"></i>Account Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-person text-secondary me-2"></i>
                                                <span class="text-muted">Username</span>
                                            </div>
                                            <p class="mb-0 fw-medium">game_user_${accountId}</p>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-envelope text-secondary me-2"></i>
                                                <span class="text-muted">Email</span>
                                            </div>
                                            <p class="mb-0 fw-medium">user${accountId}@example.com</p>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-shield-lock text-secondary me-2"></i>
                                                <span class="text-muted">Last Password Change</span>
                                            </div>
                                            <p class="mb-0 fw-medium">2023-04-10</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm rounded-3">
                                    <div class="card-header bg-white border-0 pt-3">
                                        <h5 class="card-title mb-0"><i class="bi bi-bank me-2 text-primary"></i>Game Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-coin text-warning me-2"></i>
                                                <span class="text-muted">Coin Balance</span>
                                            </div>
                                            <p class="mb-0 fw-medium fs-5">1,500</p>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-clock-history text-secondary me-2"></i>
                                                <span class="text-muted">Last Login</span>
                                            </div>
                                            <p class="mb-0 fw-medium">2023-05-15</p>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-person-check text-secondary me-2"></i>
                                                <span class="text-muted">Owner</span>
                                            </div>
                                            <p class="mb-0 fw-medium">
                                                <a href="#" class="text-decoration-none">user123</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card border-0 shadow-sm rounded-3">
                                    <div class="card-header bg-white border-0 pt-3">
                                        <h5 class="card-title mb-0"><i class="bi bi-activity me-2 text-primary"></i>Recent Activity</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-4 py-3">
                                                <div>
                                                    <p class="mb-0 fw-medium">Login from 192.168.1.1</p>
                                                    <small class="text-muted">2023-05-15 14:30:22</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">Login</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-4 py-3">
                                                <div>
                                                    <p class="mb-0 fw-medium">Purchased 500 coins</p>
                                                    <small class="text-muted">2023-05-14 09:15:47</small>
                                                </div>
                                                <span class="badge bg-success rounded-pill">Purchase</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-4 py-3">
                                                <div>
                                                    <p class="mb-0 fw-medium">Password changed</p>
                                                    <small class="text-muted">2023-04-10 16:22:05</small>
                                                </div>
                                                <span class="badge bg-warning text-dark rounded-pill">Security</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    // Show toast notification
                    const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                    toast.show();
                }, 1000);
            }

            // Function to show edit modal
            function showEditModal(accountId) {
                // Show loading state
                document.getElementById('editAccountModalBody').innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading account details...</p>
                    </div>
                `;
                
                editAccountModal.show();
                
                // In a real implementation, you'd fetch data from an API endpoint
                // For now, we'll just simulate loading with a timeout
                setTimeout(() => {
                    // For demo purposes, we'll just show a form with placeholder values
                    document.getElementById('editAccountModalBody').innerHTML = `
                        <form id="editAccountForm">
                            <div class="mb-3">
                                <label for="edit_username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control" id="edit_username" value="game_user_${accountId}" readonly>
                                </div>
                                <small class="text-muted">Username cannot be changed</small>
                            </div>
                            <div class="mb-3">
                                <label for="edit_email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="edit_email" value="user${accountId}@example.com">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_status" class="form-label">Status</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-toggle-on"></i>
                                    </span>
                                    <select class="form-select" id="edit_status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_coins" class="form-label">Coin Balance</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-coin"></i>
                                    </span>
                                    <input type="number" class="form-control" id="edit_coins" value="1500">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_password" class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" class="form-control" id="edit_password" placeholder="Leave blank to keep current password">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleEditPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Only fill this if you want to change the password</small>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x me-1"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2 me-1"></i>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    `;
                    
                    // Toggle password visibility in edit modal
                    const toggleEditPasswordBtn = document.getElementById('toggleEditPassword');
                    const editPasswordInput = document.getElementById('edit_password');
                    
                    toggleEditPasswordBtn.addEventListener('click', function() {
                        const type = editPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        editPasswordInput.setAttribute('type', type);
                        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
                    });
                    
                    // Add form submission handler
                    document.getElementById('editAccountForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        
                        // Show loading overlay
                        loadingOverlay.classList.remove('d-none');
                        
                        // In a real implementation, you'd submit the form data to an API endpoint
                        // For demo purposes, we'll just simulate the request with a timeout
                        setTimeout(() => {
                            loadingOverlay.classList.add('d-none');
                            editAccountModal.hide();
                            
                            // Show success toast
                            const toastBody = document.querySelector('.toast-body');
                            toastBody.innerHTML = `<i class="bi bi-check-circle-fill me-2 text-success"></i> Account updated successfully!`;
                            
                            const toast = new bootstrap.Toast(document.getElementById('accountDataToast'));
                            toast.show();
                        }, 1500);
                    });
                }, 1000);
            }
        });
    </script>
</x-layout>
{{-- Account Detail Modal --}}
    <div class="modal fade" id="accountDetailModal" tabindex="-1" aria-labelledby="accountDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="accountDetailModalLabel">Account Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="accountModalBody">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading account details...</p>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Close
                    </button>
                    <button type="button" class="btn btn-primary" id="editAccountBtn">
                        <i class="bi bi-pencil me-1"></i> Edit Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Account Modal --}}
    <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="editAccountModalLabel">Edit Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="editAccountModalBody">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading account details...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
