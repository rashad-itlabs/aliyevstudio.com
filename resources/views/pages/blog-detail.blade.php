@extends('pages.app')

@section('title', ($blogs->title ?? 'Məqalə') . ' - AliyevStudio | Rəqəmsal Dünyadan Yeniliklər və İdeyalar')
@section('description', $blogs->description ?? 'Rəqəmsal dizayn, proqramlaşdırma, biznes strategiyası və veb texnologiyalarının gələcəyi haqqında məqalələrimizi kəşf edin.')

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
    [data-theme="light"] .blog-hero-section {
        background-color: var(--rr-color-grey-light);
        border-bottom: 1px solid var(--rr-color-border-light);
    }
    [data-theme="light"] .blog-hero-bg-text {
        color: rgba(0, 0, 0, 0.03);
    }
    [data-theme="light"] .blog-hero-content .subtitle-badge {
        color: var(--rr-color-heading-primary) !important;
    }
    .blog-detail-section {
        background-color: var(--rr-color-bg-1);
        color: var(--rr-color-text-body);
    }
    [data-theme="light"] .blog-detail-section {
        background-color: var(--rr-color-common-white);
    }
    .blog-detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 16px;
        margin-bottom: 30px;
    }
    .blog-description h1, .blog-description h2, .blog-description h3, .blog-description h4, .blog-description h5, .blog-description h6 {
        color: var(--rr-color-common-white);
        margin-top: 1.5em;
        margin-bottom: 0.8em;
        font-weight: 700;
    }
    [data-theme="light"] .blog-description h1, [data-theme="light"] .blog-description h2, [data-theme="light"] .blog-description h3, [data-theme="light"] .blog-description h4, [data-theme="light"] .blog-description h5, [data-theme="light"] .blog-description h6 {
        color: var(--rr-color-heading-primary);
    }
    .blog-description p {
        margin-bottom: 1em;
    }
    .blog-description ul, .blog-description ol {
        margin-bottom: 1em;
        padding-left: 20px;
    }
    .blog-description ul li {
        list-style: disc;
    }
    .blog-description ol li {
        list-style: decimal;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <section class="blog-hero-section fade-wrapper">
            <div class="blog-hero-bg-text">{{ strtoupper(\Illuminate\Support\Str::limit($blogs->title ?? 'Məqalə', 10, '')) }}</div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-12 fade-top text-center">
                        <div class="blog-hero-content pe-lg-4">
                            <div class="d-inline-flex align-items-center mb-4" style="background: rgba(63, 90, 243, 0.1); border: 1px solid rgba(63, 90, 243, 0.2); padding: 8px 20px; border-radius: 30px;">
                                <span style="width: 8px; height: 8px; background: var(--rr-color-theme-primary); border-radius: 50%; margin-right: 10px; display: inline-block;"></span>
                                <span class="subtitle-badge" style="color: var(--rr-color-common-white); font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Məqalə</span>
                            </div>
                            <h1 class="title mb-4" data-text-animation data-split="word" data-duration="1" style="font-size: 70px; font-weight: 800; line-height: 1.1; letter-spacing: -1px;">{{ $blogs->title ?? 'Məqalə Başlığı' }}</h1>
                            <div class="meta d-flex align-items-center justify-content-center" style="gap: 20px; color: var(--rr-color-text-body);">
                                <span><i class="fa-regular fa-calendar" style="margin-right: 6px;"></i> {{ \Carbon\Carbon::parse($blogs->created_at)->format('d M, Y') }}</span>
                                <span><i class="fa-regular fa-user" style="margin-right: 6px;"></i> {{ $blogs->created_by ?? 'AliyevStudio' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-detail-section pt-130 pb-130 fade-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="blog-detail-content">
                            @if($blogs->images && count(json_decode($blogs->images)) > 0)
                                <div class="main-image mb-5">
                                    <img src="{{ asset('storage/app/public/' . json_decode($blogs->images)[0]) }}" alt="{{ $blogs->title ?? 'Blog Image' }}" style="width: 100%; height: auto; border-radius: 16px; object-fit: cover;">
                                </div>
                            @endif
                            <div class="blog-description" style="font-size: 18px; line-height: 1.8; color: var(--rr-color-text-body);">
                                {!! $blogs->description ?? 'Məqalənin məzmunu burada olacaq.' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('pages.footer')
    </div>
</div>

@endsection