<x-layout>
    <!-- Add success message for registration -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Top Header Bar -->
   
    <div style="width:100%; border-radius: 1.5rem; margin: -2rem -2rem 2rem -2rem; padding: 1.5rem 2rem 3.5rem 2rem;">
        {{-- <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-white mb-0">Default</h4>
                <small class="text-white-50">Dashboards / Default</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <input type="text" class="form-control" placeholder="Type here..." style="width: 200px;">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="profile-pic" alt="Admin">
                <span class="text-white">Admin</span>
                <i class="bi bi-gear text-white ms-3"></i>
            </div>
        </div> --}}
        <!-- Cards Row -->
        <div class="dashboard-cards mt-4">
            <div class="dashboard-card shadow-sm" style="border-top: 4px solid #22c55e;">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                            <i class="bi bi-wallet2 text-primary fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-muted">Total Coin</div>
                        <div class="h4 mb-0">$53,000</div>
                        <small class="text-success">+55% since yesterday</small>
                    </div>
                </div>
            </div>
            <div class="dashboard-card shadow-sm" style="border-top: 4px solid #0ea5e9;">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div class="bg-info bg-opacity-10 rounded-circle p-2">
                            <i class="bi bi-people text-info fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-muted">Accounts Game</div>
                        <div class="h4 mb-0">1</div>
                        <small class="text-success">+3% since last week</small>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    
    <!-- Main Content Row -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card p-4 h-100">
                <h5>Sales Overview <span class="text-success small ms-2"><i class="bi bi-arrow-up"></i> 4% more in 2021</span></h5>
                <canvas id="salesChart" height="120"></canvas>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card p-4 h-100 d-flex flex-column justify-content-center align-items-center" style="background: linear-gradient(135deg, #a4508b 0%, #5f0a87 100%); color: #fff;">
                <h5>Get started with Argon</h5>
                <p>There's nothing I really wanted to do in life that I wasn't able to get good at.</p>
            </div>
        </div>
    </div>
    <!-- More widgets/cards below -->
    {{-- <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h6>Team Members</h6>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" class="profile-pic me-2" alt="John Michael">
                        <span>John Michael</span>
                        <span class="badge bg-success ms-auto">ONLINE</span>
                        <button class="btn btn-sm btn-outline-primary ms-2">Add</button>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/men/2.jpg" class="profile-pic me-2" alt="Alex Smith">
                        <span>Alex Smith</span>
                        <span class="badge bg-secondary ms-auto">OFFLINE</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h6>To Do List</h6>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center mb-2">
                        <input class="form-check-input me-2" type="checkbox" checked>
                        <span>Call with Dave</span>
                        <span class="ms-auto text-muted small">09:30 AM</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <input class="form-check-input me-2" type="checkbox">
                        <span>Brunch Meeting</span>
                        <span class="ms-auto text-muted small">11:00 AM</span>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h6>Progress Track</h6>
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-gear me-2"></i>
                    <span>React Material Dashboard</span>
                    <span class="badge bg-info ms-auto">In Progress</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle me-2"></i>
                    <span>Argon Dashboard</span>
                    <span class="badge bg-success ms-auto">Done</span>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Example chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 190, 300, 500, 200, 300, 450, 600, 700],
                    borderColor: '#4caf50',
                    backgroundColor: 'rgba(76, 175, 80, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</x-layout>