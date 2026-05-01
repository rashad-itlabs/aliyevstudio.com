<!DOCTYPE html>
<html lang="az" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docly Dashboard - İdarəetmə Paneli</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Mərkəzləşdirilmiş CSS Xətti (Docly Custom CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/docly/docly.css') }}">
</head>
<body>

    <!-- Yan Panel (Sidebar) -->
    <aside class="docly-sidebar">
        <div class="docly-sidebar-logo">
            <i class="fa-solid fa-stethoscope" style="color: var(--docly-primary);"></i> Docly
        </div>
        <div class="docly-sidebar-menu">
            <a href="{{ route('docly.dashboard') }}" class="active"><i class="fa-solid fa-chart-pie"></i> İdarəetmə Paneli</a>
            <a href="{{ route('docly.appointments') }}"><i class="fa-solid fa-calendar-check"></i> Randevular</a>
            <a href="#"><i class="fa-solid fa-users"></i> Pasiyentlər</a>
            <a href="#"><i class="fa-solid fa-user-doctor"></i> Həkimlər</a>
            <a href="#"><i class="fa-solid fa-wallet"></i> Maliyyə</a>
            <a href="{{ route('docly.settings') }}"><i class="fa-solid fa-gear"></i> Parametrlər</a>
        </div>
        <div class="docly-sidebar-menu" style="flex-grow: 0; padding-bottom: 20px;">
            <a href="#" style="color: #dc3545;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Çıxış</a>
        </div>
    </aside>

    <!-- Əsas Məzmun (Main Content) -->
    <main class="docly-main-content">
        <div class="container-fluid p-0">
            
            <!-- Üst Navigasiya Başlığı və Tema Seçimi -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 style="color: var(--docly-text-heading); font-weight: 700; margin: 0;">Xülasə</h2>
                <div class="user-profile d-flex align-items-center">
                    <button class="btn btn-outline-secondary me-3 rounded-circle" id="theme-toggle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: var(--docly-text-body); border-color: var(--docly-border);">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=3f5af3&color=fff" alt="Profile" class="rounded-circle" width="40" height="40">
                </div>
            </div>

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
                                <h3 class="widget-value">38 <span style="font-size: 18px; color: var(--docly-text-body); font-weight: normal;">/ 4</span></h3>
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
    </main>

    <!-- GSAP Kitabxanası -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <!-- Qaranlıq/Aydın rejim məntiqi və Animasiyalar -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // Tema Dəyişdirici (Dark / Light Mode Toggle)
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;

            themeToggle.addEventListener('click', () => {
                const currentTheme = htmlTag.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                htmlTag.setAttribute('data-theme', newTheme);
                themeToggle.innerHTML = newTheme === 'dark' ? '<i class="fa-solid fa-sun"></i>' : '<i class="fa-solid fa-moon"></i>';
            });

            // GSAP Yan Panel (Sidebar) Animasiyası
            gsap.fromTo(".docly-sidebar", { x: -260 }, { x: 0, duration: 0.6, ease: "power3.out" });

            // Widget Kartlarının Animasiyası (Yuxarı doğru fade-in olaraq sırayla gəlir)
            gsap.to(".widget-card", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.15,
                ease: "power3.out",
                delay: 0.3
            });

            // "Son Randevular" cədvəlinin çərçivəsinin Animasiyası
            gsap.to("#recent-list", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out",
                delay: 0.7
            });

            // Siyahıdakı hər bir sətirin "Live" olaraq soldan axaraq gəlmə effekti
            gsap.from(".list-item", {
                x: -20,
                opacity: 0,
                duration: 0.6,
                stagger: 0.1,
                ease: "power2.out",
                delay: 1.1
            });
        });
    </script>
</body>
</html>