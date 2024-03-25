@extends('saas.front.layout.app')
@section('pageHeading')
{{ __('Home') }}
@endsection

@section('metaKeywords')
@if (!empty($seoInfo))
{{ $seoInfo->meta_keyword_home }}
@endif
@endsection

@section('metaDescription')
@if (!empty($seoInfo))
{{ $seoInfo->meta_description_home }}
@endif
@endsection

@section('content')




<!-- Home Start-->
<section id="home" class="home-banner pb-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content mb-30" data-aos="fade-down">
                    <h5 class="title">{{ !empty($heroInfo->second_title) ? $heroInfo->second_title : '' }}
                    </h5>
                    <span class="subtitle">
                        {{ !empty($heroInfo->first_title) ? $heroInfo->first_title : '' }}

                    </span>

                    <p class="text"> {{ !empty($heroInfo->text) ? $heroInfo->text : '' }}</p>
                    <div class="content-botom d-flex align-items-center">
                        @if (!empty($heroInfo->button) && !empty($heroInfo->button_url))
                        <a href="{{ $heroInfo->button_url }}" class="btn primary-btn">{{ $heroInfo->button }}</a>
                        @endif
                        @if (!empty($heroInfo->video_url))
                        <a href="{{ $heroInfo->video_url }}" class="btn video-btn youtube-popup"><i class="fas fa-play"></i>
                        </a>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img image-right mb-30" data-aos="fade-right">
                    <img src="{{ asset('assets/saas/admin/img/hero-section/' . $heroInfo->image) }}" alt="Banner Image">
                </div>
            </div>
        </div>
    </div>
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="assets/front/img/shape/shape-1.png" alt="Shape">
        <img class="shape-2" src="assets/front/img/shape/shape-2.png" alt="Shape">
        <img class="shape-3" src="assets/front/img/shape/shape-3.png" alt="Shape">
        <img class="shape-4" src="assets/front/img/shape/shape-4.png" alt="Shape">
        <img class="shape-5" src="assets/front/img/shape/shape-5.png" alt="Shape">
        <img class="shape-6" src="assets/front/img/shape/shape-6.png" alt="Shape">
        <img class="shape-7" src="assets/front/img/shape/shape-7.png" alt="Shape">
        <img class="shape-8" src="assets/front/img/shape/shape-8.png" alt="Shape">
        <img class="shape-9" src="assets/front/img/shape/shape-8.png" alt="Shape">
    </div>
</section>
<!-- Home End -->

<!-- partner Start  -->
@if ($secInfo->partners_section_status == 1)

<section class="sponsor pt-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center" data-aos="fade-up">
                    <span class="subtitle">{{ !empty($secTitleInfo->partner_title) ? $secTitleInfo->partner_title : '' }}</span>
                    <h2 class="title">{{ !empty($secTitleInfo->partner_subtitle) ? $secTitleInfo->partner_subtitle : '' }} </span></h2>
                    <!-- Shape -->
                    <img class="shape-1" src="assets/front/img/shape/arrow-1.png" alt="Shape">
                    <img class="shape-2" src="assets/front/img/shape/arrow-2.png" alt="Shape">
                </div>
            </div>
            <div class="col-12">
                <div class="swiper sponsor-slider">
                    <div class="swiper-wrapper">
                        @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <div class="item-single d-flex" data-aos="fade-up" data-aos-delay="100">
                                <div class="sponsor-img">
                                    <a class="d-block" href="{{ $partner->url }}" target="_blank">
                                        <img src="{{ asset('assets/saas/admin/img/partners/' . $partner->image) }}" alt="Sponsor">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination" data-aos="fade-up"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- partner End -->

<!-- Work Process Start -->
<section class="store-area pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-items-center justify-content-between mw-100" data-aos="fade-up" data-aos-delay="100">
                    <span class="subtitle">{{ !empty($secTitleInfo->work_process_title) ? $secTitleInfo->work_process_title : '' }}</span>
                    <h2 class="title">{{ !empty($secTitleInfo->work_process_subtitle) ? $secTitleInfo->work_process_subtitle : '' }}</span></h2>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    @foreach ($workProcessInfos as $work_process)


                    <div class="col-sm-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card primary mb-30">
                            <div class="card-icon green">
                                <i class="{{ $work_process->icon }}"></i>
                            </div>
                            <div class="card-content">
                                <a>
                                    <h3 class="card-title">{{ $work_process->title }}</h3>
                                </a>
                                <p class="card-text">{{ $work_process->text }}</p>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="assets/front/img/shape/shape-2.png" alt="Shape">
        <img class="shape-2" src="assets/front/img/shape/shape-9.png" alt="Shape">
        <img class="shape-3" src="assets/front/img/shape/shape-10.png" alt="Shape">
        <img class="shape-4" src="assets/front/img/shape/shape-11.png" alt="Shape">
        <img class="shape-5" src="assets/front/img/shape/shape-8.png" alt="Shape">
    </div>
</section>
<!-- Work Process End -->



<!-- Intro Start -->
<section class="choose-area pt-120 pb-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="choose-content mb-30" data-aos="fade-right">
                    <span class="subtitle">{{ !empty($aboutUsInfo->title) ? $aboutUsInfo->title : '' }}</span>
                    <h2 class="title">{{ !empty($aboutUsInfo->subtitle) ? $aboutUsInfo->subtitle : '' }}</h2>
                    <p class="text">{{ !empty($aboutUsInfo->text) ? $aboutUsInfo->text : '' }}
                    </p>
                    <div class="d-flex align-items-center">
                        @if(!empty($aboutUsInfo->button_text))
                        <a href="{{ $aboutUsInfo->button_url }}" class="btn primary-btn">{{ $aboutUsInfo->button_text }}</a>
                        @endif
                        @if(!empty($aboutUsInfo->video_url))
                        <a href="{{ $aboutUsInfo->video_url }}" class="btn video-btn youtube-popup"><i class="fas fa-play"></i></a>

                        @endif



                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row justify-content-center">
                    @foreach($features as $feature)
                    <div class="col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mt-30 mb-sm-30">
                            <div class="card-icon green">
                                <img src="{{ asset('assets/saas/admin/img/'.$feature->image) }}" alt="Barcode">
                            </div>
                            <div class="card-content">
                                <a href="#">
                                    <h3 class="card-title">{{ $feature->title }}</h3>
                                </a>
                                <p class="card-text">{{ $feature->text }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Bg Shape -->
    <div class="shape">

        <img class="shape-1" src="assets/front/img/shape/shape-12.png" alt="Shape">
        <img class="shape-2" src="assets/front/img/shape/shape-13.png" alt="Shape">
        <img class="shape-3" src="assets/front/img/shape/shape-14.png" alt="Shape">
        <img class="shape-4" src="assets/front/img/shape/shape-6.png" alt="Shape">
        <img class="shape-5" src="assets/front/img/shape/shape-8.png" alt="Shape">
        <img class="shape-6" src="assets/front/img/shape/shape-7.png" alt="Shape">
    </div>
</section>
<!-- Intro End -->

<!-- Pricing Start -->
<section class="pricing-area pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center" data-aos="fade-up">
                    <span class="subtitle">{{ !empty($secTitleInfo->pricing_title) ? $secTitleInfo->pricing_title : '' }} </span>
                    <h2 class="title">{{ !empty($secTitleInfo->pricing_subtitle) ? $secTitleInfo->pricing_subtitle : '' }}</h2>

                </div>
            </div>
            <div class="col-12">
                <div class="nav-tabs-navigation text-center" data-aos="fade-up">
                    <ul class="nav nav-tabs">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#Monthly" type="button">{{ __('Monthly')}}</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#Yearly" type="button">{{ __('Yearly')}}</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#Lifetime" type="button">{{ __('Lifetime')}}</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active " id="Monthly">
                        <div class="row">
                            @foreach ($months_packages as $package)


                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-30 " data-aos="fade-up" data-aos-delay="100">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="icon blue"><i class="fas fa-battery-empty"></i></div> --}}
                                        <div class="label">
                                            <h3>{{ $package->name }}</h3>

                                        </div>
                                    </div>
                                    <p class="text"></p>
                                    <div class="d-flex align-items-center">

                                        <span class="price">{{ number_format($package->price, 0) }}</span>
                                        <span class="period">/ @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif</span>


                                    </div>
                                    <h5>Whats Included</h5>
                                    <ul class="item-list list-unstyled p-0">

                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->campuses_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->campuses_count }}
                                            @endif

                                            Campuses
                                            <br />
                                        </li>
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->student_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->student_count }}
                                            @endif

                                            Students
                                            <br />
                                        </li>

                                        @if($package->trial_days != 0)
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$package->trial_days}} Trial Days
                                        </li>
                                        @endif
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif
                                        </li>
                                        @foreach($packageFeatures as $key=> $value)
                                        @if(!empty($package->features) && in_array($key, $package->features ))
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$packageFeatures[$key]}}
                                        </li>
                                        @else
                                        <li class="disabled">
                                            <i class="fal fa-times"></i>
                                            {{ $value }}
                                        </li>@endif

                                        @endforeach







                                    </ul>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('package.registration', ['id' => $package->id]) }}" class="btn primary-btn">Purchase</a>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade  " id="Yearly">
                        <div class="row">
                            @foreach ($years_packages as $package)


                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-30 " data-aos="fade-up" data-aos-delay="100">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="icon blue"><i class="fas fa-battery-empty"></i></div> --}}
                                        <div class="label">
                                            <h3>{{ $package->name }}</h3>

                                        </div>
                                    </div>
                                    <p class="text"></p>
                                    <div class="d-flex align-items-center">

                                        <span class="price">{{ number_format($package->price, 0) }}</span>
                                        <span class="period">/ @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif</span>


                                    </div>
                                    <h5>Whats Included</h5>
                                    <ul class="item-list list-unstyled p-0">

                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->campuses_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->campuses_count }}
                                            @endif

                                            Campuses
                                            <br />
                                        </li>
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->student_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->student_count }}
                                            @endif

                                            Students
                                            <br />
                                        </li>

                                        @if($package->trial_days != 0)
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$package->trial_days}} Trial Days
                                        </li>
                                        @endif
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif
                                        </li>
                                        @foreach($packageFeatures as $key=> $value)
                                        @if(!empty($package->features) && in_array($key, $package->features ))
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$packageFeatures[$key]}}
                                        </li>
                                        @else
                                        <li class="disabled">
                                            <i class="fal fa-times"></i>
                                            {{ $value }}
                                        </li>@endif

                                        @endforeach







                                    </ul>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('package.registration', ['id' => $package->id]) }}" class="btn primary-btn">Purchase</a>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade  " id="Lifetime">
                        <div class="row">
                            @foreach ($life_time_packages as $package)


                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-30 " data-aos="fade-up" data-aos-delay="100">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="icon blue"><i class="fas fa-battery-empty"></i></div> --}}
                                        <div class="label">
                                            <h3>{{ $package->name }}</h3>

                                        </div>
                                    </div>
                                    <p class="text"></p>
                                    <div class="d-flex align-items-center">

                                        <span class="price">{{ number_format($package->price, 0) }}</span>
                                        <span class="period">/ @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif</span>


                                    </div>
                                    <h5>Whats Included</h5>
                                    <ul class="item-list list-unstyled p-0">

                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->campuses_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->campuses_count }}
                                            @endif

                                            Campuses
                                            <br />
                                        </li>
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if ($package->student_count == 0)
                                            Unlimited
                                            @else
                                            {{ $package->student_count }}
                                            @endif

                                            Students
                                            <br />
                                        </li>

                                        @if($package->trial_days != 0)
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$package->trial_days}} Trial Days
                                        </li>
                                        @endif
                                        <li>
                                            <i class="fal fa-check"></i>
                                            @if($package->price != 0)

                                            {{$package->interval_count}} {{__('lang.' . $package->interval)}}

                                            @else
                                            @lang('lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang.' . $package->interval)])
                                            @endif
                                        </li>
                                        @foreach($packageFeatures as $key=> $value)
                                        @if(!empty($package->features) && in_array($key, $package->features ))
                                        <li>
                                            <i class="fal fa-check"></i>

                                            {{$packageFeatures[$key]}}
                                        </li>
                                        @else
                                        <li class="disabled">
                                            <i class="fal fa-times"></i>
                                            {{ $value }}
                                        </li>@endif

                                        @endforeach







                                    </ul>
                                    <div class="d-flex align-items-center">
                                        {{-- <a href="registration/step-1/trial/30.html" class="btn secondary-btn">Trial</a> --}}
                                        <a href="     {{ route('package.registration', ['id' => $package->id]) }}
" class="btn primary-btn">Purchase</a>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Bg Overlay -->
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/img/shape/shape-6.png')}}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/img/shape/shape-7.png')}}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/img/shape/shape-3.png')}}" alt="Shape">
        <img class="shape-4" src="{{ asset('assets/front/img/shape/shape-4.png')}}" alt="Shape">
        <img class="shape-5" src="{{ asset('assets/front/img/shape/shape-5.png')}}" alt="Shape">
        <img class="shape-6" src="{{ asset('assets/front/img/shape/shape-11.png')}}" alt="Shape">
    </div>
</section>
<!-- Pricing End -->


<!-- Testimonial Start -->
<section class="testimonial-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title ms-0" data-aos="fade-right">
                    <span class="subtitle">What Our Cliets Say</span>
                    <h2 class="title">Our Happy Client’s</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-6">
                        <div class="image image-left" data-aos="fade-right">
                            @if (!empty($testimonialData)) <img src="{{ asset('assets/saas/admin/img/' . $testimonialData->testimonials_section_image) }}" alt="Banner Image"> @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="swiper testimonial-slider" data-aos="fade-left">
                            <div class="swiper-wrapper">


                                @php
                                $testimonialsChunks = $testimonials->chunk(2); // Chunk the Eloquent Collection into groups of 2
                                @endphp

                                @foreach ($testimonialsChunks as $testimonialsChunk)
                                <div class="swiper-slide">
                                    @foreach ($testimonialsChunk as $testimonial)
                                    <div class="slider-item">
                                        <div class="quote">
                                            <span class="icon"><i class="fas fa-quote-right"></i></span>
                                            <p class="text">
                                                {{ $testimonial->comment }}
                                            </p>
                                        </div>
                                        <div class="client">
                                            <div class="image">
                                                <div class="lazy-container aspect-ratio-1-1">
                                                    <img class="lazyload lazy-image" data-src="{{ asset('assets/saas/admin/img/clients/' . $testimonial->image) }}" alt="Person Image">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h6 class="name">{{ $testimonial->name }}</h6>
                                                <span class="designation">{{ $testimonial->occupation }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach



                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bg Overlay -->
    <img class="bg-overlay" src="assets/front/img/shadow-bg-1.png" alt="Bg">
    <img class="bg-overlay" src="assets/front/img/shadow-bg-2.html" alt="Bg">
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="assets/front/img/shape/shape-8.png" alt="Shape">
        <img class="shape-2" src="assets/front/img/shape/shape-3.png" alt="Shape">
        <img class="shape-3" src="assets/front/img/shape/shape-4.png" alt="Shape">
        <img class="shape-4" src="assets/front/img/shape/shape-7.png" alt="Shape">
        <img class="shape-5" src="assets/front/img/shape/shape-6.png" alt="Shape">
        <img class="shape-6" src="assets/front/img/shape/shape-10.png" alt="Shape">
    </div>
</section>
<!-- Testimonial End -->

<!-- Blog Start -->
<section class="blog-area ptb-90">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <span class="subtitle"></span>

            <h2 class="title">{{ !empty($secTitleInfo->blog_section_title) ? $secTitleInfo->blog_section_title : '' }}</h2>
        </div>
        <div class="row justify-content-center">
            @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <article class="card mb-30" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-image">

                        <a class="lazy-container aspect-ratio-16-9" href="{{ route('blog_details', ['slug' => $blog->slug]) }}">
                            <img class="lazyload lazy-image" data-src="{{ asset('assets/saas/admin/img/blogs/' . $blog->image) }}" alt="Banner Image">

                        </a>

                        <ul class="info-list">
                            <li><i class="fal fa-user"></i>{{ $blog->author }}</li>
                            <li><i class="fal fa-calendar"></i>{{ date_format($blog->created_at, 'M d, Y') }}</li>
                            <li><i class="fal fa-tag"></i>{{ $blog->categoryName }}</li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3 class="card-title">
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}">
                                {{ strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'UTF-8') . '...' : $blog->title }}
                            </a>
                        </h3>
                        <p class="card-text">
                            {!! strlen(strip_tags($blog->content)) > 100 ? mb_substr(strip_tags($blog->content), 0, 100, 'UTF-8') . '...' : strip_tags($blog->content) !!}

                        </p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="card-btn">Read More</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Bg Overlay -->
    <img class="bg-overlay" src="{{ asset('assets/front/img/shadow-bg-2.html')}}" alt="Bg">
    <img class="bg-overlay" src="{{ asset('assets/front/img/shadow-bg-1.png')}}" alt="Bg">
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="{{ asset('assets/front/img/shape/shape-10.png')}}" alt="Shape">
        <img class="shape-2" src="{{ asset('assets/front/img/shape/shape-6.png')}}" alt="Shape">
        <img class="shape-3" src="{{ asset('assets/front/img/shape/shape-7.png')}}" alt="Shape">
        <img class="shape-4" src="{{ asset('assets/front/img/shape/shape-4.png')}}" alt="Shape">
        <img class="shape-5" src="{{ asset('assets/front/img/shape/shape-3.png')}}" alt="Shape">
        <img class="shape-6" src="{{ asset('assets/front/img/shape/shape-8.png')}}" alt="Shape">
    </div>
</section>
<!-- Blog End -->





<a href="#" class="go-top"><i class="fal fa-angle-double-up"></i></a>

{{-- cookie alert --}}
    {{-- @if (!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1) --}}
      {{-- @include('cookieConsent::index') --}}
        @include('cookie-consent::index')


    {{-- @endif --}}


{{-- announcement popup --}}
    @include('saas.front.partials.popups')


@endsection
