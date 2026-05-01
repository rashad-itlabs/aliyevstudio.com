@extends('pages.app')
@section('title', 'Əlaqə - AliyevStudio | Bizimlə Layihənizi Müzakirə Edin')
@section('description', 'AliyevStudio ilə əlaqə saxlayın. Ünvanımız, telefon nömrəmiz və e-poçt ünvanımız. Yeni rəqəmsal layihənizə birlikdə başlayaq.')
@section('content')

<style>
    .contact-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .contact-hero-bg-text {
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
    [data-theme="light"] .contact-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .contact-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .contact-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- Modern Contact Hero Section -->
        <section class="contact-hero-section fade-wrapper">
            <div class="contact-hero-bg-text">SALAM</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-8 fade-top">
                        <div class="contact-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Əlaqə</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">Birlikdə <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">möhtəşəm</span> işlər yaradaq.</h1>
                            <p class="mb-0" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 600px; line-height: 1.8;">İstər müəyyən bir layihəniz olsun, istərsə də sadəcə imkanları kəşf etmək istəyirsiniz, kömək etməyə hazırıq. Bizimlə əlaqə saxlayın və müzakirəyə başlayaq.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ contact-hero-section -->
        
        <section class="contact-section pt-130 pb-130 fade-wrapper">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-5 col-md-12 fade-top">
                        <div class="contact-info-wrapper">
                            <div class="section-heading mb-40">
                                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">Bizimlə Əlaqə</h4>
                                <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Layihənizi Müzakirə Edək</h2>
                                <p class="mt-20">Məhsul dizaynı və ya tərəfdaşlıq imkanlarını müzakirə etməyə hər zaman açıqıq. Çəkinmədən bizimlə əlaqə saxlaya bilərsiniz.</p>
                            </div>
                            <div class="contact-info-list">
                                <div class="info-item d-flex align-items-center mb-4">
                                    <div class="icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 24px; margin-right: 20px; background-color: var(--rr-theme-primary, #ff5a3c);">
                                        <i class="fa-light fa-location-dot"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title mb-1">Ünvanımız</h4>
                                        <p class="mb-0">Azərbaycan, Bakı, Dəmirçi Plaza</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center mb-4">
                                    <div class="icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 24px; margin-right: 20px; background-color: var(--rr-theme-primary, #ff5a3c);">
                                        <i class="fa-light fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title mb-1">Telefon Nömrəsi</h4>
                                        <a href="tel:+994556691248" class="text-body">+994(55)669 12 48</a>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 24px; margin-right: 20px; background-color: var(--rr-theme-primary, #ff5a3c);">
                                        <i class="fa-light fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title mb-1">E-poçt Ünvanı</h4>
                                        <a href="mailto:info@aliyevstudio.com" class="text-body">info@aliyevstudio.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 fade-top">
                        <div class="contact-form-wrap bg-white p-5 rounded shadow-sm border" style="border-color: #eee !important;">
                            <h3 class="mb-4">Bizə Mesaj Göndərin</h3>
                            <form action="#" method="POST" id="contact-form" class="contact-form">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control bg-light border-0 py-3 px-4" placeholder="Adınız" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control bg-light border-0 py-3 px-4" placeholder="E-poçt" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control bg-light border-0 py-3 px-4" placeholder="Mövzu">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control bg-light border-0 py-3 px-4" placeholder="Mesajınızı Yazın" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="rr-primary-btn w-100 justify-content-center border-0">
                                            Mesajı Göndər <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ contact-section -->

        @include('pages.footer')
        <!-- ./ footer-section -->
    </div>
</div>
@endsection