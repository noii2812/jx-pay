<x-layout>
    {{-- Add static data array --}}
    @php
        // Update statistics based on new data
        $stats = [
            'total_revenue' => 0,
            'completed_orders' => $statistics['completed_orders'],
            'pending_orders' => $statistics['pending_orders'],
            'declined_orders' => $statistics['declined_orders'],
        ];
    @endphp

    <div class="container-fluid">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1" style="font-weight: 600; color: #414141;">Order Coin Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Admin Board</a></li>
                        <li class="breadcrumb-item active">Order Coin</li>
                    </ol>
                </nav>
            </div>
            {{-- <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                New Order
            </button> --}}
        </div>

        {{-- Statistics Cards --}}
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-3 p-3" style="background-color: rgba(13, 110, 253, 0.1)">
                                    <i class="bi bi-currency-dollar text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Total Revenue</p>
                                <h3 class="mb-0">${{ number_format($stats['total_revenue'], 2) }}</h3>
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
                                    <i class="bi bi-check-circle text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Completed Orders</p>
                                <h3 class="mb-0">{{ $stats['completed_orders'] }}</h3>
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
                                    <i class="bi bi-clock text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Pending Orders</p>
                                <h3 class="mb-0">{{ $stats['pending_orders'] }}</h3>
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
                                    <i class="bi bi-x-circle text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-muted mb-1">Declined Orders</p>
                                <h3 class="mb-0">{{ $stats['declined_orders'] }}</h3>
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
                                placeholder="Search transaction ID or username..." id="searchInput">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <select class="form-select w-auto" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="approved">Completed</option>
                                <option value="pending">Pending</option>
                                <option value="declined">Declined</option>
                            </select>
                            <button class="btn btn-primary text-white" id="filterButton">
                                <i class="bi bi-funnel me-1"></i>
                                Apply
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


        {{-- Orders Table --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Ref.</th>
                                <th scope="col">User</th>
                                <th scope="col">Coins</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $order)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td><span class="">{{ $order->order_id }}</span></td>
                                    <td><span class="text-primary">{{ $order->reference_id }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px;">
                                                <i class="bi bi-person text-secondary"></i>
                                            </div>
                                            <div class="ms-2">
                                                <small class="text-muted">{{ $order->user->username }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-coin text-warning me-1"></i>
                                            {{ number_format($order->coin) }}
                                        </div>
                                    </td>
                                    <td>${{ number_format($order->price, 2) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($order->payment_method == 'khqr')
                                                <i class="bi bi-qr-code me-1"></i>
                                            @elseif($order->payment_method == 'cash')
                                                <i class="bi bi-cash me-1"></i>
                                            @endif
                                            {{ $order->payment_method }}
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge text-white bg-{{ $order->status === 'approved' ? 'success' : ($order->status === 'pending' ? 'warning' : 'danger') }}">{{ $order->status }}</span>
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" title="View">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-end mt-4">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>



    {{-- Add JavaScript for functionality --}}
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
                    const transactionId = row.querySelector('td:nth-child(2)').textContent
                        .toLowerCase();
                    const username = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                    if (transactionId.includes(searchTerm) || username.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Order Detail Modal Functionality
            const orderDetailModal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
            const viewButtons = document.querySelectorAll('.btn-outline-primary');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const order = {
                        id: row.querySelector('td:nth-child(2)').textContent.trim(),
                        ref: row.querySelector('td:nth-child(3)').textContent.trim(),
                        username: row.querySelector('td:nth-child(4) small').textContent.trim(),
                        coins: row.querySelector('td:nth-child(5)').textContent.trim(),
                        amount: row.querySelector('td:nth-child(6)').textContent.trim(),
                        payment_method: row.querySelector('td:nth-child(7)').textContent.trim(),
                        status: row.querySelector('td:nth-child(8) span').textContent.trim(),
                        date: row.querySelector('td:nth-child(9)').textContent.trim()
                    };

                    // Update modal content
                    document.getElementById('modalTransactionId').textContent = order.id;
                    document.getElementById('modalRefId').textContent = order.ref;
                    document.getElementById('modalDateTime').textContent = order.date;
                    document.getElementById('modalUsername').textContent = order.username;
                    document.getElementById('modalPaymentMethod').textContent = order
                    .payment_method;
                    document.getElementById('modalCoins').textContent = order.coins;
                    document.getElementById('modalAmount').textContent = order.amount;
                    document.getElementById('modalOrderStatus').textContent = order.status;


                    const modalOrderStatus = document.getElementById('modalOrderStatus');
                    modalOrderStatus.className = 'badge';

                    switch (order.status.toLowerCase()) {
                        case 'pending':
                            modalOrderStatus.classList.add('bg-warning');
                            break;
                        case 'approved':
                            modalOrderStatus.classList.add('bg-success');
                            break;
                        case 'declined':
                            modalOrderStatus.classList.add('bg-danger');
                            break;
                        default:
                            modalOrderStatus.classList.add('bg-secondary');
                    }
                    // Show/hide pending actions based on status
                    const pendingActions = document.getElementById('pendingActions');
                    const downloadReceiptBtn = document.getElementById('downloadReceiptBtn');

                    if (order.status.toLowerCase() === 'pending') {
                        pendingActions.classList.remove('d-none');
                        downloadReceiptBtn.classList.add('d-none');
                    } else {
                        pendingActions.classList.add('d-none');
                        downloadReceiptBtn.classList.remove('d-none');
                    }

                    orderDetailModal.show();
                });
            });

            // Handle approve button click
            approveButton.addEventListener('click', function() {
                const id = document.getElementById('modalTransactionId').textContent;
                if (confirm(`Are you sure you want to approve the payment for ${id}?`)) {
                    fetch(`/orderCoin/${id}/approve`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content,
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            if (data.success) {
                                // Update the status in the table
                                const row = findTableRow(id);
                                if (row) {
                                    const statusBadge = row.querySelector('td:nth-child(8) span');
                                    statusBadge.className = 'badge bg-success';
                                    statusBadge.textContent = 'Approved';

                                    // Show success message
                                    showNotification('success',
                                        `Payment for ${id} has been approved successfully.`);

                                    // Close the modal
                                    orderDetailModal.hide();
                                }
                            } else {
                                showNotification('error',
                                    'Failed to approve payment. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showNotification('error', 'An error occurred while approving the payment.');
                        });
                }
            });

            // Handle decline button click
            declineButton.addEventListener('click', function() {
                const id = document.getElementById('modalTransactionId').textContent;
                if (confirm(`Are you sure you want to reject the payment for ${id}?`)) {
                    fetch(`/orderCoin/${id}/reject`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content,
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            if (data.success) {
                                // Update the status in the table
                                const row = findTableRow(id);
                                if (row) {
                                    const statusBadge = row.querySelector('td:nth-child(8) span');
                                    statusBadge.className = 'badge bg-danger';
                                    statusBadge.textContent = 'Rejected';

                                    // Show success message
                                    showNotification('success',
                                        `Payment for ${id} has been rejected successfully.`);

                                    // Close the modal
                                    orderDetailModal.hide();
                                }
                            } else {
                                showNotification('error',
                                'Failed to reject payment. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showNotification('error', 'An error occurred while approving the payment.');
                        });
                }
            });

            // Helper function to find table row by transaction ID
            function findTableRow(transactionId) {
                const rows = document.querySelectorAll('tbody tr');
                for (const row of rows) {
                    const rowId = row.querySelector('td:nth-child(2)').textContent.trim();
                    if (rowId === transactionId) {
                        return row;
                    }
                }
                return null;
            }

            // Helper function to show notifications
            function showNotification(type, message) {
                // Create notification element
                const notification = document.createElement('div');
                notification.className =
                    `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
                notification.style.zIndex = '1050';
                notification.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;

                // Add to document
                document.body.appendChild(notification);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    notification.remove();
                }, 5000);
            }

            // Add status filter functionality
            const statusFilter = document.getElementById('statusFilter');
            const filterButton = document.getElementById('filterButton');

            // Set initial status from URL if present
            const urlParams = new URLSearchParams(window.location.search);
            const statusParam = urlParams.get('status');
            if (statusParam) {
                statusFilter.value = statusParam;
            }

            filterButton.addEventListener('click', function() {
                const selectedStatus = statusFilter.value;
                const currentUrl = new URL(window.location.href);
                
                if (selectedStatus) {
                    currentUrl.searchParams.set('status', selectedStatus);
                } else {
                    currentUrl.searchParams.delete('status');
                }
                
                window.location.href = currentUrl.toString();
            });
        });
    </script>
</x-layout>
{{-- Order Detail Modal --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light border-0">
                <div class="d-flex align-items-center">
                    <i class="bi bi-receipt me-2 fs-4 text-primary"></i>
                    <h5 class="modal-title mb-0" id="orderDetailModalLabel">Order Details</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    {{-- Transaction Info --}}
                    <div class="col-12">
                        <div class="card border-1">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle me-2 text-primary"></i>
                                        <h6 class="card-title mb-0">Transaction Information</h6>
                                    </div>
                                    <span class="badge bg-primary px-3 py-2" id="modalOrderStatus"></span>
                                </div>
                                <div class="row g-4">
                                    <div class="col-12 col-md-4">
                                        <div class="bg-light rounded p-3">
                                            <p class="text-muted small mb-1">Transaction ID</p>
                                            <p class="fw-bold mb-0" id="modalTransactionId"></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="bg-light rounded p-3">
                                            <p class="text-muted small mb-1">Ref:</p>
                                            <p class="fw-bold mb-0" id="modalRefId"></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="bg-light rounded p-3">
                                            <p class="text-muted small mb-1">Date & Time</p>
                                            <p class="fw-normal mb-0" id="modalDateTime"></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- User & Payment Info --}}
                    <div class="col-12 col-md-6 ">

                        <div class="card border-1 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <h6 class="card-title mb-0">User Information</h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                        style="width: 56px; height: 56px;">
                                        <i class="bi bi-person fs-4 text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1" id="modalUserName"></p>
                                        <p class="text-muted small mb-0" id="modalUsername"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card border-1 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <i class="bi bi-credit-card me-2 text-primary"></i>
                                    <h6 class="card-title mb-0">Payment Information</h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                        style="width: 56px; height: 56px;">
                                        <i class="bi fs-4 text-primary" id="modalPaymentIcon"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1" id="modalPaymentMethod"></p>
                                        <p class="text-muted small mb-0">Payment Method</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Order Summary --}}

                </div>

            </div>
            <div class="col-12 px-4">
                <div class="card border-1">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-cart-check me-2 text-primary"></i>
                            <h6 class="card-title mb-0">Order Summary</h6>
                        </div>
                        <div class="row g-4">
                            <div class="col-12 col-md-0">
                                <div class="bg-light rounded p-4">
                                    <div
                                        class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                        <span class="text-muted">Coins Purchased</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-coin text-warning me-2"></i>
                                            <span class="fw-bold" id="modalCoins"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Total Amount</span>
                                        <span class="fw-bold fs-5" id="modalAmount"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>
                    Close
                </button>
                <div id="pendingActions" class="d-none">
                    <button type="button" class="btn btn-danger me-2" id="declineButton">
                        <i class="bi bi-x-circle me-1"></i>
                        Decline
                    </button>
                    <button type="button" class="btn btn-success" id="approveButton">
                        <i class="bi bi-check-circle me-1"></i>
                        Approve
                    </button>
                </div>
                <button type="button" class="btn btn-primary" id="downloadReceiptBtn">
                    <i class="bi bi-download me-1"></i>
                    Download Receipt
                </button>
            </div>
        </div>
    </div>
</div>
</div>
