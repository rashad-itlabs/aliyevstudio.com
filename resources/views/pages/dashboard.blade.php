@extends('pages.app')

@section('title', 'İdarəetmə Paneli - Randevular')

@section('content')
<style>
    .dashboard-section {
        padding-top: 150px;
        padding-bottom: 80px;
        background-color: var(--rr-color-bg-1);
        min-height: 100vh;
    }
    .widget-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease, border-color 0.3s ease;
        /* GSAP üçün başlanğıc vəziyyətlər */
        opacity: 0; 
        transform: translateY(30px);
    }
    .widget-card:hover {
        transform: translateY(-5px);
        border-color: var(--rr-color-theme-primary);
    }
    .widget-icon {
        font-size: 36px;
        color: var(--rr-color-theme-primary);
        margin-bottom: 15px;
    }
    .widget-title {
        font-size: 16px;
        color: var(--rr-color-text-body);
        margin-bottom: 10px;
        font-weight: 500;
    }
    .widget-value {
        font-size: 32px;
        color: var(--rr-color-common-white);
        font-weight: 700;
        margin-bottom: 0;
    }
    .recent-appointments {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 25px;
        margin-top: 30px;
        opacity: 0;
        transform: translateY(30px);
    }
    .recent-appointments h3 {
        color: var(--rr-color-common-white);
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: 600;
    }
    .table-custom {
        color: var(--rr-color-text-body);
    }
    .table-custom th {
        color: var(--rr-color-common-white);
        border-bottom-color: rgba(255, 255, 255, 0.1);
        font-weight: 600;
        padding: 15px;
    }
    .table-custom td {
        border-bottom-color: rgba(255, 255, 255, 0.05);
        vertical-align: middle;
        padding: 15px;
    }
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-completed { background: rgba(40, 167, 69, 0.15); color: #28a745; }
    .status-noshow { background: rgba(220, 53, 69, 0.15); color: #dc3545; }
    .status-pending { background: rgba(255, 193, 7, 0.15); color: #ffc107; }

    /* Aydın rejim (Light Mode) üçün stillər */
    [data-theme="light"] .dashboard-section {
        background-color: var(--rr-color-grey-light);
    }
    [data-theme="light"] .widget-card,
    [data-theme="light"] .recent-appointments {
        background: #fff;
        border-color: rgba(0,0,0,0.1);
    }
    [data-theme="light"] .widget-value,
    [data-theme="light"] .recent-appointments h3,
    [data-theme="light"] .table-custom th {
        color: var(--rr-color-heading-primary);
    }
</style>

<div class="dashboard-section">
    <div class="container">
        <!-- Məlumat Kartları (Widgets) -->
        <div class="row g-4" id="widgets-container">
            <!-- Bugünkü randevu sayı -->
            <div class="col-xl-3 col-md-6 widget-item">
                <div class="widget-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="widget-title">Bugünkü Randevular</p>
                            <h3 class="widget-value">42</h3>
                        </div>
                        <div class="widget-icon">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gələn / gəlməyən -->
            <div class="col-xl-3 col-md-6 widget-item">
                <div class="widget-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="widget-title">Gələn / No-show</p>
                            <h3 class="widget-value">38 <span style="font-size: 18px; color: var(--rr-color-text-body); font-weight: normal;">/ 4</span></h3>
                        </div>
                        <div class="widget-icon">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aktiv həkim sayı -->
            <div class="col-xl-3 col-md-6 widget-item">
                <div class="widget-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="widget-title">Aktiv Həkimlər</p>
                            <h3 class="widget-value">15</h3>
                        </div>
                        <div class="widget-icon">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ümumi qazanc -->
            <div class="col-xl-3 col-md-6 widget-item">
                <div class="widget-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="widget-title">Ümumi Qazanc</p>
                            <h3 class="widget-value">1,250 ₼</h3>
                        </div>
                        <div class="widget-icon">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Son Randevular (Live List) -->
        <div class="row">
            <div class="col-12">
                <div class="recent-appointments" id="recent-list">
                    <h3>Son Randevular (Live List)</h3>
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                                <tr>
                                    <th>Pasiyent</th>
                                    <th>Həkim</th>
                                    <th>Tarix / Saat</th>
                                    <th>Status</th>
                                    <th>Məbləğ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="list-item">
                                    <td>Əhməd Həsənov</td>
                                    <td>Dr. Rəşad Əliyev (Kardioloq)</td>
                                    <td>{{ \Carbon\Carbon::now()->format('d M Y') }}, 14:00</td>
                                    <td><span class="status-badge status-completed">Gəldi</span></td>
                                    <td>50 ₼</td>
                                </tr>
                                <tr class="list-item">
                                    <td>Aygün Məmmədova</td>
                                    <td>Dr. Sevinc Quliyeva (Pediatr)</td>
                                    <td>{{ \Carbon\Carbon::now()->format('d M Y') }}, 14:30</td>
                                    <td><span class="status-badge status-pending">Gözləyir</span></td>
                                    <td>40 ₼</td>
                                </tr>
                                <tr class="list-item">
                                    <td>Tural Kərimov</td>
                                    <td>Dr. Rəşad Əliyev (Kardioloq)</td>
                                    <td>{{ \Carbon\Carbon::now()->format('d M Y') }}, 15:00</td>
                                    <td><span class="status-badge status-noshow">No-show</span></td>
                                    <td>-</td>
                                </tr>
                                <tr class="list-item">
                                    <td>Nigar Əlizadə</td>
                                    <td>Dr. Elçin Rəhimov (Dermatoloq)</td>
                                    <td>{{ \Carbon\Carbon::now()->format('d M Y') }}, 15:30</td>
                                    <td><span class="status-badge status-completed">Gəldi</span></td>
                                    <td>60 ₼</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- GSAP Kitabxanası -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Widget Kartlarının Animasiyası (Yuxarı doğru fade-in olaraq sırayla gəlir)
        gsap.to(".widget-card", {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: "power3.out",
            delay: 0.2
        });

        // "Son Randevular" cədvəlinin çərçivəsinin Animasiyası
        gsap.to("#recent-list", {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power3.out",
            delay: 0.6
        });

        // Siyahıdakı hər bir sətirin "Live" olaraq soldan axaraq gəlmə effekti
        gsap.from(".list-item", {
            x: -20,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: "power2.out",
            delay: 1
        });
    });
</script>
@endsection