@php
    $servers = $accounts;
@endphp


<x-layout>
    <x-loading-animation />
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    {{-- <div class="bg-primary bg-gradient rounded-circle me-3"
                        style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-joystick text-white"></i>
                    </div> --}}
                    <h2 class="fw-bold m-0">Game Accounts</h2>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-yellow me-3" data-bs-toggle="modal" data-bs-target="#createServerModal">
                        <i class="bi bi-plus-circle me-2"></i>Create Game Account 
                    </button>
                    {{-- <span class="badge bg-success me-2">
                        <i class="bi bi-circle-fill me-1"></i>4 Online
                    </span>
                    <span class="badge bg-danger me-2">
                        <i class="bi bi-circle-fill me-1"></i>1 Offline
                    </span>
                    <span class="badge bg-warning">
                        <i class="bi bi-circle-fill me-1"></i>1 Maintenance
                    </span> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="shadow-none border-0" style="border-radius: 15px;">
                <div class="card-body p-2 px-0 pb-0">
                    <div class="row g-3 justify-content-between align-items-center">
                        <div class="col-md-4 " style="font-size: 22px" >
                            <p>Total: {{ count($accounts) }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-0"
                                    placeholder="Search accounts..." id="searchInput">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Server Cards Grid -->
    <div class="row g-3 mt-0">
        @foreach ($servers as $server)
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 card-privilege">
                    <div class="card-header rounded-lg border-0 p-2" style="background: linear-gradient(45deg, #6c5ce7, #3498db);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center p-2">
                                {{-- <div class="bg-white p-2 rounded-circle me-2"
                                    style="width: 50px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-server text-primary"></i>
                                </div> --}}
                                {{-- <h6 class="card-title fw-bold text-white mb-0">{{ $server['name'] }}</h6> --}}
                            </div>
                            {{-- <span class="badge bg-{{ $server['status_class'] }}">{{ $server['status'] }}</span> --}}
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="mb-3">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div class="d-flex">
                                    <i class="bi bi-person-circle text-primary me-2 mb-1"></i>
                                    {{-- <p class="text-muted mb-0 small">Username</p> --}}
                                    <h6 class="fw-bold">{{ strtoupper($server['username']) }}</h6>
                                </div>
                                <div class="mb-3">
                                    {{-- <div class="d-flex align-items-start mb-2 justify-content-end">
                                    </div> --}}
                                    <h5 class="fw-bold text-primary text-end">
                                        
                                        <i class="bi bi-coin text-warning me-2"></i>
                                        {{ $server['coin'] }} 
                                        <small class="text-muted fw-normal">
                                            Coins
                                        </small></h5>
                                </div>

                            </div>
                        </div>

                        <div>

                            <div class="d-flex gap-2">
                                
                                <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal"
                                    data-account-id="{{ $server['id'] }}"
                                    data-username="{{ $server['username'] }}"
                                    >
                                    <i class="bi bi-key me-1"></i>Change Password
                                </button>
                                <button class="col-md-6 btn btn-yellow btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#transferModal"
                                    data-account-id="{{ $server['id'] }}"
                                    data-username="{{ $server['username'] }}">
                                    <i class="bi bi-arrow-left-right me-1"></i>Transfer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</x-layout>
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
                <form action="/createAccount" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">
                            <i class="bi bi-person me-2 text-primary"></i>Username
                        </label>
                        <input type="text" name="username" class="form-control form-control-lg bg-white border @error('username') is-invalid @enderror"
                            required placeholder="Enter username" value="{{ old('username') }}">
                        <small class="text-muted">Username must be between 3-32 characters and unique.</small>
                        @error('username')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">
                            <i class="bi bi-lock me-2 text-primary"></i>Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="password" class="form-control bg-white border @error('password') is-invalid @enderror" required
                                placeholder="Enter password">
                            <span class="btn btn-outline-secondary border" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye text-primary"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">
                            <i class="bi bi-lock me-2 text-primary"></i>Confirm Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="password_confirmation" class="form-control bg-white border @error('password_confirmation') is-invalid @enderror" required
                                placeholder="Confirm password">
                            <span class="btn btn-outline-secondary border" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye text-primary"></i>
                            </span>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">
                            <i class="bi bi-shield-lock me-2 text-primary"></i>Captcha
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ route('captcha.generate') }}" alt="Captcha" id="createAccountCaptchaImage"
                                style="height: 40px; cursor: pointer; border-radius: 4px; border: 1px solid #dee2e6" onclick="refreshCreateAccountCaptcha()">
                            <input type="text" name="captcha" class="form-control bg-white border @error('captcha') is-invalid @enderror" id="createAccountCaptcha"
                                placeholder="Enter captcha" required>
                        </div>
                        @error('captcha')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer border-0 py-2">
                        <button type="button" class="btn  btn-lg px-4"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-lg pl-4">Create Account</button>
                    </div>
                </form>
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
                <form action="{{ route('changeAccountPassword') }}" method="POST" id="changePasswordForm" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="account_id" id="modalAccountId">
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label class="form-label">
                                <i class="bi bi-person-circle me-2" style="color: #2e7eff"></i>Account
                            </label>
                            <h3 id="modalUsername"></h3>
                        </div>
                        <div>
                            <label class="form-label">
                                <i class="bi bi-server me-2" style="color: #2e7eff"></i>Server
                            </label>
                            {{-- <h5 id="modalServerId"></h5> --}}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock me-2" style="color: #2e7eff"></i>Current Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="current_password" class="form-control bg-light border-0" required>
                            <span class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-key me-2" style="color: #2e7eff"></i>New Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="new_password" id="newPassword" class="form-control bg-light border-0" required 
                                pattern=".{6,}" title="At least 6 characters">
                            <span class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </span>
                        </div>
                        
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-check-double me-2" style="color: #2e7eff"></i>Confirm New Game Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="confirm_password" id="confirmPassword" class="form-control bg-light border-0" required>
                            <span class="btn btn-light border-0" type="button" onclick="togglePassword(this)">
                                <i class="bi bi-eye" style="color: #2e7eff"></i>
                            </span>
                        </div>
                        <div id="passwordMatch" class="invalid-feedback">
                            Passwords do not match
                        </div>
                    </div>
                    {{-- <div class="password-requirements mt-2">
                            <small class="text-muted">New password must contain:</small>
                            <ul class="list-unstyled mb-0">
                                <li id="length" class="text-danger"><i class="bi bi-x-circle"></i> At least 8 characters</li>
                                <li id="uppercase" class="text-danger"><i class="bi bi-x-circle"></i> One uppercase letter</li>
                                <li id="lowercase" class="text-danger"><i class="bi bi-x-circle"></i> One lowercase letter</li>
                                <li id="number" class="text-danger"><i class="bi bi-x-circle"></i> One number</li>
                                <li id="special" class="text-danger"><i class="bi bi-x-circle"></i> One special character</li>
                            </ul>
                        </div> --}}
                    <div class="modal-footer border-0 p-4">
                        <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-yellow btn-lg px-4" id="submitPassword">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Transfer Modal -->
<div class="modal fade" id="transferModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 p-4" style="background: linear-gradient(45deg, #6c5ce7, #3498db);">
                <h5 class="modal-title fw-bold text-white d-flex align-items-center">
                    <i class="bi bi-arrow-left-right me-2"></i>Transfer Coins
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('transfer.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <!-- Account Info Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-person-circle fs-5" style="color: #6c5ce7"></i>
                                        <label class="form-label mb-0">From Account</label>
                                    </div>
                                    <h4 class="mb-0">{{ Auth::user()->username }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 bg-light h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-coin fs-5" style="color: #6c5ce7"></i>
                                        <label class="form-label mb-0">Available Coins</label>
                                    </div>
                                    <h4 class="mb-0">{{ number_format(Auth::user()->coin) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transfer Form -->
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body p-3">
                            <div class="mb-3 d-none">
                                <label class="form-label d-flex align-items-center gap-2">
                                    <i class="bi bi-person fs-5" style="color: #6c5ce7"></i>
                                    To Account
                                </label>
                                <input  type="number" name="to_account" id="modalToAccount" class="form-control form-control-lg border-0"
                                    required placeholder="Enter recipient account ID">
                                <small class="text-muted" id="modalToAccountInfo"></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label d-flex align-items-center gap-2">
                                    <i class="bi bi-person fs-5" style="color: #6c5ce7"></i>
                                    To Account
                                </label>
                                <input disabled name="to_account_username" id="modalToAccountUsername" class="form-control form-control-lg border-0"
                                    required placeholder="Enter recipient account ID">
                                <small class="text-muted" id="modalToAccountInfoUsername"></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label d-flex align-items-center gap-2">
                                    <i class="bi bi-coin fs-5" style="color: #6c5ce7"></i>
                                    Amount
                                    
                                </label>
                                <div class="input-group input-group-lg">
                                    <input type="number" name="coin" class="form-control border-0"
                                        placeholder="Enter amount" required min="1"
                                        max="{{ Auth::user()->coin }}" oninput="validateAmount(this)">
                                    <span class="input-group-text border-0 bg-white">coins</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small class="text-muted">Available: {{ number_format(Auth::user()->coin) }}
                                        coins</small>
                                    <button type="button" class="btn btn-link btn-sm p-0"
                                        onclick="setMaxAmount()">Use Max</button>
                                </div>
                                {{-- <span class="badge bg-success" id="x2Badge">
                                    <i class="bi bi-lightning-fill me-1"></i>2X Coins: <span id="x2Amount">0</span>
                                </span> --}}
                            </div>
                            {{-- <div>
                                <label class="form-label d-flex align-items-center gap-2">
                                    <i class="bi bi-lock fs-5" style="color: #6c5ce7"></i>
                                    Your Password
                                </label>
                                <div class="input-group input-group-lg">
                                    <input type="password" name="password" class="form-control border-0" required>
                                    <button class="btn btn-white border-0" type="button"
                                        onclick="togglePassword(this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-light btn-lg flex-grow-1" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary btn-lg flex-grow-1" id="transferButton"
                            style="background: linear-gradient(45deg, #6c5ce7, #3498db);">
                            <i class="bi bi-arrow-left-right me-2"></i>Transfer
                            <span class="spinner-border spinner-border-sm ms-1 d-none" id="transferSpinner" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateAmount(input) {
        const maxAmount = {{ Auth::user()->coin }};
        if (parseInt(input.value) > maxAmount) {
            input.value = maxAmount;
        }
        updateX2Amount(input.value);
    }

    function setMaxAmount() {
        const input = document.querySelector('input[name="coin"]');
        input.value = {{ Auth::user()->coin }};
        updateX2Amount(input.value);
    }

    function updateX2Amount(amount) {
        const doubledAmount = amount * 2;
        document.getElementById('x2Amount').textContent = new Intl.NumberFormat().format(doubledAmount);
    }

    // Add search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.card-privilege');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            cards.forEach(card => {
                const username = card.querySelector('h6.fw-bold').textContent.toLowerCase();
                const parentCol = card.closest('.col-md-4');
                
                if (username.includes(searchTerm)) {
                    parentCol.style.display = '';
                } else {
                    parentCol.style.display = 'none';
                }
            });
        });
    });
</script>




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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newPassword = document.getElementById('newPassword');
        const confirmPassword = document.getElementById('confirmPassword');
        const form = document.getElementById('changePasswordForm');
        const submitButton = document.getElementById('submitPassword');

        // Password validation requirements
        const requirements = {
            length: /.{6,}/
        };

        // Update requirement indicators
        function updateRequirements(password) {
            for (const [requirement, regex] of Object.entries(requirements)) {
                const element = document.getElementById(requirement);
                if (!element) continue;
                if (regex.test(password)) {
                    element.classList.remove('text-danger');
                    element.classList.add('text-success');
                    const icon = element.querySelector('i');
                    if (icon) {
                        icon.classList.remove('bi-x-circle');
                        icon.classList.add('bi-check-circle');
                    }
                } else {
                    element.classList.remove('text-success');
                    element.classList.add('text-danger');
                    const icon = element.querySelector('i');
                    if (icon) {
                        icon.classList.remove('bi-check-circle');
                        icon.classList.add('bi-x-circle');
                    }
                }
            }
        }

        // Check if passwords match
        function checkPasswordMatch() {
            if (newPassword.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords don't match");
                document.getElementById('passwordMatch').style.display = 'block';
            } else {
                confirmPassword.setCustomValidity('');
                document.getElementById('passwordMatch').style.display = 'none';
            }
        }

        // Event listeners
        newPassword.addEventListener('input', function() {
            updateRequirements(this.value);
            checkPasswordMatch();
        });

        confirmPassword.addEventListener('input', checkPasswordMatch);

        // Form submission validation
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            // Check if all requirements are met
            const allRequirementsMet = Object.values(requirements).every(regex => regex.test(newPassword.value));
            if (!allRequirementsMet) {
                e.preventDefault();
                showNotification('error', 'Please ensure the password has at least 6 characters.');
            }
        });

        form.classList.add('was-validated');

        // Add modal data handling
        const changePasswordModal = document.getElementById('changePasswordModal');
        changePasswordModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const accountId = button.getAttribute('data-account-id');
            const username = button.getAttribute('data-username');

            // Update modal fields
            document.getElementById('modalAccountId').value = accountId;
            document.getElementById('modalUsername').textContent = username;
            document.getElementById('modalServerId').textContent = 'Server ' + accountId;
        });

        // Reset form when modal is closed
        changePasswordModal.addEventListener('hidden.bs.modal', function() {
            const form = document.getElementById('changePasswordForm');
            form.reset();
            // Reset validation state
            form.classList.remove('was-validated');
            // Hide password match error message
            document.getElementById('passwordMatch').style.display = 'none';
            // Reset any custom validation messages
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.setCustomValidity('');
            });
        });

        // Add modal data handling for transfer modal
        const transferModal = document.getElementById('transferModal');
        transferModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const accountId = button.getAttribute('data-account-id');
            const username = button.getAttribute('data-username');

            // Update modal fields
            document.getElementById('modalToAccount').value = accountId;
            document.getElementById('modalToAccountUsername').value = username;
            document.getElementById('modalToAccountInfo').textContent = 'Account ID: ' + accountId + ' (' + username + ')';
        });
        
        // Handle transfer form submission with loading animation
        const transferForm = document.querySelector('#transferModal form');
        const transferButton = document.getElementById('transferButton');
        const transferSpinner = document.getElementById('transferSpinner');
        
        transferForm.addEventListener('submit', function() {
            // Show loading spinner
            transferSpinner.classList.remove('d-none');
            
            // Disable button to prevent multiple submissions
            transferButton.disabled = true;
            transferButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing...';
            
            // Form will submit normally
        });
        // Show toast notifications for server-side messages
        @if (session('success'))
            showNotification('success', @json(session('success')));
        @endif
        @if (session('error'))
            showNotification('error', @json(session('error')));
            // Keep the create account modal open on error
            try {
                const createServerModalEl = document.getElementById('createServerModal');
                if (createServerModalEl) {
                    const modal = new bootstrap.Modal(createServerModalEl);
                    modal.show();
                }
            } catch (e) {
                // no-op
            }
        @endif
    });
</script>

<script>
    function refreshCreateAccountCaptcha() {
        const captchaImage = document.getElementById('createAccountCaptchaImage');
        captchaImage.src = "{{ route('captcha.generate') }}?" + new Date().getTime();
    }
</script>

<script>
    // Simple toast-like notification helper
    function showNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
        notification.style.zIndex = '2000';
        notification.style.minWidth = '280px';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.classList.remove('show');
            notification.addEventListener('transitionend', () => notification.remove());
        }, 5000);
    }

    // Check for validation errors and show modal if needed
    @if($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            const createServerModal = new bootstrap.Modal(document.getElementById('createServerModal'));
            createServerModal.show();
        });
    @endif

    // Reset create server form when modal is closed
    const createServerModal = document.getElementById('createServerModal');
    createServerModal.addEventListener('hidden.bs.modal', function() {
        const form = this.querySelector('form');
        form.reset();
        // Reset validation state
        form.classList.remove('was-validated');
        // Reset any custom validation messages
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.setCustomValidity('');
        });
        // Refresh captcha
        refreshCreateAccountCaptcha();
    });
</script>

</body>
</html>
