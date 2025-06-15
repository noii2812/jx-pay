<x-layout>
    {{-- <x-loading-animation /> --}}
    
    <!-- Add success message for registration -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Top Header Bar -->


    <div style="width:100%; border-radius: 1.5rem; margin: 0.5rem -2rem 0rem -2rem; padding: 0rem 2rem;">
        <h2>Overview</h2>
        <!-- Cards Row -->
        <div class="dashboard-cards mt-0">
            <div class="dashboard-card shadow-sm" style="border-top: 4px solid #e1c511;">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                        <div class="rounded-circle p-4 d-flex align-items-center justify-content-center"
                            style="width: 48px; height: 48px; background: rgba(189, 197, 34, 0.1)">
                            <i class="bi bi-coin fs-4" style="color: #e1c511"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-muted">Your Coin</div>
                        <div class="h4 mb-0">{{ $coin }}</div>
                        {{-- <small class="text-success">+55% since yesterday</small> --}}
                    </div>
                </div>
            </div>
            <div class="dashboard-card shadow-sm" style="border-top: 4px solid #07cc9e;">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                        <div class="rounded-circle p-4 d-flex align-items-center justify-content-center"
                            style="width: 48px; height: 48px; background-color: rgba(3, 174, 134, 0.1);">
                            <i class="bi bi-wallet2 fs-4" style="color: #07cc9e"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-muted">Total top-ups</div>
                        <div class="h4 mb-0">{{ $totalTopups }}</div>
                        {{-- <small class="text-success">+3% since last week</small> --}}
                    </div>
                </div>
            </div>
            <div class="dashboard-card shadow-sm" style="border-top: 4px solid #0ea5e9;">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-flex align-items-center justify-content-center"
                            style="width: 48px; height: 48px;">
                            <i class="bi bi-people text-primary fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-muted">Accounts Game</div>
                        <div class="h4 mb-0">{{ $accounts }}</div>
                        {{-- <small class="text-success">+3% since last week</small> --}}
                    </div>
                </div>
            </div>


        </div>
    </div>

    <h2>Activities</h2>
    <!-- Main Content Row -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card p-4 h-100">
                <h5>Transaction Topup Overview <span class="text-success small ms-2"><i class="bi bi-arrow-up"></i>
                        Daily Analysis</span></h5>
                <div id="transactionChart"></div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Recent Transfers</h5>
                    <span class="badge bg-primary rounded-pill">{{ count($recentTransfers) }} transfers</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle" style="border-color: rgba(0,0,0,0.05);">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" style="border-bottom: 1px solid rgba(0,0,0,0.05);">Date</th>
                                <th class="border-0" style="border-bottom: 1px solid rgba(0,0,0,0.05);">To Account</th>
                                <th class="border-0" style="border-bottom: 1px solid rgba(0,0,0,0.05);">Coin</th>
                                {{-- <th class="border-0">Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTransfers as $transfer)
                            <tr>
                                <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle pr-2 me-2">
                                            <i class="bi bi-calendar3 text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $transfer->created_at->format('d M') }}</div>
                                            <small class="text-muted">{{ $transfer->created_at->format('H:i') }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                    <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light p-2 me-2">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                        <span class="fw-medium">{{ $transfer->to_account }}</span>
                                    </div>
                                </td>
                                <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light p-2 me-2">
                                            <i class="bi bi-coin text-warning"></i>
                                        </div>
                                        <span class="fw-medium">{{ $transfer->coin }}</span>
                                    </div>
                                </td>
                                {{-- <td>
                                    @if($transfer->status === 'completed')
                                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                            <i class="bi bi-check-circle me-1"></i>Completed
                                        </span>
                                    @elseif($transfer->status === 'pending')
                                        <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">
                                            <i class="bi bi-clock me-1"></i>Pending
                                        </span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">
                                            <i class="bi bi-x-circle me-1"></i>Failed
                                        </span>
                                    @endif
                                </td> --}}
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                        No transfers found
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Topup Amount',
                data: @json($coinData)
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            colors: ['#22c55e'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: @json($dates),
                labels: {
                    style: {
                        colors: '#64748b'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#64748b'
                    }
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
            },
            tooltip: {
                theme: 'light',
                y: {
                    formatter: function(val) {
                        return val + " coins"
                    }
                },
                x: {
                    formatter: function(val) {
                        return "Day " + val
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#transactionChart"), options);
        chart.render();
    </script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</x-layout>
