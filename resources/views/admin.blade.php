
<x-layout>
    
    {{-- Notification Bar --}}
    <div class="navbar navbar-expand-lg navbar-light bg-transparent rounded-3 mb-4">
        <div class="container-fluid">
            <h5 style="font-size: 1.5rem; font-weight: 600; margin-top: 1rem;">
            Admin Board
            </h5>
            <div class="d-flex ms-auto">
                <div class="dropdown">
                    <button class="btn position-relative" type="button" id="notificationDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $pendingOrders > 0 ? $pendingOrders : '' }}
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown"
                        style="width: 300px;">
                        <li>
                            <h6 class="dropdown-header">Notifications</h6>
                        </li>
                        @if($pendingOrders > 0)
                        <li><a class="dropdown-item" href="/orderCoin?status=pending">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-cart text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">{{ $pendingOrders }} pending orders</p>
                                        <small class="text-muted">Require your approval</small>
                                    </div>
                                </div>
                            </a></li>
                        @endif
                        <li><a class="dropdown-item" href="/users">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-person-plus text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">Manage users</p>
                                        <small class="text-muted">View all registered users</small>
                                    </div>
                                </div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Coin Statistics --}}
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(13, 110, 253, 0.1)">
                                <i class="bi bi-coin text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Total Coins</p>
                            <h3 class="mb-0 fw-bold">{{ number_format($totalCoins) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(25, 135, 84, 0.1)">
                                <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Today's Sales</p>
                            <h3 class="mb-0 fw-bold">{{ $todaySales }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(255, 193, 7, 0.1)">
                                <i class="bi bi-clock-history text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Pending Orders</p>
                            <h3 class="mb-0 fw-bold">{{ $pendingOrders }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(220, 53, 69, 0.1)">
                                <i class="bi bi-currency-dollar text-danger fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Total Revenue</p>
                            <h3 class="mb-0 fw-bold">${{ number_format($totalRevenue, 2) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Coin List --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" style="font-size: 1.2rem; font-weight: 600; color: #414141;">Order Coin List</h5>
                </div>
                <div class="col-auto">
                    {{-- <a href="/orderCoin" class="btn btn-primary btn-sm navigation-btn">
                        <i class="bi bi-list-ul me-1"></i>View All Orders
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User</th>
                            <th scope="col">Coins</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTransactions as $transaction)
                        <tr>
                            <td>#{{ $transaction->order_id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                        style="width: 35px; height: 35px;">
                                        <i class="bi bi-person text-secondary"></i>
                                    </div>
                                    <div class="ms-2">{{ $transaction->user->username ?? 'Unknown User' }}</div>
                                </div>
                            </td>
                            <td>{{ number_format($transaction->coin) }}</td>
                            <td>${{ number_format($transaction->price, 2) }}</td>
                            <td>
                                @if($transaction->status == 'approved')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($transaction->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($transaction->status == 'declined')
                                    <span class="badge bg-danger">Failed</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($transaction->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-light me-2 view-order" data-order-id="{{ $transaction->order_id }}" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @if($transaction->status == 'pending')
                                <form action="{{ route('orderCoin.approve', $transaction->order_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                </form>
                                <form action="{{ route('orderCoin.reject', $transaction->order_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Reject">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No transactions found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(count($recentTransactions) > 0)
            <div class="text-center mt-3">
                <a href="/orderCoin" class="btn btn-outline-primary btn-sm navigation-btn">View All Transactions</a>
            </div>
            @endif
        </div>
    </div>

    

    {{-- User Data Table --}}
    <div class="d-flex justify-content-between align-items-center">
        <h5 style="font-size: 1.2rem; font-weight: 600; margin-top: 1rem; color: #414141;">
            Registered Users
        </h5>
        {{-- <a href="/users" class="btn btn-primary btn-sm navigation-btn">View All Users</a> --}}
    </div>
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Join Date</th>
                            <th scope="col">Coins</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>{{ number_format($user->coin) }}</td>
                            <td>
                                @if($user->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif($user->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($user->status == 'inactive')
                                    <span class="badge bg-danger">Inactive</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($user->status ?? 'Unknown') }}</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2 edit-user" data-user-id="{{ $user->id }}">Edit</button>
                                <button class="btn btn-sm btn-outline-danger delete-user" data-user-id="{{ $user->id }}">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No users found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(count($recentUsers) > 0)
            <div class="text-center mt-3">
                <a href="/users" class="btn btn-outline-primary btn-sm navigation-btn">View All Users</a>
            </div>
            @endif
        </div>
    </div>
</x-layout>

<x-loading-animation />
{{-- Order Payment Detail Modal --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 bg-light">
                <h5 class="modal-title" id="orderDetailModalLabel"
                    style="font-size: 1.2rem; font-weight: 600; color: #414141;">
                    Order Payment Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="orderDetailContent">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading order details...</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Edit User Modal --}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 bg-light">
                <h5 class="modal-title" id="editUserModalLabel"
                    style="font-size: 1.2rem; font-weight: 600; color: #414141;">
                    Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="editUserContent">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading user details...</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-content {
        background-color: #e8f4ff;
    }
    body {
            background-color: #e8f4ff;
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }
    /* Animation for statistics cards */
    .stat-card {
        transition: all 0.3s ease;
        transform: translateY(20px);
        opacity: 0;
    }
    
    .stat-card.animate {
        transform: translateY(0);
        opacity: 1;
    }
    
    /* Add hover effect */
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
{{-- Update the view and edit buttons to trigger the modal --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // View order details
        document.querySelectorAll('.view-order').forEach(button => {
            button.addEventListener('click', function () {
                const orderId = this.getAttribute('data-order-id');
                const modalContent = document.getElementById('orderDetailContent');
                
                // Show loading state
                modalContent.innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading order details...</p>
                    </div>
                `;
                
                var modal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
                modal.show();
                
                // Fetch order details
                fetch('/api/orders/' + orderId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const transaction = data.data;
                            const user = transaction.user || { username: 'Unknown User', email: 'N/A' };
                            const statusBadge = getStatusBadge(transaction.status);
                            const paymentDate = new Date(transaction.created_at).toLocaleString();
                            
                            // Format the modal content with real data
                            modalContent.innerHTML = `
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="card border-0 bg-light h-100">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-3 text-muted">Order Information</h6>
                                            <div class="mb-3">
                                                <small class="text-muted d-block">Order ID</small>
                                                <strong>#${transaction.order_id}</strong>
                                            </div>
                                            <div class="mb-3">
                                                <small class="text-muted d-block">Date</small>
                                                <strong>${paymentDate}</strong>
                                            </div>
                                            <div class="mb-3">
                                                <small class="text-muted d-block">Payment Status</small>
                                                ${statusBadge}
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Payment Method</small>
                                                <div class="d-flex align-items-center mt-1">
                                                    <i class="bi bi-credit-card me-2"></i>
                                                    <strong>${transaction.payment_method || 'Not specified'}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card border-0 bg-light h-100">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-3 text-muted">Customer Information</h6>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center"
                                                    style="width: 48px; height: 48px;">
                                                    <i class="bi bi-person text-secondary fs-4"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-1">${user.username}</h6>
                                                    <small class="text-muted">Customer since ${new Date(user.created_at).toLocaleDateString()}</small>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <small class="text-muted d-block">Email</small>
                                                <strong>${user.email}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-3 text-muted">Order Details</h6>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead class="text-muted" style="font-size: 0.875rem;">
                                                        <tr>
                                                            <th>Item</th>
                                                            <th class="text-end">Amount</th>
                                                            <th class="text-end">Price</th>
                                                            <th class="text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Game Coins</td>
                                                            <td class="text-end">${transaction.coin}</td>
                                                            <td class="text-end">$${(transaction.price / transaction.coin).toFixed(2)}</td>
                                                            <td class="text-end">$${parseFloat(transaction.price).toFixed(2)}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-end fw-bold">Total</td>
                                                            <td class="text-end fw-bold">$${parseFloat(transaction.price).toFixed(2)}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                
                                // Add action buttons if the transaction is pending
                                if (transaction.status === 'pending') {
                                    modalContent.innerHTML += `
                                    <div class="col-12">
                                        <div class="payment-actions border-top pt-3">
                                            <div class="d-flex justify-content-end gap-2">
                                                <form action="/orderCoin/${transaction.order_id}/reject" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="bi bi-x-circle me-1"></i>
                                                        Decline Payment
                                                    </button>
                                                </form>
                                                <form action="/orderCoin/${transaction.order_id}/approve" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="bi bi-check-circle me-1"></i>
                                                        Approve Payment
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>`;
                                }
                                
                                modalContent.innerHTML += '</div>'; // Close the row
                        }
                    })
                    .catch(error => {
                        modalContent.innerHTML = `
                            <div class="alert alert-danger">
                                Error loading order details. Please try again.
                            </div>
                        `;
                        console.error('Error fetching order details:', error);
                    });
            });
        });

        // Edit user
        document.querySelectorAll('.edit-user').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                const modalContent = document.getElementById('editUserContent');
                
                // Show loading state
                modalContent.innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading user details...</p>
                    </div>
                `;
                
                var modal = new bootstrap.Modal(document.getElementById('editUserModal'));
                modal.show();
                
                // Fetch user details
                fetch('/api/users/' + userId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const user = data.data;
                            
                            // Format the modal content with real data
                            modalContent.innerHTML = `
                            <form id="editUserForm" action="/users/${user.id}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="card border-0 bg-light">
                                            <div class="card-body">
                                                <h6 class="card-subtitle mb-3 text-muted">Basic Information</h6>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Username</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-person"></i>
                                                        </span>
                                                        <input type="text" name="username" class="form-control" value="${user.username}" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-envelope"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" value="${user.email}" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-key"></i>
                                                        </span>
                                                        <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
                                                    </div>
                                                    <div class="form-text">Leave blank if you don't want to change the password</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Phone Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-telephone"></i>
                                                        </span>
                                                        <input type="tel" name="phone" class="form-control" value="${user.phone || ''}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card border-0 bg-light">
                                            <div class="card-body">
                                                <h6 class="card-subtitle mb-3 text-muted">Additional Information</h6>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-geo-alt"></i>
                                                        </span>
                                                        <textarea name="address" class="form-control" rows="3">${user.address || ''}</textarea>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Status</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-toggle-on"></i>
                                                        </span>
                                                        <select name="status" class="form-select">
                                                            <option value="active" ${user.status === 'active' ? 'selected' : ''}>Active</option>
                                                            <option value="pending" ${user.status === 'pending' ? 'selected' : ''}>Pending</option>
                                                            <option value="inactive" ${user.status === 'inactive' ? 'selected' : ''}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small text-muted">Coins Balance</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white">
                                                            <i class="bi bi-coin"></i>
                                                        </span>
                                                        <input type="number" name="coin" class="form-control" value="${user.coin || 0}">
                                                    </div>
                                                    <div class="form-text">Current coin balance in user's account</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        <i class="bi bi-x me-1"></i>
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check2 me-1"></i>
                                        Save Changes
                                    </button>
                                </div>
                            </form>`;
                        }
                    })
                    .catch(error => {
                        modalContent.innerHTML = `
                            <div class="alert alert-danger">
                                Error loading user details. Please try again.
                            </div>
                        `;
                        console.error('Error fetching user details:', error);
                    });
            });
        });

        // Delete user confirmation
        document.querySelectorAll('.delete-user').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                    // Create a form and submit it
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/users/${userId}`;
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    
                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
        
        // Helper function to get status badge HTML
        function getStatusBadge(status) {
            switch(status) {
                case 'approved':
                    return '<span class="badge bg-success">Completed</span>';
                case 'pending':
                    return '<span class="badge bg-warning">Pending</span>';
                case 'declined':
                    return '<span class="badge bg-danger">Failed</span>';
                default:
                    return `<span class="badge bg-secondary">${status}</span>`;
            }
        }
    });
</script>

{{-- Loading Animation Overlay --}}
<div id="loading-overlay" class="position-fixed d-none" style="top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); z-index: 9999; display: flex; justify-content: center; align-items: center;">
    <div class="text-center p-4 rounded-4 shadow-lg" style="background-color: #fff; max-width: 300px;">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success mx-2" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <h5 class="mt-4 mb-2">Loading Data</h5>
        <p class="text-muted mb-0">Please wait while we fetch the latest information...</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading animation to navigation buttons
        const navigationButtons = document.querySelectorAll('.navigation-btn');
        
        navigationButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const loadingOverlay = document.getElementById('loading-overlay');
                loadingOverlay.classList.remove('d-none');
                loadingOverlay.style.display = 'flex';
            });
        });
    });
</script>

{{-- Toast Notification --}}
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="bi bi-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <i class="bi bi-database-check me-2"></i> Real-time data loaded successfully!
        </div>
    </div>
</div>

<script>
    // Show toast notification when page loads
    window.addEventListener('load', function() {
        // const toast = new bootstrap.Toast(document.getElementById('liveToast'));
        // setTimeout(() => {
        //     toast.show();
        // }, 500);
    });
</script>

<script>
    // Animate statistics cards on page load
    window.addEventListener('load', function() {
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate');
            }, 100 * (index + 1));
        });
    });
</script>