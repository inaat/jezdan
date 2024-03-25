@extends('saas.front.layout.app')

@section('pageHeading')
@if (!empty($pageHeading))
{{ $pageHeading->login_page_title ?? 'Login' }}
@endif
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
@includeIf('saas.front.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->login_page_title ?? 'Login'])

<!--====== User Login Part Start ======-->


<div class="authentication-area pt-90 pb-120">
    <div class="container">
        <div class="main-form">
            <form id="#authForm" action="{{ route('user.login_submit') }}" method="POST" enctype="multipart/form-data">
                @csrf <h3>{{ __('Login') }}</h3>

                <div class="form-group mb-30">
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') . '*' }}" value="{{ old('email') }}" required="">
                    @error('email')
                    <p class="text-danger mb-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-30">
                    <input type="password" name="password" class="form-control" placeholder="{{ __('Password') . '*' }}" value="{{ old('password') }}">
                    @error('password')
                    <p class="text-danger mb-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form_group">
                </div>
                <div class="row align-items-center">
                    <div class="col-4 col-xs-12">
                        <div class="link">
                            <a href="{{ route('user.forget_password') }}">{{ __('Lost your password') . '?' }}</a>
                        </div>
                    </div>
                    <div class="col-8 col-xs-12">
                        <div class="link go-signup">
                            {{ __("Don't have an account?")}} <a href="{{ route('pricing') }}">{{ __('Click Here')}}</a> {{ __('to')}} {{ __('Signup')}}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn primary-btn w-100"> {{ __('Login In') }} </button>
            </form>
        </div>
    </div>
</div>
<!--====== User Login Part End ======-->
@endsection
