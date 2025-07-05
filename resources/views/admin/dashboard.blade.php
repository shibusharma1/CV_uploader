@extends('layout.admin.app')
@section('title', 'Dashboard')
@section('content')
<style>
    .stats-card{
        margin-bottom: 0;
    }
</style>
<div id="content">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header">
            <h2 class="page-title">Dashboard</h2>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">

                <div class="stats-card shadow-sm border rounded p-3 bg-white">
                    <a href="{{ url('users-list')}}" class="text-decoration-none">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="card-title fw-semibold text-muted">Total Users</div>
                            <i class="bi bi-people fs-3 text-primary"></i>
                        </div>
                        <div class="card-value fs-4 fw-bold text-dark">{{ $users }}</div>
                        <div class="d-flex align-items-center mt-2">
                        </div>
                </div>
                </a>
            </div>


            <div class="col-xl-3 col-md-6">
                <a href="{{ url('applicants/applicant-list')}}" class="text-decoration-none">
                    <div class="stats-card shadow-sm border rounded p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="card-title fw-semibold text-muted">Total Applications</div>
                            <i class="bi bi-file-earmark-text fs-3 text-success"></i>
                        </div>
                        <div class="card-value fs-4 fw-bold text-dark">{{ $applicants }}</div>
                        <div class="d-flex align-items-center mt-2">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="{{ url('applicants/applicant-list')}}" class="text-decoration-none">
                    <div class="stats-card shadow-sm border rounded p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="card-title fw-semibold text-muted">Pending Applications</div>
                            <i class="bi bi-clock fs-3 text-warning"></i>
                        </div>
                        <div class="card-value fs-4 fw-bold text-dark">{{ $pendingApplicants }}</div>
                        <div class="d-flex align-items-center mt-2">
                        </div>
                    </div>
            </div>
            </a>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="row g-4">
            {{-- Pie Chart (Gender) --}}
            <div class="col-md-6">
                <div class="card shadow-sm border rounded p-3">
                    <h5 class="text-center fw-semibold mb-3">User Gender Distribution</h5>
                    <canvas id="genderChart" style="height: 250px; !important"></canvas>
                </div>
            </div>

            {{-- Pie Chart (Scholarship Groups) --}}
            <div class="col-md-6">
                <div class="card shadow-sm border rounded p-3">
                    <h5 class="text-center fw-semibold mb-3">Scholarship Group Distribution</h5>
                    <canvas id="scholarshipChart" style="height: 200px; !important"></canvas>
                </div>
            </div>
        </div>

        <script>
            // Gender Pie Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                data: [{{ $maleUsers }}, {{ $femaleUsers }}, {{ $otherUsers }}],
                backgroundColor: ['#007bff', '#dc3545', '#6c757d'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom', labels: { color: '#333', font: { size: 14, weight: 'bold' } } },
                tooltip: { callbacks: { label: ctx => `${ctx.label}: ${ctx.parsed} applicants` } }
            }
        }
    });

    // Scholarship Pie Chart
    const scholarshipCtx = document.getElementById('scholarshipChart').getContext('2d');
    new Chart(scholarshipCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($scholarshipGroups) !!},
            datasets: [{
                data: {!! json_encode($scholarshipCounts) !!},
                backgroundColor: [
                    '#28a745', '#17a2b8', '#ffc107', '#fd7e14',
                    '#6610f2', '#20c997', '#6f42c1', '#e83e8c'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom', labels: { color: '#333', font: { size: 14, weight: 'bold' } } },
                tooltip: { callbacks: { label: ctx => `${ctx.label}: ${ctx.parsed} applicants` } }
            }
        }
    });
        </script>
        @endsection