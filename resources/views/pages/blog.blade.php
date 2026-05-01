@extends('pages.app')
@section('title', ($featuredBlogTitle->title ?? 'Bloq') . ' - AliyevStudio | Rəqəmsal Dünyadan Yeniliklər və İdeyalar')
@section('description', $featuredBlogTitle->description ?? 'Rəqəmsal dizayn, proqramlaşdırma, biznes strategiyası və veb texnologiyalarının gələcəyi haqqında məqalələrimizi kəşf edin.')

@section('content')

<style>
    .blog-hero-section {
        padding-top: 220px;
        padding-bottom: 120px;
        background-color: var(--rr-color-bg-1);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--rr-color-border-1);
    }
    .blog-hero-bg-text {
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
    .featured-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        transform: translateZ(0);
    }
    .featured-card .thumb {
        height: 500px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }
    .featured-card .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s ease;
    }
    .featured-card:hover .thumb img {
        transform: scale(1.05);
    }
    .featured-card .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(17, 21, 28, 1) 0%, rgba(17, 21, 28, 0.2) 60%, transparent 100%);
        z-index: 1;
    }
    .featured-card .content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 40px;
        z-index: 2;
    }
    .featured-card .content .title a {
        color: var(--rr-color-common-white);
        transition: color 0.3s ease;
    }
    .featured-card .content .title a:hover {
        color: var(--rr-color-theme-primary);
    }
    .search-box-wrap form input {
        width: 100%;
        padding: 20px 30px;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.1);
        color: var(--rr-color-common-white);
        border-radius: 50px;
        outline: none;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }
    .search-box-wrap form input:focus {
        border-color: var(--rr-color-theme-primary);
    }
    [data-theme="light"] .blog-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .blog-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .featured-card {
        border-color: rgba(0, 0, 0, 0.1);
    }
    [data-theme="light"] .search-box-wrap form input {
        background: #fff;
        border-color: rgba(0,0,0,0.1);
        color: #000;
    }
    [data-theme="light"] .blog-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        
        <!-- Modern Blog Hero Section -->
        <section class="blog-hero-section fade-wrapper">
            <div class="blog-hero-bg-text">JURNAL</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <!-- Text Content -->
                    <div class="col-lg-6 fade-top">
                        <div class="blog-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Bloqumuz</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">İlham Verən <br><span style="color: var(--rr-color-theme-primary); font-style: italic;">İdeyalar.</span></h1>
                            <p class="mb-5" style="font-size: 18px; color: var(--rr-color-text-body); max-width: 480px; line-height: 1.8;">Rəqəmsal dizayn, proqramlaşdırma, biznes strategiyası və veb texnologiyalarının gələcəyi haqqında məqalələrimizi kəşf edin.</p>
                            
                            <div class="search-box-wrap" style="max-width: 450px; position: relative;">
                                <form action="#">
                                    <input type="text" placeholder="Məqalə axtar...">
                                    <button type="submit" style="position: absolute; right: 8px; top: 8px; background: var(--rr-color-theme-primary); border: none; height: 50px; width: 50px; border-radius: 50%; color: var(--rr-color-common-white); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; font-size: 18px;"><i class="fa-regular fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Image / Post -->
                    <div class="col-lg-6 fade-top">
                        <div class="featured-card">
                            <div class="thumb">
                                <div class="overlay"></div>
                                <img src="assets/img/images/about-img-7.jpeg" alt="Featured Post">
                                <div class="content">
                                    <div class="meta d-flex align-items-center mb-3" style="gap: 15px;">
                                        <span class="badge" style="background: var(--rr-color-theme-primary); color: #fff; padding: 6px 15px; border-radius: 30px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Önə Çıxan Məqalə</span>
                                        <span style="color: rgba(255,255,255,0.7); font-size: 14px;"><i class="fa-regular fa-clock" style="margin-right: 6px;"></i> 5 dəq oxuma</span>
                                    </div>
                                    <h3 class="title mb-3" style="font-size: 32px; font-weight: 700; line-height: 1.3;"><a href="#" style="text-decoration: none;">Müştəriləriniz üçün Mükəmməl Rəqəmsal Təcrübəni Necə Qurmalı?</a></h3>
                                    <a href="#" class="d-inline-flex align-items-center" style="color: var(--rr-color-common-white); font-weight: 600; font-size: 16px;">Məqaləni Oxu <i class="fa-regular fa-arrow-right" style="font-size: 14px; margin-left: 8px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="blog-section pt-130 pb-130 fade-wrapper">
            <div class="container">
                <div class="row gy-5">
                    <!-- Main Content (Articles) -->
                    <div class="col-lg-8">
                        <!-- Post 1 -->
                        @foreach($featuredBlog as $bg)
                        <div class="post-card-wrap fade-top">
                            <div class="post-card card-6 card-8">
                                <div class="post-thumb" style="height: 400px;">
                                    
                                    <img src="{{asset('/storage/app/public')}}/{{json_decode($bg->images)[0]}}" alt="blog">
                                </div>
                                <div class="post-content-wrap">
                                    <div class="post-content">
                                        <ul class="post-meta">
                                            <li><i class="fa-light fa-calendar"></i> {{now()->format('d-M-Y', $bg->created_at)}}</li>
                                            <li><i class="fa-light fa-user"></i> Müəllif: aliyevstudio.com</li>
                                            {{-- <li><i class="fa-light fa-folder-open"></i> UI/UX Design</li> --}}
                                        </ul>
                                        <h3 class="title"><a href="{{route('blog-detail',$bg->slug)}}">{{$bg->title}}</a></h3>
                                        <p class="mb-4">{!! Str::limit($bg->description, 180) !!}</p>
                                        <p></p>
                                        <a href="{{route('blog-detail',$bg->slug)}}" class="rr-primary-btn blog-btn">Daha Ətraflı <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <!-- Pagination -->
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-widget search-form fade-top">
                            <h4 class="widget-title">Axtar</h4>
                            <form action="#" class="search-form">
                                <input type="text" class="form-control" placeholder="Açar sözləri axtar...">
                                <button class="search-btn"><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        
                        <div class="sidebar-widget category-list fade-top">
                            <h4 class="widget-title">Kateqoriyalar</h4>
                            <ul class="category-list">
                                <li><a href="#">Veb Dizayn <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">UI/UX Dizayn <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">Rəqəmsal Marketinq <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">Brendinq <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">Proqramlaşdırma <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tags fade-top">
                            <h4 class="widget-title">Populyar Teqlər</h4>
                            <ul class="tags">
                                <li><a href="#">Agency</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Web</a></li>
                                <li><a href="#">Minimal</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Startups</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./ blog-section -->

        @include('pages.footer')
        <!-- ./ footer-section -->
    </div>
</div>

<div id="scroll-percentage">
    <span id="scroll-percentage-value"></span>
</div>

@endsection