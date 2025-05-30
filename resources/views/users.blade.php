@extends('layouts.app')

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
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Add New User
            </button>
        </div>

        {{-- Search and Filter Section --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" 
                                placeholder="Search by username or email..." id="searchInput">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <select class="form-select w-auto">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-funnel me-1"></i>
                                Filter
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-download me-1"></i>
                                Export
                            </button>
                        </div>
                    </div>
                </div>
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
                                <th scope="col">Role</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Coins</th>
                                <th scope="col">Status</th>
                                <th scope="col">Joined Date</th>
                                <th scope="col" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- User Row 1 --}}
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-person text-secondary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">John Doe</h6>
                                            <small class="text-muted">@johndoe</small>
                                        </div>
                                    </div>
                                </td>
                                <td>john@example.com</td>
                                <td>
                                    <span class="badge bg-danger">Admin</span>
                                </td>
                                <td>+1 (555) 123-4567</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        1,500
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>Mar 15, 2024</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-user-btn" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- User Row 2 --}}
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-person text-secondary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Jane Smith</h6>
                                            <small class="text-muted">@janesmith</small>
                                        </div>
                                    </div>
                                </td>
                                <td>jane@example.com</td>
                                <td>
                                    <span class="badge bg-info">GM</span>
                                </td>
                                <td>+1 (555) 987-6543</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        2,750
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>Mar 14, 2024</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-user-btn" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- User Row 3 --}}
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-person text-secondary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Mike Johnson</h6>
                                            <small class="text-muted">@mikejohnson</small>
                                        </div>
                                    </div>
                                </td>
                                <td>mike@example.com</td>
                                <td>
                                    <span class="badge bg-secondary">User</span>
                                </td>
                                <td>+1 (555) 456-7890</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        800
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Inactive</span></td>
                                <td>Mar 13, 2024</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-user-btn" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing <strong>1-3</strong> of <strong>25</strong> users
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const username = row.querySelector('h6').textContent.toLowerCase();
                    const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    
                    if (username.includes(searchTerm) || email.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // View User Details functionality
            const viewButtons = document.querySelectorAll('.btn-outline-primary');
            const userDetailModal = new bootstrap.Modal(document.getElementById('userDetailModal'));

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    
                    // Get user data from the row
                    const userName = row.querySelector('h6').textContent;
                    const userHandle = row.querySelector('small').textContent;
                    const email = row.querySelector('td:nth-child(3)').textContent;
                    const role = row.querySelector('td:nth-child(4) .badge').textContent;
                    const phone = row.querySelector('td:nth-child(5)').textContent;
                    const coins = row.querySelector('td:nth-child(6)').textContent.trim();
                    const status = row.querySelector('td:nth-child(7) .badge').textContent;
                    const joinedDate = row.querySelector('td:nth-child(8)').textContent;

                    // Update modal with user data
                    document.getElementById('modalUserName').textContent = userName;
                    document.getElementById('modalUsername').textContent = userHandle;
                    document.getElementById('modalEmail').textContent = email;
                    document.getElementById('modalPhone').textContent = phone;
                    document.getElementById('modalRole').innerHTML = `<span class="badge bg-danger">${role}</span>`;
                    document.getElementById('modalStatus').innerHTML = `<span class="badge ${status === 'Active' ? 'bg-success' : 'bg-danger'}">${status}</span>`;
                    document.getElementById('modalJoinedDate').textContent = joinedDate;
                    document.getElementById('modalCoins').innerHTML = `<i class="bi bi-coin text-warning me-1"></i>${coins}`;

                    // Show the modal
                    userDetailModal.show();
                });
            });

            // Password toggle functionality
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('modalPassword');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle the eye icon
                const icon = this.querySelector('i');
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });

            // Edit User confirmation
            const editUserBtn = document.getElementById('editUserBtn');
            editUserBtn.addEventListener('click', function() {
                const userName = document.getElementById('modalUserName').textContent;
                
                Swal.fire({
                    title: 'Confirm Update',
                    text: `Are you sure you want to edit user "${userName}"?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, edit user',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Here you can add the code to handle the edit action
                        // For now, we'll just show a success message
                        Swal.fire(
                            'Edit Mode Activated',
                            'You can now edit the user information.',
                            'success'
                        );
                    }
                });
            });

            // Delete User confirmation
            const deleteButtons = document.querySelectorAll('.delete-user-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const userName = row.querySelector('h6').textContent;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Do you really want to delete user "${userName}"? This action cannot be undone!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete user!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Here you would typically make an API call to delete the user
                            // For now, we'll just show a success message
                            Swal.fire(
                                'Deleted!',
                                `User "${userName}" has been deleted.`,
                                'success'
                            ).then(() => {
                                // Optionally remove the row from the table
                                row.remove();
                            });
                        }
                    });
                });
            });
        });
    </script>
</x-layout>

 {{-- User Detail Modal --}}
 <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="userDetailModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- User Profile Header --}}
                    <div class="col-12 text-center mb-4">
                        <div class="mx-auto mb-3 rounded-circle bg-light d-flex align-items-center justify-content-center" 
                            style="width: 100px; height: 100px;">
                            <i class="bi bi-person fs-1 text-secondary"></i>
                        </div>
                        <h4 id="modalUserName" class="mb-1">John Doe</h4>
                        <span id="modalUsername" class="text-muted">@johndoe</span>
                    </div>

                    {{-- User Information --}}
                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Basic Information</h6>
                                <div class="mb-2">
                                    <label class="text-muted small">Email</label>
                                    <div id="modalEmail">john@example.com</div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-sm bg-white" id="modalPassword" value="********" readonly>
                                        <button class="btn btn-sm btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Phone</label>
                                    <div id="modalPhone">+1 (555) 123-4567</div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Role</label>
                                    <div id="modalRole"><span class="badge bg-danger">Admin</span></div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Status</label>
                                    <div id="modalStatus"><span class="badge bg-success">Active</span></div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Joined Date</label>
                                    <div id="modalJoinedDate">Mar 15, 2024</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Account Details</h6>
                                <div class="mb-2">
                                    <label class="text-muted small">Coins Balance</label>
                                    <div class="d-flex align-items-center" id="modalCoins">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        1,500
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">Last Login</label>
                                    <div id="modalLastLogin">2024-03-20 15:30:45</div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">IP Address</label>
                                    <div id="modalIpAddress">192.168.1.1</div>
                                </div>
                                <div class="mb-2">
                                    <label class="text-muted small">2FA Status</label>
                                    <div id="modal2FAStatus"><span class="badge bg-success">Enabled</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Additional Information</h6>
                                <div class="mb-2">
                                    <label class="text-muted small">Notes</label>
                                    <div id="modalNotes" class="small">VIP customer with premium support access.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editUserBtn">Edit User</button>
            </div>
        </div>
    </div>
</div>
