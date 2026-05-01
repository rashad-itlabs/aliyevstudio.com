@extends('pages.app')

@section('title', 'Portfolio - AliyevStudio | Rəqəmsal Layihələrimiz və İşlərimiz')
@section('description', 'Ən son və ən uğurlu layihələrimizlə tanış olun. İntuitiv veb tətbiqlərdən tutmuş interaktiv rəqəmsal təcrübələrə qədər hazırladığımız işlər.')

@section('content')

<style>
    .portfolio-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .portfolio-hero-bg-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16vw;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.02);
        white-space: nowrap;
        pointer-events: none;
        z-index: 0;
        font-family: var(--rr-ff-heading);
        letter-spacing: -2px;
    }
    [data-theme="light"] .portfolio-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .portfolio-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .portfolio-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
    .featured-project-card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
    [data-theme="light"] .featured-project-card {
        border-color: rgba(0,0,0,0.1);
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    }
    .featured-img-wrap {
        height: 350px;
        overflow: hidden;
        position: relative;
    }
    .featured-img-wrap img {
        width: 100%;
        height: auto;
        min-height: 350px;
        object-fit: cover;
        object-position: top;
        transition: transform 4s cubic-bezier(0.25, 1, 0.5, 1);
        will-change: transform;
    }
    .featured-img-wrap:hover img {
        transform: translateY(calc(-100% + 350px));
    }
    .portfolio-thumb {
        background: #fff;
        border: 1px solid #e6e6e6;
    }
    .browser-top {
        background: #f1f1f1;
        padding: 12px 15px;
        display: flex;
        gap: 8px;
        border-bottom: 1px solid #e6e6e6;
    }
    .browser-top .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    
    /* New Portfolio List Styles */
    .filter-btn {
        font-size: 16px;
        font-weight: 600;
        color: var(--rr-color-text-body);
        padding: 8px 24px;
        border-radius: 30px;
        border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    .filter-btn.active, .filter-btn:hover {
        background: var(--rr-color-theme-primary);
        color: #fff;
        border-color: var(--rr-color-theme-primary);
    }
    [data-theme="light"] .filter-btn {
        border-color: rgba(0,0,0,0.1);
        color: var(--rr-color-heading-primary);
    }
    [data-theme="light"] .filter-btn.active, [data-theme="light"] .filter-btn:hover {
        color: #fff;
    }
    .project-list-item {
        margin-bottom: 120px;
    }
    .project-list-thumb {
        overflow: hidden;
        border-radius: 16px;
        position: relative;
        height: 550px;
    }
    .project-list-thumb img {
        width: 100%;
        height: auto;
        min-height: 550px;
        object-fit: cover;
        object-position: top;
        transition: transform 4s cubic-bezier(0.25, 1, 0.5, 1);
        transform: translateY(0);
        will-change: transform;
    }
    .project-list-thumb:hover img {
        transform: translateY(calc(-100% + 550px));
    }
    .project-list-category {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--rr-color-theme-primary);
        margin-bottom: 15px;
        display: inline-block;
    }
    .project-list-title {
        font-size: 48px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        color: var(--rr-color-common-white);
    }
    [data-theme="light"] .project-list-title {
        color: var(--rr-color-heading-primary);
    }
    [data-theme="light"] .portfolio-cta h2 {
        color: var(--rr-color-heading-primary) !important;
    }
    .project-view-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.2);
        color: var(--rr-color-common-white);
        font-size: 20px;
        transition: all 0.3s ease;
    }
    [data-theme="light"] .project-view-btn {
        border-color: rgba(0,0,0,0.1);
        color: var(--rr-color-heading-primary);
    }
    .project-view-btn:hover {
        background-color: var(--rr-color-theme-primary);
        border-color: var(--rr-color-theme-primary);
        color: #fff !important;
        transform: rotate(-45deg);
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- Modern Portfolio Hero Section -->
        <section class="portfolio-hero-section fade-wrapper">
            <div class="portfolio-hero-bg-text">LAYİHƏLƏR</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <!-- Text Content -->
                    <div class="col-lg-6 fade-top">
                        <div class="portfolio-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Portfoliomuz</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">Rəqəmsal <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">şedevrlər.</span></h1>
                            <p class="mb-0" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 480px; line-height: 1.8;">Ən son və ən uğurlu layihələrimizlə tanış olun. İntuitiv veb tətbiqlərdən tutmuş interaktiv rəqəmsal təcrübələrə qədər.</p>
                        </div>
                    </div>
                    
                    <!-- Featured Image -->
                    <div class="col-lg-6 fade-top">
                        <div class="featured-project-card">
                            <div class="browser-top">
                                <span class="dot" style="background:#ff5f56;"></span>
                                <span class="dot" style="background:#ffbd2e;"></span>
                                <span class="dot" style="background:#27c93f;"></span>
                            </div>
                            <div class="featured-img-wrap">
                                <img src="assets/img/project/screen-1.png" alt="Featured Project" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ portfolio-hero-section -->
        
        <section class="portfolio-list-section pt-130 pb-50">
            <div class="container">
                
                <!-- Filter Menu -->
                <div class="portfolio-filter text-center mb-60">
                    <ul class="filter-list list-unstyled d-flex justify-content-center gap-3 flex-wrap m-0 p-0">
                        <li><a href="javascript:void(0)" class="active filter-btn">Bütün İşlər</a></li>
                        <li><a href="javascript:void(0)" class="filter-btn">Veb Dizayn</a></li>
                        <li><a href="javascript:void(0)" class="filter-btn">Mobil Tətbiqlər</a></li>
                        <li><a href="javascript:void(0)" class="filter-btn">Brendinq</a></li>
                    </ul>
                </div>

                <div class="portfolio-list-wrapper">
                    <!-- Item 1 (Image Left) -->
                    <div class="row align-items-center project-list-item">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-1.png" alt="Motorola">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content ps-lg-5">
                                <span class="project-list-category">Veb Proqramlaşdırma</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">Motorola Azərbaycan</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">Motorola-nın regional brendi üçün problemsiz e-ticarət imkanlarına və zərif UI/UX dizaynına yönəlmiş rəqəmsal yenilənmə layihəsi.</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 (Image Right - ZigZag) -->
                    <div class="row align-items-center project-list-item flex-lg-row-reverse">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-2.png" alt="RR Project">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content pe-lg-5">
                                <span class="project-list-category">Mobil Tətbiq</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">RR Project</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">İntuitiv və minimal interfeys arxitekturası ilə gündəlik işləri asanlaşdırmaq üçün hazırlanmış innovativ mobil tətbiq.</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 (Image Left) -->
                    <div class="row align-items-center project-list-item" style="margin-bottom: 60px;">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-3.png" alt="Linzalar">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content ps-lg-5">
                                <span class="project-list-category">E-Ticarət</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">Linzalar Store</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">Sürətli ödəniş sistemi və istifadəçi dostu naviqasiyası ilə tibbi məhsullar üçün qurulmuş müasir e-ticarət platforması.</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 (Image Right - ZigZag) -->
                    <div class="row align-items-center project-list-item flex-lg-row-reverse">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-7.png" alt="RR Project">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content pe-lg-5">
                                <span class="project-list-category">E-Ticarət</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">PanoramaShoes</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">Bu sayt üzərində xüsusi integrasiya işlərini həyata keçirtmişik.(Xüsusü RestApi-lər və Servislər yazmışıq)</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 (Image Left) -->
                    <div class="row align-items-center project-list-item" style="margin-bottom: 60px;">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-8.png" alt="Trend Oil">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content ps-lg-5">
                                <span class="project-list-category">OIL</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">TrendOil</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">Əlverişli yerdə yerləşən və coğrafi baxımdan ən geniş yanacaqdoldurma məntəqələri şəbəkəsini təklif edə bilərik.</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 6 (Image Right - ZigZag) -->
                    <div class="row align-items-center project-list-item flex-lg-row-reverse">
                        <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                            <div class="project-list-thumb shadow-sm">
                                 <img src="assets/img/project/screen-9.png" alt="Alliance">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="project-list-content pe-lg-5">
                                <span class="project-list-category">Alliance işə düzəltmə</span>
                                <h2 class="project-list-title"><a href="#" style="text-decoration: none; color: inherit;">ATTAS GROUP</a></h2>
                                <p class="mb-4 text-body" style="font-size: 18px;">Şirkətlər neft, investisiya və humanitar şirkətlərin məsləhətçisi olaraq fəaliyyət göstərir.</p>
                                <a href="#" class="project-view-btn"><i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="text-center mt-5">
                    <a href="#" class="rr-primary-btn transparent" style="border-radius: 30px;">Daha Çox Layihə Yüklə <i class="fa-regular fa-arrow-right" style="margin-left: 8px;"></i></a>
                </div>
            </div>
        </section>
        <!-- ./ portfolio-list-section -->

        <section class="portfolio-cta pt-130 pb-130 text-center fade-wrapper" style="background: rgba(63, 90, 243, 0.05); border-top: 1px solid rgba(63, 90, 243, 0.1);">
            <div class="container">
                <h2 class="fade-top" style="font-size: 8vw; font-weight: 900; line-height: 1; margin-bottom: 40px; letter-spacing: -2px; color: var(--rr-color-common-white);">İDEYANIZ VAR?</h2>
                <a href="{{ route('contact') }}" class="rr-primary-btn fade-top" style="font-size: 20px; padding: 25px 45px; border-radius: 50px;">
                    Birlikdə İşləyək <i class="fa-regular fa-arrow-right" style="margin-left: 10px;"></i>
                </a>
            </div>
        </section>
        <!-- ./ portfolio-cta -->

        @include('pages.footer')
        <!-- ./ footer-section -->
    </div>
</div>

<div id="scroll-percentage">
    <span id="scroll-percentage-value"></span>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Səhifə yükləndikdə GSAP və ScrollTrigger işə düşür
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // Portfel Siyahısı üçün zərif GSAP Animasiyaları
            const projectItems = gsap.utils.toArray('.project-list-item');
            projectItems.forEach((item, index) => {
                const isReverse = item.classList.contains('flex-lg-row-reverse');
                const imgThumb = item.querySelector('.project-list-thumb');
                const content = item.querySelector('.project-list-content');

                // Şəkillər sağ/sol kənarlardan daxil olur
                gsap.fromTo(imgThumb, 
                    { x: isReverse ? 30 : -30, opacity: 0 },
                    {
                        scrollTrigger: {
                            trigger: item,
                            start: "top 90%",
                        },
                        x: 0,
                        opacity: 1,
                        duration: 0.8,
                        ease: "power3.out"
                    }
                );

                // Mətn blokları yüngül yuxarıya doğru daxil olur
                gsap.fromTo(content, 
                    { y: 20, opacity: 0 },
                    {
                        scrollTrigger: {
                            trigger: item,
                            start: "top 90%",
                        },
                        y: 0,
                        opacity: 1,
                        duration: 0.8,
                        delay: 0.1,
                        ease: "power3.out"
                    }
                );
            });
        }
    });
</script>

@endsection