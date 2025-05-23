
@extends('layouts.app')

<x-layout>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                <i class="bi bi-person-circle text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Total Users</p>
                                <h3 class="fw-bold mb-0">500</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 h-100" style="border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.05);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                <i class="bi bi-envelope-paper text-white fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1" style="font-size: 0.95rem;">Total Orders Requested</p>
                                <h3 class="fw-bold mb-0">10</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

        </div>
</x-layout>