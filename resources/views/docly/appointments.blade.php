<!DOCTYPE html>
<html lang="az" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docly Dashboard - Randevular Kalendarı</title>
    
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
            <a href="{{ route('docly.dashboard') }}"><i class="fa-solid fa-chart-pie"></i> İdarəetmə Paneli</a>
            <a href="{{ route('docly.appointments') }}" class="active"><i class="fa-solid fa-calendar-check"></i> Randevular</a>
            <a href="{{ route('docly.patients') }}"><i class="fa-solid fa-users"></i> Pasiyentlər</a>
            <a href="{{ route('docly.doctors') }}"><i class="fa-solid fa-user-doctor"></i> Həkimlər</a>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 style="color: var(--docly-text-heading); font-weight: 700; margin: 0;">Randevular Kalendarı</h2>
                <div class="user-profile d-flex align-items-center">
                    <button class="btn btn-outline-secondary me-3 rounded-circle" id="theme-toggle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: var(--docly-text-body); border-color: var(--docly-border);">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=3f5af3&color=fff" alt="Profile" class="rounded-circle" width="40" height="40">
                </div>
            </div>

            <!-- Kalendar Kartı -->
            <div class="widget-card calendar-container" style="padding: 30px; min-height: 70vh;">
                <div id="calendar"></div>
            </div>

        </div>
    </main>

    <!-- GSAP Kitabxanası -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <!-- Dil paketləri üçün əlavə (Azərbaycan dili üçün mütləqdir) -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales-all.global.min.js"></script>

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

            // Kalendar konteynerinin (Widget Card) görünməsi üçün GSAP animasiyası
            gsap.to(".calendar-container", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out",
                delay: 0.2
            });

            // FullCalendar İnitializasiyası
            var calendarEl = document.getElementById('calendar');
            var todayStr = new Date().toISOString().split('T')[0]; // Bugünkü tarix YYYY-MM-DD

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Default olaraq aylıq görünüş
                firstDay: 1, // Həftə bazar ertəsindən başlasın
                dayHeaderFormat: { weekday: 'long' }, // Həftənin günlərini tam adla göstərmək üçün
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                slotMinTime: '08:00:00', // İş saatları
                slotMaxTime: '19:00:00', // 19:00-a qədər
                slotDuration: '00:30:00', // 30 dəqiqəlik intervallar
                slotLabelInterval: '00:30:00', // Sol paneldə hər 30 dəqiqəni göstər
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false // 24 saatlıq format (məs. 12:00, 14:30)
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false // Randevu daxilindəki saat formati
                },
                locale: 'az', // Kalendar dili Azərbaycan dili
                buttonText: {
                    today: 'Bu gün',
                    month: 'Ay',
                    week: 'Həftə',
                    day: 'Gün',
                    list: 'Siyahı'
                },
                allDayText: 'Bütün gün',
                // Blade dəyişənini JS formatına çevirərək kalendara ötürürük
                events: @json($events ?? []),
                eventClick: function(info) {
                    alert('Randevu: ' + info.event.title + '\nStatus: ' + info.event.extendedProps.status + '\nQeyd: ' + info.event.extendedProps.notes);
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>