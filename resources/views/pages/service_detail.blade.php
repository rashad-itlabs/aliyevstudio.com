@extends('pages.app')

<?php
$servicesData = [
    'veb-programlasdirma' => [
        'title' => 'Veb Proqramlaşdırma',
        'meta_description' => 'AliyevStudio-da peşəkar veb proqramlaşdırma xidmətləri ilə biznesinizi rəqəmsal mühitdə gücləndirin. Fərdi veb saytlar, e-ticarət platformaları və veb tətbiqləri.',
        'hero_image' => 'assets/img/service/src-1.jpeg',
        'hero_subtitle' => 'Xidmətlərimiz',
        'hero_title_italic' => 'Veb',
        'hero_title_rest' => 'Proqramlaşdırma',
        'overview_heading' => 'Veb Proqramlaşdırma Nədir?',
        'overview_text' => 'Veb proqramlaşdırma, internet üzərindən əlçatan olan veb saytların və veb tətbiqlərin yaradılması prosesidir. Bu, istifadəçilərin brauzerlər vasitəsilə qarşılıqlı əlaqədə ola biləcəyi dinamik və interaktiv platformaların qurulmasını əhatə edir. Biz müasir texnologiyalar və ən yaxşı təcrübələrdən istifadə edərək biznesinizin ehtiyaclarına uyğun fərdi veb həllər təklif edirik.',
        'features_heading' => 'Niyə Veb Proqramlaşdırma Xidmətlərimizi Seçməlisiniz?',
        'features' => [
            ['icon' => 'fa-solid fa-code', 'title' => 'Fərdi Həllər', 'description' => 'Biznesinizin unikal ehtiyaclarına uyğun olaraq fərdi veb saytlar və tətbiqlər hazırlayırıq.'],
            ['icon' => 'fa-solid fa-mobile-screen-button', 'title' => 'Responsiv Dizayn', 'description' => 'Bütün cihazlarda mükəmməl görünən və işləyən responsiv veb saytlar təmin edirik.'],
            ['icon' => 'fa-solid fa-lock', 'title' => 'Təhlükəsizlik', 'description' => 'Veb tətbiqlərinizin təhlükəsizliyini ən yüksək standartlarda təmin edirik.'],
            ['icon' => 'fa-solid fa-rocket', 'title' => 'Yüksək Performans', 'description' => 'Sürətli yüklənmə və optimal performans üçün veb saytlarınızı optimallaşdırırıq.'],
        ],
    ],
    'mobile-app' => [
        'title' => 'Mobil Tətbiqlər',
        'meta_description' => 'AliyevStudio-da innovativ mobil tətbiq inkişafı xidmətləri ilə ideyalarınızı reallığa çevirin. iOS, Android və cross-platform tətbiqlər.',
        'hero_image' => 'assets/img/service/src-2.jpeg',
        'hero_subtitle' => 'Xidmətlərimiz',
        'hero_title_italic' => 'Mobil',
        'hero_title_rest' => 'Tətbiqlər',
        'overview_heading' => 'Mobil Tətbiq İnkişafı Nədir?',
        'overview_text' => 'Mobil tətbiq inkişafı, smartfonlar və planşetlər kimi mobil cihazlarda işləyən proqram təminatının yaradılması prosesidir. Biz iOS və Android platformaları üçün nativ tətbiqlər, həmçinin Flutter kimi cross-platform texnologiyalarından istifadə edərək yüksək keyfiyyətli və istifadəçi dostu mobil tətbiqlər hazırlayırıq. İdeyalarınızı mobil dünyaya daşımaq üçün bizimlə əlaqə saxlayın.',
        'features_heading' => 'Mobil Tətbiq Xidmətlərimizin Üstünlükləri',
        'features' => [
            ['icon' => 'fa-brands fa-apple', 'title' => 'iOS Tətbiqləri', 'description' => 'Apple ekosistemi üçün yüksək performanslı və intuitiv tətbiqlər.'],
            ['icon' => 'fa-brands fa-android', 'title' => 'Android Tətbiqləri', 'description' => 'Geniş istifadəçi bazasına çatmaq üçün güclü Android tətbiqləri.'],
            ['icon' => 'fa-solid fa-layer-group', 'title' => 'Cross-Platform', 'description' => 'Tək kod bazası ilə iOS və Android üçün tətbiqlər, xərclərə qənaət.'],
            ['icon' => 'fa-solid fa-user-gear', 'title' => 'UI/UX Dizayn', 'description' => 'Cəlbedici və istifadəçi dostu interfeyslər ilə mükəmməl təcrübə.'],
        ],
    ],
    'design-brending' => [
        'title' => 'Dizayn və Brendinq',
        'meta_description' => 'AliyevStudio-da peşəkar dizayn və brendinq xidmətləri ilə markanızın vizual kimliyini gücləndirin. Loqo, korporativ stil və UI/UX dizayn.',
        'hero_image' => 'assets/img/service/src-3.jpeg',
        'hero_subtitle' => 'Xidmətlərimiz',
        'hero_title_italic' => 'Dizayn',
        'hero_title_rest' => 'və Brendinq',
        'overview_heading' => 'Dizayn və Brendinq Nədir?',
        'overview_text' => 'Dizayn və brendinq, bir şirkətin və ya məhsulun vizual kimliyini və ümumi imicini yaratmaq və inkişaf etdirmək prosesidir. Bu, loqo dizaynından tutmuş korporativ stilin yaradılmasına, veb saytların və mobil tətbiqlərin UI/UX dizaynına qədər geniş bir sahəni əhatə edir. Güclü brend kimliyi müştərilərinizlə emosional əlaqə qurmağa və rəqiblərinizdən fərqlənməyə kömək edir.',
        'features_heading' => 'Dizayn və Brendinq Xidmətlərimiz',
        'features' => [
            ['icon' => 'fa-solid fa-palette', 'title' => 'Loqo Dizaynı', 'description' => 'Unikal və yaddaqalan loqolarla markanızın əsasını qoyun.'],
            ['icon' => 'fa-solid fa-brush', 'title' => 'Korporativ Stil', 'description' => 'Brendinizin bütün vizual elementlərini əhatə edən vahid stil.'],
            ['icon' => 'fa-solid fa-object-group', 'title' => 'UI/UX Dizayn', 'description' => 'İstifadəçi dostu və cəlbedici interfeyslərlə rəqəmsal məhsullar.'],
            ['icon' => 'fa-solid fa-lightbulb', 'title' => 'Brend Strategiyası', 'description' => 'Markanızın dəyərlərini və mesajını müəyyənləşdirən strategiyalar.'],
        ],
    ],
    'app-programlasdirma' => [
        'title' => 'Tətbiq Proqramlaşdırması',
        'meta_description' => 'AliyevStudio-da fərdi tətbiq proqramlaşdırma xidmətləri ilə biznes proseslərinizi avtomatlaşdırın və səmərəliliyi artırın. Masaüstü və veb əsaslı tətbiqlər.',
        'hero_image' => 'assets/img/service/src-4.jpeg',
        'hero_subtitle' => 'Xidmətlərimiz',
        'hero_title_italic' => 'Tətbiq',
        'hero_title_rest' => 'Proqramlaşdırması',
        'overview_heading' => 'Tətbiq Proqramlaşdırması Nədir?',
        'overview_text' => 'Tətbiq proqramlaşdırması, müəyyən bir məqsədə xidmət edən proqram təminatının yaradılmasıdır. Bu, masaüstü tətbiqlər, veb əsaslı idarəetmə panelləri, CRM sistemləri və digər fərdi proqram həllərini əhatə edə bilər. Biz biznesinizin xüsusi ehtiyaclarını qarşılayan, səmərəliliyi artıran və iş axınlarını optimallaşdıran güclü və etibarlı tətbiqlər hazırlayırıq.',
        'features_heading' => 'Tətbiq Proqramlaşdırma Xidmətlərimizin Faydaları',
        'features' => [
            ['icon' => 'fa-solid fa-desktop', 'title' => 'Masaüstü Tətbiqlər', 'description' => 'Windows, macOS və Linux üçün yüksək performanslı tətbiqlər.'],
            ['icon' => 'fa-solid fa-cloud', 'title' => 'Bulud Əsaslı Tətbiqlər', 'description' => 'Hər yerdən əlçatan, miqyaslana bilən bulud həlləri.'],
            ['icon' => 'fa-solid fa-gears', 'title' => 'Biznes Avtomatlaşdırması', 'description' => 'İş proseslərinizi avtomatlaşdıraraq vaxta və resurslara qənaət edin.'],
            ['icon' => 'fa-solid fa-chart-line', 'title' => 'Məlumat Analizi', 'description' => 'Qərar qəbul etməyə kömək edən güclü məlumat analizi tətbiqləri.'],
        ],
    ],
];

$currentPath = request()->path();
$pathParts = explode('/', $currentPath);
$serviceSlug = end($pathParts);

$service = $servicesData[$serviceSlug] ?? null;

if (!$service) {
    $service = [
        'title' => 'Xidmət Tapılmadı',
        'meta_description' => 'Axtardığınız xidmət tapılmadı.',
        'hero_image' => 'assets/img/images/hero-img-5.png',
        'hero_subtitle' => 'Xidmətlərimiz',
        'hero_title_italic' => 'Xidmət',
        'hero_title_rest' => 'Tapılmadı',
        'overview_heading' => 'Üzr istəyirik!',
        'overview_text' => 'Axtardığınız xidmət haqqında məlumat hazırda mövcud deyil. Zəhmət olmasa, digər xidmətlərimizə nəzər yetirin və ya bizimlə əlaqə saxlayın.',
        'features_heading' => 'Digər Xidmətlərimiz',
        'features' => [],
    ];
}
?>

@section('title', $service['title'] . ' - AliyevStudio | Rəqəmsal Dünyadan Yeniliklər və İdeyalar')
@section('description', $service['meta_description'])

@section('content')

<style>
    .service-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .service-hero-bg-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 18vw;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.02);
        white-space: nowrap;
        pointer-events: none;
        z-index: 0;
        font-family: var(--rr-ff-heading);
        letter-spacing: -2px;
    }
    .service-overview-section, .service-features-section {
        padding: 100px 0;
    }
    .service-features-item {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 30px;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: 100%;
    }
    .service-features-item:hover {
        border-color: var(--rr-color-theme-primary);
        transform: translateY(-5px);
    }
    .service-features-item .icon {
        font-size: 48px;
        color: var(--rr-color-theme-primary);
        margin-bottom: 20px;
    }
    .service-features-item h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--rr-color-common-white);
    }
    .service-features-item p {
        color: var(--rr-color-text-body);
        line-height: 1.7;
    }
    [data-theme="light"] .service-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .service-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .service-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
    [data-theme="light"] .service-features-item {
        background: #fff;
        border-color: rgba(0,0,0,0.1);
    }
    [data-theme="light"] .service-features-item h3 {
        color: var(--rr-color-heading-primary);
    }
    [data-theme="light"] .service-features-item .icon {
        color: var(--rr-color-theme-primary); /* Ensure icon color is set in light mode */
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- Service Hero Section -->
        <section class="service-hero-section fade-wrapper">
            <div class="service-hero-bg-text">{{ strtoupper($service['hero_title_italic']) }}</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-8 fade-top">
                        <div class="service-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">{{ $service['hero_subtitle'] }}</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;"><span style="color: var(--rr-color-theme-primary); font-style: italic;">{{ $service['hero_title_italic'] }}</span> <br>{{ $service['hero_title_rest'] }}</h1>
                            <p class="mb-0" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 600px; line-height: 1.8;">{{ $service['meta_description'] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-top">
                        <div class="service-hero-image">
                            <img src="{{ asset($service['hero_image']) }}" alt="{{ $service['title'] }}" style="width: 100%; height: auto; border-radius: 16px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ service-hero-section -->

        <!-- Service Overview Section -->
        <section class="service-overview-section fade-wrapper">
            <div class="container">
                <style>
                    [data-theme="light"] .service-overview-section { background-color: var(--rr-color-common-white); }
                </style>
                <div class="row justify-content-center"> 
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title mb-4" data-text-animation data-split="word" data-duration="1">{{ $service['overview_heading'] }}</h2>
                        <p class="fade-top" style="font-size: 18px; color: var(--rr-color-text-body); line-height: 1.8;">{{ $service['overview_text'] }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ service-overview-section -->

        <!-- Service Features Section -->
        @if (!empty($service['features'])) {{-- Removed bg-dark-1 class to allow light mode styling --}}
        <section class="service-features-section fade-wrapper">
            <style>
                [data-theme="light"] .service-features-section { background-color: var(--rr-color-grey-light); }
            </style>
            <div class="container">
                <div class="section-heading text-center mb-5">
                    <h2 class="section-title" data-text-animation data-split="word" data-duration="1">{{ $service['features_heading'] }}</h2>
                </div>
                <div class="row gy-4">
                    @foreach ($service['features'] as $feature)
                    <div class="col-lg-3 col-md-6 fade-top">
                        <div class="service-features-item">
                            <div class="icon">
                                <i class="{{ $feature['icon'] }}"></i>
                            </div>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- ./ service-features-section -->

        <!-- Call to Action Section (reusing service-cta from about page) -->
        <section class="service-cta">
            <div class="bg-img" data-background="{{ asset('assets/img/bg-img/service-cta.jpg') }}"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="service-cta-wrap">
                    <div class="section-heading mb-0">
                        <h4 class="sub-heading after-none" data-text-animation="fade-in" data-duration="1.5">Layihəyə Başla</h4>
                        <h2 class="section-title" data-text-animation data-split="word" data-duration="1">
                            Birlikdə möhtəşəm <br>işlər yaradaq!
                        </h2>
                    </div>
                    <a href="{{ route('contact') }}" class="rr-primary-btn cta-btn">
                        Əlaqə Saxla <i class="fa-regular fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- ./ service-cta -->

        @include('pages.footer')
        <!-- ./ footer-section -->
    </div>
</div>

<div id="scroll-percentage">
    <span id="scroll-percentage-value"></span>
</div>

 <script>
        // Preloader hiding logic
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
            const preloader = document.getElementById('preloader');
            if (preloader) {
                // Remove preloader from DOM after transition ends to prevent blocking interactions
                preloader.addEventListener('transitionend', () => preloader.style.display = 'none');
            }
        });
    </script>
@endsection