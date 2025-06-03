<x-layout>



    <div class="card shadow-lg border-0 position-relative overflow-hidden" style="border-radius: 20px;">
        <!-- Background Pattern -->
        <div class="position-absolute w-100 h-100" style="background: linear-gradient(45deg, #6c5ce7, #3498db);
                        opacity: 0.95; z-index: 1;"></div>
        <div class="position-absolute w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E');
                        opacity: 0.1; z-index: 0;"></div>
        <!-- Content -->
        <div class="card-body text-center p-5 position-relative" style="z-index: 2;">
            <div class="avatar-wrapper mb-4">
                <div class="position-relative d-inline-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid border border-white shadow-lg"
                        style="width: 150px; height: 150px; object-fit: cover;">
                    <span class="position-absolute bottom-0 end-0 p-2 bg-success rounded-circle border border-white"
                        style="width: 20px; height: 20px;"></span>
                </div>
            </div>
            <h3 class="fw-bold mb-2 text-white">john_doe</h3>
            <p class="text-white-50 mb-4">Premium Member</p>
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-yellow btn-lg shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#editProfileModal">
                    <i class="bi bi-user-edit me-2"></i>Edit Profile
                </button>
                <button type="button" class="btn btn-light btn-lg shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#changePasswordModal">
                    <i class="bi bi-key me-2"></i>Change Password
                </button>
            </div>
        </div>
    </div>


    <div class="card card-privilege shadow-lg border-0" style="border-radius: 20px; margin-top: 20px;">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary bg-gradient  rounded-circle me-3"
                    style="width: 50px; height: 50px;display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-person-circle" style="color: white;"></i>
                </div>
                <h4 class="fw-bold m-0" style="color: #2d3436;">Profile Details</h4>
            </div>

            <div class="row g-4">
                <!-- Account ID -->
                <div class="col-12">
                    <div class="p-3 rounded-4 bg-light">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <p class="text-muted mb-0"><i class="bi bi-fingerprint me-2"></i>Account ID</p>
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-white border-0" value="123456"
                                        id="accountId" readonly style="border-radius: 10px 0 0 10px;">
                                    <button class="btn btn-yellow" type="button" onclick="copyAccountId()" title="Copy"
                                        style="border-radius: 0 10px 10px 0;">
                                        <i class="bi bi-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Username -->
                <div class="col-md-6">
                    <div class="p-3 rounded-4 bg-light">
                        <p class="text-muted mb-1"><i class="bi bi-user me-2"></i>Username</p>
                        <h6 class="mb-0">john_doe</h6>
                    </div>
                </div>

                <!-- Full Name -->
                <div class="col-md-6">
                    <div class="p-3 rounded-4 bg-light">
                        <p class="text-muted mb-1"><i class="bi bi-id-card me-2"></i>Full Name</p>
                        <h6 class="mb-0">John Doe</h6>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <div class="p-3 rounded-4 bg-light">
                        <p class="text-muted mb-1"><i class="bi bi-envelope me-2"></i>Email</p>
                        <h6 class="mb-0">john@example.com</h6>
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <div class="p-3 rounded-4 bg-light">
                        <p class="text-muted mb-1"><i class="bi bi-phone me-2"></i>Phone</p>
                        <h6 class="mb-0">+1 234 567 8900</h6>
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <div class="p-3 rounded-4 bg-light">
                        <p class="text-muted mb-1"><i class="bi bi-venus-mars me-2"></i>Gender</p>
                        <h6 class="mb-0">
                            <span class="badge bg-primary bg-gradient px-3 py-2"
                                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                                <i class="bi bi-mars me-1"></i>Male
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        function copyAccountId() {
            const accountId = document.getElementById('accountId');
            accountId.select();
            document.execCommand('copy');

            // Show tooltip
            const button = document.querySelector('[onclick="copyAccountId()"]');
            const originalTitle = button.getAttribute('title');
            button.setAttribute('title', 'Copied!');
            setTimeout(() => button.setAttribute('title', originalTitle), 2000);
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = event.currentTarget.querySelector('i');

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
<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 bg-primary bg-gradient p-4"
                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                <h5 class="modal-title fw-bold text-white" id="changePasswordModalLabel">
                    <i class="bi bi-key me-2"></i>Change Password
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-4">
                        <label for="current_password" class="form-label">
                            <i class="bi bi-lock me-2"></i>Current Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" id="current_password"
                                required>
                            <button class="btn btn-light border-0" type="button"
                                onclick="togglePassword('current_password')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="form-label">
                            <i class="bi bi-key me-2"></i>New Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" id="new_password" required>
                            <button class="btn btn-light border-0" type="button"
                                onclick="togglePassword('new_password')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="form-label">
                            <i class="bi bi-check-double me-2"></i>Confirm New Password
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="password" class="form-control bg-light border-0" id="new_password_confirmation"
                                required>
                            <button class="btn btn-light border-0" type="button"
                                onclick="togglePassword('new_password_confirmation')">
                                <i class="bi bi-eye"></i>
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
<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 bg-primary bg-gradient p-4"
                style="background: linear-gradient(45deg, #6c5ce7, #3498db) !important;">
                <h5 class="modal-title fw-bold text-white" id="editProfileModalLabel">
                    <i class="bi bi-user-edit me-2"></i>Edit Profile
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-4">
                        <label for="avatar" class="form-label d-block text-center mb-3">Profile Picture</label>
                        <div class="d-flex justify-content-center mb-3">
                            <div class="position-relative">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="position-absolute bottom-0 end-0">
                                    <label for="avatar" class="btn btn-sm btn-yellow rounded-circle"
                                        style="width: 32px; height: 32px;">
                                        <i class="bi bi-camera"></i>
                                    </label>
                                    <input type="file" id="avatar" class="d-none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">
                            <i class="bi bi-user me-2"></i>Full Name
                        </label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" id="full_name"
                            value="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>Email
                        </label>
                        <input type="email" class="form-control form-control-lg bg-light border-0" id="email"
                            value="john@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="bi bi-phone me-2"></i>Phone Number
                        </label>
                        <input type="tel" class="form-control form-control-lg bg-light border-0" id="phone"
                            value="+1 234 567 8900">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">
                            <i class="bi bi-venus-mars me-2"></i>Gender
                        </label>
                        <select class="form-select form-select-lg bg-light border-0" id="gender">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-yellow btn-lg px-4">Save Changes</button>
            </div>
        </div>
    </div>
</div>