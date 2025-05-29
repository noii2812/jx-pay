@extends('layouts.app')

<x-layout>
    {{-- Add static data array --}}
    @php
        $orders = [
            [
                'id' => 'TRX-2024001',
                'user' => ['name' => 'John Doe', 'username' => '@johndoe'],
                'coins' => 1000,
                'amount' => 99.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-15 14:30'
            ],
            [
                'id' => 'TRX-2024002',
                'user' => ['name' => 'Jane Smith', 'username' => '@janesmith'],
                'coins' => 500,
                'amount' => 49.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-15 12:15'
            ],
            [
                'id' => 'TRX-2024003',
                'user' => ['name' => 'Mike Johnson', 'username' => '@mikejohnson'],
                'coins' => 2000,
                'amount' => 189.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Declined', 'class' => 'danger'],
                'date' => '2024-03-14 18:45'
            ],
            [
                'id' => 'TRX-2024004',
                'user' => ['name' => 'Sarah Wilson', 'username' => '@sarahwilson'],
                'coins' => 750,
                'amount' => 74.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-14 15:20'
            ],
            [
                'id' => 'TRX-2024005',
                'user' => ['name' => 'Alex Brown', 'username' => '@alexbrown'],
                'coins' => 1500,
                'amount' => 149.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-14 10:45'
            ],
            [
                'id' => 'TRX-2024006',
                'user' => ['name' => 'Emma Davis', 'username' => '@emmadavis'],
                'coins' => 3000,
                'amount' => 289.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-14 09:30'
            ],
            [
                'id' => 'TRX-2024007',
                'user' => ['name' => 'Tom Wilson', 'username' => '@tomwilson'],
                'coins' => 200,
                'amount' => 19.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-14 08:15'
            ],
            [
                'id' => 'TRX-2024008',
                'user' => ['name' => 'Linda Chen', 'username' => '@lindachen'],
                'coins' => 5000,
                'amount' => 479.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 22:45'
            ],
            [
                'id' => 'TRX-2024009',
                'user' => ['name' => 'Robert Kim', 'username' => '@robertkim'],
                'coins' => 1200,
                'amount' => 119.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 20:30'
            ],
            [
                'id' => 'TRX-2024010',
                'user' => ['name' => 'Maria Garcia', 'username' => '@mariagarcia'],
                'coins' => 800,
                'amount' => 79.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 18:20'
            ],
            [
                'id' => 'TRX-2024011',
                'user' => ['name' => 'David Lee', 'username' => '@davidlee'],
                'coins' => 2500,
                'amount' => 239.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 16:45'
            ],
            [
                'id' => 'TRX-2024012',
                'user' => ['name' => 'Sophie Turner', 'username' => '@sophieturner'],
                'coins' => 350,
                'amount' => 34.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 15:10'
            ],
            [
                'id' => 'TRX-2024013',
                'user' => ['name' => 'Chris Martin', 'username' => '@chrismartin'],
                'coins' => 1800,
                'amount' => 179.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 14:25'
            ],
            [
                'id' => 'TRX-2024014',
                'user' => ['name' => 'Amanda White', 'username' => '@amandawhite'],
                'coins' => 600,
                'amount' => 59.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 12:40'
            ],
            [
                'id' => 'TRX-2024015',
                'user' => ['name' => 'Kevin Brown', 'username' => '@kevinbrown'],
                'coins' => 4000,
                'amount' => 389.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 11:15'
            ],
            [
                'id' => 'TRX-2024016',
                'user' => ['name' => 'Rachel Green', 'username' => '@rachelgreen'],
                'coins' => 900,
                'amount' => 89.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 10:30'
            ],
            [
                'id' => 'TRX-2024017',
                'user' => ['name' => 'Daniel Park', 'username' => '@danielpark'],
                'coins' => 1600,
                'amount' => 159.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 09:45'
            ],
            [
                'id' => 'TRX-2024018',
                'user' => ['name' => 'Lisa Anderson', 'username' => '@lisaanderson'],
                'coins' => 300,
                'amount' => 29.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Pending', 'class' => 'warning'],
                'date' => '2024-03-13 08:20'
            ],
            [
                'id' => 'TRX-2024019',
                'user' => ['name' => 'James Wilson', 'username' => '@jameswilson'],
                'coins' => 2200,
                'amount' => 219.99,
                'payment_method' => ['type' => 'Credit Card', 'icon' => 'bi-credit-card'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 07:15'
            ],
            [
                'id' => 'TRX-2024020',
                'user' => ['name' => 'Emily Taylor', 'username' => '@emilytaylor'],
                'coins' => 700,
                'amount' => 69.99,
                'payment_method' => ['type' => 'PayPal', 'icon' => 'bi-paypal'],
                'status' => ['name' => 'Completed', 'class' => 'success'],
                'date' => '2024-03-13 06:30'
            ]
        ];

        // Update statistics based on new data
        $statistics = [
            'total_revenue' => array_sum(array_column($orders, 'amount')),
            'completed_orders' => count(array_filter($orders, fn($order) => $order['status']['name'] === 'Completed')),
            'pending_orders' => count(array_filter($orders, fn($order) => $order['status']['name'] === 'Pending')),
            'declined_orders' => count(array_filter($orders, fn($order) => $order['status']['name'] === 'Declined'))
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
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                New Order
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
                                placeholder="Search transaction ID or username..." id="searchInput">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <select class="form-select w-auto">
                                <option value="">All Status</option>
                                <option value="completed">Completed</option>
                                <option value="pending">Pending</option>
                                <option value="declined">Declined</option>
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
                                <h3 class="mb-0">${{ number_format($statistics['total_revenue'], 2) }}</h3>
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
                                <h3 class="mb-0">{{ $statistics['completed_orders'] }}</h3>
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
                                <h3 class="mb-0">{{ $statistics['pending_orders'] }}</h3>
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
                                <h3 class="mb-0">{{ $statistics['declined_orders'] }}</h3>
                            </div>
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
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="text-primary">#{{ $order['id'] }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                            style="width: 35px; height: 35px;">
                                            <i class="bi bi-person text-secondary"></i>
                                        </div>
                                        <div class="ms-2">
                                            <div>{{ $order['user']['name'] }}</div>
                                            <small class="text-muted">{{ $order['user']['username'] }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        {{ number_format($order['coins']) }}
                                    </div>
                                </td>
                                <td>${{ number_format($order['amount'], 2) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi {{ $order['payment_method']['icon'] }} me-1"></i>
                                        {{ $order['payment_method']['type'] }}
                                    </div>
                                </td>
                                <td><span class="badge bg-{{ $order['status']['class'] }}">{{ $order['status']['name'] }}</span></td>
                                <td>{{ $order['date'] }}</td>
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
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing <strong>1-{{ count($orders) }}</strong> of <strong>50</strong> orders
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
                    const transactionId = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const username = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    
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
            const pendingActions = document.getElementById('pendingActions');
            const downloadReceiptBtn = document.getElementById('downloadReceiptBtn');
            const approveButton = document.getElementById('approveButton');
            const declineButton = document.getElementById('declineButton');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const order = {
                        id: row.querySelector('td:nth-child(2)').textContent.trim(),
                        user: {
                            name: row.querySelector('td:nth-child(3) div:first-child').textContent.trim(),
                            username: row.querySelector('td:nth-child(3) small').textContent.trim()
                        },
                        coins: row.querySelector('td:nth-child(4)').textContent.trim(),
                        amount: row.querySelector('td:nth-child(5)').textContent.trim(),
                        payment_method: {
                            type: row.querySelector('td:nth-child(6)').textContent.trim(),
                            icon: row.querySelector('td:nth-child(6) i').classList.contains('bi-credit-card') ? 'bi-credit-card' : 'bi-paypal'
                        },
                        status: {
                            name: row.querySelector('td:nth-child(7) span').textContent.trim(),
                            class: row.querySelector('td:nth-child(7) span').classList.contains('bg-success') ? 'success' : 
                                   row.querySelector('td:nth-child(7) span').classList.contains('bg-warning') ? 'warning' : 'danger'
                        },
                        date: row.querySelector('td:nth-child(8)').textContent.trim()
                    };

                    // Update modal content
                    document.getElementById('modalTransactionId').textContent = order.id;
                    document.getElementById('modalDateTime').textContent = order.date;
                    document.getElementById('modalUserName').textContent = order.user.name;
                    document.getElementById('modalUsername').textContent = order.user.username;
                    document.getElementById('modalPaymentMethod').textContent = order.payment_method.type;
                    document.getElementById('modalPaymentIcon').className = `bi ${order.payment_method.icon} fs-4 text-primary`;
                    document.getElementById('modalCoins').textContent = order.coins;
                    document.getElementById('modalAmount').textContent = order.amount;
                    document.getElementById('modalOrderStatus').className = `badge bg-${order.status.class}`;
                    document.getElementById('modalOrderStatus').textContent = order.status.name;

                    // Calculate and display rate
                    const coins = parseInt(order.coins.replace(/,/g, ''));
                    const amount = parseFloat(order.amount.replace(/[$,]/g, ''));
                    const rate = (amount / coins).toFixed(3);
                    document.getElementById('modalRate').textContent = `$${rate} per coin`;

                    // Show/hide pending actions and download receipt button based on status
                    if (order.status.name === 'Pending') {
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
                const transactionId = document.getElementById('modalTransactionId').textContent;
                
                if (confirm(`Are you sure you want to approve the payment for ${transactionId}?`)) {
                    // Update the status in the table
                    const row = findTableRow(transactionId);
                    if (row) {
                        const statusBadge = row.querySelector('td:nth-child(7) span');
                        statusBadge.className = 'badge bg-success';
                        statusBadge.textContent = 'Completed';
                        
                        // Show success message
                        showNotification('success', `Payment for ${transactionId} has been approved successfully.`);
                        
                        // Close the modal
                        orderDetailModal.hide();
                    }
                }
            });

            // Handle decline button click
            declineButton.addEventListener('click', function() {
                const transactionId = document.getElementById('modalTransactionId').textContent;
                
                if (confirm(`Are you sure you want to decline the payment for ${transactionId}?`)) {
                    // Update the status in the table
                    const row = findTableRow(transactionId);
                    if (row) {
                        const statusBadge = row.querySelector('td:nth-child(7) span');
                        statusBadge.className = 'badge bg-danger';
                        statusBadge.textContent = 'Declined';
                        
                        // Show error message
                        showNotification('error', `Payment for ${transactionId} has been declined.`);
                        
                        // Close the modal
                        orderDetailModal.hide();
                    }
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
                notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
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
        });
    </script>
</x-layout>
 {{-- Order Detail Modal --}}
 <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="orderDetailModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    {{-- Transaction Info --}}
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="card-title mb-0">Transaction Information</h6>
                                    <span class="badge bg-primary" id="modalOrderStatus"></span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <p class="text-muted mb-1">Transaction ID</p>
                                        <p class="fw-bold mb-0" id="modalTransactionId"></p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p class="text-muted mb-1">Date & Time</p>
                                        <p class="fw-bold mb-0" id="modalDateTime"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- User Info --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-3">User Information</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                        style="width: 48px; height: 48px;">
                                        <i class="bi bi-person fs-4 text-secondary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-0" id="modalUserName"></p>
                                        <p class="text-muted mb-0" id="modalUsername"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Info --}}
                    <div class="col-12 col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Payment Information</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                        style="width: 48px; height: 48px;">
                                        <i class="bi fs-4 text-primary" id="modalPaymentIcon"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-0" id="modalPaymentMethod"></p>
                                        <p class="text-muted mb-0">Payment Method</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Order Summary --}}
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Order Summary</h6>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                            <span class="text-muted">Coins Purchased</span>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-coin text-warning me-1"></i>
                                                <span class="fw-bold" id="modalCoins"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Total Amount</span>
                                            <span class="fw-bold" id="modalAmount"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="bg-light rounded p-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="text-muted">Rate</span>
                                                <span class="fw-bold" id="modalRate"></span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-muted">Processing Fee</span>
                                                <span class="fw-bold">$0.00</span>
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
                <button type="button" class="btn btn-primary" id="downloadReceiptBtn">Download Receipt</button>
            </div>
        </div>
    </div>
</div>