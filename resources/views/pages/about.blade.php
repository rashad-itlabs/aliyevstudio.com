@extends('pages.app')

@section('title', 'Haqqımızda - AliyevStudio | Rəqəmsal İnnovasiya Agentliyi')
@section('description', 'Aliyevstudio olaraq, rəqəmsal məhsullar yaratmaq üçün strateji düşüncə, mükəmməl dizayn və texniki innovasiyaları birləşdiririk.')

@section('content')

<style>
    .about-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .about-hero-bg-text {
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
    [data-theme="light"] .about-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .about-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .about-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- Modern About Hero Section -->
        <section class="about-hero-section fade-wrapper">
            <div class="about-hero-bg-text">STUDIO</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-8 fade-top">
                        <div class="about-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Haqqımızda</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">Biz rəqəmsal <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">innovasiya</span> agentliyiyik.</h1>
                            <p class="mb-0" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 600px; line-height: 1.8;">Müştərilərimiz üçün dəyər yaradan, vizual olaraq cəlbedici və texnoloji cəhətdən qabaqcıl rəqəmsal həllər hazırlayırıq. Hər bir layihəyə xüsusi diqqət yetiririk.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ about-hero-section -->
        
        <section class="about-section-4 pt-130 pb-130">
            <div class="shape">
                <img src="assets/img/shapes/about-shape-3.png" alt="shape">
            </div>
            <div class="container">
                <div class="row gy-lg-0 gy-4 align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img-wrap-4">
                            <div class="about-img img-1 reveal">
                                <img src="assets/img/images/about-img-7.jpeg" alt="img">
                            </div>
                            <div class="about-img img-2 reveal">
                                <img src="assets/img/images/about-img-8.jpeg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-content-4 fade-wrapper">
                            <div class="section-heading heading-3 mb-0">
                                <h4 class="sub-heading after-none" data-text-animation="fade-in" data-duration="1.5">Biz Kimik</h4>
                                <h2 class="section-title t-up" data-text-animation data-split="word" data-duration="1">Önəmli rəqəmsal həllər yaradırıq</h2>
                                <p class="fade-top mt-4">Aliyevstudio olaraq, rəqəmsal məhsullar yaratmaq üçün strateji düşüncə, mükəmməl dizayn və texniki innovasiyaları birləşdiririk. Çoxşaxəli komandamız sürətlə inkişaf edən rəqəmsal mühitdə biznesinizin inkişafına kömək etməyə həsr olunub.</p>
                                <p class="fade-top mt-3">Şəffaf ünsiyyətə, əməkdaşlığa və hər bir addımda dəyər yaratmağa inanırıq.</p>
                            </div>
                            <div class="about-counter-wrap fade-top mt-4">
                                <div class="about-counter">
                                    <div class="icon">
                                        <img src="assets/img/icon/about-3.png" alt="icon">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <span class="odometer" data-count="15">0</span>
                                            +
                                        </h3>
                                        <p>İllik Təcrübə</p>
                                    </div>
                                </div>
                                <div class="about-counter">
                                    <div class="icon">
                                        <img src="assets/img/icon/about-4.png" alt="icon">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <span class="odometer" data-count="375">0</span>
                                            +
                                        </h3>
                                        <p>Tamamlanmış Layihə</p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-btn fade-top">
                                <a href="{{ route('contact') }}" class="rr-primary-btn">
                                    Əlaqə Saxla <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ about-section -->

        <section class="process-section-3 pt-130 pb-130" data-background="assets/img/bg-img/process-bg.png">
            <div class="container">
                <div class="section-heading heading-3 text-center">
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">İş Prosesimiz</h4>
                    <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Bunu Necə Həyata Keçiririk</h2>
                </div>
                <div class="row gy-lg-0 gy-4 fade-wrapper">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-item-wrap fade-top">
                            <div class="process-item-2 text-center">
                                <div class="icon">
                                    <i class="fa-light fa-lightbulb-on" style="font-size: 40px; color: currentColor;"></i>
                                </div>
                                <span>Addım 1</span>
                                <h3 class="title">Araşdırma</h3>
                                <div class="process-bottom">
                                    <p>Hədəflərinizi, hədəf kütlənizi və layihə tələblərinizi anlamaqla başlayırıq.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-item-wrap fade-top">
                            <div class="process-item-2 text-center">
                                <div class="icon">
                                    <i class="fa-light fa-pen-nib" style="font-size: 40px; color: currentColor;"></i>
                                </div>
                                <span>Addım 2</span>
                                <h3 class="title">Dizayn</h3>
                                <div class="process-bottom">
                                    <p>Yaradıcı komandamız intuitiv, maraqlı və vizual baxımdan cəlbedici prototiplər hazırlayır.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-item-wrap fade-top">
                            <div class="process-item-2 text-center">
                                <div class="icon">
                                    <i class="fa-light fa-code" style="font-size: 40px; color: currentColor;"></i>
                                </div>
                                <span>Addım 3</span>
                                <h3 class="title">Proqramlaşdırma</h3>
                                <div class="process-bottom">
                                    <p>Müasir texnologiyalar və ən yaxşı kodlaşdırma təcrübələri ilə dizaynları həyata keçiririk.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-item-wrap fade-top">
                            <div class="process-item-2 text-center">
                                <div class="icon">
                                    <i class="fa-light fa-rocket-launch" style="font-size: 40px; color: currentColor;"></i>
                                </div>
                                <span>Addım 4</span>
                                <h3 class="title">Təhvil</h3>
                                <div class="process-bottom">
                                    <p>Dəqiq testlərdən sonra layihənizi təhvil verir və davamlı dəstək təklif edirik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ process-section -->

        <section class="service-cta">
            <div class="bg-img" data-background="assets/img/bg-img/service-cta.jpg"></div>
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

@endsection