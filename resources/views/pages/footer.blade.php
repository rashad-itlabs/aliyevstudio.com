 <!-- ./ pricing-section -->
<footer class="footer-section bg-dark-1">
    <div class="shape">
        <img src="{{ asset('assets/img/shapes/footer-shape.png') }}" alt="footer">
    </div>
    <div class="container">
        <div class="row footer-wrap">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <div class="widget-header">
                        <div class="footer-logo">
                            <a href="{{ asset('/') }}">
                                <img src="{{ asset('assets/img/logo/logo-2.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <p class="mb-20">İnnovativ rəqəmsal həllərimiz və müştəri məmnuniyyəti yönümlü yanaşmamızla daim yanınızdayıq.</p>
                    <h4 class="title">
                        BİZİMLƏ ƏLAQƏ <span>Azərbaycan, Bakı, Dəmirçi  Plaza</span>
                    </h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget footer-col-2">
                    <div class="widget-header">
                        <h3 class="widget-title">Faydalı Keçidlər</h3>
                    </div>
                    <ul class="footer-list">
                        <li>
                            <a href="{{route('about')}}">Haqqımızda</a>
                        </li>
                        <li>
                            <a href="{{route('services')}}">Xidmətlərimiz</a>
                        </li>
                        <li>
                            <a href="{{route('ourTeam')}}">Komandamız</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <div class="widget-header">
                        <h3 class="widget-title">Əlaqə</h3>
                    </div>
                    <ul class="address-list">
                        <li>
                            <a href="mailto:support@agency.com">info@aliyevstudio.com</a>
                        </li>
                        <li>
                            <a href="tel:+2585492153215">+994(55)669 12 48</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <div class="widget-header">
                        <h3 class="widget-title">Xəbər bülleteninə abunə olun</h3>
                    </div>
                    <div class="footer-form mb-20">
                        <form action="{{ route('subscribe') }}" method="POST" class="rr-subscribe-form" id="subscribeForm">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="E-poçt ünvanı">
                            <button class="submit">Abunə Ol</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <div class="form-check form-item">
                        <input class="form-check-input" type="checkbox" value="" id="man">
                        <label class="form-check-label" for="man">Yeniliklərimizdən, xüsusi təkliflərimizdən və faydalı məqalələrimizdən ilk siz xəbərdar olmaq üçün e-poçtlar almağa razıyam.
                </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row copyright-content">
                <div class="col-md-6">
                    <p>© 2026 Aliyevstudio. Bütün Hüquqlar Qorunur.</p>
                </div>
                <div class="col-md-6">
                    <ul class="social-list">
                        <li class="facebook">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="pinterest">
                            <a href="#">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="instagram">
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./ footer-section -->