<x-layout>
    {{-- Add SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container-fluid">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1" style="font-weight: 600; color: #414141;">Users Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Admin Board</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="bi bi-plus-lg me-1"></i>
                Add New User
            </button>
        </div>

        {{-- Search and Filter Section --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('users.search') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" name="search" class="form-control border-start-0 ps-0" 
                                    placeholder="Search by username or email..." id="searchInput" value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-12 col-md-8">
                            <div class="d-flex gap-2 justify-content-md-end">
                                <select class="form-select w-auto" name="status">
                                    <option value="">All Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="bi bi-funnel me-1"></i>
                                    Filter
                                </button>
                                {{-- <button type="button" class="btn btn-outline-secondary">
                                    <i class="bi bi-download me-1"></i>
                                    Export
                                </button> --}}
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Users Table --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Role</th> --}}
                                <th scope="col">Phone</th>
                                <th scope="col">Coins</th>
                                <th scope="col">Status</th>
                                <th scope="col">Role</th>
                                <th scope="col" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $user->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                                style="width: 40px; height: 40px;">
                                                @if($user->avatar)
                                                    <img src="{{ $user->avatar }}" alt="{{ $user->username }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <i class="bi bi-person text-secondary"></i>
                                                @endif
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="text-muted">{{'@'.$user->username }}</h6>
                                                {{-- <small class="mb-0">{{ $user->full_name ?: 'User' }}</small> --}}
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>{{ $user->role ?: 'N/A' }}</td> --}}
                                    <td>{{ $user->phoneNumber ?: 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-coin text-warning me-1"></i>
                                            {{ number_format($user->coin, 0) }}

                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = [
                                                'active' => 'bg-success',
                                                'pending' => 'bg-warning',
                                                'suspended' => 'bg-danger',
                                                'inactive' => 'bg-secondary',
                                            ][$user->status ?? 'inactive'];
                                        @endphp
                                        <span class="badge {{ $statusClass }}">{{ ucfirst($user->status ?? 'Inactive') }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $roleClass = match(strtolower($user->role ?? 'user')) {
                                                'admin' => 'bg-danger',
                                                'moderator' => 'bg-info',
                                                'staff' => 'bg-primary',
                                                default => 'bg-secondary',
                                            };
                                        @endphp
                                        <span class="badge {{ $roleClass }}">{{ ucfirst($user->role ?? 'User') }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" title="View" data-user-id="{{ $user->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                                            <h5 class="mt-3">No users found</h5>
                                            <p class="text-muted mb-0">There are no users matching your search criteria.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                                
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        @if(isset($filteredCount))
                            Showing <strong>{{ $users->firstItem() ?: 0 }}-{{ $users->lastItem() ?: 0 }}</strong> of <strong>{{ $filteredCount }}</strong> filtered users (Total: {{ $totalUsers }})
                        @else
                            Showing <strong>{{ $users->firstItem() ?: 0 }}-{{ $users->lastItem() ?: 0 }}</strong> of <strong>{{ $totalUsers }}</strong> users
                        @endif
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    {{-- Add JavaScript for search functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkbox functionality
            const selectAllCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('tbody .form-check-input');

            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // User detail view functionality
            const viewButtons = document.querySelectorAll('.btn-outline-primary[title="View"]');
            const userModalElement = document.getElementById('userDetailModal');
            const userDetailModal = new bootstrap.Modal(userModalElement);
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');
                    fetchUserDetails(userId);
                });
            });

            
            function fetchUserDetails(userId) {
                // Show loading state in modal
                showLoadingInModal();
                userDetailModal.show();
                
                fetch(`/api/users/${userId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        populateUserModal(data);
                        // showUserDataToast();
                    })
                    .catch(error => {
                        console.error('Error fetching user details:', error);
                        document.getElementById('userModalBody').innerHTML = `
                            <div class="alert alert-danger text-center">
                                <i class="bi bi-exclamation-triangle-fill fs-1 mb-3 d-block"></i>
                                <h5>Failed to load user details</h5>
                                <p>Please try again later or contact support.</p>
                            </div>
                        `;
                    });
            }
            
            function showLoadingInModal() {
                document.getElementById('userModalBody').innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h5 class="mt-3">Loading user data...</h5>
                        <p class="text-muted">Please wait while we fetch the latest information</p>
                    </div>
                `;
                
                // Reset modal title and other elements
                document.getElementById('userModalName').textContent = 'Loading...';
                document.getElementById('userModalUsername').textContent = '';
                document.getElementById('userModalStatus').innerHTML = '';
                document.querySelector('#userModalAvatar').innerHTML = `
                    <div class="spinner-grow text-secondary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                `;
            }
            
            function populateUserModal(response) {
                // Extract user data from response
                const user = response.data || response;
                
                // Set user data in modal header
                document.getElementById('userModalName').textContent = user.full_name || user.username || 'User';
                document.getElementById('userModalUsername').textContent = '@' + user.username;
                
                // Set status with appropriate badge
                const statusBadgeClass = {
                    'active': 'bg-success',
                    'pending': 'bg-warning',
                    'suspended': 'bg-danger',
                    'inactive': 'bg-secondary'
                }[user.status] || 'bg-secondary';
                
                document.getElementById('userModalStatus').innerHTML = 
                    `<span class="badge rounded-pill ${statusBadgeClass} px-3 py-2">${user.status ? user.status.charAt(0).toUpperCase() + user.status.slice(1) : 'Inactive'}</span>`;
                
                // Set user avatar
                const avatarContainer = document.querySelector('#userModalAvatar');
                if (user.avatar) {
                    avatarContainer.innerHTML = `<img src="${user.avatar}" alt="${user.username}" class="rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">`;
                } else {
                    avatarContainer.innerHTML = `<i class="bi bi-person fs-1 text-secondary"></i>`;
                }
                
                // Add dynamic header background color based on status
                const headerBg = document.querySelector('#userModalHeader > div:first-child');
                headerBg.className = headerBg.className.replace(/bg-\w+/, 'bg-light'); // Reset background
                
                if (user.status === 'active') {
                    headerBg.classList.add('bg-success-subtle');
                } else if (user.status === 'pending') {
                    headerBg.classList.add('bg-warning-subtle');
                } else if (user.status === 'suspended' || user.status === 'inactive') {
                    headerBg.classList.add('bg-danger-subtle');
                }
                
                // Set edit button data attribute
                const editBtn = document.getElementById('editUserBtn');
                editBtn.setAttribute('data-user-id', user.id);
                
                // Create user details content
                const modalBody = document.getElementById('userModalBody');
                
                // Format date
                const joinedDate = new Date(user.created_at).toLocaleDateString('en-US', { 
                    year: 'numeric', month: 'short', day: 'numeric' 
                });
                
                modalBody.innerHTML = `
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white border-0 pt-3">
                                <h5 class="card-title mb-0"><i class="bi bi-person-vcard me-2 text-primary"></i>Personal Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-envelope text-secondary me-2"></i>
                                        <span class="text-muted">Email</span>
                                    </div>
                                    <p class="mb-0 fw-medium">${user.email || 'N/A'}</p>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-telephone text-secondary me-2"></i>
                                        <span class="text-muted">Phone</span>
                                    </div>
                                    <p class="mb-0 fw-medium">${user.phoneNumber || 'N/A'}</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt text-secondary me-2"></i>
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <p class="mb-0 fw-medium">${user.address || 'N/A'}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Account Information -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white border-0 pt-3">
                                <h5 class="card-title mb-0"><i class="bi bi-bank me-2 text-primary"></i>Account Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-coin text-warning me-2"></i>
                                        <span class="text-muted">Coin Balance</span>
                                    </div>
                                    <p class="mb-0 fw-medium fs-5">${Number(user.coin || 0).toLocaleString()}</p>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-shield-check text-secondary me-2"></i>
                                        <span class="text-muted">Role</span>
                                    </div>
                                    <p class="mb-0 fw-medium">${user.role ? user.role.charAt(0).toUpperCase() + user.role.slice(1) : 'User'}</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event text-secondary me-2"></i>
                                        <span class="text-muted">Joined Date</span>
                                    </div>
                                    <p class="mb-0 fw-medium">${joinedDate}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Transaction History (if available) -->
                    ${user.transactions && user.transactions.length > 0 ? `
                    <div class="col-12 mt-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white border-0 pt-3">
                                <h5 class="card-title mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>Recent Transactions</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${user.transactions.slice(0, 3).map(tx => `
                                                <tr>
                                                    <td>${new Date(tx.created_at).toLocaleDateString()}</td>
                                                    <td>${tx.type || 'Purchase'}</td>
                                                    <td>${Number(tx.coin || 0).toLocaleString()} coins</td>
                                                    <td>
                                                        <span class="badge bg-${tx.status === 'approved' ? 'success' : tx.status === 'pending' ? 'warning' : 'secondary'}">
                                                            ${tx.status ? tx.status.charAt(0).toUpperCase() + tx.status.slice(1) : 'N/A'}
                                                        </span>
                                                    </td>
                                                </tr>
                                            `).join('')}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    ` : ''}
                `;
            }
            
            // Initialize edit button event listener once
            document.getElementById('editUserBtn').addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                // You can redirect to an edit page or open another modal for editing
                // For now, we'll just alert
                // alert(`Edit user with ID: ${userId}`);

            });
        });
    </script>
</x-layout>


{{-- User Detail Modal --}}
<div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold" id="userDetailModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- User Profile Header -->
                <div class="text-center mb-4 position-relative" id="userModalHeader">
                    <div class="bg-light py-5 rounded-3 mb-4 position-relative">
                        <div class="rounded-circle bg-white shadow d-flex align-items-center justify-content-center position-absolute mx-auto" 
                             style="width: 100px; height: 100px; left: 0; right: 0; bottom: -50px; border: 3px solid white;">
                            <div id="userModalAvatar">
                                <i class="bi bi-person fs-1 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <h3 id="userModalName" class="mt-5 mb-1">User Name</h3>
                    <p class="text-muted" id="userModalUsername">@username</p>
                    <div id="userModalStatus" class="mb-3"><span class="badge rounded-pill bg-success px-3 py-2">Active</span></div>
                </div>
                
                <!-- User Details -->
                <div class="row g-4" id="userModalBody">
                    <!-- This content will be replaced by JavaScript -->
                </div>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i> Close
                </button>
                <button type="button" class="btn btn-primary" id="editUserBtn">
                    <i class="bi bi-pencil me-1"></i> Edit User
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Toast Notification --}}
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="userDataToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="bi bi-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <small>Just now</small>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <i class="bi bi-database-check me-2"></i> User data loaded successfully!
        </div>
    </div>
</div>

<script>
    // Function to show toast notification
    function showUserDataToast() {
        const toast = new bootstrap.Toast(document.getElementById('userDataToast'));
        toast.show();
    }
</script>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="createUserForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="createUserErrors" class="alert alert-danger d-none"></div>
                    <div class="mb-3">
                        <label for="createUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="createUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="createPassword" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="createPassword" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="createEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="createEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="createPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="createPhone" name="phoneNumber">
                    </div>
                    <div class="mb-3">
                        <label for="createRole" class="form-label">Role</label>
                        <select class="form-select" id="createRole" name="role" required>
                            <option value="user">User</option>
                            <option value="gm">GM</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    // Create User AJAX
    const createUserForm = document.getElementById('createUserForm');
    const createUserErrors = document.getElementById('createUserErrors');
    if (createUserForm) {
        createUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            createUserErrors.classList.add('d-none');
            createUserErrors.innerHTML = '';
            const formData = new FormData(createUserForm);
            fetch('/admin/users', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                if (!response.ok) {
                    const data = await response.json();
                    if (data.errors) {
                        createUserErrors.classList.remove('d-none');
                        createUserErrors.innerHTML = Object.values(data.errors).map(errs => errs.join('<br>')).join('<br>');
                    }
                    throw new Error('Validation failed');
                }
                return response.json();
            })
            .then(data => {
                // Success: close modal, reload or update table
                const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createUserModal'));
                modal.hide();
                location.reload();
            })
            .catch(error => {
                // Already handled above
            });
        });
    }
});
</script>

