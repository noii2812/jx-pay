{{-- @extends('layouts.app') --}}

<x-layout>
    {{-- Add static data array --}}
    @php
        $gameAccounts = [
            [
                'id' => 1,
                'account_name' => 'Player123',
                'password' => '********',
                'server_game' => 'Asia Server 1',
                'coin_amount' => 5000,
                'status' => ['name' => 'Active', 'class' => 'success']
            ],
            [
                'id' => 2,
                'account_name' => 'GameMaster456',
                'password' => '********',
                'server_game' => 'Europe Server 2',
                'coin_amount' => 3500,
                'status' => ['name' => 'Active', 'class' => 'success']
            ],
            [
                'id' => 3,
                'account_name' => 'DragonSlayer789',
                'password' => '********',
                'server_game' => 'Asia Server 2',
                'coin_amount' => 0,
                'status' => ['name' => 'Inactive', 'class' => 'danger']
            ],
            [
                'id' => 4,
                'account_name' => 'WizardKing101',
                'password' => '********',
                'server_game' => 'US Server 1',
                'coin_amount' => 7500,
                'status' => ['name' => 'Active', 'class' => 'success']
            ],
            [
                'id' => 5,
                'account_name' => 'NightHunter202',
                'password' => '********',
                'server_game' => 'Europe Server 1',
                'coin_amount' => 2000,
                'status' => ['name' => 'Inactive', 'class' => 'danger']
            ],
            [
                'id' => 6,
                'account_name' => 'StormRider303',
                'password' => '********',
                'server_game' => 'Asia Server 3',
                'coin_amount' => 4200,
                'status' => ['name' => 'Active', 'class' => 'success']
            ],
            [
                'id' => 7,
                'account_name' => 'ShadowBlade404',
                'password' => '********',
                'server_game' => 'US Server 2',
                'coin_amount' => 1500,
                'status' => ['name' => 'Active', 'class' => 'success']
            ],
            [
                'id' => 8,
                'account_name' => 'LightBringer505',
                'password' => '********',
                'server_game' => 'Asia Server 1',
                'coin_amount' => 0,
                'status' => ['name' => 'Inactive', 'class' => 'danger']
            ]
        ];

        $statistics = [
            'total_accounts' => count($gameAccounts),
            'active_accounts' => count(array_filter($gameAccounts, fn($account) => $account['status']['name'] === 'Active')),
            'inactive_accounts' => count(array_filter($gameAccounts, fn($account) => $account['status']['name'] === 'Inactive')),
            'total_coins' => array_sum(array_column($gameAccounts, 'coin_amount'))
        ];
    @endphp

    <div class="container-fluid">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1" style="font-weight: 600; color: #414141;">Game Account Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Admin Board</a></li>
                        <li class="breadcrumb-item active">Game Accounts</li>
                    </ol>
                </nav>
            </div>
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                New Account
            </button>
        </div>

        {{-- Statistics Cards --}}
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(13, 110, 253, 0.1)">
                                    <i class="bi bi-people text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Total Accounts</p>
                                <h3 class="mb-0">{{ $statistics['total_accounts'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(25, 135, 84, 0.1)">
                                    <i class="bi bi-person-check text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Active Accounts</p>
                                <h3 class="mb-0">{{ $statistics['active_accounts'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(220, 53, 69, 0.1)">
                                    <i class="bi bi-person-dash text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Inactive Accounts</p>
                                <h3 class="mb-0">{{ $statistics['inactive_accounts'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(255, 193, 7, 0.1)">
                                    <i class="bi bi-coin text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Total Coins</p>
                                <h3 class="mb-0">{{ number_format($statistics['total_coins']) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                placeholder="Search account name or server..." id="searchInput">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <select class="form-select w-auto">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <select class="form-select w-auto">
                                <option value="">All Servers</option>
                                <option value="asia1">Asia Server 1</option>
                                <option value="asia2">Asia Server 2</option>
                                <option value="asia3">Asia Server 3</option>
                                <option value="us1">US Server 1</option>
                                <option value="us2">US Server 2</option>
                                <option value="eu1">Europe Server 1</option>
                                <option value="eu2">Europe Server 2</option>
                            </select>
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-funnel me-1"></i>
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Game Accounts Table --}}


        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" style="width: 60px;">#</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Server Game</th>
                                <th scope="col">Coin Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gameAccounts as $account)
                            <tr>
                                <td>{{ $account['id'] }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                            style="width: 35px; height: 35px;">
                                            <i class="bi bi-person text-secondary"></i>
                                        </div>
                                        <span class="ms-2">{{ $account['account_name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ $account['password'] }}</td>
                                <td>{{ $account['server_game'] }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        {{ number_format($account['coin_amount']) }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $account['status']['class'] }}">
                                        {{ $account['status']['name'] }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-game-account-btn" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing <strong>1-{{ count($gameAccounts) }}</strong> of <strong>{{ count($gameAccounts) }}</strong> accounts
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

    {{-- Add SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    {{-- Add JavaScript for functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const accountName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const serverGame = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    
                    if (accountName.includes(searchTerm) || serverGame.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Game Account Detail Modal Functionality
            const accountDetailModal = new bootstrap.Modal(document.getElementById('accountDetailModal'));
            const viewButtons = document.querySelectorAll('.btn-outline-primary');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('modalPassword');

            // Handle view button clicks
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const account = {
                        id: row.querySelector('td:nth-child(1)').textContent.trim(),
                        name: row.querySelector('td:nth-child(2) span').textContent.trim(),
                        password: row.querySelector('td:nth-child(3)').textContent.trim(),
                        server: row.querySelector('td:nth-child(4)').textContent.trim(),
                        coins: row.querySelector('td:nth-child(5)').textContent.trim(),
                        status: {
                            name: row.querySelector('td:nth-child(6) span').textContent.trim(),
                            class: row.querySelector('td:nth-child(6) span').classList.contains('bg-success') ? 'success' : 'danger'
                        }
                    };

                    // Update modal content
                    document.getElementById('modalAccountName').textContent = account.name;
                    document.getElementById('modalAccountId').textContent = `#${account.id}`;
                    document.getElementById('modalDetailAccountName').textContent = account.name;
                    document.getElementById('modalPassword').value = account.password;
                    document.getElementById('modalServerGame').textContent = account.server;
                    document.getElementById('modalCoinAmount').textContent = account.coins;
                    
                    // Set status badge
                    const statusBadge = document.getElementById('modalAccountStatus');
                    statusBadge.className = `badge bg-${account.status.class}`;
                    statusBadge.textContent = account.status.name;

                    // Set server region based on server name
                    const region = account.server.split(' ')[0];
                    document.getElementById('modalServerRegion').textContent = region;

                    // Update server time based on region
                    updateServerTime(region);

                    accountDetailModal.show();
                });
            });

            // Toggle password visibility
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                togglePasswordBtn.innerHTML = `<i class="bi bi-eye${type === 'password' ? '' : '-slash'}"></i>`;
            });

            // Update server time based on region
            function updateServerTime(region) {
                const now = new Date();
                let offset = 0;
                
                switch(region) {
                    case 'Asia':
                        offset = 8; // UTC+8
                        break;
                    case 'Europe':
                        offset = 1; // UTC+1
                        break;
                    case 'US':
                        offset = -5; // UTC-5
                        break;
                }

                const serverTime = new Date(now.getTime() + offset * 3600000);
                document.getElementById('modalServerTime').textContent = serverTime.toLocaleTimeString();
            }

            // Update server time every second
            setInterval(() => {
                const region = document.getElementById('modalServerRegion').textContent;
                if (region) {
                    updateServerTime(region);
                }
            }, 1000);

            // Edit Game Account Modal Functionality
            const editGameAccountModal = new bootstrap.Modal(document.getElementById('editGameAccountModal'));
            const editButtons = document.querySelectorAll('.btn-outline-secondary');
            const editTogglePasswordBtn = document.getElementById('editTogglePassword');
            const editPasswordInput = document.getElementById('editModalPassword');
            const saveGameAccountBtn = document.getElementById('saveGameAccountBtn');

            // Handle edit button clicks
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const account = {
                        id: row.querySelector('td:nth-child(1)').textContent.trim(),
                        name: row.querySelector('td:nth-child(2) span').textContent.trim(),
                        password: row.querySelector('td:nth-child(3)').textContent.trim(),
                        server: row.querySelector('td:nth-child(4)').textContent.trim(),
                        coins: row.querySelector('td:nth-child(5)').textContent.trim().replace(/[^0-9]/g, ''),
                        status: {
                            name: row.querySelector('td:nth-child(6) span').textContent.trim(),
                            class: row.querySelector('td:nth-child(6) span').classList.contains('bg-success') ? 'success' : 'danger'
                        }
                    };

                    // Update edit modal content
                    document.getElementById('editModalAccountName').textContent = account.name;
                    document.getElementById('editModalAccountId').textContent = `#${account.id}`;
                    document.getElementById('editModalDetailAccountName').value = account.name;
                    document.getElementById('editModalPassword').value = account.password;
                    document.getElementById('editModalServerGame').value = account.server;
                    document.getElementById('editModalCoinAmount').value = account.coins;
                    document.getElementById('editModalCreatedDate').value = '2024-03-15';
                    
                    // Set status badge
                    const statusBadge = document.getElementById('editModalAccountStatus');
                    statusBadge.className = `badge bg-${account.status.class}`;
                    statusBadge.textContent = account.status.name;

                    // Set server region
                    const region = account.server.split(' ')[0];
                    document.getElementById('editModalServerRegion').value = region;

                    editGameAccountModal.show();
                });
            });

            // Toggle password visibility in edit modal
            editTogglePasswordBtn.addEventListener('click', function() {
                const type = editPasswordInput.type === 'password' ? 'text' : 'password';
                editPasswordInput.type = type;
                editTogglePasswordBtn.innerHTML = `<i class="bi bi-eye${type === 'password' ? '' : '-slash'}"></i>`;
            });

            // Handle save changes button click
            saveGameAccountBtn.addEventListener('click', function() {
                const accountName = document.getElementById('editModalAccountName').textContent;
                const newPassword = document.getElementById('editModalPassword').value;
                const newCoinAmount = document.getElementById('editModalCoinAmount').value;

                Swal.fire({
                    title: 'Confirm Update',
                    text: `Are you sure you want to edit this game account "${accountName}"?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, update it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Here you would typically make an API call to update the account
                        // For now, we'll just show a success message
                        Swal.fire(
                            'Updated!',
                            'The game account has been updated successfully.',
                            'success'
                        ).then(() => {
                            editGameAccountModal.hide();
                        });
                    }
                });
            });

            // Delete Game Account confirmation
            const deleteButtons = document.querySelectorAll('.delete-game-account-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const accountName = row.querySelector('td:nth-child(2) span').textContent.trim();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Do you really want to delete game account "${accountName}"? This action cannot be undone!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Here you would typically make an API call to delete the account
                            // For now, we'll just show a success message and remove the row
                            Swal.fire(
                                'Deleted!',
                                `Game account "${accountName}" has been deleted.`,
                                'success'
                            ).then(() => {
                                // Remove the row from the table
                                row.remove();
                                
                                // Update the statistics
                                const totalAccounts = document.querySelector('.col-xl-3:nth-child(1) h3');
                                const activeAccounts = document.querySelector('.col-xl-3:nth-child(2) h3');
                                const inactiveAccounts = document.querySelector('.col-xl-3:nth-child(3) h3');
                                
                                if (totalAccounts) totalAccounts.textContent = (parseInt(totalAccounts.textContent) - 1).toString();
                                if (row.querySelector('.badge.bg-success')) {
                                    if (activeAccounts) activeAccounts.textContent = (parseInt(activeAccounts.textContent) - 1).toString();
                                } else {
                                    if (inactiveAccounts) inactiveAccounts.textContent = (parseInt(inactiveAccounts.textContent) - 1).toString();
                                }
                            });
                        }
                    });
                });
            });
        });
    </script>
</x-layout>

{{-- Game Account Detail Modal --}}
<div class="modal fade" id="accountDetailModal" tabindex="-1" aria-labelledby="accountDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="accountDetailModalLabel">Game Account Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    {{-- Account Status Card --}}
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" 
                                            style="width: 48px; height: 48px;">
                                            <i class="bi bi-person fs-4 text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-1" id="modalAccountName"></h5>
                                            <p class="text-muted mb-0" id="modalAccountId"></p>
                                        </div>
                                    </div>
                                    <span class="badge" id="modalAccountStatus"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Account Information --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Account Information</h6>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Account Name</label>
                                    <p class="mb-0 fw-medium" id="modalDetailAccountName"></p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="modalPassword" readonly>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Created Date</label>
                                    <p class="mb-0" id="modalCreatedDate">2024-03-15</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Last Login</label>
                                    <p class="mb-0" id="modalLastLogin">2024-03-20 15:30</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Game Server Information --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Game Server Information</h6>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server</label>
                                    <p class="mb-0 fw-medium" id="modalServerGame"></p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server Status</label>
                                    <p class="mb-0">
                                        <span class="badge bg-success">Online</span>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server Time</label>
                                    <p class="mb-0" id="modalServerTime"></p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server Region</label>
                                    <p class="mb-0" id="modalServerRegion"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Account Statistics --}}
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Account Statistics</h6>
                                <div class="row g-4">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div>
                                                <label class="text-muted small mb-1">Current Coins</label>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-coin text-warning me-2"></i>
                                                    <h5 class="mb-0" id="modalCoinAmount"></h5>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary">
                                                Add Coins
                                            </button>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Total Transactions</label>
                                            <p class="mb-0 fw-medium" id="modalTotalTransactions">25</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Last Transaction</label>
                                            <p class="mb-0" id="modalLastTransaction">2024-03-19 10:45</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="bg-light rounded p-3">
                                            <h6 class="mb-3">Recent Activity</h6>
                                            <div class="activity-item d-flex align-items-center mb-2">
                                                <i class="bi bi-circle-fill text-success me-2" style="font-size: 8px;"></i>
                                                <div>
                                                    <p class="mb-0 small">Login from US Server</p>
                                                    <small class="text-muted">2 hours ago</small>
                                                </div>
                                            </div>
                                            <div class="activity-item d-flex align-items-center mb-2">
                                                <i class="bi bi-circle-fill text-primary me-2" style="font-size: 8px;"></i>
                                                <div>
                                                    <p class="mb-0 small">Added 1000 coins</p>
                                                    <small class="text-muted">5 hours ago</small>
                                                </div>
                                            </div>
                                            <div class="activity-item d-flex align-items-center">
                                                <i class="bi bi-circle-fill text-warning me-2" style="font-size: 8px;"></i>
                                                <div>
                                                    <p class="mb-0 small">Password changed</p>
                                                    <small class="text-muted">1 day ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


{{-- Game Account Edit Modal --}}
<div class="modal fade" id="editGameAccountModal" tabindex="-1" aria-labelledby="editGameAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="editGameAccountModalLabel">Edit Game Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    {{-- Account Status Card (Read-only) --}}
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" 
                                            style="width: 48px; height: 48px;">
                                            <i class="bi bi-person fs-4 text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-1" id="editModalAccountName"></h5>
                                            <p class="text-muted mb-0" id="editModalAccountId"></p>
                                        </div>
                                    </div>
                                    <span class="badge" id="editModalAccountStatus"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Account Information --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Account Information</h6>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Account Name</label>
                                    <input type="text" class="form-control" id="editModalDetailAccountName" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="editModalPassword">
                                        <button class="btn btn-outline-secondary" type="button" id="editTogglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Created Date</label>
                                    <input type="text" class="form-control" id="editModalCreatedDate" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Game Server Information (Read-only) --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Game Server Information</h6>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server</label>
                                    <input type="text" class="form-control" id="editModalServerGame" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Coin Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-coin text-warning"></i>
                                        </span>
                                        <input type="number" class="form-control" id="editModalCoinAmount">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small mb-1">Server Region</label>
                                    <input type="text" class="form-control" id="editModalServerRegion" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveGameAccountBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>
