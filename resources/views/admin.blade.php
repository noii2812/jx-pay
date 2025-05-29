@extends('layouts.app')

<x-layout>
    {{-- Notification Bar --}}
    <div class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-3 mb-4">
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
                            3
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown"
                        style="width: 300px;">
                        <li>
                            <h6 class="dropdown-header">Notifications</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-cart text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">New order received</p>
                                        <small class="text-muted">5 minutes ago</small>
                                    </div>
                                </div>
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-person-plus text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">New user registered</p>
                                        <small class="text-muted">1 hour ago</small>
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
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(13, 110, 253, 0.1)">
                                <i class="bi bi-coin text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Total Coins</p>
                            <h3 class="mb-0 fw-bold">15,687</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(25, 135, 84, 0.1)">
                                <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Today's Sales</p>
                            <h3 class="mb-0 fw-bold">1,247</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(255, 193, 7, 0.1)">
                                <i class="bi bi-clock-history text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Pending Orders</p>
                            <h3 class="mb-0 fw-bold">23</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-3 p-3" style="background-color: rgba(220, 53, 69, 0.1)">
                                <i class="bi bi-currency-dollar text-danger fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-muted mb-1" style="font-size: 0.875rem">Total Revenue</p>
                            <h3 class="mb-0 fw-bold">$45,289</h3>
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
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>New Order
                    </button>
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
                        <tr>
                            <td>#OC001</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="bi bi-person text-secondary"></i>
                                    </div>
                                    <div class="ms-2">John Doe</div>
                                </div>
                            </td>
                            <td>1,000</td>
                            <td>$99.99</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>2024-03-15</td>
                            <td>
                                <button class="btn btn-sm btn-light me-2" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-light" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#OC002</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="bi bi-person text-secondary"></i>
                                    </div>
                                    <div class="ms-2">Jane Smith</div>
                                </div>
                            </td>
                            <td>500</td>
                            <td>$49.99</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>2024-03-15</td>
                            <td>
                                <button class="btn btn-sm btn-light me-2" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-light" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#OC003</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="bi bi-person text-secondary"></i>
                                    </div>
                                    <div class="ms-2">Mike Johnson</div>
                                </div>
                            </td>
                            <td>2,000</td>
                            <td>$189.99</td>
                            <td><span class="badge bg-danger">Failed</span></td>
                            <td>2024-03-14</td>
                            <td>
                                <button class="btn btn-sm btn-light me-2" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-light" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-end mb-0">
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

    {{-- Recent Orders --}}
    {{-- <h5 style="font-size: 1.2rem; font-weight: 600; margin-top: 1rem; color: #414141;">
        Recent Orders
    </h5>
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card border-0 h-100" style="border-radius: 15px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-success">Completed</span>
                        <small class="text-muted">#ORD-2024001</small>
                    </div>
                    <h5 class="card-title">Gold Package</h5>
                    <p class="card-text text-muted">User: John Doe</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">$199.99</h4>
                        <button class="btn btn-outline-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 h-100" style="border-radius: 15px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-warning">Pending</span>
                        <small class="text-muted">#ORD-2024002</small>
                    </div>
                    <h5 class="card-title">Silver Package</h5>
                    <p class="card-text text-muted">User: Jane Smith</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">$99.99</h4>
                        <button class="btn btn-outline-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 h-100" style="border-radius: 15px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-danger">Cancelled</span>
                        <small class="text-muted">#ORD-2024003</small>
                    </div>
                    <h5 class="card-title">Bronze Package</h5>
                    <p class="card-text text-muted">User: Mike Johnson</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">$49.99</h4>
                        <button class="btn btn-outline-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- User Data Table --}}
    <div class="d-flex justify-content-between align-items-center">
        <h5 style="font-size: 1.2rem; font-weight: 600; margin-top: 1rem; color: #414141;">
            Registered Users
        </h5>
        <a href="/users" class="btn btn-primary btn-sm">View All Users</a>
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
                            <th scope="col">Orders</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>2024-03-15</td>
                            <td>5</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>2024-03-14</td>
                            <td>3</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Mike Johnson</td>
                            <td>mike@example.com</td>
                            <td>2024-03-13</td>
                            <td>1</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Sarah Wilson</td>
                            <td>sarah@example.com</td>
                            <td>2024-03-12</td>
                            <td>2</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-end">
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
</x-layout>

{{-- Order Payment Detail Modal --}}
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header border-0 bg-light">
                <h5 class="modal-title" id="orderDetailModalLabel" style="font-size: 1.2rem; font-weight: 600; color: #414141;">
                    Order Payment Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    {{-- Order Information --}}
                    <div class="col-md-6">
                        <div class="card border-0 bg-light h-100">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-3 text-muted">Order Information</h6>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Order ID</small>
                                    <strong>#OC002</strong>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Date</small>
                                    <strong>March 15, 2024 14:30:45</strong>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Payment Status</small>
                                    <span class="badge bg-warning">Pending</span>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Payment Method</small>
                                    <div class="d-flex align-items-center mt-1">
                                        <i class="bi bi-credit-card me-2"></i>
                                        <strong>Credit Card (**** 1234)</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Customer Information --}}
                    <div class="col-md-6">
                        <div class="card border-0 bg-light h-100">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-3 text-muted">Customer Information</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-circle bg-white d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="bi bi-person text-secondary fs-4"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Jane Smith</h6>
                                        <small class="text-muted">Customer since Mar 2024</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Email</small>
                                    <strong>jane@example.com</strong>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Total Orders</small>
                                    <strong>3 orders</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Order Details --}}
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
                                                <td class="text-end">500</td>
                                                <td class="text-end">$0.10</td>
                                                <td class="text-end">$50.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end text-muted">Subtotal</td>
                                                <td class="text-end">$50.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end text-muted">Processing Fee</td>
                                                <td class="text-end">$0.99</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end fw-bold">Total</td>
                                                <td class="text-end fw-bold">$49.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Actions (Only shown for pending status) --}}
                    <div class="col-12">
                        <div class="payment-actions border-top pt-3">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Decline Payment
                                </button>
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Approve Payment
                                </button>
                            </div>
                        </div>
                    </div>
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
                <h5 class="modal-title" id="editUserModalLabel" style="font-size: 1.2rem; font-weight: 600; color: #414141;">
                    Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="editUserForm">
                    <div class="row g-4">
                        {{-- User Basic Information --}}
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
                                            <input type="text" class="form-control" value="john_doe" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" value="john@example.com" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-key"></i>
                                            </span>
                                            <input type="password" class="form-control" placeholder="Leave blank to keep current">
                                        </div>
                                        <div class="form-text">Leave blank if you don't want to change the password</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- User Additional Information --}}
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
                                            <textarea class="form-control" rows="3">123 Main St, Apt 4B
New York, NY 10001
United States</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Status</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-toggle-on"></i>
                                            </span>
                                            <select class="form-select">
                                                <option value="active" selected>Active</option>
                                                <option value="pending">Pending</option>
                                                <option value="suspended">Suspended</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Coins Balance</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-coin"></i>
                                            </span>
                                            <input type="number" class="form-control" value="1000">
                                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#coinHistoryModal">
                                                <i class="bi bi-clock-history"></i>
                                            </button>
                                        </div>
                                        <div class="form-text">Current coin balance in user's account</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Activity Information --}}
                        <div class="col-12">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="card-subtitle text-muted mb-0">Recent Activity</h6>
                                        <span class="badge bg-primary">5 activities</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td><i class="bi bi-cart-check text-success"></i></td>
                                                    <td>Purchased 500 coins</td>
                                                    <td class="text-end text-muted">2 hours ago</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-person-check text-primary"></i></td>
                                                    <td>Updated profile information</td>
                                                    <td class="text-end text-muted">1 day ago</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-coin text-warning"></i></td>
                                                    <td>Redeemed 200 coins</td>
                                                    <td class="text-end text-muted">3 days ago</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
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
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Update the view and edit buttons to trigger the modal --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to all view buttons
    document.querySelectorAll('[title="View"]').forEach(button => {
        button.addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
            modal.show();
        });
    });

    // Add click event listeners to all edit buttons
    document.querySelectorAll('.btn-outline-primary').forEach(button => {
        button.addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('editUserModal'));
            modal.show();
        });
    });

    // Handle form submission
    document.getElementById('editUserForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        
        // Close the modal after successful submission
        var modal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
        modal.hide();
    });
});
</script>