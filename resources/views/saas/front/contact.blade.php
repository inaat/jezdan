@extends('saas.front.layout.app')
@section('pageHeading')
@if (!empty($pageHeading))
{{ $pageHeading->contact_page_title ?? 'Contact Us' }}
@endif
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
@includeIf('frontend.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->contact_page_title ?? 'Contact Us'])
<div class="contact-area pt-120 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card mb-30 blue aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon">
                                <i class="fal fa-phone-plus"></i>
                            </div>
                            <div class="card-text">
                            
                                <p><a href="tel:{{ !empty($info->contact_number) ? $info->contact_number : '' }}">{{ !empty($info->contact_number) ? $info->contact_number : '' }}</a></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card mb-30 green aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="card-text">
                                <p><a href="mailTo:{{ !empty($info->email_address) ? $info->email_address : '' }}">{{ !empty($info->email_address) ? $info->email_address : '' }}</a></p>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card mb-50 orange aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="card-text">
                                <p>{{ !empty($info->address) ? $info->address : '' }}
                                </p>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== CONTACT ACTION PART START ======-->

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                           <form action="{{ route('contact.send_mail') }}" method="post" enctype="multipart/form-data">
                            @csrf <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-30">
                                        <input type="text" name="name" class="form-control" id="name" required="" placeholder="{{ __('Enter Your Full Name') }}">
                                        @error('name')
                                        <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-30">
                                        <input type="email" name="email" class="form-control" id="email" required="" data-error="{{ __('Enter Your Email') }}" placeholder="{{ __('Enter Your Email') }}">
                                        @error('email')
                                        <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-30">
                                        <input type="subject" name="subject" class="form-control" id="subject" required="" data-error="{{ __('Enter Email Subject') }}" placeholder="{{ __('Enter Email Subject') }}">
                                        @error('subject')
                                        <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-30">
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="8" required="" data-error="{{ __('Write Your Message') }}" placeholder="{{ __('Write Your Message') }} *"></textarea>
                                        @error('message')
                                        <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">



                                    @if ($info->google_recaptcha_status == 1)
                                    <div class="mt-20">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                    @error('g-recaptcha-response')
                                    <p class="mt-2 mb-0 text-danger">{{ $message }}</p>
                                    @enderror
                                    @endif
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn primary-btn primary-btn-5" title="{{ __('Send Message') }}"> {{ __('Send Message') }}</button>
                                    <div id="msgSubmit"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        @if (!empty($info->latitude) && !empty($info->longitude))
        <div class="map">
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{ $info->latitude }},%20{{ $info->longitude }}+({{ $websiteInfo->website_title }})&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>
        @endif

    </div>
</div>
            </div>
        </div>
    </div>
    <!-- Bg Shape -->
    <div class="shape">
        <img class="shape-1" src="https://coursemat.xyz/assets/front/img/shape/shape-4.png" alt="Shape">
        <img class="shape-2" src="https://coursemat.xyz/assets/front/img/shape/shape-10.png" alt="Shape">
        <img class="shape-3" src="https://coursemat.xyz/assets/front/img/shape/shape-9.png" alt="Shape">
        <img class="shape-4" src="https://coursemat.xyz/assets/front/img/shape/shape-7.png" alt="Shape">
        <img class="shape-5" src="https://coursemat.xyz/assets/front/img/shape/shape-10.png" alt="Shape">
        <img class="shape-6" src="https://coursemat.xyz/assets/front/img/shape/shape-4.png" alt="Shape">
        <img class="shape-7" src="https://coursemat.xyz/assets/front/img/shape/shape-10.png" alt="Shape">
        <img class="shape-8" src="https://coursemat.xyz/assets/front/img/shape/shape-9.png" alt="Shape">
        <img class="shape-9" src="https://coursemat.xyz/assets/front/img/shape/shape-7.png" alt="Shape">
        <img class="shape-10" src="https://coursemat.xyz/assets/front/img/shape/shape-10.png" alt="Shape">
    </div>
</div>
@endsection
