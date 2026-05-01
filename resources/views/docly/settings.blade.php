<!DOCTYPE html>
<html lang="az" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docly Dashboard - Parametrlər</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/docly/docly.css') }}">

    <style>
        .form-control, .form-select {
            background-color: var(--docly-bg);
            border: 1px solid var(--docly-border);
            color: var(--docly-text-heading);
            border-radius: 8px;
            padding: 10px 15px;
        }
        .form-control:focus, .form-select:focus {
            background-color: var(--docly-bg);
            color: var(--docly-text-heading);
            border-color: var(--docly-primary);
            box-shadow: none;
        }
        .form-label {
            color: var(--docly-text-body);
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .nav-pills .nav-link {
            color: var(--docly-text-body);
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .nav-pills .nav-link.active {
            background-color: rgba(63, 90, 243, 0.1);
            color: var(--docly-primary);
        }
        .nav-pills .nav-link:hover:not(.active) {
            background-color: rgba(255,255,255,0.05);
        }
        [data-theme="light"] .nav-pills .nav-link:hover:not(.active) {
            background-color: rgba(0,0,0,0.05);
        }
        .settings-card {
            padding: 30px;
            min-height: 400px;
        }
        .btn-primary-custom {
            background-color: var(--docly-primary);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            color: white;
            transition: 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: #2b44d1;
            color: white;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--docly-border);
        }
    </style>
</head>
<body>

    <aside class="docly-sidebar">
        <div class="docly-sidebar-logo">
            <i class="fa-solid fa-stethoscope" style="color: var(--docly-primary);"></i> Docly
        </div>
        <div class="docly-sidebar-menu">
            <a href="{{ route('docly.dashboard') }}"><i class="fa-solid fa-chart-pie"></i> İdarəetmə Paneli</a>
            <a href="{{ route('docly.appointments') }}"><i class="fa-solid fa-calendar-check"></i> Randevular</a>
            <a href="{{ route('docly.patients') }}"><i class="fa-solid fa-users"></i> Pasiyentlər</a>
            <a href="{{ route('docly.doctors') }}"><i class="fa-solid fa-user-doctor"></i> Həkimlər</a>
            <a href="#"><i class="fa-solid fa-wallet"></i> Maliyyə</a>
            <a href="{{ route('docly.settings') }}" class="active"><i class="fa-solid fa-gear"></i> Parametrlər</a>
        </div>
        <div class="docly-sidebar-menu" style="flex-grow: 0; padding-bottom: 20px;">
            <a href="#" style="color: #dc3545;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Çıxış</a>
        </div>
    </aside>

    <main class="docly-main-content">
        <div class="container-fluid p-0">
            
            <div class="d-flex justify-content-between align-items-center mb-4 fade-in-top">
                <h2 style="color: var(--docly-text-heading); font-weight: 700; margin: 0;">Parametrlər</h2>
                <div class="user-profile d-flex align-items-center">
                    <button class="btn btn-outline-secondary me-3 rounded-circle" id="theme-toggle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: var(--docly-text-body); border-color: var(--docly-border);">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                </div>
            </div>

            <!-- Xəbərdarlıq Mesajları -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show fade-in-top" role="alert" style="margin-bottom: 20px;">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <!-- Sol Tərəf - Naviqasiya -->
                <div class="col-md-3 mb-4 mb-md-0 fade-in-left">
                    <div class="widget-card p-3">
                        <div class="nav flex-column nav-pills" id="settings-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-start mb-2" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab">
                                <i class="fa-solid fa-user me-2"></i> Şəxsi Profil
                            </button>
                            <button class="nav-link text-start mb-2" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab">
                                <i class="fa-solid fa-shield-halved me-2"></i> Təhlükəsizlik
                            </button>
                            <button class="nav-link text-start" id="notification-tab" data-bs-toggle="pill" data-bs-target="#notifications" type="button" role="tab">
                                <i class="fa-solid fa-bell me-2"></i> Bildirişlər
                            </button>
                            <button class="nav-link text-start mt-2" id="send-notif-tab" data-bs-toggle="pill" data-bs-target="#send-notif" type="button" role="tab" style="color: #28a745;">
                                <i class="fa-solid fa-paper-plane me-2"></i> Bildiriş Göndər
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sağ Tərəf - Məzmun -->
                <div class="col-md-9 fade-in-right">
                    <div class="tab-content widget-card settings-card" id="settings-tabContent">
                        
                        <!-- 1. Profil Parametrləri -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <h4 style="color: var(--docly-text-heading); margin-bottom: 30px;">Şəxsi Profil</h4>
                            
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=3f5af3&color=fff" alt="Avatar" class="profile-avatar me-4">
                                <div>
                                    <button class="btn btn-outline-secondary btn-sm" style="color: var(--docly-text-body); border-color: var(--docly-border);">Şəkli Dəyiş</button>
                                    <p class="text-muted mt-2 mb-0" style="font-size: 12px;">Maksimum fayl ölçüsü 2MB (JPG, PNG)</p>
                                </div>
                            </div>

                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Ad və Soyad</label>
                                        <input type="text" class="form-control" value="Admin Adminov">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">İstifadəçi Adı</label>
                                        <input type="text" class="form-control" value="admin123">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="admin@docly.az">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Əlaqə Nömrəsi</label>
                                        <input type="text" class="form-control" value="+994 50 123 45 67">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary-custom mt-3">Məlumatları Yenilə</button>
                            </form>
                        </div>

                        <!-- 2. Təhlükəsizlik -->
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <h4 style="color: var(--docly-text-heading); margin-bottom: 30px;">Şifrəni Yenilə</h4>
                            <form action="#">
                                <div class="mb-3" style="max-width: 400px;">
                                    <label class="form-label">Cari Şifrə</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="mb-3" style="max-width: 400px;">
                                    <label class="form-label">Yeni Şifrə</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="mb-3" style="max-width: 400px;">
                                    <label class="form-label">Yeni Şifrə (Təkrar)</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <button type="button" class="btn btn-primary-custom mt-3">Şifrəni Dəyiş</button>
                            </form>
                        </div>

                        <!-- 3. Bildirişlər -->
                        <div class="tab-pane fade" id="notifications" role="tabpanel">
                            <h4 style="color: var(--docly-text-heading); margin-bottom: 30px;">Sistem Bildirişləri</h4>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="notif1" checked style="cursor: pointer;">
                                <label class="form-check-label ms-2" for="notif1" style="color: var(--docly-text-heading);">Yeni randevu əlavə ediləndə mənə email göndər</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="notif2" checked style="cursor: pointer;">
                                <label class="form-check-label ms-2" for="notif2" style="color: var(--docly-text-heading);">Gündəlik xülasələri (statistikaları) mənə göndər</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="notif3" style="cursor: pointer;">
                                <label class="form-check-label ms-2" for="notif3" style="color: var(--docly-text-heading);">Sistem yenilikləri barədə xəbərdarlıq al</label>
                            </div>
                            <button type="button" class="btn btn-primary-custom mt-4">Seçimləri Yadda Saxla</button>
                        </div>

                        <!-- 4. Ümumi Bildiriş Göndər (Broadcast) -->
                        <div class="tab-pane fade" id="send-notif" role="tabpanel">
                            <h4 style="color: var(--docly-text-heading); margin-bottom: 15px;">İstifadəçilərə Bildiriş Göndər</h4>
                            <p class="text-muted mb-4">Mobil tətbiqi istifadə edən (və bildirişlərə icazə vermiş) bütün xəstələrə və həkimlərə yeniliklər haqqında anında bildiriş (Push Notification) göndərin.</p>
                            
                            <form action="{{ route('docly.settings.send_notification') }}" method="POST">
                                @csrf
                                <div class="mb-3" style="max-width: 500px;">
                                    <label class="form-label">Bildirişin Başlığı</label>
                                    <input type="text" name="title" class="form-control" placeholder="Məs: Yeni xidmətimiz aktivdir!" required>
                                </div>
                                <div class="mb-4" style="max-width: 500px;">
                                    <label class="form-label">Bildirişin Mətni</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="Bildirişin detallı mətni..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; padding: 10px 24px; border-radius: 8px; color: #fff; font-weight: 500;"><i class="fa-solid fa-paper-plane me-2"></i> İndi Göndər</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Skriptlər -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;
            
            themeToggle.addEventListener('click', () => {
                const newTheme = htmlTag.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                htmlTag.setAttribute('data-theme', newTheme);
                themeToggle.innerHTML = newTheme === 'dark' ? '<i class="fa-solid fa-sun"></i>' : '<i class="fa-solid fa-moon"></i>';
            });

            // GSAP Animasiyalar
            gsap.fromTo(".docly-sidebar", { x: -260 }, { x: 0, duration: 0.6, ease: "power3.out" });
            gsap.from(".fade-in-top", { y: -20, opacity: 0, duration: 0.6, delay: 0.2 });
            // Widget kartlarını görünən edirik
            gsap.to(".widget-card", { y: 0, opacity: 1, duration: 0.8, stagger: 0.2, ease: "power3.out", delay: 0.4 });
        });
    </script>
</body>
</html>