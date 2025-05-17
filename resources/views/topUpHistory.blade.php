<x-layout>
    <div class="container-fluid py-5 px-4">
        <!-- Header Section -->
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="bi bi-credit-card text-white fs-4"></i>
                </div>
                <h2 class="fw-bold m-0 fs-1">Top Up History</h2>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-warning px-4 py-2 d-flex align-items-center gap-2" onclick="refreshTable()" style="border-radius: 12px; font-size: 1rem;">
                    <i class="bi bi-arrow-clockwise"></i>
                    Refresh
                </button>
                <div class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2" style="border-radius: 12px; font-size: 1rem;">
                    <i class="bi bi-credit-card"></i>
                    Total Top Ups: {{ $topUpHistory->total() }}
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
                                <i class="bi bi-coin text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Total Coins Added</p>
                                <h3 class="fw-bold mb-0">{{ number_format($totalCoins) }}</h3>
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
                                <i class="bi bi-check-circle text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Approved Top Ups</p>
                                <h3 class="fw-bold mb-0">{{ $approvedCount }}</h3>
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
                                <i class="bi bi-clock text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Pending Top Ups</p>
                                <h3 class="fw-bold mb-0">{{ $pendingCount }}</h3>
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
                                <i class="bi bi-wallet2 text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Total Value</p>
                                <h3 class="fw-bold mb-0">${{ number_format($totalValue, 2) }}</h3>
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
                            <input type="text" class="form-control form-control-lg border-0 bg-light" id="searchInput" placeholder="Search top ups..." style="font-size: 1rem;">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select form-select-lg border-0 bg-light" style="font-size: 1rem;">
                            <option value="">All Payment Methods</option>
                            <option value="qr">QR Payment</option>
                            <option value="card">Card Payment</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select form-select-lg border-0 bg-light" style="font-size: 1rem;">
                            <option value="">All Status</option>
                            <option value="approved">Approved</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-lg-2 padding-button-0">
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
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Order ID</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Reference Number</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Coin Amount</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Price</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Order Date</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Pay With</th>
                                <th class="border-0 py-4 px-4" style="background: #f8f9fa; font-size: 0.95rem;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topUpHistory ?? [] as $index => $history)
                                <tr>
                                    <td class="py-4 px-4">{{ $index + 1 }}</td>
                                    <td class="py-4 px-4">
                                        <span class="fw-medium">{{ $history->order_id ?? '-' }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="fw-medium">{{ $history->reference_number ?? '-' }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-medium">{{ number_format($history->coin_amount ?? 0) }}</span>
                                            <i class="bi bi-coin text-warning"></i>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="fw-medium">${{ number_format($history->price ?? 0, 2) }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="text-muted">{{ $history->created_at ? $history->created_at->format('Y-m-d H:i:s') : '-' }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="badge {{ $history->payment_method === 'qr' ? 'bg-primary' : 'bg-success' }} rounded-pill px-3 py-2">
                                            {{ ucfirst($history->payment_method ?? '-') }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="badge {{ $history->status === 'approved' ? 'bg-success' : 'bg-warning' }} rounded-pill px-3 py-2">
                                            {{ ucfirst($history->status ?? 'pending') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-4 px-4 text-center text-muted">
                                        No top-up history found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(isset($topUpHistory) && method_exists($topUpHistory, 'links'))
                <div class="card-footer border-0 bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">
                            Showing {{ $topUpHistory->firstItem() ?? 0 }} to {{ $topUpHistory->lastItem() ?? 0 }} of {{ $topUpHistory->total() ?? 0 }} entries
                        </p>
                        <nav aria-label="Page navigation">
                            <div class="pagination">
                                @if($topUpHistory->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link d-flex align-items-center gap-2">
                                            <i class="bi bi-chevron-left"></i>
                                            Previous
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link d-flex align-items-center gap-2" href="{{ $topUpHistory->previousPageUrl() }}" rel="prev">
                                            <i class="bi bi-chevron-left"></i>
                                            Previous
                                        </a>
                                    </li>
                                @endif

                                @foreach($topUpHistory->getUrlRange(1, $topUpHistory->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $topUpHistory->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if($topUpHistory->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link d-flex align-items-center gap-2" href="{{ $topUpHistory->nextPageUrl() }}" rel="next">
                                            Next
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link d-flex align-items-center gap-2">
                                            Next
                                            <i class="bi bi-chevron-right"></i>
                                        </span>
                                    </li>
                                @endif
                            </div>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
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
        .page-link {
            border: none;
            color: #6c757d;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            margin: 0 0.25rem;
            font-weight: 500;
        }
        .page-link:hover {
            background-color: #f8f9fa;
            color: #000;
        }
        .page-link:focus {
            box-shadow: none;
        }
        .page-item.active .page-link {
            background-color: #f1c40f;
            color: #000;
            border: none;
        }
        .page-item.disabled .page-link {
            background-color: transparent;
            color: #6c757d;
            opacity: 0.5;
        }
        .pagination {
            margin-bottom: 0;
            gap: 0.25rem;
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
        .badge {
            font-weight: 500;
            font-size: 0.85rem;
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