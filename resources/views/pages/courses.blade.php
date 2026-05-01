@extends('pages.app')
@section('content')

<style>
    .course-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .course-hero-bg-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 15vw;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.02);
        white-space: nowrap;
        pointer-events: none;
        z-index: 0;
        font-family: var(--rr-ff-heading);
        letter-spacing: -2px;
    }
    .course-feature-list {
        list-style: none;
        padding: 0;
        margin: 0;
        background: rgba(255,255,255,0.02);
        padding: 40px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    .course-feature-list li {
        font-size: 18px;
        font-weight: 600;
        color: var(--rr-color-common-white);
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .course-feature-list li:not(:last-child) {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .course-feature-list li i {
        color: var(--rr-color-theme-primary);
        font-size: 24px;
    }
    /* Syllabus Styles */
    .syllabus-card {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 40px 30px;
        border-radius: 16px;
        height: 100%;
        transition: all 0.3s ease;
    }
    .syllabus-card:hover {
        border-color: var(--rr-color-theme-primary);
        transform: translateY(-5px);
    }
    .syllabus-card .module-badge {
        color: var(--rr-color-theme-primary);
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
        display: inline-block;
        letter-spacing: 1px;
    }
    .syllabus-card .title {
        color: var(--rr-color-common-white);
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.3;
    }
    .syllabus-card p {
        font-size: 16px;
        color: var(--rr-color-text-body);
        margin-bottom: 0;
    }
    [data-theme="light"] .course-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .course-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .course-feature-list {
        background: #fff;
        border-color: rgba(0,0,0,0.05);
    }
    [data-theme="light"] .course-feature-list li {
        color: var(--rr-color-heading-primary);
        border-color: rgba(0,0,0,0.05);
    }
    [data-theme="light"] .syllabus-card {
        background: #fff;
        border-color: rgba(0,0,0,0.05);
    }
    [data-theme="light"] .syllabus-card .title {
        color: var(--rr-color-heading-primary);
    }
    [data-theme="light"] .course-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }

    /* Custom Select Style to fix inconsistencies */
    .course-select {
        height: 58px !important;
        color: #6c757d !important;
        cursor: pointer;
        background-color: #f8f9fa !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
        background-repeat: no-repeat !important;
        background-position: right 1.5rem center !important;
        background-size: 16px 12px !important;
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        display: block !important;
    }
    .course-select + .nice-select {
        display: none !important;
    }
    .course-select:not(:invalid), .course-select option {
        color: #212529 !important;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- Modern Course Hero Section -->
        <section class="course-hero-section fade-wrapper">
            <div class="course-hero-bg-text">FLUTTER</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-8 fade-top">
                        <div class="course-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Kurslara Qoşul</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">Gələcəyin <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">peşəsini</span> bizimlə öyrən.</h1>
                            <p class="mb-0" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 600px; line-height: 1.8;">Tək bir kod bazası ilə iOS, Android və Veb üçün mükəmməl, sürətli və nativ keyfiyyətli tətbiqlər yaradın. Praktiki məşğələlərlə dolu təlimlərimizə indi qeydiyyatdan keçin.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Syllabus Section -->
        <section class="syllabus-section pt-130 pb-0 fade-wrapper">
            <div class="container">
                <div class="section-heading text-center mb-60 fade-top">
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">Sillabus</h4>
                    <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Kursu bitirdikdə nələri biləcəksiniz?</h2>
                </div>
                <div class="row gy-4">
                    <!-- Module 1 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 1</span>
                            <h3 class="title">Dart Proqramlaşdırmanın Əsasları</h3>
                            <p>Dəyişənlər, funksiyalar, dövrlər, kolleksiyalar və Obyektyönümlü Proqramlaşdırma (OOP) konseptlərini mənimsəyəcəksiniz.</p>
                        </div>
                    </div>
                    <!-- Module 2 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 2</span>
                            <h3 class="title">İstifadəçi İnterfeysi (UI) və Vidjetlər</h3>
                            <p>Stateless və Stateful vidjetlər, mürəkkəb dizayn arxitekturaları, Material və Cupertino komponentləri ilə işləməyi öyrənəcəksiniz.</p>
                        </div>
                    </div>
                    <!-- Module 3 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 3</span>
                            <h3 class="title">Naviqasiya və Marşrutlaşdırma</h3>
                            <p>Ekranlar arası keçidlər, məlumatların bir səhifədən digərinə ötürülməsi və mürəkkəb marşrut idarəetməsini tətbiq edəcəksiniz.</p>
                        </div>
                    </div>
                    <!-- Module 4 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 4</span>
                            <h3 class="title">Vəziyyətin İdarəedilməsi (State Management)</h3>
                            <p>Tətbiqin mürəkkəbliyini asanlaşdırmaq üçün Provider, Riverpod və Bloc kimi state management strukturlarını istifadə edəcəksiniz.</p>
                        </div>
                    </div>
                    <!-- Module 5 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 5</span>
                            <h3 class="title">Şəbəkə, API və Məlumat Bazası</h3>
                            <p>HTTP sorğuları, RESTful API inteqrasiyası, JSON parserləmə, Firebase və Local Storage ilə məlumatların saxlanılmasını quracaqsınız.</p>
                        </div>
                    </div>
                    <!-- Module 6 -->
                    <div class="col-lg-4 col-md-6 fade-top">
                        <div class="syllabus-card">
                            <span class="module-badge">Modul 6</span>
                            <h3 class="title">Tətbiqin Yayımlanması (App & Play Store)</h3>
                            <p>Tətbiqi test etmək, optimallaşdırmaq və son məhsulu Google Play Store və Apple App Store-da uğurla yayımlamağı öyrənəcəksiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ syllabus-section -->
        
        <section class="contact-section pt-130 pb-130 fade-wrapper">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-5 col-md-12 fade-top">
                        <div class="contact-info-wrapper">
                            <div class="section-heading mb-40">
                                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">Kursun Üstünlükləri</h4>
                                <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Niyə Flutter?</h2>
                                <p class="mt-20">Flutter sayəsində həm iOS, həm də Android üçün eyni anda tətbiqlər yaza biləcəksiniz. Dərslərimiz real layihələr və praktiki məşğələlər üzərində qurulub.</p>
                            </div>
                            <ul class="course-feature-list mt-4">
                                <li><i class="fa-light fa-check-circle"></i> 0-dan peşəkar səviyyəyə</li>
                                <li><i class="fa-light fa-check-circle"></i> Real layihələr üzərində praktika</li>
                                <li><i class="fa-light fa-check-circle"></i> Davamlı mentor dəstəyi</li>
                                <li><i class="fa-light fa-check-circle"></i> Karyera və iş imkanları</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 fade-top">
                        <div class="contact-form-wrap bg-white p-5 rounded shadow-sm border" style="border-color: #eee !important;">
                            <h3 class="mb-4">Kursa Qeydiyyat</h3>
                            
                            @if(session('success'))
                                <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                                    {{ session('success') }}
                                </div>
                        @endif

                        <!-- WhatsApp Avtomatik Yönləndirmə (Auto Redirect) -->
                        @if(session('whatsapp_url'))
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    window.open("{!! session('whatsapp_url') !!}", "_blank");
                                });
                            </script>
                            @endif

                            <form action="{{ route('courses.store') }}" method="POST" id="course-form" class="contact-form">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6"><input type="text" name="name" class="form-control bg-light border-0 py-3 px-4" placeholder="Adınız və Soyadınız" value="{{ old('name') }}" required></div>
                                    <div class="col-md-6"><input type="email" name="email" class="form-control bg-light border-0 py-3 px-4" placeholder="E-poçt ünvanı" value="{{ old('email') }}" required></div>
                                    <div class="col-md-6"><input type="text" name="phone" class="form-control bg-light border-0 py-3 px-4" placeholder="Telefon Nömrəsi" value="{{ old('phone') }}" required></div>
                                    <div class="col-md-6">
                                        <select name="level" class="form-control border-0 px-4 course-select" required>
                                            <option value="" disabled selected>Proqramlaşdırma təcrübəniz</option>
                                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Başlanğıc (Təcrübəm yoxdur)</option>
                                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Orta (Biraz təcrübəm var)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12"><textarea name="message" class="form-control bg-light border-0 py-3 px-4" placeholder="Bizə demək istədiyiniz əlavə məlumat (İstəyə bağlı)" rows="4">{{ old('message') }}</textarea></div>
                                    <div class="col-md-12"><button type="submit" class="rr-primary-btn w-100 justify-content-center border-0">Qeydiyyatı Tamamla <i class="fa-sharp fa-regular fa-arrow-right"></i></button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('pages.footer')
    </div>
</div>

@endsection