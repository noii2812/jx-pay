<x-layout>
    
        <!-- Header Section -->
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="bi bi-arrow-left-right text-white fs-4"></i>
                </div>
                <h2 class="fw-bold m-0 fs-1">Transfer Coin History</h2>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-warning px-4 py-2 d-flex align-items-center gap-2" onclick="refreshTable()" style="border-radius: 12px; font-size: 1rem;">
                    <i class="bi bi-arrow-clockwise"></i>
                    Refresh
                </button>
                <div class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2" style="border-radius: 12px; font-size: 1rem;">
                    <i class="bi bi-arrow-left-right"></i>
                    Total Transfers: 8
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-coin text-white"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Total Coins Transferred</p>
                                <h3 class="fw-bold mb-0">1,250,000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-server text-white"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Active Servers</p>
                                <h3 class="fw-bold mb-0">6</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-people text-white"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Active Users</p>
                                <h3 class="fw-bold mb-0">125</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-clock-history text-white"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Today's Transfers</p>
                                <h3 class="fw-bold mb-0">24</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="card border-0 mb-5" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light px-4">
                                <i class="bi bi-search fs-5"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="searchInput" placeholder="Search transfers..." style="font-size: 1rem;">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select form-select-lg border-0 bg-light" style="font-size: 1rem;">
                            <option value="">All Servers</option>
                            <option value="alpha">Server Alpha</option>
                            <option value="beta">Server Beta</option>
                            <option value="gamma">Server Gamma</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select form-select-lg border-0 bg-light" style="font-size: 1rem;">
                            <option value="">Date Range</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-warning w-100 py-3 d-flex align-items-center justify-content-center gap-2" style="border-radius: 12px;">
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table Card -->
        <div class="card border-0" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">#</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Transfer Number</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Account Game</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Coin Amount</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Server Name</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Transfer Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $staticData = [
                                    [
                                        'transfer_number' => 'TRF-001',
                                        'username' => 'player_alpha',
                                        'coin_amount' => 5000,
                                        'server_name' => 'Server Alpha',
                                        'transfer_date' => '2024-03-21 10:30:00'
                                    ],
                                    [
                                        'transfer_number' => 'TRF-002',
                                        'username' => 'player_beta',
                                        'coin_amount' => 3000,
                                        'server_name' => 'Server Beta',
                                        'transfer_date' => '2024-03-21 11:15:00'
                                    ],
                                    [
                                        'transfer_number' => 'TRF-003',
                                        'username' => 'player_gamma',
                                        'coin_amount' => 7500,
                                        'server_name' => 'Server Gamma',
                                        'transfer_date' => '2024-03-21 12:00:00'
                                    ],
                                    [
                                        'transfer_number' => 'TRF-004',
                                        'username' => 'player_delta',
                                        'coin_amount' => 2000,
                                        'server_name' => 'Server Delta',
                                        'transfer_date' => '2024-03-21 13:45:00'
                                    ],
                                    [
                                        'transfer_number' => 'TRF-005',
                                        'username' => 'player_epsilon',
                                        'coin_amount' => 10000,
                                        'server_name' => 'Server Epsilon',
                                        'transfer_date' => '2024-03-21 14:30:00'
                                    ]
                                ];
                            @endphp

                            @foreach($staticData as $index => $transfer)
                                <tr>
                                    <td class="py-4 px-4">{{ $index + 1 }}</td>
                                    <td class="py-4 px-4">
                                        <span class="fw-medium">{{ $transfer['transfer_number'] }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                            <span class="fw-medium">{{ $transfer['username'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-medium">{{ number_format($transfer['coin_amount']) }}</span>
                                            <i class="bi bi-coin text-warning"></i>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-server text-success"></i>
                                            </div>
                                            <span class="fw-medium">{{ $transfer['server_name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="text-muted">{{ $transfer['transfer_date'] }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-0 bg-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-muted mb-0" style="font-size: 0.95rem;">Showing 1 to 5 of 5 entries</p>
                    <nav>
                        <ul class="pagination mb-0 gap-2">
                            <li class="page-item disabled">
                                <a class="page-link border-0 px-3 py-2" href="#" style="border-radius: 8px;">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link border-0 px-3 py-2" href="#" style="border-radius: 8px;">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link border-0 px-3 py-2" href="#" style="border-radius: 8px;">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link border-0 px-3 py-2" href="#" style="border-radius: 8px;">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link border-0 px-3 py-2" href="#" style="border-radius: 8px;">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    
    
    <style>
        body {
            background-color: #e8f4ff;
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }
        .btn-warning {
            background: #f1c40f;
            border: none;
        }
        .btn-warning:hover {
            background: #f39c12;
        }
        .card {
            transition: all 0.2s ease;
        }
        .table > :not(caption) > * > * {
            border-bottom-width: 0;
        }
        .table > tbody > tr:hover {
            background-color: #f8f9fa;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }
        .page-link:focus {
            box-shadow: none;
        }
        .page-item.active .page-link {
            background-color: #f1c40f;
            color: #000;
        }
        .form-control::placeholder {
            color: #6c757d;
            opacity: 0.8;
        }
        .gap-2 {
            gap: 0.75rem !important;
        }
        .gap-3 {
            gap: 1rem !important;
        }
        .gap-4 {
            gap: 1.5rem !important;
        }
    </style>

    <script>
        function refreshTable() {
            location.reload();
        }

        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        });
    </script>
</x-layout>