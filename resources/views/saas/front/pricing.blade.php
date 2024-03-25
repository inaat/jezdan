@extends('saas.front.layout.app')

@section('pageHeading')
{{ __('Pricing')}}
@endsection

@section('metaKeywords')
@if (!empty($seoInfo))
{{ $seoInfo->meta_keyword_login }}
@endif
@endsection

@section('metaDescription')
@if (!empty($seoInfo))
{{ $seoInfo->meta_description_login }}
@endif
@endsection

@section('content')
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' =>__('Pricing')])
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

@endsection
