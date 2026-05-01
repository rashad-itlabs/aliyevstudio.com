@extends('pages.app')
@section('title', 'Privacy - AliyevStudio | Rəqəmsal İnnovasiya Agentliyi')
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
        <section class="about-hero-section fade-wrapper">
            <div class="about-hero-bg-text">STUDIO</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-8 fade-top">
                        <div class="about-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Privacy</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">Məxfilik <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">Siyasəti</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pt-120 pb-120">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <p><strong>Son yenilənmə tarixi:</strong> {{ date('d.m.Y') }}</p>

                    <p><strong>Docly Həkim-Pasiyent Randevu Sisteminə</strong> ("Docly", "biz", "bizim") xoş gəlmisiniz. Sizin məxfiliyiniz bizim üçün önəmlidir. Bu Məxfilik Siyasəti tətbiqimizdən və xidmətlərimizdən istifadə edərkən şəxsi məlumatlarınızı necə topladığımızı, istifadə etdiyimizi və qoruduğumuzu izah edir.</p>

                    <h3 class="mt-4">1. Topladığımız Məlumatlar</h3>
                    <p>Biz sizə daha yaxşı xidmət göstərmək üçün aşağıdakı məlumatları toplayırıq:</p>
                    <ul>
                        <li><strong>Şəxsi Məlumatlar:</strong> Ad, soyad, e-poçt ünvanı, telefon nömrəsi, cins və yaş.</li>
                        <li><strong>Tibbi və Randevu Məlumatları:</strong> Həkimlər üçün ixtisas və iş təcrübəsi məlumatları, pasiyentlər üçün diaqnozlar, randevu tarixləri, saatları və sistemə daxil etdiyiniz əlavə qeydlər.</li>
                        <li><strong>Texniki Məlumatlar:</strong> Bildirişlərin (push notifications) göndərilməsi üçün cihaz məlumatları və FCM (Firebase Cloud Messaging) tokenləri.</li>
                    </ul>

                    <h3 class="mt-4">2. Məlumatların İstifadəsı</h3>
                    <p>Topladığımız məlumatları aşağıdakı məqsədlər üçün istifadə edirik:</p>
                    <ul>
                        <li>Həkimlər və pasiyentlər arasında randevuların asanlıqla təşkili və idarə edilməsi.</li>
                        <li>Sistem daxilində vacib bildirişlərin (məsələn, yeni randevu təsdiqi və ya ləğvi) göndərilməsi.</li>
                        <li>İstifadəçi profillərinin fərdi olaraq tənzimlənməsi və qorunması.</li>
                        <li>Xidmət keyfiyyətinin artırılması və tətbiqin təkmilləşdirilməsi.</li>
                    </ul>

                    <h3 class="mt-4">3. Məlumatların Paylaşılması</h3>
                    <p>Biz sizin şəxsi məlumatlarınızı üçüncü tərəflərə satmırıq və ya icarəyə vermirik. Məlumatlarınız yalnız aşağıdakı hallarda paylaşıla bilər:</p>
                    <ul>
                        <li><strong>Həkimlər və Pasiyentlər Arasında:</strong> Randevu prosesini həyata keçirmək üçün zəruri olan profil və diaqnoz məlumatları yalnız müvafiq həkim və pasiyent arasında paylaşılır.</li>
                        <li><strong>Hüquqi Tələblər:</strong> Qanunvericiliklə tələb olunan hallarda və ya hüquqlarımızı qorumaq məqsədilə müvafiq dövlət qurumlarına təqdim edilə bilər.</li>
                    </ul>

                    <h3 class="mt-4">4. Məlumatların Təhlükəsizliyi</h3>
                    <p>Sizin məlumatlarınızın təhlükəsizliyini təmin etmək üçün müvafiq texniki və təşkilati tədbirlər görürük. Şifrələriniz sistemdə xüsusi alqoritmlərlə (hash) şifrələnmiş şəkildə saxlanılır. Lakin qeyd etməliyik ki, internet üzərindən heç bir ötürmə metodu 100% təhlükəsiz deyil.</p>

                    <h3 class="mt-4">5. Sizin Hüquqlarınız</h3>
                    <p>İstifadəçi olaraq aşağıdakı hüquqlara sahibsiniz:</p>
                    <ul>
                        <li>Profilinizdəki məlumatlara baxa və onları istədiyiniz zaman yeniləyə bilərsiniz.</li>
                        <li>Randevularınızı idarə edə və ya ləğv edə bilərsiniz.</li>
                        <li>Hesabınızın və şəxsi məlumatlarınızın silinməsini bizdən tələb edə bilərsiniz.</li>
                    </ul>

                    <h3 class="mt-4">6. Siyasətə Dəyişikliklər</h3>
                    <p>Biz bu Məxfilik Siyasətini zaman-zaman yeniləyə bilərik. Siyasətdə hər hansı mühüm dəyişikliklər olduqda, bu barədə sizə tətbiq daxilində və ya e-poçt vasitəsilə məlumat veriləcəkdir.</p>

                    <h3 class="mt-4">7. Bizimlə Əlaqə</h3>
                    <p>Məxfilik Siyasəti və ya məlumatlarınızın qorunması ilə bağlı hər hansı sualınız, təklifiniz və ya şikayətiniz varsa, bizimlə əlaqə saxlamaqdan çəkinməyin.</p>
                    <p><strong>E-poçt:</strong> info@aliyevstudio.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection