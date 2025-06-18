<x-layout>
    <x-loading-animation />
    
    <div class="container py-4">
        <!-- Profile Header Card -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px; background: linear-gradient(135deg, #6366f1, #8b5cf6);">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="position-relative">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=random' }}" 
                                alt="avatar" class="rounded-circle border border-3 border-white shadow" 
                                style="width: 120px; height: 120px; object-fit: cover;">
                            <button class="btn btn-sm btn-light rounded-circle position-absolute bottom-0 end-0 shadow-sm" 
                                data-bs-toggle="modal" data-bs-target="#editProfileModal"
                                style="width: 32px; height: 32px;">
                                <i class="bi bi-camera"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="text-white mb-1">{{ auth()->user()->username }}</h3>
                        <p class="text-white-50 mb-2">{{ auth()->user()->role ?? 'Member' }}</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="bi bi-pencil me-1"></i>Edit Profile
                            </button>
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                <i class="bi bi-key me-1"></i>Change Password
                            </button>
                            <button class="btn {{ auth()->user()->secpassword ? 'btn-light' : 'btn-danger' }} btn-sm position-relative" 
                                data-bs-toggle="modal" 
                                data-bs-target="#securityPasswordModal">
                                <i class="bi {{ auth()->user()->secpassword ? 'bi-shield-lock' : 'bi-exclamation-triangle' }} me-1"></i>
                                {{ auth()->user()->secpassword ? 'Change Security Password' : 'Security Password is not set' }}
                                @unless(auth()->user()->secpassword)
                                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">Warning</span>
                                </span>
                                @endunless
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Stats -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                <i class="bi bi-database text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Total Coins</h6>
                                <h4 class="mb-0">{{ auth()->user()->coin ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @unless(auth()->user()->role === 'admin')
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                <i class="bi bi-arrow-up-circle text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Total Orders</h6>
                                <h4 class="mb-0">{{ auth()->user()->transactions()->count()  }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endunless
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                <i class="bi bi-people text-info"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Accounts</h6>
                                <h4 class="mb-0">{{ auth()->user()->accounts()->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-body p-4">
                <h5 class="mb-4">Profile Information</h5>
                <div class="row g-4">
                    <!-- Account ID -->
                    <div class="col-12">
                        <div class="bg-light rounded-3 p-3">
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                    <p class="text-muted mb-0"><i class="bi bi-key me-2"></i>Account ID</p>
                                </div>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-white border-0" value="{{ auth()->id() }}" 
                                            id="accountId" readonly style="border-radius: 10px 0 0 10px;">
                                        <button class="btn btn-primary" type="button" onclick="copyAccountId()" title="Copy"
                                            style="border-radius: 0 10px 10px 0;">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Info -->
                    <div class="col-md-6">
                        <div class="bg-light rounded-3 p-3">
                            <p class="text-muted mb-1"><i class="bi bi-person me-2"></i>Username</p>
                            <h6 class="mb-0">{{ auth()->user()->username }}</h6>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-light rounded-3 p-3">
                            <p class="text-muted mb-1"><i class="bi bi-envelope me-2"></i>Email</p>
                            <h6 class="mb-0">{{ auth()->user()->email }}</h6>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-light rounded-3 p-3">
                            <p class="text-muted mb-1"><i class="bi bi-phone me-2"></i>Phone</p>
                            <h6 class="mb-0">{{ auth()->user()->phone ?? 'Not set' }}</h6>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-light rounded-3 p-3">
                            <p class="text-muted mb-1"><i class="bi bi-calendar me-2"></i>Member Since</p>
                            <h6 class="mb-0">{{ auth()->user()->created_at->format('M d, Y') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Edit Profile Modal -->
  

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <style>
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn {
            transition: all 0.2s ease-in-out;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #6366f1;
        }
    </style>

    <script>
        // Global function for toggling password visibility
        function togglePassword(button) {
            const input = button.previousElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Make sure Swal is available
            if (typeof Swal === 'undefined') {
                console.error('SweetAlert2 is not loaded');
                return;
            }

            function copyAccountId() {
                const accountId = document.getElementById('accountId');
                accountId.select();
                document.execCommand('copy');
                
                const button = event.currentTarget;
                const originalHtml = button.innerHTML;
                button.innerHTML = '<i class="bi bi-check"></i>';
                setTimeout(() => button.innerHTML = originalHtml, 2000);
            }

            // Handle security password form submission
            const securityPasswordForm = document.getElementById('securityPasswordForm');
            if (securityPasswordForm) {
                securityPasswordForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const isSettingNew = !formData.has('current_security_password');
                    const url = isSettingNew ? '/profile/security-password' : '/profile/security-password/change';
                    
                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(Object.fromEntries(formData))
                        });

                        const data = await response.json();
                        console.log('Response:', response);
                        console.log('Data:', data);
                        
                        if (response.ok) {
                            // Show success message
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: data.message,
                                    confirmButtonColor: '#6366f1'
                                }).then(() => {
                                    // Reload the page to update the UI
                                    window.location.reload();
                                });
                            } else {
                                alert(data.message);
                                window.location.reload();
                            }
                        } else {
                            // Show error message
                            if (typeof Swal !== 'undefined') {
                                let errorMessage = data.message;
                                if (data.errors) {
                                    // Format validation errors
                                    errorMessage = Object.values(data.errors).flat().join('\n');
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: errorMessage,
                                    confirmButtonColor: '#6366f1'
                                });
                            } else {
                                alert(data.message);
                            }
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred',
                                confirmButtonColor: '#6366f1'
                            });
                        } else {
                            alert('An unexpected error occurred');
                        }
                    }
                });
            }

            // Handle avatar preview
            const avatarInput = document.querySelector('input[name="avatar"]');
            if (avatarInput) {
                avatarInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('#editProfileModal img').src = e.target.result;
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }

            // Handle change password form submission
            const changePasswordForm = document.getElementById('changePasswordForm');
            if (changePasswordForm) {
                changePasswordForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    
                    try {
                        const response = await fetch('/profile/change-password', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(Object.fromEntries(formData))
                        });

                        const data = await response.json();
                        
                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message,
                                confirmButtonColor: '#6366f1'
                            }).then(() => {
                                // Close the modal
                                const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
                                modal.hide();
                                // Reset the form
                                changePasswordForm.reset();
                            });
                        } else {
                            let errorMessage = data.message;
                            if (data.errors) {
                                errorMessage = Object.values(data.errors).flat().join('\n');
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage,
                                confirmButtonColor: '#6366f1'
                            });
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An unexpected error occurred',
                            confirmButtonColor: '#6366f1'
                        });
                    }
                });
            }

            // Handle edit profile form submission
            const editProfileForm = document.getElementById('editProfileForm');
            if (editProfileForm) {
                editProfileForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    
                    try {
                        const response = await fetch('/profile/update', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(Object.fromEntries(formData))
                        });

                        const data = await response.json();
                        
                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message || 'Profile updated successfully',
                                confirmButtonColor: '#6366f1'
                            }).then(() => {
                                // Close the modal
                                const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
                                modal.hide();
                                // Reload the page to show updated profile
                                window.location.reload();
                            });
                        } else {
                            let errorMessage = data.message;
                            if (data.errors) {
                                errorMessage = Object.values(data.errors).flat().join('\n');
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage,
                                confirmButtonColor: '#6366f1'
                            });
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An unexpected error occurred',
                            confirmButtonColor: '#6366f1'
                        });
                    }
                });
            }
        });
    </script>
</x-layout>

  <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 15px;">
                <div class="modal-header border-0 bg-primary p-4">
                    <h5 class="modal-title text-white">
                        <i class="bi bi-person-edit me-2"></i>Edit Profile
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="editProfileForm">
                        {{-- <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ auth()->user()->phoneNumber }}">
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="male" {{ auth()->user()->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ auth()->user()->gender === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ auth()->user()->gender === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="editProfileForm" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

 <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 15px;">
                <div class="modal-header border-0 p-4" style="background-color: #6366f1">
                    <h5 class="modal-title text-white">
                        Change Password
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="current_password" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="new_password" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="new_password_confirmation" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="changePasswordForm" class="btn" style="background-color: #6366f1; color:white">Update Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Security Password Modal -->
    <div class="modal fade" id="securityPasswordModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 15px;">
                <div class="modal-header border-0 p-4" style="background-color: {{ auth()->user()->secpassword ? '#6366f1' : '#dc3545' }}">
                    <h5 class="modal-title text-white">
                        <i class="bi {{ auth()->user()->secpassword ? 'bi-shield-lock' : 'bi-exclamation-triangle' }} me-2"></i>
                        {{ auth()->user()->secpassword ? 'Change Security Password' : 'Set Security Password' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    @unless(auth()->user()->secpassword)
                    <div class="alert alert-warning mb-4">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Important:</strong> Setting up a security password is required for additional account protection.
                    </div>
                    @endunless
                    <form id="securityPasswordForm" method="POST">
                        @csrf
                        @if(auth()->user()->secpassword)
                        <div class="mb-3">
                            <label class="form-label">Current Security Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="current_security_password" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">New Security Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="new_security_password" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Security Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="new_security_password_confirmation" required>
                                <span class="btn btn-light" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="securityPasswordForm" class="btn" style="background-color: #6366f1; color:white">
                        {{ auth()->user()->secpassword ? 'Update Security Password' : 'Set Security Password' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
