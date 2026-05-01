@extends('admin.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Analiz və Statistika</h1>
            <span class="text-muted">Admin panelinə xoş gəlmisiniz!</span>
        </div>

        <!-- Ümumi Statistika Kartları -->
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bu günkü Ziyarətlər</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todayVisits ?? 0 }} nəfər</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dünənki Ziyarətlər</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $yesterdayVisits ?? 0 }} nəfər</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ümumi Ziyarətlər</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVisits ?? 0 }} nəfər</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Qrafik Sahəsi -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Son 7 Günün Ziyarət Qrafiki</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area" style="height: 300px;">
                            <canvas id="visitsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analiz Cədvəlləri -->
        <div class="row">
            <!-- Ən çox baxılan səhifələr -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ən Çox Baxılan Səhifələr</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($topPages ?? [] as $page)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-truncate" style="max-width: 70%;" title="{{ $page->path }}">{{ Str::limit($page->path, 30) }}</span>
                                    <span class="badge bg-primary text-white rounded-pill">{{ $page->views }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted">Məlumat yoxdur</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Ölkələr üzrə ziyarətlər -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top Ölkələr</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($topCountries ?? [] as $country)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-globe-americas text-secondary me-2"></i> {{ $country->country }}</span>
                                    <span class="badge bg-success text-white rounded-pill">{{ $country->views }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted">Məlumat yoxdur</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Referans mənbələri -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top Referanslar (Mənbə)</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($topReferrers ?? [] as $referrer)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-truncate" style="max-width: 70%;" title="{{ $referrer->referrer }}">{{ Str::limit(str_replace(['https://', 'http://', 'www.'], '', $referrer->referrer), 30) }}</span>
                                    <span class="badge bg-info text-white rounded-pill">{{ $referrer->views }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted">Məlumat yoxdur</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("visitsChart");
            if(ctx) {
                var visitsChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartLabels ?? []) !!},
                        datasets: [{
                            label: "Ziyarətçilər",
                            lineTension: 0.3,
                            backgroundColor: "rgba(63, 90, 243, 0.1)",
                            borderColor: "rgba(63, 90, 243, 1)",
                            pointRadius: 4,
                            pointBackgroundColor: "rgba(63, 90, 243, 1)",
                            pointBorderColor: "#fff",
                            pointHoverRadius: 6,
                            data: {!! json_encode($chartData ?? []) !!},
                            fill: true,
                        }],
                    },
                    options: { maintainAspectRatio: false, responsive: true }
                });
            }
        });
    </script>
@endsection