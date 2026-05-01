<!DOCTYPE html>
<html lang="az" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. {{ $doctor->name }} - Randevular</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/docly/docly.css') }}">
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
            <a href="{{ route('docly.doctors') }}" class="active"><i class="fa-solid fa-user-doctor"></i> Həkimlər</a>
            <a href="#"><i class="fa-solid fa-wallet"></i> Maliyyə</a>
            <a href="{{ route('docly.settings') }}"><i class="fa-solid fa-gear"></i> Parametrlər</a>
        </div>
        <div class="docly-sidebar-menu" style="flex-grow: 0; padding-bottom: 20px;">
            <a href="#" style="color: #dc3545;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Çıxış</a>
        </div>
    </aside>

    <main class="docly-main-content">
        <div class="container-fluid p-0">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('docly.doctors') }}" class="btn btn-outline-secondary mb-2" style="font-size: 14px; border-color: var(--docly-border); color: var(--docly-text-body);"><i class="fa-solid fa-arrow-left"></i> Geri Qayıt</a>
                    <h2 style="color: var(--docly-text-heading); font-weight: 700; margin: 0;">Dr. {{ $doctor->name }} - Təqvim</h2>
                </div>
                <div class="user-profile d-flex align-items-center">
                    <button class="btn btn-outline-secondary me-3 rounded-circle" id="theme-toggle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: var(--docly-text-body); border-color: var(--docly-border);">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                </div>
            </div>

            <div class="widget-card calendar-container" style="padding: 30px; min-height: 70vh;">
                <div id="calendar"></div>
            </div>

        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales-all.global.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;
            themeToggle.addEventListener('click', () => {
                const newTheme = htmlTag.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                htmlTag.setAttribute('data-theme', newTheme);
                themeToggle.innerHTML = newTheme === 'dark' ? '<i class="fa-solid fa-sun"></i>' : '<i class="fa-solid fa-moon"></i>';
            });

            gsap.fromTo(".docly-sidebar", { x: -260 }, { x: 0, duration: 0.6, ease: "power3.out" });
            gsap.to(".calendar-container", { y: 0, opacity: 1, duration: 0.8, ease: "power3.out", delay: 0.2 });

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', 
                firstDay: 1,
                dayHeaderFormat: { weekday: 'long' },
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                slotMinTime: '08:00:00',
                slotMaxTime: '19:00:00',
                slotDuration: '00:30:00',
                slotLabelInterval: '00:30:00',
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                },
                locale: 'az',
                buttonText: {
                    today: 'Bu gün',
                    month: 'Ay',
                    week: 'Həftə',
                    day: 'Gün',
                    list: 'Siyahı'
                },
                allDayText: 'Bütün gün',
                events: @json($events ?? []),
                eventClick: function(info) {
                    alert('Pasiyent: ' + info.event.title + '\nStatus: ' + info.event.extendedProps.status + '\nQeyd: ' + info.event.extendedProps.notes);
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>