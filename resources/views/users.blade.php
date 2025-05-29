@extends('layouts.app')

<x-layout>
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
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
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
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
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
                                <td>+1 (555) 987-6543</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        2,750
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>Mar 14, 2024</td>
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
                                <td>+1 (555) 456-7890</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-coin text-warning me-1"></i>
                                        800
                                    </div>
                                </td>
                                <td><span class="badge bg-danger">Suspended</span></td>
                                <td>Mar 13, 2024</td>
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
        });
    </script>
</x-layout>