<x-layout>
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
            <button class="btn btn-primary">
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
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="bi bi-download me-1"></i>
                                    Export
                                </button>
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
                                                <h6 class="mb-0">{{ $user->full_name ?: 'User' }}</h6>
                                                <small class="text-muted">{{'@'.$user->username }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?: 'N/A' }}</td>
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
                fetch(`/api/users/${userId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(user => {
                        populateUserModal(user);
                        userDetailModal.show();
                    })
                    .catch(error => {
                        console.error('Error fetching user details:', error);
                        alert('Failed to load user details. Please try again later.');
                    });
            }
            
            function populateUserModal(user) {
                // Set user data in modal
                document.getElementById('userModalName').textContent = user.full_name || 'User';
                document.getElementById('userModalUsername').textContent = '@' + user.username;
                document.getElementById('userModalEmail').textContent = user.email || 'N/A';
                document.getElementById('userModalPhone').textContent = user.phone || 'N/A';
                
                // Set status with appropriate badge
                const statusBadgeClass = {
                    'active': 'bg-success',
                    'pending': 'bg-warning',
                    'suspended': 'bg-danger',
                    'inactive': 'bg-secondary'
                }[user.status] || 'bg-secondary';
                
                document.getElementById('userModalStatus').innerHTML = 
                    `<span class="badge rounded-pill ${statusBadgeClass} px-3 py-2">${user.status ? user.status.charAt(0).toUpperCase() + user.status.slice(1) : 'Inactive'}</span>`;
                
                // Set other fields
                document.getElementById('userModalCoins').textContent = Number(user.coin_balance || 0).toLocaleString();
                document.getElementById('userModalJoinedDate').textContent = 
                    new Date(user.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                document.getElementById('userModalRole').textContent = user.role ? user.role.charAt(0).toUpperCase() + user.role.slice(1) : 'User';
                document.getElementById('userModalAddress').textContent = user.address || 'N/A';
                
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
                } else if (user.status === 'suspended') {
                    headerBg.classList.add('bg-danger-subtle');
                }
                
                // Set edit button data attribute
                const editBtn = document.getElementById('editUserBtn');
                editBtn.setAttribute('data-user-id', user.id);
            }
            
            // Initialize edit button event listener once
            document.getElementById('editUserBtn').addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                // You can redirect to an edit page or open another modal for editing
                // For now, we'll just alert
                alert(`Edit user with ID: ${userId}`);
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
                <div class="row g-4">
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
                                    <p id="userModalEmail" class="mb-0 fw-medium">email@example.com</p>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-telephone text-secondary me-2"></i>
                                        <span class="text-muted">Phone</span>
                                    </div>
                                    <p id="userModalPhone" class="mb-0 fw-medium">+1 (555) 123-4567</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt text-secondary me-2"></i>
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <p id="userModalAddress" class="mb-0 fw-medium">123 Main St, Anytown, CA 12345</p>
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
                                    <p id="userModalCoins" class="mb-0 fw-medium fs-5">1,500</p>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-shield-check text-secondary me-2"></i>
                                        <span class="text-muted">Role</span>
                                    </div>
                                    <p id="userModalRole" class="mb-0 fw-medium">User</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event text-secondary me-2"></i>
                                        <span class="text-muted">Joined Date</span>
                                    </div>
                                    <p id="userModalJoinedDate" class="mb-0 fw-medium">Mar 15, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
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